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
use Webmis\Models\Actiontissue;
use Webmis\Models\Event;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\Tissue;
use Webmis\Models\TissuePeer;
use Webmis\Models\TissueQuery;

/**
 * Base class that represents a query for the 'Tissue' table.
 *
 *
 *
 * @method TissueQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TissueQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method TissueQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method TissueQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method TissueQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 *
 * @method TissueQuery groupById() Group by the id column
 * @method TissueQuery groupByTypeId() Group by the type_id column
 * @method TissueQuery groupByDate() Group by the date column
 * @method TissueQuery groupByBarcode() Group by the barcode column
 * @method TissueQuery groupByEventId() Group by the event_id column
 *
 * @method TissueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TissueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TissueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TissueQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method TissueQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method TissueQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method TissueQuery leftJoinRbtissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtissuetype relation
 * @method TissueQuery rightJoinRbtissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtissuetype relation
 * @method TissueQuery innerJoinRbtissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtissuetype relation
 *
 * @method TissueQuery leftJoinActiontissue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontissue relation
 * @method TissueQuery rightJoinActiontissue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontissue relation
 * @method TissueQuery innerJoinActiontissue($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontissue relation
 *
 * @method Tissue findOne(PropelPDO $con = null) Return the first Tissue matching the query
 * @method Tissue findOneOrCreate(PropelPDO $con = null) Return the first Tissue matching the query, or a new Tissue object populated from the query conditions when no match is found
 *
 * @method Tissue findOneByTypeId(int $type_id) Return the first Tissue filtered by the type_id column
 * @method Tissue findOneByDate(string $date) Return the first Tissue filtered by the date column
 * @method Tissue findOneByBarcode(string $barcode) Return the first Tissue filtered by the barcode column
 * @method Tissue findOneByEventId(int $event_id) Return the first Tissue filtered by the event_id column
 *
 * @method array findById(int $id) Return Tissue objects filtered by the id column
 * @method array findByTypeId(int $type_id) Return Tissue objects filtered by the type_id column
 * @method array findByDate(string $date) Return Tissue objects filtered by the date column
 * @method array findByBarcode(string $barcode) Return Tissue objects filtered by the barcode column
 * @method array findByEventId(int $event_id) Return Tissue objects filtered by the event_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTissueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTissueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Tissue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TissueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TissueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TissueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TissueQuery) {
            return $criteria;
        }
        $query = new TissueQuery();
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
     * @return   Tissue|Tissue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TissuePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TissuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tissue A model object, or null if the key is not found
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
     * @return                 Tissue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `type_id`, `date`, `barcode`, `event_id` FROM `Tissue` WHERE `id` = :p0';
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
            $obj = new Tissue();
            $obj->hydrate($row);
            TissuePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tissue|Tissue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tissue[]|mixed the list of results, formatted by the current formatter
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
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TissuePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TissuePeer::ID, $keys, Criteria::IN);
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
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TissuePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TissuePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TissuePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id >= 12
     * $query->filterByTypeId(array('max' => 12)); // WHERE type_id <= 12
     * </code>
     *
     * @see       filterByRbtissuetype()
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(TissuePeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(TissuePeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TissuePeer::TYPE_ID, $typeId, $comparison);
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
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(TissuePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(TissuePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TissuePeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode('fooValue');   // WHERE barcode = 'fooValue'
     * $query->filterByBarcode('%fooValue%'); // WHERE barcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $barcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($barcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $barcode)) {
                $barcode = str_replace('*', '%', $barcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TissuePeer::BARCODE, $barcode, $comparison);
    }

    /**
     * Filter the query on the event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventId(1234); // WHERE event_id = 1234
     * $query->filterByEventId(array(12, 34)); // WHERE event_id IN (12, 34)
     * $query->filterByEventId(array('min' => 12)); // WHERE event_id >= 12
     * $query->filterByEventId(array('max' => 12)); // WHERE event_id <= 12
     * </code>
     *
     * @see       filterByEvent()
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(TissuePeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(TissuePeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TissuePeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query by a related Event object
     *
     * @param   Event|PropelObjectCollection $event The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TissueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof Event) {
            return $this
                ->addUsingAlias(TissuePeer::EVENT_ID, $event->getId(), $comparison);
        } elseif ($event instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TissuePeer::EVENT_ID, $event->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type Event or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

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
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', '\Webmis\Models\EventQuery');
    }

    /**
     * Filter the query by a related Rbtissuetype object
     *
     * @param   Rbtissuetype|PropelObjectCollection $rbtissuetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TissueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtissuetype($rbtissuetype, $comparison = null)
    {
        if ($rbtissuetype instanceof Rbtissuetype) {
            return $this
                ->addUsingAlias(TissuePeer::TYPE_ID, $rbtissuetype->getId(), $comparison);
        } elseif ($rbtissuetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TissuePeer::TYPE_ID, $rbtissuetype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtissuetype() only accepts arguments of type Rbtissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtissuetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function joinRbtissuetype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtissuetype');

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
            $this->addJoinObject($join, 'Rbtissuetype');
        }

        return $this;
    }

    /**
     * Use the Rbtissuetype relation Rbtissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtissuetypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtissuetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtissuetype', '\Webmis\Models\RbtissuetypeQuery');
    }

    /**
     * Filter the query by a related Actiontissue object
     *
     * @param   Actiontissue|PropelObjectCollection $actiontissue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TissueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontissue($actiontissue, $comparison = null)
    {
        if ($actiontissue instanceof Actiontissue) {
            return $this
                ->addUsingAlias(TissuePeer::ID, $actiontissue->getTissueId(), $comparison);
        } elseif ($actiontissue instanceof PropelObjectCollection) {
            return $this
                ->useActiontissueQuery()
                ->filterByPrimaryKeys($actiontissue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontissue() only accepts arguments of type Actiontissue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actiontissue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function joinActiontissue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actiontissue');

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
            $this->addJoinObject($join, 'Actiontissue');
        }

        return $this;
    }

    /**
     * Use the Actiontissue relation Actiontissue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontissueQuery A secondary query class using the current class as primary query
     */
    public function useActiontissueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontissue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actiontissue', '\Webmis\Models\ActiontissueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tissue $tissue Object to remove from the list of results
     *
     * @return TissueQuery The current query, for fluid interface
     */
    public function prune($tissue = null)
    {
        if ($tissue) {
            $this->addUsingAlias(TissuePeer::ID, $tissue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
