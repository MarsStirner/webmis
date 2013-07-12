<?php

namespace Webmis\Models\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\EventFeed;
use Webmis\Models\EventFeedPeer;
use Webmis\Models\EventFeedQuery;

/**
 * Base class that represents a query for the 'Event_Feed' table.
 *
 *
 *
 * @method EventFeedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventFeedQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method EventFeedQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method EventFeedQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method EventFeedQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method EventFeedQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EventFeedQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method EventFeedQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method EventFeedQuery orderByMealtimeId($order = Criteria::ASC) Order by the mealTime_id column
 * @method EventFeedQuery orderByDietId($order = Criteria::ASC) Order by the diet_id column
 *
 * @method EventFeedQuery groupById() Group by the id column
 * @method EventFeedQuery groupByCreatedatetime() Group by the createDatetime column
 * @method EventFeedQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method EventFeedQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method EventFeedQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method EventFeedQuery groupByDeleted() Group by the deleted column
 * @method EventFeedQuery groupByEventId() Group by the event_id column
 * @method EventFeedQuery groupByDate() Group by the date column
 * @method EventFeedQuery groupByMealtimeId() Group by the mealTime_id column
 * @method EventFeedQuery groupByDietId() Group by the diet_id column
 *
 * @method EventFeedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventFeedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventFeedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventFeed findOne(PropelPDO $con = null) Return the first EventFeed matching the query
 * @method EventFeed findOneOrCreate(PropelPDO $con = null) Return the first EventFeed matching the query, or a new EventFeed object populated from the query conditions when no match is found
 *
 * @method EventFeed findOneByCreatedatetime(string $createDatetime) Return the first EventFeed filtered by the createDatetime column
 * @method EventFeed findOneByCreatepersonId(int $createPerson_id) Return the first EventFeed filtered by the createPerson_id column
 * @method EventFeed findOneByModifydatetime(string $modifyDatetime) Return the first EventFeed filtered by the modifyDatetime column
 * @method EventFeed findOneByModifypersonId(int $modifyPerson_id) Return the first EventFeed filtered by the modifyPerson_id column
 * @method EventFeed findOneByDeleted(boolean $deleted) Return the first EventFeed filtered by the deleted column
 * @method EventFeed findOneByEventId(int $event_id) Return the first EventFeed filtered by the event_id column
 * @method EventFeed findOneByDate(string $date) Return the first EventFeed filtered by the date column
 * @method EventFeed findOneByMealtimeId(int $mealTime_id) Return the first EventFeed filtered by the mealTime_id column
 * @method EventFeed findOneByDietId(int $diet_id) Return the first EventFeed filtered by the diet_id column
 *
 * @method array findById(int $id) Return EventFeed objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return EventFeed objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return EventFeed objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return EventFeed objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return EventFeed objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return EventFeed objects filtered by the deleted column
 * @method array findByEventId(int $event_id) Return EventFeed objects filtered by the event_id column
 * @method array findByDate(string $date) Return EventFeed objects filtered by the date column
 * @method array findByMealtimeId(int $mealTime_id) Return EventFeed objects filtered by the mealTime_id column
 * @method array findByDietId(int $diet_id) Return EventFeed objects filtered by the diet_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventFeedQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventFeedQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\EventFeed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventFeedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventFeedQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventFeedQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventFeedQuery) {
            return $criteria;
        }
        $query = new EventFeedQuery();
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
     * @return   EventFeed|EventFeed[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventFeedPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventFeedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventFeed A model object, or null if the key is not found
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
     * @return                 EventFeed A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `event_id`, `date`, `mealTime_id`, `diet_id` FROM `Event_Feed` WHERE `id` = :p0';
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
            $obj = new EventFeed();
            $obj->hydrate($row);
            EventFeedPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventFeed|EventFeed[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventFeed[]|mixed the list of results, formatted by the current formatter
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
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventFeedPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventFeedPeer::ID, $keys, Criteria::IN);
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
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventFeedPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventFeedPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the createDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedatetime('2011-03-14'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime('now'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime(array('max' => 'yesterday')); // WHERE createDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(EventFeedPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(EventFeedPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::CREATEDATETIME, $createdatetime, $comparison);
    }

    /**
     * Filter the query on the createPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatepersonId(1234); // WHERE createPerson_id = 1234
     * $query->filterByCreatepersonId(array(12, 34)); // WHERE createPerson_id IN (12, 34)
     * $query->filterByCreatepersonId(array('min' => 12)); // WHERE createPerson_id >= 12
     * $query->filterByCreatepersonId(array('max' => 12)); // WHERE createPerson_id <= 12
     * </code>
     *
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(EventFeedPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(EventFeedPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::CREATEPERSON_ID, $createpersonId, $comparison);
    }

    /**
     * Filter the query on the modifyDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByModifydatetime('2011-03-14'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime('now'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime(array('max' => 'yesterday')); // WHERE modifyDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifydatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(EventFeedPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(EventFeedPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::MODIFYDATETIME, $modifydatetime, $comparison);
    }

    /**
     * Filter the query on the modifyPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModifypersonId(1234); // WHERE modifyPerson_id = 1234
     * $query->filterByModifypersonId(array(12, 34)); // WHERE modifyPerson_id IN (12, 34)
     * $query->filterByModifypersonId(array('min' => 12)); // WHERE modifyPerson_id >= 12
     * $query->filterByModifypersonId(array('max' => 12)); // WHERE modifyPerson_id <= 12
     * </code>
     *
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(EventFeedPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(EventFeedPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventFeedPeer::DELETED, $deleted, $comparison);
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
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(EventFeedPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(EventFeedPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::EVENT_ID, $eventId, $comparison);
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
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(EventFeedPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(EventFeedPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the mealTime_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMealtimeId(1234); // WHERE mealTime_id = 1234
     * $query->filterByMealtimeId(array(12, 34)); // WHERE mealTime_id IN (12, 34)
     * $query->filterByMealtimeId(array('min' => 12)); // WHERE mealTime_id >= 12
     * $query->filterByMealtimeId(array('max' => 12)); // WHERE mealTime_id <= 12
     * </code>
     *
     * @param     mixed $mealtimeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByMealtimeId($mealtimeId = null, $comparison = null)
    {
        if (is_array($mealtimeId)) {
            $useMinMax = false;
            if (isset($mealtimeId['min'])) {
                $this->addUsingAlias(EventFeedPeer::MEALTIME_ID, $mealtimeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mealtimeId['max'])) {
                $this->addUsingAlias(EventFeedPeer::MEALTIME_ID, $mealtimeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::MEALTIME_ID, $mealtimeId, $comparison);
    }

    /**
     * Filter the query on the diet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDietId(1234); // WHERE diet_id = 1234
     * $query->filterByDietId(array(12, 34)); // WHERE diet_id IN (12, 34)
     * $query->filterByDietId(array('min' => 12)); // WHERE diet_id >= 12
     * $query->filterByDietId(array('max' => 12)); // WHERE diet_id <= 12
     * </code>
     *
     * @param     mixed $dietId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function filterByDietId($dietId = null, $comparison = null)
    {
        if (is_array($dietId)) {
            $useMinMax = false;
            if (isset($dietId['min'])) {
                $this->addUsingAlias(EventFeedPeer::DIET_ID, $dietId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dietId['max'])) {
                $this->addUsingAlias(EventFeedPeer::DIET_ID, $dietId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventFeedPeer::DIET_ID, $dietId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EventFeed $eventFeed Object to remove from the list of results
     *
     * @return EventFeedQuery The current query, for fluid interface
     */
    public function prune($eventFeed = null)
    {
        if ($eventFeed) {
            $this->addUsingAlias(EventFeedPeer::ID, $eventFeed->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
