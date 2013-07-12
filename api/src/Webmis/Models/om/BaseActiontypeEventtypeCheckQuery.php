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
use Webmis\Models\ActiontypeEventtypeCheck;
use Webmis\Models\ActiontypeEventtypeCheckPeer;
use Webmis\Models\ActiontypeEventtypeCheckQuery;
use Webmis\Models\Eventtype;

/**
 * Base class that represents a query for the 'ActionType_EventType_check' table.
 *
 *
 *
 * @method ActiontypeEventtypeCheckQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActiontypeEventtypeCheckQuery orderByActiontypeId($order = Criteria::ASC) Order by the actionType_id column
 * @method ActiontypeEventtypeCheckQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method ActiontypeEventtypeCheckQuery orderByRelatedActiontypeId($order = Criteria::ASC) Order by the related_actionType_id column
 * @method ActiontypeEventtypeCheckQuery orderByRelationtype($order = Criteria::ASC) Order by the relationType column
 *
 * @method ActiontypeEventtypeCheckQuery groupById() Group by the id column
 * @method ActiontypeEventtypeCheckQuery groupByActiontypeId() Group by the actionType_id column
 * @method ActiontypeEventtypeCheckQuery groupByEventtypeId() Group by the eventType_id column
 * @method ActiontypeEventtypeCheckQuery groupByRelatedActiontypeId() Group by the related_actionType_id column
 * @method ActiontypeEventtypeCheckQuery groupByRelationtype() Group by the relationType column
 *
 * @method ActiontypeEventtypeCheckQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActiontypeEventtypeCheckQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActiontypeEventtypeCheckQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActiontypeEventtypeCheckQuery leftJoinActiontypeRelatedByActiontypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeRelatedByActiontypeId relation
 * @method ActiontypeEventtypeCheckQuery rightJoinActiontypeRelatedByActiontypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeRelatedByActiontypeId relation
 * @method ActiontypeEventtypeCheckQuery innerJoinActiontypeRelatedByActiontypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeRelatedByActiontypeId relation
 *
 * @method ActiontypeEventtypeCheckQuery leftJoinEventtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Eventtype relation
 * @method ActiontypeEventtypeCheckQuery rightJoinEventtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Eventtype relation
 * @method ActiontypeEventtypeCheckQuery innerJoinEventtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Eventtype relation
 *
 * @method ActiontypeEventtypeCheckQuery leftJoinActiontypeRelatedByRelatedActiontypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeRelatedByRelatedActiontypeId relation
 * @method ActiontypeEventtypeCheckQuery rightJoinActiontypeRelatedByRelatedActiontypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeRelatedByRelatedActiontypeId relation
 * @method ActiontypeEventtypeCheckQuery innerJoinActiontypeRelatedByRelatedActiontypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeRelatedByRelatedActiontypeId relation
 *
 * @method ActiontypeEventtypeCheck findOne(PropelPDO $con = null) Return the first ActiontypeEventtypeCheck matching the query
 * @method ActiontypeEventtypeCheck findOneOrCreate(PropelPDO $con = null) Return the first ActiontypeEventtypeCheck matching the query, or a new ActiontypeEventtypeCheck object populated from the query conditions when no match is found
 *
 * @method ActiontypeEventtypeCheck findOneByActiontypeId(int $actionType_id) Return the first ActiontypeEventtypeCheck filtered by the actionType_id column
 * @method ActiontypeEventtypeCheck findOneByEventtypeId(int $eventType_id) Return the first ActiontypeEventtypeCheck filtered by the eventType_id column
 * @method ActiontypeEventtypeCheck findOneByRelatedActiontypeId(int $related_actionType_id) Return the first ActiontypeEventtypeCheck filtered by the related_actionType_id column
 * @method ActiontypeEventtypeCheck findOneByRelationtype(int $relationType) Return the first ActiontypeEventtypeCheck filtered by the relationType column
 *
 * @method array findById(int $id) Return ActiontypeEventtypeCheck objects filtered by the id column
 * @method array findByActiontypeId(int $actionType_id) Return ActiontypeEventtypeCheck objects filtered by the actionType_id column
 * @method array findByEventtypeId(int $eventType_id) Return ActiontypeEventtypeCheck objects filtered by the eventType_id column
 * @method array findByRelatedActiontypeId(int $related_actionType_id) Return ActiontypeEventtypeCheck objects filtered by the related_actionType_id column
 * @method array findByRelationtype(int $relationType) Return ActiontypeEventtypeCheck objects filtered by the relationType column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypeEventtypeCheckQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActiontypeEventtypeCheckQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActiontypeEventtypeCheck', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActiontypeEventtypeCheckQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActiontypeEventtypeCheckQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActiontypeEventtypeCheckQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActiontypeEventtypeCheckQuery) {
            return $criteria;
        }
        $query = new ActiontypeEventtypeCheckQuery();
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
     * @return   ActiontypeEventtypeCheck|ActiontypeEventtypeCheck[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActiontypeEventtypeCheckPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActiontypeEventtypeCheckPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActiontypeEventtypeCheck A model object, or null if the key is not found
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
     * @return                 ActiontypeEventtypeCheck A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `actionType_id`, `eventType_id`, `related_actionType_id`, `relationType` FROM `ActionType_EventType_check` WHERE `id` = :p0';
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
            $obj = new ActiontypeEventtypeCheck();
            $obj->hydrate($row);
            ActiontypeEventtypeCheckPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ActiontypeEventtypeCheck|ActiontypeEventtypeCheck[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActiontypeEventtypeCheck[]|mixed the list of results, formatted by the current formatter
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
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ID, $keys, Criteria::IN);
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
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ID, $id, $comparison);
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
     * @see       filterByActiontypeRelatedByActiontypeId()
     *
     * @param     mixed $actiontypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterByActiontypeId($actiontypeId = null, $comparison = null)
    {
        if (is_array($actiontypeId)) {
            $useMinMax = false;
            if (isset($actiontypeId['min'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, $actiontypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiontypeId['max'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, $actiontypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, $actiontypeId, $comparison);
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
     * @see       filterByEventtype()
     *
     * @param     mixed $eventtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
    }

    /**
     * Filter the query on the related_actionType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRelatedActiontypeId(1234); // WHERE related_actionType_id = 1234
     * $query->filterByRelatedActiontypeId(array(12, 34)); // WHERE related_actionType_id IN (12, 34)
     * $query->filterByRelatedActiontypeId(array('min' => 12)); // WHERE related_actionType_id >= 12
     * $query->filterByRelatedActiontypeId(array('max' => 12)); // WHERE related_actionType_id <= 12
     * </code>
     *
     * @see       filterByActiontypeRelatedByRelatedActiontypeId()
     *
     * @param     mixed $relatedActiontypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterByRelatedActiontypeId($relatedActiontypeId = null, $comparison = null)
    {
        if (is_array($relatedActiontypeId)) {
            $useMinMax = false;
            if (isset($relatedActiontypeId['min'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, $relatedActiontypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($relatedActiontypeId['max'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, $relatedActiontypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, $relatedActiontypeId, $comparison);
    }

    /**
     * Filter the query on the relationType column
     *
     * Example usage:
     * <code>
     * $query->filterByRelationtype(1234); // WHERE relationType = 1234
     * $query->filterByRelationtype(array(12, 34)); // WHERE relationType IN (12, 34)
     * $query->filterByRelationtype(array('min' => 12)); // WHERE relationType >= 12
     * $query->filterByRelationtype(array('max' => 12)); // WHERE relationType <= 12
     * </code>
     *
     * @param     mixed $relationtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function filterByRelationtype($relationtype = null, $comparison = null)
    {
        if (is_array($relationtype)) {
            $useMinMax = false;
            if (isset($relationtype['min'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATIONTYPE, $relationtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($relationtype['max'])) {
                $this->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATIONTYPE, $relationtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATIONTYPE, $relationtype, $comparison);
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeEventtypeCheckQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeRelatedByActiontypeId($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, $actiontype->getId(), $comparison);
        } elseif ($actiontype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypeEventtypeCheckPeer::ACTIONTYPE_ID, $actiontype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByActiontypeRelatedByActiontypeId() only accepts arguments of type Actiontype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeRelatedByActiontypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function joinActiontypeRelatedByActiontypeId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeRelatedByActiontypeId');

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
            $this->addJoinObject($join, 'ActiontypeRelatedByActiontypeId');
        }

        return $this;
    }

    /**
     * Use the ActiontypeRelatedByActiontypeId relation Actiontype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeRelatedByActiontypeIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontypeRelatedByActiontypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeRelatedByActiontypeId', '\Webmis\Models\ActiontypeQuery');
    }

    /**
     * Filter the query by a related Eventtype object
     *
     * @param   Eventtype|PropelObjectCollection $eventtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeEventtypeCheckQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventtype($eventtype, $comparison = null)
    {
        if ($eventtype instanceof Eventtype) {
            return $this
                ->addUsingAlias(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, $eventtype->getId(), $comparison);
        } elseif ($eventtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypeEventtypeCheckPeer::EVENTTYPE_ID, $eventtype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEventtype() only accepts arguments of type Eventtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Eventtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function joinEventtype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Eventtype');

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
            $this->addJoinObject($join, 'Eventtype');
        }

        return $this;
    }

    /**
     * Use the Eventtype relation Eventtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\EventtypeQuery A secondary query class using the current class as primary query
     */
    public function useEventtypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEventtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Eventtype', '\Webmis\Models\EventtypeQuery');
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeEventtypeCheckQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeRelatedByRelatedActiontypeId($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, $actiontype->getId(), $comparison);
        } elseif ($actiontype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypeEventtypeCheckPeer::RELATED_ACTIONTYPE_ID, $actiontype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByActiontypeRelatedByRelatedActiontypeId() only accepts arguments of type Actiontype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeRelatedByRelatedActiontypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function joinActiontypeRelatedByRelatedActiontypeId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeRelatedByRelatedActiontypeId');

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
            $this->addJoinObject($join, 'ActiontypeRelatedByRelatedActiontypeId');
        }

        return $this;
    }

    /**
     * Use the ActiontypeRelatedByRelatedActiontypeId relation Actiontype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeRelatedByRelatedActiontypeIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActiontypeRelatedByRelatedActiontypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeRelatedByRelatedActiontypeId', '\Webmis\Models\ActiontypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ActiontypeEventtypeCheck $actiontypeEventtypeCheck Object to remove from the list of results
     *
     * @return ActiontypeEventtypeCheckQuery The current query, for fluid interface
     */
    public function prune($actiontypeEventtypeCheck = null)
    {
        if ($actiontypeEventtypeCheck) {
            $this->addUsingAlias(ActiontypeEventtypeCheckPeer::ID, $actiontypeEventtypeCheck->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
