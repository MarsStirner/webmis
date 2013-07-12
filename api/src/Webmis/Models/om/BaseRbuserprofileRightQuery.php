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
use Webmis\Models\RbuserprofileRight;
use Webmis\Models\RbuserprofileRightPeer;
use Webmis\Models\RbuserprofileRightQuery;

/**
 * Base class that represents a query for the 'rbUserProfile_Right' table.
 *
 *
 *
 * @method RbuserprofileRightQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbuserprofileRightQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method RbuserprofileRightQuery orderByUserrightId($order = Criteria::ASC) Order by the userRight_id column
 *
 * @method RbuserprofileRightQuery groupById() Group by the id column
 * @method RbuserprofileRightQuery groupByMasterId() Group by the master_id column
 * @method RbuserprofileRightQuery groupByUserrightId() Group by the userRight_id column
 *
 * @method RbuserprofileRightQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbuserprofileRightQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbuserprofileRightQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbuserprofileRight findOne(PropelPDO $con = null) Return the first RbuserprofileRight matching the query
 * @method RbuserprofileRight findOneOrCreate(PropelPDO $con = null) Return the first RbuserprofileRight matching the query, or a new RbuserprofileRight object populated from the query conditions when no match is found
 *
 * @method RbuserprofileRight findOneByMasterId(int $master_id) Return the first RbuserprofileRight filtered by the master_id column
 * @method RbuserprofileRight findOneByUserrightId(int $userRight_id) Return the first RbuserprofileRight filtered by the userRight_id column
 *
 * @method array findById(int $id) Return RbuserprofileRight objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return RbuserprofileRight objects filtered by the master_id column
 * @method array findByUserrightId(int $userRight_id) Return RbuserprofileRight objects filtered by the userRight_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbuserprofileRightQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbuserprofileRightQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\RbuserprofileRight', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbuserprofileRightQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbuserprofileRightQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbuserprofileRightQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbuserprofileRightQuery) {
            return $criteria;
        }
        $query = new RbuserprofileRightQuery();
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
     * @return   RbuserprofileRight|RbuserprofileRight[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbuserprofileRightPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbuserprofileRightPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RbuserprofileRight A model object, or null if the key is not found
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
     * @return                 RbuserprofileRight A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `userRight_id` FROM `rbUserProfile_Right` WHERE `id` = :p0';
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
            $obj = new RbuserprofileRight();
            $obj->hydrate($row);
            RbuserprofileRightPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RbuserprofileRight|RbuserprofileRight[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RbuserprofileRight[]|mixed the list of results, formatted by the current formatter
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
     * @return RbuserprofileRightQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbuserprofileRightPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbuserprofileRightQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbuserprofileRightPeer::ID, $keys, Criteria::IN);
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
     * @return RbuserprofileRightQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbuserprofileRightPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbuserprofileRightPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbuserprofileRightPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the master_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMasterId(1234); // WHERE master_id = 1234
     * $query->filterByMasterId(array(12, 34)); // WHERE master_id IN (12, 34)
     * $query->filterByMasterId(array('min' => 12)); // WHERE master_id >= 12
     * $query->filterByMasterId(array('max' => 12)); // WHERE master_id <= 12
     * </code>
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbuserprofileRightQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(RbuserprofileRightPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(RbuserprofileRightPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbuserprofileRightPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the userRight_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserrightId(1234); // WHERE userRight_id = 1234
     * $query->filterByUserrightId(array(12, 34)); // WHERE userRight_id IN (12, 34)
     * $query->filterByUserrightId(array('min' => 12)); // WHERE userRight_id >= 12
     * $query->filterByUserrightId(array('max' => 12)); // WHERE userRight_id <= 12
     * </code>
     *
     * @param     mixed $userrightId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbuserprofileRightQuery The current query, for fluid interface
     */
    public function filterByUserrightId($userrightId = null, $comparison = null)
    {
        if (is_array($userrightId)) {
            $useMinMax = false;
            if (isset($userrightId['min'])) {
                $this->addUsingAlias(RbuserprofileRightPeer::USERRIGHT_ID, $userrightId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userrightId['max'])) {
                $this->addUsingAlias(RbuserprofileRightPeer::USERRIGHT_ID, $userrightId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbuserprofileRightPeer::USERRIGHT_ID, $userrightId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   RbuserprofileRight $rbuserprofileRight Object to remove from the list of results
     *
     * @return RbuserprofileRightQuery The current query, for fluid interface
     */
    public function prune($rbuserprofileRight = null)
    {
        if ($rbuserprofileRight) {
            $this->addUsingAlias(RbuserprofileRightPeer::ID, $rbuserprofileRight->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
