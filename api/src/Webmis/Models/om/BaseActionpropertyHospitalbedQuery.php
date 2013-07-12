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
use Webmis\Models\Actionproperty;
use Webmis\Models\ActionpropertyHospitalbed;
use Webmis\Models\ActionpropertyHospitalbedPeer;
use Webmis\Models\ActionpropertyHospitalbedQuery;
use Webmis\Models\OrgstructureHospitalbed;

/**
 * Base class that represents a query for the 'ActionProperty_HospitalBed' table.
 *
 *
 *
 * @method ActionpropertyHospitalbedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionpropertyHospitalbedQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method ActionpropertyHospitalbedQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method ActionpropertyHospitalbedQuery groupById() Group by the id column
 * @method ActionpropertyHospitalbedQuery groupByIndex() Group by the index column
 * @method ActionpropertyHospitalbedQuery groupByValue() Group by the value column
 *
 * @method ActionpropertyHospitalbedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionpropertyHospitalbedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionpropertyHospitalbedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionpropertyHospitalbedQuery leftJoinActionproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actionproperty relation
 * @method ActionpropertyHospitalbedQuery rightJoinActionproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actionproperty relation
 * @method ActionpropertyHospitalbedQuery innerJoinActionproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Actionproperty relation
 *
 * @method ActionpropertyHospitalbedQuery leftJoinOrgstructureHospitalbed($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureHospitalbed relation
 * @method ActionpropertyHospitalbedQuery rightJoinOrgstructureHospitalbed($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureHospitalbed relation
 * @method ActionpropertyHospitalbedQuery innerJoinOrgstructureHospitalbed($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureHospitalbed relation
 *
 * @method ActionpropertyHospitalbed findOne(PropelPDO $con = null) Return the first ActionpropertyHospitalbed matching the query
 * @method ActionpropertyHospitalbed findOneOrCreate(PropelPDO $con = null) Return the first ActionpropertyHospitalbed matching the query, or a new ActionpropertyHospitalbed object populated from the query conditions when no match is found
 *
 * @method ActionpropertyHospitalbed findOneById(int $id) Return the first ActionpropertyHospitalbed filtered by the id column
 * @method ActionpropertyHospitalbed findOneByIndex(int $index) Return the first ActionpropertyHospitalbed filtered by the index column
 * @method ActionpropertyHospitalbed findOneByValue(int $value) Return the first ActionpropertyHospitalbed filtered by the value column
 *
 * @method array findById(int $id) Return ActionpropertyHospitalbed objects filtered by the id column
 * @method array findByIndex(int $index) Return ActionpropertyHospitalbed objects filtered by the index column
 * @method array findByValue(int $value) Return ActionpropertyHospitalbed objects filtered by the value column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertyHospitalbedQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionpropertyHospitalbedQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActionpropertyHospitalbed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionpropertyHospitalbedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionpropertyHospitalbedQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionpropertyHospitalbedQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionpropertyHospitalbedQuery) {
            return $criteria;
        }
        $query = new ActionpropertyHospitalbedQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id, $index]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ActionpropertyHospitalbed|ActionpropertyHospitalbed[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionpropertyHospitalbedPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertyHospitalbedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ActionpropertyHospitalbed A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `index`, `value` FROM `ActionProperty_HospitalBed` WHERE `id` = :p0 AND `index` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ActionpropertyHospitalbed();
            $obj->hydrate($row);
            ActionpropertyHospitalbedPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ActionpropertyHospitalbed|ActionpropertyHospitalbed[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ActionpropertyHospitalbed[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ActionpropertyHospitalbedPeer::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ActionpropertyHospitalbedPeer::INDEX, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ActionpropertyHospitalbedPeer::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ActionpropertyHospitalbedPeer::INDEX, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @see       filterByActionproperty()
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyHospitalbedPeer::ID, $id, $comparison);
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
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedPeer::INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedPeer::INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyHospitalbedPeer::INDEX, $index, $comparison);
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
     * @see       filterByOrgstructureHospitalbed()
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyHospitalbedPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Actionproperty object
     *
     * @param   Actionproperty|PropelObjectCollection $actionproperty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionpropertyHospitalbedQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionproperty($actionproperty, $comparison = null)
    {
        if ($actionproperty instanceof Actionproperty) {
            return $this
                ->addUsingAlias(ActionpropertyHospitalbedPeer::ID, $actionproperty->getId(), $comparison);
        } elseif ($actionproperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionpropertyHospitalbedPeer::ID, $actionproperty->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByActionproperty() only accepts arguments of type Actionproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actionproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function joinActionproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actionproperty');

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
            $this->addJoinObject($join, 'Actionproperty');
        }

        return $this;
    }

    /**
     * Use the Actionproperty relation Actionproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionpropertyQuery A secondary query class using the current class as primary query
     */
    public function useActionpropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actionproperty', '\Webmis\Models\ActionpropertyQuery');
    }

    /**
     * Filter the query by a related OrgstructureHospitalbed object
     *
     * @param   OrgstructureHospitalbed|PropelObjectCollection $orgstructureHospitalbed The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionpropertyHospitalbedQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureHospitalbed($orgstructureHospitalbed, $comparison = null)
    {
        if ($orgstructureHospitalbed instanceof OrgstructureHospitalbed) {
            return $this
                ->addUsingAlias(ActionpropertyHospitalbedPeer::VALUE, $orgstructureHospitalbed->getId(), $comparison);
        } elseif ($orgstructureHospitalbed instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionpropertyHospitalbedPeer::VALUE, $orgstructureHospitalbed->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructureHospitalbed() only accepts arguments of type OrgstructureHospitalbed or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureHospitalbed relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function joinOrgstructureHospitalbed($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureHospitalbed');

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
            $this->addJoinObject($join, 'OrgstructureHospitalbed');
        }

        return $this;
    }

    /**
     * Use the OrgstructureHospitalbed relation OrgstructureHospitalbed object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureHospitalbedQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureHospitalbedQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureHospitalbed($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureHospitalbed', '\Webmis\Models\OrgstructureHospitalbedQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ActionpropertyHospitalbed $actionpropertyHospitalbed Object to remove from the list of results
     *
     * @return ActionpropertyHospitalbedQuery The current query, for fluid interface
     */
    public function prune($actionpropertyHospitalbed = null)
    {
        if ($actionpropertyHospitalbed) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ActionpropertyHospitalbedPeer::ID), $actionpropertyHospitalbed->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ActionpropertyHospitalbedPeer::INDEX), $actionpropertyHospitalbed->getIndex(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
