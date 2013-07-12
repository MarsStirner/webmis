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
use Webmis\Models\OrgstructureAddress;
use Webmis\Models\OrgstructureAddressPeer;
use Webmis\Models\OrgstructureAddressQuery;

/**
 * Base class that represents a query for the 'OrgStructure_Address' table.
 *
 *
 *
 * @method OrgstructureAddressQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureAddressQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method OrgstructureAddressQuery orderByHouseId($order = Criteria::ASC) Order by the house_id column
 * @method OrgstructureAddressQuery orderByFirstflat($order = Criteria::ASC) Order by the firstFlat column
 * @method OrgstructureAddressQuery orderByLastflat($order = Criteria::ASC) Order by the lastFlat column
 *
 * @method OrgstructureAddressQuery groupById() Group by the id column
 * @method OrgstructureAddressQuery groupByMasterId() Group by the master_id column
 * @method OrgstructureAddressQuery groupByHouseId() Group by the house_id column
 * @method OrgstructureAddressQuery groupByFirstflat() Group by the firstFlat column
 * @method OrgstructureAddressQuery groupByLastflat() Group by the lastFlat column
 *
 * @method OrgstructureAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureAddress findOne(PropelPDO $con = null) Return the first OrgstructureAddress matching the query
 * @method OrgstructureAddress findOneOrCreate(PropelPDO $con = null) Return the first OrgstructureAddress matching the query, or a new OrgstructureAddress object populated from the query conditions when no match is found
 *
 * @method OrgstructureAddress findOneByMasterId(int $master_id) Return the first OrgstructureAddress filtered by the master_id column
 * @method OrgstructureAddress findOneByHouseId(int $house_id) Return the first OrgstructureAddress filtered by the house_id column
 * @method OrgstructureAddress findOneByFirstflat(int $firstFlat) Return the first OrgstructureAddress filtered by the firstFlat column
 * @method OrgstructureAddress findOneByLastflat(int $lastFlat) Return the first OrgstructureAddress filtered by the lastFlat column
 *
 * @method array findById(int $id) Return OrgstructureAddress objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return OrgstructureAddress objects filtered by the master_id column
 * @method array findByHouseId(int $house_id) Return OrgstructureAddress objects filtered by the house_id column
 * @method array findByFirstflat(int $firstFlat) Return OrgstructureAddress objects filtered by the firstFlat column
 * @method array findByLastflat(int $lastFlat) Return OrgstructureAddress objects filtered by the lastFlat column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureAddressQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureAddressQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrgstructureAddress', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureAddressQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureAddressQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureAddressQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureAddressQuery) {
            return $criteria;
        }
        $query = new OrgstructureAddressQuery();
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
     * @return   OrgstructureAddress|OrgstructureAddress[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructureAddressPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructureAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgstructureAddress A model object, or null if the key is not found
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
     * @return                 OrgstructureAddress A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `house_id`, `firstFlat`, `lastFlat` FROM `OrgStructure_Address` WHERE `id` = :p0';
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
            $obj = new OrgstructureAddress();
            $obj->hydrate($row);
            OrgstructureAddressPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrgstructureAddress|OrgstructureAddress[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrgstructureAddress[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructureAddressPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructureAddressPeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureAddressPeer::ID, $id, $comparison);
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
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureAddressPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the house_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHouseId(1234); // WHERE house_id = 1234
     * $query->filterByHouseId(array(12, 34)); // WHERE house_id IN (12, 34)
     * $query->filterByHouseId(array('min' => 12)); // WHERE house_id >= 12
     * $query->filterByHouseId(array('max' => 12)); // WHERE house_id <= 12
     * </code>
     *
     * @param     mixed $houseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterByHouseId($houseId = null, $comparison = null)
    {
        if (is_array($houseId)) {
            $useMinMax = false;
            if (isset($houseId['min'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::HOUSE_ID, $houseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($houseId['max'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::HOUSE_ID, $houseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureAddressPeer::HOUSE_ID, $houseId, $comparison);
    }

    /**
     * Filter the query on the firstFlat column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstflat(1234); // WHERE firstFlat = 1234
     * $query->filterByFirstflat(array(12, 34)); // WHERE firstFlat IN (12, 34)
     * $query->filterByFirstflat(array('min' => 12)); // WHERE firstFlat >= 12
     * $query->filterByFirstflat(array('max' => 12)); // WHERE firstFlat <= 12
     * </code>
     *
     * @param     mixed $firstflat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterByFirstflat($firstflat = null, $comparison = null)
    {
        if (is_array($firstflat)) {
            $useMinMax = false;
            if (isset($firstflat['min'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::FIRSTFLAT, $firstflat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($firstflat['max'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::FIRSTFLAT, $firstflat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureAddressPeer::FIRSTFLAT, $firstflat, $comparison);
    }

    /**
     * Filter the query on the lastFlat column
     *
     * Example usage:
     * <code>
     * $query->filterByLastflat(1234); // WHERE lastFlat = 1234
     * $query->filterByLastflat(array(12, 34)); // WHERE lastFlat IN (12, 34)
     * $query->filterByLastflat(array('min' => 12)); // WHERE lastFlat >= 12
     * $query->filterByLastflat(array('max' => 12)); // WHERE lastFlat <= 12
     * </code>
     *
     * @param     mixed $lastflat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function filterByLastflat($lastflat = null, $comparison = null)
    {
        if (is_array($lastflat)) {
            $useMinMax = false;
            if (isset($lastflat['min'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::LASTFLAT, $lastflat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastflat['max'])) {
                $this->addUsingAlias(OrgstructureAddressPeer::LASTFLAT, $lastflat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureAddressPeer::LASTFLAT, $lastflat, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   OrgstructureAddress $orgstructureAddress Object to remove from the list of results
     *
     * @return OrgstructureAddressQuery The current query, for fluid interface
     */
    public function prune($orgstructureAddress = null)
    {
        if ($orgstructureAddress) {
            $this->addUsingAlias(OrgstructureAddressPeer::ID, $orgstructureAddress->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
