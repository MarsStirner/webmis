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
use Webmis\Models\Rbcoreactionproperty;
use Webmis\Models\RbcoreactionpropertyPeer;
use Webmis\Models\RbcoreactionpropertyQuery;

/**
 * Base class that represents a query for the 'rbCoreActionProperty' table.
 *
 *
 *
 * @method RbcoreactionpropertyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbcoreactionpropertyQuery orderByActiontypeId($order = Criteria::ASC) Order by the actionType_id column
 * @method RbcoreactionpropertyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbcoreactionpropertyQuery orderByActionpropertytypeId($order = Criteria::ASC) Order by the actionPropertyType_id column
 *
 * @method RbcoreactionpropertyQuery groupById() Group by the id column
 * @method RbcoreactionpropertyQuery groupByActiontypeId() Group by the actionType_id column
 * @method RbcoreactionpropertyQuery groupByName() Group by the name column
 * @method RbcoreactionpropertyQuery groupByActionpropertytypeId() Group by the actionPropertyType_id column
 *
 * @method RbcoreactionpropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbcoreactionpropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbcoreactionpropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbcoreactionproperty findOne(PropelPDO $con = null) Return the first Rbcoreactionproperty matching the query
 * @method Rbcoreactionproperty findOneOrCreate(PropelPDO $con = null) Return the first Rbcoreactionproperty matching the query, or a new Rbcoreactionproperty object populated from the query conditions when no match is found
 *
 * @method Rbcoreactionproperty findOneByActiontypeId(int $actionType_id) Return the first Rbcoreactionproperty filtered by the actionType_id column
 * @method Rbcoreactionproperty findOneByName(string $name) Return the first Rbcoreactionproperty filtered by the name column
 * @method Rbcoreactionproperty findOneByActionpropertytypeId(int $actionPropertyType_id) Return the first Rbcoreactionproperty filtered by the actionPropertyType_id column
 *
 * @method array findById(int $id) Return Rbcoreactionproperty objects filtered by the id column
 * @method array findByActiontypeId(int $actionType_id) Return Rbcoreactionproperty objects filtered by the actionType_id column
 * @method array findByName(string $name) Return Rbcoreactionproperty objects filtered by the name column
 * @method array findByActionpropertytypeId(int $actionPropertyType_id) Return Rbcoreactionproperty objects filtered by the actionPropertyType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbcoreactionpropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbcoreactionpropertyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbcoreactionproperty', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbcoreactionpropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbcoreactionpropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbcoreactionpropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbcoreactionpropertyQuery) {
            return $criteria;
        }
        $query = new RbcoreactionpropertyQuery();
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
     * @return   Rbcoreactionproperty|Rbcoreactionproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbcoreactionpropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbcoreactionpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbcoreactionproperty A model object, or null if the key is not found
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
     * @return                 Rbcoreactionproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `actionType_id`, `name`, `actionPropertyType_id` FROM `rbCoreActionProperty` WHERE `id` = :p0';
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
            $obj = new Rbcoreactionproperty();
            $obj->hydrate($row);
            RbcoreactionpropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbcoreactionproperty|Rbcoreactionproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbcoreactionproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbcoreactionpropertyPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbcoreactionpropertyPeer::ID, $keys, Criteria::IN);
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
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbcoreactionpropertyPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbcoreactionpropertyPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcoreactionpropertyPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the actionType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActiontypeId(1234); // WHERE actionType_id = 1234
     * $query->filterByActiontypeId(array(12, 34)); // WHERE actionType_id IN (12, 34)
     * $query->filterByActiontypeId(array('min' => 12)); // WHERE actionType_id >= 12
     * $query->filterByActiontypeId(array('max' => 12)); // WHERE actionType_id <= 12
     * </code>
     *
     * @param     mixed $actiontypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
     */
    public function filterByActiontypeId($actiontypeId = null, $comparison = null)
    {
        if (is_array($actiontypeId)) {
            $useMinMax = false;
            if (isset($actiontypeId['min'])) {
                $this->addUsingAlias(RbcoreactionpropertyPeer::ACTIONTYPE_ID, $actiontypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiontypeId['max'])) {
                $this->addUsingAlias(RbcoreactionpropertyPeer::ACTIONTYPE_ID, $actiontypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcoreactionpropertyPeer::ACTIONTYPE_ID, $actiontypeId, $comparison);
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
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbcoreactionpropertyPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the actionPropertyType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionpropertytypeId(1234); // WHERE actionPropertyType_id = 1234
     * $query->filterByActionpropertytypeId(array(12, 34)); // WHERE actionPropertyType_id IN (12, 34)
     * $query->filterByActionpropertytypeId(array('min' => 12)); // WHERE actionPropertyType_id >= 12
     * $query->filterByActionpropertytypeId(array('max' => 12)); // WHERE actionPropertyType_id <= 12
     * </code>
     *
     * @param     mixed $actionpropertytypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
     */
    public function filterByActionpropertytypeId($actionpropertytypeId = null, $comparison = null)
    {
        if (is_array($actionpropertytypeId)) {
            $useMinMax = false;
            if (isset($actionpropertytypeId['min'])) {
                $this->addUsingAlias(RbcoreactionpropertyPeer::ACTIONPROPERTYTYPE_ID, $actionpropertytypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionpropertytypeId['max'])) {
                $this->addUsingAlias(RbcoreactionpropertyPeer::ACTIONPROPERTYTYPE_ID, $actionpropertytypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcoreactionpropertyPeer::ACTIONPROPERTYTYPE_ID, $actionpropertytypeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbcoreactionproperty $rbcoreactionproperty Object to remove from the list of results
     *
     * @return RbcoreactionpropertyQuery The current query, for fluid interface
     */
    public function prune($rbcoreactionproperty = null)
    {
        if ($rbcoreactionproperty) {
            $this->addUsingAlias(RbcoreactionpropertyPeer::ID, $rbcoreactionproperty->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
