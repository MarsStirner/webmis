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
use Webmis\Models\Action;
use Webmis\Models\Actiontissue;
use Webmis\Models\ActiontissuePeer;
use Webmis\Models\ActiontissueQuery;
use Webmis\Models\Tissue;

/**
 * Base class that represents a query for the 'ActionTissue' table.
 *
 *
 *
 * @method ActiontissueQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method ActiontissueQuery orderByTissueId($order = Criteria::ASC) Order by the tissue_id column
 *
 * @method ActiontissueQuery groupByActionId() Group by the action_id column
 * @method ActiontissueQuery groupByTissueId() Group by the tissue_id column
 *
 * @method ActiontissueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActiontissueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActiontissueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActiontissueQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method ActiontissueQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method ActiontissueQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method ActiontissueQuery leftJoinTissue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tissue relation
 * @method ActiontissueQuery rightJoinTissue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tissue relation
 * @method ActiontissueQuery innerJoinTissue($relationAlias = null) Adds a INNER JOIN clause to the query using the Tissue relation
 *
 * @method Actiontissue findOne(PropelPDO $con = null) Return the first Actiontissue matching the query
 * @method Actiontissue findOneOrCreate(PropelPDO $con = null) Return the first Actiontissue matching the query, or a new Actiontissue object populated from the query conditions when no match is found
 *
 * @method Actiontissue findOneByActionId(int $action_id) Return the first Actiontissue filtered by the action_id column
 * @method Actiontissue findOneByTissueId(int $tissue_id) Return the first Actiontissue filtered by the tissue_id column
 *
 * @method array findByActionId(int $action_id) Return Actiontissue objects filtered by the action_id column
 * @method array findByTissueId(int $tissue_id) Return Actiontissue objects filtered by the tissue_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontissueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActiontissueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Actiontissue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActiontissueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActiontissueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActiontissueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActiontissueQuery) {
            return $criteria;
        }
        $query = new ActiontissueQuery();
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
                         A Primary key composition: [$action_id, $tissue_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Actiontissue|Actiontissue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActiontissuePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActiontissuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actiontissue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `action_id`, `tissue_id` FROM `ActionTissue` WHERE `action_id` = :p0 AND `tissue_id` = :p1';
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
            $obj = new Actiontissue();
            $obj->hydrate($row);
            ActiontissuePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Actiontissue|Actiontissue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Actiontissue[]|mixed the list of results, formatted by the current formatter
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
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ActiontissuePeer::ACTION_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ActiontissuePeer::TISSUE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ActiontissuePeer::ACTION_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ActiontissuePeer::TISSUE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the action_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionId(1234); // WHERE action_id = 1234
     * $query->filterByActionId(array(12, 34)); // WHERE action_id IN (12, 34)
     * $query->filterByActionId(array('min' => 12)); // WHERE action_id >= 12
     * $query->filterByActionId(array('max' => 12)); // WHERE action_id <= 12
     * </code>
     *
     * @see       filterByAction()
     *
     * @param     mixed $actionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(ActiontissuePeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(ActiontissuePeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontissuePeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query on the tissue_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTissueId(1234); // WHERE tissue_id = 1234
     * $query->filterByTissueId(array(12, 34)); // WHERE tissue_id IN (12, 34)
     * $query->filterByTissueId(array('min' => 12)); // WHERE tissue_id >= 12
     * $query->filterByTissueId(array('max' => 12)); // WHERE tissue_id <= 12
     * </code>
     *
     * @see       filterByTissue()
     *
     * @param     mixed $tissueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function filterByTissueId($tissueId = null, $comparison = null)
    {
        if (is_array($tissueId)) {
            $useMinMax = false;
            if (isset($tissueId['min'])) {
                $this->addUsingAlias(ActiontissuePeer::TISSUE_ID, $tissueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tissueId['max'])) {
                $this->addUsingAlias(ActiontissuePeer::TISSUE_ID, $tissueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontissuePeer::TISSUE_ID, $tissueId, $comparison);
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontissueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(ActiontissuePeer::ACTION_ID, $action->getId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontissuePeer::ACTION_ID, $action->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAction() only accepts arguments of type Action or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Action relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function joinAction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Action');

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
            $this->addJoinObject($join, 'Action');
        }

        return $this;
    }

    /**
     * Use the Action relation Action object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionQuery A secondary query class using the current class as primary query
     */
    public function useActionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Action', '\Webmis\Models\ActionQuery');
    }

    /**
     * Filter the query by a related Tissue object
     *
     * @param   Tissue|PropelObjectCollection $tissue The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontissueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTissue($tissue, $comparison = null)
    {
        if ($tissue instanceof Tissue) {
            return $this
                ->addUsingAlias(ActiontissuePeer::TISSUE_ID, $tissue->getId(), $comparison);
        } elseif ($tissue instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontissuePeer::TISSUE_ID, $tissue->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTissue() only accepts arguments of type Tissue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tissue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function joinTissue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tissue');

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
            $this->addJoinObject($join, 'Tissue');
        }

        return $this;
    }

    /**
     * Use the Tissue relation Tissue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TissueQuery A secondary query class using the current class as primary query
     */
    public function useTissueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTissue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tissue', '\Webmis\Models\TissueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Actiontissue $actiontissue Object to remove from the list of results
     *
     * @return ActiontissueQuery The current query, for fluid interface
     */
    public function prune($actiontissue = null)
    {
        if ($actiontissue) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ActiontissuePeer::ACTION_ID), $actiontissue->getActionId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ActiontissuePeer::TISSUE_ID), $actiontissue->getTissueId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
