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
use Webmis\Models\ActionpropertyFdrecord;
use Webmis\Models\ActionpropertyFdrecordPeer;
use Webmis\Models\ActionpropertyFdrecordQuery;
use Webmis\Models\Fdrecord;

/**
 * Base class that represents a query for the 'ActionProperty_FDRecord' table.
 *
 *
 *
 * @method ActionpropertyFdrecordQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionpropertyFdrecordQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method ActionpropertyFdrecordQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method ActionpropertyFdrecordQuery groupById() Group by the id column
 * @method ActionpropertyFdrecordQuery groupByIndex() Group by the index column
 * @method ActionpropertyFdrecordQuery groupByValue() Group by the value column
 *
 * @method ActionpropertyFdrecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionpropertyFdrecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionpropertyFdrecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionpropertyFdrecordQuery leftJoinFdrecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fdrecord relation
 * @method ActionpropertyFdrecordQuery rightJoinFdrecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fdrecord relation
 * @method ActionpropertyFdrecordQuery innerJoinFdrecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Fdrecord relation
 *
 * @method ActionpropertyFdrecord findOne(PropelPDO $con = null) Return the first ActionpropertyFdrecord matching the query
 * @method ActionpropertyFdrecord findOneOrCreate(PropelPDO $con = null) Return the first ActionpropertyFdrecord matching the query, or a new ActionpropertyFdrecord object populated from the query conditions when no match is found
 *
 * @method ActionpropertyFdrecord findOneByIndex(int $index) Return the first ActionpropertyFdrecord filtered by the index column
 * @method ActionpropertyFdrecord findOneByValue(int $value) Return the first ActionpropertyFdrecord filtered by the value column
 *
 * @method array findById(int $id) Return ActionpropertyFdrecord objects filtered by the id column
 * @method array findByIndex(int $index) Return ActionpropertyFdrecord objects filtered by the index column
 * @method array findByValue(int $value) Return ActionpropertyFdrecord objects filtered by the value column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertyFdrecordQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionpropertyFdrecordQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActionpropertyFdrecord', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionpropertyFdrecordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionpropertyFdrecordQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionpropertyFdrecordQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionpropertyFdrecordQuery) {
            return $criteria;
        }
        $query = new ActionpropertyFdrecordQuery();
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
     * @return   ActionpropertyFdrecord|ActionpropertyFdrecord[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionpropertyFdrecordPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertyFdrecordPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActionpropertyFdrecord A model object, or null if the key is not found
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
     * @return                 ActionpropertyFdrecord A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `index`, `value` FROM `ActionProperty_FDRecord` WHERE `id` = :p0';
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
            $obj = new ActionpropertyFdrecord();
            $obj->hydrate($row);
            ActionpropertyFdrecordPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ActionpropertyFdrecord|ActionpropertyFdrecord[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActionpropertyFdrecord[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionpropertyFdrecordPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionpropertyFdrecordPeer::ID, $keys, Criteria::IN);
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
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionpropertyFdrecordPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionpropertyFdrecordPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyFdrecordPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the index column
     *
     * Example usage:
     * <code>
     * $query->filterByIndex(1234); // WHERE index = 1234
     * $query->filterByIndex(array(12, 34)); // WHERE index IN (12, 34)
     * $query->filterByIndex(array('min' => 12)); // WHERE index >= 12
     * $query->filterByIndex(array('max' => 12)); // WHERE index <= 12
     * </code>
     *
     * @param     mixed $index The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(ActionpropertyFdrecordPeer::INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(ActionpropertyFdrecordPeer::INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyFdrecordPeer::INDEX, $index, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value >= 12
     * $query->filterByValue(array('max' => 12)); // WHERE value <= 12
     * </code>
     *
     * @see       filterByFdrecord()
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(ActionpropertyFdrecordPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(ActionpropertyFdrecordPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyFdrecordPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Fdrecord object
     *
     * @param   Fdrecord|PropelObjectCollection $fdrecord The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionpropertyFdrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdrecord($fdrecord, $comparison = null)
    {
        if ($fdrecord instanceof Fdrecord) {
            return $this
                ->addUsingAlias(ActionpropertyFdrecordPeer::VALUE, $fdrecord->getId(), $comparison);
        } elseif ($fdrecord instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionpropertyFdrecordPeer::VALUE, $fdrecord->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFdrecord() only accepts arguments of type Fdrecord or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fdrecord relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function joinFdrecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fdrecord');

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
            $this->addJoinObject($join, 'Fdrecord');
        }

        return $this;
    }

    /**
     * Use the Fdrecord relation Fdrecord object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdrecordQuery A secondary query class using the current class as primary query
     */
    public function useFdrecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFdrecord($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fdrecord', '\Webmis\Models\FdrecordQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ActionpropertyFdrecord $actionpropertyFdrecord Object to remove from the list of results
     *
     * @return ActionpropertyFdrecordQuery The current query, for fluid interface
     */
    public function prune($actionpropertyFdrecord = null)
    {
        if ($actionpropertyFdrecord) {
            $this->addUsingAlias(ActionpropertyFdrecordPeer::ID, $actionpropertyFdrecord->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
