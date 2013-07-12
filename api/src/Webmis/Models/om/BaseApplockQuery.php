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
use Webmis\Models\Applock;
use Webmis\Models\ApplockPeer;
use Webmis\Models\ApplockQuery;

/**
 * Base class that represents a query for the 'AppLock' table.
 *
 *
 *
 * @method ApplockQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ApplockQuery orderByLocktime($order = Criteria::ASC) Order by the lockTime column
 * @method ApplockQuery orderByRettime($order = Criteria::ASC) Order by the retTime column
 * @method ApplockQuery orderByConnectionid($order = Criteria::ASC) Order by the connectionId column
 * @method ApplockQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method ApplockQuery orderByAddr($order = Criteria::ASC) Order by the addr column
 *
 * @method ApplockQuery groupById() Group by the id column
 * @method ApplockQuery groupByLocktime() Group by the lockTime column
 * @method ApplockQuery groupByRettime() Group by the retTime column
 * @method ApplockQuery groupByConnectionid() Group by the connectionId column
 * @method ApplockQuery groupByPersonId() Group by the person_id column
 * @method ApplockQuery groupByAddr() Group by the addr column
 *
 * @method ApplockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ApplockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ApplockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Applock findOne(PropelPDO $con = null) Return the first Applock matching the query
 * @method Applock findOneOrCreate(PropelPDO $con = null) Return the first Applock matching the query, or a new Applock object populated from the query conditions when no match is found
 *
 * @method Applock findOneByLocktime(string $lockTime) Return the first Applock filtered by the lockTime column
 * @method Applock findOneByRettime(string $retTime) Return the first Applock filtered by the retTime column
 * @method Applock findOneByConnectionid(int $connectionId) Return the first Applock filtered by the connectionId column
 * @method Applock findOneByPersonId(int $person_id) Return the first Applock filtered by the person_id column
 * @method Applock findOneByAddr(string $addr) Return the first Applock filtered by the addr column
 *
 * @method array findById(string $id) Return Applock objects filtered by the id column
 * @method array findByLocktime(string $lockTime) Return Applock objects filtered by the lockTime column
 * @method array findByRettime(string $retTime) Return Applock objects filtered by the retTime column
 * @method array findByConnectionid(int $connectionId) Return Applock objects filtered by the connectionId column
 * @method array findByPersonId(int $person_id) Return Applock objects filtered by the person_id column
 * @method array findByAddr(string $addr) Return Applock objects filtered by the addr column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseApplockQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseApplockQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Applock', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ApplockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ApplockQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ApplockQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ApplockQuery) {
            return $criteria;
        }
        $query = new ApplockQuery();
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
     * @return   Applock|Applock[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ApplockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ApplockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Applock A model object, or null if the key is not found
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
     * @return                 Applock A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `lockTime`, `retTime`, `connectionId`, `person_id`, `addr` FROM `AppLock` WHERE `id` = :p0';
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
            $obj = new Applock();
            $obj->hydrate($row);
            ApplockPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Applock|Applock[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Applock[]|mixed the list of results, formatted by the current formatter
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
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ApplockPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ApplockPeer::ID, $keys, Criteria::IN);
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
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ApplockPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ApplockPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplockPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the lockTime column
     *
     * Example usage:
     * <code>
     * $query->filterByLocktime('2011-03-14'); // WHERE lockTime = '2011-03-14'
     * $query->filterByLocktime('now'); // WHERE lockTime = '2011-03-14'
     * $query->filterByLocktime(array('max' => 'yesterday')); // WHERE lockTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $locktime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByLocktime($locktime = null, $comparison = null)
    {
        if (is_array($locktime)) {
            $useMinMax = false;
            if (isset($locktime['min'])) {
                $this->addUsingAlias(ApplockPeer::LOCKTIME, $locktime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($locktime['max'])) {
                $this->addUsingAlias(ApplockPeer::LOCKTIME, $locktime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplockPeer::LOCKTIME, $locktime, $comparison);
    }

    /**
     * Filter the query on the retTime column
     *
     * Example usage:
     * <code>
     * $query->filterByRettime('2011-03-14'); // WHERE retTime = '2011-03-14'
     * $query->filterByRettime('now'); // WHERE retTime = '2011-03-14'
     * $query->filterByRettime(array('max' => 'yesterday')); // WHERE retTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $rettime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByRettime($rettime = null, $comparison = null)
    {
        if (is_array($rettime)) {
            $useMinMax = false;
            if (isset($rettime['min'])) {
                $this->addUsingAlias(ApplockPeer::RETTIME, $rettime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rettime['max'])) {
                $this->addUsingAlias(ApplockPeer::RETTIME, $rettime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplockPeer::RETTIME, $rettime, $comparison);
    }

    /**
     * Filter the query on the connectionId column
     *
     * Example usage:
     * <code>
     * $query->filterByConnectionid(1234); // WHERE connectionId = 1234
     * $query->filterByConnectionid(array(12, 34)); // WHERE connectionId IN (12, 34)
     * $query->filterByConnectionid(array('min' => 12)); // WHERE connectionId >= 12
     * $query->filterByConnectionid(array('max' => 12)); // WHERE connectionId <= 12
     * </code>
     *
     * @param     mixed $connectionid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByConnectionid($connectionid = null, $comparison = null)
    {
        if (is_array($connectionid)) {
            $useMinMax = false;
            if (isset($connectionid['min'])) {
                $this->addUsingAlias(ApplockPeer::CONNECTIONID, $connectionid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($connectionid['max'])) {
                $this->addUsingAlias(ApplockPeer::CONNECTIONID, $connectionid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplockPeer::CONNECTIONID, $connectionid, $comparison);
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
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(ApplockPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(ApplockPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ApplockPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the addr column
     *
     * Example usage:
     * <code>
     * $query->filterByAddr('fooValue');   // WHERE addr = 'fooValue'
     * $query->filterByAddr('%fooValue%'); // WHERE addr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $addr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ApplockQuery The current query, for fluid interface
     */
    public function filterByAddr($addr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($addr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $addr)) {
                $addr = str_replace('*', '%', $addr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ApplockPeer::ADDR, $addr, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Applock $applock Object to remove from the list of results
     *
     * @return ApplockQuery The current query, for fluid interface
     */
    public function prune($applock = null)
    {
        if ($applock) {
            $this->addUsingAlias(ApplockPeer::ID, $applock->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
