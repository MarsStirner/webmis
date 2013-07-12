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
use Webmis\Models\Bloodhistory;
use Webmis\Models\BloodhistoryPeer;
use Webmis\Models\BloodhistoryQuery;

/**
 * Base class that represents a query for the 'BloodHistory' table.
 *
 *
 *
 * @method BloodhistoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BloodhistoryQuery orderByBlooddate($order = Criteria::ASC) Order by the bloodDate column
 * @method BloodhistoryQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method BloodhistoryQuery orderByBloodtypeId($order = Criteria::ASC) Order by the bloodType_id column
 * @method BloodhistoryQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 *
 * @method BloodhistoryQuery groupById() Group by the id column
 * @method BloodhistoryQuery groupByBlooddate() Group by the bloodDate column
 * @method BloodhistoryQuery groupByClientId() Group by the client_id column
 * @method BloodhistoryQuery groupByBloodtypeId() Group by the bloodType_id column
 * @method BloodhistoryQuery groupByPersonId() Group by the person_id column
 *
 * @method BloodhistoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BloodhistoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BloodhistoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Bloodhistory findOne(PropelPDO $con = null) Return the first Bloodhistory matching the query
 * @method Bloodhistory findOneOrCreate(PropelPDO $con = null) Return the first Bloodhistory matching the query, or a new Bloodhistory object populated from the query conditions when no match is found
 *
 * @method Bloodhistory findOneByBlooddate(string $bloodDate) Return the first Bloodhistory filtered by the bloodDate column
 * @method Bloodhistory findOneByClientId(int $client_id) Return the first Bloodhistory filtered by the client_id column
 * @method Bloodhistory findOneByBloodtypeId(int $bloodType_id) Return the first Bloodhistory filtered by the bloodType_id column
 * @method Bloodhistory findOneByPersonId(int $person_id) Return the first Bloodhistory filtered by the person_id column
 *
 * @method array findById(int $id) Return Bloodhistory objects filtered by the id column
 * @method array findByBlooddate(string $bloodDate) Return Bloodhistory objects filtered by the bloodDate column
 * @method array findByClientId(int $client_id) Return Bloodhistory objects filtered by the client_id column
 * @method array findByBloodtypeId(int $bloodType_id) Return Bloodhistory objects filtered by the bloodType_id column
 * @method array findByPersonId(int $person_id) Return Bloodhistory objects filtered by the person_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBloodhistoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBloodhistoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Bloodhistory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BloodhistoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BloodhistoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BloodhistoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BloodhistoryQuery) {
            return $criteria;
        }
        $query = new BloodhistoryQuery();
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
     * @return   Bloodhistory|Bloodhistory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BloodhistoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BloodhistoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bloodhistory A model object, or null if the key is not found
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
     * @return                 Bloodhistory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `bloodDate`, `client_id`, `bloodType_id`, `person_id` FROM `BloodHistory` WHERE `id` = :p0';
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
            $obj = new Bloodhistory();
            $obj->hydrate($row);
            BloodhistoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bloodhistory|Bloodhistory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bloodhistory[]|mixed the list of results, formatted by the current formatter
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
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BloodhistoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BloodhistoryPeer::ID, $keys, Criteria::IN);
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
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BloodhistoryPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BloodhistoryPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BloodhistoryPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the bloodDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBlooddate('2011-03-14'); // WHERE bloodDate = '2011-03-14'
     * $query->filterByBlooddate('now'); // WHERE bloodDate = '2011-03-14'
     * $query->filterByBlooddate(array('max' => 'yesterday')); // WHERE bloodDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $blooddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterByBlooddate($blooddate = null, $comparison = null)
    {
        if (is_array($blooddate)) {
            $useMinMax = false;
            if (isset($blooddate['min'])) {
                $this->addUsingAlias(BloodhistoryPeer::BLOODDATE, $blooddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($blooddate['max'])) {
                $this->addUsingAlias(BloodhistoryPeer::BLOODDATE, $blooddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BloodhistoryPeer::BLOODDATE, $blooddate, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id >= 12
     * $query->filterByClientId(array('max' => 12)); // WHERE client_id <= 12
     * </code>
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(BloodhistoryPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(BloodhistoryPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BloodhistoryPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the bloodType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBloodtypeId(1234); // WHERE bloodType_id = 1234
     * $query->filterByBloodtypeId(array(12, 34)); // WHERE bloodType_id IN (12, 34)
     * $query->filterByBloodtypeId(array('min' => 12)); // WHERE bloodType_id >= 12
     * $query->filterByBloodtypeId(array('max' => 12)); // WHERE bloodType_id <= 12
     * </code>
     *
     * @param     mixed $bloodtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterByBloodtypeId($bloodtypeId = null, $comparison = null)
    {
        if (is_array($bloodtypeId)) {
            $useMinMax = false;
            if (isset($bloodtypeId['min'])) {
                $this->addUsingAlias(BloodhistoryPeer::BLOODTYPE_ID, $bloodtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bloodtypeId['max'])) {
                $this->addUsingAlias(BloodhistoryPeer::BLOODTYPE_ID, $bloodtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BloodhistoryPeer::BLOODTYPE_ID, $bloodtypeId, $comparison);
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
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(BloodhistoryPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(BloodhistoryPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BloodhistoryPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Bloodhistory $bloodhistory Object to remove from the list of results
     *
     * @return BloodhistoryQuery The current query, for fluid interface
     */
    public function prune($bloodhistory = null)
    {
        if ($bloodhistory) {
            $this->addUsingAlias(BloodhistoryPeer::ID, $bloodhistory->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
