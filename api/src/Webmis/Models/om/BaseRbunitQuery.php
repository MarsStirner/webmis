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
use Webmis\Models\Rbtesttubetype;
use Webmis\Models\Rbunit;
use Webmis\Models\RbunitPeer;
use Webmis\Models\RbunitQuery;
use Webmis\Models\Takentissuejournal;

/**
 * Base class that represents a query for the 'rbUnit' table.
 *
 *
 *
 * @method RbunitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbunitQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbunitQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbunitQuery groupById() Group by the id column
 * @method RbunitQuery groupByCode() Group by the code column
 * @method RbunitQuery groupByName() Group by the name column
 *
 * @method RbunitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbunitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbunitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbunitQuery leftJoinActiontypeTissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeTissuetype relation
 * @method RbunitQuery rightJoinActiontypeTissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeTissuetype relation
 * @method RbunitQuery innerJoinActiontypeTissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeTissuetype relation
 *
 * @method RbunitQuery leftJoinTakentissuejournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Takentissuejournal relation
 * @method RbunitQuery rightJoinTakentissuejournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Takentissuejournal relation
 * @method RbunitQuery innerJoinTakentissuejournal($relationAlias = null) Adds a INNER JOIN clause to the query using the Takentissuejournal relation
 *
 * @method RbunitQuery leftJoinRbtesttubetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtesttubetype relation
 * @method RbunitQuery rightJoinRbtesttubetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtesttubetype relation
 * @method RbunitQuery innerJoinRbtesttubetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtesttubetype relation
 *
 * @method Rbunit findOne(PropelPDO $con = null) Return the first Rbunit matching the query
 * @method Rbunit findOneOrCreate(PropelPDO $con = null) Return the first Rbunit matching the query, or a new Rbunit object populated from the query conditions when no match is found
 *
 * @method Rbunit findOneByCode(string $code) Return the first Rbunit filtered by the code column
 * @method Rbunit findOneByName(string $name) Return the first Rbunit filtered by the name column
 *
 * @method array findById(int $id) Return Rbunit objects filtered by the id column
 * @method array findByCode(string $code) Return Rbunit objects filtered by the code column
 * @method array findByName(string $name) Return Rbunit objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbunitQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbunitQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbunit', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbunitQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbunitQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbunitQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbunitQuery) {
            return $criteria;
        }
        $query = new RbunitQuery();
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
     * @return   Rbunit|Rbunit[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbunitPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbunit A model object, or null if the key is not found
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
     * @return                 Rbunit A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name` FROM `rbUnit` WHERE `id` = :p0';
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
            $obj = new Rbunit();
            $obj->hydrate($row);
            RbunitPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbunit|Rbunit[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbunit[]|mixed the list of results, formatted by the current formatter
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
     * @return RbunitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbunitPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbunitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbunitPeer::ID, $keys, Criteria::IN);
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
     * @return RbunitQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbunitPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbunitPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbunitPeer::ID, $id, $comparison);
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
     * @return RbunitQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbunitPeer::CODE, $code, $comparison);
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
     * @return RbunitQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbunitPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ActiontypeTissuetype object
     *
     * @param   ActiontypeTissuetype|PropelObjectCollection $actiontypeTissuetype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeTissuetype($actiontypeTissuetype, $comparison = null)
    {
        if ($actiontypeTissuetype instanceof ActiontypeTissuetype) {
            return $this
                ->addUsingAlias(RbunitPeer::ID, $actiontypeTissuetype->getUnitId(), $comparison);
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
     * @return RbunitQuery The current query, for fluid interface
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
     * Filter the query by a related Takentissuejournal object
     *
     * @param   Takentissuejournal|PropelObjectCollection $takentissuejournal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTakentissuejournal($takentissuejournal, $comparison = null)
    {
        if ($takentissuejournal instanceof Takentissuejournal) {
            return $this
                ->addUsingAlias(RbunitPeer::ID, $takentissuejournal->getUnitId(), $comparison);
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
     * @return RbunitQuery The current query, for fluid interface
     */
    public function joinTakentissuejournal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTakentissuejournalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTakentissuejournal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Takentissuejournal', '\Webmis\Models\TakentissuejournalQuery');
    }

    /**
     * Filter the query by a related Rbtesttubetype object
     *
     * @param   Rbtesttubetype|PropelObjectCollection $rbtesttubetype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtesttubetype($rbtesttubetype, $comparison = null)
    {
        if ($rbtesttubetype instanceof Rbtesttubetype) {
            return $this
                ->addUsingAlias(RbunitPeer::ID, $rbtesttubetype->getUnitId(), $comparison);
        } elseif ($rbtesttubetype instanceof PropelObjectCollection) {
            return $this
                ->useRbtesttubetypeQuery()
                ->filterByPrimaryKeys($rbtesttubetype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbtesttubetype() only accepts arguments of type Rbtesttubetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtesttubetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbunitQuery The current query, for fluid interface
     */
    public function joinRbtesttubetype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtesttubetype');

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
            $this->addJoinObject($join, 'Rbtesttubetype');
        }

        return $this;
    }

    /**
     * Use the Rbtesttubetype relation Rbtesttubetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtesttubetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtesttubetypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtesttubetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtesttubetype', '\Webmis\Models\RbtesttubetypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbunit $rbunit Object to remove from the list of results
     *
     * @return RbunitQuery The current query, for fluid interface
     */
    public function prune($rbunit = null)
    {
        if ($rbunit) {
            $this->addUsingAlias(RbunitPeer::ID, $rbunit->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
