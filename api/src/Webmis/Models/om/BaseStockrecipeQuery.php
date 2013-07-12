<?php

namespace Webmis\Models\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\Person;
use Webmis\Models\Stockrecipe;
use Webmis\Models\StockrecipeItem;
use Webmis\Models\StockrecipePeer;
use Webmis\Models\StockrecipeQuery;

/**
 * Base class that represents a query for the 'StockRecipe' table.
 *
 *
 *
 * @method StockrecipeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StockrecipeQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method StockrecipeQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method StockrecipeQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method StockrecipeQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method StockrecipeQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method StockrecipeQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method StockrecipeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method StockrecipeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method StockrecipeQuery groupById() Group by the id column
 * @method StockrecipeQuery groupByCreatedatetime() Group by the createDatetime column
 * @method StockrecipeQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method StockrecipeQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method StockrecipeQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method StockrecipeQuery groupByDeleted() Group by the deleted column
 * @method StockrecipeQuery groupByGroupId() Group by the group_id column
 * @method StockrecipeQuery groupByCode() Group by the code column
 * @method StockrecipeQuery groupByName() Group by the name column
 *
 * @method StockrecipeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StockrecipeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StockrecipeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StockrecipeQuery leftJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method StockrecipeQuery rightJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method StockrecipeQuery innerJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 *
 * @method StockrecipeQuery leftJoinStockrecipeRelatedByGroupId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrecipeRelatedByGroupId relation
 * @method StockrecipeQuery rightJoinStockrecipeRelatedByGroupId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrecipeRelatedByGroupId relation
 * @method StockrecipeQuery innerJoinStockrecipeRelatedByGroupId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrecipeRelatedByGroupId relation
 *
 * @method StockrecipeQuery leftJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method StockrecipeQuery rightJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method StockrecipeQuery innerJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByModifypersonId relation
 *
 * @method StockrecipeQuery leftJoinStockrecipeRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrecipeRelatedById relation
 * @method StockrecipeQuery rightJoinStockrecipeRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrecipeRelatedById relation
 * @method StockrecipeQuery innerJoinStockrecipeRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrecipeRelatedById relation
 *
 * @method StockrecipeQuery leftJoinStockrecipeItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrecipeItem relation
 * @method StockrecipeQuery rightJoinStockrecipeItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrecipeItem relation
 * @method StockrecipeQuery innerJoinStockrecipeItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrecipeItem relation
 *
 * @method Stockrecipe findOne(PropelPDO $con = null) Return the first Stockrecipe matching the query
 * @method Stockrecipe findOneOrCreate(PropelPDO $con = null) Return the first Stockrecipe matching the query, or a new Stockrecipe object populated from the query conditions when no match is found
 *
 * @method Stockrecipe findOneByCreatedatetime(string $createDatetime) Return the first Stockrecipe filtered by the createDatetime column
 * @method Stockrecipe findOneByCreatepersonId(int $createPerson_id) Return the first Stockrecipe filtered by the createPerson_id column
 * @method Stockrecipe findOneByModifydatetime(string $modifyDatetime) Return the first Stockrecipe filtered by the modifyDatetime column
 * @method Stockrecipe findOneByModifypersonId(int $modifyPerson_id) Return the first Stockrecipe filtered by the modifyPerson_id column
 * @method Stockrecipe findOneByDeleted(boolean $deleted) Return the first Stockrecipe filtered by the deleted column
 * @method Stockrecipe findOneByGroupId(int $group_id) Return the first Stockrecipe filtered by the group_id column
 * @method Stockrecipe findOneByCode(string $code) Return the first Stockrecipe filtered by the code column
 * @method Stockrecipe findOneByName(string $name) Return the first Stockrecipe filtered by the name column
 *
 * @method array findById(int $id) Return Stockrecipe objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Stockrecipe objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Stockrecipe objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Stockrecipe objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Stockrecipe objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Stockrecipe objects filtered by the deleted column
 * @method array findByGroupId(int $group_id) Return Stockrecipe objects filtered by the group_id column
 * @method array findByCode(string $code) Return Stockrecipe objects filtered by the code column
 * @method array findByName(string $name) Return Stockrecipe objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockrecipeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStockrecipeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Stockrecipe', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StockrecipeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StockrecipeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StockrecipeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StockrecipeQuery) {
            return $criteria;
        }
        $query = new StockrecipeQuery();
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
     * @return   Stockrecipe|Stockrecipe[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StockrecipePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StockrecipePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stockrecipe A model object, or null if the key is not found
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
     * @return                 Stockrecipe A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `group_id`, `code`, `name` FROM `StockRecipe` WHERE `id` = :p0';
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
            $obj = new Stockrecipe();
            $obj->hydrate($row);
            StockrecipePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Stockrecipe|Stockrecipe[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Stockrecipe[]|mixed the list of results, formatted by the current formatter
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
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StockrecipePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StockrecipePeer::ID, $keys, Criteria::IN);
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
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StockrecipePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StockrecipePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the createDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedatetime('2011-03-14'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime('now'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime(array('max' => 'yesterday')); // WHERE createDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(StockrecipePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(StockrecipePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipePeer::CREATEDATETIME, $createdatetime, $comparison);
    }

    /**
     * Filter the query on the createPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatepersonId(1234); // WHERE createPerson_id = 1234
     * $query->filterByCreatepersonId(array(12, 34)); // WHERE createPerson_id IN (12, 34)
     * $query->filterByCreatepersonId(array('min' => 12)); // WHERE createPerson_id >= 12
     * $query->filterByCreatepersonId(array('max' => 12)); // WHERE createPerson_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByCreatepersonId()
     *
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(StockrecipePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(StockrecipePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipePeer::CREATEPERSON_ID, $createpersonId, $comparison);
    }

    /**
     * Filter the query on the modifyDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByModifydatetime('2011-03-14'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime('now'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime(array('max' => 'yesterday')); // WHERE modifyDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifydatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(StockrecipePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(StockrecipePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipePeer::MODIFYDATETIME, $modifydatetime, $comparison);
    }

    /**
     * Filter the query on the modifyPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModifypersonId(1234); // WHERE modifyPerson_id = 1234
     * $query->filterByModifypersonId(array(12, 34)); // WHERE modifyPerson_id IN (12, 34)
     * $query->filterByModifypersonId(array('min' => 12)); // WHERE modifyPerson_id >= 12
     * $query->filterByModifypersonId(array('max' => 12)); // WHERE modifyPerson_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByModifypersonId()
     *
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(StockrecipePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(StockrecipePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(StockrecipePeer::DELETED, $deleted, $comparison);
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
     * @see       filterByStockrecipeRelatedByGroupId()
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(StockrecipePeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(StockrecipePeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrecipePeer::GROUP_ID, $groupId, $comparison);
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
     * @return StockrecipeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StockrecipePeer::CODE, $code, $comparison);
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
     * @return StockrecipeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StockrecipePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByCreatepersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockrecipePeer::CREATEPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrecipePeer::CREATEPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByCreatepersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByCreatepersonId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PersonRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByCreatepersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByCreatepersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Stockrecipe object
     *
     * @param   Stockrecipe|PropelObjectCollection $stockrecipe The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipeRelatedByGroupId($stockrecipe, $comparison = null)
    {
        if ($stockrecipe instanceof Stockrecipe) {
            return $this
                ->addUsingAlias(StockrecipePeer::GROUP_ID, $stockrecipe->getId(), $comparison);
        } elseif ($stockrecipe instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrecipePeer::GROUP_ID, $stockrecipe->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByStockrecipeRelatedByGroupId() only accepts arguments of type Stockrecipe or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrecipeRelatedByGroupId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function joinStockrecipeRelatedByGroupId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrecipeRelatedByGroupId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StockrecipeRelatedByGroupId');
        }

        return $this;
    }

    /**
     * Use the StockrecipeRelatedByGroupId relation Stockrecipe object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeRelatedByGroupIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrecipeRelatedByGroupId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrecipeRelatedByGroupId', '\Webmis\Models\StockrecipeQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByModifypersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockrecipePeer::MODIFYPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrecipePeer::MODIFYPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByModifypersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByModifypersonId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PersonRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByModifypersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByModifypersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Stockrecipe object
     *
     * @param   Stockrecipe|PropelObjectCollection $stockrecipe  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipeRelatedById($stockrecipe, $comparison = null)
    {
        if ($stockrecipe instanceof Stockrecipe) {
            return $this
                ->addUsingAlias(StockrecipePeer::ID, $stockrecipe->getGroupId(), $comparison);
        } elseif ($stockrecipe instanceof PropelObjectCollection) {
            return $this
                ->useStockrecipeRelatedByIdQuery()
                ->filterByPrimaryKeys($stockrecipe->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrecipeRelatedById() only accepts arguments of type Stockrecipe or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrecipeRelatedById relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function joinStockrecipeRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrecipeRelatedById');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StockrecipeRelatedById');
        }

        return $this;
    }

    /**
     * Use the StockrecipeRelatedById relation Stockrecipe object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrecipeRelatedById($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrecipeRelatedById', '\Webmis\Models\StockrecipeQuery');
    }

    /**
     * Filter the query by a related StockrecipeItem object
     *
     * @param   StockrecipeItem|PropelObjectCollection $stockrecipeItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrecipeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipeItem($stockrecipeItem, $comparison = null)
    {
        if ($stockrecipeItem instanceof StockrecipeItem) {
            return $this
                ->addUsingAlias(StockrecipePeer::ID, $stockrecipeItem->getMasterId(), $comparison);
        } elseif ($stockrecipeItem instanceof PropelObjectCollection) {
            return $this
                ->useStockrecipeItemQuery()
                ->filterByPrimaryKeys($stockrecipeItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrecipeItem() only accepts arguments of type StockrecipeItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrecipeItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function joinStockrecipeItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrecipeItem');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StockrecipeItem');
        }

        return $this;
    }

    /**
     * Use the StockrecipeItem relation StockrecipeItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeItemQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockrecipeItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrecipeItem', '\Webmis\Models\StockrecipeItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Stockrecipe $stockrecipe Object to remove from the list of results
     *
     * @return StockrecipeQuery The current query, for fluid interface
     */
    public function prune($stockrecipe = null)
    {
        if ($stockrecipe) {
            $this->addUsingAlias(StockrecipePeer::ID, $stockrecipe->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
