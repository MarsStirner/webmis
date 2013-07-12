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
use Webmis\Models\Rbokved;
use Webmis\Models\RbokvedPeer;
use Webmis\Models\RbokvedQuery;

/**
 * Base class that represents a query for the 'rbOKVED' table.
 *
 *
 *
 * @method RbokvedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbokvedQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbokvedQuery orderByDiv($order = Criteria::ASC) Order by the div column
 * @method RbokvedQuery orderByClass($order = Criteria::ASC) Order by the class column
 * @method RbokvedQuery orderByGroup($order = Criteria::ASC) Order by the group_ column
 * @method RbokvedQuery orderByVid($order = Criteria::ASC) Order by the vid column
 * @method RbokvedQuery orderByOkved($order = Criteria::ASC) Order by the OKVED column
 * @method RbokvedQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbokvedQuery groupById() Group by the id column
 * @method RbokvedQuery groupByCode() Group by the code column
 * @method RbokvedQuery groupByDiv() Group by the div column
 * @method RbokvedQuery groupByClass() Group by the class column
 * @method RbokvedQuery groupByGroup() Group by the group_ column
 * @method RbokvedQuery groupByVid() Group by the vid column
 * @method RbokvedQuery groupByOkved() Group by the OKVED column
 * @method RbokvedQuery groupByName() Group by the name column
 *
 * @method RbokvedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbokvedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbokvedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbokved findOne(PropelPDO $con = null) Return the first Rbokved matching the query
 * @method Rbokved findOneOrCreate(PropelPDO $con = null) Return the first Rbokved matching the query, or a new Rbokved object populated from the query conditions when no match is found
 *
 * @method Rbokved findOneByCode(string $code) Return the first Rbokved filtered by the code column
 * @method Rbokved findOneByDiv(string $div) Return the first Rbokved filtered by the div column
 * @method Rbokved findOneByClass(string $class) Return the first Rbokved filtered by the class column
 * @method Rbokved findOneByGroup(string $group_) Return the first Rbokved filtered by the group_ column
 * @method Rbokved findOneByVid(string $vid) Return the first Rbokved filtered by the vid column
 * @method Rbokved findOneByOkved(string $OKVED) Return the first Rbokved filtered by the OKVED column
 * @method Rbokved findOneByName(string $name) Return the first Rbokved filtered by the name column
 *
 * @method array findById(int $id) Return Rbokved objects filtered by the id column
 * @method array findByCode(string $code) Return Rbokved objects filtered by the code column
 * @method array findByDiv(string $div) Return Rbokved objects filtered by the div column
 * @method array findByClass(string $class) Return Rbokved objects filtered by the class column
 * @method array findByGroup(string $group_) Return Rbokved objects filtered by the group_ column
 * @method array findByVid(string $vid) Return Rbokved objects filtered by the vid column
 * @method array findByOkved(string $OKVED) Return Rbokved objects filtered by the OKVED column
 * @method array findByName(string $name) Return Rbokved objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbokvedQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbokvedQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbokved', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbokvedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbokvedQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbokvedQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbokvedQuery) {
            return $criteria;
        }
        $query = new RbokvedQuery();
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
     * @return   Rbokved|Rbokved[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbokvedPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbokvedPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbokved A model object, or null if the key is not found
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
     * @return                 Rbokved A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `div`, `class`, `group_`, `vid`, `OKVED`, `name` FROM `rbOKVED` WHERE `id` = :p0';
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
            $obj = new Rbokved();
            $obj->hydrate($row);
            RbokvedPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbokved|Rbokved[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbokved[]|mixed the list of results, formatted by the current formatter
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
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbokvedPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbokvedPeer::ID, $keys, Criteria::IN);
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
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbokvedPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbokvedPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbokvedPeer::ID, $id, $comparison);
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
     * @return RbokvedQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbokvedPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the div column
     *
     * Example usage:
     * <code>
     * $query->filterByDiv('fooValue');   // WHERE div = 'fooValue'
     * $query->filterByDiv('%fooValue%'); // WHERE div LIKE '%fooValue%'
     * </code>
     *
     * @param     string $div The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByDiv($div = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($div)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $div)) {
                $div = str_replace('*', '%', $div);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbokvedPeer::DIV, $div, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass('fooValue');   // WHERE class = 'fooValue'
     * $query->filterByClass('%fooValue%'); // WHERE class LIKE '%fooValue%'
     * </code>
     *
     * @param     string $class The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($class)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $class)) {
                $class = str_replace('*', '%', $class);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbokvedPeer::CLAZZ, $class, $comparison);
    }

    /**
     * Filter the query on the group_ column
     *
     * Example usage:
     * <code>
     * $query->filterByGroup('fooValue');   // WHERE group_ = 'fooValue'
     * $query->filterByGroup('%fooValue%'); // WHERE group_ LIKE '%fooValue%'
     * </code>
     *
     * @param     string $group The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByGroup($group = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($group)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $group)) {
                $group = str_replace('*', '%', $group);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbokvedPeer::GROUP_, $group, $comparison);
    }

    /**
     * Filter the query on the vid column
     *
     * Example usage:
     * <code>
     * $query->filterByVid('fooValue');   // WHERE vid = 'fooValue'
     * $query->filterByVid('%fooValue%'); // WHERE vid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $vid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByVid($vid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($vid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $vid)) {
                $vid = str_replace('*', '%', $vid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbokvedPeer::VID, $vid, $comparison);
    }

    /**
     * Filter the query on the OKVED column
     *
     * Example usage:
     * <code>
     * $query->filterByOkved('fooValue');   // WHERE OKVED = 'fooValue'
     * $query->filterByOkved('%fooValue%'); // WHERE OKVED LIKE '%fooValue%'
     * </code>
     *
     * @param     string $okved The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function filterByOkved($okved = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($okved)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $okved)) {
                $okved = str_replace('*', '%', $okved);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbokvedPeer::OKVED, $okved, $comparison);
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
     * @return RbokvedQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbokvedPeer::NAME, $name, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbokved $rbokved Object to remove from the list of results
     *
     * @return RbokvedQuery The current query, for fluid interface
     */
    public function prune($rbokved = null)
    {
        if ($rbokved) {
            $this->addUsingAlias(RbokvedPeer::ID, $rbokved->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
