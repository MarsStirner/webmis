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
use Webmis\Models\Couponstransferquotes;
use Webmis\Models\Rbtimequotingtype;
use Webmis\Models\RbtimequotingtypePeer;
use Webmis\Models\RbtimequotingtypeQuery;

/**
 * Base class that represents a query for the 'rbTimeQuotingType' table.
 *
 *
 *
 * @method RbtimequotingtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbtimequotingtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbtimequotingtypeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbtimequotingtypeQuery groupById() Group by the id column
 * @method RbtimequotingtypeQuery groupByCode() Group by the code column
 * @method RbtimequotingtypeQuery groupByName() Group by the name column
 *
 * @method RbtimequotingtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbtimequotingtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbtimequotingtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbtimequotingtypeQuery leftJoinCouponstransferquotesRelatedBySrcquotingtypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the CouponstransferquotesRelatedBySrcquotingtypeId relation
 * @method RbtimequotingtypeQuery rightJoinCouponstransferquotesRelatedBySrcquotingtypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CouponstransferquotesRelatedBySrcquotingtypeId relation
 * @method RbtimequotingtypeQuery innerJoinCouponstransferquotesRelatedBySrcquotingtypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the CouponstransferquotesRelatedBySrcquotingtypeId relation
 *
 * @method RbtimequotingtypeQuery leftJoinCouponstransferquotesRelatedByDstquotingtypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the CouponstransferquotesRelatedByDstquotingtypeId relation
 * @method RbtimequotingtypeQuery rightJoinCouponstransferquotesRelatedByDstquotingtypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CouponstransferquotesRelatedByDstquotingtypeId relation
 * @method RbtimequotingtypeQuery innerJoinCouponstransferquotesRelatedByDstquotingtypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the CouponstransferquotesRelatedByDstquotingtypeId relation
 *
 * @method Rbtimequotingtype findOne(PropelPDO $con = null) Return the first Rbtimequotingtype matching the query
 * @method Rbtimequotingtype findOneOrCreate(PropelPDO $con = null) Return the first Rbtimequotingtype matching the query, or a new Rbtimequotingtype object populated from the query conditions when no match is found
 *
 * @method Rbtimequotingtype findOneByCode(int $code) Return the first Rbtimequotingtype filtered by the code column
 * @method Rbtimequotingtype findOneByName(string $name) Return the first Rbtimequotingtype filtered by the name column
 *
 * @method array findById(int $id) Return Rbtimequotingtype objects filtered by the id column
 * @method array findByCode(int $code) Return Rbtimequotingtype objects filtered by the code column
 * @method array findByName(string $name) Return Rbtimequotingtype objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtimequotingtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbtimequotingtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbtimequotingtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbtimequotingtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbtimequotingtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbtimequotingtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbtimequotingtypeQuery) {
            return $criteria;
        }
        $query = new RbtimequotingtypeQuery();
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
     * @return   Rbtimequotingtype|Rbtimequotingtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbtimequotingtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbtimequotingtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbtimequotingtype A model object, or null if the key is not found
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
     * @return                 Rbtimequotingtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name` FROM `rbTimeQuotingType` WHERE `id` = :p0';
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
            $obj = new Rbtimequotingtype();
            $obj->hydrate($row);
            RbtimequotingtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbtimequotingtype|Rbtimequotingtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbtimequotingtype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbtimequotingtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbtimequotingtypePeer::ID, $keys, Criteria::IN);
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
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbtimequotingtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbtimequotingtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtimequotingtypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode(1234); // WHERE code = 1234
     * $query->filterByCode(array(12, 34)); // WHERE code IN (12, 34)
     * $query->filterByCode(array('min' => 12)); // WHERE code >= 12
     * $query->filterByCode(array('max' => 12)); // WHERE code <= 12
     * </code>
     *
     * @param     mixed $code The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(RbtimequotingtypePeer::CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(RbtimequotingtypePeer::CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtimequotingtypePeer::CODE, $code, $comparison);
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
     * @return RbtimequotingtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtimequotingtypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related Couponstransferquotes object
     *
     * @param   Couponstransferquotes|PropelObjectCollection $couponstransferquotes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtimequotingtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCouponstransferquotesRelatedBySrcquotingtypeId($couponstransferquotes, $comparison = null)
    {
        if ($couponstransferquotes instanceof Couponstransferquotes) {
            return $this
                ->addUsingAlias(RbtimequotingtypePeer::CODE, $couponstransferquotes->getSrcquotingtypeId(), $comparison);
        } elseif ($couponstransferquotes instanceof PropelObjectCollection) {
            return $this
                ->useCouponstransferquotesRelatedBySrcquotingtypeIdQuery()
                ->filterByPrimaryKeys($couponstransferquotes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCouponstransferquotesRelatedBySrcquotingtypeId() only accepts arguments of type Couponstransferquotes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CouponstransferquotesRelatedBySrcquotingtypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function joinCouponstransferquotesRelatedBySrcquotingtypeId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CouponstransferquotesRelatedBySrcquotingtypeId');

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
            $this->addJoinObject($join, 'CouponstransferquotesRelatedBySrcquotingtypeId');
        }

        return $this;
    }

    /**
     * Use the CouponstransferquotesRelatedBySrcquotingtypeId relation Couponstransferquotes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\CouponstransferquotesQuery A secondary query class using the current class as primary query
     */
    public function useCouponstransferquotesRelatedBySrcquotingtypeIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCouponstransferquotesRelatedBySrcquotingtypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CouponstransferquotesRelatedBySrcquotingtypeId', '\Webmis\Models\CouponstransferquotesQuery');
    }

    /**
     * Filter the query by a related Couponstransferquotes object
     *
     * @param   Couponstransferquotes|PropelObjectCollection $couponstransferquotes  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtimequotingtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCouponstransferquotesRelatedByDstquotingtypeId($couponstransferquotes, $comparison = null)
    {
        if ($couponstransferquotes instanceof Couponstransferquotes) {
            return $this
                ->addUsingAlias(RbtimequotingtypePeer::CODE, $couponstransferquotes->getDstquotingtypeId(), $comparison);
        } elseif ($couponstransferquotes instanceof PropelObjectCollection) {
            return $this
                ->useCouponstransferquotesRelatedByDstquotingtypeIdQuery()
                ->filterByPrimaryKeys($couponstransferquotes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByCouponstransferquotesRelatedByDstquotingtypeId() only accepts arguments of type Couponstransferquotes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CouponstransferquotesRelatedByDstquotingtypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function joinCouponstransferquotesRelatedByDstquotingtypeId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CouponstransferquotesRelatedByDstquotingtypeId');

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
            $this->addJoinObject($join, 'CouponstransferquotesRelatedByDstquotingtypeId');
        }

        return $this;
    }

    /**
     * Use the CouponstransferquotesRelatedByDstquotingtypeId relation Couponstransferquotes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\CouponstransferquotesQuery A secondary query class using the current class as primary query
     */
    public function useCouponstransferquotesRelatedByDstquotingtypeIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCouponstransferquotesRelatedByDstquotingtypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CouponstransferquotesRelatedByDstquotingtypeId', '\Webmis\Models\CouponstransferquotesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbtimequotingtype $rbtimequotingtype Object to remove from the list of results
     *
     * @return RbtimequotingtypeQuery The current query, for fluid interface
     */
    public function prune($rbtimequotingtype = null)
    {
        if ($rbtimequotingtype) {
            $this->addUsingAlias(RbtimequotingtypePeer::ID, $rbtimequotingtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
