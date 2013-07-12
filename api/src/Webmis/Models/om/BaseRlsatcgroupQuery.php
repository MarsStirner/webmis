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
use Webmis\Models\Rlsatcgroup;
use Webmis\Models\RlsatcgroupPeer;
use Webmis\Models\RlsatcgroupQuery;

/**
 * Base class that represents a query for the 'rlsATCGroup' table.
 *
 *
 *
 * @method RlsatcgroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RlsatcgroupQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method RlsatcgroupQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RlsatcgroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RlsatcgroupQuery orderByNameraw($order = Criteria::ASC) Order by the nameRaw column
 * @method RlsatcgroupQuery orderByPath($order = Criteria::ASC) Order by the path column
 * @method RlsatcgroupQuery orderByPathx($order = Criteria::ASC) Order by the pathx column
 *
 * @method RlsatcgroupQuery groupById() Group by the id column
 * @method RlsatcgroupQuery groupByGroupId() Group by the group_id column
 * @method RlsatcgroupQuery groupByCode() Group by the code column
 * @method RlsatcgroupQuery groupByName() Group by the name column
 * @method RlsatcgroupQuery groupByNameraw() Group by the nameRaw column
 * @method RlsatcgroupQuery groupByPath() Group by the path column
 * @method RlsatcgroupQuery groupByPathx() Group by the pathx column
 *
 * @method RlsatcgroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RlsatcgroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RlsatcgroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rlsatcgroup findOne(PropelPDO $con = null) Return the first Rlsatcgroup matching the query
 * @method Rlsatcgroup findOneOrCreate(PropelPDO $con = null) Return the first Rlsatcgroup matching the query, or a new Rlsatcgroup object populated from the query conditions when no match is found
 *
 * @method Rlsatcgroup findOneByGroupId(int $group_id) Return the first Rlsatcgroup filtered by the group_id column
 * @method Rlsatcgroup findOneByCode(string $code) Return the first Rlsatcgroup filtered by the code column
 * @method Rlsatcgroup findOneByName(string $name) Return the first Rlsatcgroup filtered by the name column
 * @method Rlsatcgroup findOneByNameraw(string $nameRaw) Return the first Rlsatcgroup filtered by the nameRaw column
 * @method Rlsatcgroup findOneByPath(string $path) Return the first Rlsatcgroup filtered by the path column
 * @method Rlsatcgroup findOneByPathx(string $pathx) Return the first Rlsatcgroup filtered by the pathx column
 *
 * @method array findById(int $id) Return Rlsatcgroup objects filtered by the id column
 * @method array findByGroupId(int $group_id) Return Rlsatcgroup objects filtered by the group_id column
 * @method array findByCode(string $code) Return Rlsatcgroup objects filtered by the code column
 * @method array findByName(string $name) Return Rlsatcgroup objects filtered by the name column
 * @method array findByNameraw(string $nameRaw) Return Rlsatcgroup objects filtered by the nameRaw column
 * @method array findByPath(string $path) Return Rlsatcgroup objects filtered by the path column
 * @method array findByPathx(string $pathx) Return Rlsatcgroup objects filtered by the pathx column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRlsatcgroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRlsatcgroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rlsatcgroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RlsatcgroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RlsatcgroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RlsatcgroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RlsatcgroupQuery) {
            return $criteria;
        }
        $query = new RlsatcgroupQuery();
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
     * @return   Rlsatcgroup|Rlsatcgroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RlsatcgroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RlsatcgroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rlsatcgroup A model object, or null if the key is not found
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
     * @return                 Rlsatcgroup A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `group_id`, `code`, `name`, `nameRaw`, `path`, `pathx` FROM `rlsATCGroup` WHERE `id` = :p0';
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
            $obj = new Rlsatcgroup();
            $obj->hydrate($row);
            RlsatcgroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rlsatcgroup|Rlsatcgroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rlsatcgroup[]|mixed the list of results, formatted by the current formatter
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
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RlsatcgroupPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RlsatcgroupPeer::ID, $keys, Criteria::IN);
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
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RlsatcgroupPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RlsatcgroupPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsatcgroupPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id >= 12
     * $query->filterByGroupId(array('max' => 12)); // WHERE group_id <= 12
     * </code>
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(RlsatcgroupPeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(RlsatcgroupPeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsatcgroupPeer::GROUP_ID, $groupId, $comparison);
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
     * @return RlsatcgroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RlsatcgroupPeer::CODE, $code, $comparison);
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
     * @return RlsatcgroupQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RlsatcgroupPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the nameRaw column
     *
     * Example usage:
     * <code>
     * $query->filterByNameraw('fooValue');   // WHERE nameRaw = 'fooValue'
     * $query->filterByNameraw('%fooValue%'); // WHERE nameRaw LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nameraw The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterByNameraw($nameraw = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nameraw)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nameraw)) {
                $nameraw = str_replace('*', '%', $nameraw);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RlsatcgroupPeer::NAMERAW, $nameraw, $comparison);
    }

    /**
     * Filter the query on the path column
     *
     * Example usage:
     * <code>
     * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
     * $query->filterByPath('%fooValue%'); // WHERE path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $path The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterByPath($path = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($path)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $path)) {
                $path = str_replace('*', '%', $path);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RlsatcgroupPeer::PATH, $path, $comparison);
    }

    /**
     * Filter the query on the pathx column
     *
     * Example usage:
     * <code>
     * $query->filterByPathx('fooValue');   // WHERE pathx = 'fooValue'
     * $query->filterByPathx('%fooValue%'); // WHERE pathx LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pathx The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function filterByPathx($pathx = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pathx)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pathx)) {
                $pathx = str_replace('*', '%', $pathx);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RlsatcgroupPeer::PATHX, $pathx, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rlsatcgroup $rlsatcgroup Object to remove from the list of results
     *
     * @return RlsatcgroupQuery The current query, for fluid interface
     */
    public function prune($rlsatcgroup = null)
    {
        if ($rlsatcgroup) {
            $this->addUsingAlias(RlsatcgroupPeer::ID, $rlsatcgroup->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
