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
use Webmis\Models\Quotingbytime;
use Webmis\Models\QuotingbytimePeer;
use Webmis\Models\QuotingbytimeQuery;

/**
 * Base class that represents a query for the 'QuotingByTime' table.
 *
 *
 *
 * @method QuotingbytimeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method QuotingbytimeQuery orderByDoctorId($order = Criteria::ASC) Order by the doctor_id column
 * @method QuotingbytimeQuery orderByQuotingDate($order = Criteria::ASC) Order by the quoting_date column
 * @method QuotingbytimeQuery orderByQuotingtimestart($order = Criteria::ASC) Order by the QuotingTimeStart column
 * @method QuotingbytimeQuery orderByQuotingtimeend($order = Criteria::ASC) Order by the QuotingTimeEnd column
 * @method QuotingbytimeQuery orderByQuotingtype($order = Criteria::ASC) Order by the QuotingType column
 *
 * @method QuotingbytimeQuery groupById() Group by the id column
 * @method QuotingbytimeQuery groupByDoctorId() Group by the doctor_id column
 * @method QuotingbytimeQuery groupByQuotingDate() Group by the quoting_date column
 * @method QuotingbytimeQuery groupByQuotingtimestart() Group by the QuotingTimeStart column
 * @method QuotingbytimeQuery groupByQuotingtimeend() Group by the QuotingTimeEnd column
 * @method QuotingbytimeQuery groupByQuotingtype() Group by the QuotingType column
 *
 * @method QuotingbytimeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuotingbytimeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuotingbytimeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Quotingbytime findOne(PropelPDO $con = null) Return the first Quotingbytime matching the query
 * @method Quotingbytime findOneOrCreate(PropelPDO $con = null) Return the first Quotingbytime matching the query, or a new Quotingbytime object populated from the query conditions when no match is found
 *
 * @method Quotingbytime findOneByDoctorId(int $doctor_id) Return the first Quotingbytime filtered by the doctor_id column
 * @method Quotingbytime findOneByQuotingDate(string $quoting_date) Return the first Quotingbytime filtered by the quoting_date column
 * @method Quotingbytime findOneByQuotingtimestart(string $QuotingTimeStart) Return the first Quotingbytime filtered by the QuotingTimeStart column
 * @method Quotingbytime findOneByQuotingtimeend(string $QuotingTimeEnd) Return the first Quotingbytime filtered by the QuotingTimeEnd column
 * @method Quotingbytime findOneByQuotingtype(int $QuotingType) Return the first Quotingbytime filtered by the QuotingType column
 *
 * @method array findById(int $id) Return Quotingbytime objects filtered by the id column
 * @method array findByDoctorId(int $doctor_id) Return Quotingbytime objects filtered by the doctor_id column
 * @method array findByQuotingDate(string $quoting_date) Return Quotingbytime objects filtered by the quoting_date column
 * @method array findByQuotingtimestart(string $QuotingTimeStart) Return Quotingbytime objects filtered by the QuotingTimeStart column
 * @method array findByQuotingtimeend(string $QuotingTimeEnd) Return Quotingbytime objects filtered by the QuotingTimeEnd column
 * @method array findByQuotingtype(int $QuotingType) Return Quotingbytime objects filtered by the QuotingType column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseQuotingbytimeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuotingbytimeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Quotingbytime', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuotingbytimeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuotingbytimeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuotingbytimeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuotingbytimeQuery) {
            return $criteria;
        }
        $query = new QuotingbytimeQuery();
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
     * @return   Quotingbytime|Quotingbytime[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuotingbytimePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuotingbytimePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quotingbytime A model object, or null if the key is not found
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
     * @return                 Quotingbytime A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `doctor_id`, `quoting_date`, `QuotingTimeStart`, `QuotingTimeEnd`, `QuotingType` FROM `QuotingByTime` WHERE `id` = :p0';
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
            $obj = new Quotingbytime();
            $obj->hydrate($row);
            QuotingbytimePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quotingbytime|Quotingbytime[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quotingbytime[]|mixed the list of results, formatted by the current formatter
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
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuotingbytimePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuotingbytimePeer::ID, $keys, Criteria::IN);
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
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(QuotingbytimePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(QuotingbytimePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbytimePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the doctor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDoctorId(1234); // WHERE doctor_id = 1234
     * $query->filterByDoctorId(array(12, 34)); // WHERE doctor_id IN (12, 34)
     * $query->filterByDoctorId(array('min' => 12)); // WHERE doctor_id >= 12
     * $query->filterByDoctorId(array('max' => 12)); // WHERE doctor_id <= 12
     * </code>
     *
     * @param     mixed $doctorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByDoctorId($doctorId = null, $comparison = null)
    {
        if (is_array($doctorId)) {
            $useMinMax = false;
            if (isset($doctorId['min'])) {
                $this->addUsingAlias(QuotingbytimePeer::DOCTOR_ID, $doctorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doctorId['max'])) {
                $this->addUsingAlias(QuotingbytimePeer::DOCTOR_ID, $doctorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbytimePeer::DOCTOR_ID, $doctorId, $comparison);
    }

    /**
     * Filter the query on the quoting_date column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotingDate('2011-03-14'); // WHERE quoting_date = '2011-03-14'
     * $query->filterByQuotingDate('now'); // WHERE quoting_date = '2011-03-14'
     * $query->filterByQuotingDate(array('max' => 'yesterday')); // WHERE quoting_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $quotingDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByQuotingDate($quotingDate = null, $comparison = null)
    {
        if (is_array($quotingDate)) {
            $useMinMax = false;
            if (isset($quotingDate['min'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTING_DATE, $quotingDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotingDate['max'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTING_DATE, $quotingDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbytimePeer::QUOTING_DATE, $quotingDate, $comparison);
    }

    /**
     * Filter the query on the QuotingTimeStart column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotingtimestart('2011-03-14'); // WHERE QuotingTimeStart = '2011-03-14'
     * $query->filterByQuotingtimestart('now'); // WHERE QuotingTimeStart = '2011-03-14'
     * $query->filterByQuotingtimestart(array('max' => 'yesterday')); // WHERE QuotingTimeStart > '2011-03-13'
     * </code>
     *
     * @param     mixed $quotingtimestart The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByQuotingtimestart($quotingtimestart = null, $comparison = null)
    {
        if (is_array($quotingtimestart)) {
            $useMinMax = false;
            if (isset($quotingtimestart['min'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTINGTIMESTART, $quotingtimestart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotingtimestart['max'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTINGTIMESTART, $quotingtimestart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbytimePeer::QUOTINGTIMESTART, $quotingtimestart, $comparison);
    }

    /**
     * Filter the query on the QuotingTimeEnd column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotingtimeend('2011-03-14'); // WHERE QuotingTimeEnd = '2011-03-14'
     * $query->filterByQuotingtimeend('now'); // WHERE QuotingTimeEnd = '2011-03-14'
     * $query->filterByQuotingtimeend(array('max' => 'yesterday')); // WHERE QuotingTimeEnd > '2011-03-13'
     * </code>
     *
     * @param     mixed $quotingtimeend The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByQuotingtimeend($quotingtimeend = null, $comparison = null)
    {
        if (is_array($quotingtimeend)) {
            $useMinMax = false;
            if (isset($quotingtimeend['min'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTINGTIMEEND, $quotingtimeend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotingtimeend['max'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTINGTIMEEND, $quotingtimeend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbytimePeer::QUOTINGTIMEEND, $quotingtimeend, $comparison);
    }

    /**
     * Filter the query on the QuotingType column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotingtype(1234); // WHERE QuotingType = 1234
     * $query->filterByQuotingtype(array(12, 34)); // WHERE QuotingType IN (12, 34)
     * $query->filterByQuotingtype(array('min' => 12)); // WHERE QuotingType >= 12
     * $query->filterByQuotingtype(array('max' => 12)); // WHERE QuotingType <= 12
     * </code>
     *
     * @param     mixed $quotingtype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function filterByQuotingtype($quotingtype = null, $comparison = null)
    {
        if (is_array($quotingtype)) {
            $useMinMax = false;
            if (isset($quotingtype['min'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTINGTYPE, $quotingtype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotingtype['max'])) {
                $this->addUsingAlias(QuotingbytimePeer::QUOTINGTYPE, $quotingtype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbytimePeer::QUOTINGTYPE, $quotingtype, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Quotingbytime $quotingbytime Object to remove from the list of results
     *
     * @return QuotingbytimeQuery The current query, for fluid interface
     */
    public function prune($quotingbytime = null)
    {
        if ($quotingbytime) {
            $this->addUsingAlias(QuotingbytimePeer::ID, $quotingbytime->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
