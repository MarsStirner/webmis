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
use Webmis\Models\Job;
use Webmis\Models\JobPeer;
use Webmis\Models\JobQuery;

/**
 * Base class that represents a query for the 'Job' table.
 *
 *
 *
 * @method JobQuery orderById($order = Criteria::ASC) Order by the id column
 * @method JobQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method JobQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method JobQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method JobQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method JobQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method JobQuery orderByJobtypeId($order = Criteria::ASC) Order by the jobType_id column
 * @method JobQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method JobQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method JobQuery orderByBegtime($order = Criteria::ASC) Order by the begTime column
 * @method JobQuery orderByEndtime($order = Criteria::ASC) Order by the endTime column
 * @method JobQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 *
 * @method JobQuery groupById() Group by the id column
 * @method JobQuery groupByCreatedatetime() Group by the createDatetime column
 * @method JobQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method JobQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method JobQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method JobQuery groupByDeleted() Group by the deleted column
 * @method JobQuery groupByJobtypeId() Group by the jobType_id column
 * @method JobQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method JobQuery groupByDate() Group by the date column
 * @method JobQuery groupByBegtime() Group by the begTime column
 * @method JobQuery groupByEndtime() Group by the endTime column
 * @method JobQuery groupByQuantity() Group by the quantity column
 *
 * @method JobQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JobQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JobQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Job findOne(PropelPDO $con = null) Return the first Job matching the query
 * @method Job findOneOrCreate(PropelPDO $con = null) Return the first Job matching the query, or a new Job object populated from the query conditions when no match is found
 *
 * @method Job findOneByCreatedatetime(string $createDatetime) Return the first Job filtered by the createDatetime column
 * @method Job findOneByCreatepersonId(int $createPerson_id) Return the first Job filtered by the createPerson_id column
 * @method Job findOneByModifydatetime(string $modifyDatetime) Return the first Job filtered by the modifyDatetime column
 * @method Job findOneByModifypersonId(int $modifyPerson_id) Return the first Job filtered by the modifyPerson_id column
 * @method Job findOneByDeleted(boolean $deleted) Return the first Job filtered by the deleted column
 * @method Job findOneByJobtypeId(int $jobType_id) Return the first Job filtered by the jobType_id column
 * @method Job findOneByOrgstructureId(int $orgStructure_id) Return the first Job filtered by the orgStructure_id column
 * @method Job findOneByDate(string $date) Return the first Job filtered by the date column
 * @method Job findOneByBegtime(string $begTime) Return the first Job filtered by the begTime column
 * @method Job findOneByEndtime(string $endTime) Return the first Job filtered by the endTime column
 * @method Job findOneByQuantity(int $quantity) Return the first Job filtered by the quantity column
 *
 * @method array findById(int $id) Return Job objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Job objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Job objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Job objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Job objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Job objects filtered by the deleted column
 * @method array findByJobtypeId(int $jobType_id) Return Job objects filtered by the jobType_id column
 * @method array findByOrgstructureId(int $orgStructure_id) Return Job objects filtered by the orgStructure_id column
 * @method array findByDate(string $date) Return Job objects filtered by the date column
 * @method array findByBegtime(string $begTime) Return Job objects filtered by the begTime column
 * @method array findByEndtime(string $endTime) Return Job objects filtered by the endTime column
 * @method array findByQuantity(int $quantity) Return Job objects filtered by the quantity column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseJobQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJobQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Job', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JobQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JobQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JobQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JobQuery) {
            return $criteria;
        }
        $query = new JobQuery();
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
     * @return   Job|Job[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JobPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JobPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Job A model object, or null if the key is not found
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
     * @return                 Job A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `jobType_id`, `orgStructure_id`, `date`, `begTime`, `endTime`, `quantity` FROM `Job` WHERE `id` = :p0';
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
            $obj = new Job();
            $obj->hydrate($row);
            JobPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Job|Job[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Job[]|mixed the list of results, formatted by the current formatter
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JobPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JobPeer::ID, $keys, Criteria::IN);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(JobPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(JobPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::ID, $id, $comparison);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(JobPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(JobPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(JobPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(JobPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(JobPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(JobPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(JobPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(JobPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(JobPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the jobType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJobtypeId(1234); // WHERE jobType_id = 1234
     * $query->filterByJobtypeId(array(12, 34)); // WHERE jobType_id IN (12, 34)
     * $query->filterByJobtypeId(array('min' => 12)); // WHERE jobType_id >= 12
     * $query->filterByJobtypeId(array('max' => 12)); // WHERE jobType_id <= 12
     * </code>
     *
     * @param     mixed $jobtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByJobtypeId($jobtypeId = null, $comparison = null)
    {
        if (is_array($jobtypeId)) {
            $useMinMax = false;
            if (isset($jobtypeId['min'])) {
                $this->addUsingAlias(JobPeer::JOBTYPE_ID, $jobtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jobtypeId['max'])) {
                $this->addUsingAlias(JobPeer::JOBTYPE_ID, $jobtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::JOBTYPE_ID, $jobtypeId, $comparison);
    }

    /**
     * Filter the query on the orgStructure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgstructureId(1234); // WHERE orgStructure_id = 1234
     * $query->filterByOrgstructureId(array(12, 34)); // WHERE orgStructure_id IN (12, 34)
     * $query->filterByOrgstructureId(array('min' => 12)); // WHERE orgStructure_id >= 12
     * $query->filterByOrgstructureId(array('max' => 12)); // WHERE orgStructure_id <= 12
     * </code>
     *
     * @param     mixed $orgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(JobPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(JobPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
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
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(JobPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(JobPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the begTime column
     *
     * Example usage:
     * <code>
     * $query->filterByBegtime('2011-03-14'); // WHERE begTime = '2011-03-14'
     * $query->filterByBegtime('now'); // WHERE begTime = '2011-03-14'
     * $query->filterByBegtime(array('max' => 'yesterday')); // WHERE begTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $begtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByBegtime($begtime = null, $comparison = null)
    {
        if (is_array($begtime)) {
            $useMinMax = false;
            if (isset($begtime['min'])) {
                $this->addUsingAlias(JobPeer::BEGTIME, $begtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begtime['max'])) {
                $this->addUsingAlias(JobPeer::BEGTIME, $begtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::BEGTIME, $begtime, $comparison);
    }

    /**
     * Filter the query on the endTime column
     *
     * Example usage:
     * <code>
     * $query->filterByEndtime('2011-03-14'); // WHERE endTime = '2011-03-14'
     * $query->filterByEndtime('now'); // WHERE endTime = '2011-03-14'
     * $query->filterByEndtime(array('max' => 'yesterday')); // WHERE endTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $endtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByEndtime($endtime = null, $comparison = null)
    {
        if (is_array($endtime)) {
            $useMinMax = false;
            if (isset($endtime['min'])) {
                $this->addUsingAlias(JobPeer::ENDTIME, $endtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endtime['max'])) {
                $this->addUsingAlias(JobPeer::ENDTIME, $endtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::ENDTIME, $endtime, $comparison);
    }

    /**
     * Filter the query on the quantity column
     *
     * Example usage:
     * <code>
     * $query->filterByQuantity(1234); // WHERE quantity = 1234
     * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
     * $query->filterByQuantity(array('min' => 12)); // WHERE quantity >= 12
     * $query->filterByQuantity(array('max' => 12)); // WHERE quantity <= 12
     * </code>
     *
     * @param     mixed $quantity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function filterByQuantity($quantity = null, $comparison = null)
    {
        if (is_array($quantity)) {
            $useMinMax = false;
            if (isset($quantity['min'])) {
                $this->addUsingAlias(JobPeer::QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quantity['max'])) {
                $this->addUsingAlias(JobPeer::QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JobPeer::QUANTITY, $quantity, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Job $job Object to remove from the list of results
     *
     * @return JobQuery The current query, for fluid interface
     */
    public function prune($job = null)
    {
        if ($job) {
            $this->addUsingAlias(JobPeer::ID, $job->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
