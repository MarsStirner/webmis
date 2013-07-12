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
use Webmis\Models\Rbfinance;
use Webmis\Models\Rbnomenclature;
use Webmis\Models\StockmotionItem;
use Webmis\Models\Stocktrans;
use Webmis\Models\StocktransPeer;
use Webmis\Models\StocktransQuery;

/**
 * Base class that represents a query for the 'StockTrans' table.
 *
 *
 *
 * @method StocktransQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StocktransQuery orderByStockmotionitemId($order = Criteria::ASC) Order by the stockMotionItem_id column
 * @method StocktransQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method StocktransQuery orderByQnt($order = Criteria::ASC) Order by the qnt column
 * @method StocktransQuery orderBySum($order = Criteria::ASC) Order by the sum column
 * @method StocktransQuery orderByDeborgstructureId($order = Criteria::ASC) Order by the debOrgStructure_id column
 * @method StocktransQuery orderByDebnomenclatureId($order = Criteria::ASC) Order by the debNomenclature_id column
 * @method StocktransQuery orderByDebfinanceId($order = Criteria::ASC) Order by the debFinance_id column
 * @method StocktransQuery orderByCreorgstructureId($order = Criteria::ASC) Order by the creOrgStructure_id column
 * @method StocktransQuery orderByCrenomenclatureId($order = Criteria::ASC) Order by the creNomenclature_id column
 * @method StocktransQuery orderByCrefinanceId($order = Criteria::ASC) Order by the creFinance_id column
 *
 * @method StocktransQuery groupById() Group by the id column
 * @method StocktransQuery groupByStockmotionitemId() Group by the stockMotionItem_id column
 * @method StocktransQuery groupByDate() Group by the date column
 * @method StocktransQuery groupByQnt() Group by the qnt column
 * @method StocktransQuery groupBySum() Group by the sum column
 * @method StocktransQuery groupByDeborgstructureId() Group by the debOrgStructure_id column
 * @method StocktransQuery groupByDebnomenclatureId() Group by the debNomenclature_id column
 * @method StocktransQuery groupByDebfinanceId() Group by the debFinance_id column
 * @method StocktransQuery groupByCreorgstructureId() Group by the creOrgStructure_id column
 * @method StocktransQuery groupByCrenomenclatureId() Group by the creNomenclature_id column
 * @method StocktransQuery groupByCrefinanceId() Group by the creFinance_id column
 *
 * @method StocktransQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StocktransQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StocktransQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StocktransQuery leftJoinRbfinanceRelatedByCrefinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbfinanceRelatedByCrefinanceId relation
 * @method StocktransQuery rightJoinRbfinanceRelatedByCrefinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbfinanceRelatedByCrefinanceId relation
 * @method StocktransQuery innerJoinRbfinanceRelatedByCrefinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbfinanceRelatedByCrefinanceId relation
 *
 * @method StocktransQuery leftJoinRbnomenclatureRelatedByCrenomenclatureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbnomenclatureRelatedByCrenomenclatureId relation
 * @method StocktransQuery rightJoinRbnomenclatureRelatedByCrenomenclatureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbnomenclatureRelatedByCrenomenclatureId relation
 * @method StocktransQuery innerJoinRbnomenclatureRelatedByCrenomenclatureId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbnomenclatureRelatedByCrenomenclatureId relation
 *
 * @method StocktransQuery leftJoinOrgstructureRelatedByCreorgstructureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureRelatedByCreorgstructureId relation
 * @method StocktransQuery rightJoinOrgstructureRelatedByCreorgstructureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureRelatedByCreorgstructureId relation
 * @method StocktransQuery innerJoinOrgstructureRelatedByCreorgstructureId($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureRelatedByCreorgstructureId relation
 *
 * @method StocktransQuery leftJoinRbfinanceRelatedByDebfinanceId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbfinanceRelatedByDebfinanceId relation
 * @method StocktransQuery rightJoinRbfinanceRelatedByDebfinanceId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbfinanceRelatedByDebfinanceId relation
 * @method StocktransQuery innerJoinRbfinanceRelatedByDebfinanceId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbfinanceRelatedByDebfinanceId relation
 *
 * @method StocktransQuery leftJoinRbnomenclatureRelatedByDebnomenclatureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbnomenclatureRelatedByDebnomenclatureId relation
 * @method StocktransQuery rightJoinRbnomenclatureRelatedByDebnomenclatureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbnomenclatureRelatedByDebnomenclatureId relation
 * @method StocktransQuery innerJoinRbnomenclatureRelatedByDebnomenclatureId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbnomenclatureRelatedByDebnomenclatureId relation
 *
 * @method StocktransQuery leftJoinOrgstructureRelatedByDeborgstructureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureRelatedByDeborgstructureId relation
 * @method StocktransQuery rightJoinOrgstructureRelatedByDeborgstructureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureRelatedByDeborgstructureId relation
 * @method StocktransQuery innerJoinOrgstructureRelatedByDeborgstructureId($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureRelatedByDeborgstructureId relation
 *
 * @method StocktransQuery leftJoinStockmotionItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionItem relation
 * @method StocktransQuery rightJoinStockmotionItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionItem relation
 * @method StocktransQuery innerJoinStockmotionItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionItem relation
 *
 * @method Stocktrans findOne(PropelPDO $con = null) Return the first Stocktrans matching the query
 * @method Stocktrans findOneOrCreate(PropelPDO $con = null) Return the first Stocktrans matching the query, or a new Stocktrans object populated from the query conditions when no match is found
 *
 * @method Stocktrans findOneByStockmotionitemId(int $stockMotionItem_id) Return the first Stocktrans filtered by the stockMotionItem_id column
 * @method Stocktrans findOneByDate(string $date) Return the first Stocktrans filtered by the date column
 * @method Stocktrans findOneByQnt(double $qnt) Return the first Stocktrans filtered by the qnt column
 * @method Stocktrans findOneBySum(double $sum) Return the first Stocktrans filtered by the sum column
 * @method Stocktrans findOneByDeborgstructureId(int $debOrgStructure_id) Return the first Stocktrans filtered by the debOrgStructure_id column
 * @method Stocktrans findOneByDebnomenclatureId(int $debNomenclature_id) Return the first Stocktrans filtered by the debNomenclature_id column
 * @method Stocktrans findOneByDebfinanceId(int $debFinance_id) Return the first Stocktrans filtered by the debFinance_id column
 * @method Stocktrans findOneByCreorgstructureId(int $creOrgStructure_id) Return the first Stocktrans filtered by the creOrgStructure_id column
 * @method Stocktrans findOneByCrenomenclatureId(int $creNomenclature_id) Return the first Stocktrans filtered by the creNomenclature_id column
 * @method Stocktrans findOneByCrefinanceId(int $creFinance_id) Return the first Stocktrans filtered by the creFinance_id column
 *
 * @method array findById(string $id) Return Stocktrans objects filtered by the id column
 * @method array findByStockmotionitemId(int $stockMotionItem_id) Return Stocktrans objects filtered by the stockMotionItem_id column
 * @method array findByDate(string $date) Return Stocktrans objects filtered by the date column
 * @method array findByQnt(double $qnt) Return Stocktrans objects filtered by the qnt column
 * @method array findBySum(double $sum) Return Stocktrans objects filtered by the sum column
 * @method array findByDeborgstructureId(int $debOrgStructure_id) Return Stocktrans objects filtered by the debOrgStructure_id column
 * @method array findByDebnomenclatureId(int $debNomenclature_id) Return Stocktrans objects filtered by the debNomenclature_id column
 * @method array findByDebfinanceId(int $debFinance_id) Return Stocktrans objects filtered by the debFinance_id column
 * @method array findByCreorgstructureId(int $creOrgStructure_id) Return Stocktrans objects filtered by the creOrgStructure_id column
 * @method array findByCrenomenclatureId(int $creNomenclature_id) Return Stocktrans objects filtered by the creNomenclature_id column
 * @method array findByCrefinanceId(int $creFinance_id) Return Stocktrans objects filtered by the creFinance_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStocktransQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStocktransQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Stocktrans', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StocktransQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StocktransQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StocktransQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StocktransQuery) {
            return $criteria;
        }
        $query = new StocktransQuery();
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
     * @return   Stocktrans|Stocktrans[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StocktransPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StocktransPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stocktrans A model object, or null if the key is not found
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
     * @return                 Stocktrans A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `stockMotionItem_id`, `date`, `qnt`, `sum`, `debOrgStructure_id`, `debNomenclature_id`, `debFinance_id`, `creOrgStructure_id`, `creNomenclature_id`, `creFinance_id` FROM `StockTrans` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Stocktrans();
            $obj->hydrate($row);
            StocktransPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Stocktrans|Stocktrans[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Stocktrans[]|mixed the list of results, formatted by the current formatter
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
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StocktransPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StocktransPeer::ID, $keys, Criteria::IN);
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
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StocktransPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StocktransPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the stockMotionItem_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStockmotionitemId(1234); // WHERE stockMotionItem_id = 1234
     * $query->filterByStockmotionitemId(array(12, 34)); // WHERE stockMotionItem_id IN (12, 34)
     * $query->filterByStockmotionitemId(array('min' => 12)); // WHERE stockMotionItem_id >= 12
     * $query->filterByStockmotionitemId(array('max' => 12)); // WHERE stockMotionItem_id <= 12
     * </code>
     *
     * @see       filterByStockmotionItem()
     *
     * @param     mixed $stockmotionitemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByStockmotionitemId($stockmotionitemId = null, $comparison = null)
    {
        if (is_array($stockmotionitemId)) {
            $useMinMax = false;
            if (isset($stockmotionitemId['min'])) {
                $this->addUsingAlias(StocktransPeer::STOCKMOTIONITEM_ID, $stockmotionitemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stockmotionitemId['max'])) {
                $this->addUsingAlias(StocktransPeer::STOCKMOTIONITEM_ID, $stockmotionitemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::STOCKMOTIONITEM_ID, $stockmotionitemId, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(StocktransPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(StocktransPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::DATE, $date, $comparison);
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
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByQnt($qnt = null, $comparison = null)
    {
        if (is_array($qnt)) {
            $useMinMax = false;
            if (isset($qnt['min'])) {
                $this->addUsingAlias(StocktransPeer::QNT, $qnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qnt['max'])) {
                $this->addUsingAlias(StocktransPeer::QNT, $qnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::QNT, $qnt, $comparison);
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
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterBySum($sum = null, $comparison = null)
    {
        if (is_array($sum)) {
            $useMinMax = false;
            if (isset($sum['min'])) {
                $this->addUsingAlias(StocktransPeer::SUM, $sum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sum['max'])) {
                $this->addUsingAlias(StocktransPeer::SUM, $sum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::SUM, $sum, $comparison);
    }

    /**
     * Filter the query on the debOrgStructure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDeborgstructureId(1234); // WHERE debOrgStructure_id = 1234
     * $query->filterByDeborgstructureId(array(12, 34)); // WHERE debOrgStructure_id IN (12, 34)
     * $query->filterByDeborgstructureId(array('min' => 12)); // WHERE debOrgStructure_id >= 12
     * $query->filterByDeborgstructureId(array('max' => 12)); // WHERE debOrgStructure_id <= 12
     * </code>
     *
     * @see       filterByOrgstructureRelatedByDeborgstructureId()
     *
     * @param     mixed $deborgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByDeborgstructureId($deborgstructureId = null, $comparison = null)
    {
        if (is_array($deborgstructureId)) {
            $useMinMax = false;
            if (isset($deborgstructureId['min'])) {
                $this->addUsingAlias(StocktransPeer::DEBORGSTRUCTURE_ID, $deborgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deborgstructureId['max'])) {
                $this->addUsingAlias(StocktransPeer::DEBORGSTRUCTURE_ID, $deborgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::DEBORGSTRUCTURE_ID, $deborgstructureId, $comparison);
    }

    /**
     * Filter the query on the debNomenclature_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDebnomenclatureId(1234); // WHERE debNomenclature_id = 1234
     * $query->filterByDebnomenclatureId(array(12, 34)); // WHERE debNomenclature_id IN (12, 34)
     * $query->filterByDebnomenclatureId(array('min' => 12)); // WHERE debNomenclature_id >= 12
     * $query->filterByDebnomenclatureId(array('max' => 12)); // WHERE debNomenclature_id <= 12
     * </code>
     *
     * @see       filterByRbnomenclatureRelatedByDebnomenclatureId()
     *
     * @param     mixed $debnomenclatureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByDebnomenclatureId($debnomenclatureId = null, $comparison = null)
    {
        if (is_array($debnomenclatureId)) {
            $useMinMax = false;
            if (isset($debnomenclatureId['min'])) {
                $this->addUsingAlias(StocktransPeer::DEBNOMENCLATURE_ID, $debnomenclatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($debnomenclatureId['max'])) {
                $this->addUsingAlias(StocktransPeer::DEBNOMENCLATURE_ID, $debnomenclatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::DEBNOMENCLATURE_ID, $debnomenclatureId, $comparison);
    }

    /**
     * Filter the query on the debFinance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDebfinanceId(1234); // WHERE debFinance_id = 1234
     * $query->filterByDebfinanceId(array(12, 34)); // WHERE debFinance_id IN (12, 34)
     * $query->filterByDebfinanceId(array('min' => 12)); // WHERE debFinance_id >= 12
     * $query->filterByDebfinanceId(array('max' => 12)); // WHERE debFinance_id <= 12
     * </code>
     *
     * @see       filterByRbfinanceRelatedByDebfinanceId()
     *
     * @param     mixed $debfinanceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByDebfinanceId($debfinanceId = null, $comparison = null)
    {
        if (is_array($debfinanceId)) {
            $useMinMax = false;
            if (isset($debfinanceId['min'])) {
                $this->addUsingAlias(StocktransPeer::DEBFINANCE_ID, $debfinanceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($debfinanceId['max'])) {
                $this->addUsingAlias(StocktransPeer::DEBFINANCE_ID, $debfinanceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::DEBFINANCE_ID, $debfinanceId, $comparison);
    }

    /**
     * Filter the query on the creOrgStructure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreorgstructureId(1234); // WHERE creOrgStructure_id = 1234
     * $query->filterByCreorgstructureId(array(12, 34)); // WHERE creOrgStructure_id IN (12, 34)
     * $query->filterByCreorgstructureId(array('min' => 12)); // WHERE creOrgStructure_id >= 12
     * $query->filterByCreorgstructureId(array('max' => 12)); // WHERE creOrgStructure_id <= 12
     * </code>
     *
     * @see       filterByOrgstructureRelatedByCreorgstructureId()
     *
     * @param     mixed $creorgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByCreorgstructureId($creorgstructureId = null, $comparison = null)
    {
        if (is_array($creorgstructureId)) {
            $useMinMax = false;
            if (isset($creorgstructureId['min'])) {
                $this->addUsingAlias(StocktransPeer::CREORGSTRUCTURE_ID, $creorgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($creorgstructureId['max'])) {
                $this->addUsingAlias(StocktransPeer::CREORGSTRUCTURE_ID, $creorgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::CREORGSTRUCTURE_ID, $creorgstructureId, $comparison);
    }

    /**
     * Filter the query on the creNomenclature_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCrenomenclatureId(1234); // WHERE creNomenclature_id = 1234
     * $query->filterByCrenomenclatureId(array(12, 34)); // WHERE creNomenclature_id IN (12, 34)
     * $query->filterByCrenomenclatureId(array('min' => 12)); // WHERE creNomenclature_id >= 12
     * $query->filterByCrenomenclatureId(array('max' => 12)); // WHERE creNomenclature_id <= 12
     * </code>
     *
     * @see       filterByRbnomenclatureRelatedByCrenomenclatureId()
     *
     * @param     mixed $crenomenclatureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByCrenomenclatureId($crenomenclatureId = null, $comparison = null)
    {
        if (is_array($crenomenclatureId)) {
            $useMinMax = false;
            if (isset($crenomenclatureId['min'])) {
                $this->addUsingAlias(StocktransPeer::CRENOMENCLATURE_ID, $crenomenclatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crenomenclatureId['max'])) {
                $this->addUsingAlias(StocktransPeer::CRENOMENCLATURE_ID, $crenomenclatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::CRENOMENCLATURE_ID, $crenomenclatureId, $comparison);
    }

    /**
     * Filter the query on the creFinance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCrefinanceId(1234); // WHERE creFinance_id = 1234
     * $query->filterByCrefinanceId(array(12, 34)); // WHERE creFinance_id IN (12, 34)
     * $query->filterByCrefinanceId(array('min' => 12)); // WHERE creFinance_id >= 12
     * $query->filterByCrefinanceId(array('max' => 12)); // WHERE creFinance_id <= 12
     * </code>
     *
     * @see       filterByRbfinanceRelatedByCrefinanceId()
     *
     * @param     mixed $crefinanceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function filterByCrefinanceId($crefinanceId = null, $comparison = null)
    {
        if (is_array($crefinanceId)) {
            $useMinMax = false;
            if (isset($crefinanceId['min'])) {
                $this->addUsingAlias(StocktransPeer::CREFINANCE_ID, $crefinanceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($crefinanceId['max'])) {
                $this->addUsingAlias(StocktransPeer::CREFINANCE_ID, $crefinanceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StocktransPeer::CREFINANCE_ID, $crefinanceId, $comparison);
    }

    /**
     * Filter the query by a related Rbfinance object
     *
     * @param   Rbfinance|PropelObjectCollection $rbfinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbfinanceRelatedByCrefinanceId($rbfinance, $comparison = null)
    {
        if ($rbfinance instanceof Rbfinance) {
            return $this
                ->addUsingAlias(StocktransPeer::CREFINANCE_ID, $rbfinance->getId(), $comparison);
        } elseif ($rbfinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::CREFINANCE_ID, $rbfinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbfinanceRelatedByCrefinanceId() only accepts arguments of type Rbfinance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbfinanceRelatedByCrefinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinRbfinanceRelatedByCrefinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbfinanceRelatedByCrefinanceId');

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
            $this->addJoinObject($join, 'RbfinanceRelatedByCrefinanceId');
        }

        return $this;
    }

    /**
     * Use the RbfinanceRelatedByCrefinanceId relation Rbfinance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbfinanceQuery A secondary query class using the current class as primary query
     */
    public function useRbfinanceRelatedByCrefinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbfinanceRelatedByCrefinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbfinanceRelatedByCrefinanceId', '\Webmis\Models\RbfinanceQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclatureRelatedByCrenomenclatureId($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(StocktransPeer::CRENOMENCLATURE_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::CRENOMENCLATURE_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbnomenclatureRelatedByCrenomenclatureId() only accepts arguments of type Rbnomenclature or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbnomenclatureRelatedByCrenomenclatureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinRbnomenclatureRelatedByCrenomenclatureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbnomenclatureRelatedByCrenomenclatureId');

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
            $this->addJoinObject($join, 'RbnomenclatureRelatedByCrenomenclatureId');
        }

        return $this;
    }

    /**
     * Use the RbnomenclatureRelatedByCrenomenclatureId relation Rbnomenclature object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbnomenclatureQuery A secondary query class using the current class as primary query
     */
    public function useRbnomenclatureRelatedByCrenomenclatureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbnomenclatureRelatedByCrenomenclatureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbnomenclatureRelatedByCrenomenclatureId', '\Webmis\Models\RbnomenclatureQuery');
    }

    /**
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureRelatedByCreorgstructureId($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(StocktransPeer::CREORGSTRUCTURE_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::CREORGSTRUCTURE_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructureRelatedByCreorgstructureId() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureRelatedByCreorgstructureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinOrgstructureRelatedByCreorgstructureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureRelatedByCreorgstructureId');

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
            $this->addJoinObject($join, 'OrgstructureRelatedByCreorgstructureId');
        }

        return $this;
    }

    /**
     * Use the OrgstructureRelatedByCreorgstructureId relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureRelatedByCreorgstructureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureRelatedByCreorgstructureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureRelatedByCreorgstructureId', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related Rbfinance object
     *
     * @param   Rbfinance|PropelObjectCollection $rbfinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbfinanceRelatedByDebfinanceId($rbfinance, $comparison = null)
    {
        if ($rbfinance instanceof Rbfinance) {
            return $this
                ->addUsingAlias(StocktransPeer::DEBFINANCE_ID, $rbfinance->getId(), $comparison);
        } elseif ($rbfinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::DEBFINANCE_ID, $rbfinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbfinanceRelatedByDebfinanceId() only accepts arguments of type Rbfinance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbfinanceRelatedByDebfinanceId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinRbfinanceRelatedByDebfinanceId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbfinanceRelatedByDebfinanceId');

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
            $this->addJoinObject($join, 'RbfinanceRelatedByDebfinanceId');
        }

        return $this;
    }

    /**
     * Use the RbfinanceRelatedByDebfinanceId relation Rbfinance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbfinanceQuery A secondary query class using the current class as primary query
     */
    public function useRbfinanceRelatedByDebfinanceIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbfinanceRelatedByDebfinanceId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbfinanceRelatedByDebfinanceId', '\Webmis\Models\RbfinanceQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclatureRelatedByDebnomenclatureId($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(StocktransPeer::DEBNOMENCLATURE_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::DEBNOMENCLATURE_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbnomenclatureRelatedByDebnomenclatureId() only accepts arguments of type Rbnomenclature or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbnomenclatureRelatedByDebnomenclatureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinRbnomenclatureRelatedByDebnomenclatureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbnomenclatureRelatedByDebnomenclatureId');

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
            $this->addJoinObject($join, 'RbnomenclatureRelatedByDebnomenclatureId');
        }

        return $this;
    }

    /**
     * Use the RbnomenclatureRelatedByDebnomenclatureId relation Rbnomenclature object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbnomenclatureQuery A secondary query class using the current class as primary query
     */
    public function useRbnomenclatureRelatedByDebnomenclatureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbnomenclatureRelatedByDebnomenclatureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbnomenclatureRelatedByDebnomenclatureId', '\Webmis\Models\RbnomenclatureQuery');
    }

    /**
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureRelatedByDeborgstructureId($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(StocktransPeer::DEBORGSTRUCTURE_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::DEBORGSTRUCTURE_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructureRelatedByDeborgstructureId() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureRelatedByDeborgstructureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinOrgstructureRelatedByDeborgstructureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureRelatedByDeborgstructureId');

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
            $this->addJoinObject($join, 'OrgstructureRelatedByDeborgstructureId');
        }

        return $this;
    }

    /**
     * Use the OrgstructureRelatedByDeborgstructureId relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureRelatedByDeborgstructureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureRelatedByDeborgstructureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureRelatedByDeborgstructureId', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related StockmotionItem object
     *
     * @param   StockmotionItem|PropelObjectCollection $stockmotionItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StocktransQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionItem($stockmotionItem, $comparison = null)
    {
        if ($stockmotionItem instanceof StockmotionItem) {
            return $this
                ->addUsingAlias(StocktransPeer::STOCKMOTIONITEM_ID, $stockmotionItem->getId(), $comparison);
        } elseif ($stockmotionItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StocktransPeer::STOCKMOTIONITEM_ID, $stockmotionItem->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStockmotionItem() only accepts arguments of type StockmotionItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function joinStockmotionItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionItem');

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
            $this->addJoinObject($join, 'StockmotionItem');
        }

        return $this;
    }

    /**
     * Use the StockmotionItem relation StockmotionItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionItemQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockmotionItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionItem', '\Webmis\Models\StockmotionItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Stocktrans $stocktrans Object to remove from the list of results
     *
     * @return StocktransQuery The current query, for fluid interface
     */
    public function prune($stocktrans = null)
    {
        if ($stocktrans) {
            $this->addUsingAlias(StocktransPeer::ID, $stocktrans->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
