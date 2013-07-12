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
use Webmis\Models\Action;
use Webmis\Models\Rbtrfulaboratorymeasuretypes;
use Webmis\Models\Trfulaboratorymeasure;
use Webmis\Models\TrfulaboratorymeasurePeer;
use Webmis\Models\TrfulaboratorymeasureQuery;

/**
 * Base class that represents a query for the 'trfuLaboratoryMeasure' table.
 *
 *
 *
 * @method TrfulaboratorymeasureQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TrfulaboratorymeasureQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method TrfulaboratorymeasureQuery orderByTrfuLabMeasureId($order = Criteria::ASC) Order by the trfu_lab_measure_id column
 * @method TrfulaboratorymeasureQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method TrfulaboratorymeasureQuery orderByBeforeoperation($order = Criteria::ASC) Order by the beforeOperation column
 * @method TrfulaboratorymeasureQuery orderByDuringoperation($order = Criteria::ASC) Order by the duringOperation column
 * @method TrfulaboratorymeasureQuery orderByInproduct($order = Criteria::ASC) Order by the inProduct column
 * @method TrfulaboratorymeasureQuery orderByAfteroperation($order = Criteria::ASC) Order by the afterOperation column
 *
 * @method TrfulaboratorymeasureQuery groupById() Group by the id column
 * @method TrfulaboratorymeasureQuery groupByActionId() Group by the action_id column
 * @method TrfulaboratorymeasureQuery groupByTrfuLabMeasureId() Group by the trfu_lab_measure_id column
 * @method TrfulaboratorymeasureQuery groupByTime() Group by the time column
 * @method TrfulaboratorymeasureQuery groupByBeforeoperation() Group by the beforeOperation column
 * @method TrfulaboratorymeasureQuery groupByDuringoperation() Group by the duringOperation column
 * @method TrfulaboratorymeasureQuery groupByInproduct() Group by the inProduct column
 * @method TrfulaboratorymeasureQuery groupByAfteroperation() Group by the afterOperation column
 *
 * @method TrfulaboratorymeasureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TrfulaboratorymeasureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TrfulaboratorymeasureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TrfulaboratorymeasureQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method TrfulaboratorymeasureQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method TrfulaboratorymeasureQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method TrfulaboratorymeasureQuery leftJoinRbtrfulaboratorymeasuretypes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtrfulaboratorymeasuretypes relation
 * @method TrfulaboratorymeasureQuery rightJoinRbtrfulaboratorymeasuretypes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtrfulaboratorymeasuretypes relation
 * @method TrfulaboratorymeasureQuery innerJoinRbtrfulaboratorymeasuretypes($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtrfulaboratorymeasuretypes relation
 *
 * @method Trfulaboratorymeasure findOne(PropelPDO $con = null) Return the first Trfulaboratorymeasure matching the query
 * @method Trfulaboratorymeasure findOneOrCreate(PropelPDO $con = null) Return the first Trfulaboratorymeasure matching the query, or a new Trfulaboratorymeasure object populated from the query conditions when no match is found
 *
 * @method Trfulaboratorymeasure findOneByActionId(int $action_id) Return the first Trfulaboratorymeasure filtered by the action_id column
 * @method Trfulaboratorymeasure findOneByTrfuLabMeasureId(int $trfu_lab_measure_id) Return the first Trfulaboratorymeasure filtered by the trfu_lab_measure_id column
 * @method Trfulaboratorymeasure findOneByTime(double $time) Return the first Trfulaboratorymeasure filtered by the time column
 * @method Trfulaboratorymeasure findOneByBeforeoperation(string $beforeOperation) Return the first Trfulaboratorymeasure filtered by the beforeOperation column
 * @method Trfulaboratorymeasure findOneByDuringoperation(string $duringOperation) Return the first Trfulaboratorymeasure filtered by the duringOperation column
 * @method Trfulaboratorymeasure findOneByInproduct(string $inProduct) Return the first Trfulaboratorymeasure filtered by the inProduct column
 * @method Trfulaboratorymeasure findOneByAfteroperation(string $afterOperation) Return the first Trfulaboratorymeasure filtered by the afterOperation column
 *
 * @method array findById(int $id) Return Trfulaboratorymeasure objects filtered by the id column
 * @method array findByActionId(int $action_id) Return Trfulaboratorymeasure objects filtered by the action_id column
 * @method array findByTrfuLabMeasureId(int $trfu_lab_measure_id) Return Trfulaboratorymeasure objects filtered by the trfu_lab_measure_id column
 * @method array findByTime(double $time) Return Trfulaboratorymeasure objects filtered by the time column
 * @method array findByBeforeoperation(string $beforeOperation) Return Trfulaboratorymeasure objects filtered by the beforeOperation column
 * @method array findByDuringoperation(string $duringOperation) Return Trfulaboratorymeasure objects filtered by the duringOperation column
 * @method array findByInproduct(string $inProduct) Return Trfulaboratorymeasure objects filtered by the inProduct column
 * @method array findByAfteroperation(string $afterOperation) Return Trfulaboratorymeasure objects filtered by the afterOperation column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTrfulaboratorymeasureQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTrfulaboratorymeasureQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Trfulaboratorymeasure', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TrfulaboratorymeasureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TrfulaboratorymeasureQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TrfulaboratorymeasureQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TrfulaboratorymeasureQuery) {
            return $criteria;
        }
        $query = new TrfulaboratorymeasureQuery();
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
     * @return   Trfulaboratorymeasure|Trfulaboratorymeasure[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TrfulaboratorymeasurePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TrfulaboratorymeasurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trfulaboratorymeasure A model object, or null if the key is not found
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
     * @return                 Trfulaboratorymeasure A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `action_id`, `trfu_lab_measure_id`, `time`, `beforeOperation`, `duringOperation`, `inProduct`, `afterOperation` FROM `trfuLaboratoryMeasure` WHERE `id` = :p0';
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
            $obj = new Trfulaboratorymeasure();
            $obj->hydrate($row);
            TrfulaboratorymeasurePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Trfulaboratorymeasure|Trfulaboratorymeasure[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Trfulaboratorymeasure[]|mixed the list of results, formatted by the current formatter
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
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::ID, $keys, Criteria::IN);
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
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the action_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionId(1234); // WHERE action_id = 1234
     * $query->filterByActionId(array(12, 34)); // WHERE action_id IN (12, 34)
     * $query->filterByActionId(array('min' => 12)); // WHERE action_id >= 12
     * $query->filterByActionId(array('max' => 12)); // WHERE action_id <= 12
     * </code>
     *
     * @see       filterByAction()
     *
     * @param     mixed $actionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query on the trfu_lab_measure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTrfuLabMeasureId(1234); // WHERE trfu_lab_measure_id = 1234
     * $query->filterByTrfuLabMeasureId(array(12, 34)); // WHERE trfu_lab_measure_id IN (12, 34)
     * $query->filterByTrfuLabMeasureId(array('min' => 12)); // WHERE trfu_lab_measure_id >= 12
     * $query->filterByTrfuLabMeasureId(array('max' => 12)); // WHERE trfu_lab_measure_id <= 12
     * </code>
     *
     * @see       filterByRbtrfulaboratorymeasuretypes()
     *
     * @param     mixed $trfuLabMeasureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByTrfuLabMeasureId($trfuLabMeasureId = null, $comparison = null)
    {
        if (is_array($trfuLabMeasureId)) {
            $useMinMax = false;
            if (isset($trfuLabMeasureId['min'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, $trfuLabMeasureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trfuLabMeasureId['max'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, $trfuLabMeasureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, $trfuLabMeasureId, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time >= 12
     * $query->filterByTime(array('max' => 12)); // WHERE time <= 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(TrfulaboratorymeasurePeer::TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::TIME, $time, $comparison);
    }

    /**
     * Filter the query on the beforeOperation column
     *
     * Example usage:
     * <code>
     * $query->filterByBeforeoperation('fooValue');   // WHERE beforeOperation = 'fooValue'
     * $query->filterByBeforeoperation('%fooValue%'); // WHERE beforeOperation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $beforeoperation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByBeforeoperation($beforeoperation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beforeoperation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $beforeoperation)) {
                $beforeoperation = str_replace('*', '%', $beforeoperation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::BEFOREOPERATION, $beforeoperation, $comparison);
    }

    /**
     * Filter the query on the duringOperation column
     *
     * Example usage:
     * <code>
     * $query->filterByDuringoperation('fooValue');   // WHERE duringOperation = 'fooValue'
     * $query->filterByDuringoperation('%fooValue%'); // WHERE duringOperation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $duringoperation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByDuringoperation($duringoperation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($duringoperation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $duringoperation)) {
                $duringoperation = str_replace('*', '%', $duringoperation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::DURINGOPERATION, $duringoperation, $comparison);
    }

    /**
     * Filter the query on the inProduct column
     *
     * Example usage:
     * <code>
     * $query->filterByInproduct('fooValue');   // WHERE inProduct = 'fooValue'
     * $query->filterByInproduct('%fooValue%'); // WHERE inProduct LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inproduct The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByInproduct($inproduct = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inproduct)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inproduct)) {
                $inproduct = str_replace('*', '%', $inproduct);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::INPRODUCT, $inproduct, $comparison);
    }

    /**
     * Filter the query on the afterOperation column
     *
     * Example usage:
     * <code>
     * $query->filterByAfteroperation('fooValue');   // WHERE afterOperation = 'fooValue'
     * $query->filterByAfteroperation('%fooValue%'); // WHERE afterOperation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $afteroperation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function filterByAfteroperation($afteroperation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($afteroperation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $afteroperation)) {
                $afteroperation = str_replace('*', '%', $afteroperation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TrfulaboratorymeasurePeer::AFTEROPERATION, $afteroperation, $comparison);
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrfulaboratorymeasureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(TrfulaboratorymeasurePeer::ACTION_ID, $action->getId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrfulaboratorymeasurePeer::ACTION_ID, $action->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAction() only accepts arguments of type Action or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Action relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function joinAction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Action');

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
            $this->addJoinObject($join, 'Action');
        }

        return $this;
    }

    /**
     * Use the Action relation Action object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionQuery A secondary query class using the current class as primary query
     */
    public function useActionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Action', '\Webmis\Models\ActionQuery');
    }

    /**
     * Filter the query by a related Rbtrfulaboratorymeasuretypes object
     *
     * @param   Rbtrfulaboratorymeasuretypes|PropelObjectCollection $rbtrfulaboratorymeasuretypes The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrfulaboratorymeasureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtrfulaboratorymeasuretypes($rbtrfulaboratorymeasuretypes, $comparison = null)
    {
        if ($rbtrfulaboratorymeasuretypes instanceof Rbtrfulaboratorymeasuretypes) {
            return $this
                ->addUsingAlias(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, $rbtrfulaboratorymeasuretypes->getId(), $comparison);
        } elseif ($rbtrfulaboratorymeasuretypes instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrfulaboratorymeasurePeer::TRFU_LAB_MEASURE_ID, $rbtrfulaboratorymeasuretypes->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtrfulaboratorymeasuretypes() only accepts arguments of type Rbtrfulaboratorymeasuretypes or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtrfulaboratorymeasuretypes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function joinRbtrfulaboratorymeasuretypes($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtrfulaboratorymeasuretypes');

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
            $this->addJoinObject($join, 'Rbtrfulaboratorymeasuretypes');
        }

        return $this;
    }

    /**
     * Use the Rbtrfulaboratorymeasuretypes relation Rbtrfulaboratorymeasuretypes object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtrfulaboratorymeasuretypesQuery A secondary query class using the current class as primary query
     */
    public function useRbtrfulaboratorymeasuretypesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbtrfulaboratorymeasuretypes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtrfulaboratorymeasuretypes', '\Webmis\Models\RbtrfulaboratorymeasuretypesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Trfulaboratorymeasure $trfulaboratorymeasure Object to remove from the list of results
     *
     * @return TrfulaboratorymeasureQuery The current query, for fluid interface
     */
    public function prune($trfulaboratorymeasure = null)
    {
        if ($trfulaboratorymeasure) {
            $this->addUsingAlias(TrfulaboratorymeasurePeer::ID, $trfulaboratorymeasure->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
