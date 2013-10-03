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
use Webmis\Models\Fdfieldvalue;
use Webmis\Models\FdfieldvaluePeer;
use Webmis\Models\FdfieldvalueQuery;

/**
 * Base class that represents a query for the 'FDFieldValue' table.
 *
 *
 *
 * @method FdfieldvalueQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FdfieldvalueQuery orderByFdrecordId($order = Criteria::ASC) Order by the fdRecord_id column
 * @method FdfieldvalueQuery orderByFdfieldId($order = Criteria::ASC) Order by the fdField_id column
 * @method FdfieldvalueQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method FdfieldvalueQuery groupById() Group by the id column
 * @method FdfieldvalueQuery groupByFdrecordId() Group by the fdRecord_id column
 * @method FdfieldvalueQuery groupByFdfieldId() Group by the fdField_id column
 * @method FdfieldvalueQuery groupByValue() Group by the value column
 *
 * @method FdfieldvalueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FdfieldvalueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FdfieldvalueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Fdfieldvalue findOne(PropelPDO $con = null) Return the first Fdfieldvalue matching the query
 * @method Fdfieldvalue findOneOrCreate(PropelPDO $con = null) Return the first Fdfieldvalue matching the query, or a new Fdfieldvalue object populated from the query conditions when no match is found
 *
 * @method Fdfieldvalue findOneByFdrecordId(int $fdRecord_id) Return the first Fdfieldvalue filtered by the fdRecord_id column
 * @method Fdfieldvalue findOneByFdfieldId(int $fdField_id) Return the first Fdfieldvalue filtered by the fdField_id column
 * @method Fdfieldvalue findOneByValue(string $value) Return the first Fdfieldvalue filtered by the value column
 *
 * @method array findById(int $id) Return Fdfieldvalue objects filtered by the id column
 * @method array findByFdrecordId(int $fdRecord_id) Return Fdfieldvalue objects filtered by the fdRecord_id column
 * @method array findByFdfieldId(int $fdField_id) Return Fdfieldvalue objects filtered by the fdField_id column
 * @method array findByValue(string $value) Return Fdfieldvalue objects filtered by the value column
 *
 * @package    propel.generator.Models.om
 */
abstract class BaseFdfieldvalueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFdfieldvalueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Fdfieldvalue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FdfieldvalueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FdfieldvalueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FdfieldvalueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FdfieldvalueQuery) {
            return $criteria;
        }
        $query = new FdfieldvalueQuery();
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
     * @return   Fdfieldvalue|Fdfieldvalue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FdfieldvaluePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FdfieldvaluePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Fdfieldvalue A model object, or null if the key is not found
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
     * @return                 Fdfieldvalue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `fdRecord_id`, `fdField_id`, `value` FROM `FDFieldValue` WHERE `id` = :p0';
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
            $obj = new Fdfieldvalue();
            $obj->hydrate($row);
            FdfieldvaluePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Fdfieldvalue|Fdfieldvalue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Fdfieldvalue[]|mixed the list of results, formatted by the current formatter
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
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FdfieldvaluePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FdfieldvaluePeer::ID, $keys, Criteria::IN);
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
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FdfieldvaluePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FdfieldvaluePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldvaluePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the fdRecord_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFdrecordId(1234); // WHERE fdRecord_id = 1234
     * $query->filterByFdrecordId(array(12, 34)); // WHERE fdRecord_id IN (12, 34)
     * $query->filterByFdrecordId(array('min' => 12)); // WHERE fdRecord_id >= 12
     * $query->filterByFdrecordId(array('max' => 12)); // WHERE fdRecord_id <= 12
     * </code>
     *
     * @param     mixed $fdrecordId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function filterByFdrecordId($fdrecordId = null, $comparison = null)
    {
        if (is_array($fdrecordId)) {
            $useMinMax = false;
            if (isset($fdrecordId['min'])) {
                $this->addUsingAlias(FdfieldvaluePeer::FDRECORD_ID, $fdrecordId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdrecordId['max'])) {
                $this->addUsingAlias(FdfieldvaluePeer::FDRECORD_ID, $fdrecordId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldvaluePeer::FDRECORD_ID, $fdrecordId, $comparison);
    }

    /**
     * Filter the query on the fdField_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFdfieldId(1234); // WHERE fdField_id = 1234
     * $query->filterByFdfieldId(array(12, 34)); // WHERE fdField_id IN (12, 34)
     * $query->filterByFdfieldId(array('min' => 12)); // WHERE fdField_id >= 12
     * $query->filterByFdfieldId(array('max' => 12)); // WHERE fdField_id <= 12
     * </code>
     *
     * @param     mixed $fdfieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function filterByFdfieldId($fdfieldId = null, $comparison = null)
    {
        if (is_array($fdfieldId)) {
            $useMinMax = false;
            if (isset($fdfieldId['min'])) {
                $this->addUsingAlias(FdfieldvaluePeer::FDFIELD_ID, $fdfieldId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdfieldId['max'])) {
                $this->addUsingAlias(FdfieldvaluePeer::FDFIELD_ID, $fdfieldId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldvaluePeer::FDFIELD_ID, $fdfieldId, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FdfieldvaluePeer::VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Fdfieldvalue $fdfieldvalue Object to remove from the list of results
     *
     * @return FdfieldvalueQuery The current query, for fluid interface
     */
    public function prune($fdfieldvalue = null)
    {
        if ($fdfieldvalue) {
            $this->addUsingAlias(FdfieldvaluePeer::ID, $fdfieldvalue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
