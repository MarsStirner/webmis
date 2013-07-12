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
use Webmis\Models\Calendarexceptions;
use Webmis\Models\CalendarexceptionsPeer;
use Webmis\Models\CalendarexceptionsQuery;

/**
 * Base class that represents a query for the 'CalendarExceptions' table.
 *
 *
 *
 * @method CalendarexceptionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CalendarexceptionsQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method CalendarexceptionsQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method CalendarexceptionsQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method CalendarexceptionsQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method CalendarexceptionsQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method CalendarexceptionsQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method CalendarexceptionsQuery orderByIsholiday($order = Criteria::ASC) Order by the isHoliday column
 * @method CalendarexceptionsQuery orderByStartyear($order = Criteria::ASC) Order by the startYear column
 * @method CalendarexceptionsQuery orderByFinishyear($order = Criteria::ASC) Order by the finishYear column
 * @method CalendarexceptionsQuery orderByFromdate($order = Criteria::ASC) Order by the fromDate column
 * @method CalendarexceptionsQuery orderByText($order = Criteria::ASC) Order by the text column
 *
 * @method CalendarexceptionsQuery groupById() Group by the id column
 * @method CalendarexceptionsQuery groupByCreatedatetime() Group by the createDatetime column
 * @method CalendarexceptionsQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method CalendarexceptionsQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method CalendarexceptionsQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method CalendarexceptionsQuery groupByDeleted() Group by the deleted column
 * @method CalendarexceptionsQuery groupByDate() Group by the date column
 * @method CalendarexceptionsQuery groupByIsholiday() Group by the isHoliday column
 * @method CalendarexceptionsQuery groupByStartyear() Group by the startYear column
 * @method CalendarexceptionsQuery groupByFinishyear() Group by the finishYear column
 * @method CalendarexceptionsQuery groupByFromdate() Group by the fromDate column
 * @method CalendarexceptionsQuery groupByText() Group by the text column
 *
 * @method CalendarexceptionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CalendarexceptionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CalendarexceptionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Calendarexceptions findOne(PropelPDO $con = null) Return the first Calendarexceptions matching the query
 * @method Calendarexceptions findOneOrCreate(PropelPDO $con = null) Return the first Calendarexceptions matching the query, or a new Calendarexceptions object populated from the query conditions when no match is found
 *
 * @method Calendarexceptions findOneByCreatedatetime(string $createDatetime) Return the first Calendarexceptions filtered by the createDatetime column
 * @method Calendarexceptions findOneByCreatepersonId(int $createPerson_id) Return the first Calendarexceptions filtered by the createPerson_id column
 * @method Calendarexceptions findOneByModifydatetime(string $modifyDatetime) Return the first Calendarexceptions filtered by the modifyDatetime column
 * @method Calendarexceptions findOneByModifypersonId(int $modifyPerson_id) Return the first Calendarexceptions filtered by the modifyPerson_id column
 * @method Calendarexceptions findOneByDeleted(boolean $deleted) Return the first Calendarexceptions filtered by the deleted column
 * @method Calendarexceptions findOneByDate(string $date) Return the first Calendarexceptions filtered by the date column
 * @method Calendarexceptions findOneByIsholiday(boolean $isHoliday) Return the first Calendarexceptions filtered by the isHoliday column
 * @method Calendarexceptions findOneByStartyear(int $startYear) Return the first Calendarexceptions filtered by the startYear column
 * @method Calendarexceptions findOneByFinishyear(int $finishYear) Return the first Calendarexceptions filtered by the finishYear column
 * @method Calendarexceptions findOneByFromdate(string $fromDate) Return the first Calendarexceptions filtered by the fromDate column
 * @method Calendarexceptions findOneByText(string $text) Return the first Calendarexceptions filtered by the text column
 *
 * @method array findById(int $id) Return Calendarexceptions objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Calendarexceptions objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Calendarexceptions objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Calendarexceptions objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Calendarexceptions objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Calendarexceptions objects filtered by the deleted column
 * @method array findByDate(string $date) Return Calendarexceptions objects filtered by the date column
 * @method array findByIsholiday(boolean $isHoliday) Return Calendarexceptions objects filtered by the isHoliday column
 * @method array findByStartyear(int $startYear) Return Calendarexceptions objects filtered by the startYear column
 * @method array findByFinishyear(int $finishYear) Return Calendarexceptions objects filtered by the finishYear column
 * @method array findByFromdate(string $fromDate) Return Calendarexceptions objects filtered by the fromDate column
 * @method array findByText(string $text) Return Calendarexceptions objects filtered by the text column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseCalendarexceptionsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCalendarexceptionsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Calendarexceptions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CalendarexceptionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CalendarexceptionsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CalendarexceptionsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CalendarexceptionsQuery) {
            return $criteria;
        }
        $query = new CalendarexceptionsQuery();
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
     * @return   Calendarexceptions|Calendarexceptions[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CalendarexceptionsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CalendarexceptionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Calendarexceptions A model object, or null if the key is not found
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
     * @return                 Calendarexceptions A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `date`, `isHoliday`, `startYear`, `finishYear`, `fromDate`, `text` FROM `CalendarExceptions` WHERE `id` = :p0';
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
            $obj = new Calendarexceptions();
            $obj->hydrate($row);
            CalendarexceptionsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Calendarexceptions|Calendarexceptions[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Calendarexceptions[]|mixed the list of results, formatted by the current formatter
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CalendarexceptionsPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CalendarexceptionsPeer::ID, $keys, Criteria::IN);
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::ID, $id, $comparison);
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the isHoliday column
     *
     * Example usage:
     * <code>
     * $query->filterByIsholiday(true); // WHERE isHoliday = true
     * $query->filterByIsholiday('yes'); // WHERE isHoliday = true
     * </code>
     *
     * @param     boolean|string $isholiday The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByIsholiday($isholiday = null, $comparison = null)
    {
        if (is_string($isholiday)) {
            $isholiday = in_array(strtolower($isholiday), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::ISHOLIDAY, $isholiday, $comparison);
    }

    /**
     * Filter the query on the startYear column
     *
     * Example usage:
     * <code>
     * $query->filterByStartyear(1234); // WHERE startYear = 1234
     * $query->filterByStartyear(array(12, 34)); // WHERE startYear IN (12, 34)
     * $query->filterByStartyear(array('min' => 12)); // WHERE startYear >= 12
     * $query->filterByStartyear(array('max' => 12)); // WHERE startYear <= 12
     * </code>
     *
     * @param     mixed $startyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByStartyear($startyear = null, $comparison = null)
    {
        if (is_array($startyear)) {
            $useMinMax = false;
            if (isset($startyear['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::STARTYEAR, $startyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startyear['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::STARTYEAR, $startyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::STARTYEAR, $startyear, $comparison);
    }

    /**
     * Filter the query on the finishYear column
     *
     * Example usage:
     * <code>
     * $query->filterByFinishyear(1234); // WHERE finishYear = 1234
     * $query->filterByFinishyear(array(12, 34)); // WHERE finishYear IN (12, 34)
     * $query->filterByFinishyear(array('min' => 12)); // WHERE finishYear >= 12
     * $query->filterByFinishyear(array('max' => 12)); // WHERE finishYear <= 12
     * </code>
     *
     * @param     mixed $finishyear The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByFinishyear($finishyear = null, $comparison = null)
    {
        if (is_array($finishyear)) {
            $useMinMax = false;
            if (isset($finishyear['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::FINISHYEAR, $finishyear['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($finishyear['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::FINISHYEAR, $finishyear['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::FINISHYEAR, $finishyear, $comparison);
    }

    /**
     * Filter the query on the fromDate column
     *
     * Example usage:
     * <code>
     * $query->filterByFromdate('2011-03-14'); // WHERE fromDate = '2011-03-14'
     * $query->filterByFromdate('now'); // WHERE fromDate = '2011-03-14'
     * $query->filterByFromdate(array('max' => 'yesterday')); // WHERE fromDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $fromdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByFromdate($fromdate = null, $comparison = null)
    {
        if (is_array($fromdate)) {
            $useMinMax = false;
            if (isset($fromdate['min'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::FROMDATE, $fromdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromdate['max'])) {
                $this->addUsingAlias(CalendarexceptionsPeer::FROMDATE, $fromdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::FROMDATE, $fromdate, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $text)) {
                $text = str_replace('*', '%', $text);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CalendarexceptionsPeer::TEXT, $text, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Calendarexceptions $calendarexceptions Object to remove from the list of results
     *
     * @return CalendarexceptionsQuery The current query, for fluid interface
     */
    public function prune($calendarexceptions = null)
    {
        if ($calendarexceptions) {
            $this->addUsingAlias(CalendarexceptionsPeer::ID, $calendarexceptions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
