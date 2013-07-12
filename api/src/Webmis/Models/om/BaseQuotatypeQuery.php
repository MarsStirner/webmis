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
use Webmis\Models\MkbQuotatypePacientmodel;
use Webmis\Models\Quotatype;
use Webmis\Models\QuotatypePeer;
use Webmis\Models\QuotatypeQuery;
use Webmis\Models\Rbpacientmodel;

/**
 * Base class that represents a query for the 'QuotaType' table.
 *
 *
 *
 * @method QuotatypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method QuotatypeQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method QuotatypeQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method QuotatypeQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method QuotatypeQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method QuotatypeQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method QuotatypeQuery orderByClass($order = Criteria::ASC) Order by the class column
 * @method QuotatypeQuery orderByGroupCode($order = Criteria::ASC) Order by the group_code column
 * @method QuotatypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method QuotatypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method QuotatypeQuery orderByTeenolder($order = Criteria::ASC) Order by the teenOlder column
 *
 * @method QuotatypeQuery groupById() Group by the id column
 * @method QuotatypeQuery groupByCreatedatetime() Group by the createDatetime column
 * @method QuotatypeQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method QuotatypeQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method QuotatypeQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method QuotatypeQuery groupByDeleted() Group by the deleted column
 * @method QuotatypeQuery groupByClass() Group by the class column
 * @method QuotatypeQuery groupByGroupCode() Group by the group_code column
 * @method QuotatypeQuery groupByCode() Group by the code column
 * @method QuotatypeQuery groupByName() Group by the name column
 * @method QuotatypeQuery groupByTeenolder() Group by the teenOlder column
 *
 * @method QuotatypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuotatypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuotatypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method QuotatypeQuery leftJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a LEFT JOIN clause to the query using the MkbQuotatypePacientmodel relation
 * @method QuotatypeQuery rightJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MkbQuotatypePacientmodel relation
 * @method QuotatypeQuery innerJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a INNER JOIN clause to the query using the MkbQuotatypePacientmodel relation
 *
 * @method QuotatypeQuery leftJoinRbpacientmodel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbpacientmodel relation
 * @method QuotatypeQuery rightJoinRbpacientmodel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbpacientmodel relation
 * @method QuotatypeQuery innerJoinRbpacientmodel($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbpacientmodel relation
 *
 * @method Quotatype findOne(PropelPDO $con = null) Return the first Quotatype matching the query
 * @method Quotatype findOneOrCreate(PropelPDO $con = null) Return the first Quotatype matching the query, or a new Quotatype object populated from the query conditions when no match is found
 *
 * @method Quotatype findOneByCreatedatetime(string $createDatetime) Return the first Quotatype filtered by the createDatetime column
 * @method Quotatype findOneByCreatepersonId(int $createPerson_id) Return the first Quotatype filtered by the createPerson_id column
 * @method Quotatype findOneByModifydatetime(string $modifyDatetime) Return the first Quotatype filtered by the modifyDatetime column
 * @method Quotatype findOneByModifypersonId(int $modifyPerson_id) Return the first Quotatype filtered by the modifyPerson_id column
 * @method Quotatype findOneByDeleted(boolean $deleted) Return the first Quotatype filtered by the deleted column
 * @method Quotatype findOneByClass(boolean $class) Return the first Quotatype filtered by the class column
 * @method Quotatype findOneByGroupCode(string $group_code) Return the first Quotatype filtered by the group_code column
 * @method Quotatype findOneByCode(string $code) Return the first Quotatype filtered by the code column
 * @method Quotatype findOneByName(string $name) Return the first Quotatype filtered by the name column
 * @method Quotatype findOneByTeenolder(boolean $teenOlder) Return the first Quotatype filtered by the teenOlder column
 *
 * @method array findById(int $id) Return Quotatype objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Quotatype objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Quotatype objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Quotatype objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Quotatype objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Quotatype objects filtered by the deleted column
 * @method array findByClass(boolean $class) Return Quotatype objects filtered by the class column
 * @method array findByGroupCode(string $group_code) Return Quotatype objects filtered by the group_code column
 * @method array findByCode(string $code) Return Quotatype objects filtered by the code column
 * @method array findByName(string $name) Return Quotatype objects filtered by the name column
 * @method array findByTeenolder(boolean $teenOlder) Return Quotatype objects filtered by the teenOlder column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseQuotatypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuotatypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Quotatype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuotatypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuotatypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuotatypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuotatypeQuery) {
            return $criteria;
        }
        $query = new QuotatypeQuery();
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
     * @return   Quotatype|Quotatype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuotatypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuotatypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quotatype A model object, or null if the key is not found
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
     * @return                 Quotatype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `class`, `group_code`, `code`, `name`, `teenOlder` FROM `QuotaType` WHERE `id` = :p0';
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
            $obj = new Quotatype();
            $obj->hydrate($row);
            QuotatypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quotatype|Quotatype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quotatype[]|mixed the list of results, formatted by the current formatter
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
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuotatypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuotatypePeer::ID, $keys, Criteria::IN);
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
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(QuotatypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(QuotatypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotatypePeer::ID, $id, $comparison);
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
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(QuotatypePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(QuotatypePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotatypePeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(QuotatypePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(QuotatypePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotatypePeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(QuotatypePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(QuotatypePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotatypePeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(QuotatypePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(QuotatypePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotatypePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(QuotatypePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass(true); // WHERE class = true
     * $query->filterByClass('yes'); // WHERE class = true
     * </code>
     *
     * @param     boolean|string $class The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (is_string($class)) {
            $class = in_array(strtolower($class), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(QuotatypePeer::CLAZZ, $class, $comparison);
    }

    /**
     * Filter the query on the group_code column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupCode('fooValue');   // WHERE group_code = 'fooValue'
     * $query->filterByGroupCode('%fooValue%'); // WHERE group_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $groupCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByGroupCode($groupCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($groupCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $groupCode)) {
                $groupCode = str_replace('*', '%', $groupCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuotatypePeer::GROUP_CODE, $groupCode, $comparison);
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
     * @return QuotatypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(QuotatypePeer::CODE, $code, $comparison);
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
     * @return QuotatypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(QuotatypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the teenOlder column
     *
     * Example usage:
     * <code>
     * $query->filterByTeenolder(true); // WHERE teenOlder = true
     * $query->filterByTeenolder('yes'); // WHERE teenOlder = true
     * </code>
     *
     * @param     boolean|string $teenolder The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function filterByTeenolder($teenolder = null, $comparison = null)
    {
        if (is_string($teenolder)) {
            $teenolder = in_array(strtolower($teenolder), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(QuotatypePeer::TEENOLDER, $teenolder, $comparison);
    }

    /**
     * Filter the query by a related MkbQuotatypePacientmodel object
     *
     * @param   MkbQuotatypePacientmodel|PropelObjectCollection $mkbQuotatypePacientmodel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuotatypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMkbQuotatypePacientmodel($mkbQuotatypePacientmodel, $comparison = null)
    {
        if ($mkbQuotatypePacientmodel instanceof MkbQuotatypePacientmodel) {
            return $this
                ->addUsingAlias(QuotatypePeer::ID, $mkbQuotatypePacientmodel->getQuotatypeId(), $comparison);
        } elseif ($mkbQuotatypePacientmodel instanceof PropelObjectCollection) {
            return $this
                ->useMkbQuotatypePacientmodelQuery()
                ->filterByPrimaryKeys($mkbQuotatypePacientmodel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMkbQuotatypePacientmodel() only accepts arguments of type MkbQuotatypePacientmodel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MkbQuotatypePacientmodel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function joinMkbQuotatypePacientmodel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MkbQuotatypePacientmodel');

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
            $this->addJoinObject($join, 'MkbQuotatypePacientmodel');
        }

        return $this;
    }

    /**
     * Use the MkbQuotatypePacientmodel relation MkbQuotatypePacientmodel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\MkbQuotatypePacientmodelQuery A secondary query class using the current class as primary query
     */
    public function useMkbQuotatypePacientmodelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMkbQuotatypePacientmodel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MkbQuotatypePacientmodel', '\Webmis\Models\MkbQuotatypePacientmodelQuery');
    }

    /**
     * Filter the query by a related Rbpacientmodel object
     *
     * @param   Rbpacientmodel|PropelObjectCollection $rbpacientmodel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuotatypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbpacientmodel($rbpacientmodel, $comparison = null)
    {
        if ($rbpacientmodel instanceof Rbpacientmodel) {
            return $this
                ->addUsingAlias(QuotatypePeer::ID, $rbpacientmodel->getQuotatypeId(), $comparison);
        } elseif ($rbpacientmodel instanceof PropelObjectCollection) {
            return $this
                ->useRbpacientmodelQuery()
                ->filterByPrimaryKeys($rbpacientmodel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbpacientmodel() only accepts arguments of type Rbpacientmodel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbpacientmodel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function joinRbpacientmodel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbpacientmodel');

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
            $this->addJoinObject($join, 'Rbpacientmodel');
        }

        return $this;
    }

    /**
     * Use the Rbpacientmodel relation Rbpacientmodel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbpacientmodelQuery A secondary query class using the current class as primary query
     */
    public function useRbpacientmodelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbpacientmodel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbpacientmodel', '\Webmis\Models\RbpacientmodelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Quotatype $quotatype Object to remove from the list of results
     *
     * @return QuotatypeQuery The current query, for fluid interface
     */
    public function prune($quotatype = null)
    {
        if ($quotatype) {
            $this->addUsingAlias(QuotatypePeer::ID, $quotatype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
