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
use Webmis\Models\Stockmotion;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockmotionItemPeer;
use Webmis\Models\StockmotionItemQuery;
use Webmis\Models\Stocktrans;

/**
 * Base class that represents a query for the 'StockMotion_Item' table.
 *
 *
 *
 * @method StockmotionItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StockmotionItemQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method StockmotionItemQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method StockmotionItemQuery orderByNomenclatureId($order = Criteria::ASC) Order by the nomenclature_id column
 * @method StockmotionItemQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method StockmotionItemQuery orderByQnt($order = Criteria::ASC) Order by the qnt column
 * @method StockmotionItemQuery orderBySum($order = Criteria::ASC) Order by the sum column
 * @method StockmotionItemQuery orderByOldqnt($order = Criteria::ASC) Order by the oldQnt column
 * @method StockmotionItemQuery orderByOldsum($order = Criteria::ASC) Order by the oldSum column
 * @method StockmotionItemQuery orderByOldfinanceId($order = Criteria::ASC) Order by the oldFinance_id column
 * @method StockmotionItemQuery orderByIsout($order = Criteria::ASC) Order by the isOut column
 * @method StockmotionItemQuery orderByNote($order = Criteria::ASC) Order by the note column
 *
 * @method StockmotionItemQuery groupById() Group by the id column
 * @method StockmotionItemQuery groupByMasterId() Group by the master_id column
 * @method StockmotionItemQuery groupByIdx() Group by the idx column
 * @method StockmotionItemQuery groupByNomenclatureId() Group by the nomenclature_id column
 * @method StockmotionItemQuery groupByFinanceId() Group by the finance_id column
 * @method StockmotionItemQuery groupByQnt() Group by the qnt column
 * @method StockmotionItemQuery groupBySum() Group by the sum column
 * @method StockmotionItemQuery groupByOldqnt() Group by the oldQnt column
 * @method StockmotionItemQuery groupByOldsum() Group by the oldSum column
 * @method StockmotionItemQuery groupByOldfinanceId() Group by the oldFinance_id column
 * @method StockmotionItemQuery groupByIsout() Group by the isOut column
 * @method StockmotionItemQuery groupByNote() Group by the note column
 *
 * @method StockmotionItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StockmotionItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StockmotionItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StockmotionItemQuery leftJoinRbfinanceRelatedByFinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbfinanceRelatedByFinanceId relation
 * @method StockmotionItemQuery rightJoinRbfinanceRelatedByFinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbfinanceRelatedByFinanceId relation
 * @method StockmotionItemQuery innerJoinRbfinanceRelatedByFinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbfinanceRelatedByFinanceId relation
 *
 * @method StockmotionItemQuery leftJoinStockmotion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stockmotion relation
 * @method StockmotionItemQuery rightJoinStockmotion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stockmotion relation
 * @method StockmotionItemQuery innerJoinStockmotion($relationAlias = null) Adds a INNER JOIN clause to the query using the Stockmotion relation
 *
 * @method StockmotionItemQuery leftJoinRbnomenclature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbnomenclature relation
 * @method StockmotionItemQuery rightJoinRbnomenclature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbnomenclature relation
 * @method StockmotionItemQuery innerJoinRbnomenclature($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbnomenclature relation
 *
 * @method StockmotionItemQuery leftJoinRbfinanceRelatedByOldfinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbfinanceRelatedByOldfinanceId relation
 * @method StockmotionItemQuery rightJoinRbfinanceRelatedByOldfinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbfinanceRelatedByOldfinanceId relation
 * @method StockmotionItemQuery innerJoinRbfinanceRelatedByOldfinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbfinanceRelatedByOldfinanceId relation
 *
 * @method StockmotionItemQuery leftJoinStocktrans($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stocktrans relation
 * @method StockmotionItemQuery rightJoinStocktrans($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stocktrans relation
 * @method StockmotionItemQuery innerJoinStocktrans($relationAlias = null) Adds a INNER JOIN clause to the query using the Stocktrans relation
 *
 * @method StockmotionItem findOne(PropelPDO $con = null) Return the first StockmotionItem matching the query
 * @method StockmotionItem findOneOrCreate(PropelPDO $con = null) Return the first StockmotionItem matching the query, or a new StockmotionItem object populated from the query conditions when no match is found
 *
 * @method StockmotionItem findOneByMasterId(int $master_id) Return the first StockmotionItem filtered by the master_id column
 * @method StockmotionItem findOneByIdx(int $idx) Return the first StockmotionItem filtered by the idx column
 * @method StockmotionItem findOneByNomenclatureId(int $nomenclature_id) Return the first StockmotionItem filtered by the nomenclature_id column
 * @method StockmotionItem findOneByFinanceId(int $finance_id) Return the first StockmotionItem filtered by the finance_id column
 * @method StockmotionItem findOneByQnt(double $qnt) Return the first StockmotionItem filtered by the qnt column
 * @method StockmotionItem findOneBySum(double $sum) Return the first StockmotionItem filtered by the sum column
 * @method StockmotionItem findOneByOldqnt(double $oldQnt) Return the first StockmotionItem filtered by the oldQnt column
 * @method StockmotionItem findOneByOldsum(double $oldSum) Return the first StockmotionItem filtered by the oldSum column
 * @method StockmotionItem findOneByOldfinanceId(int $oldFinance_id) Return the first StockmotionItem filtered by the oldFinance_id column
 * @method StockmotionItem findOneByIsout(int $isOut) Return the first StockmotionItem filtered by the isOut column
 * @method StockmotionItem findOneByNote(string $note) Return the first StockmotionItem filtered by the note column
 *
 * @method array findById(int $id) Return StockmotionItem objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return StockmotionItem objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return StockmotionItem objects filtered by the idx column
 * @method array findByNomenclatureId(int $nomenclature_id) Return StockmotionItem objects filtered by the nomenclature_id column
 * @method array findByFinanceId(int $finance_id) Return StockmotionItem objects filtered by the finance_id column
 * @method array findByQnt(double $qnt) Return StockmotionItem objects filtered by the qnt column
 * @method array findBySum(double $sum) Return StockmotionItem objects filtered by the sum column
 * @method array findByOldqnt(double $oldQnt) Return StockmotionItem objects filtered by the oldQnt column
 * @method array findByOldsum(double $oldSum) Return StockmotionItem objects filtered by the oldSum column
 * @method array findByOldfinanceId(int $oldFinance_id) Return StockmotionItem objects filtered by the oldFinance_id column
 * @method array findByIsout(int $isOut) Return StockmotionItem objects filtered by the isOut column
 * @method array findByNote(string $note) Return StockmotionItem objects filtered by the note column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockmotionItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStockmotionItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\StockmotionItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StockmotionItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StockmotionItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StockmotionItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StockmotionItemQuery) {
            return $criteria;
        }
        $query = new StockmotionItemQuery();
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
     * @return   StockmotionItem|StockmotionItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StockmotionItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StockmotionItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StockmotionItem A model object, or null if the key is not found
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
     * @return                 StockmotionItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `nomenclature_id`, `finance_id`, `qnt`, `sum`, `oldQnt`, `oldSum`, `oldFinance_id`, `isOut`, `note` FROM `StockMotion_Item` WHERE `id` = :p0';
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
            $obj = new StockmotionItem();
            $obj->hydrate($row);
            StockmotionItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StockmotionItem|StockmotionItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StockmotionItem[]|mixed the list of results, formatted by the current formatter
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
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StockmotionItemPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StockmotionItemPeer::ID, $keys, Criteria::IN);
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
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::ID, $id, $comparison);
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
     * @see       filterByStockmotion()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::MASTER_ID, $masterId, $comparison);
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
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::IDX, $idx, $comparison);
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
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByNomenclatureId($nomenclatureId = null, $comparison = null)
    {
        if (is_array($nomenclatureId)) {
            $useMinMax = false;
            if (isset($nomenclatureId['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::NOMENCLATURE_ID, $nomenclatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nomenclatureId['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::NOMENCLATURE_ID, $nomenclatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::NOMENCLATURE_ID, $nomenclatureId, $comparison);
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
     * @see       filterByRbfinanceRelatedByFinanceId()
     *
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::FINANCE_ID, $financeId, $comparison);
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
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByQnt($qnt = null, $comparison = null)
    {
        if (is_array($qnt)) {
            $useMinMax = false;
            if (isset($qnt['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::QNT, $qnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qnt['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::QNT, $qnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::QNT, $qnt, $comparison);
    }

    /**
     * Filter the query on the sum column
     *
     * Example usage:
     * <code>
     * $query->filterBySum(1234); // WHERE sum = 1234
     * $query->filterBySum(array(12, 34)); // WHERE sum IN (12, 34)
     * $query->filterBySum(array('min' => 12)); // WHERE sum >= 12
     * $query->filterBySum(array('max' => 12)); // WHERE sum <= 12
     * </code>
     *
     * @param     mixed $sum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterBySum($sum = null, $comparison = null)
    {
        if (is_array($sum)) {
            $useMinMax = false;
            if (isset($sum['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::SUM, $sum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sum['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::SUM, $sum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::SUM, $sum, $comparison);
    }

    /**
     * Filter the query on the oldQnt column
     *
     * Example usage:
     * <code>
     * $query->filterByOldqnt(1234); // WHERE oldQnt = 1234
     * $query->filterByOldqnt(array(12, 34)); // WHERE oldQnt IN (12, 34)
     * $query->filterByOldqnt(array('min' => 12)); // WHERE oldQnt >= 12
     * $query->filterByOldqnt(array('max' => 12)); // WHERE oldQnt <= 12
     * </code>
     *
     * @param     mixed $oldqnt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByOldqnt($oldqnt = null, $comparison = null)
    {
        if (is_array($oldqnt)) {
            $useMinMax = false;
            if (isset($oldqnt['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::OLDQNT, $oldqnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oldqnt['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::OLDQNT, $oldqnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::OLDQNT, $oldqnt, $comparison);
    }

    /**
     * Filter the query on the oldSum column
     *
     * Example usage:
     * <code>
     * $query->filterByOldsum(1234); // WHERE oldSum = 1234
     * $query->filterByOldsum(array(12, 34)); // WHERE oldSum IN (12, 34)
     * $query->filterByOldsum(array('min' => 12)); // WHERE oldSum >= 12
     * $query->filterByOldsum(array('max' => 12)); // WHERE oldSum <= 12
     * </code>
     *
     * @param     mixed $oldsum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByOldsum($oldsum = null, $comparison = null)
    {
        if (is_array($oldsum)) {
            $useMinMax = false;
            if (isset($oldsum['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::OLDSUM, $oldsum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oldsum['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::OLDSUM, $oldsum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::OLDSUM, $oldsum, $comparison);
    }

    /**
     * Filter the query on the oldFinance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOldfinanceId(1234); // WHERE oldFinance_id = 1234
     * $query->filterByOldfinanceId(array(12, 34)); // WHERE oldFinance_id IN (12, 34)
     * $query->filterByOldfinanceId(array('min' => 12)); // WHERE oldFinance_id >= 12
     * $query->filterByOldfinanceId(array('max' => 12)); // WHERE oldFinance_id <= 12
     * </code>
     *
     * @see       filterByRbfinanceRelatedByOldfinanceId()
     *
     * @param     mixed $oldfinanceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByOldfinanceId($oldfinanceId = null, $comparison = null)
    {
        if (is_array($oldfinanceId)) {
            $useMinMax = false;
            if (isset($oldfinanceId['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::OLDFINANCE_ID, $oldfinanceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($oldfinanceId['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::OLDFINANCE_ID, $oldfinanceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::OLDFINANCE_ID, $oldfinanceId, $comparison);
    }

    /**
     * Filter the query on the isOut column
     *
     * Example usage:
     * <code>
     * $query->filterByIsout(1234); // WHERE isOut = 1234
     * $query->filterByIsout(array(12, 34)); // WHERE isOut IN (12, 34)
     * $query->filterByIsout(array('min' => 12)); // WHERE isOut >= 12
     * $query->filterByIsout(array('max' => 12)); // WHERE isOut <= 12
     * </code>
     *
     * @param     mixed $isout The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByIsout($isout = null, $comparison = null)
    {
        if (is_array($isout)) {
            $useMinMax = false;
            if (isset($isout['min'])) {
                $this->addUsingAlias(StockmotionItemPeer::ISOUT, $isout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isout['max'])) {
                $this->addUsingAlias(StockmotionItemPeer::ISOUT, $isout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::ISOUT, $isout, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StockmotionItemPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query by a related Rbfinance object
     *
     * @param   Rbfinance|PropelObjectCollection $rbfinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbfinanceRelatedByFinanceId($rbfinance, $comparison = null)
    {
        if ($rbfinance instanceof Rbfinance) {
            return $this
                ->addUsingAlias(StockmotionItemPeer::FINANCE_ID, $rbfinance->getId(), $comparison);
        } elseif ($rbfinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionItemPeer::FINANCE_ID, $rbfinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbfinanceRelatedByFinanceId() only accepts arguments of type Rbfinance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbfinanceRelatedByFinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function joinRbfinanceRelatedByFinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbfinanceRelatedByFinanceId');

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
            $this->addJoinObject($join, 'RbfinanceRelatedByFinanceId');
        }

        return $this;
    }

    /**
     * Use the RbfinanceRelatedByFinanceId relation Rbfinance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbfinanceQuery A secondary query class using the current class as primary query
     */
    public function useRbfinanceRelatedByFinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbfinanceRelatedByFinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbfinanceRelatedByFinanceId', '\Webmis\Models\RbfinanceQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotion($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(StockmotionItemPeer::MASTER_ID, $stockmotion->getId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionItemPeer::MASTER_ID, $stockmotion->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStockmotion() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stockmotion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function joinStockmotion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Stockmotion');

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
            $this->addJoinObject($join, 'Stockmotion');
        }

        return $this;
    }

    /**
     * Use the Stockmotion relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockmotion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stockmotion', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclature($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(StockmotionItemPeer::NOMENCLATURE_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionItemPeer::NOMENCLATURE_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StockmotionItemQuery The current query, for fluid interface
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
     * Filter the query by a related Rbfinance object
     *
     * @param   Rbfinance|PropelObjectCollection $rbfinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbfinanceRelatedByOldfinanceId($rbfinance, $comparison = null)
    {
        if ($rbfinance instanceof Rbfinance) {
            return $this
                ->addUsingAlias(StockmotionItemPeer::OLDFINANCE_ID, $rbfinance->getId(), $comparison);
        } elseif ($rbfinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionItemPeer::OLDFINANCE_ID, $rbfinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbfinanceRelatedByOldfinanceId() only accepts arguments of type Rbfinance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbfinanceRelatedByOldfinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function joinRbfinanceRelatedByOldfinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbfinanceRelatedByOldfinanceId');

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
            $this->addJoinObject($join, 'RbfinanceRelatedByOldfinanceId');
        }

        return $this;
    }

    /**
     * Use the RbfinanceRelatedByOldfinanceId relation Rbfinance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbfinanceQuery A secondary query class using the current class as primary query
     */
    public function useRbfinanceRelatedByOldfinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbfinanceRelatedByOldfinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbfinanceRelatedByOldfinanceId', '\Webmis\Models\RbfinanceQuery');
    }

    /**
     * Filter the query by a related Stocktrans object
     *
     * @param   Stocktrans|PropelObjectCollection $stocktrans  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktrans($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(StockmotionItemPeer::ID, $stocktrans->getStockmotionitemId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktrans() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stocktrans relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function joinStocktrans($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Stocktrans');

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
            $this->addJoinObject($join, 'Stocktrans');
        }

        return $this;
    }

    /**
     * Use the Stocktrans relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStocktrans($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stocktrans', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   StockmotionItem $stockmotionItem Object to remove from the list of results
     *
     * @return StockmotionItemQuery The current query, for fluid interface
     */
    public function prune($stockmotionItem = null)
    {
        if ($stockmotionItem) {
            $this->addUsingAlias(StockmotionItemPeer::ID, $stockmotionItem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
