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
use Webmis\Models\Rbnomenclature;
use Webmis\Models\RbnomenclaturePeer;
use Webmis\Models\RbnomenclatureQuery;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockrecipeItem;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\Stocktrans;

/**
 * Base class that represents a query for the 'rbNomenclature' table.
 *
 *
 *
 * @method RbnomenclatureQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbnomenclatureQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method RbnomenclatureQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbnomenclatureQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method RbnomenclatureQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbnomenclatureQuery groupById() Group by the id column
 * @method RbnomenclatureQuery groupByGroupId() Group by the group_id column
 * @method RbnomenclatureQuery groupByCode() Group by the code column
 * @method RbnomenclatureQuery groupByRegionalcode() Group by the regionalCode column
 * @method RbnomenclatureQuery groupByName() Group by the name column
 *
 * @method RbnomenclatureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbnomenclatureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbnomenclatureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbnomenclatureQuery leftJoinRbnomenclatureRelatedByGroupId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbnomenclatureRelatedByGroupId relation
 * @method RbnomenclatureQuery rightJoinRbnomenclatureRelatedByGroupId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbnomenclatureRelatedByGroupId relation
 * @method RbnomenclatureQuery innerJoinRbnomenclatureRelatedByGroupId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbnomenclatureRelatedByGroupId relation
 *
 * @method RbnomenclatureQuery leftJoinOrgstructureStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureStock relation
 * @method RbnomenclatureQuery rightJoinOrgstructureStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureStock relation
 * @method RbnomenclatureQuery innerJoinOrgstructureStock($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureStock relation
 *
 * @method RbnomenclatureQuery leftJoinStockmotionItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionItem relation
 * @method RbnomenclatureQuery rightJoinStockmotionItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionItem relation
 * @method RbnomenclatureQuery innerJoinStockmotionItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionItem relation
 *
 * @method RbnomenclatureQuery leftJoinStockrecipeItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrecipeItem relation
 * @method RbnomenclatureQuery rightJoinStockrecipeItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrecipeItem relation
 * @method RbnomenclatureQuery innerJoinStockrecipeItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrecipeItem relation
 *
 * @method RbnomenclatureQuery leftJoinStockrequisitionItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionItem relation
 * @method RbnomenclatureQuery rightJoinStockrequisitionItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionItem relation
 * @method RbnomenclatureQuery innerJoinStockrequisitionItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionItem relation
 *
 * @method RbnomenclatureQuery leftJoinStocktransRelatedByCrenomenclatureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StocktransRelatedByCrenomenclatureId relation
 * @method RbnomenclatureQuery rightJoinStocktransRelatedByCrenomenclatureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StocktransRelatedByCrenomenclatureId relation
 * @method RbnomenclatureQuery innerJoinStocktransRelatedByCrenomenclatureId($relationAlias = null) Adds a INNER JOIN clause to the query using the StocktransRelatedByCrenomenclatureId relation
 *
 * @method RbnomenclatureQuery leftJoinStocktransRelatedByDebnomenclatureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StocktransRelatedByDebnomenclatureId relation
 * @method RbnomenclatureQuery rightJoinStocktransRelatedByDebnomenclatureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StocktransRelatedByDebnomenclatureId relation
 * @method RbnomenclatureQuery innerJoinStocktransRelatedByDebnomenclatureId($relationAlias = null) Adds a INNER JOIN clause to the query using the StocktransRelatedByDebnomenclatureId relation
 *
 * @method RbnomenclatureQuery leftJoinRbnomenclatureRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbnomenclatureRelatedById relation
 * @method RbnomenclatureQuery rightJoinRbnomenclatureRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbnomenclatureRelatedById relation
 * @method RbnomenclatureQuery innerJoinRbnomenclatureRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the RbnomenclatureRelatedById relation
 *
 * @method Rbnomenclature findOne(PropelPDO $con = null) Return the first Rbnomenclature matching the query
 * @method Rbnomenclature findOneOrCreate(PropelPDO $con = null) Return the first Rbnomenclature matching the query, or a new Rbnomenclature object populated from the query conditions when no match is found
 *
 * @method Rbnomenclature findOneByGroupId(int $group_id) Return the first Rbnomenclature filtered by the group_id column
 * @method Rbnomenclature findOneByCode(string $code) Return the first Rbnomenclature filtered by the code column
 * @method Rbnomenclature findOneByRegionalcode(string $regionalCode) Return the first Rbnomenclature filtered by the regionalCode column
 * @method Rbnomenclature findOneByName(string $name) Return the first Rbnomenclature filtered by the name column
 *
 * @method array findById(int $id) Return Rbnomenclature objects filtered by the id column
 * @method array findByGroupId(int $group_id) Return Rbnomenclature objects filtered by the group_id column
 * @method array findByCode(string $code) Return Rbnomenclature objects filtered by the code column
 * @method array findByRegionalcode(string $regionalCode) Return Rbnomenclature objects filtered by the regionalCode column
 * @method array findByName(string $name) Return Rbnomenclature objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbnomenclatureQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbnomenclatureQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbnomenclature', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbnomenclatureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbnomenclatureQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbnomenclatureQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbnomenclatureQuery) {
            return $criteria;
        }
        $query = new RbnomenclatureQuery();
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
     * @return   Rbnomenclature|Rbnomenclature[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbnomenclaturePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbnomenclaturePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbnomenclature A model object, or null if the key is not found
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
     * @return                 Rbnomenclature A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `group_id`, `code`, `regionalCode`, `name` FROM `rbNomenclature` WHERE `id` = :p0';
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
            $obj = new Rbnomenclature();
            $obj->hydrate($row);
            RbnomenclaturePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbnomenclature|Rbnomenclature[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbnomenclature[]|mixed the list of results, formatted by the current formatter
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
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbnomenclaturePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbnomenclaturePeer::ID, $keys, Criteria::IN);
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
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbnomenclaturePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbnomenclaturePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbnomenclaturePeer::ID, $id, $comparison);
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
     * @see       filterByRbnomenclatureRelatedByGroupId()
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(RbnomenclaturePeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(RbnomenclaturePeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbnomenclaturePeer::GROUP_ID, $groupId, $comparison);
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
     * @return RbnomenclatureQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbnomenclaturePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the regionalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalcode('fooValue');   // WHERE regionalCode = 'fooValue'
     * $query->filterByRegionalcode('%fooValue%'); // WHERE regionalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function filterByRegionalcode($regionalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalcode)) {
                $regionalcode = str_replace('*', '%', $regionalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbnomenclaturePeer::REGIONALCODE, $regionalcode, $comparison);
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
     * @return RbnomenclatureQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbnomenclaturePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclatureRelatedByGroupId($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::GROUP_ID, $rbnomenclature->getId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbnomenclaturePeer::GROUP_ID, $rbnomenclature->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbnomenclatureRelatedByGroupId() only accepts arguments of type Rbnomenclature or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbnomenclatureRelatedByGroupId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function joinRbnomenclatureRelatedByGroupId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbnomenclatureRelatedByGroupId');

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
            $this->addJoinObject($join, 'RbnomenclatureRelatedByGroupId');
        }

        return $this;
    }

    /**
     * Use the RbnomenclatureRelatedByGroupId relation Rbnomenclature object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbnomenclatureQuery A secondary query class using the current class as primary query
     */
    public function useRbnomenclatureRelatedByGroupIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbnomenclatureRelatedByGroupId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbnomenclatureRelatedByGroupId', '\Webmis\Models\RbnomenclatureQuery');
    }

    /**
     * Filter the query by a related OrgstructureStock object
     *
     * @param   OrgstructureStock|PropelObjectCollection $orgstructureStock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureStock($orgstructureStock, $comparison = null)
    {
        if ($orgstructureStock instanceof OrgstructureStock) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $orgstructureStock->getNomenclatureId(), $comparison);
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
     * @return RbnomenclatureQuery The current query, for fluid interface
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
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionItem($stockmotionItem, $comparison = null)
    {
        if ($stockmotionItem instanceof StockmotionItem) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $stockmotionItem->getNomenclatureId(), $comparison);
        } elseif ($stockmotionItem instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionItemQuery()
                ->filterByPrimaryKeys($stockmotionItem->getPrimaryKeys())
                ->endUse();
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
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function joinStockmotionItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useStockmotionItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionItem', '\Webmis\Models\StockmotionItemQuery');
    }

    /**
     * Filter the query by a related StockrecipeItem object
     *
     * @param   StockrecipeItem|PropelObjectCollection $stockrecipeItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipeItem($stockrecipeItem, $comparison = null)
    {
        if ($stockrecipeItem instanceof StockrecipeItem) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $stockrecipeItem->getNomenclatureId(), $comparison);
        } elseif ($stockrecipeItem instanceof PropelObjectCollection) {
            return $this
                ->useStockrecipeItemQuery()
                ->filterByPrimaryKeys($stockrecipeItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrecipeItem() only accepts arguments of type StockrecipeItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrecipeItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function joinStockrecipeItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrecipeItem');

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
            $this->addJoinObject($join, 'StockrecipeItem');
        }

        return $this;
    }

    /**
     * Use the StockrecipeItem relation StockrecipeItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeItemQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrecipeItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrecipeItem', '\Webmis\Models\StockrecipeItemQuery');
    }

    /**
     * Filter the query by a related StockrequisitionItem object
     *
     * @param   StockrequisitionItem|PropelObjectCollection $stockrequisitionItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionItem($stockrequisitionItem, $comparison = null)
    {
        if ($stockrequisitionItem instanceof StockrequisitionItem) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $stockrequisitionItem->getNomenclatureId(), $comparison);
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
     * @return RbnomenclatureQuery The current query, for fluid interface
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
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktransRelatedByCrenomenclatureId($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $stocktrans->getCrenomenclatureId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransRelatedByCrenomenclatureIdQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktransRelatedByCrenomenclatureId() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StocktransRelatedByCrenomenclatureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function joinStocktransRelatedByCrenomenclatureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StocktransRelatedByCrenomenclatureId');

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
            $this->addJoinObject($join, 'StocktransRelatedByCrenomenclatureId');
        }

        return $this;
    }

    /**
     * Use the StocktransRelatedByCrenomenclatureId relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransRelatedByCrenomenclatureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStocktransRelatedByCrenomenclatureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StocktransRelatedByCrenomenclatureId', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Filter the query by a related Stocktrans object
     *
     * @param   Stocktrans|PropelObjectCollection $stocktrans  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktransRelatedByDebnomenclatureId($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $stocktrans->getDebnomenclatureId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransRelatedByDebnomenclatureIdQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktransRelatedByDebnomenclatureId() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StocktransRelatedByDebnomenclatureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function joinStocktransRelatedByDebnomenclatureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StocktransRelatedByDebnomenclatureId');

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
            $this->addJoinObject($join, 'StocktransRelatedByDebnomenclatureId');
        }

        return $this;
    }

    /**
     * Use the StocktransRelatedByDebnomenclatureId relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransRelatedByDebnomenclatureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStocktransRelatedByDebnomenclatureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StocktransRelatedByDebnomenclatureId', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Filter the query by a related Rbnomenclature object
     *
     * @param   Rbnomenclature|PropelObjectCollection $rbnomenclature  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbnomenclatureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbnomenclatureRelatedById($rbnomenclature, $comparison = null)
    {
        if ($rbnomenclature instanceof Rbnomenclature) {
            return $this
                ->addUsingAlias(RbnomenclaturePeer::ID, $rbnomenclature->getGroupId(), $comparison);
        } elseif ($rbnomenclature instanceof PropelObjectCollection) {
            return $this
                ->useRbnomenclatureRelatedByIdQuery()
                ->filterByPrimaryKeys($rbnomenclature->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbnomenclatureRelatedById() only accepts arguments of type Rbnomenclature or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbnomenclatureRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function joinRbnomenclatureRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbnomenclatureRelatedById');

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
            $this->addJoinObject($join, 'RbnomenclatureRelatedById');
        }

        return $this;
    }

    /**
     * Use the RbnomenclatureRelatedById relation Rbnomenclature object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbnomenclatureQuery A secondary query class using the current class as primary query
     */
    public function useRbnomenclatureRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbnomenclatureRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbnomenclatureRelatedById', '\Webmis\Models\RbnomenclatureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbnomenclature $rbnomenclature Object to remove from the list of results
     *
     * @return RbnomenclatureQuery The current query, for fluid interface
     */
    public function prune($rbnomenclature = null)
    {
        if ($rbnomenclature) {
            $this->addUsingAlias(RbnomenclaturePeer::ID, $rbnomenclature->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
