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
use Webmis\Models\ContractSpecification;
use Webmis\Models\ContractSpecificationPeer;
use Webmis\Models\ContractSpecificationQuery;

/**
 * Base class that represents a query for the 'Contract_Specification' table.
 *
 *
 *
 * @method ContractSpecificationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContractSpecificationQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ContractSpecificationQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ContractSpecificationQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 *
 * @method ContractSpecificationQuery groupById() Group by the id column
 * @method ContractSpecificationQuery groupByDeleted() Group by the deleted column
 * @method ContractSpecificationQuery groupByMasterId() Group by the master_id column
 * @method ContractSpecificationQuery groupByEventtypeId() Group by the eventType_id column
 *
 * @method ContractSpecificationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContractSpecificationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContractSpecificationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContractSpecification findOne(PropelPDO $con = null) Return the first ContractSpecification matching the query
 * @method ContractSpecification findOneOrCreate(PropelPDO $con = null) Return the first ContractSpecification matching the query, or a new ContractSpecification object populated from the query conditions when no match is found
 *
 * @method ContractSpecification findOneByDeleted(boolean $deleted) Return the first ContractSpecification filtered by the deleted column
 * @method ContractSpecification findOneByMasterId(int $master_id) Return the first ContractSpecification filtered by the master_id column
 * @method ContractSpecification findOneByEventtypeId(int $eventType_id) Return the first ContractSpecification filtered by the eventType_id column
 *
 * @method array findById(int $id) Return ContractSpecification objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return ContractSpecification objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return ContractSpecification objects filtered by the master_id column
 * @method array findByEventtypeId(int $eventType_id) Return ContractSpecification objects filtered by the eventType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContractSpecificationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContractSpecificationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ContractSpecification', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContractSpecificationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContractSpecificationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContractSpecificationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContractSpecificationQuery) {
            return $criteria;
        }
        $query = new ContractSpecificationQuery();
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
     * @return   ContractSpecification|ContractSpecification[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContractSpecificationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContractSpecificationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ContractSpecification A model object, or null if the key is not found
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
     * @return                 ContractSpecification A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `master_id`, `eventType_id` FROM `Contract_Specification` WHERE `id` = :p0';
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
            $obj = new ContractSpecification();
            $obj->hydrate($row);
            ContractSpecificationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ContractSpecification|ContractSpecification[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContractSpecification[]|mixed the list of results, formatted by the current formatter
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
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContractSpecificationPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContractSpecificationPeer::ID, $keys, Criteria::IN);
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
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContractSpecificationPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContractSpecificationPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractSpecificationPeer::ID, $id, $comparison);
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
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractSpecificationPeer::DELETED, $deleted, $comparison);
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
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ContractSpecificationPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ContractSpecificationPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractSpecificationPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the eventType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventtypeId(1234); // WHERE eventType_id = 1234
     * $query->filterByEventtypeId(array(12, 34)); // WHERE eventType_id IN (12, 34)
     * $query->filterByEventtypeId(array('min' => 12)); // WHERE eventType_id >= 12
     * $query->filterByEventtypeId(array('max' => 12)); // WHERE eventType_id <= 12
     * </code>
     *
     * @param     mixed $eventtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(ContractSpecificationPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(ContractSpecificationPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractSpecificationPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ContractSpecification $contractSpecification Object to remove from the list of results
     *
     * @return ContractSpecificationQuery The current query, for fluid interface
     */
    public function prune($contractSpecification = null)
    {
        if ($contractSpecification) {
            $this->addUsingAlias(ContractSpecificationPeer::ID, $contractSpecification->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
