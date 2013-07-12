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
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureStock;
use Webmis\Models\OrgstructureStockPeer;
use Webmis\Models\OrgstructureStockQuery;
use Webmis\Models\Rbfinance;
use Webmis\Models\Rbnomenclature;

/**
 * Base class that represents a query for the 'OrgStructure_Stock' table.
 *
 *
 *
 * @method OrgstructureStockQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureStockQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method OrgstructureStockQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method OrgstructureStockQuery orderByNomenclatureId($order = Criteria::ASC) Order by the nomenclature_id column
 * @method OrgstructureStockQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method OrgstructureStockQuery orderByConstrainedqnt($order = Criteria::ASC) Order by the constrainedQnt column
 * @method OrgstructureStockQuery orderByOrderqnt($order = Criteria::ASC) Order by the orderQnt column
 *
 * @method OrgstructureStockQuery groupById() Group by the id column
 * @method OrgstructureStockQuery groupByMasterId() Group by the master_id column
 * @method OrgstructureStockQuery groupByIdx() Group by the idx column
 * @method OrgstructureStockQuery groupByNomenclatureId() Group by the nomenclature_id column
 * @method OrgstructureStockQuery groupByFinanceId() Group by the finance_id column
 * @method OrgstructureStockQuery groupByConstrainedqnt() Group by the constrainedQnt column
 * @method OrgstructureStockQuery groupByOrderqnt() Group by the orderQnt column
 *
 * @method OrgstructureStockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureStockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureStockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureStockQuery leftJoinRbfinance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbfinance relation
 * @method OrgstructureStockQuery rightJoinRbfinance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbfinance relation
 * @method OrgstructureStockQuery innerJoinRbfinance($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbfinance relation
 *
 * @method OrgstructureStockQuery leftJoinOrgstructure($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orgstructure relation
 * @method OrgstructureStockQuery rightJoinOrgstructure($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orgstructure relation
 * @method OrgstructureStockQuery innerJoinOrgstructure($relationAlias = null) Adds a INNER JOIN clause to the query using the Orgstructure relation
 *
 * @method OrgstructureStockQuery leftJoinRbnomenclature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbnomenclature relation
 * @method OrgstructureStockQuery rightJoinRbnomenclature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbnomenclature relation
 * @method OrgstructureStockQuery innerJoinRbnomenclature($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbnomenclature relation
 *
 * @method OrgstructureStock findOne(PropelPDO $con = null) Return the first OrgstructureStock matching the query
 * @method OrgstructureStock findOneOrCreate(PropelPDO $con = null) Return the first OrgstructureStock matching the query, or a new OrgstructureStock object populated from the query conditions when no match is found
 *
 * @method OrgstructureStock findOneByMasterId(int $master_id) Return the first OrgstructureStock filtered by the master_id column
 * @method OrgstructureStock findOneByIdx(int $idx) Return the first OrgstructureStock filtered by the idx column
 * @method OrgstructureStock findOneByNomenclatureId(int $nomenclature_id) Return the first OrgstructureStock filtered by the nomenclature_id column
 * @method OrgstructureStock findOneByFinanceId(int $finance_id) Return the first OrgstructureStock filtered by the finance_id column
 * @method OrgstructureStock findOneByConstrainedqnt(double $constrainedQnt) Return the first OrgstructureStock filtered by the constrainedQnt column
 * @method OrgstructureStock findOneByOrderqnt(double $orderQnt) Return the first OrgstructureStock filtered by the orderQnt column
 *
 * @method array findById(int $id) Return OrgstructureStock objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return OrgstructureStock objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return OrgstructureStock objects filtered by the idx column
 * @method array findByNomenclatureId(int $nomenclature_id) Return OrgstructureStock objects filtered by the nomenclature_id column
 * @method array findByFinanceId(int $finance_id) Return OrgstructureStock objects filtered by the finance_id column
 * @method array findByConstrainedqnt(double $constrainedQnt) Return OrgstructureStock objects filtered by the constrainedQnt column
 * @method array findByOrderqnt(double $orderQnt) Return OrgstructureStock objects filtered by the orderQnt column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureStockQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureStockQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrgstructureStock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureStockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureStockQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureStockQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureStockQuery) {
            return $criteria;
        }
        $query = new OrgstructureStockQuery();
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
     * @return   OrgstructureStock|OrgstructureStock[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructureStockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructureStockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgstructureStock A model object, or null if the key is not found
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
     * @return                 OrgstructureStock A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `nomenclature_id`, `finance_id`, `constrainedQnt`, `orderQnt` FROM `OrgStructure_Stock` WHERE `id` = :p0';
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
            $obj = new OrgstructureStock();
            $obj->hydrate($row);
            OrgstructureStockPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrgstructureStock|OrgstructureStock[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrgstructureStock[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructureStockPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructureStockPeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::ID, $id, $comparison);
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
     * @see       filterByOrgstructure()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::MASTER_ID, $masterId, $comparison);
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
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::IDX, $idx, $comparison);
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
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByNomenclatureId($nomenclatureId = null, $comparison = null)
    {
        if (is_array($nomenclatureId)) {
            $useMinMax = false;
            if (isset($nomenclatureId['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::NOMENCLATURE_ID, $nomenclatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nomenclatureId['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::NOMENCLATURE_ID, $nomenclatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::NOMENCLATURE_ID, $nomenclatureId, $comparison);
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
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the constrainedQnt column
     *
     * Example usage:
     * <code>
     * $query->filterByConstrainedqnt(1234); // WHERE constrainedQnt = 1234
     * $query->filterByConstrainedqnt(array(12, 34)); // WHERE constrainedQnt IN (12, 34)
     * $query->filterByConstrainedqnt(array('min' => 12)); // WHERE constrainedQnt >= 12
     * $query->filterByConstrainedqnt(array('max' => 12)); // WHERE constrainedQnt <= 12
     * </code>
     *
     * @param     mixed $constrainedqnt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByConstrainedqnt($constrainedqnt = null, $comparison = null)
    {
        if (is_array($constrainedqnt)) {
            $useMinMax = false;
            if (isset($constrainedqnt['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::CONSTRAINEDQNT, $constrainedqnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($constrainedqnt['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::CONSTRAINEDQNT, $constrainedqnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::CONSTRAINEDQNT, $constrainedqnt, $comparison);
    }

    /**
     * Filter the query on the orderQnt column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderqnt(1234); // WHERE orderQnt = 1234
     * $query->filterByOrderqnt(array(12, 34)); // WHERE orderQnt IN (12, 34)
     * $query->filterByOrderqnt(array('min' => 12)); // WHERE orderQnt >= 12
     * $query->filterByOrderqnt(array('max' => 12)); // WHERE orderQnt <= 12
     * </code>
     *
     * @param     mixed $orderqnt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function filterByOrderqnt($orderqnt = null, $comparison = null)
    {
        if (is_array($orderqnt)) {
            $useMinMax = false;
            if (isset($orderqnt['min'])) {
                $this->addUsingAlias(OrgstructureStockPeer::ORDERQNT, $orderqnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orderqnt['max'])) {
                $this->addUsingAlias(OrgstructureStockPeer::ORDERQNT, $orderqnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureStockPeer::ORDERQNT, $orderqnt, $comparison);
    }

    /**
     * Filter the query by a related Rbfinance object
     *
     * @param   Rbfinance|PropelObjectCollection $rbfinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureStockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbfinance($rbfinance, $comparison = null)
    {
        if ($rbfinance instanceof Rbfinance) {
            return $this
                ->addUsingAlias(OrgstructureStockPeer::FINANCE_ID, $rbfinance->getId(), $comparison);
        } elseif ($rbfinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrgstructureStockPeer::FINANCE_ID, $rbfinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return OrgstructureStockQuery The current query, for fluid interface
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
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureStockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructure($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(OrgstructureStockPeer::MASTER_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrgstructureStockPeer::MASTER_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructure() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orgstructure relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function joinOrgstructure($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orgstructure');

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
            $this->addJoinObject($join, 'Orgstructure');
        }

        return $this;
    }

    /**
     * Use the Orgstructure relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrgstructure($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orgstructure', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureStockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclature($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(OrgstructureStockPeer::NOMENCLATURE_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrgstructureStockPeer::NOMENCLATURE_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return OrgstructureStockQuery The current query, for fluid interface
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
     * @param   OrgstructureStock $orgstructureStock Object to remove from the list of results
     *
     * @return OrgstructureStockQuery The current query, for fluid interface
     */
    public function prune($orgstructureStock = null)
    {
        if ($orgstructureStock) {
            $this->addUsingAlias(OrgstructureStockPeer::ID, $orgstructureStock->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
