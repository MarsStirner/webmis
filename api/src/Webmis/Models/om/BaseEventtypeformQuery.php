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
use Webmis\Models\Eventtypeform;
use Webmis\Models\EventtypeformPeer;
use Webmis\Models\EventtypeformQuery;

/**
 * Base class that represents a query for the 'EventTypeForm' table.
 *
 *
 *
 * @method EventtypeformQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventtypeformQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EventtypeformQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method EventtypeformQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method EventtypeformQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method EventtypeformQuery orderByDescr($order = Criteria::ASC) Order by the descr column
 * @method EventtypeformQuery orderByPass($order = Criteria::ASC) Order by the pass column
 *
 * @method EventtypeformQuery groupById() Group by the id column
 * @method EventtypeformQuery groupByDeleted() Group by the deleted column
 * @method EventtypeformQuery groupByEventtypeId() Group by the eventType_id column
 * @method EventtypeformQuery groupByCode() Group by the code column
 * @method EventtypeformQuery groupByName() Group by the name column
 * @method EventtypeformQuery groupByDescr() Group by the descr column
 * @method EventtypeformQuery groupByPass() Group by the pass column
 *
 * @method EventtypeformQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventtypeformQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventtypeformQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Eventtypeform findOne(PropelPDO $con = null) Return the first Eventtypeform matching the query
 * @method Eventtypeform findOneOrCreate(PropelPDO $con = null) Return the first Eventtypeform matching the query, or a new Eventtypeform object populated from the query conditions when no match is found
 *
 * @method Eventtypeform findOneByDeleted(boolean $deleted) Return the first Eventtypeform filtered by the deleted column
 * @method Eventtypeform findOneByEventtypeId(int $eventType_id) Return the first Eventtypeform filtered by the eventType_id column
 * @method Eventtypeform findOneByCode(string $code) Return the first Eventtypeform filtered by the code column
 * @method Eventtypeform findOneByName(string $name) Return the first Eventtypeform filtered by the name column
 * @method Eventtypeform findOneByDescr(string $descr) Return the first Eventtypeform filtered by the descr column
 * @method Eventtypeform findOneByPass(boolean $pass) Return the first Eventtypeform filtered by the pass column
 *
 * @method array findById(int $id) Return Eventtypeform objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return Eventtypeform objects filtered by the deleted column
 * @method array findByEventtypeId(int $eventType_id) Return Eventtypeform objects filtered by the eventType_id column
 * @method array findByCode(string $code) Return Eventtypeform objects filtered by the code column
 * @method array findByName(string $name) Return Eventtypeform objects filtered by the name column
 * @method array findByDescr(string $descr) Return Eventtypeform objects filtered by the descr column
 * @method array findByPass(boolean $pass) Return Eventtypeform objects filtered by the pass column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypeformQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventtypeformQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Eventtypeform', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventtypeformQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventtypeformQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventtypeformQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventtypeformQuery) {
            return $criteria;
        }
        $query = new EventtypeformQuery();
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
     * @return   Eventtypeform|Eventtypeform[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventtypeformPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventtypeformPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Eventtypeform A model object, or null if the key is not found
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
     * @return                 Eventtypeform A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `eventType_id`, `code`, `name`, `descr`, `pass` FROM `EventTypeForm` WHERE `id` = :p0';
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
            $obj = new Eventtypeform();
            $obj->hydrate($row);
            EventtypeformPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Eventtypeform|Eventtypeform[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Eventtypeform[]|mixed the list of results, formatted by the current formatter
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
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventtypeformPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventtypeformPeer::ID, $keys, Criteria::IN);
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
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventtypeformPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventtypeformPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeformPeer::ID, $id, $comparison);
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
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypeformPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the eventType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventtypeId(1234); // WHERE eventType_id = 1234
     * $query->filterByEventtypeId(array(12, 34)); // WHERE eventType_id IN (12, 34)
     * $query->filterByEventtypeId(array('min' => 12)); // WHERE eventType_id >= 12
     * $query->filterByEventtypeId(array('max' => 12)); // WHERE eventType_id <= 12
     * </code>
     *
     * @param     mixed $eventtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(EventtypeformPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(EventtypeformPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypeformPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
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
     * @return EventtypeformQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypeformPeer::CODE, $code, $comparison);
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
     * @return EventtypeformQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypeformPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the descr column
     *
     * Example usage:
     * <code>
     * $query->filterByDescr('fooValue');   // WHERE descr = 'fooValue'
     * $query->filterByDescr('%fooValue%'); // WHERE descr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterByDescr($descr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descr)) {
                $descr = str_replace('*', '%', $descr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypeformPeer::DESCR, $descr, $comparison);
    }

    /**
     * Filter the query on the pass column
     *
     * Example usage:
     * <code>
     * $query->filterByPass(true); // WHERE pass = true
     * $query->filterByPass('yes'); // WHERE pass = true
     * </code>
     *
     * @param     boolean|string $pass The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function filterByPass($pass = null, $comparison = null)
    {
        if (is_string($pass)) {
            $pass = in_array(strtolower($pass), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypeformPeer::PASS, $pass, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Eventtypeform $eventtypeform Object to remove from the list of results
     *
     * @return EventtypeformQuery The current query, for fluid interface
     */
    public function prune($eventtypeform = null)
    {
        if ($eventtypeform) {
            $this->addUsingAlias(EventtypeformPeer::ID, $eventtypeform->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
