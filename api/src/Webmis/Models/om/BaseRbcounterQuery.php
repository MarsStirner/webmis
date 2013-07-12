<?php

namespace Webmis\Models\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\Eventtype;
use Webmis\Models\Rbcounter;
use Webmis\Models\RbcounterPeer;
use Webmis\Models\RbcounterQuery;

/**
 * Base class that represents a query for the 'rbCounter' table.
 *
 *
 *
 * @method RbcounterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbcounterQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbcounterQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbcounterQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method RbcounterQuery orderByPrefix($order = Criteria::ASC) Order by the prefix column
 * @method RbcounterQuery orderBySeparator($order = Criteria::ASC) Order by the separator column
 * @method RbcounterQuery orderByReset($order = Criteria::ASC) Order by the reset column
 * @method RbcounterQuery orderByStartdate($order = Criteria::ASC) Order by the startDate column
 * @method RbcounterQuery orderByResetdate($order = Criteria::ASC) Order by the resetDate column
 * @method RbcounterQuery orderBySequenceflag($order = Criteria::ASC) Order by the sequenceFlag column
 *
 * @method RbcounterQuery groupById() Group by the id column
 * @method RbcounterQuery groupByCode() Group by the code column
 * @method RbcounterQuery groupByName() Group by the name column
 * @method RbcounterQuery groupByValue() Group by the value column
 * @method RbcounterQuery groupByPrefix() Group by the prefix column
 * @method RbcounterQuery groupBySeparator() Group by the separator column
 * @method RbcounterQuery groupByReset() Group by the reset column
 * @method RbcounterQuery groupByStartdate() Group by the startDate column
 * @method RbcounterQuery groupByResetdate() Group by the resetDate column
 * @method RbcounterQuery groupBySequenceflag() Group by the sequenceFlag column
 *
 * @method RbcounterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbcounterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbcounterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbcounterQuery leftJoinEventtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Eventtype relation
 * @method RbcounterQuery rightJoinEventtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Eventtype relation
 * @method RbcounterQuery innerJoinEventtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Eventtype relation
 *
 * @method Rbcounter findOne(PropelPDO $con = null) Return the first Rbcounter matching the query
 * @method Rbcounter findOneOrCreate(PropelPDO $con = null) Return the first Rbcounter matching the query, or a new Rbcounter object populated from the query conditions when no match is found
 *
 * @method Rbcounter findOneByCode(string $code) Return the first Rbcounter filtered by the code column
 * @method Rbcounter findOneByName(string $name) Return the first Rbcounter filtered by the name column
 * @method Rbcounter findOneByValue(int $value) Return the first Rbcounter filtered by the value column
 * @method Rbcounter findOneByPrefix(string $prefix) Return the first Rbcounter filtered by the prefix column
 * @method Rbcounter findOneBySeparator(string $separator) Return the first Rbcounter filtered by the separator column
 * @method Rbcounter findOneByReset(int $reset) Return the first Rbcounter filtered by the reset column
 * @method Rbcounter findOneByStartdate(string $startDate) Return the first Rbcounter filtered by the startDate column
 * @method Rbcounter findOneByResetdate(string $resetDate) Return the first Rbcounter filtered by the resetDate column
 * @method Rbcounter findOneBySequenceflag(boolean $sequenceFlag) Return the first Rbcounter filtered by the sequenceFlag column
 *
 * @method array findById(int $id) Return Rbcounter objects filtered by the id column
 * @method array findByCode(string $code) Return Rbcounter objects filtered by the code column
 * @method array findByName(string $name) Return Rbcounter objects filtered by the name column
 * @method array findByValue(int $value) Return Rbcounter objects filtered by the value column
 * @method array findByPrefix(string $prefix) Return Rbcounter objects filtered by the prefix column
 * @method array findBySeparator(string $separator) Return Rbcounter objects filtered by the separator column
 * @method array findByReset(int $reset) Return Rbcounter objects filtered by the reset column
 * @method array findByStartdate(string $startDate) Return Rbcounter objects filtered by the startDate column
 * @method array findByResetdate(string $resetDate) Return Rbcounter objects filtered by the resetDate column
 * @method array findBySequenceflag(boolean $sequenceFlag) Return Rbcounter objects filtered by the sequenceFlag column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbcounterQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbcounterQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbcounter', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbcounterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbcounterQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbcounterQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbcounterQuery) {
            return $criteria;
        }
        $query = new RbcounterQuery();
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
     * @return   Rbcounter|Rbcounter[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbcounterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbcounterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbcounter A model object, or null if the key is not found
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
     * @return                 Rbcounter A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `value`, `prefix`, `separator`, `reset`, `startDate`, `resetDate`, `sequenceFlag` FROM `rbCounter` WHERE `id` = :p0';
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
            $obj = new Rbcounter();
            $obj->hydrate($row);
            RbcounterPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbcounter|Rbcounter[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbcounter[]|mixed the list of results, formatted by the current formatter
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
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbcounterPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbcounterPeer::ID, $keys, Criteria::IN);
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
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbcounterPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbcounterPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::NAME, $name, $comparison);
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
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(RbcounterPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(RbcounterPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByPrefix('fooValue');   // WHERE prefix = 'fooValue'
     * $query->filterByPrefix('%fooValue%'); // WHERE prefix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prefix The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByPrefix($prefix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prefix)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prefix)) {
                $prefix = str_replace('*', '%', $prefix);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::PREFIX, $prefix, $comparison);
    }

    /**
     * Filter the query on the separator column
     *
     * Example usage:
     * <code>
     * $query->filterBySeparator('fooValue');   // WHERE separator = 'fooValue'
     * $query->filterBySeparator('%fooValue%'); // WHERE separator LIKE '%fooValue%'
     * </code>
     *
     * @param     string $separator The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterBySeparator($separator = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($separator)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $separator)) {
                $separator = str_replace('*', '%', $separator);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::SEPARATOR, $separator, $comparison);
    }

    /**
     * Filter the query on the reset column
     *
     * Example usage:
     * <code>
     * $query->filterByReset(1234); // WHERE reset = 1234
     * $query->filterByReset(array(12, 34)); // WHERE reset IN (12, 34)
     * $query->filterByReset(array('min' => 12)); // WHERE reset >= 12
     * $query->filterByReset(array('max' => 12)); // WHERE reset <= 12
     * </code>
     *
     * @param     mixed $reset The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByReset($reset = null, $comparison = null)
    {
        if (is_array($reset)) {
            $useMinMax = false;
            if (isset($reset['min'])) {
                $this->addUsingAlias(RbcounterPeer::RESET, $reset['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reset['max'])) {
                $this->addUsingAlias(RbcounterPeer::RESET, $reset['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::RESET, $reset, $comparison);
    }

    /**
     * Filter the query on the startDate column
     *
     * Example usage:
     * <code>
     * $query->filterByStartdate('2011-03-14'); // WHERE startDate = '2011-03-14'
     * $query->filterByStartdate('now'); // WHERE startDate = '2011-03-14'
     * $query->filterByStartdate(array('max' => 'yesterday')); // WHERE startDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $startdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByStartdate($startdate = null, $comparison = null)
    {
        if (is_array($startdate)) {
            $useMinMax = false;
            if (isset($startdate['min'])) {
                $this->addUsingAlias(RbcounterPeer::STARTDATE, $startdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($startdate['max'])) {
                $this->addUsingAlias(RbcounterPeer::STARTDATE, $startdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::STARTDATE, $startdate, $comparison);
    }

    /**
     * Filter the query on the resetDate column
     *
     * Example usage:
     * <code>
     * $query->filterByResetdate('2011-03-14'); // WHERE resetDate = '2011-03-14'
     * $query->filterByResetdate('now'); // WHERE resetDate = '2011-03-14'
     * $query->filterByResetdate(array('max' => 'yesterday')); // WHERE resetDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $resetdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterByResetdate($resetdate = null, $comparison = null)
    {
        if (is_array($resetdate)) {
            $useMinMax = false;
            if (isset($resetdate['min'])) {
                $this->addUsingAlias(RbcounterPeer::RESETDATE, $resetdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($resetdate['max'])) {
                $this->addUsingAlias(RbcounterPeer::RESETDATE, $resetdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbcounterPeer::RESETDATE, $resetdate, $comparison);
    }

    /**
     * Filter the query on the sequenceFlag column
     *
     * Example usage:
     * <code>
     * $query->filterBySequenceflag(true); // WHERE sequenceFlag = true
     * $query->filterBySequenceflag('yes'); // WHERE sequenceFlag = true
     * </code>
     *
     * @param     boolean|string $sequenceflag The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function filterBySequenceflag($sequenceflag = null, $comparison = null)
    {
        if (is_string($sequenceflag)) {
            $sequenceflag = in_array(strtolower($sequenceflag), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbcounterPeer::SEQUENCEFLAG, $sequenceflag, $comparison);
    }

    /**
     * Filter the query by a related Eventtype object
     *
     * @param   Eventtype|PropelObjectCollection $eventtype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbcounterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventtype($eventtype, $comparison = null)
    {
        if ($eventtype instanceof Eventtype) {
            return $this
                ->addUsingAlias(RbcounterPeer::ID, $eventtype->getCounterId(), $comparison);
        } elseif ($eventtype instanceof PropelObjectCollection) {
            return $this
                ->useEventtypeQuery()
                ->filterByPrimaryKeys($eventtype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEventtype() only accepts arguments of type Eventtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Eventtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function joinEventtype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Eventtype');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Eventtype');
        }

        return $this;
    }

    /**
     * Use the Eventtype relation Eventtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\EventtypeQuery A secondary query class using the current class as primary query
     */
    public function useEventtypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEventtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Eventtype', '\Webmis\Models\EventtypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbcounter $rbcounter Object to remove from the list of results
     *
     * @return RbcounterQuery The current query, for fluid interface
     */
    public function prune($rbcounter = null)
    {
        if ($rbcounter) {
            $this->addUsingAlias(RbcounterPeer::ID, $rbcounter->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
