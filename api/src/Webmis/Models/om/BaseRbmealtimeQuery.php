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
use Webmis\Models\Rbmealtime;
use Webmis\Models\RbmealtimePeer;
use Webmis\Models\RbmealtimeQuery;

/**
 * Base class that represents a query for the 'rbMealTime' table.
 *
 *
 *
 * @method RbmealtimeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbmealtimeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbmealtimeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbmealtimeQuery orderByBegtime($order = Criteria::ASC) Order by the begTime column
 * @method RbmealtimeQuery orderByEndtime($order = Criteria::ASC) Order by the endTime column
 *
 * @method RbmealtimeQuery groupById() Group by the id column
 * @method RbmealtimeQuery groupByCode() Group by the code column
 * @method RbmealtimeQuery groupByName() Group by the name column
 * @method RbmealtimeQuery groupByBegtime() Group by the begTime column
 * @method RbmealtimeQuery groupByEndtime() Group by the endTime column
 *
 * @method RbmealtimeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbmealtimeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbmealtimeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbmealtime findOne(PropelPDO $con = null) Return the first Rbmealtime matching the query
 * @method Rbmealtime findOneOrCreate(PropelPDO $con = null) Return the first Rbmealtime matching the query, or a new Rbmealtime object populated from the query conditions when no match is found
 *
 * @method Rbmealtime findOneByCode(string $code) Return the first Rbmealtime filtered by the code column
 * @method Rbmealtime findOneByName(string $name) Return the first Rbmealtime filtered by the name column
 * @method Rbmealtime findOneByBegtime(string $begTime) Return the first Rbmealtime filtered by the begTime column
 * @method Rbmealtime findOneByEndtime(string $endTime) Return the first Rbmealtime filtered by the endTime column
 *
 * @method array findById(int $id) Return Rbmealtime objects filtered by the id column
 * @method array findByCode(string $code) Return Rbmealtime objects filtered by the code column
 * @method array findByName(string $name) Return Rbmealtime objects filtered by the name column
 * @method array findByBegtime(string $begTime) Return Rbmealtime objects filtered by the begTime column
 * @method array findByEndtime(string $endTime) Return Rbmealtime objects filtered by the endTime column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbmealtimeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbmealtimeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbmealtime', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbmealtimeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbmealtimeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbmealtimeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbmealtimeQuery) {
            return $criteria;
        }
        $query = new RbmealtimeQuery();
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
     * @return   Rbmealtime|Rbmealtime[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbmealtimePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbmealtimePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbmealtime A model object, or null if the key is not found
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
     * @return                 Rbmealtime A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `begTime`, `endTime` FROM `rbMealTime` WHERE `id` = :p0';
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
            $obj = new Rbmealtime();
            $obj->hydrate($row);
            RbmealtimePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbmealtime|Rbmealtime[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbmealtime[]|mixed the list of results, formatted by the current formatter
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
     * @return RbmealtimeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbmealtimePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbmealtimeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbmealtimePeer::ID, $keys, Criteria::IN);
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
     * @return RbmealtimeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbmealtimePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbmealtimePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbmealtimePeer::ID, $id, $comparison);
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
     * @return RbmealtimeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmealtimePeer::CODE, $code, $comparison);
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
     * @return RbmealtimeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmealtimePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the begTime column
     *
     * Example usage:
     * <code>
     * $query->filterByBegtime('2011-03-14'); // WHERE begTime = '2011-03-14'
     * $query->filterByBegtime('now'); // WHERE begTime = '2011-03-14'
     * $query->filterByBegtime(array('max' => 'yesterday')); // WHERE begTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $begtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbmealtimeQuery The current query, for fluid interface
     */
    public function filterByBegtime($begtime = null, $comparison = null)
    {
        if (is_array($begtime)) {
            $useMinMax = false;
            if (isset($begtime['min'])) {
                $this->addUsingAlias(RbmealtimePeer::BEGTIME, $begtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begtime['max'])) {
                $this->addUsingAlias(RbmealtimePeer::BEGTIME, $begtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbmealtimePeer::BEGTIME, $begtime, $comparison);
    }

    /**
     * Filter the query on the endTime column
     *
     * Example usage:
     * <code>
     * $query->filterByEndtime('2011-03-14'); // WHERE endTime = '2011-03-14'
     * $query->filterByEndtime('now'); // WHERE endTime = '2011-03-14'
     * $query->filterByEndtime(array('max' => 'yesterday')); // WHERE endTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $endtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbmealtimeQuery The current query, for fluid interface
     */
    public function filterByEndtime($endtime = null, $comparison = null)
    {
        if (is_array($endtime)) {
            $useMinMax = false;
            if (isset($endtime['min'])) {
                $this->addUsingAlias(RbmealtimePeer::ENDTIME, $endtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endtime['max'])) {
                $this->addUsingAlias(RbmealtimePeer::ENDTIME, $endtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbmealtimePeer::ENDTIME, $endtime, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbmealtime $rbmealtime Object to remove from the list of results
     *
     * @return RbmealtimeQuery The current query, for fluid interface
     */
    public function prune($rbmealtime = null)
    {
        if ($rbmealtime) {
            $this->addUsingAlias(RbmealtimePeer::ID, $rbmealtime->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
