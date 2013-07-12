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
use Webmis\Models\Rbfinance;
use Webmis\Models\Rbnomenclature;
use Webmis\Models\Stockrequisition;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\StockrequisitionItemPeer;
use Webmis\Models\StockrequisitionItemQuery;

/**
 * Base class that represents a query for the 'StockRequisition_Item' table.
 *
 *
 *
 * @method StockrequisitionItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StockrequisitionItemQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method StockrequisitionItemQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method StockrequisitionItemQuery orderByNomenclatureId($order = Criteria::ASC) Order by the nomenclature_id column
 * @method StockrequisitionItemQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method StockrequisitionItemQuery orderByQnt($order = Criteria::ASC) Order by the qnt column
 * @method StockrequisitionItemQuery orderBySatisfiedqnt($order = Criteria::ASC) Order by the satisfiedQnt column
 *
 * @method StockrequisitionItemQuery groupById() Group by the id column
 * @method StockrequisitionItemQuery groupByMasterId() Group by the master_id column
 * @method StockrequisitionItemQuery groupByIdx() Group by the idx column
 * @method StockrequisitionItemQuery groupByNomenclatureId() Group by the nomenclature_id column
 * @method StockrequisitionItemQuery groupByFinanceId() Group by the finance_id column
 * @method StockrequisitionItemQuery groupByQnt() Group by the qnt column
 * @method StockrequisitionItemQuery groupBySatisfiedqnt() Group by the satisfiedQnt column
 *
 * @method StockrequisitionItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StockrequisitionItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StockrequisitionItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StockrequisitionItemQuery leftJoinRbfinance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbfinance relation
 * @method StockrequisitionItemQuery rightJoinRbfinance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbfinance relation
 * @method StockrequisitionItemQuery innerJoinRbfinance($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbfinance relation
 *
 * @method StockrequisitionItemQuery leftJoinStockrequisition($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stockrequisition relation
 * @method StockrequisitionItemQuery rightJoinStockrequisition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stockrequisition relation
 * @method StockrequisitionItemQuery innerJoinStockrequisition($relationAlias = null) Adds a INNER JOIN clause to the query using the Stockrequisition relation
 *
 * @method StockrequisitionItemQuery leftJoinRbnomenclature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbnomenclature relation
 * @method StockrequisitionItemQuery rightJoinRbnomenclature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbnomenclature relation
 * @method StockrequisitionItemQuery innerJoinRbnomenclature($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbnomenclature relation
 *
 * @method StockrequisitionItem findOne(PropelPDO $con = null) Return the first StockrequisitionItem matching the query
 * @method StockrequisitionItem findOneOrCreate(PropelPDO $con = null) Return the first StockrequisitionItem matching the query, or a new StockrequisitionItem object populated from the query conditions when no match is found
 *
 * @method StockrequisitionItem findOneByMasterId(int $master_id) Return the first StockrequisitionItem filtered by the master_id column
 * @method StockrequisitionItem findOneByIdx(int $idx) Return the first StockrequisitionItem filtered by the idx column
 * @method StockrequisitionItem findOneByNomenclatureId(int $nomenclature_id) Return the first StockrequisitionItem filtered by the nomenclature_id column
 * @method StockrequisitionItem findOneByFinanceId(int $finance_id) Return the first StockrequisitionItem filtered by the finance_id column
 * @method StockrequisitionItem findOneByQnt(double $qnt) Return the first StockrequisitionItem filtered by the qnt column
 * @method StockrequisitionItem findOneBySatisfiedqnt(double $satisfiedQnt) Return the first StockrequisitionItem filtered by the satisfiedQnt column
 *
 * @method array findById(int $id) Return StockrequisitionItem objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return StockrequisitionItem objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return StockrequisitionItem objects filtered by the idx column
 * @method array findByNomenclatureId(int $nomenclature_id) Return StockrequisitionItem objects filtered by the nomenclature_id column
 * @method array findByFinanceId(int $finance_id) Return StockrequisitionItem objects filtered by the finance_id column
 * @method array findByQnt(double $qnt) Return StockrequisitionItem objects filtered by the qnt column
 * @method array findBySatisfiedqnt(double $satisfiedQnt) Return StockrequisitionItem objects filtered by the satisfiedQnt column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockrequisitionItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStockrequisitionItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\StockrequisitionItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StockrequisitionItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StockrequisitionItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StockrequisitionItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StockrequisitionItemQuery) {
            return $criteria;
        }
        $query = new StockrequisitionItemQuery();
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
     * @return   StockrequisitionItem|StockrequisitionItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StockrequisitionItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StockrequisitionItem A model object, or null if the key is not found
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
     * @return                 StockrequisitionItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `nomenclature_id`, `finance_id`, `qnt`, `satisfiedQnt` FROM `StockRequisition_Item` WHERE `id` = :p0';
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
            $obj = new StockrequisitionItem();
            $obj->hydrate($row);
            StockrequisitionItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StockrequisitionItem|StockrequisitionItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StockrequisitionItem[]|mixed the list of results, formatted by the current formatter
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
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StockrequisitionItemPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StockrequisitionItemPeer::ID, $keys, Criteria::IN);
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
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::ID, $id, $comparison);
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
     * @see       filterByStockrequisition()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::MASTER_ID, $masterId, $comparison);
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
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the nomenclature_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNomenclatureId(1234); // WHERE nomenclature_id = 1234
     * $query->filterByNomenclatureId(array(12, 34)); // WHERE nomenclature_id IN (12, 34)
     * $query->filterByNomenclatureId(array('min' => 12)); // WHERE nomenclature_id >= 12
     * $query->filterByNomenclatureId(array('max' => 12)); // WHERE nomenclature_id <= 12
     * </code>
     *
     * @see       filterByRbnomenclature()
     *
     * @param     mixed $nomenclatureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByNomenclatureId($nomenclatureId = null, $comparison = null)
    {
        if (is_array($nomenclatureId)) {
            $useMinMax = false;
            if (isset($nomenclatureId['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::NOMENCLATURE_ID, $nomenclatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nomenclatureId['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::NOMENCLATURE_ID, $nomenclatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::NOMENCLATURE_ID, $nomenclatureId, $comparison);
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
     * @see       filterByRbfinance()
     *
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the qnt column
     *
     * Example usage:
     * <code>
     * $query->filterByQnt(1234); // WHERE qnt = 1234
     * $query->filterByQnt(array(12, 34)); // WHERE qnt IN (12, 34)
     * $query->filterByQnt(array('min' => 12)); // WHERE qnt >= 12
     * $query->filterByQnt(array('max' => 12)); // WHERE qnt <= 12
     * </code>
     *
     * @param     mixed $qnt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterByQnt($qnt = null, $comparison = null)
    {
        if (is_array($qnt)) {
            $useMinMax = false;
            if (isset($qnt['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::QNT, $qnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qnt['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::QNT, $qnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::QNT, $qnt, $comparison);
    }

    /**
     * Filter the query on the satisfiedQnt column
     *
     * Example usage:
     * <code>
     * $query->filterBySatisfiedqnt(1234); // WHERE satisfiedQnt = 1234
     * $query->filterBySatisfiedqnt(array(12, 34)); // WHERE satisfiedQnt IN (12, 34)
     * $query->filterBySatisfiedqnt(array('min' => 12)); // WHERE satisfiedQnt >= 12
     * $query->filterBySatisfiedqnt(array('max' => 12)); // WHERE satisfiedQnt <= 12
     * </code>
     *
     * @param     mixed $satisfiedqnt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function filterBySatisfiedqnt($satisfiedqnt = null, $comparison = null)
    {
        if (is_array($satisfiedqnt)) {
            $useMinMax = false;
            if (isset($satisfiedqnt['min'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::SATISFIEDQNT, $satisfiedqnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($satisfiedqnt['max'])) {
                $this->addUsingAlias(StockrequisitionItemPeer::SATISFIEDQNT, $satisfiedqnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionItemPeer::SATISFIEDQNT, $satisfiedqnt, $comparison);
    }

    /**
     * Filter the query by a related Rbfinance object
     *
     * @param   Rbfinance|PropelObjectCollection $rbfinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrequisitionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbfinance($rbfinance, $comparison = null)
    {
        if ($rbfinance instanceof Rbfinance) {
            return $this
                ->addUsingAlias(StockrequisitionItemPeer::FINANCE_ID, $rbfinance->getId(), $comparison);
        } elseif ($rbfinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionItemPeer::FINANCE_ID, $rbfinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbfinance() only accepts arguments of type Rbfinance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbfinance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function joinRbfinance($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbfinance');

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
            $this->addJoinObject($join, 'Rbfinance');
        }

        return $this;
    }

    /**
     * Use the Rbfinance relation Rbfinance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbfinanceQuery A secondary query class using the current class as primary query
     */
    public function useRbfinanceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbfinance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbfinance', '\Webmis\Models\RbfinanceQuery');
    }

    /**
     * Filter the query by a related Stockrequisition object
     *
     * @param   Stockrequisition|PropelObjectCollection $stockrequisition The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrequisitionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisition($stockrequisition, $comparison = null)
    {
        if ($stockrequisition instanceof Stockrequisition) {
            return $this
                ->addUsingAlias(StockrequisitionItemPeer::MASTER_ID, $stockrequisition->getId(), $comparison);
        } elseif ($stockrequisition instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionItemPeer::MASTER_ID, $stockrequisition->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStockrequisition() only accepts arguments of type Stockrequisition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stockrequisition relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function joinStockrequisition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Stockrequisition');

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
            $this->addJoinObject($join, 'Stockrequisition');
        }

        return $this;
    }

    /**
     * Use the Stockrequisition relation Stockrequisition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockrequisition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stockrequisition', '\Webmis\Models\StockrequisitionQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrequisitionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclature($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(StockrequisitionItemPeer::NOMENCLATURE_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionItemPeer::NOMENCLATURE_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbnomenclature() only accepts arguments of type Rbnomenclature or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbnomenclature relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function joinRbnomenclature($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbnomenclature');

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
            $this->addJoinObject($join, 'Rbnomenclature');
        }

        return $this;
    }

    /**
     * Use the Rbnomenclature relation Rbnomenclature object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbnomenclatureQuery A secondary query class using the current class as primary query
     */
    public function useRbnomenclatureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbnomenclature($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbnomenclature', '\Webmis\Models\RbnomenclatureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   StockrequisitionItem $stockrequisitionItem Object to remove from the list of results
     *
     * @return StockrequisitionItemQuery The current query, for fluid interface
     */
    public function prune($stockrequisitionItem = null)
    {
        if ($stockrequisitionItem) {
            $this->addUsingAlias(StockrequisitionItemPeer::ID, $stockrequisitionItem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
