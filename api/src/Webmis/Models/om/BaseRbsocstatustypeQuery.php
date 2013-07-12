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
use Webmis\Models\Rbsocstatustype;
use Webmis\Models\RbsocstatustypePeer;
use Webmis\Models\RbsocstatustypeQuery;

/**
 * Base class that represents a query for the 'rbSocStatusType' table.
 *
 *
 *
 * @method RbsocstatustypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbsocstatustypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbsocstatustypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbsocstatustypeQuery orderBySoccode($order = Criteria::ASC) Order by the socCode column
 * @method RbsocstatustypeQuery orderByTfomscode($order = Criteria::ASC) Order by the TFOMSCode column
 * @method RbsocstatustypeQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 *
 * @method RbsocstatustypeQuery groupById() Group by the id column
 * @method RbsocstatustypeQuery groupByCode() Group by the code column
 * @method RbsocstatustypeQuery groupByName() Group by the name column
 * @method RbsocstatustypeQuery groupBySoccode() Group by the socCode column
 * @method RbsocstatustypeQuery groupByTfomscode() Group by the TFOMSCode column
 * @method RbsocstatustypeQuery groupByRegionalcode() Group by the regionalCode column
 *
 * @method RbsocstatustypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbsocstatustypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbsocstatustypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbsocstatustype findOne(PropelPDO $con = null) Return the first Rbsocstatustype matching the query
 * @method Rbsocstatustype findOneOrCreate(PropelPDO $con = null) Return the first Rbsocstatustype matching the query, or a new Rbsocstatustype object populated from the query conditions when no match is found
 *
 * @method Rbsocstatustype findOneByCode(string $code) Return the first Rbsocstatustype filtered by the code column
 * @method Rbsocstatustype findOneByName(string $name) Return the first Rbsocstatustype filtered by the name column
 * @method Rbsocstatustype findOneBySoccode(string $socCode) Return the first Rbsocstatustype filtered by the socCode column
 * @method Rbsocstatustype findOneByTfomscode(int $TFOMSCode) Return the first Rbsocstatustype filtered by the TFOMSCode column
 * @method Rbsocstatustype findOneByRegionalcode(string $regionalCode) Return the first Rbsocstatustype filtered by the regionalCode column
 *
 * @method array findById(int $id) Return Rbsocstatustype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbsocstatustype objects filtered by the code column
 * @method array findByName(string $name) Return Rbsocstatustype objects filtered by the name column
 * @method array findBySoccode(string $socCode) Return Rbsocstatustype objects filtered by the socCode column
 * @method array findByTfomscode(int $TFOMSCode) Return Rbsocstatustype objects filtered by the TFOMSCode column
 * @method array findByRegionalcode(string $regionalCode) Return Rbsocstatustype objects filtered by the regionalCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbsocstatustypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbsocstatustypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbsocstatustype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbsocstatustypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbsocstatustypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbsocstatustypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbsocstatustypeQuery) {
            return $criteria;
        }
        $query = new RbsocstatustypeQuery();
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
     * @return   Rbsocstatustype|Rbsocstatustype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbsocstatustypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbsocstatustypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbsocstatustype A model object, or null if the key is not found
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
     * @return                 Rbsocstatustype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `socCode`, `TFOMSCode`, `regionalCode` FROM `rbSocStatusType` WHERE `id` = :p0';
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
            $obj = new Rbsocstatustype();
            $obj->hydrate($row);
            RbsocstatustypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbsocstatustype|Rbsocstatustype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbsocstatustype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbsocstatustypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbsocstatustypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbsocstatustypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbsocstatustypePeer::ID, $keys, Criteria::IN);
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
     * @return RbsocstatustypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbsocstatustypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbsocstatustypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbsocstatustypePeer::ID, $id, $comparison);
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
     * @return RbsocstatustypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbsocstatustypePeer::CODE, $code, $comparison);
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
     * @return RbsocstatustypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbsocstatustypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the socCode column
     *
     * Example usage:
     * <code>
     * $query->filterBySoccode('fooValue');   // WHERE socCode = 'fooValue'
     * $query->filterBySoccode('%fooValue%'); // WHERE socCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $soccode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbsocstatustypeQuery The current query, for fluid interface
     */
    public function filterBySoccode($soccode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($soccode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $soccode)) {
                $soccode = str_replace('*', '%', $soccode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbsocstatustypePeer::SOCCODE, $soccode, $comparison);
    }

    /**
     * Filter the query on the TFOMSCode column
     *
     * Example usage:
     * <code>
     * $query->filterByTfomscode(1234); // WHERE TFOMSCode = 1234
     * $query->filterByTfomscode(array(12, 34)); // WHERE TFOMSCode IN (12, 34)
     * $query->filterByTfomscode(array('min' => 12)); // WHERE TFOMSCode >= 12
     * $query->filterByTfomscode(array('max' => 12)); // WHERE TFOMSCode <= 12
     * </code>
     *
     * @param     mixed $tfomscode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbsocstatustypeQuery The current query, for fluid interface
     */
    public function filterByTfomscode($tfomscode = null, $comparison = null)
    {
        if (is_array($tfomscode)) {
            $useMinMax = false;
            if (isset($tfomscode['min'])) {
                $this->addUsingAlias(RbsocstatustypePeer::TFOMSCODE, $tfomscode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tfomscode['max'])) {
                $this->addUsingAlias(RbsocstatustypePeer::TFOMSCODE, $tfomscode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbsocstatustypePeer::TFOMSCODE, $tfomscode, $comparison);
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
     * @return RbsocstatustypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbsocstatustypePeer::REGIONALCODE, $regionalcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbsocstatustype $rbsocstatustype Object to remove from the list of results
     *
     * @return RbsocstatustypeQuery The current query, for fluid interface
     */
    public function prune($rbsocstatustype = null)
    {
        if ($rbsocstatustype) {
            $this->addUsingAlias(RbsocstatustypePeer::ID, $rbsocstatustype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
