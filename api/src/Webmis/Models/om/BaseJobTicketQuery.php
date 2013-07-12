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
use Webmis\Models\JobTicket;
use Webmis\Models\JobTicketPeer;
use Webmis\Models\JobTicketQuery;

/**
 * Base class that represents a query for the 'Job_Ticket' table.
 *
 *
 *
 * @method JobTicketQuery orderById($order = Criteria::ASC) Order by the id column
 * @method JobTicketQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method JobTicketQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method JobTicketQuery orderByDatetime($order = Criteria::ASC) Order by the datetime column
 * @method JobTicketQuery orderByRestimestamp($order = Criteria::ASC) Order by the resTimestamp column
 * @method JobTicketQuery orderByResconnectionid($order = Criteria::ASC) Order by the resConnectionId column
 * @method JobTicketQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method JobTicketQuery orderByBegdatetime($order = Criteria::ASC) Order by the begDateTime column
 * @method JobTicketQuery orderByEnddatetime($order = Criteria::ASC) Order by the endDateTime column
 * @method JobTicketQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method JobTicketQuery orderByNote($order = Criteria::ASC) Order by the note column
 *
 * @method JobTicketQuery groupById() Group by the id column
 * @method JobTicketQuery groupByMasterId() Group by the master_id column
 * @method JobTicketQuery groupByIdx() Group by the idx column
 * @method JobTicketQuery groupByDatetime() Group by the datetime column
 * @method JobTicketQuery groupByRestimestamp() Group by the resTimestamp column
 * @method JobTicketQuery groupByResconnectionid() Group by the resConnectionId column
 * @method JobTicketQuery groupByStatus() Group by the status column
 * @method JobTicketQuery groupByBegdatetime() Group by the begDateTime column
 * @method JobTicketQuery groupByEnddatetime() Group by the endDateTime column
 * @method JobTicketQuery groupByLabel() Group by the label column
 * @method JobTicketQuery groupByNote() Group by the note column
 *
 * @method JobTicketQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JobTicketQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JobTicketQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JobTicket findOne(PropelPDO $con = null) Return the first JobTicket matching the query
 * @method JobTicket findOneOrCreate(PropelPDO $con = null) Return the first JobTicket matching the query, or a new JobTicket object populated from the query conditions when no match is found
 *
 * @method JobTicket findOneByMasterId(int $master_id) Return the first JobTicket filtered by the master_id column
 * @method JobTicket findOneByIdx(int $idx) Return the first JobTicket filtered by the idx column
 * @method JobTicket findOneByDatetime(string $datetime) Return the first JobTicket filtered by the datetime column
 * @method JobTicket findOneByRestimestamp(string $resTimestamp) Return the first JobTicket filtered by the resTimestamp column
 * @method JobTicket findOneByResconnectionid(int $resConnectionId) Return the first JobTicket filtered by the resConnectionId column
 * @method JobTicket findOneByStatus(boolean $status) Return the first JobTicket filtered by the status column
 * @method JobTicket findOneByBegdatetime(string $begDateTime) Return the first JobTicket filtered by the begDateTime column
 * @method JobTicket findOneByEnddatetime(string $endDateTime) Return the first JobTicket filtered by the endDateTime column
 * @method JobTicket findOneByLabel(string $label) Return the first JobTicket filtered by the label column
 * @method JobTicket findOneByNote(string $note) Return the first JobTicket filtered by the note column
 *
 * @method array findById(int $id) Return JobTicket objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return JobTicket objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return JobTicket objects filtered by the idx column
 * @method array findByDatetime(string $datetime) Return JobTicket objects filtered by the datetime column
 * @method array findByRestimestamp(string $resTimestamp) Return JobTicket objects filtered by the resTimestamp column
 * @method array findByResconnectionid(int $resConnectionId) Return JobTicket objects filtered by the resConnectionId column
 * @method array findByStatus(boolean $status) Return JobTicket objects filtered by the status column
 * @method array findByBegdatetime(string $begDateTime) Return JobTicket objects filtered by the begDateTime column
 * @method array findByEnddatetime(string $endDateTime) Return JobTicket objects filtered by the endDateTime column
 * @method array findByLabel(string $label) Return JobTicket objects filtered by the label column
 * @method array findByNote(string $note) Return JobTicket objects filtered by the note column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseJobTicketQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJobTicketQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\JobTicket', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JobTicketQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JobTicketQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JobTicketQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JobTicketQuery) {
            return $criteria;
        }
        $query = new JobTicketQuery();
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
     * @return   JobTicket|JobTicket[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JobTicketPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JobTicketPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JobTicket A model object, or null if the key is not found
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
     * @return                 JobTicket A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `datetime`, `resTimestamp`, `resConnectionId`, `status`, `begDateTime`, `endDateTime`, `label`, `note` FROM `Job_Ticket` WHERE `id` = :p0';
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
            $obj = new JobTicket();
            $obj->hydrate($row);
            JobTicketPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JobTicket|JobTicket[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JobTicket[]|mixed the list of results, formatted by the current formatter
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
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JobTicketPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JobTicketPeer::ID, $keys, Criteria::IN);
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
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(JobTicketPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(JobTicketPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::ID, $id, $comparison);
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
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(JobTicketPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(JobTicketPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the idx column
     *
     * Example usage:
     * <code>
     * $query->filterByIdx(1234); // WHERE idx = 1234
     * $query->filterByIdx(array(12, 34)); // WHERE idx IN (12, 34)
     * $query->filterByIdx(array('min' => 12)); // WHERE idx >= 12
     * $query->filterByIdx(array('max' => 12)); // WHERE idx <= 12
     * </code>
     *
     * @param     mixed $idx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(JobTicketPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(JobTicketPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the datetime column
     *
     * Example usage:
     * <code>
     * $query->filterByDatetime('2011-03-14'); // WHERE datetime = '2011-03-14'
     * $query->filterByDatetime('now'); // WHERE datetime = '2011-03-14'
     * $query->filterByDatetime(array('max' => 'yesterday')); // WHERE datetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $datetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByDatetime($datetime = null, $comparison = null)
    {
        if (is_array($datetime)) {
            $useMinMax = false;
            if (isset($datetime['min'])) {
                $this->addUsingAlias(JobTicketPeer::DATETIME, $datetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datetime['max'])) {
                $this->addUsingAlias(JobTicketPeer::DATETIME, $datetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::DATETIME, $datetime, $comparison);
    }

    /**
     * Filter the query on the resTimestamp column
     *
     * Example usage:
     * <code>
     * $query->filterByRestimestamp('2011-03-14'); // WHERE resTimestamp = '2011-03-14'
     * $query->filterByRestimestamp('now'); // WHERE resTimestamp = '2011-03-14'
     * $query->filterByRestimestamp(array('max' => 'yesterday')); // WHERE resTimestamp > '2011-03-13'
     * </code>
     *
     * @param     mixed $restimestamp The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByRestimestamp($restimestamp = null, $comparison = null)
    {
        if (is_array($restimestamp)) {
            $useMinMax = false;
            if (isset($restimestamp['min'])) {
                $this->addUsingAlias(JobTicketPeer::RESTIMESTAMP, $restimestamp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restimestamp['max'])) {
                $this->addUsingAlias(JobTicketPeer::RESTIMESTAMP, $restimestamp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::RESTIMESTAMP, $restimestamp, $comparison);
    }

    /**
     * Filter the query on the resConnectionId column
     *
     * Example usage:
     * <code>
     * $query->filterByResconnectionid(1234); // WHERE resConnectionId = 1234
     * $query->filterByResconnectionid(array(12, 34)); // WHERE resConnectionId IN (12, 34)
     * $query->filterByResconnectionid(array('min' => 12)); // WHERE resConnectionId >= 12
     * $query->filterByResconnectionid(array('max' => 12)); // WHERE resConnectionId <= 12
     * </code>
     *
     * @param     mixed $resconnectionid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByResconnectionid($resconnectionid = null, $comparison = null)
    {
        if (is_array($resconnectionid)) {
            $useMinMax = false;
            if (isset($resconnectionid['min'])) {
                $this->addUsingAlias(JobTicketPeer::RESCONNECTIONID, $resconnectionid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($resconnectionid['max'])) {
                $this->addUsingAlias(JobTicketPeer::RESCONNECTIONID, $resconnectionid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::RESCONNECTIONID, $resconnectionid, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(true); // WHERE status = true
     * $query->filterByStatus('yes'); // WHERE status = true
     * </code>
     *
     * @param     boolean|string $status The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_string($status)) {
            $status = in_array(strtolower($status), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(JobTicketPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the begDateTime column
     *
     * Example usage:
     * <code>
     * $query->filterByBegdatetime('2011-03-14'); // WHERE begDateTime = '2011-03-14'
     * $query->filterByBegdatetime('now'); // WHERE begDateTime = '2011-03-14'
     * $query->filterByBegdatetime(array('max' => 'yesterday')); // WHERE begDateTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $begdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByBegdatetime($begdatetime = null, $comparison = null)
    {
        if (is_array($begdatetime)) {
            $useMinMax = false;
            if (isset($begdatetime['min'])) {
                $this->addUsingAlias(JobTicketPeer::BEGDATETIME, $begdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdatetime['max'])) {
                $this->addUsingAlias(JobTicketPeer::BEGDATETIME, $begdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::BEGDATETIME, $begdatetime, $comparison);
    }

    /**
     * Filter the query on the endDateTime column
     *
     * Example usage:
     * <code>
     * $query->filterByEnddatetime('2011-03-14'); // WHERE endDateTime = '2011-03-14'
     * $query->filterByEnddatetime('now'); // WHERE endDateTime = '2011-03-14'
     * $query->filterByEnddatetime(array('max' => 'yesterday')); // WHERE endDateTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $enddatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByEnddatetime($enddatetime = null, $comparison = null)
    {
        if (is_array($enddatetime)) {
            $useMinMax = false;
            if (isset($enddatetime['min'])) {
                $this->addUsingAlias(JobTicketPeer::ENDDATETIME, $enddatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddatetime['max'])) {
                $this->addUsingAlias(JobTicketPeer::ENDDATETIME, $enddatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::ENDDATETIME, $enddatetime, $comparison);
    }

    /**
     * Filter the query on the label column
     *
     * Example usage:
     * <code>
     * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
     * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $label The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByLabel($label = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($label)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $label)) {
                $label = str_replace('*', '%', $label);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::LABEL, $label, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JobTicketPeer::NOTE, $note, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   JobTicket $jobTicket Object to remove from the list of results
     *
     * @return JobTicketQuery The current query, for fluid interface
     */
    public function prune($jobTicket = null)
    {
        if ($jobTicket) {
            $this->addUsingAlias(JobTicketPeer::ID, $jobTicket->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
