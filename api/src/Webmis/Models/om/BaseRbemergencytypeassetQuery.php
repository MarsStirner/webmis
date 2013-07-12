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
use Webmis\Models\Rbemergencytypeasset;
use Webmis\Models\RbemergencytypeassetPeer;
use Webmis\Models\RbemergencytypeassetQuery;

/**
 * Base class that represents a query for the 'rbEmergencyTypeAsset' table.
 *
 *
 *
 * @method RbemergencytypeassetQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbemergencytypeassetQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbemergencytypeassetQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbemergencytypeassetQuery orderByCoderegional($order = Criteria::ASC) Order by the codeRegional column
 *
 * @method RbemergencytypeassetQuery groupById() Group by the id column
 * @method RbemergencytypeassetQuery groupByCode() Group by the code column
 * @method RbemergencytypeassetQuery groupByName() Group by the name column
 * @method RbemergencytypeassetQuery groupByCoderegional() Group by the codeRegional column
 *
 * @method RbemergencytypeassetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbemergencytypeassetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbemergencytypeassetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbemergencytypeasset findOne(PropelPDO $con = null) Return the first Rbemergencytypeasset matching the query
 * @method Rbemergencytypeasset findOneOrCreate(PropelPDO $con = null) Return the first Rbemergencytypeasset matching the query, or a new Rbemergencytypeasset object populated from the query conditions when no match is found
 *
 * @method Rbemergencytypeasset findOneByCode(string $code) Return the first Rbemergencytypeasset filtered by the code column
 * @method Rbemergencytypeasset findOneByName(string $name) Return the first Rbemergencytypeasset filtered by the name column
 * @method Rbemergencytypeasset findOneByCoderegional(string $codeRegional) Return the first Rbemergencytypeasset filtered by the codeRegional column
 *
 * @method array findById(int $id) Return Rbemergencytypeasset objects filtered by the id column
 * @method array findByCode(string $code) Return Rbemergencytypeasset objects filtered by the code column
 * @method array findByName(string $name) Return Rbemergencytypeasset objects filtered by the name column
 * @method array findByCoderegional(string $codeRegional) Return Rbemergencytypeasset objects filtered by the codeRegional column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbemergencytypeassetQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbemergencytypeassetQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbemergencytypeasset', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbemergencytypeassetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbemergencytypeassetQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbemergencytypeassetQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbemergencytypeassetQuery) {
            return $criteria;
        }
        $query = new RbemergencytypeassetQuery();
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
     * @return   Rbemergencytypeasset|Rbemergencytypeasset[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbemergencytypeassetPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbemergencytypeassetPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbemergencytypeasset A model object, or null if the key is not found
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
     * @return                 Rbemergencytypeasset A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `codeRegional` FROM `rbEmergencyTypeAsset` WHERE `id` = :p0';
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
            $obj = new Rbemergencytypeasset();
            $obj->hydrate($row);
            RbemergencytypeassetPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbemergencytypeasset|Rbemergencytypeasset[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbemergencytypeasset[]|mixed the list of results, formatted by the current formatter
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
     * @return RbemergencytypeassetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbemergencytypeassetPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbemergencytypeassetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbemergencytypeassetPeer::ID, $keys, Criteria::IN);
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
     * @return RbemergencytypeassetQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbemergencytypeassetPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbemergencytypeassetPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbemergencytypeassetPeer::ID, $id, $comparison);
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
     * @return RbemergencytypeassetQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbemergencytypeassetPeer::CODE, $code, $comparison);
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
     * @return RbemergencytypeassetQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbemergencytypeassetPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the codeRegional column
     *
     * Example usage:
     * <code>
     * $query->filterByCoderegional('fooValue');   // WHERE codeRegional = 'fooValue'
     * $query->filterByCoderegional('%fooValue%'); // WHERE codeRegional LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coderegional The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbemergencytypeassetQuery The current query, for fluid interface
     */
    public function filterByCoderegional($coderegional = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coderegional)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coderegional)) {
                $coderegional = str_replace('*', '%', $coderegional);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbemergencytypeassetPeer::CODEREGIONAL, $coderegional, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbemergencytypeasset $rbemergencytypeasset Object to remove from the list of results
     *
     * @return RbemergencytypeassetQuery The current query, for fluid interface
     */
    public function prune($rbemergencytypeasset = null)
    {
        if ($rbemergencytypeasset) {
            $this->addUsingAlias(RbemergencytypeassetPeer::ID, $rbemergencytypeasset->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
