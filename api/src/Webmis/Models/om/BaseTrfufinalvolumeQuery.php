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
use Webmis\Models\Trfufinalvolume;
use Webmis\Models\TrfufinalvolumePeer;
use Webmis\Models\TrfufinalvolumeQuery;

/**
 * Base class that represents a query for the 'trfuFinalVolume' table.
 *
 *
 *
 * @method TrfufinalvolumeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TrfufinalvolumeQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method TrfufinalvolumeQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method TrfufinalvolumeQuery orderByAnticoagulantvolume($order = Criteria::ASC) Order by the anticoagulantVolume column
 * @method TrfufinalvolumeQuery orderByInletvolume($order = Criteria::ASC) Order by the inletVolume column
 * @method TrfufinalvolumeQuery orderByPlasmavolume($order = Criteria::ASC) Order by the plasmaVolume column
 * @method TrfufinalvolumeQuery orderByCollectvolume($order = Criteria::ASC) Order by the collectVolume column
 * @method TrfufinalvolumeQuery orderByAnticoagulantincollect($order = Criteria::ASC) Order by the anticoagulantInCollect column
 * @method TrfufinalvolumeQuery orderByAnticoagulantinplasma($order = Criteria::ASC) Order by the anticoagulantInPlasma column
 *
 * @method TrfufinalvolumeQuery groupById() Group by the id column
 * @method TrfufinalvolumeQuery groupByActionId() Group by the action_id column
 * @method TrfufinalvolumeQuery groupByTime() Group by the time column
 * @method TrfufinalvolumeQuery groupByAnticoagulantvolume() Group by the anticoagulantVolume column
 * @method TrfufinalvolumeQuery groupByInletvolume() Group by the inletVolume column
 * @method TrfufinalvolumeQuery groupByPlasmavolume() Group by the plasmaVolume column
 * @method TrfufinalvolumeQuery groupByCollectvolume() Group by the collectVolume column
 * @method TrfufinalvolumeQuery groupByAnticoagulantincollect() Group by the anticoagulantInCollect column
 * @method TrfufinalvolumeQuery groupByAnticoagulantinplasma() Group by the anticoagulantInPlasma column
 *
 * @method TrfufinalvolumeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TrfufinalvolumeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TrfufinalvolumeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TrfufinalvolumeQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method TrfufinalvolumeQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method TrfufinalvolumeQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method Trfufinalvolume findOne(PropelPDO $con = null) Return the first Trfufinalvolume matching the query
 * @method Trfufinalvolume findOneOrCreate(PropelPDO $con = null) Return the first Trfufinalvolume matching the query, or a new Trfufinalvolume object populated from the query conditions when no match is found
 *
 * @method Trfufinalvolume findOneByActionId(int $action_id) Return the first Trfufinalvolume filtered by the action_id column
 * @method Trfufinalvolume findOneByTime(double $time) Return the first Trfufinalvolume filtered by the time column
 * @method Trfufinalvolume findOneByAnticoagulantvolume(double $anticoagulantVolume) Return the first Trfufinalvolume filtered by the anticoagulantVolume column
 * @method Trfufinalvolume findOneByInletvolume(double $inletVolume) Return the first Trfufinalvolume filtered by the inletVolume column
 * @method Trfufinalvolume findOneByPlasmavolume(double $plasmaVolume) Return the first Trfufinalvolume filtered by the plasmaVolume column
 * @method Trfufinalvolume findOneByCollectvolume(double $collectVolume) Return the first Trfufinalvolume filtered by the collectVolume column
 * @method Trfufinalvolume findOneByAnticoagulantincollect(double $anticoagulantInCollect) Return the first Trfufinalvolume filtered by the anticoagulantInCollect column
 * @method Trfufinalvolume findOneByAnticoagulantinplasma(double $anticoagulantInPlasma) Return the first Trfufinalvolume filtered by the anticoagulantInPlasma column
 *
 * @method array findById(int $id) Return Trfufinalvolume objects filtered by the id column
 * @method array findByActionId(int $action_id) Return Trfufinalvolume objects filtered by the action_id column
 * @method array findByTime(double $time) Return Trfufinalvolume objects filtered by the time column
 * @method array findByAnticoagulantvolume(double $anticoagulantVolume) Return Trfufinalvolume objects filtered by the anticoagulantVolume column
 * @method array findByInletvolume(double $inletVolume) Return Trfufinalvolume objects filtered by the inletVolume column
 * @method array findByPlasmavolume(double $plasmaVolume) Return Trfufinalvolume objects filtered by the plasmaVolume column
 * @method array findByCollectvolume(double $collectVolume) Return Trfufinalvolume objects filtered by the collectVolume column
 * @method array findByAnticoagulantincollect(double $anticoagulantInCollect) Return Trfufinalvolume objects filtered by the anticoagulantInCollect column
 * @method array findByAnticoagulantinplasma(double $anticoagulantInPlasma) Return Trfufinalvolume objects filtered by the anticoagulantInPlasma column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTrfufinalvolumeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTrfufinalvolumeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Trfufinalvolume', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TrfufinalvolumeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TrfufinalvolumeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TrfufinalvolumeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TrfufinalvolumeQuery) {
            return $criteria;
        }
        $query = new TrfufinalvolumeQuery();
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
     * @return   Trfufinalvolume|Trfufinalvolume[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TrfufinalvolumePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TrfufinalvolumePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trfufinalvolume A model object, or null if the key is not found
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
     * @return                 Trfufinalvolume A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `action_id`, `time`, `anticoagulantVolume`, `inletVolume`, `plasmaVolume`, `collectVolume`, `anticoagulantInCollect`, `anticoagulantInPlasma` FROM `trfuFinalVolume` WHERE `id` = :p0';
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
            $obj = new Trfufinalvolume();
            $obj->hydrate($row);
            TrfufinalvolumePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Trfufinalvolume|Trfufinalvolume[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Trfufinalvolume[]|mixed the list of results, formatted by the current formatter
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
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TrfufinalvolumePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TrfufinalvolumePeer::ID, $keys, Criteria::IN);
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
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::ID, $id, $comparison);
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
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::ACTION_ID, $actionId, $comparison);
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
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::TIME, $time, $comparison);
    }

    /**
     * Filter the query on the anticoagulantVolume column
     *
     * Example usage:
     * <code>
     * $query->filterByAnticoagulantvolume(1234); // WHERE anticoagulantVolume = 1234
     * $query->filterByAnticoagulantvolume(array(12, 34)); // WHERE anticoagulantVolume IN (12, 34)
     * $query->filterByAnticoagulantvolume(array('min' => 12)); // WHERE anticoagulantVolume >= 12
     * $query->filterByAnticoagulantvolume(array('max' => 12)); // WHERE anticoagulantVolume <= 12
     * </code>
     *
     * @param     mixed $anticoagulantvolume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByAnticoagulantvolume($anticoagulantvolume = null, $comparison = null)
    {
        if (is_array($anticoagulantvolume)) {
            $useMinMax = false;
            if (isset($anticoagulantvolume['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTVOLUME, $anticoagulantvolume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anticoagulantvolume['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTVOLUME, $anticoagulantvolume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTVOLUME, $anticoagulantvolume, $comparison);
    }

    /**
     * Filter the query on the inletVolume column
     *
     * Example usage:
     * <code>
     * $query->filterByInletvolume(1234); // WHERE inletVolume = 1234
     * $query->filterByInletvolume(array(12, 34)); // WHERE inletVolume IN (12, 34)
     * $query->filterByInletvolume(array('min' => 12)); // WHERE inletVolume >= 12
     * $query->filterByInletvolume(array('max' => 12)); // WHERE inletVolume <= 12
     * </code>
     *
     * @param     mixed $inletvolume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByInletvolume($inletvolume = null, $comparison = null)
    {
        if (is_array($inletvolume)) {
            $useMinMax = false;
            if (isset($inletvolume['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::INLETVOLUME, $inletvolume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inletvolume['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::INLETVOLUME, $inletvolume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::INLETVOLUME, $inletvolume, $comparison);
    }

    /**
     * Filter the query on the plasmaVolume column
     *
     * Example usage:
     * <code>
     * $query->filterByPlasmavolume(1234); // WHERE plasmaVolume = 1234
     * $query->filterByPlasmavolume(array(12, 34)); // WHERE plasmaVolume IN (12, 34)
     * $query->filterByPlasmavolume(array('min' => 12)); // WHERE plasmaVolume >= 12
     * $query->filterByPlasmavolume(array('max' => 12)); // WHERE plasmaVolume <= 12
     * </code>
     *
     * @param     mixed $plasmavolume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByPlasmavolume($plasmavolume = null, $comparison = null)
    {
        if (is_array($plasmavolume)) {
            $useMinMax = false;
            if (isset($plasmavolume['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::PLASMAVOLUME, $plasmavolume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($plasmavolume['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::PLASMAVOLUME, $plasmavolume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::PLASMAVOLUME, $plasmavolume, $comparison);
    }

    /**
     * Filter the query on the collectVolume column
     *
     * Example usage:
     * <code>
     * $query->filterByCollectvolume(1234); // WHERE collectVolume = 1234
     * $query->filterByCollectvolume(array(12, 34)); // WHERE collectVolume IN (12, 34)
     * $query->filterByCollectvolume(array('min' => 12)); // WHERE collectVolume >= 12
     * $query->filterByCollectvolume(array('max' => 12)); // WHERE collectVolume <= 12
     * </code>
     *
     * @param     mixed $collectvolume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByCollectvolume($collectvolume = null, $comparison = null)
    {
        if (is_array($collectvolume)) {
            $useMinMax = false;
            if (isset($collectvolume['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::COLLECTVOLUME, $collectvolume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($collectvolume['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::COLLECTVOLUME, $collectvolume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::COLLECTVOLUME, $collectvolume, $comparison);
    }

    /**
     * Filter the query on the anticoagulantInCollect column
     *
     * Example usage:
     * <code>
     * $query->filterByAnticoagulantincollect(1234); // WHERE anticoagulantInCollect = 1234
     * $query->filterByAnticoagulantincollect(array(12, 34)); // WHERE anticoagulantInCollect IN (12, 34)
     * $query->filterByAnticoagulantincollect(array('min' => 12)); // WHERE anticoagulantInCollect >= 12
     * $query->filterByAnticoagulantincollect(array('max' => 12)); // WHERE anticoagulantInCollect <= 12
     * </code>
     *
     * @param     mixed $anticoagulantincollect The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByAnticoagulantincollect($anticoagulantincollect = null, $comparison = null)
    {
        if (is_array($anticoagulantincollect)) {
            $useMinMax = false;
            if (isset($anticoagulantincollect['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTINCOLLECT, $anticoagulantincollect['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anticoagulantincollect['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTINCOLLECT, $anticoagulantincollect['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTINCOLLECT, $anticoagulantincollect, $comparison);
    }

    /**
     * Filter the query on the anticoagulantInPlasma column
     *
     * Example usage:
     * <code>
     * $query->filterByAnticoagulantinplasma(1234); // WHERE anticoagulantInPlasma = 1234
     * $query->filterByAnticoagulantinplasma(array(12, 34)); // WHERE anticoagulantInPlasma IN (12, 34)
     * $query->filterByAnticoagulantinplasma(array('min' => 12)); // WHERE anticoagulantInPlasma >= 12
     * $query->filterByAnticoagulantinplasma(array('max' => 12)); // WHERE anticoagulantInPlasma <= 12
     * </code>
     *
     * @param     mixed $anticoagulantinplasma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function filterByAnticoagulantinplasma($anticoagulantinplasma = null, $comparison = null)
    {
        if (is_array($anticoagulantinplasma)) {
            $useMinMax = false;
            if (isset($anticoagulantinplasma['min'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTINPLASMA, $anticoagulantinplasma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anticoagulantinplasma['max'])) {
                $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTINPLASMA, $anticoagulantinplasma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfufinalvolumePeer::ANTICOAGULANTINPLASMA, $anticoagulantinplasma, $comparison);
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrfufinalvolumeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(TrfufinalvolumePeer::ACTION_ID, $action->getId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrfufinalvolumePeer::ACTION_ID, $action->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TrfufinalvolumeQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Trfufinalvolume $trfufinalvolume Object to remove from the list of results
     *
     * @return TrfufinalvolumeQuery The current query, for fluid interface
     */
    public function prune($trfufinalvolume = null)
    {
        if ($trfufinalvolume) {
            $this->addUsingAlias(TrfufinalvolumePeer::ID, $trfufinalvolume->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
