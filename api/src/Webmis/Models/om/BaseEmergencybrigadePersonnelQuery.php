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
use Webmis\Models\EmergencybrigadePersonnel;
use Webmis\Models\EmergencybrigadePersonnelPeer;
use Webmis\Models\EmergencybrigadePersonnelQuery;

/**
 * Base class that represents a query for the 'EmergencyBrigade_Personnel' table.
 *
 *
 *
 * @method EmergencybrigadePersonnelQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EmergencybrigadePersonnelQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method EmergencybrigadePersonnelQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method EmergencybrigadePersonnelQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 *
 * @method EmergencybrigadePersonnelQuery groupById() Group by the id column
 * @method EmergencybrigadePersonnelQuery groupByMasterId() Group by the master_id column
 * @method EmergencybrigadePersonnelQuery groupByIdx() Group by the idx column
 * @method EmergencybrigadePersonnelQuery groupByPersonId() Group by the person_id column
 *
 * @method EmergencybrigadePersonnelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EmergencybrigadePersonnelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EmergencybrigadePersonnelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EmergencybrigadePersonnel findOne(PropelPDO $con = null) Return the first EmergencybrigadePersonnel matching the query
 * @method EmergencybrigadePersonnel findOneOrCreate(PropelPDO $con = null) Return the first EmergencybrigadePersonnel matching the query, or a new EmergencybrigadePersonnel object populated from the query conditions when no match is found
 *
 * @method EmergencybrigadePersonnel findOneByMasterId(int $master_id) Return the first EmergencybrigadePersonnel filtered by the master_id column
 * @method EmergencybrigadePersonnel findOneByIdx(int $idx) Return the first EmergencybrigadePersonnel filtered by the idx column
 * @method EmergencybrigadePersonnel findOneByPersonId(int $person_id) Return the first EmergencybrigadePersonnel filtered by the person_id column
 *
 * @method array findById(int $id) Return EmergencybrigadePersonnel objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return EmergencybrigadePersonnel objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return EmergencybrigadePersonnel objects filtered by the idx column
 * @method array findByPersonId(int $person_id) Return EmergencybrigadePersonnel objects filtered by the person_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEmergencybrigadePersonnelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEmergencybrigadePersonnelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\EmergencybrigadePersonnel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EmergencybrigadePersonnelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EmergencybrigadePersonnelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EmergencybrigadePersonnelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EmergencybrigadePersonnelQuery) {
            return $criteria;
        }
        $query = new EmergencybrigadePersonnelQuery();
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
     * @return   EmergencybrigadePersonnel|EmergencybrigadePersonnel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EmergencybrigadePersonnelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EmergencybrigadePersonnelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EmergencybrigadePersonnel A model object, or null if the key is not found
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
     * @return                 EmergencybrigadePersonnel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `person_id` FROM `EmergencyBrigade_Personnel` WHERE `id` = :p0';
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
            $obj = new EmergencybrigadePersonnel();
            $obj->hydrate($row);
            EmergencybrigadePersonnelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EmergencybrigadePersonnel|EmergencybrigadePersonnel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EmergencybrigadePersonnel[]|mixed the list of results, formatted by the current formatter
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
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmergencybrigadePersonnelPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmergencybrigadePersonnelPeer::ID, $keys, Criteria::IN);
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
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencybrigadePersonnelPeer::ID, $id, $comparison);
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
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencybrigadePersonnelPeer::MASTER_ID, $masterId, $comparison);
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
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencybrigadePersonnelPeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id >= 12
     * $query->filterByPersonId(array('max' => 12)); // WHERE person_id <= 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(EmergencybrigadePersonnelPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencybrigadePersonnelPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   EmergencybrigadePersonnel $emergencybrigadePersonnel Object to remove from the list of results
     *
     * @return EmergencybrigadePersonnelQuery The current query, for fluid interface
     */
    public function prune($emergencybrigadePersonnel = null)
    {
        if ($emergencybrigadePersonnel) {
            $this->addUsingAlias(EmergencybrigadePersonnelPeer::ID, $emergencybrigadePersonnel->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
