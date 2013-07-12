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
use Webmis\Models\Notificationoccurred;
use Webmis\Models\NotificationoccurredPeer;
use Webmis\Models\NotificationoccurredQuery;
use Webmis\Models\Person;

/**
 * Base class that represents a query for the 'NotificationOccurred' table.
 *
 *
 *
 * @method NotificationoccurredQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NotificationoccurredQuery orderByEventdatetime($order = Criteria::ASC) Order by the eventDatetime column
 * @method NotificationoccurredQuery orderByClientid($order = Criteria::ASC) Order by the clientId column
 * @method NotificationoccurredQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 *
 * @method NotificationoccurredQuery groupById() Group by the id column
 * @method NotificationoccurredQuery groupByEventdatetime() Group by the eventDatetime column
 * @method NotificationoccurredQuery groupByClientid() Group by the clientId column
 * @method NotificationoccurredQuery groupByUserid() Group by the userId column
 *
 * @method NotificationoccurredQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NotificationoccurredQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NotificationoccurredQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NotificationoccurredQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method NotificationoccurredQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method NotificationoccurredQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method Notificationoccurred findOne(PropelPDO $con = null) Return the first Notificationoccurred matching the query
 * @method Notificationoccurred findOneOrCreate(PropelPDO $con = null) Return the first Notificationoccurred matching the query, or a new Notificationoccurred object populated from the query conditions when no match is found
 *
 * @method Notificationoccurred findOneByEventdatetime(string $eventDatetime) Return the first Notificationoccurred filtered by the eventDatetime column
 * @method Notificationoccurred findOneByClientid(int $clientId) Return the first Notificationoccurred filtered by the clientId column
 * @method Notificationoccurred findOneByUserid(int $userId) Return the first Notificationoccurred filtered by the userId column
 *
 * @method array findById(int $id) Return Notificationoccurred objects filtered by the id column
 * @method array findByEventdatetime(string $eventDatetime) Return Notificationoccurred objects filtered by the eventDatetime column
 * @method array findByClientid(int $clientId) Return Notificationoccurred objects filtered by the clientId column
 * @method array findByUserid(int $userId) Return Notificationoccurred objects filtered by the userId column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseNotificationoccurredQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNotificationoccurredQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Notificationoccurred', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NotificationoccurredQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NotificationoccurredQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NotificationoccurredQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NotificationoccurredQuery) {
            return $criteria;
        }
        $query = new NotificationoccurredQuery();
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
     * @return   Notificationoccurred|Notificationoccurred[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NotificationoccurredPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NotificationoccurredPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Notificationoccurred A model object, or null if the key is not found
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
     * @return                 Notificationoccurred A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `eventDatetime`, `clientId`, `userId` FROM `NotificationOccurred` WHERE `id` = :p0';
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
            $obj = new Notificationoccurred();
            $obj->hydrate($row);
            NotificationoccurredPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Notificationoccurred|Notificationoccurred[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Notificationoccurred[]|mixed the list of results, formatted by the current formatter
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
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NotificationoccurredPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NotificationoccurredPeer::ID, $keys, Criteria::IN);
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
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NotificationoccurredPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NotificationoccurredPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationoccurredPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the eventDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByEventdatetime('2011-03-14'); // WHERE eventDatetime = '2011-03-14'
     * $query->filterByEventdatetime('now'); // WHERE eventDatetime = '2011-03-14'
     * $query->filterByEventdatetime(array('max' => 'yesterday')); // WHERE eventDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $eventdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function filterByEventdatetime($eventdatetime = null, $comparison = null)
    {
        if (is_array($eventdatetime)) {
            $useMinMax = false;
            if (isset($eventdatetime['min'])) {
                $this->addUsingAlias(NotificationoccurredPeer::EVENTDATETIME, $eventdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventdatetime['max'])) {
                $this->addUsingAlias(NotificationoccurredPeer::EVENTDATETIME, $eventdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationoccurredPeer::EVENTDATETIME, $eventdatetime, $comparison);
    }

    /**
     * Filter the query on the clientId column
     *
     * Example usage:
     * <code>
     * $query->filterByClientid(1234); // WHERE clientId = 1234
     * $query->filterByClientid(array(12, 34)); // WHERE clientId IN (12, 34)
     * $query->filterByClientid(array('min' => 12)); // WHERE clientId >= 12
     * $query->filterByClientid(array('max' => 12)); // WHERE clientId <= 12
     * </code>
     *
     * @param     mixed $clientid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function filterByClientid($clientid = null, $comparison = null)
    {
        if (is_array($clientid)) {
            $useMinMax = false;
            if (isset($clientid['min'])) {
                $this->addUsingAlias(NotificationoccurredPeer::CLIENTID, $clientid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientid['max'])) {
                $this->addUsingAlias(NotificationoccurredPeer::CLIENTID, $clientid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationoccurredPeer::CLIENTID, $clientid, $comparison);
    }

    /**
     * Filter the query on the userId column
     *
     * Example usage:
     * <code>
     * $query->filterByUserid(1234); // WHERE userId = 1234
     * $query->filterByUserid(array(12, 34)); // WHERE userId IN (12, 34)
     * $query->filterByUserid(array('min' => 12)); // WHERE userId >= 12
     * $query->filterByUserid(array('max' => 12)); // WHERE userId <= 12
     * </code>
     *
     * @see       filterByPerson()
     *
     * @param     mixed $userid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function filterByUserid($userid = null, $comparison = null)
    {
        if (is_array($userid)) {
            $useMinMax = false;
            if (isset($userid['min'])) {
                $this->addUsingAlias(NotificationoccurredPeer::USERID, $userid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userid['max'])) {
                $this->addUsingAlias(NotificationoccurredPeer::USERID, $userid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NotificationoccurredPeer::USERID, $userid, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NotificationoccurredQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerson($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(NotificationoccurredPeer::USERID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NotificationoccurredPeer::USERID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPerson() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function joinPerson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person');

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
            $this->addJoinObject($join, 'Person');
        }

        return $this;
    }

    /**
     * Use the Person relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person', '\Webmis\Models\PersonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Notificationoccurred $notificationoccurred Object to remove from the list of results
     *
     * @return NotificationoccurredQuery The current query, for fluid interface
     */
    public function prune($notificationoccurred = null)
    {
        if ($notificationoccurred) {
            $this->addUsingAlias(NotificationoccurredPeer::ID, $notificationoccurred->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
