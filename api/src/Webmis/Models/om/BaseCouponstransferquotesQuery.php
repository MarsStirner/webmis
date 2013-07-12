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
use Webmis\Models\CouponstransferquotesPeer;
use Webmis\Models\CouponstransferquotesQuery;
use Webmis\Models\Rbtimequotingtype;
use Webmis\Models\Rbtransferdatetype;

/**
 * Base class that represents a query for the 'CouponsTransferQuotes' table.
 *
 *
 *
 * @method CouponstransferquotesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CouponstransferquotesQuery orderBySrcquotingtypeId($order = Criteria::ASC) Order by the srcQuotingType_id column
 * @method CouponstransferquotesQuery orderByDstquotingtypeId($order = Criteria::ASC) Order by the dstQuotingType_id column
 * @method CouponstransferquotesQuery orderByTransferdaytype($order = Criteria::ASC) Order by the transferDayType column
 * @method CouponstransferquotesQuery orderByTransfertime($order = Criteria::ASC) Order by the transferTime column
 * @method CouponstransferquotesQuery orderByCouponsenabled($order = Criteria::ASC) Order by the couponsEnabled column
 *
 * @method CouponstransferquotesQuery groupById() Group by the id column
 * @method CouponstransferquotesQuery groupBySrcquotingtypeId() Group by the srcQuotingType_id column
 * @method CouponstransferquotesQuery groupByDstquotingtypeId() Group by the dstQuotingType_id column
 * @method CouponstransferquotesQuery groupByTransferdaytype() Group by the transferDayType column
 * @method CouponstransferquotesQuery groupByTransfertime() Group by the transferTime column
 * @method CouponstransferquotesQuery groupByCouponsenabled() Group by the couponsEnabled column
 *
 * @method CouponstransferquotesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CouponstransferquotesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CouponstransferquotesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CouponstransferquotesQuery leftJoinRbtimequotingtypeRelatedBySrcquotingtypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbtimequotingtypeRelatedBySrcquotingtypeId relation
 * @method CouponstransferquotesQuery rightJoinRbtimequotingtypeRelatedBySrcquotingtypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbtimequotingtypeRelatedBySrcquotingtypeId relation
 * @method CouponstransferquotesQuery innerJoinRbtimequotingtypeRelatedBySrcquotingtypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbtimequotingtypeRelatedBySrcquotingtypeId relation
 *
 * @method CouponstransferquotesQuery leftJoinRbtimequotingtypeRelatedByDstquotingtypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbtimequotingtypeRelatedByDstquotingtypeId relation
 * @method CouponstransferquotesQuery rightJoinRbtimequotingtypeRelatedByDstquotingtypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbtimequotingtypeRelatedByDstquotingtypeId relation
 * @method CouponstransferquotesQuery innerJoinRbtimequotingtypeRelatedByDstquotingtypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the RbtimequotingtypeRelatedByDstquotingtypeId relation
 *
 * @method CouponstransferquotesQuery leftJoinRbtransferdatetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtransferdatetype relation
 * @method CouponstransferquotesQuery rightJoinRbtransferdatetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtransferdatetype relation
 * @method CouponstransferquotesQuery innerJoinRbtransferdatetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtransferdatetype relation
 *
 * @method Couponstransferquotes findOne(PropelPDO $con = null) Return the first Couponstransferquotes matching the query
 * @method Couponstransferquotes findOneOrCreate(PropelPDO $con = null) Return the first Couponstransferquotes matching the query, or a new Couponstransferquotes object populated from the query conditions when no match is found
 *
 * @method Couponstransferquotes findOneBySrcquotingtypeId(int $srcQuotingType_id) Return the first Couponstransferquotes filtered by the srcQuotingType_id column
 * @method Couponstransferquotes findOneByDstquotingtypeId(int $dstQuotingType_id) Return the first Couponstransferquotes filtered by the dstQuotingType_id column
 * @method Couponstransferquotes findOneByTransferdaytype(int $transferDayType) Return the first Couponstransferquotes filtered by the transferDayType column
 * @method Couponstransferquotes findOneByTransfertime(string $transferTime) Return the first Couponstransferquotes filtered by the transferTime column
 * @method Couponstransferquotes findOneByCouponsenabled(boolean $couponsEnabled) Return the first Couponstransferquotes filtered by the couponsEnabled column
 *
 * @method array findById(int $id) Return Couponstransferquotes objects filtered by the id column
 * @method array findBySrcquotingtypeId(int $srcQuotingType_id) Return Couponstransferquotes objects filtered by the srcQuotingType_id column
 * @method array findByDstquotingtypeId(int $dstQuotingType_id) Return Couponstransferquotes objects filtered by the dstQuotingType_id column
 * @method array findByTransferdaytype(int $transferDayType) Return Couponstransferquotes objects filtered by the transferDayType column
 * @method array findByTransfertime(string $transferTime) Return Couponstransferquotes objects filtered by the transferTime column
 * @method array findByCouponsenabled(boolean $couponsEnabled) Return Couponstransferquotes objects filtered by the couponsEnabled column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseCouponstransferquotesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCouponstransferquotesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Couponstransferquotes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CouponstransferquotesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CouponstransferquotesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CouponstransferquotesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CouponstransferquotesQuery) {
            return $criteria;
        }
        $query = new CouponstransferquotesQuery();
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
     * @return   Couponstransferquotes|Couponstransferquotes[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CouponstransferquotesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CouponstransferquotesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Couponstransferquotes A model object, or null if the key is not found
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
     * @return                 Couponstransferquotes A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `srcQuotingType_id`, `dstQuotingType_id`, `transferDayType`, `transferTime`, `couponsEnabled` FROM `CouponsTransferQuotes` WHERE `id` = :p0';
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
            $obj = new Couponstransferquotes();
            $obj->hydrate($row);
            CouponstransferquotesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Couponstransferquotes|Couponstransferquotes[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Couponstransferquotes[]|mixed the list of results, formatted by the current formatter
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
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CouponstransferquotesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CouponstransferquotesPeer::ID, $keys, Criteria::IN);
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
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponstransferquotesPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the srcQuotingType_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySrcquotingtypeId(1234); // WHERE srcQuotingType_id = 1234
     * $query->filterBySrcquotingtypeId(array(12, 34)); // WHERE srcQuotingType_id IN (12, 34)
     * $query->filterBySrcquotingtypeId(array('min' => 12)); // WHERE srcQuotingType_id >= 12
     * $query->filterBySrcquotingtypeId(array('max' => 12)); // WHERE srcQuotingType_id <= 12
     * </code>
     *
     * @see       filterByRbtimequotingtypeRelatedBySrcquotingtypeId()
     *
     * @param     mixed $srcquotingtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterBySrcquotingtypeId($srcquotingtypeId = null, $comparison = null)
    {
        if (is_array($srcquotingtypeId)) {
            $useMinMax = false;
            if (isset($srcquotingtypeId['min'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::SRCQUOTINGTYPE_ID, $srcquotingtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($srcquotingtypeId['max'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::SRCQUOTINGTYPE_ID, $srcquotingtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponstransferquotesPeer::SRCQUOTINGTYPE_ID, $srcquotingtypeId, $comparison);
    }

    /**
     * Filter the query on the dstQuotingType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDstquotingtypeId(1234); // WHERE dstQuotingType_id = 1234
     * $query->filterByDstquotingtypeId(array(12, 34)); // WHERE dstQuotingType_id IN (12, 34)
     * $query->filterByDstquotingtypeId(array('min' => 12)); // WHERE dstQuotingType_id >= 12
     * $query->filterByDstquotingtypeId(array('max' => 12)); // WHERE dstQuotingType_id <= 12
     * </code>
     *
     * @see       filterByRbtimequotingtypeRelatedByDstquotingtypeId()
     *
     * @param     mixed $dstquotingtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterByDstquotingtypeId($dstquotingtypeId = null, $comparison = null)
    {
        if (is_array($dstquotingtypeId)) {
            $useMinMax = false;
            if (isset($dstquotingtypeId['min'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::DSTQUOTINGTYPE_ID, $dstquotingtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dstquotingtypeId['max'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::DSTQUOTINGTYPE_ID, $dstquotingtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponstransferquotesPeer::DSTQUOTINGTYPE_ID, $dstquotingtypeId, $comparison);
    }

    /**
     * Filter the query on the transferDayType column
     *
     * Example usage:
     * <code>
     * $query->filterByTransferdaytype(1234); // WHERE transferDayType = 1234
     * $query->filterByTransferdaytype(array(12, 34)); // WHERE transferDayType IN (12, 34)
     * $query->filterByTransferdaytype(array('min' => 12)); // WHERE transferDayType >= 12
     * $query->filterByTransferdaytype(array('max' => 12)); // WHERE transferDayType <= 12
     * </code>
     *
     * @see       filterByRbtransferdatetype()
     *
     * @param     mixed $transferdaytype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterByTransferdaytype($transferdaytype = null, $comparison = null)
    {
        if (is_array($transferdaytype)) {
            $useMinMax = false;
            if (isset($transferdaytype['min'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::TRANSFERDAYTYPE, $transferdaytype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transferdaytype['max'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::TRANSFERDAYTYPE, $transferdaytype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponstransferquotesPeer::TRANSFERDAYTYPE, $transferdaytype, $comparison);
    }

    /**
     * Filter the query on the transferTime column
     *
     * Example usage:
     * <code>
     * $query->filterByTransfertime('2011-03-14'); // WHERE transferTime = '2011-03-14'
     * $query->filterByTransfertime('now'); // WHERE transferTime = '2011-03-14'
     * $query->filterByTransfertime(array('max' => 'yesterday')); // WHERE transferTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $transfertime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterByTransfertime($transfertime = null, $comparison = null)
    {
        if (is_array($transfertime)) {
            $useMinMax = false;
            if (isset($transfertime['min'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::TRANSFERTIME, $transfertime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transfertime['max'])) {
                $this->addUsingAlias(CouponstransferquotesPeer::TRANSFERTIME, $transfertime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CouponstransferquotesPeer::TRANSFERTIME, $transfertime, $comparison);
    }

    /**
     * Filter the query on the couponsEnabled column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponsenabled(true); // WHERE couponsEnabled = true
     * $query->filterByCouponsenabled('yes'); // WHERE couponsEnabled = true
     * </code>
     *
     * @param     boolean|string $couponsenabled The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function filterByCouponsenabled($couponsenabled = null, $comparison = null)
    {
        if (is_string($couponsenabled)) {
            $couponsenabled = in_array(strtolower($couponsenabled), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CouponstransferquotesPeer::COUPONSENABLED, $couponsenabled, $comparison);
    }

    /**
     * Filter the query by a related Rbtimequotingtype object
     *
     * @param   Rbtimequotingtype|PropelObjectCollection $rbtimequotingtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CouponstransferquotesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtimequotingtypeRelatedBySrcquotingtypeId($rbtimequotingtype, $comparison = null)
    {
        if ($rbtimequotingtype instanceof Rbtimequotingtype) {
            return $this
                ->addUsingAlias(CouponstransferquotesPeer::SRCQUOTINGTYPE_ID, $rbtimequotingtype->getCode(), $comparison);
        } elseif ($rbtimequotingtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CouponstransferquotesPeer::SRCQUOTINGTYPE_ID, $rbtimequotingtype->toKeyValue('PrimaryKey', 'Code'), $comparison);
        } else {
            throw new PropelException('filterByRbtimequotingtypeRelatedBySrcquotingtypeId() only accepts arguments of type Rbtimequotingtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbtimequotingtypeRelatedBySrcquotingtypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function joinRbtimequotingtypeRelatedBySrcquotingtypeId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbtimequotingtypeRelatedBySrcquotingtypeId');

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
            $this->addJoinObject($join, 'RbtimequotingtypeRelatedBySrcquotingtypeId');
        }

        return $this;
    }

    /**
     * Use the RbtimequotingtypeRelatedBySrcquotingtypeId relation Rbtimequotingtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtimequotingtypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtimequotingtypeRelatedBySrcquotingtypeIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtimequotingtypeRelatedBySrcquotingtypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbtimequotingtypeRelatedBySrcquotingtypeId', '\Webmis\Models\RbtimequotingtypeQuery');
    }

    /**
     * Filter the query by a related Rbtimequotingtype object
     *
     * @param   Rbtimequotingtype|PropelObjectCollection $rbtimequotingtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CouponstransferquotesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtimequotingtypeRelatedByDstquotingtypeId($rbtimequotingtype, $comparison = null)
    {
        if ($rbtimequotingtype instanceof Rbtimequotingtype) {
            return $this
                ->addUsingAlias(CouponstransferquotesPeer::DSTQUOTINGTYPE_ID, $rbtimequotingtype->getCode(), $comparison);
        } elseif ($rbtimequotingtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CouponstransferquotesPeer::DSTQUOTINGTYPE_ID, $rbtimequotingtype->toKeyValue('PrimaryKey', 'Code'), $comparison);
        } else {
            throw new PropelException('filterByRbtimequotingtypeRelatedByDstquotingtypeId() only accepts arguments of type Rbtimequotingtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbtimequotingtypeRelatedByDstquotingtypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function joinRbtimequotingtypeRelatedByDstquotingtypeId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbtimequotingtypeRelatedByDstquotingtypeId');

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
            $this->addJoinObject($join, 'RbtimequotingtypeRelatedByDstquotingtypeId');
        }

        return $this;
    }

    /**
     * Use the RbtimequotingtypeRelatedByDstquotingtypeId relation Rbtimequotingtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtimequotingtypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtimequotingtypeRelatedByDstquotingtypeIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtimequotingtypeRelatedByDstquotingtypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbtimequotingtypeRelatedByDstquotingtypeId', '\Webmis\Models\RbtimequotingtypeQuery');
    }

    /**
     * Filter the query by a related Rbtransferdatetype object
     *
     * @param   Rbtransferdatetype|PropelObjectCollection $rbtransferdatetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CouponstransferquotesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtransferdatetype($rbtransferdatetype, $comparison = null)
    {
        if ($rbtransferdatetype instanceof Rbtransferdatetype) {
            return $this
                ->addUsingAlias(CouponstransferquotesPeer::TRANSFERDAYTYPE, $rbtransferdatetype->getCode(), $comparison);
        } elseif ($rbtransferdatetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(CouponstransferquotesPeer::TRANSFERDAYTYPE, $rbtransferdatetype->toKeyValue('PrimaryKey', 'Code'), $comparison);
        } else {
            throw new PropelException('filterByRbtransferdatetype() only accepts arguments of type Rbtransferdatetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtransferdatetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function joinRbtransferdatetype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtransferdatetype');

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
            $this->addJoinObject($join, 'Rbtransferdatetype');
        }

        return $this;
    }

    /**
     * Use the Rbtransferdatetype relation Rbtransferdatetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtransferdatetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtransferdatetypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtransferdatetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtransferdatetype', '\Webmis\Models\RbtransferdatetypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Couponstransferquotes $couponstransferquotes Object to remove from the list of results
     *
     * @return CouponstransferquotesQuery The current query, for fluid interface
     */
    public function prune($couponstransferquotes = null)
    {
        if ($couponstransferquotes) {
            $this->addUsingAlias(CouponstransferquotesPeer::ID, $couponstransferquotes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
