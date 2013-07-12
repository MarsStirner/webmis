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
use Webmis\Models\Rbbloodtype;
use Webmis\Models\Rbtrfubloodcomponenttype;
use Webmis\Models\Trfuorderissueresult;
use Webmis\Models\TrfuorderissueresultPeer;
use Webmis\Models\TrfuorderissueresultQuery;

/**
 * Base class that represents a query for the 'trfuOrderIssueResult' table.
 *
 *
 *
 * @method TrfuorderissueresultQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TrfuorderissueresultQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method TrfuorderissueresultQuery orderByTrfuBloodComp($order = Criteria::ASC) Order by the trfu_blood_comp column
 * @method TrfuorderissueresultQuery orderByCompNumber($order = Criteria::ASC) Order by the comp_number column
 * @method TrfuorderissueresultQuery orderByCompTypeId($order = Criteria::ASC) Order by the comp_type_id column
 * @method TrfuorderissueresultQuery orderByBloodTypeId($order = Criteria::ASC) Order by the blood_type_id column
 * @method TrfuorderissueresultQuery orderByVolume($order = Criteria::ASC) Order by the volume column
 * @method TrfuorderissueresultQuery orderByDoseCount($order = Criteria::ASC) Order by the dose_count column
 * @method TrfuorderissueresultQuery orderByTrfuDonorId($order = Criteria::ASC) Order by the trfu_donor_id column
 *
 * @method TrfuorderissueresultQuery groupById() Group by the id column
 * @method TrfuorderissueresultQuery groupByActionId() Group by the action_id column
 * @method TrfuorderissueresultQuery groupByTrfuBloodComp() Group by the trfu_blood_comp column
 * @method TrfuorderissueresultQuery groupByCompNumber() Group by the comp_number column
 * @method TrfuorderissueresultQuery groupByCompTypeId() Group by the comp_type_id column
 * @method TrfuorderissueresultQuery groupByBloodTypeId() Group by the blood_type_id column
 * @method TrfuorderissueresultQuery groupByVolume() Group by the volume column
 * @method TrfuorderissueresultQuery groupByDoseCount() Group by the dose_count column
 * @method TrfuorderissueresultQuery groupByTrfuDonorId() Group by the trfu_donor_id column
 *
 * @method TrfuorderissueresultQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TrfuorderissueresultQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TrfuorderissueresultQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TrfuorderissueresultQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method TrfuorderissueresultQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method TrfuorderissueresultQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method TrfuorderissueresultQuery leftJoinRbtrfubloodcomponenttype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtrfubloodcomponenttype relation
 * @method TrfuorderissueresultQuery rightJoinRbtrfubloodcomponenttype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtrfubloodcomponenttype relation
 * @method TrfuorderissueresultQuery innerJoinRbtrfubloodcomponenttype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtrfubloodcomponenttype relation
 *
 * @method TrfuorderissueresultQuery leftJoinRbbloodtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbbloodtype relation
 * @method TrfuorderissueresultQuery rightJoinRbbloodtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbbloodtype relation
 * @method TrfuorderissueresultQuery innerJoinRbbloodtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbbloodtype relation
 *
 * @method Trfuorderissueresult findOne(PropelPDO $con = null) Return the first Trfuorderissueresult matching the query
 * @method Trfuorderissueresult findOneOrCreate(PropelPDO $con = null) Return the first Trfuorderissueresult matching the query, or a new Trfuorderissueresult object populated from the query conditions when no match is found
 *
 * @method Trfuorderissueresult findOneByActionId(int $action_id) Return the first Trfuorderissueresult filtered by the action_id column
 * @method Trfuorderissueresult findOneByTrfuBloodComp(int $trfu_blood_comp) Return the first Trfuorderissueresult filtered by the trfu_blood_comp column
 * @method Trfuorderissueresult findOneByCompNumber(string $comp_number) Return the first Trfuorderissueresult filtered by the comp_number column
 * @method Trfuorderissueresult findOneByCompTypeId(int $comp_type_id) Return the first Trfuorderissueresult filtered by the comp_type_id column
 * @method Trfuorderissueresult findOneByBloodTypeId(int $blood_type_id) Return the first Trfuorderissueresult filtered by the blood_type_id column
 * @method Trfuorderissueresult findOneByVolume(int $volume) Return the first Trfuorderissueresult filtered by the volume column
 * @method Trfuorderissueresult findOneByDoseCount(double $dose_count) Return the first Trfuorderissueresult filtered by the dose_count column
 * @method Trfuorderissueresult findOneByTrfuDonorId(int $trfu_donor_id) Return the first Trfuorderissueresult filtered by the trfu_donor_id column
 *
 * @method array findById(int $id) Return Trfuorderissueresult objects filtered by the id column
 * @method array findByActionId(int $action_id) Return Trfuorderissueresult objects filtered by the action_id column
 * @method array findByTrfuBloodComp(int $trfu_blood_comp) Return Trfuorderissueresult objects filtered by the trfu_blood_comp column
 * @method array findByCompNumber(string $comp_number) Return Trfuorderissueresult objects filtered by the comp_number column
 * @method array findByCompTypeId(int $comp_type_id) Return Trfuorderissueresult objects filtered by the comp_type_id column
 * @method array findByBloodTypeId(int $blood_type_id) Return Trfuorderissueresult objects filtered by the blood_type_id column
 * @method array findByVolume(int $volume) Return Trfuorderissueresult objects filtered by the volume column
 * @method array findByDoseCount(double $dose_count) Return Trfuorderissueresult objects filtered by the dose_count column
 * @method array findByTrfuDonorId(int $trfu_donor_id) Return Trfuorderissueresult objects filtered by the trfu_donor_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTrfuorderissueresultQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTrfuorderissueresultQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Trfuorderissueresult', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TrfuorderissueresultQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TrfuorderissueresultQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TrfuorderissueresultQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TrfuorderissueresultQuery) {
            return $criteria;
        }
        $query = new TrfuorderissueresultQuery();
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
     * @return   Trfuorderissueresult|Trfuorderissueresult[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TrfuorderissueresultPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TrfuorderissueresultPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trfuorderissueresult A model object, or null if the key is not found
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
     * @return                 Trfuorderissueresult A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `action_id`, `trfu_blood_comp`, `comp_number`, `comp_type_id`, `blood_type_id`, `volume`, `dose_count`, `trfu_donor_id` FROM `trfuOrderIssueResult` WHERE `id` = :p0';
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
            $obj = new Trfuorderissueresult();
            $obj->hydrate($row);
            TrfuorderissueresultPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Trfuorderissueresult|Trfuorderissueresult[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Trfuorderissueresult[]|mixed the list of results, formatted by the current formatter
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
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TrfuorderissueresultPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TrfuorderissueresultPeer::ID, $keys, Criteria::IN);
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
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::ID, $id, $comparison);
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
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query on the trfu_blood_comp column
     *
     * Example usage:
     * <code>
     * $query->filterByTrfuBloodComp(1234); // WHERE trfu_blood_comp = 1234
     * $query->filterByTrfuBloodComp(array(12, 34)); // WHERE trfu_blood_comp IN (12, 34)
     * $query->filterByTrfuBloodComp(array('min' => 12)); // WHERE trfu_blood_comp >= 12
     * $query->filterByTrfuBloodComp(array('max' => 12)); // WHERE trfu_blood_comp <= 12
     * </code>
     *
     * @param     mixed $trfuBloodComp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByTrfuBloodComp($trfuBloodComp = null, $comparison = null)
    {
        if (is_array($trfuBloodComp)) {
            $useMinMax = false;
            if (isset($trfuBloodComp['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::TRFU_BLOOD_COMP, $trfuBloodComp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trfuBloodComp['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::TRFU_BLOOD_COMP, $trfuBloodComp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::TRFU_BLOOD_COMP, $trfuBloodComp, $comparison);
    }

    /**
     * Filter the query on the comp_number column
     *
     * Example usage:
     * <code>
     * $query->filterByCompNumber('fooValue');   // WHERE comp_number = 'fooValue'
     * $query->filterByCompNumber('%fooValue%'); // WHERE comp_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $compNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByCompNumber($compNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($compNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $compNumber)) {
                $compNumber = str_replace('*', '%', $compNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::COMP_NUMBER, $compNumber, $comparison);
    }

    /**
     * Filter the query on the comp_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCompTypeId(1234); // WHERE comp_type_id = 1234
     * $query->filterByCompTypeId(array(12, 34)); // WHERE comp_type_id IN (12, 34)
     * $query->filterByCompTypeId(array('min' => 12)); // WHERE comp_type_id >= 12
     * $query->filterByCompTypeId(array('max' => 12)); // WHERE comp_type_id <= 12
     * </code>
     *
     * @see       filterByRbtrfubloodcomponenttype()
     *
     * @param     mixed $compTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByCompTypeId($compTypeId = null, $comparison = null)
    {
        if (is_array($compTypeId)) {
            $useMinMax = false;
            if (isset($compTypeId['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::COMP_TYPE_ID, $compTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($compTypeId['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::COMP_TYPE_ID, $compTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::COMP_TYPE_ID, $compTypeId, $comparison);
    }

    /**
     * Filter the query on the blood_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBloodTypeId(1234); // WHERE blood_type_id = 1234
     * $query->filterByBloodTypeId(array(12, 34)); // WHERE blood_type_id IN (12, 34)
     * $query->filterByBloodTypeId(array('min' => 12)); // WHERE blood_type_id >= 12
     * $query->filterByBloodTypeId(array('max' => 12)); // WHERE blood_type_id <= 12
     * </code>
     *
     * @see       filterByRbbloodtype()
     *
     * @param     mixed $bloodTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByBloodTypeId($bloodTypeId = null, $comparison = null)
    {
        if (is_array($bloodTypeId)) {
            $useMinMax = false;
            if (isset($bloodTypeId['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::BLOOD_TYPE_ID, $bloodTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bloodTypeId['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::BLOOD_TYPE_ID, $bloodTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::BLOOD_TYPE_ID, $bloodTypeId, $comparison);
    }

    /**
     * Filter the query on the volume column
     *
     * Example usage:
     * <code>
     * $query->filterByVolume(1234); // WHERE volume = 1234
     * $query->filterByVolume(array(12, 34)); // WHERE volume IN (12, 34)
     * $query->filterByVolume(array('min' => 12)); // WHERE volume >= 12
     * $query->filterByVolume(array('max' => 12)); // WHERE volume <= 12
     * </code>
     *
     * @param     mixed $volume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByVolume($volume = null, $comparison = null)
    {
        if (is_array($volume)) {
            $useMinMax = false;
            if (isset($volume['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::VOLUME, $volume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volume['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::VOLUME, $volume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::VOLUME, $volume, $comparison);
    }

    /**
     * Filter the query on the dose_count column
     *
     * Example usage:
     * <code>
     * $query->filterByDoseCount(1234); // WHERE dose_count = 1234
     * $query->filterByDoseCount(array(12, 34)); // WHERE dose_count IN (12, 34)
     * $query->filterByDoseCount(array('min' => 12)); // WHERE dose_count >= 12
     * $query->filterByDoseCount(array('max' => 12)); // WHERE dose_count <= 12
     * </code>
     *
     * @param     mixed $doseCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByDoseCount($doseCount = null, $comparison = null)
    {
        if (is_array($doseCount)) {
            $useMinMax = false;
            if (isset($doseCount['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::DOSE_COUNT, $doseCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doseCount['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::DOSE_COUNT, $doseCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::DOSE_COUNT, $doseCount, $comparison);
    }

    /**
     * Filter the query on the trfu_donor_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTrfuDonorId(1234); // WHERE trfu_donor_id = 1234
     * $query->filterByTrfuDonorId(array(12, 34)); // WHERE trfu_donor_id IN (12, 34)
     * $query->filterByTrfuDonorId(array('min' => 12)); // WHERE trfu_donor_id >= 12
     * $query->filterByTrfuDonorId(array('max' => 12)); // WHERE trfu_donor_id <= 12
     * </code>
     *
     * @param     mixed $trfuDonorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function filterByTrfuDonorId($trfuDonorId = null, $comparison = null)
    {
        if (is_array($trfuDonorId)) {
            $useMinMax = false;
            if (isset($trfuDonorId['min'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::TRFU_DONOR_ID, $trfuDonorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trfuDonorId['max'])) {
                $this->addUsingAlias(TrfuorderissueresultPeer::TRFU_DONOR_ID, $trfuDonorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrfuorderissueresultPeer::TRFU_DONOR_ID, $trfuDonorId, $comparison);
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrfuorderissueresultQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(TrfuorderissueresultPeer::ACTION_ID, $action->getId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrfuorderissueresultPeer::ACTION_ID, $action->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return TrfuorderissueresultQuery The current query, for fluid interface
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
     * Filter the query by a related Rbtrfubloodcomponenttype object
     *
     * @param   Rbtrfubloodcomponenttype|PropelObjectCollection $rbtrfubloodcomponenttype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrfuorderissueresultQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtrfubloodcomponenttype($rbtrfubloodcomponenttype, $comparison = null)
    {
        if ($rbtrfubloodcomponenttype instanceof Rbtrfubloodcomponenttype) {
            return $this
                ->addUsingAlias(TrfuorderissueresultPeer::COMP_TYPE_ID, $rbtrfubloodcomponenttype->getId(), $comparison);
        } elseif ($rbtrfubloodcomponenttype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrfuorderissueresultPeer::COMP_TYPE_ID, $rbtrfubloodcomponenttype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtrfubloodcomponenttype() only accepts arguments of type Rbtrfubloodcomponenttype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtrfubloodcomponenttype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function joinRbtrfubloodcomponenttype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtrfubloodcomponenttype');

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
            $this->addJoinObject($join, 'Rbtrfubloodcomponenttype');
        }

        return $this;
    }

    /**
     * Use the Rbtrfubloodcomponenttype relation Rbtrfubloodcomponenttype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtrfubloodcomponenttypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtrfubloodcomponenttypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbtrfubloodcomponenttype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtrfubloodcomponenttype', '\Webmis\Models\RbtrfubloodcomponenttypeQuery');
    }

    /**
     * Filter the query by a related Rbbloodtype object
     *
     * @param   Rbbloodtype|PropelObjectCollection $rbbloodtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TrfuorderissueresultQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbbloodtype($rbbloodtype, $comparison = null)
    {
        if ($rbbloodtype instanceof Rbbloodtype) {
            return $this
                ->addUsingAlias(TrfuorderissueresultPeer::BLOOD_TYPE_ID, $rbbloodtype->getId(), $comparison);
        } elseif ($rbbloodtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TrfuorderissueresultPeer::BLOOD_TYPE_ID, $rbbloodtype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbbloodtype() only accepts arguments of type Rbbloodtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbbloodtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function joinRbbloodtype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbbloodtype');

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
            $this->addJoinObject($join, 'Rbbloodtype');
        }

        return $this;
    }

    /**
     * Use the Rbbloodtype relation Rbbloodtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbbloodtypeQuery A secondary query class using the current class as primary query
     */
    public function useRbbloodtypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbbloodtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbbloodtype', '\Webmis\Models\RbbloodtypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Trfuorderissueresult $trfuorderissueresult Object to remove from the list of results
     *
     * @return TrfuorderissueresultQuery The current query, for fluid interface
     */
    public function prune($trfuorderissueresult = null)
    {
        if ($trfuorderissueresult) {
            $this->addUsingAlias(TrfuorderissueresultPeer::ID, $trfuorderissueresult->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
