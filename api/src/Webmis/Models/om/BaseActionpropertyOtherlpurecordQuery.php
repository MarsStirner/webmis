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
use Webmis\Models\ActionpropertyOtherlpurecord;
use Webmis\Models\ActionpropertyOtherlpurecordPeer;
use Webmis\Models\ActionpropertyOtherlpurecordQuery;

/**
 * Base class that represents a query for the 'ActionProperty_OtherLPURecord' table.
 *
 *
 *
 * @method ActionpropertyOtherlpurecordQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionpropertyOtherlpurecordQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method ActionpropertyOtherlpurecordQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method ActionpropertyOtherlpurecordQuery groupById() Group by the id column
 * @method ActionpropertyOtherlpurecordQuery groupByIndex() Group by the index column
 * @method ActionpropertyOtherlpurecordQuery groupByValue() Group by the value column
 *
 * @method ActionpropertyOtherlpurecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionpropertyOtherlpurecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionpropertyOtherlpurecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionpropertyOtherlpurecord findOne(PropelPDO $con = null) Return the first ActionpropertyOtherlpurecord matching the query
 * @method ActionpropertyOtherlpurecord findOneOrCreate(PropelPDO $con = null) Return the first ActionpropertyOtherlpurecord matching the query, or a new ActionpropertyOtherlpurecord object populated from the query conditions when no match is found
 *
 * @method ActionpropertyOtherlpurecord findOneByIndex(int $index) Return the first ActionpropertyOtherlpurecord filtered by the index column
 * @method ActionpropertyOtherlpurecord findOneByValue(string $value) Return the first ActionpropertyOtherlpurecord filtered by the value column
 *
 * @method array findById(int $id) Return ActionpropertyOtherlpurecord objects filtered by the id column
 * @method array findByIndex(int $index) Return ActionpropertyOtherlpurecord objects filtered by the index column
 * @method array findByValue(string $value) Return ActionpropertyOtherlpurecord objects filtered by the value column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertyOtherlpurecordQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionpropertyOtherlpurecordQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActionpropertyOtherlpurecord', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionpropertyOtherlpurecordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionpropertyOtherlpurecordQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionpropertyOtherlpurecordQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionpropertyOtherlpurecordQuery) {
            return $criteria;
        }
        $query = new ActionpropertyOtherlpurecordQuery();
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
     * @return   ActionpropertyOtherlpurecord|ActionpropertyOtherlpurecord[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionpropertyOtherlpurecordPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertyOtherlpurecordPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActionpropertyOtherlpurecord A model object, or null if the key is not found
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
     * @return                 ActionpropertyOtherlpurecord A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `index`, `value` FROM `ActionProperty_OtherLPURecord` WHERE `id` = :p0';
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
            $obj = new ActionpropertyOtherlpurecord();
            $obj->hydrate($row);
            ActionpropertyOtherlpurecordPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ActionpropertyOtherlpurecord|ActionpropertyOtherlpurecord[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActionpropertyOtherlpurecord[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionpropertyOtherlpurecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionpropertyOtherlpurecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::ID, $keys, Criteria::IN);
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
     * @return ActionpropertyOtherlpurecordQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the index column
     *
     * Example usage:
     * <code>
     * $query->filterByIndex(1234); // WHERE index = 1234
     * $query->filterByIndex(array(12, 34)); // WHERE index IN (12, 34)
     * $query->filterByIndex(array('min' => 12)); // WHERE index >= 12
     * $query->filterByIndex(array('max' => 12)); // WHERE index <= 12
     * </code>
     *
     * @param     mixed $index The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyOtherlpurecordQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::INDEX, $index, $comparison);
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
     * @return ActionpropertyOtherlpurecordQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ActionpropertyOtherlpurecord $actionpropertyOtherlpurecord Object to remove from the list of results
     *
     * @return ActionpropertyOtherlpurecordQuery The current query, for fluid interface
     */
    public function prune($actionpropertyOtherlpurecord = null)
    {
        if ($actionpropertyOtherlpurecord) {
            $this->addUsingAlias(ActionpropertyOtherlpurecordPeer::ID, $actionpropertyOtherlpurecord->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
