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
use Webmis\Models\Rbresult;
use Webmis\Models\RbresultPeer;
use Webmis\Models\RbresultQuery;

/**
 * Base class that represents a query for the 'rbResult' table.
 *
 *
 *
 * @method RbresultQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbresultQuery orderByEventpurposeId($order = Criteria::ASC) Order by the eventPurpose_id column
 * @method RbresultQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbresultQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbresultQuery orderByContinued($order = Criteria::ASC) Order by the continued column
 * @method RbresultQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 *
 * @method RbresultQuery groupById() Group by the id column
 * @method RbresultQuery groupByEventpurposeId() Group by the eventPurpose_id column
 * @method RbresultQuery groupByCode() Group by the code column
 * @method RbresultQuery groupByName() Group by the name column
 * @method RbresultQuery groupByContinued() Group by the continued column
 * @method RbresultQuery groupByRegionalcode() Group by the regionalCode column
 *
 * @method RbresultQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbresultQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbresultQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbresult findOne(PropelPDO $con = null) Return the first Rbresult matching the query
 * @method Rbresult findOneOrCreate(PropelPDO $con = null) Return the first Rbresult matching the query, or a new Rbresult object populated from the query conditions when no match is found
 *
 * @method Rbresult findOneByEventpurposeId(int $eventPurpose_id) Return the first Rbresult filtered by the eventPurpose_id column
 * @method Rbresult findOneByCode(string $code) Return the first Rbresult filtered by the code column
 * @method Rbresult findOneByName(string $name) Return the first Rbresult filtered by the name column
 * @method Rbresult findOneByContinued(boolean $continued) Return the first Rbresult filtered by the continued column
 * @method Rbresult findOneByRegionalcode(string $regionalCode) Return the first Rbresult filtered by the regionalCode column
 *
 * @method array findById(int $id) Return Rbresult objects filtered by the id column
 * @method array findByEventpurposeId(int $eventPurpose_id) Return Rbresult objects filtered by the eventPurpose_id column
 * @method array findByCode(string $code) Return Rbresult objects filtered by the code column
 * @method array findByName(string $name) Return Rbresult objects filtered by the name column
 * @method array findByContinued(boolean $continued) Return Rbresult objects filtered by the continued column
 * @method array findByRegionalcode(string $regionalCode) Return Rbresult objects filtered by the regionalCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbresultQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbresultQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbresult', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbresultQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbresultQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbresultQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbresultQuery) {
            return $criteria;
        }
        $query = new RbresultQuery();
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
     * @return   Rbresult|Rbresult[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbresultPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbresult A model object, or null if the key is not found
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
     * @return                 Rbresult A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `eventPurpose_id`, `code`, `name`, `continued`, `regionalCode` FROM `rbResult` WHERE `id` = :p0';
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
            $obj = new Rbresult();
            $obj->hydrate($row);
            RbresultPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbresult|Rbresult[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbresult[]|mixed the list of results, formatted by the current formatter
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
     * @return RbresultQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbresultPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbresultQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbresultPeer::ID, $keys, Criteria::IN);
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
     * @return RbresultQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbresultPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbresultPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbresultPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the eventPurpose_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventpurposeId(1234); // WHERE eventPurpose_id = 1234
     * $query->filterByEventpurposeId(array(12, 34)); // WHERE eventPurpose_id IN (12, 34)
     * $query->filterByEventpurposeId(array('min' => 12)); // WHERE eventPurpose_id >= 12
     * $query->filterByEventpurposeId(array('max' => 12)); // WHERE eventPurpose_id <= 12
     * </code>
     *
     * @param     mixed $eventpurposeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbresultQuery The current query, for fluid interface
     */
    public function filterByEventpurposeId($eventpurposeId = null, $comparison = null)
    {
        if (is_array($eventpurposeId)) {
            $useMinMax = false;
            if (isset($eventpurposeId['min'])) {
                $this->addUsingAlias(RbresultPeer::EVENTPURPOSE_ID, $eventpurposeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventpurposeId['max'])) {
                $this->addUsingAlias(RbresultPeer::EVENTPURPOSE_ID, $eventpurposeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbresultPeer::EVENTPURPOSE_ID, $eventpurposeId, $comparison);
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
     * @return RbresultQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbresultPeer::CODE, $code, $comparison);
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
     * @return RbresultQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbresultPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the continued column
     *
     * Example usage:
     * <code>
     * $query->filterByContinued(true); // WHERE continued = true
     * $query->filterByContinued('yes'); // WHERE continued = true
     * </code>
     *
     * @param     boolean|string $continued The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbresultQuery The current query, for fluid interface
     */
    public function filterByContinued($continued = null, $comparison = null)
    {
        if (is_string($continued)) {
            $continued = in_array(strtolower($continued), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbresultPeer::CONTINUED, $continued, $comparison);
    }

    /**
     * Filter the query on the regionalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalcode('fooValue');   // WHERE regionalCode = 'fooValue'
     * $query->filterByRegionalcode('%fooValue%'); // WHERE regionalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbresultQuery The current query, for fluid interface
     */
    public function filterByRegionalcode($regionalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalcode)) {
                $regionalcode = str_replace('*', '%', $regionalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbresultPeer::REGIONALCODE, $regionalcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbresult $rbresult Object to remove from the list of results
     *
     * @return RbresultQuery The current query, for fluid interface
     */
    public function prune($rbresult = null)
    {
        if ($rbresult) {
            $this->addUsingAlias(RbresultPeer::ID, $rbresult->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
