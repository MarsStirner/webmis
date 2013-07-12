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
use Webmis\Models\Rbnomenclature;
use Webmis\Models\Stockrecipe;
use Webmis\Models\StockrecipeItem;
use Webmis\Models\StockrecipeItemPeer;
use Webmis\Models\StockrecipeItemQuery;

/**
 * Base class that represents a query for the 'StockRecipe_Item' table.
 *
 *
 *
 * @method StockrecipeItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StockrecipeItemQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method StockrecipeItemQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method StockrecipeItemQuery orderByNomenclatureId($order = Criteria::ASC) Order by the nomenclature_id column
 * @method StockrecipeItemQuery orderByQnt($order = Criteria::ASC) Order by the qnt column
 * @method StockrecipeItemQuery orderByIsout($order = Criteria::ASC) Order by the isOut column
 *
 * @method StockrecipeItemQuery groupById() Group by the id column
 * @method StockrecipeItemQuery groupByMasterId() Group by the master_id column
 * @method StockrecipeItemQuery groupByIdx() Group by the idx column
 * @method StockrecipeItemQuery groupByNomenclatureId() Group by the nomenclature_id column
 * @method StockrecipeItemQuery groupByQnt() Group by the qnt column
 * @method StockrecipeItemQuery groupByIsout() Group by the isOut column
 *
 * @method StockrecipeItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StockrecipeItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StockrecipeItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StockrecipeItemQuery leftJoinStockrecipe($relationAlias = null) Adds a LEFT JOIN clause to the query using the Stockrecipe relation
 * @method StockrecipeItemQuery rightJoinStockrecipe($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Stockrecipe relation
 * @method StockrecipeItemQuery innerJoinStockrecipe($relationAlias = null) Adds a INNER JOIN clause to the query using the Stockrecipe relation
 *
 * @method StockrecipeItemQuery leftJoinRbnomenclature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbnomenclature relation
 * @method StockrecipeItemQuery rightJoinRbnomenclature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbnomenclature relation
 * @method StockrecipeItemQuery innerJoinRbnomenclature($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbnomenclature relation
 *
 * @method StockrecipeItem findOne(PropelPDO $con = null) Return the first StockrecipeItem matching the query
 * @method StockrecipeItem findOneOrCreate(PropelPDO $con = null) Return the first StockrecipeItem matching the query, or a new StockrecipeItem object populated from the query conditions when no match is found
 *
 * @method StockrecipeItem findOneByMasterId(int $master_id) Return the first StockrecipeItem filtered by the master_id column
 * @method StockrecipeItem findOneByIdx(int $idx) Return the first StockrecipeItem filtered by the idx column
 * @method StockrecipeItem findOneByNomenclatureId(int $nomenclature_id) Return the first StockrecipeItem filtered by the nomenclature_id column
 * @method StockrecipeItem findOneByQnt(double $qnt) Return the first StockrecipeItem filtered by the qnt column
 * @method StockrecipeItem findOneByIsout(int $isOut) Return the first StockrecipeItem filtered by the isOut column
 *
 * @method array findById(int $id) Return StockrecipeItem objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return StockrecipeItem objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return StockrecipeItem objects filtered by the idx column
 * @method array findByNomenclatureId(int $nomenclature_id) Return StockrecipeItem objects filtered by the nomenclature_id column
 * @method array findByQnt(double $qnt) Return StockrecipeItem objects filtered by the qnt column
 * @method array findByIsout(int $isOut) Return StockrecipeItem objects filtered by the isOut column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockrecipeItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStockrecipeItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\StockrecipeItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StockrecipeItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StockrecipeItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StockrecipeItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StockrecipeItemQuery) {
            return $criteria;
        }
        $query = new StockrecipeItemQuery();
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
     * @return   StockrecipeItem|StockrecipeItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StockrecipeItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StockrecipeItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StockrecipeItem A model object, or null if the key is not found
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
     * @return                 StockrecipeItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `nomenclature_id`, `qnt`, `isOut` FROM `StockRecipe_Item` WHERE `id` = :p0';
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
            $obj = new StockrecipeItem();
            $obj->hydrate($row);
            StockrecipeItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StockrecipeItem|StockrecipeItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StockrecipeItem[]|mixed the list of results, formatted by the current formatter
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
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StockrecipeItemPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StockrecipeItemPeer::ID, $keys, Criteria::IN);
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
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StockrecipeItemPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StockrecipeItemPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipeItemPeer::ID, $id, $comparison);
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
     * @see       filterByStockrecipe()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(StockrecipeItemPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(StockrecipeItemPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipeItemPeer::MASTER_ID, $masterId, $comparison);
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
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(StockrecipeItemPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(StockrecipeItemPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipeItemPeer::IDX, $idx, $comparison);
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
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByNomenclatureId($nomenclatureId = null, $comparison = null)
    {
        if (is_array($nomenclatureId)) {
            $useMinMax = false;
            if (isset($nomenclatureId['min'])) {
                $this->addUsingAlias(StockrecipeItemPeer::NOMENCLATURE_ID, $nomenclatureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nomenclatureId['max'])) {
                $this->addUsingAlias(StockrecipeItemPeer::NOMENCLATURE_ID, $nomenclatureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipeItemPeer::NOMENCLATURE_ID, $nomenclatureId, $comparison);
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
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByQnt($qnt = null, $comparison = null)
    {
        if (is_array($qnt)) {
            $useMinMax = false;
            if (isset($qnt['min'])) {
                $this->addUsingAlias(StockrecipeItemPeer::QNT, $qnt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($qnt['max'])) {
                $this->addUsingAlias(StockrecipeItemPeer::QNT, $qnt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipeItemPeer::QNT, $qnt, $comparison);
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
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function filterByIsout($isout = null, $comparison = null)
    {
        if (is_array($isout)) {
            $useMinMax = false;
            if (isset($isout['min'])) {
                $this->addUsingAlias(StockrecipeItemPeer::ISOUT, $isout['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isout['max'])) {
                $this->addUsingAlias(StockrecipeItemPeer::ISOUT, $isout['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipeItemPeer::ISOUT, $isout, $comparison);
    }

    /**
     * Filter the query by a related Stockrecipe object
     *
     * @param   Stockrecipe|PropelObjectCollection $stockrecipe The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipe($stockrecipe, $comparison = null)
    {
        if ($stockrecipe instanceof Stockrecipe) {
            return $this
                ->addUsingAlias(StockrecipeItemPeer::MASTER_ID, $stockrecipe->getId(), $comparison);
        } elseif ($stockrecipe instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrecipeItemPeer::MASTER_ID, $stockrecipe->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStockrecipe() only accepts arguments of type Stockrecipe or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Stockrecipe relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function joinStockrecipe($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Stockrecipe');

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
            $this->addJoinObject($join, 'Stockrecipe');
        }

        return $this;
    }

    /**
     * Use the Stockrecipe relation Stockrecipe object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockrecipe($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Stockrecipe', '\Webmis\Models\StockrecipeQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclature($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(StockrecipeItemPeer::NOMENCLATURE_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrecipeItemPeer::NOMENCLATURE_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StockrecipeItemQuery The current query, for fluid interface
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
     * @param   StockrecipeItem $stockrecipeItem Object to remove from the list of results
     *
     * @return StockrecipeItemQuery The current query, for fluid interface
     */
    public function prune($stockrecipeItem = null)
    {
        if ($stockrecipeItem) {
            $this->addUsingAlias(StockrecipeItemPeer::ID, $stockrecipeItem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
