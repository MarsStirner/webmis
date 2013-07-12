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
use Webmis\Models\ClientworkHurt;
use Webmis\Models\ClientworkHurtPeer;
use Webmis\Models\ClientworkHurtQuery;

/**
 * Base class that represents a query for the 'ClientWork_Hurt' table.
 *
 *
 *
 * @method ClientworkHurtQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientworkHurtQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ClientworkHurtQuery orderByHurttypeId($order = Criteria::ASC) Order by the hurtType_id column
 * @method ClientworkHurtQuery orderByStage($order = Criteria::ASC) Order by the stage column
 *
 * @method ClientworkHurtQuery groupById() Group by the id column
 * @method ClientworkHurtQuery groupByMasterId() Group by the master_id column
 * @method ClientworkHurtQuery groupByHurttypeId() Group by the hurtType_id column
 * @method ClientworkHurtQuery groupByStage() Group by the stage column
 *
 * @method ClientworkHurtQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientworkHurtQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientworkHurtQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientworkHurt findOne(PropelPDO $con = null) Return the first ClientworkHurt matching the query
 * @method ClientworkHurt findOneOrCreate(PropelPDO $con = null) Return the first ClientworkHurt matching the query, or a new ClientworkHurt object populated from the query conditions when no match is found
 *
 * @method ClientworkHurt findOneByMasterId(int $master_id) Return the first ClientworkHurt filtered by the master_id column
 * @method ClientworkHurt findOneByHurttypeId(int $hurtType_id) Return the first ClientworkHurt filtered by the hurtType_id column
 * @method ClientworkHurt findOneByStage(int $stage) Return the first ClientworkHurt filtered by the stage column
 *
 * @method array findById(int $id) Return ClientworkHurt objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return ClientworkHurt objects filtered by the master_id column
 * @method array findByHurttypeId(int $hurtType_id) Return ClientworkHurt objects filtered by the hurtType_id column
 * @method array findByStage(int $stage) Return ClientworkHurt objects filtered by the stage column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientworkHurtQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientworkHurtQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ClientworkHurt', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientworkHurtQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientworkHurtQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientworkHurtQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientworkHurtQuery) {
            return $criteria;
        }
        $query = new ClientworkHurtQuery();
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
     * @return   ClientworkHurt|ClientworkHurt[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientworkHurtPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientworkHurtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ClientworkHurt A model object, or null if the key is not found
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
     * @return                 ClientworkHurt A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `hurtType_id`, `stage` FROM `ClientWork_Hurt` WHERE `id` = :p0';
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
            $obj = new ClientworkHurt();
            $obj->hydrate($row);
            ClientworkHurtPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ClientworkHurt|ClientworkHurt[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ClientworkHurt[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientworkHurtPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientworkHurtPeer::ID, $keys, Criteria::IN);
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
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientworkHurtPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientworkHurtPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkHurtPeer::ID, $id, $comparison);
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
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ClientworkHurtPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ClientworkHurtPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkHurtPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the hurtType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHurttypeId(1234); // WHERE hurtType_id = 1234
     * $query->filterByHurttypeId(array(12, 34)); // WHERE hurtType_id IN (12, 34)
     * $query->filterByHurttypeId(array('min' => 12)); // WHERE hurtType_id >= 12
     * $query->filterByHurttypeId(array('max' => 12)); // WHERE hurtType_id <= 12
     * </code>
     *
     * @param     mixed $hurttypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function filterByHurttypeId($hurttypeId = null, $comparison = null)
    {
        if (is_array($hurttypeId)) {
            $useMinMax = false;
            if (isset($hurttypeId['min'])) {
                $this->addUsingAlias(ClientworkHurtPeer::HURTTYPE_ID, $hurttypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hurttypeId['max'])) {
                $this->addUsingAlias(ClientworkHurtPeer::HURTTYPE_ID, $hurttypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkHurtPeer::HURTTYPE_ID, $hurttypeId, $comparison);
    }

    /**
     * Filter the query on the stage column
     *
     * Example usage:
     * <code>
     * $query->filterByStage(1234); // WHERE stage = 1234
     * $query->filterByStage(array(12, 34)); // WHERE stage IN (12, 34)
     * $query->filterByStage(array('min' => 12)); // WHERE stage >= 12
     * $query->filterByStage(array('max' => 12)); // WHERE stage <= 12
     * </code>
     *
     * @param     mixed $stage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function filterByStage($stage = null, $comparison = null)
    {
        if (is_array($stage)) {
            $useMinMax = false;
            if (isset($stage['min'])) {
                $this->addUsingAlias(ClientworkHurtPeer::STAGE, $stage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stage['max'])) {
                $this->addUsingAlias(ClientworkHurtPeer::STAGE, $stage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkHurtPeer::STAGE, $stage, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ClientworkHurt $clientworkHurt Object to remove from the list of results
     *
     * @return ClientworkHurtQuery The current query, for fluid interface
     */
    public function prune($clientworkHurt = null)
    {
        if ($clientworkHurt) {
            $this->addUsingAlias(ClientworkHurtPeer::ID, $clientworkHurt->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
