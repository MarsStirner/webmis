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
use Webmis\Models\Rbtempinvalidresult;
use Webmis\Models\RbtempinvalidresultPeer;
use Webmis\Models\RbtempinvalidresultQuery;

/**
 * Base class that represents a query for the 'rbTempInvalidResult' table.
 *
 *
 *
 * @method RbtempinvalidresultQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbtempinvalidresultQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method RbtempinvalidresultQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbtempinvalidresultQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbtempinvalidresultQuery orderByAble($order = Criteria::ASC) Order by the able column
 * @method RbtempinvalidresultQuery orderByClosed($order = Criteria::ASC) Order by the closed column
 * @method RbtempinvalidresultQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method RbtempinvalidresultQuery groupById() Group by the id column
 * @method RbtempinvalidresultQuery groupByType() Group by the type column
 * @method RbtempinvalidresultQuery groupByCode() Group by the code column
 * @method RbtempinvalidresultQuery groupByName() Group by the name column
 * @method RbtempinvalidresultQuery groupByAble() Group by the able column
 * @method RbtempinvalidresultQuery groupByClosed() Group by the closed column
 * @method RbtempinvalidresultQuery groupByStatus() Group by the status column
 *
 * @method RbtempinvalidresultQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbtempinvalidresultQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbtempinvalidresultQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbtempinvalidresult findOne(PropelPDO $con = null) Return the first Rbtempinvalidresult matching the query
 * @method Rbtempinvalidresult findOneOrCreate(PropelPDO $con = null) Return the first Rbtempinvalidresult matching the query, or a new Rbtempinvalidresult object populated from the query conditions when no match is found
 *
 * @method Rbtempinvalidresult findOneByType(int $type) Return the first Rbtempinvalidresult filtered by the type column
 * @method Rbtempinvalidresult findOneByCode(string $code) Return the first Rbtempinvalidresult filtered by the code column
 * @method Rbtempinvalidresult findOneByName(string $name) Return the first Rbtempinvalidresult filtered by the name column
 * @method Rbtempinvalidresult findOneByAble(boolean $able) Return the first Rbtempinvalidresult filtered by the able column
 * @method Rbtempinvalidresult findOneByClosed(boolean $closed) Return the first Rbtempinvalidresult filtered by the closed column
 * @method Rbtempinvalidresult findOneByStatus(int $status) Return the first Rbtempinvalidresult filtered by the status column
 *
 * @method array findById(int $id) Return Rbtempinvalidresult objects filtered by the id column
 * @method array findByType(int $type) Return Rbtempinvalidresult objects filtered by the type column
 * @method array findByCode(string $code) Return Rbtempinvalidresult objects filtered by the code column
 * @method array findByName(string $name) Return Rbtempinvalidresult objects filtered by the name column
 * @method array findByAble(boolean $able) Return Rbtempinvalidresult objects filtered by the able column
 * @method array findByClosed(boolean $closed) Return Rbtempinvalidresult objects filtered by the closed column
 * @method array findByStatus(int $status) Return Rbtempinvalidresult objects filtered by the status column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtempinvalidresultQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbtempinvalidresultQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbtempinvalidresult', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbtempinvalidresultQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbtempinvalidresultQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbtempinvalidresultQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbtempinvalidresultQuery) {
            return $criteria;
        }
        $query = new RbtempinvalidresultQuery();
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
     * @return   Rbtempinvalidresult|Rbtempinvalidresult[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbtempinvalidresultPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbtempinvalidresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbtempinvalidresult A model object, or null if the key is not found
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
     * @return                 Rbtempinvalidresult A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `type`, `code`, `name`, `able`, `closed`, `status` FROM `rbTempInvalidResult` WHERE `id` = :p0';
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
            $obj = new Rbtempinvalidresult();
            $obj->hydrate($row);
            RbtempinvalidresultPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbtempinvalidresult|Rbtempinvalidresult[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbtempinvalidresult[]|mixed the list of results, formatted by the current formatter
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
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbtempinvalidresultPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbtempinvalidresultPeer::ID, $keys, Criteria::IN);
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
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbtempinvalidresultPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbtempinvalidresultPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidresultPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type >= 12
     * $query->filterByType(array('max' => 12)); // WHERE type <= 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(RbtempinvalidresultPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(RbtempinvalidresultPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidresultPeer::TYPE, $type, $comparison);
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
     * @return RbtempinvalidresultQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtempinvalidresultPeer::CODE, $code, $comparison);
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
     * @return RbtempinvalidresultQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtempinvalidresultPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the able column
     *
     * Example usage:
     * <code>
     * $query->filterByAble(true); // WHERE able = true
     * $query->filterByAble('yes'); // WHERE able = true
     * </code>
     *
     * @param     boolean|string $able The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterByAble($able = null, $comparison = null)
    {
        if (is_string($able)) {
            $able = in_array(strtolower($able), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbtempinvalidresultPeer::ABLE, $able, $comparison);
    }

    /**
     * Filter the query on the closed column
     *
     * Example usage:
     * <code>
     * $query->filterByClosed(true); // WHERE closed = true
     * $query->filterByClosed('yes'); // WHERE closed = true
     * </code>
     *
     * @param     boolean|string $closed The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterByClosed($closed = null, $comparison = null)
    {
        if (is_string($closed)) {
            $closed = in_array(strtolower($closed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbtempinvalidresultPeer::CLOSED, $closed, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(RbtempinvalidresultPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(RbtempinvalidresultPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidresultPeer::STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbtempinvalidresult $rbtempinvalidresult Object to remove from the list of results
     *
     * @return RbtempinvalidresultQuery The current query, for fluid interface
     */
    public function prune($rbtempinvalidresult = null)
    {
        if ($rbtempinvalidresult) {
            $this->addUsingAlias(RbtempinvalidresultPeer::ID, $rbtempinvalidresult->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
