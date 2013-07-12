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
use Webmis\Models\Rbdocumenttype;
use Webmis\Models\RbdocumenttypePeer;
use Webmis\Models\RbdocumenttypeQuery;

/**
 * Base class that represents a query for the 'rbDocumentType' table.
 *
 *
 *
 * @method RbdocumenttypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbdocumenttypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbdocumenttypeQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method RbdocumenttypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbdocumenttypeQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method RbdocumenttypeQuery orderBySerialFormat($order = Criteria::ASC) Order by the serial_format column
 * @method RbdocumenttypeQuery orderByNumberFormat($order = Criteria::ASC) Order by the number_format column
 * @method RbdocumenttypeQuery orderByFederalcode($order = Criteria::ASC) Order by the federalCode column
 * @method RbdocumenttypeQuery orderBySoccode($order = Criteria::ASC) Order by the socCode column
 * @method RbdocumenttypeQuery orderByTfomscode($order = Criteria::ASC) Order by the TFOMSCode column
 *
 * @method RbdocumenttypeQuery groupById() Group by the id column
 * @method RbdocumenttypeQuery groupByCode() Group by the code column
 * @method RbdocumenttypeQuery groupByRegionalcode() Group by the regionalCode column
 * @method RbdocumenttypeQuery groupByName() Group by the name column
 * @method RbdocumenttypeQuery groupByGroupId() Group by the group_id column
 * @method RbdocumenttypeQuery groupBySerialFormat() Group by the serial_format column
 * @method RbdocumenttypeQuery groupByNumberFormat() Group by the number_format column
 * @method RbdocumenttypeQuery groupByFederalcode() Group by the federalCode column
 * @method RbdocumenttypeQuery groupBySoccode() Group by the socCode column
 * @method RbdocumenttypeQuery groupByTfomscode() Group by the TFOMSCode column
 *
 * @method RbdocumenttypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbdocumenttypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbdocumenttypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbdocumenttype findOne(PropelPDO $con = null) Return the first Rbdocumenttype matching the query
 * @method Rbdocumenttype findOneOrCreate(PropelPDO $con = null) Return the first Rbdocumenttype matching the query, or a new Rbdocumenttype object populated from the query conditions when no match is found
 *
 * @method Rbdocumenttype findOneByCode(string $code) Return the first Rbdocumenttype filtered by the code column
 * @method Rbdocumenttype findOneByRegionalcode(string $regionalCode) Return the first Rbdocumenttype filtered by the regionalCode column
 * @method Rbdocumenttype findOneByName(string $name) Return the first Rbdocumenttype filtered by the name column
 * @method Rbdocumenttype findOneByGroupId(int $group_id) Return the first Rbdocumenttype filtered by the group_id column
 * @method Rbdocumenttype findOneBySerialFormat(int $serial_format) Return the first Rbdocumenttype filtered by the serial_format column
 * @method Rbdocumenttype findOneByNumberFormat(int $number_format) Return the first Rbdocumenttype filtered by the number_format column
 * @method Rbdocumenttype findOneByFederalcode(string $federalCode) Return the first Rbdocumenttype filtered by the federalCode column
 * @method Rbdocumenttype findOneBySoccode(string $socCode) Return the first Rbdocumenttype filtered by the socCode column
 * @method Rbdocumenttype findOneByTfomscode(int $TFOMSCode) Return the first Rbdocumenttype filtered by the TFOMSCode column
 *
 * @method array findById(int $id) Return Rbdocumenttype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbdocumenttype objects filtered by the code column
 * @method array findByRegionalcode(string $regionalCode) Return Rbdocumenttype objects filtered by the regionalCode column
 * @method array findByName(string $name) Return Rbdocumenttype objects filtered by the name column
 * @method array findByGroupId(int $group_id) Return Rbdocumenttype objects filtered by the group_id column
 * @method array findBySerialFormat(int $serial_format) Return Rbdocumenttype objects filtered by the serial_format column
 * @method array findByNumberFormat(int $number_format) Return Rbdocumenttype objects filtered by the number_format column
 * @method array findByFederalcode(string $federalCode) Return Rbdocumenttype objects filtered by the federalCode column
 * @method array findBySoccode(string $socCode) Return Rbdocumenttype objects filtered by the socCode column
 * @method array findByTfomscode(int $TFOMSCode) Return Rbdocumenttype objects filtered by the TFOMSCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbdocumenttypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbdocumenttypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbdocumenttype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbdocumenttypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbdocumenttypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbdocumenttypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbdocumenttypeQuery) {
            return $criteria;
        }
        $query = new RbdocumenttypeQuery();
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
     * @return   Rbdocumenttype|Rbdocumenttype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbdocumenttypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbdocumenttypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbdocumenttype A model object, or null if the key is not found
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
     * @return                 Rbdocumenttype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `regionalCode`, `name`, `group_id`, `serial_format`, `number_format`, `federalCode`, `socCode`, `TFOMSCode` FROM `rbDocumentType` WHERE `id` = :p0';
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
            $obj = new Rbdocumenttype();
            $obj->hydrate($row);
            RbdocumenttypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbdocumenttype|Rbdocumenttype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbdocumenttype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbdocumenttypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbdocumenttypePeer::ID, $keys, Criteria::IN);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbdocumenttypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbdocumenttypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdocumenttypePeer::ID, $id, $comparison);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbdocumenttypePeer::CODE, $code, $comparison);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbdocumenttypePeer::REGIONALCODE, $regionalcode, $comparison);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbdocumenttypePeer::NAME, $name, $comparison);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(RbdocumenttypePeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(RbdocumenttypePeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdocumenttypePeer::GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query on the serial_format column
     *
     * Example usage:
     * <code>
     * $query->filterBySerialFormat(1234); // WHERE serial_format = 1234
     * $query->filterBySerialFormat(array(12, 34)); // WHERE serial_format IN (12, 34)
     * $query->filterBySerialFormat(array('min' => 12)); // WHERE serial_format >= 12
     * $query->filterBySerialFormat(array('max' => 12)); // WHERE serial_format <= 12
     * </code>
     *
     * @param     mixed $serialFormat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterBySerialFormat($serialFormat = null, $comparison = null)
    {
        if (is_array($serialFormat)) {
            $useMinMax = false;
            if (isset($serialFormat['min'])) {
                $this->addUsingAlias(RbdocumenttypePeer::SERIAL_FORMAT, $serialFormat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serialFormat['max'])) {
                $this->addUsingAlias(RbdocumenttypePeer::SERIAL_FORMAT, $serialFormat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdocumenttypePeer::SERIAL_FORMAT, $serialFormat, $comparison);
    }

    /**
     * Filter the query on the number_format column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberFormat(1234); // WHERE number_format = 1234
     * $query->filterByNumberFormat(array(12, 34)); // WHERE number_format IN (12, 34)
     * $query->filterByNumberFormat(array('min' => 12)); // WHERE number_format >= 12
     * $query->filterByNumberFormat(array('max' => 12)); // WHERE number_format <= 12
     * </code>
     *
     * @param     mixed $numberFormat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterByNumberFormat($numberFormat = null, $comparison = null)
    {
        if (is_array($numberFormat)) {
            $useMinMax = false;
            if (isset($numberFormat['min'])) {
                $this->addUsingAlias(RbdocumenttypePeer::NUMBER_FORMAT, $numberFormat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numberFormat['max'])) {
                $this->addUsingAlias(RbdocumenttypePeer::NUMBER_FORMAT, $numberFormat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdocumenttypePeer::NUMBER_FORMAT, $numberFormat, $comparison);
    }

    /**
     * Filter the query on the federalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByFederalcode('fooValue');   // WHERE federalCode = 'fooValue'
     * $query->filterByFederalcode('%fooValue%'); // WHERE federalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $federalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterByFederalcode($federalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($federalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $federalcode)) {
                $federalcode = str_replace('*', '%', $federalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbdocumenttypePeer::FEDERALCODE, $federalcode, $comparison);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbdocumenttypePeer::SOCCODE, $soccode, $comparison);
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
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function filterByTfomscode($tfomscode = null, $comparison = null)
    {
        if (is_array($tfomscode)) {
            $useMinMax = false;
            if (isset($tfomscode['min'])) {
                $this->addUsingAlias(RbdocumenttypePeer::TFOMSCODE, $tfomscode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tfomscode['max'])) {
                $this->addUsingAlias(RbdocumenttypePeer::TFOMSCODE, $tfomscode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdocumenttypePeer::TFOMSCODE, $tfomscode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbdocumenttype $rbdocumenttype Object to remove from the list of results
     *
     * @return RbdocumenttypeQuery The current query, for fluid interface
     */
    public function prune($rbdocumenttype = null)
    {
        if ($rbdocumenttype) {
            $this->addUsingAlias(RbdocumenttypePeer::ID, $rbdocumenttype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
