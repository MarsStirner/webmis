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
use Webmis\Models\ActionpropertyHospitalbedprofile;
use Webmis\Models\ActionpropertyHospitalbedprofilePeer;
use Webmis\Models\ActionpropertyHospitalbedprofileQuery;

/**
 * Base class that represents a query for the 'ActionProperty_HospitalBedProfile' table.
 *
 *
 *
 * @method ActionpropertyHospitalbedprofileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionpropertyHospitalbedprofileQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method ActionpropertyHospitalbedprofileQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method ActionpropertyHospitalbedprofileQuery groupById() Group by the id column
 * @method ActionpropertyHospitalbedprofileQuery groupByIndex() Group by the index column
 * @method ActionpropertyHospitalbedprofileQuery groupByValue() Group by the value column
 *
 * @method ActionpropertyHospitalbedprofileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionpropertyHospitalbedprofileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionpropertyHospitalbedprofileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionpropertyHospitalbedprofile findOne(PropelPDO $con = null) Return the first ActionpropertyHospitalbedprofile matching the query
 * @method ActionpropertyHospitalbedprofile findOneOrCreate(PropelPDO $con = null) Return the first ActionpropertyHospitalbedprofile matching the query, or a new ActionpropertyHospitalbedprofile object populated from the query conditions when no match is found
 *
 * @method ActionpropertyHospitalbedprofile findOneById(int $id) Return the first ActionpropertyHospitalbedprofile filtered by the id column
 * @method ActionpropertyHospitalbedprofile findOneByIndex(int $index) Return the first ActionpropertyHospitalbedprofile filtered by the index column
 * @method ActionpropertyHospitalbedprofile findOneByValue(int $value) Return the first ActionpropertyHospitalbedprofile filtered by the value column
 *
 * @method array findById(int $id) Return ActionpropertyHospitalbedprofile objects filtered by the id column
 * @method array findByIndex(int $index) Return ActionpropertyHospitalbedprofile objects filtered by the index column
 * @method array findByValue(int $value) Return ActionpropertyHospitalbedprofile objects filtered by the value column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertyHospitalbedprofileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionpropertyHospitalbedprofileQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActionpropertyHospitalbedprofile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionpropertyHospitalbedprofileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionpropertyHospitalbedprofileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionpropertyHospitalbedprofileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionpropertyHospitalbedprofileQuery) {
            return $criteria;
        }
        $query = new ActionpropertyHospitalbedprofileQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id, $index]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ActionpropertyHospitalbedprofile|ActionpropertyHospitalbedprofile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionpropertyHospitalbedprofilePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertyHospitalbedprofilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ActionpropertyHospitalbedprofile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `index`, `value` FROM `ActionProperty_HospitalBedProfile` WHERE `id` = :p0 AND `index` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ActionpropertyHospitalbedprofile();
            $obj->hydrate($row);
            ActionpropertyHospitalbedprofilePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ActionpropertyHospitalbedprofile|ActionpropertyHospitalbedprofile[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ActionpropertyHospitalbedprofile[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionpropertyHospitalbedprofileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::INDEX, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionpropertyHospitalbedprofileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ActionpropertyHospitalbedprofilePeer::ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ActionpropertyHospitalbedprofilePeer::INDEX, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return ActionpropertyHospitalbedprofileQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::ID, $id, $comparison);
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
     * @return ActionpropertyHospitalbedprofileQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::INDEX, $index, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value >= 12
     * $query->filterByValue(array('max' => 12)); // WHERE value <= 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyHospitalbedprofileQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyHospitalbedprofilePeer::VALUE, $value, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ActionpropertyHospitalbedprofile $actionpropertyHospitalbedprofile Object to remove from the list of results
     *
     * @return ActionpropertyHospitalbedprofileQuery The current query, for fluid interface
     */
    public function prune($actionpropertyHospitalbedprofile = null)
    {
        if ($actionpropertyHospitalbedprofile) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ActionpropertyHospitalbedprofilePeer::ID), $actionpropertyHospitalbedprofile->getId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ActionpropertyHospitalbedprofilePeer::INDEX), $actionpropertyHospitalbedprofile->getIndex(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
