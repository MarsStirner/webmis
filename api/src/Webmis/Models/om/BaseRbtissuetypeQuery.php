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
use Webmis\Models\ActiontypeTissuetype;
use Webmis\Models\EventtypeAction;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\RbtissuetypePeer;
use Webmis\Models\RbtissuetypeQuery;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\Tissue;

/**
 * Base class that represents a query for the 'rbTissueType' table.
 *
 *
 *
 * @method RbtissuetypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbtissuetypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbtissuetypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbtissuetypeQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method RbtissuetypeQuery orderBySex($order = Criteria::ASC) Order by the sex column
 *
 * @method RbtissuetypeQuery groupById() Group by the id column
 * @method RbtissuetypeQuery groupByCode() Group by the code column
 * @method RbtissuetypeQuery groupByName() Group by the name column
 * @method RbtissuetypeQuery groupByGroupId() Group by the group_id column
 * @method RbtissuetypeQuery groupBySex() Group by the sex column
 *
 * @method RbtissuetypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbtissuetypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbtissuetypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbtissuetypeQuery leftJoinRbtissuetypeRelatedByGroupId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbtissuetypeRelatedByGroupId relation
 * @method RbtissuetypeQuery rightJoinRbtissuetypeRelatedByGroupId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbtissuetypeRelatedByGroupId relation
 * @method RbtissuetypeQuery innerJoinRbtissuetypeRelatedByGroupId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbtissuetypeRelatedByGroupId relation
 *
 * @method RbtissuetypeQuery leftJoinActiontypeTissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeTissuetype relation
 * @method RbtissuetypeQuery rightJoinActiontypeTissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeTissuetype relation
 * @method RbtissuetypeQuery innerJoinActiontypeTissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeTissuetype relation
 *
 * @method RbtissuetypeQuery leftJoinEventtypeAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventtypeAction relation
 * @method RbtissuetypeQuery rightJoinEventtypeAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventtypeAction relation
 * @method RbtissuetypeQuery innerJoinEventtypeAction($relationAlias = null) Adds a INNER JOIN clause to the query using the EventtypeAction relation
 *
 * @method RbtissuetypeQuery leftJoinTakentissuejournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Takentissuejournal relation
 * @method RbtissuetypeQuery rightJoinTakentissuejournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Takentissuejournal relation
 * @method RbtissuetypeQuery innerJoinTakentissuejournal($relationAlias = null) Adds a INNER JOIN clause to the query using the Takentissuejournal relation
 *
 * @method RbtissuetypeQuery leftJoinTissue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tissue relation
 * @method RbtissuetypeQuery rightJoinTissue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tissue relation
 * @method RbtissuetypeQuery innerJoinTissue($relationAlias = null) Adds a INNER JOIN clause to the query using the Tissue relation
 *
 * @method RbtissuetypeQuery leftJoinRbtissuetypeRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbtissuetypeRelatedById relation
 * @method RbtissuetypeQuery rightJoinRbtissuetypeRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbtissuetypeRelatedById relation
 * @method RbtissuetypeQuery innerJoinRbtissuetypeRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the RbtissuetypeRelatedById relation
 *
 * @method Rbtissuetype findOne(PropelPDO $con = null) Return the first Rbtissuetype matching the query
 * @method Rbtissuetype findOneOrCreate(PropelPDO $con = null) Return the first Rbtissuetype matching the query, or a new Rbtissuetype object populated from the query conditions when no match is found
 *
 * @method Rbtissuetype findOneByCode(string $code) Return the first Rbtissuetype filtered by the code column
 * @method Rbtissuetype findOneByName(string $name) Return the first Rbtissuetype filtered by the name column
 * @method Rbtissuetype findOneByGroupId(int $group_id) Return the first Rbtissuetype filtered by the group_id column
 * @method Rbtissuetype findOneBySex(int $sex) Return the first Rbtissuetype filtered by the sex column
 *
 * @method array findById(int $id) Return Rbtissuetype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbtissuetype objects filtered by the code column
 * @method array findByName(string $name) Return Rbtissuetype objects filtered by the name column
 * @method array findByGroupId(int $group_id) Return Rbtissuetype objects filtered by the group_id column
 * @method array findBySex(int $sex) Return Rbtissuetype objects filtered by the sex column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtissuetypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbtissuetypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbtissuetype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbtissuetypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbtissuetypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbtissuetypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbtissuetypeQuery) {
            return $criteria;
        }
        $query = new RbtissuetypeQuery();
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
     * @return   Rbtissuetype|Rbtissuetype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbtissuetypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbtissuetypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbtissuetype A model object, or null if the key is not found
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
     * @return                 Rbtissuetype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `group_id`, `sex` FROM `rbTissueType` WHERE `id` = :p0';
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
            $obj = new Rbtissuetype();
            $obj->hydrate($row);
            RbtissuetypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbtissuetype|Rbtissuetype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbtissuetype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbtissuetypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbtissuetypePeer::ID, $keys, Criteria::IN);
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
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbtissuetypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbtissuetypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtissuetypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbtissuetypePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbtissuetypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id >= 12
     * $query->filterByGroupId(array('max' => 12)); // WHERE group_id <= 12
     * </code>
     *
     * @see       filterByRbtissuetypeRelatedByGroupId()
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(RbtissuetypePeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(RbtissuetypePeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtissuetypePeer::GROUP_ID, $groupId, $comparison);
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
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(RbtissuetypePeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(RbtissuetypePeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtissuetypePeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query by a related Rbtissuetype object
     *
     * @param   Rbtissuetype|PropelObjectCollection $rbtissuetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtissuetypeRelatedByGroupId($rbtissuetype, $comparison = null)
    {
        if ($rbtissuetype instanceof Rbtissuetype) {
            return $this
                ->addUsingAlias(RbtissuetypePeer::GROUP_ID, $rbtissuetype->getId(), $comparison);
        } elseif ($rbtissuetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbtissuetypePeer::GROUP_ID, $rbtissuetype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtissuetypeRelatedByGroupId() only accepts arguments of type Rbtissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbtissuetypeRelatedByGroupId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function joinRbtissuetypeRelatedByGroupId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbtissuetypeRelatedByGroupId');

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
            $this->addJoinObject($join, 'RbtissuetypeRelatedByGroupId');
        }

        return $this;
    }

    /**
     * Use the RbtissuetypeRelatedByGroupId relation Rbtissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtissuetypeRelatedByGroupIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbtissuetypeRelatedByGroupId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbtissuetypeRelatedByGroupId', '\Webmis\Models\RbtissuetypeQuery');
    }

    /**
     * Filter the query by a related ActiontypeTissuetype object
     *
     * @param   ActiontypeTissuetype|PropelObjectCollection $actiontypeTissuetype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeTissuetype($actiontypeTissuetype, $comparison = null)
    {
        if ($actiontypeTissuetype instanceof ActiontypeTissuetype) {
            return $this
                ->addUsingAlias(RbtissuetypePeer::ID, $actiontypeTissuetype->getTissuetypeId(), $comparison);
        } elseif ($actiontypeTissuetype instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeTissuetypeQuery()
                ->filterByPrimaryKeys($actiontypeTissuetype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontypeTissuetype() only accepts arguments of type ActiontypeTissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeTissuetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function joinActiontypeTissuetype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeTissuetype');

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
            $this->addJoinObject($join, 'ActiontypeTissuetype');
        }

        return $this;
    }

    /**
     * Use the ActiontypeTissuetype relation ActiontypeTissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeTissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeTissuetypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActiontypeTissuetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeTissuetype', '\Webmis\Models\ActiontypeTissuetypeQuery');
    }

    /**
     * Filter the query by a related EventtypeAction object
     *
     * @param   EventtypeAction|PropelObjectCollection $eventtypeAction  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventtypeAction($eventtypeAction, $comparison = null)
    {
        if ($eventtypeAction instanceof EventtypeAction) {
            return $this
                ->addUsingAlias(RbtissuetypePeer::ID, $eventtypeAction->getTissuetypeId(), $comparison);
        } elseif ($eventtypeAction instanceof PropelObjectCollection) {
            return $this
                ->useEventtypeActionQuery()
                ->filterByPrimaryKeys($eventtypeAction->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventtypeAction() only accepts arguments of type EventtypeAction or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventtypeAction relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function joinEventtypeAction($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventtypeAction');

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
            $this->addJoinObject($join, 'EventtypeAction');
        }

        return $this;
    }

    /**
     * Use the EventtypeAction relation EventtypeAction object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\EventtypeActionQuery A secondary query class using the current class as primary query
     */
    public function useEventtypeActionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEventtypeAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventtypeAction', '\Webmis\Models\EventtypeActionQuery');
    }

    /**
     * Filter the query by a related Takentissuejournal object
     *
     * @param   Takentissuejournal|PropelObjectCollection $takentissuejournal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTakentissuejournal($takentissuejournal, $comparison = null)
    {
        if ($takentissuejournal instanceof Takentissuejournal) {
            return $this
                ->addUsingAlias(RbtissuetypePeer::ID, $takentissuejournal->getTissuetypeId(), $comparison);
        } elseif ($takentissuejournal instanceof PropelObjectCollection) {
            return $this
                ->useTakentissuejournalQuery()
                ->filterByPrimaryKeys($takentissuejournal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTakentissuejournal() only accepts arguments of type Takentissuejournal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Takentissuejournal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function joinTakentissuejournal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Takentissuejournal');

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
            $this->addJoinObject($join, 'Takentissuejournal');
        }

        return $this;
    }

    /**
     * Use the Takentissuejournal relation Takentissuejournal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TakentissuejournalQuery A secondary query class using the current class as primary query
     */
    public function useTakentissuejournalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTakentissuejournal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Takentissuejournal', '\Webmis\Models\TakentissuejournalQuery');
    }

    /**
     * Filter the query by a related Tissue object
     *
     * @param   Tissue|PropelObjectCollection $tissue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTissue($tissue, $comparison = null)
    {
        if ($tissue instanceof Tissue) {
            return $this
                ->addUsingAlias(RbtissuetypePeer::ID, $tissue->getTypeId(), $comparison);
        } elseif ($tissue instanceof PropelObjectCollection) {
            return $this
                ->useTissueQuery()
                ->filterByPrimaryKeys($tissue->getPrimaryKeys())
                ->endUse();
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
     * @return RbtissuetypeQuery The current query, for fluid interface
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
     * Filter the query by a related Rbtissuetype object
     *
     * @param   Rbtissuetype|PropelObjectCollection $rbtissuetype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtissuetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtissuetypeRelatedById($rbtissuetype, $comparison = null)
    {
        if ($rbtissuetype instanceof Rbtissuetype) {
            return $this
                ->addUsingAlias(RbtissuetypePeer::ID, $rbtissuetype->getGroupId(), $comparison);
        } elseif ($rbtissuetype instanceof PropelObjectCollection) {
            return $this
                ->useRbtissuetypeRelatedByIdQuery()
                ->filterByPrimaryKeys($rbtissuetype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbtissuetypeRelatedById() only accepts arguments of type Rbtissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbtissuetypeRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function joinRbtissuetypeRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbtissuetypeRelatedById');

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
            $this->addJoinObject($join, 'RbtissuetypeRelatedById');
        }

        return $this;
    }

    /**
     * Use the RbtissuetypeRelatedById relation Rbtissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtissuetypeRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbtissuetypeRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbtissuetypeRelatedById', '\Webmis\Models\RbtissuetypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbtissuetype $rbtissuetype Object to remove from the list of results
     *
     * @return RbtissuetypeQuery The current query, for fluid interface
     */
    public function prune($rbtissuetype = null)
    {
        if ($rbtissuetype) {
            $this->addUsingAlias(RbtissuetypePeer::ID, $rbtissuetype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
