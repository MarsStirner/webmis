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
use Webmis\Models\EventLocalcontract;
use Webmis\Models\EventLocalcontractPeer;
use Webmis\Models\EventLocalcontractQuery;

/**
 * Base class that represents a query for the 'Event_LocalContract' table.
 *
 *
 *
 * @method EventLocalcontractQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventLocalcontractQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method EventLocalcontractQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method EventLocalcontractQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method EventLocalcontractQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method EventLocalcontractQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EventLocalcontractQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method EventLocalcontractQuery orderByCoorddate($order = Criteria::ASC) Order by the coordDate column
 * @method EventLocalcontractQuery orderByCoordagent($order = Criteria::ASC) Order by the coordAgent column
 * @method EventLocalcontractQuery orderByCoordinspector($order = Criteria::ASC) Order by the coordInspector column
 * @method EventLocalcontractQuery orderByCoordtext($order = Criteria::ASC) Order by the coordText column
 * @method EventLocalcontractQuery orderByDatecontract($order = Criteria::ASC) Order by the dateContract column
 * @method EventLocalcontractQuery orderByNumbercontract($order = Criteria::ASC) Order by the numberContract column
 * @method EventLocalcontractQuery orderBySumlimit($order = Criteria::ASC) Order by the sumLimit column
 * @method EventLocalcontractQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method EventLocalcontractQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method EventLocalcontractQuery orderByPatrname($order = Criteria::ASC) Order by the patrName column
 * @method EventLocalcontractQuery orderByBirthdate($order = Criteria::ASC) Order by the birthDate column
 * @method EventLocalcontractQuery orderByDocumenttypeId($order = Criteria::ASC) Order by the documentType_id column
 * @method EventLocalcontractQuery orderBySerialleft($order = Criteria::ASC) Order by the serialLeft column
 * @method EventLocalcontractQuery orderBySerialright($order = Criteria::ASC) Order by the serialRight column
 * @method EventLocalcontractQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method EventLocalcontractQuery orderByRegaddress($order = Criteria::ASC) Order by the regAddress column
 * @method EventLocalcontractQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 *
 * @method EventLocalcontractQuery groupById() Group by the id column
 * @method EventLocalcontractQuery groupByCreatedatetime() Group by the createDatetime column
 * @method EventLocalcontractQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method EventLocalcontractQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method EventLocalcontractQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method EventLocalcontractQuery groupByDeleted() Group by the deleted column
 * @method EventLocalcontractQuery groupByMasterId() Group by the master_id column
 * @method EventLocalcontractQuery groupByCoorddate() Group by the coordDate column
 * @method EventLocalcontractQuery groupByCoordagent() Group by the coordAgent column
 * @method EventLocalcontractQuery groupByCoordinspector() Group by the coordInspector column
 * @method EventLocalcontractQuery groupByCoordtext() Group by the coordText column
 * @method EventLocalcontractQuery groupByDatecontract() Group by the dateContract column
 * @method EventLocalcontractQuery groupByNumbercontract() Group by the numberContract column
 * @method EventLocalcontractQuery groupBySumlimit() Group by the sumLimit column
 * @method EventLocalcontractQuery groupByLastname() Group by the lastName column
 * @method EventLocalcontractQuery groupByFirstname() Group by the firstName column
 * @method EventLocalcontractQuery groupByPatrname() Group by the patrName column
 * @method EventLocalcontractQuery groupByBirthdate() Group by the birthDate column
 * @method EventLocalcontractQuery groupByDocumenttypeId() Group by the documentType_id column
 * @method EventLocalcontractQuery groupBySerialleft() Group by the serialLeft column
 * @method EventLocalcontractQuery groupBySerialright() Group by the serialRight column
 * @method EventLocalcontractQuery groupByNumber() Group by the number column
 * @method EventLocalcontractQuery groupByRegaddress() Group by the regAddress column
 * @method EventLocalcontractQuery groupByOrgId() Group by the org_id column
 *
 * @method EventLocalcontractQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventLocalcontractQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventLocalcontractQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventLocalcontract findOne(PropelPDO $con = null) Return the first EventLocalcontract matching the query
 * @method EventLocalcontract findOneOrCreate(PropelPDO $con = null) Return the first EventLocalcontract matching the query, or a new EventLocalcontract object populated from the query conditions when no match is found
 *
 * @method EventLocalcontract findOneByCreatedatetime(string $createDatetime) Return the first EventLocalcontract filtered by the createDatetime column
 * @method EventLocalcontract findOneByCreatepersonId(int $createPerson_id) Return the first EventLocalcontract filtered by the createPerson_id column
 * @method EventLocalcontract findOneByModifydatetime(string $modifyDatetime) Return the first EventLocalcontract filtered by the modifyDatetime column
 * @method EventLocalcontract findOneByModifypersonId(int $modifyPerson_id) Return the first EventLocalcontract filtered by the modifyPerson_id column
 * @method EventLocalcontract findOneByDeleted(boolean $deleted) Return the first EventLocalcontract filtered by the deleted column
 * @method EventLocalcontract findOneByMasterId(int $master_id) Return the first EventLocalcontract filtered by the master_id column
 * @method EventLocalcontract findOneByCoorddate(string $coordDate) Return the first EventLocalcontract filtered by the coordDate column
 * @method EventLocalcontract findOneByCoordagent(string $coordAgent) Return the first EventLocalcontract filtered by the coordAgent column
 * @method EventLocalcontract findOneByCoordinspector(string $coordInspector) Return the first EventLocalcontract filtered by the coordInspector column
 * @method EventLocalcontract findOneByCoordtext(string $coordText) Return the first EventLocalcontract filtered by the coordText column
 * @method EventLocalcontract findOneByDatecontract(string $dateContract) Return the first EventLocalcontract filtered by the dateContract column
 * @method EventLocalcontract findOneByNumbercontract(string $numberContract) Return the first EventLocalcontract filtered by the numberContract column
 * @method EventLocalcontract findOneBySumlimit(double $sumLimit) Return the first EventLocalcontract filtered by the sumLimit column
 * @method EventLocalcontract findOneByLastname(string $lastName) Return the first EventLocalcontract filtered by the lastName column
 * @method EventLocalcontract findOneByFirstname(string $firstName) Return the first EventLocalcontract filtered by the firstName column
 * @method EventLocalcontract findOneByPatrname(string $patrName) Return the first EventLocalcontract filtered by the patrName column
 * @method EventLocalcontract findOneByBirthdate(string $birthDate) Return the first EventLocalcontract filtered by the birthDate column
 * @method EventLocalcontract findOneByDocumenttypeId(int $documentType_id) Return the first EventLocalcontract filtered by the documentType_id column
 * @method EventLocalcontract findOneBySerialleft(string $serialLeft) Return the first EventLocalcontract filtered by the serialLeft column
 * @method EventLocalcontract findOneBySerialright(string $serialRight) Return the first EventLocalcontract filtered by the serialRight column
 * @method EventLocalcontract findOneByNumber(string $number) Return the first EventLocalcontract filtered by the number column
 * @method EventLocalcontract findOneByRegaddress(string $regAddress) Return the first EventLocalcontract filtered by the regAddress column
 * @method EventLocalcontract findOneByOrgId(int $org_id) Return the first EventLocalcontract filtered by the org_id column
 *
 * @method array findById(int $id) Return EventLocalcontract objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return EventLocalcontract objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return EventLocalcontract objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return EventLocalcontract objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return EventLocalcontract objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return EventLocalcontract objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return EventLocalcontract objects filtered by the master_id column
 * @method array findByCoorddate(string $coordDate) Return EventLocalcontract objects filtered by the coordDate column
 * @method array findByCoordagent(string $coordAgent) Return EventLocalcontract objects filtered by the coordAgent column
 * @method array findByCoordinspector(string $coordInspector) Return EventLocalcontract objects filtered by the coordInspector column
 * @method array findByCoordtext(string $coordText) Return EventLocalcontract objects filtered by the coordText column
 * @method array findByDatecontract(string $dateContract) Return EventLocalcontract objects filtered by the dateContract column
 * @method array findByNumbercontract(string $numberContract) Return EventLocalcontract objects filtered by the numberContract column
 * @method array findBySumlimit(double $sumLimit) Return EventLocalcontract objects filtered by the sumLimit column
 * @method array findByLastname(string $lastName) Return EventLocalcontract objects filtered by the lastName column
 * @method array findByFirstname(string $firstName) Return EventLocalcontract objects filtered by the firstName column
 * @method array findByPatrname(string $patrName) Return EventLocalcontract objects filtered by the patrName column
 * @method array findByBirthdate(string $birthDate) Return EventLocalcontract objects filtered by the birthDate column
 * @method array findByDocumenttypeId(int $documentType_id) Return EventLocalcontract objects filtered by the documentType_id column
 * @method array findBySerialleft(string $serialLeft) Return EventLocalcontract objects filtered by the serialLeft column
 * @method array findBySerialright(string $serialRight) Return EventLocalcontract objects filtered by the serialRight column
 * @method array findByNumber(string $number) Return EventLocalcontract objects filtered by the number column
 * @method array findByRegaddress(string $regAddress) Return EventLocalcontract objects filtered by the regAddress column
 * @method array findByOrgId(int $org_id) Return EventLocalcontract objects filtered by the org_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventLocalcontractQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventLocalcontractQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\EventLocalcontract', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventLocalcontractQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventLocalcontractQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventLocalcontractQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventLocalcontractQuery) {
            return $criteria;
        }
        $query = new EventLocalcontractQuery();
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
     * @return   EventLocalcontract|EventLocalcontract[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventLocalcontractPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventLocalcontractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventLocalcontract A model object, or null if the key is not found
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
     * @return                 EventLocalcontract A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `master_id`, `coordDate`, `coordAgent`, `coordInspector`, `coordText`, `dateContract`, `numberContract`, `sumLimit`, `lastName`, `firstName`, `patrName`, `birthDate`, `documentType_id`, `serialLeft`, `serialRight`, `number`, `regAddress`, `org_id` FROM `Event_LocalContract` WHERE `id` = :p0';
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
            $obj = new EventLocalcontract();
            $obj->hydrate($row);
            EventLocalcontractPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventLocalcontract|EventLocalcontract[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventLocalcontract[]|mixed the list of results, formatted by the current formatter
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventLocalcontractPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventLocalcontractPeer::ID, $keys, Criteria::IN);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::ID, $id, $comparison);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventLocalcontractPeer::DELETED, $deleted, $comparison);
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
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the coordDate column
     *
     * Example usage:
     * <code>
     * $query->filterByCoorddate('2011-03-14'); // WHERE coordDate = '2011-03-14'
     * $query->filterByCoorddate('now'); // WHERE coordDate = '2011-03-14'
     * $query->filterByCoorddate(array('max' => 'yesterday')); // WHERE coordDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $coorddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByCoorddate($coorddate = null, $comparison = null)
    {
        if (is_array($coorddate)) {
            $useMinMax = false;
            if (isset($coorddate['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::COORDDATE, $coorddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coorddate['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::COORDDATE, $coorddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::COORDDATE, $coorddate, $comparison);
    }

    /**
     * Filter the query on the coordAgent column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordagent('fooValue');   // WHERE coordAgent = 'fooValue'
     * $query->filterByCoordagent('%fooValue%'); // WHERE coordAgent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordagent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByCoordagent($coordagent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordagent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coordagent)) {
                $coordagent = str_replace('*', '%', $coordagent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::COORDAGENT, $coordagent, $comparison);
    }

    /**
     * Filter the query on the coordInspector column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordinspector('fooValue');   // WHERE coordInspector = 'fooValue'
     * $query->filterByCoordinspector('%fooValue%'); // WHERE coordInspector LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordinspector The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByCoordinspector($coordinspector = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordinspector)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coordinspector)) {
                $coordinspector = str_replace('*', '%', $coordinspector);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::COORDINSPECTOR, $coordinspector, $comparison);
    }

    /**
     * Filter the query on the coordText column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordtext('fooValue');   // WHERE coordText = 'fooValue'
     * $query->filterByCoordtext('%fooValue%'); // WHERE coordText LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordtext The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByCoordtext($coordtext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordtext)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coordtext)) {
                $coordtext = str_replace('*', '%', $coordtext);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::COORDTEXT, $coordtext, $comparison);
    }

    /**
     * Filter the query on the dateContract column
     *
     * Example usage:
     * <code>
     * $query->filterByDatecontract('2011-03-14'); // WHERE dateContract = '2011-03-14'
     * $query->filterByDatecontract('now'); // WHERE dateContract = '2011-03-14'
     * $query->filterByDatecontract(array('max' => 'yesterday')); // WHERE dateContract > '2011-03-13'
     * </code>
     *
     * @param     mixed $datecontract The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByDatecontract($datecontract = null, $comparison = null)
    {
        if (is_array($datecontract)) {
            $useMinMax = false;
            if (isset($datecontract['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::DATECONTRACT, $datecontract['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datecontract['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::DATECONTRACT, $datecontract['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::DATECONTRACT, $datecontract, $comparison);
    }

    /**
     * Filter the query on the numberContract column
     *
     * Example usage:
     * <code>
     * $query->filterByNumbercontract('fooValue');   // WHERE numberContract = 'fooValue'
     * $query->filterByNumbercontract('%fooValue%'); // WHERE numberContract LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numbercontract The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByNumbercontract($numbercontract = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numbercontract)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numbercontract)) {
                $numbercontract = str_replace('*', '%', $numbercontract);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::NUMBERCONTRACT, $numbercontract, $comparison);
    }

    /**
     * Filter the query on the sumLimit column
     *
     * Example usage:
     * <code>
     * $query->filterBySumlimit(1234); // WHERE sumLimit = 1234
     * $query->filterBySumlimit(array(12, 34)); // WHERE sumLimit IN (12, 34)
     * $query->filterBySumlimit(array('min' => 12)); // WHERE sumLimit >= 12
     * $query->filterBySumlimit(array('max' => 12)); // WHERE sumLimit <= 12
     * </code>
     *
     * @param     mixed $sumlimit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterBySumlimit($sumlimit = null, $comparison = null)
    {
        if (is_array($sumlimit)) {
            $useMinMax = false;
            if (isset($sumlimit['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::SUMLIMIT, $sumlimit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumlimit['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::SUMLIMIT, $sumlimit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::SUMLIMIT, $sumlimit, $comparison);
    }

    /**
     * Filter the query on the lastName column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastName = 'fooValue'
     * $query->filterByLastname('%fooValue%'); // WHERE lastName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastname)) {
                $lastname = str_replace('*', '%', $lastname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the firstName column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstName = 'fooValue'
     * $query->filterByFirstname('%fooValue%'); // WHERE firstName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstname)) {
                $firstname = str_replace('*', '%', $firstname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the patrName column
     *
     * Example usage:
     * <code>
     * $query->filterByPatrname('fooValue');   // WHERE patrName = 'fooValue'
     * $query->filterByPatrname('%fooValue%'); // WHERE patrName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $patrname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByPatrname($patrname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($patrname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $patrname)) {
                $patrname = str_replace('*', '%', $patrname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::PATRNAME, $patrname, $comparison);
    }

    /**
     * Filter the query on the birthDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthdate('2011-03-14'); // WHERE birthDate = '2011-03-14'
     * $query->filterByBirthdate('now'); // WHERE birthDate = '2011-03-14'
     * $query->filterByBirthdate(array('max' => 'yesterday')); // WHERE birthDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByBirthdate($birthdate = null, $comparison = null)
    {
        if (is_array($birthdate)) {
            $useMinMax = false;
            if (isset($birthdate['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::BIRTHDATE, $birthdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthdate['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::BIRTHDATE, $birthdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::BIRTHDATE, $birthdate, $comparison);
    }

    /**
     * Filter the query on the documentType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumenttypeId(1234); // WHERE documentType_id = 1234
     * $query->filterByDocumenttypeId(array(12, 34)); // WHERE documentType_id IN (12, 34)
     * $query->filterByDocumenttypeId(array('min' => 12)); // WHERE documentType_id >= 12
     * $query->filterByDocumenttypeId(array('max' => 12)); // WHERE documentType_id <= 12
     * </code>
     *
     * @param     mixed $documenttypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByDocumenttypeId($documenttypeId = null, $comparison = null)
    {
        if (is_array($documenttypeId)) {
            $useMinMax = false;
            if (isset($documenttypeId['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::DOCUMENTTYPE_ID, $documenttypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documenttypeId['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::DOCUMENTTYPE_ID, $documenttypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::DOCUMENTTYPE_ID, $documenttypeId, $comparison);
    }

    /**
     * Filter the query on the serialLeft column
     *
     * Example usage:
     * <code>
     * $query->filterBySerialleft('fooValue');   // WHERE serialLeft = 'fooValue'
     * $query->filterBySerialleft('%fooValue%'); // WHERE serialLeft LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serialleft The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterBySerialleft($serialleft = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serialleft)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serialleft)) {
                $serialleft = str_replace('*', '%', $serialleft);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::SERIALLEFT, $serialleft, $comparison);
    }

    /**
     * Filter the query on the serialRight column
     *
     * Example usage:
     * <code>
     * $query->filterBySerialright('fooValue');   // WHERE serialRight = 'fooValue'
     * $query->filterBySerialright('%fooValue%'); // WHERE serialRight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serialright The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterBySerialright($serialright = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serialright)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serialright)) {
                $serialright = str_replace('*', '%', $serialright);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::SERIALRIGHT, $serialright, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber('fooValue');   // WHERE number = 'fooValue'
     * $query->filterByNumber('%fooValue%'); // WHERE number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $number The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($number)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $number)) {
                $number = str_replace('*', '%', $number);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the regAddress column
     *
     * Example usage:
     * <code>
     * $query->filterByRegaddress('fooValue');   // WHERE regAddress = 'fooValue'
     * $query->filterByRegaddress('%fooValue%'); // WHERE regAddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regaddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByRegaddress($regaddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regaddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regaddress)) {
                $regaddress = str_replace('*', '%', $regaddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::REGADDRESS, $regaddress, $comparison);
    }

    /**
     * Filter the query on the org_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgId(1234); // WHERE org_id = 1234
     * $query->filterByOrgId(array(12, 34)); // WHERE org_id IN (12, 34)
     * $query->filterByOrgId(array('min' => 12)); // WHERE org_id >= 12
     * $query->filterByOrgId(array('max' => 12)); // WHERE org_id <= 12
     * </code>
     *
     * @param     mixed $orgId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function filterByOrgId($orgId = null, $comparison = null)
    {
        if (is_array($orgId)) {
            $useMinMax = false;
            if (isset($orgId['min'])) {
                $this->addUsingAlias(EventLocalcontractPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgId['max'])) {
                $this->addUsingAlias(EventLocalcontractPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventLocalcontractPeer::ORG_ID, $orgId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EventLocalcontract $eventLocalcontract Object to remove from the list of results
     *
     * @return EventLocalcontractQuery The current query, for fluid interface
     */
    public function prune($eventLocalcontract = null)
    {
        if ($eventLocalcontract) {
            $this->addUsingAlias(EventLocalcontractPeer::ID, $eventLocalcontract->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
