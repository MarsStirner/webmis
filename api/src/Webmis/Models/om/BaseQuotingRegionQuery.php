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
use Webmis\Models\QuotingRegion;
use Webmis\Models\QuotingRegionPeer;
use Webmis\Models\QuotingRegionQuery;

/**
 * Base class that represents a query for the 'Quoting_Region' table.
 *
 *
 *
 * @method QuotingRegionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method QuotingRegionQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method QuotingRegionQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method QuotingRegionQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method QuotingRegionQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method QuotingRegionQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method QuotingRegionQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method QuotingRegionQuery orderByRegionCode($order = Criteria::ASC) Order by the region_code column
 * @method QuotingRegionQuery orderByLimitation($order = Criteria::ASC) Order by the limitation column
 * @method QuotingRegionQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method QuotingRegionQuery orderByConfirmed($order = Criteria::ASC) Order by the confirmed column
 * @method QuotingRegionQuery orderByInqueue($order = Criteria::ASC) Order by the inQueue column
 *
 * @method QuotingRegionQuery groupById() Group by the id column
 * @method QuotingRegionQuery groupByCreatedatetime() Group by the createDatetime column
 * @method QuotingRegionQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method QuotingRegionQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method QuotingRegionQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method QuotingRegionQuery groupByDeleted() Group by the deleted column
 * @method QuotingRegionQuery groupByMasterId() Group by the master_id column
 * @method QuotingRegionQuery groupByRegionCode() Group by the region_code column
 * @method QuotingRegionQuery groupByLimitation() Group by the limitation column
 * @method QuotingRegionQuery groupByUsed() Group by the used column
 * @method QuotingRegionQuery groupByConfirmed() Group by the confirmed column
 * @method QuotingRegionQuery groupByInqueue() Group by the inQueue column
 *
 * @method QuotingRegionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuotingRegionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuotingRegionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method QuotingRegion findOne(PropelPDO $con = null) Return the first QuotingRegion matching the query
 * @method QuotingRegion findOneOrCreate(PropelPDO $con = null) Return the first QuotingRegion matching the query, or a new QuotingRegion object populated from the query conditions when no match is found
 *
 * @method QuotingRegion findOneByCreatedatetime(string $createDatetime) Return the first QuotingRegion filtered by the createDatetime column
 * @method QuotingRegion findOneByCreatepersonId(int $createPerson_id) Return the first QuotingRegion filtered by the createPerson_id column
 * @method QuotingRegion findOneByModifydatetime(string $modifyDatetime) Return the first QuotingRegion filtered by the modifyDatetime column
 * @method QuotingRegion findOneByModifypersonId(int $modifyPerson_id) Return the first QuotingRegion filtered by the modifyPerson_id column
 * @method QuotingRegion findOneByDeleted(boolean $deleted) Return the first QuotingRegion filtered by the deleted column
 * @method QuotingRegion findOneByMasterId(int $master_id) Return the first QuotingRegion filtered by the master_id column
 * @method QuotingRegion findOneByRegionCode(string $region_code) Return the first QuotingRegion filtered by the region_code column
 * @method QuotingRegion findOneByLimitation(int $limitation) Return the first QuotingRegion filtered by the limitation column
 * @method QuotingRegion findOneByUsed(int $used) Return the first QuotingRegion filtered by the used column
 * @method QuotingRegion findOneByConfirmed(int $confirmed) Return the first QuotingRegion filtered by the confirmed column
 * @method QuotingRegion findOneByInqueue(int $inQueue) Return the first QuotingRegion filtered by the inQueue column
 *
 * @method array findById(int $id) Return QuotingRegion objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return QuotingRegion objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return QuotingRegion objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return QuotingRegion objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return QuotingRegion objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return QuotingRegion objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return QuotingRegion objects filtered by the master_id column
 * @method array findByRegionCode(string $region_code) Return QuotingRegion objects filtered by the region_code column
 * @method array findByLimitation(int $limitation) Return QuotingRegion objects filtered by the limitation column
 * @method array findByUsed(int $used) Return QuotingRegion objects filtered by the used column
 * @method array findByConfirmed(int $confirmed) Return QuotingRegion objects filtered by the confirmed column
 * @method array findByInqueue(int $inQueue) Return QuotingRegion objects filtered by the inQueue column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseQuotingRegionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuotingRegionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\QuotingRegion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuotingRegionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuotingRegionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuotingRegionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuotingRegionQuery) {
            return $criteria;
        }
        $query = new QuotingRegionQuery();
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
     * @return   QuotingRegion|QuotingRegion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuotingRegionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuotingRegionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 QuotingRegion A model object, or null if the key is not found
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
     * @return                 QuotingRegion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `master_id`, `region_code`, `limitation`, `used`, `confirmed`, `inQueue` FROM `Quoting_Region` WHERE `id` = :p0';
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
            $obj = new QuotingRegion();
            $obj->hydrate($row);
            QuotingRegionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return QuotingRegion|QuotingRegion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|QuotingRegion[]|mixed the list of results, formatted by the current formatter
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuotingRegionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuotingRegionPeer::ID, $keys, Criteria::IN);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::ID, $id, $comparison);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(QuotingRegionPeer::DELETED, $deleted, $comparison);
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
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the region_code column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionCode('fooValue');   // WHERE region_code = 'fooValue'
     * $query->filterByRegionCode('%fooValue%'); // WHERE region_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByRegionCode($regionCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionCode)) {
                $regionCode = str_replace('*', '%', $regionCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::REGION_CODE, $regionCode, $comparison);
    }

    /**
     * Filter the query on the limitation column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitation(1234); // WHERE limitation = 1234
     * $query->filterByLimitation(array(12, 34)); // WHERE limitation IN (12, 34)
     * $query->filterByLimitation(array('min' => 12)); // WHERE limitation >= 12
     * $query->filterByLimitation(array('max' => 12)); // WHERE limitation <= 12
     * </code>
     *
     * @param     mixed $limitation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByLimitation($limitation = null, $comparison = null)
    {
        if (is_array($limitation)) {
            $useMinMax = false;
            if (isset($limitation['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::LIMITATION, $limitation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($limitation['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::LIMITATION, $limitation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::LIMITATION, $limitation, $comparison);
    }

    /**
     * Filter the query on the used column
     *
     * Example usage:
     * <code>
     * $query->filterByUsed(1234); // WHERE used = 1234
     * $query->filterByUsed(array(12, 34)); // WHERE used IN (12, 34)
     * $query->filterByUsed(array('min' => 12)); // WHERE used >= 12
     * $query->filterByUsed(array('max' => 12)); // WHERE used <= 12
     * </code>
     *
     * @param     mixed $used The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByUsed($used = null, $comparison = null)
    {
        if (is_array($used)) {
            $useMinMax = false;
            if (isset($used['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::USED, $used['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($used['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::USED, $used['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::USED, $used, $comparison);
    }

    /**
     * Filter the query on the confirmed column
     *
     * Example usage:
     * <code>
     * $query->filterByConfirmed(1234); // WHERE confirmed = 1234
     * $query->filterByConfirmed(array(12, 34)); // WHERE confirmed IN (12, 34)
     * $query->filterByConfirmed(array('min' => 12)); // WHERE confirmed >= 12
     * $query->filterByConfirmed(array('max' => 12)); // WHERE confirmed <= 12
     * </code>
     *
     * @param     mixed $confirmed The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByConfirmed($confirmed = null, $comparison = null)
    {
        if (is_array($confirmed)) {
            $useMinMax = false;
            if (isset($confirmed['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::CONFIRMED, $confirmed['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($confirmed['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::CONFIRMED, $confirmed['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::CONFIRMED, $confirmed, $comparison);
    }

    /**
     * Filter the query on the inQueue column
     *
     * Example usage:
     * <code>
     * $query->filterByInqueue(1234); // WHERE inQueue = 1234
     * $query->filterByInqueue(array(12, 34)); // WHERE inQueue IN (12, 34)
     * $query->filterByInqueue(array('min' => 12)); // WHERE inQueue >= 12
     * $query->filterByInqueue(array('max' => 12)); // WHERE inQueue <= 12
     * </code>
     *
     * @param     mixed $inqueue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function filterByInqueue($inqueue = null, $comparison = null)
    {
        if (is_array($inqueue)) {
            $useMinMax = false;
            if (isset($inqueue['min'])) {
                $this->addUsingAlias(QuotingRegionPeer::INQUEUE, $inqueue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inqueue['max'])) {
                $this->addUsingAlias(QuotingRegionPeer::INQUEUE, $inqueue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingRegionPeer::INQUEUE, $inqueue, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   QuotingRegion $quotingRegion Object to remove from the list of results
     *
     * @return QuotingRegionQuery The current query, for fluid interface
     */
    public function prune($quotingRegion = null)
    {
        if ($quotingRegion) {
            $this->addUsingAlias(QuotingRegionPeer::ID, $quotingRegion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
