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
use Webmis\Models\Visit;
use Webmis\Models\VisitPeer;
use Webmis\Models\VisitQuery;

/**
 * Base class that represents a query for the 'Visit' table.
 *
 *
 *
 * @method VisitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VisitQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method VisitQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method VisitQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method VisitQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method VisitQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method VisitQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method VisitQuery orderBySceneId($order = Criteria::ASC) Order by the scene_id column
 * @method VisitQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method VisitQuery orderByVisittypeId($order = Criteria::ASC) Order by the visitType_id column
 * @method VisitQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method VisitQuery orderByIsprimary($order = Criteria::ASC) Order by the isPrimary column
 * @method VisitQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method VisitQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method VisitQuery orderByPaystatus($order = Criteria::ASC) Order by the payStatus column
 *
 * @method VisitQuery groupById() Group by the id column
 * @method VisitQuery groupByCreatedatetime() Group by the createDatetime column
 * @method VisitQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method VisitQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method VisitQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method VisitQuery groupByDeleted() Group by the deleted column
 * @method VisitQuery groupByEventId() Group by the event_id column
 * @method VisitQuery groupBySceneId() Group by the scene_id column
 * @method VisitQuery groupByDate() Group by the date column
 * @method VisitQuery groupByVisittypeId() Group by the visitType_id column
 * @method VisitQuery groupByPersonId() Group by the person_id column
 * @method VisitQuery groupByIsprimary() Group by the isPrimary column
 * @method VisitQuery groupByFinanceId() Group by the finance_id column
 * @method VisitQuery groupByServiceId() Group by the service_id column
 * @method VisitQuery groupByPaystatus() Group by the payStatus column
 *
 * @method VisitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VisitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VisitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Visit findOne(PropelPDO $con = null) Return the first Visit matching the query
 * @method Visit findOneOrCreate(PropelPDO $con = null) Return the first Visit matching the query, or a new Visit object populated from the query conditions when no match is found
 *
 * @method Visit findOneByCreatedatetime(string $createDatetime) Return the first Visit filtered by the createDatetime column
 * @method Visit findOneByCreatepersonId(int $createPerson_id) Return the first Visit filtered by the createPerson_id column
 * @method Visit findOneByModifydatetime(string $modifyDatetime) Return the first Visit filtered by the modifyDatetime column
 * @method Visit findOneByModifypersonId(int $modifyPerson_id) Return the first Visit filtered by the modifyPerson_id column
 * @method Visit findOneByDeleted(boolean $deleted) Return the first Visit filtered by the deleted column
 * @method Visit findOneByEventId(int $event_id) Return the first Visit filtered by the event_id column
 * @method Visit findOneBySceneId(int $scene_id) Return the first Visit filtered by the scene_id column
 * @method Visit findOneByDate(string $date) Return the first Visit filtered by the date column
 * @method Visit findOneByVisittypeId(int $visitType_id) Return the first Visit filtered by the visitType_id column
 * @method Visit findOneByPersonId(int $person_id) Return the first Visit filtered by the person_id column
 * @method Visit findOneByIsprimary(boolean $isPrimary) Return the first Visit filtered by the isPrimary column
 * @method Visit findOneByFinanceId(int $finance_id) Return the first Visit filtered by the finance_id column
 * @method Visit findOneByServiceId(int $service_id) Return the first Visit filtered by the service_id column
 * @method Visit findOneByPaystatus(int $payStatus) Return the first Visit filtered by the payStatus column
 *
 * @method array findById(int $id) Return Visit objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Visit objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Visit objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Visit objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Visit objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Visit objects filtered by the deleted column
 * @method array findByEventId(int $event_id) Return Visit objects filtered by the event_id column
 * @method array findBySceneId(int $scene_id) Return Visit objects filtered by the scene_id column
 * @method array findByDate(string $date) Return Visit objects filtered by the date column
 * @method array findByVisittypeId(int $visitType_id) Return Visit objects filtered by the visitType_id column
 * @method array findByPersonId(int $person_id) Return Visit objects filtered by the person_id column
 * @method array findByIsprimary(boolean $isPrimary) Return Visit objects filtered by the isPrimary column
 * @method array findByFinanceId(int $finance_id) Return Visit objects filtered by the finance_id column
 * @method array findByServiceId(int $service_id) Return Visit objects filtered by the service_id column
 * @method array findByPaystatus(int $payStatus) Return Visit objects filtered by the payStatus column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseVisitQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVisitQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Visit', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VisitQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VisitQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VisitQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VisitQuery) {
            return $criteria;
        }
        $query = new VisitQuery();
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
     * @return   Visit|Visit[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VisitPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VisitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Visit A model object, or null if the key is not found
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
     * @return                 Visit A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `event_id`, `scene_id`, `date`, `visitType_id`, `person_id`, `isPrimary`, `finance_id`, `service_id`, `payStatus` FROM `Visit` WHERE `id` = :p0';
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
            $obj = new Visit();
            $obj->hydrate($row);
            VisitPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Visit|Visit[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Visit[]|mixed the list of results, formatted by the current formatter
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VisitPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VisitPeer::ID, $keys, Criteria::IN);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VisitPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VisitPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::ID, $id, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(VisitPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(VisitPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(VisitPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(VisitPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(VisitPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(VisitPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(VisitPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(VisitPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VisitPeer::DELETED, $deleted, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(VisitPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(VisitPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the scene_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySceneId(1234); // WHERE scene_id = 1234
     * $query->filterBySceneId(array(12, 34)); // WHERE scene_id IN (12, 34)
     * $query->filterBySceneId(array('min' => 12)); // WHERE scene_id >= 12
     * $query->filterBySceneId(array('max' => 12)); // WHERE scene_id <= 12
     * </code>
     *
     * @param     mixed $sceneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterBySceneId($sceneId = null, $comparison = null)
    {
        if (is_array($sceneId)) {
            $useMinMax = false;
            if (isset($sceneId['min'])) {
                $this->addUsingAlias(VisitPeer::SCENE_ID, $sceneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sceneId['max'])) {
                $this->addUsingAlias(VisitPeer::SCENE_ID, $sceneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::SCENE_ID, $sceneId, $comparison);
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
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(VisitPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(VisitPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the visitType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVisittypeId(1234); // WHERE visitType_id = 1234
     * $query->filterByVisittypeId(array(12, 34)); // WHERE visitType_id IN (12, 34)
     * $query->filterByVisittypeId(array('min' => 12)); // WHERE visitType_id >= 12
     * $query->filterByVisittypeId(array('max' => 12)); // WHERE visitType_id <= 12
     * </code>
     *
     * @param     mixed $visittypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByVisittypeId($visittypeId = null, $comparison = null)
    {
        if (is_array($visittypeId)) {
            $useMinMax = false;
            if (isset($visittypeId['min'])) {
                $this->addUsingAlias(VisitPeer::VISITTYPE_ID, $visittypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visittypeId['max'])) {
                $this->addUsingAlias(VisitPeer::VISITTYPE_ID, $visittypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::VISITTYPE_ID, $visittypeId, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id >= 12
     * $query->filterByPersonId(array('max' => 12)); // WHERE person_id <= 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(VisitPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(VisitPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the isPrimary column
     *
     * Example usage:
     * <code>
     * $query->filterByIsprimary(true); // WHERE isPrimary = true
     * $query->filterByIsprimary('yes'); // WHERE isPrimary = true
     * </code>
     *
     * @param     boolean|string $isprimary The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByIsprimary($isprimary = null, $comparison = null)
    {
        if (is_string($isprimary)) {
            $isprimary = in_array(strtolower($isprimary), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(VisitPeer::ISPRIMARY, $isprimary, $comparison);
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
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(VisitPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(VisitPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the service_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceId(1234); // WHERE service_id = 1234
     * $query->filterByServiceId(array(12, 34)); // WHERE service_id IN (12, 34)
     * $query->filterByServiceId(array('min' => 12)); // WHERE service_id >= 12
     * $query->filterByServiceId(array('max' => 12)); // WHERE service_id <= 12
     * </code>
     *
     * @param     mixed $serviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(VisitPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(VisitPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Filter the query on the payStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByPaystatus(1234); // WHERE payStatus = 1234
     * $query->filterByPaystatus(array(12, 34)); // WHERE payStatus IN (12, 34)
     * $query->filterByPaystatus(array('min' => 12)); // WHERE payStatus >= 12
     * $query->filterByPaystatus(array('max' => 12)); // WHERE payStatus <= 12
     * </code>
     *
     * @param     mixed $paystatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function filterByPaystatus($paystatus = null, $comparison = null)
    {
        if (is_array($paystatus)) {
            $useMinMax = false;
            if (isset($paystatus['min'])) {
                $this->addUsingAlias(VisitPeer::PAYSTATUS, $paystatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paystatus['max'])) {
                $this->addUsingAlias(VisitPeer::PAYSTATUS, $paystatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VisitPeer::PAYSTATUS, $paystatus, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Visit $visit Object to remove from the list of results
     *
     * @return VisitQuery The current query, for fluid interface
     */
    public function prune($visit = null)
    {
        if ($visit) {
            $this->addUsingAlias(VisitPeer::ID, $visit->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
