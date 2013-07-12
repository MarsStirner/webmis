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
use Webmis\Models\OrgstructureStock;
use Webmis\Models\Rbfinance;
use Webmis\Models\RbfinancePeer;
use Webmis\Models\RbfinanceQuery;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\Stocktrans;

/**
 * Base class that represents a query for the 'rbFinance' table.
 *
 *
 *
 * @method RbfinanceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbfinanceQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbfinanceQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbfinanceQuery groupById() Group by the id column
 * @method RbfinanceQuery groupByCode() Group by the code column
 * @method RbfinanceQuery groupByName() Group by the name column
 *
 * @method RbfinanceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbfinanceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbfinanceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbfinanceQuery leftJoinOrgstructureStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureStock relation
 * @method RbfinanceQuery rightJoinOrgstructureStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureStock relation
 * @method RbfinanceQuery innerJoinOrgstructureStock($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureStock relation
 *
 * @method RbfinanceQuery leftJoinStockmotionItemRelatedByFinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionItemRelatedByFinanceId relation
 * @method RbfinanceQuery rightJoinStockmotionItemRelatedByFinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionItemRelatedByFinanceId relation
 * @method RbfinanceQuery innerJoinStockmotionItemRelatedByFinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionItemRelatedByFinanceId relation
 *
 * @method RbfinanceQuery leftJoinStockmotionItemRelatedByOldfinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionItemRelatedByOldfinanceId relation
 * @method RbfinanceQuery rightJoinStockmotionItemRelatedByOldfinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionItemRelatedByOldfinanceId relation
 * @method RbfinanceQuery innerJoinStockmotionItemRelatedByOldfinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionItemRelatedByOldfinanceId relation
 *
 * @method RbfinanceQuery leftJoinStockrequisitionItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionItem relation
 * @method RbfinanceQuery rightJoinStockrequisitionItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionItem relation
 * @method RbfinanceQuery innerJoinStockrequisitionItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionItem relation
 *
 * @method RbfinanceQuery leftJoinStocktransRelatedByCrefinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StocktransRelatedByCrefinanceId relation
 * @method RbfinanceQuery rightJoinStocktransRelatedByCrefinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StocktransRelatedByCrefinanceId relation
 * @method RbfinanceQuery innerJoinStocktransRelatedByCrefinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the StocktransRelatedByCrefinanceId relation
 *
 * @method RbfinanceQuery leftJoinStocktransRelatedByDebfinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StocktransRelatedByDebfinanceId relation
 * @method RbfinanceQuery rightJoinStocktransRelatedByDebfinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StocktransRelatedByDebfinanceId relation
 * @method RbfinanceQuery innerJoinStocktransRelatedByDebfinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the StocktransRelatedByDebfinanceId relation
 *
 * @method Rbfinance findOne(PropelPDO $con = null) Return the first Rbfinance matching the query
 * @method Rbfinance findOneOrCreate(PropelPDO $con = null) Return the first Rbfinance matching the query, or a new Rbfinance object populated from the query conditions when no match is found
 *
 * @method Rbfinance findOneByCode(string $code) Return the first Rbfinance filtered by the code column
 * @method Rbfinance findOneByName(string $name) Return the first Rbfinance filtered by the name column
 *
 * @method array findById(int $id) Return Rbfinance objects filtered by the id column
 * @method array findByCode(string $code) Return Rbfinance objects filtered by the code column
 * @method array findByName(string $name) Return Rbfinance objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbfinanceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbfinanceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbfinance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbfinanceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbfinanceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbfinanceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbfinanceQuery) {
            return $criteria;
        }
        $query = new RbfinanceQuery();
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
     * @return   Rbfinance|Rbfinance[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbfinancePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbfinancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbfinance A model object, or null if the key is not found
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
     * @return                 Rbfinance A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name` FROM `rbFinance` WHERE `id` = :p0';
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
            $obj = new Rbfinance();
            $obj->hydrate($row);
            RbfinancePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbfinance|Rbfinance[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbfinance[]|mixed the list of results, formatted by the current formatter
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
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbfinancePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbfinancePeer::ID, $keys, Criteria::IN);
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
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbfinancePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbfinancePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbfinancePeer::ID, $id, $comparison);
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
     * @return RbfinanceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbfinancePeer::CODE, $code, $comparison);
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
     * @return RbfinanceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbfinancePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related OrgstructureStock object
     *
     * @param   OrgstructureStock|PropelObjectCollection $orgstructureStock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbfinanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureStock($orgstructureStock, $comparison = null)
    {
        if ($orgstructureStock instanceof OrgstructureStock) {
            return $this
                ->addUsingAlias(RbfinancePeer::ID, $orgstructureStock->getFinanceId(), $comparison);
        } elseif ($orgstructureStock instanceof PropelObjectCollection) {
            return $this
                ->useOrgstructureStockQuery()
                ->filterByPrimaryKeys($orgstructureStock->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrgstructureStock() only accepts arguments of type OrgstructureStock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureStock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function joinOrgstructureStock($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureStock');

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
            $this->addJoinObject($join, 'OrgstructureStock');
        }

        return $this;
    }

    /**
     * Use the OrgstructureStock relation OrgstructureStock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureStockQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureStockQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureStock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureStock', '\Webmis\Models\OrgstructureStockQuery');
    }

    /**
     * Filter the query by a related StockmotionItem object
     *
     * @param   StockmotionItem|PropelObjectCollection $stockmotionItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbfinanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionItemRelatedByFinanceId($stockmotionItem, $comparison = null)
    {
        if ($stockmotionItem instanceof StockmotionItem) {
            return $this
                ->addUsingAlias(RbfinancePeer::ID, $stockmotionItem->getFinanceId(), $comparison);
        } elseif ($stockmotionItem instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionItemRelatedByFinanceIdQuery()
                ->filterByPrimaryKeys($stockmotionItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionItemRelatedByFinanceId() only accepts arguments of type StockmotionItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionItemRelatedByFinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function joinStockmotionItemRelatedByFinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionItemRelatedByFinanceId');

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
            $this->addJoinObject($join, 'StockmotionItemRelatedByFinanceId');
        }

        return $this;
    }

    /**
     * Use the StockmotionItemRelatedByFinanceId relation StockmotionItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionItemQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionItemRelatedByFinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionItemRelatedByFinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionItemRelatedByFinanceId', '\Webmis\Models\StockmotionItemQuery');
    }

    /**
     * Filter the query by a related StockmotionItem object
     *
     * @param   StockmotionItem|PropelObjectCollection $stockmotionItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbfinanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionItemRelatedByOldfinanceId($stockmotionItem, $comparison = null)
    {
        if ($stockmotionItem instanceof StockmotionItem) {
            return $this
                ->addUsingAlias(RbfinancePeer::ID, $stockmotionItem->getOldfinanceId(), $comparison);
        } elseif ($stockmotionItem instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionItemRelatedByOldfinanceIdQuery()
                ->filterByPrimaryKeys($stockmotionItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionItemRelatedByOldfinanceId() only accepts arguments of type StockmotionItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionItemRelatedByOldfinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function joinStockmotionItemRelatedByOldfinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionItemRelatedByOldfinanceId');

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
            $this->addJoinObject($join, 'StockmotionItemRelatedByOldfinanceId');
        }

        return $this;
    }

    /**
     * Use the StockmotionItemRelatedByOldfinanceId relation StockmotionItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionItemQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionItemRelatedByOldfinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionItemRelatedByOldfinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionItemRelatedByOldfinanceId', '\Webmis\Models\StockmotionItemQuery');
    }

    /**
     * Filter the query by a related StockrequisitionItem object
     *
     * @param   StockrequisitionItem|PropelObjectCollection $stockrequisitionItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbfinanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionItem($stockrequisitionItem, $comparison = null)
    {
        if ($stockrequisitionItem instanceof StockrequisitionItem) {
            return $this
                ->addUsingAlias(RbfinancePeer::ID, $stockrequisitionItem->getFinanceId(), $comparison);
        } elseif ($stockrequisitionItem instanceof PropelObjectCollection) {
            return $this
                ->useStockrequisitionItemQuery()
                ->filterByPrimaryKeys($stockrequisitionItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrequisitionItem() only accepts arguments of type StockrequisitionItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrequisitionItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function joinStockrequisitionItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrequisitionItem');

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
            $this->addJoinObject($join, 'StockrequisitionItem');
        }

        return $this;
    }

    /**
     * Use the StockrequisitionItem relation StockrequisitionItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionItemQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrequisitionItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrequisitionItem', '\Webmis\Models\StockrequisitionItemQuery');
    }

    /**
     * Filter the query by a related Stocktrans object
     *
     * @param   Stocktrans|PropelObjectCollection $stocktrans  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbfinanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktransRelatedByCrefinanceId($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(RbfinancePeer::ID, $stocktrans->getCrefinanceId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransRelatedByCrefinanceIdQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktransRelatedByCrefinanceId() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StocktransRelatedByCrefinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function joinStocktransRelatedByCrefinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StocktransRelatedByCrefinanceId');

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
            $this->addJoinObject($join, 'StocktransRelatedByCrefinanceId');
        }

        return $this;
    }

    /**
     * Use the StocktransRelatedByCrefinanceId relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransRelatedByCrefinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStocktransRelatedByCrefinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StocktransRelatedByCrefinanceId', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Filter the query by a related Stocktrans object
     *
     * @param   Stocktrans|PropelObjectCollection $stocktrans  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbfinanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktransRelatedByDebfinanceId($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(RbfinancePeer::ID, $stocktrans->getDebfinanceId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransRelatedByDebfinanceIdQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktransRelatedByDebfinanceId() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StocktransRelatedByDebfinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function joinStocktransRelatedByDebfinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StocktransRelatedByDebfinanceId');

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
            $this->addJoinObject($join, 'StocktransRelatedByDebfinanceId');
        }

        return $this;
    }

    /**
     * Use the StocktransRelatedByDebfinanceId relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransRelatedByDebfinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStocktransRelatedByDebfinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StocktransRelatedByDebfinanceId', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbfinance $rbfinance Object to remove from the list of results
     *
     * @return RbfinanceQuery The current query, for fluid interface
     */
    public function prune($rbfinance = null)
    {
        if ($rbfinance) {
            $this->addUsingAlias(RbfinancePeer::ID, $rbfinance->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
