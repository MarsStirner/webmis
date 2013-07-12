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
use Webmis\Models\Rbimagemap;
use Webmis\Models\RbimagemapPeer;
use Webmis\Models\RbimagemapQuery;

/**
 * Base class that represents a query for the 'rbImageMap' table.
 *
 *
 *
 * @method RbimagemapQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbimagemapQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbimagemapQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbimagemapQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method RbimagemapQuery orderByMarksize($order = Criteria::ASC) Order by the markSize column
 *
 * @method RbimagemapQuery groupById() Group by the id column
 * @method RbimagemapQuery groupByCode() Group by the code column
 * @method RbimagemapQuery groupByName() Group by the name column
 * @method RbimagemapQuery groupByImage() Group by the image column
 * @method RbimagemapQuery groupByMarksize() Group by the markSize column
 *
 * @method RbimagemapQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbimagemapQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbimagemapQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbimagemap findOne(PropelPDO $con = null) Return the first Rbimagemap matching the query
 * @method Rbimagemap findOneOrCreate(PropelPDO $con = null) Return the first Rbimagemap matching the query, or a new Rbimagemap object populated from the query conditions when no match is found
 *
 * @method Rbimagemap findOneByCode(string $code) Return the first Rbimagemap filtered by the code column
 * @method Rbimagemap findOneByName(string $name) Return the first Rbimagemap filtered by the name column
 * @method Rbimagemap findOneByImage(resource $image) Return the first Rbimagemap filtered by the image column
 * @method Rbimagemap findOneByMarksize(int $markSize) Return the first Rbimagemap filtered by the markSize column
 *
 * @method array findById(int $id) Return Rbimagemap objects filtered by the id column
 * @method array findByCode(string $code) Return Rbimagemap objects filtered by the code column
 * @method array findByName(string $name) Return Rbimagemap objects filtered by the name column
 * @method array findByImage(resource $image) Return Rbimagemap objects filtered by the image column
 * @method array findByMarksize(int $markSize) Return Rbimagemap objects filtered by the markSize column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbimagemapQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbimagemapQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbimagemap', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbimagemapQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbimagemapQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbimagemapQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbimagemapQuery) {
            return $criteria;
        }
        $query = new RbimagemapQuery();
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
     * @return   Rbimagemap|Rbimagemap[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbimagemapPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbimagemapPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbimagemap A model object, or null if the key is not found
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
     * @return                 Rbimagemap A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `image`, `markSize` FROM `rbImageMap` WHERE `id` = :p0';
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
            $obj = new Rbimagemap();
            $obj->hydrate($row);
            RbimagemapPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbimagemap|Rbimagemap[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbimagemap[]|mixed the list of results, formatted by the current formatter
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
     * @return RbimagemapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbimagemapPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbimagemapQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbimagemapPeer::ID, $keys, Criteria::IN);
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
     * @return RbimagemapQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbimagemapPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbimagemapPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbimagemapPeer::ID, $id, $comparison);
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
     * @return RbimagemapQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbimagemapPeer::CODE, $code, $comparison);
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
     * @return RbimagemapQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbimagemapPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * @param     mixed $image The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbimagemapQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {

        return $this->addUsingAlias(RbimagemapPeer::IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the markSize column
     *
     * Example usage:
     * <code>
     * $query->filterByMarksize(1234); // WHERE markSize = 1234
     * $query->filterByMarksize(array(12, 34)); // WHERE markSize IN (12, 34)
     * $query->filterByMarksize(array('min' => 12)); // WHERE markSize >= 12
     * $query->filterByMarksize(array('max' => 12)); // WHERE markSize <= 12
     * </code>
     *
     * @param     mixed $marksize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbimagemapQuery The current query, for fluid interface
     */
    public function filterByMarksize($marksize = null, $comparison = null)
    {
        if (is_array($marksize)) {
            $useMinMax = false;
            if (isset($marksize['min'])) {
                $this->addUsingAlias(RbimagemapPeer::MARKSIZE, $marksize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($marksize['max'])) {
                $this->addUsingAlias(RbimagemapPeer::MARKSIZE, $marksize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbimagemapPeer::MARKSIZE, $marksize, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbimagemap $rbimagemap Object to remove from the list of results
     *
     * @return RbimagemapQuery The current query, for fluid interface
     */
    public function prune($rbimagemap = null)
    {
        if ($rbimagemap) {
            $this->addUsingAlias(RbimagemapPeer::ID, $rbimagemap->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
