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
use Webmis\Models\EventPayment;
use Webmis\Models\Rbcashoperation;
use Webmis\Models\RbcashoperationPeer;
use Webmis\Models\RbcashoperationQuery;

/**
 * Base class that represents a query for the 'rbCashOperation' table.
 *
 *
 *
 * @method RbcashoperationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbcashoperationQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbcashoperationQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbcashoperationQuery groupById() Group by the id column
 * @method RbcashoperationQuery groupByCode() Group by the code column
 * @method RbcashoperationQuery groupByName() Group by the name column
 *
 * @method RbcashoperationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbcashoperationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbcashoperationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbcashoperationQuery leftJoinEventPayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the EventPayment relation
 * @method RbcashoperationQuery rightJoinEventPayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EventPayment relation
 * @method RbcashoperationQuery innerJoinEventPayment($relationAlias = null) Adds a INNER JOIN clause to the query using the EventPayment relation
 *
 * @method Rbcashoperation findOne(PropelPDO $con = null) Return the first Rbcashoperation matching the query
 * @method Rbcashoperation findOneOrCreate(PropelPDO $con = null) Return the first Rbcashoperation matching the query, or a new Rbcashoperation object populated from the query conditions when no match is found
 *
 * @method Rbcashoperation findOneByCode(string $code) Return the first Rbcashoperation filtered by the code column
 * @method Rbcashoperation findOneByName(string $name) Return the first Rbcashoperation filtered by the name column
 *
 * @method array findById(int $id) Return Rbcashoperation objects filtered by the id column
 * @method array findByCode(string $code) Return Rbcashoperation objects filtered by the code column
 * @method array findByName(string $name) Return Rbcashoperation objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbcashoperationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbcashoperationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbcashoperation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbcashoperationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbcashoperationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbcashoperationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbcashoperationQuery) {
            return $criteria;
        }
        $query = new RbcashoperationQuery();
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
     * @return   Rbcashoperation|Rbcashoperation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbcashoperationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbcashoperationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbcashoperation A model object, or null if the key is not found
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
     * @return                 Rbcashoperation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name` FROM `rbCashOperation` WHERE `id` = :p0';
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
            $obj = new Rbcashoperation();
            $obj->hydrate($row);
            RbcashoperationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbcashoperation|Rbcashoperation[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbcashoperation[]|mixed the list of results, formatted by the current formatter
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
     * @return RbcashoperationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbcashoperationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbcashoperationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbcashoperationPeer::ID, $keys, Criteria::IN);
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
     * @return RbcashoperationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbcashoperationPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbcashoperationPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcashoperationPeer::ID, $id, $comparison);
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
     * @return RbcashoperationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbcashoperationPeer::CODE, $code, $comparison);
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
     * @return RbcashoperationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbcashoperationPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related EventPayment object
     *
     * @param   EventPayment|PropelObjectCollection $eventPayment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbcashoperationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventPayment($eventPayment, $comparison = null)
    {
        if ($eventPayment instanceof EventPayment) {
            return $this
                ->addUsingAlias(RbcashoperationPeer::ID, $eventPayment->getCashoperationId(), $comparison);
        } elseif ($eventPayment instanceof PropelObjectCollection) {
            return $this
                ->useEventPaymentQuery()
                ->filterByPrimaryKeys($eventPayment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventPayment() only accepts arguments of type EventPayment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the EventPayment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbcashoperationQuery The current query, for fluid interface
     */
    public function joinEventPayment($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('EventPayment');

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
            $this->addJoinObject($join, 'EventPayment');
        }

        return $this;
    }

    /**
     * Use the EventPayment relation EventPayment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\EventPaymentQuery A secondary query class using the current class as primary query
     */
    public function useEventPaymentQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEventPayment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'EventPayment', '\Webmis\Models\EventPaymentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbcashoperation $rbcashoperation Object to remove from the list of results
     *
     * @return RbcashoperationQuery The current query, for fluid interface
     */
    public function prune($rbcashoperation = null)
    {
        if ($rbcashoperation) {
            $this->addUsingAlias(RbcashoperationPeer::ID, $rbcashoperation->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
