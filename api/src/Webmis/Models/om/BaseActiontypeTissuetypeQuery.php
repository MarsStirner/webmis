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
use Webmis\Models\Actiontype;
use Webmis\Models\ActiontypeTissuetype;
use Webmis\Models\ActiontypeTissuetypePeer;
use Webmis\Models\ActiontypeTissuetypeQuery;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\Rbunit;

/**
 * Base class that represents a query for the 'ActionType_TissueType' table.
 *
 *
 *
 * @method ActiontypeTissuetypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActiontypeTissuetypeQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ActiontypeTissuetypeQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method ActiontypeTissuetypeQuery orderByTissuetypeId($order = Criteria::ASC) Order by the tissueType_id column
 * @method ActiontypeTissuetypeQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ActiontypeTissuetypeQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 *
 * @method ActiontypeTissuetypeQuery groupById() Group by the id column
 * @method ActiontypeTissuetypeQuery groupByMasterId() Group by the master_id column
 * @method ActiontypeTissuetypeQuery groupByIdx() Group by the idx column
 * @method ActiontypeTissuetypeQuery groupByTissuetypeId() Group by the tissueType_id column
 * @method ActiontypeTissuetypeQuery groupByAmount() Group by the amount column
 * @method ActiontypeTissuetypeQuery groupByUnitId() Group by the unit_id column
 *
 * @method ActiontypeTissuetypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActiontypeTissuetypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActiontypeTissuetypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActiontypeTissuetypeQuery leftJoinActiontype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontype relation
 * @method ActiontypeTissuetypeQuery rightJoinActiontype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontype relation
 * @method ActiontypeTissuetypeQuery innerJoinActiontype($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontype relation
 *
 * @method ActiontypeTissuetypeQuery leftJoinRbtissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtissuetype relation
 * @method ActiontypeTissuetypeQuery rightJoinRbtissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtissuetype relation
 * @method ActiontypeTissuetypeQuery innerJoinRbtissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtissuetype relation
 *
 * @method ActiontypeTissuetypeQuery leftJoinRbunit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbunit relation
 * @method ActiontypeTissuetypeQuery rightJoinRbunit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbunit relation
 * @method ActiontypeTissuetypeQuery innerJoinRbunit($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbunit relation
 *
 * @method ActiontypeTissuetype findOne(PropelPDO $con = null) Return the first ActiontypeTissuetype matching the query
 * @method ActiontypeTissuetype findOneOrCreate(PropelPDO $con = null) Return the first ActiontypeTissuetype matching the query, or a new ActiontypeTissuetype object populated from the query conditions when no match is found
 *
 * @method ActiontypeTissuetype findOneByMasterId(int $master_id) Return the first ActiontypeTissuetype filtered by the master_id column
 * @method ActiontypeTissuetype findOneByIdx(int $idx) Return the first ActiontypeTissuetype filtered by the idx column
 * @method ActiontypeTissuetype findOneByTissuetypeId(int $tissueType_id) Return the first ActiontypeTissuetype filtered by the tissueType_id column
 * @method ActiontypeTissuetype findOneByAmount(int $amount) Return the first ActiontypeTissuetype filtered by the amount column
 * @method ActiontypeTissuetype findOneByUnitId(int $unit_id) Return the first ActiontypeTissuetype filtered by the unit_id column
 *
 * @method array findById(int $id) Return ActiontypeTissuetype objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return ActiontypeTissuetype objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return ActiontypeTissuetype objects filtered by the idx column
 * @method array findByTissuetypeId(int $tissueType_id) Return ActiontypeTissuetype objects filtered by the tissueType_id column
 * @method array findByAmount(int $amount) Return ActiontypeTissuetype objects filtered by the amount column
 * @method array findByUnitId(int $unit_id) Return ActiontypeTissuetype objects filtered by the unit_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypeTissuetypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActiontypeTissuetypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActiontypeTissuetype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActiontypeTissuetypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActiontypeTissuetypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActiontypeTissuetypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActiontypeTissuetypeQuery) {
            return $criteria;
        }
        $query = new ActiontypeTissuetypeQuery();
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
     * @return   ActiontypeTissuetype|ActiontypeTissuetype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActiontypeTissuetypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeTissuetypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActiontypeTissuetype A model object, or null if the key is not found
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
     * @return                 ActiontypeTissuetype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `tissueType_id`, `amount`, `unit_id` FROM `ActionType_TissueType` WHERE `id` = :p0';
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
            $obj = new ActiontypeTissuetype();
            $obj->hydrate($row);
            ActiontypeTissuetypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ActiontypeTissuetype|ActiontypeTissuetype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActiontypeTissuetype[]|mixed the list of results, formatted by the current formatter
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
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActiontypeTissuetypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActiontypeTissuetypePeer::ID, $keys, Criteria::IN);
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
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeTissuetypePeer::ID, $id, $comparison);
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
     * @see       filterByActiontype()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeTissuetypePeer::MASTER_ID, $masterId, $comparison);
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
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeTissuetypePeer::IDX, $idx, $comparison);
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
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByTissuetypeId($tissuetypeId = null, $comparison = null)
    {
        if (is_array($tissuetypeId)) {
            $useMinMax = false;
            if (isset($tissuetypeId['min'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::TISSUETYPE_ID, $tissuetypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tissuetypeId['max'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::TISSUETYPE_ID, $tissuetypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeTissuetypePeer::TISSUETYPE_ID, $tissuetypeId, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount >= 12
     * $query->filterByAmount(array('max' => 12)); // WHERE amount <= 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeTissuetypePeer::AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the unit_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitId(1234); // WHERE unit_id = 1234
     * $query->filterByUnitId(array(12, 34)); // WHERE unit_id IN (12, 34)
     * $query->filterByUnitId(array('min' => 12)); // WHERE unit_id >= 12
     * $query->filterByUnitId(array('max' => 12)); // WHERE unit_id <= 12
     * </code>
     *
     * @see       filterByRbunit()
     *
     * @param     mixed $unitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(ActiontypeTissuetypePeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeTissuetypePeer::UNIT_ID, $unitId, $comparison);
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeTissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontype($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(ActiontypeTissuetypePeer::MASTER_ID, $actiontype->getId(), $comparison);
        } elseif ($actiontype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypeTissuetypePeer::MASTER_ID, $actiontype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByActiontype() only accepts arguments of type Actiontype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actiontype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function joinActiontype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actiontype');

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
            $this->addJoinObject($join, 'Actiontype');
        }

        return $this;
    }

    /**
     * Use the Actiontype relation Actiontype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actiontype', '\Webmis\Models\ActiontypeQuery');
    }

    /**
     * Filter the query by a related Rbtissuetype object
     *
     * @param   Rbtissuetype|PropelObjectCollection $rbtissuetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeTissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtissuetype($rbtissuetype, $comparison = null)
    {
        if ($rbtissuetype instanceof Rbtissuetype) {
            return $this
                ->addUsingAlias(ActiontypeTissuetypePeer::TISSUETYPE_ID, $rbtissuetype->getId(), $comparison);
        } elseif ($rbtissuetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypeTissuetypePeer::TISSUETYPE_ID, $rbtissuetype->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
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
     * Filter the query by a related Rbunit object
     *
     * @param   Rbunit|PropelObjectCollection $rbunit The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeTissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbunit($rbunit, $comparison = null)
    {
        if ($rbunit instanceof Rbunit) {
            return $this
                ->addUsingAlias(ActiontypeTissuetypePeer::UNIT_ID, $rbunit->getId(), $comparison);
        } elseif ($rbunit instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypeTissuetypePeer::UNIT_ID, $rbunit->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbunit() only accepts arguments of type Rbunit or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbunit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function joinRbunit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbunit');

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
            $this->addJoinObject($join, 'Rbunit');
        }

        return $this;
    }

    /**
     * Use the Rbunit relation Rbunit object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbunitQuery A secondary query class using the current class as primary query
     */
    public function useRbunitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbunit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbunit', '\Webmis\Models\RbunitQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ActiontypeTissuetype $actiontypeTissuetype Object to remove from the list of results
     *
     * @return ActiontypeTissuetypeQuery The current query, for fluid interface
     */
    public function prune($actiontypeTissuetype = null)
    {
        if ($actiontypeTissuetype) {
            $this->addUsingAlias(ActiontypeTissuetypePeer::ID, $actiontypeTissuetype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
