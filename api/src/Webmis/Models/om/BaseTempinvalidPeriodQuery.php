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
use Webmis\Models\TempinvalidPeriod;
use Webmis\Models\TempinvalidPeriodPeer;
use Webmis\Models\TempinvalidPeriodQuery;

/**
 * Base class that represents a query for the 'TempInvalid_Period' table.
 *
 *
 *
 * @method TempinvalidPeriodQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TempinvalidPeriodQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method TempinvalidPeriodQuery orderByDiagnosisId($order = Criteria::ASC) Order by the diagnosis_id column
 * @method TempinvalidPeriodQuery orderByBegpersonId($order = Criteria::ASC) Order by the begPerson_id column
 * @method TempinvalidPeriodQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method TempinvalidPeriodQuery orderByEndpersonId($order = Criteria::ASC) Order by the endPerson_id column
 * @method TempinvalidPeriodQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method TempinvalidPeriodQuery orderByIsexternal($order = Criteria::ASC) Order by the isExternal column
 * @method TempinvalidPeriodQuery orderByRegimeId($order = Criteria::ASC) Order by the regime_id column
 * @method TempinvalidPeriodQuery orderByBreakId($order = Criteria::ASC) Order by the break_id column
 * @method TempinvalidPeriodQuery orderByResultId($order = Criteria::ASC) Order by the result_id column
 * @method TempinvalidPeriodQuery orderByNote($order = Criteria::ASC) Order by the note column
 *
 * @method TempinvalidPeriodQuery groupById() Group by the id column
 * @method TempinvalidPeriodQuery groupByMasterId() Group by the master_id column
 * @method TempinvalidPeriodQuery groupByDiagnosisId() Group by the diagnosis_id column
 * @method TempinvalidPeriodQuery groupByBegpersonId() Group by the begPerson_id column
 * @method TempinvalidPeriodQuery groupByBegdate() Group by the begDate column
 * @method TempinvalidPeriodQuery groupByEndpersonId() Group by the endPerson_id column
 * @method TempinvalidPeriodQuery groupByEnddate() Group by the endDate column
 * @method TempinvalidPeriodQuery groupByIsexternal() Group by the isExternal column
 * @method TempinvalidPeriodQuery groupByRegimeId() Group by the regime_id column
 * @method TempinvalidPeriodQuery groupByBreakId() Group by the break_id column
 * @method TempinvalidPeriodQuery groupByResultId() Group by the result_id column
 * @method TempinvalidPeriodQuery groupByNote() Group by the note column
 *
 * @method TempinvalidPeriodQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TempinvalidPeriodQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TempinvalidPeriodQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TempinvalidPeriod findOne(PropelPDO $con = null) Return the first TempinvalidPeriod matching the query
 * @method TempinvalidPeriod findOneOrCreate(PropelPDO $con = null) Return the first TempinvalidPeriod matching the query, or a new TempinvalidPeriod object populated from the query conditions when no match is found
 *
 * @method TempinvalidPeriod findOneByMasterId(int $master_id) Return the first TempinvalidPeriod filtered by the master_id column
 * @method TempinvalidPeriod findOneByDiagnosisId(int $diagnosis_id) Return the first TempinvalidPeriod filtered by the diagnosis_id column
 * @method TempinvalidPeriod findOneByBegpersonId(int $begPerson_id) Return the first TempinvalidPeriod filtered by the begPerson_id column
 * @method TempinvalidPeriod findOneByBegdate(string $begDate) Return the first TempinvalidPeriod filtered by the begDate column
 * @method TempinvalidPeriod findOneByEndpersonId(int $endPerson_id) Return the first TempinvalidPeriod filtered by the endPerson_id column
 * @method TempinvalidPeriod findOneByEnddate(string $endDate) Return the first TempinvalidPeriod filtered by the endDate column
 * @method TempinvalidPeriod findOneByIsexternal(boolean $isExternal) Return the first TempinvalidPeriod filtered by the isExternal column
 * @method TempinvalidPeriod findOneByRegimeId(int $regime_id) Return the first TempinvalidPeriod filtered by the regime_id column
 * @method TempinvalidPeriod findOneByBreakId(int $break_id) Return the first TempinvalidPeriod filtered by the break_id column
 * @method TempinvalidPeriod findOneByResultId(int $result_id) Return the first TempinvalidPeriod filtered by the result_id column
 * @method TempinvalidPeriod findOneByNote(string $note) Return the first TempinvalidPeriod filtered by the note column
 *
 * @method array findById(int $id) Return TempinvalidPeriod objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return TempinvalidPeriod objects filtered by the master_id column
 * @method array findByDiagnosisId(int $diagnosis_id) Return TempinvalidPeriod objects filtered by the diagnosis_id column
 * @method array findByBegpersonId(int $begPerson_id) Return TempinvalidPeriod objects filtered by the begPerson_id column
 * @method array findByBegdate(string $begDate) Return TempinvalidPeriod objects filtered by the begDate column
 * @method array findByEndpersonId(int $endPerson_id) Return TempinvalidPeriod objects filtered by the endPerson_id column
 * @method array findByEnddate(string $endDate) Return TempinvalidPeriod objects filtered by the endDate column
 * @method array findByIsexternal(boolean $isExternal) Return TempinvalidPeriod objects filtered by the isExternal column
 * @method array findByRegimeId(int $regime_id) Return TempinvalidPeriod objects filtered by the regime_id column
 * @method array findByBreakId(int $break_id) Return TempinvalidPeriod objects filtered by the break_id column
 * @method array findByResultId(int $result_id) Return TempinvalidPeriod objects filtered by the result_id column
 * @method array findByNote(string $note) Return TempinvalidPeriod objects filtered by the note column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTempinvalidPeriodQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTempinvalidPeriodQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\TempinvalidPeriod', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TempinvalidPeriodQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TempinvalidPeriodQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TempinvalidPeriodQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TempinvalidPeriodQuery) {
            return $criteria;
        }
        $query = new TempinvalidPeriodQuery();
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
     * @return   TempinvalidPeriod|TempinvalidPeriod[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TempinvalidPeriodPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeriodPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TempinvalidPeriod A model object, or null if the key is not found
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
     * @return                 TempinvalidPeriod A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `diagnosis_id`, `begPerson_id`, `begDate`, `endPerson_id`, `endDate`, `isExternal`, `regime_id`, `break_id`, `result_id`, `note` FROM `TempInvalid_Period` WHERE `id` = :p0';
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
            $obj = new TempinvalidPeriod();
            $obj->hydrate($row);
            TempinvalidPeriodPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TempinvalidPeriod|TempinvalidPeriod[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TempinvalidPeriod[]|mixed the list of results, formatted by the current formatter
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
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TempinvalidPeriodPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TempinvalidPeriodPeer::ID, $keys, Criteria::IN);
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
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::ID, $id, $comparison);
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
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the diagnosis_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiagnosisId(1234); // WHERE diagnosis_id = 1234
     * $query->filterByDiagnosisId(array(12, 34)); // WHERE diagnosis_id IN (12, 34)
     * $query->filterByDiagnosisId(array('min' => 12)); // WHERE diagnosis_id >= 12
     * $query->filterByDiagnosisId(array('max' => 12)); // WHERE diagnosis_id <= 12
     * </code>
     *
     * @param     mixed $diagnosisId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByDiagnosisId($diagnosisId = null, $comparison = null)
    {
        if (is_array($diagnosisId)) {
            $useMinMax = false;
            if (isset($diagnosisId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::DIAGNOSIS_ID, $diagnosisId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diagnosisId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::DIAGNOSIS_ID, $diagnosisId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::DIAGNOSIS_ID, $diagnosisId, $comparison);
    }

    /**
     * Filter the query on the begPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBegpersonId(1234); // WHERE begPerson_id = 1234
     * $query->filterByBegpersonId(array(12, 34)); // WHERE begPerson_id IN (12, 34)
     * $query->filterByBegpersonId(array('min' => 12)); // WHERE begPerson_id >= 12
     * $query->filterByBegpersonId(array('max' => 12)); // WHERE begPerson_id <= 12
     * </code>
     *
     * @param     mixed $begpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByBegpersonId($begpersonId = null, $comparison = null)
    {
        if (is_array($begpersonId)) {
            $useMinMax = false;
            if (isset($begpersonId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::BEGPERSON_ID, $begpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begpersonId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::BEGPERSON_ID, $begpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::BEGPERSON_ID, $begpersonId, $comparison);
    }

    /**
     * Filter the query on the begDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBegdate('2011-03-14'); // WHERE begDate = '2011-03-14'
     * $query->filterByBegdate('now'); // WHERE begDate = '2011-03-14'
     * $query->filterByBegdate(array('max' => 'yesterday')); // WHERE begDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $begdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::BEGDATE, $begdate, $comparison);
    }

    /**
     * Filter the query on the endPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEndpersonId(1234); // WHERE endPerson_id = 1234
     * $query->filterByEndpersonId(array(12, 34)); // WHERE endPerson_id IN (12, 34)
     * $query->filterByEndpersonId(array('min' => 12)); // WHERE endPerson_id >= 12
     * $query->filterByEndpersonId(array('max' => 12)); // WHERE endPerson_id <= 12
     * </code>
     *
     * @param     mixed $endpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByEndpersonId($endpersonId = null, $comparison = null)
    {
        if (is_array($endpersonId)) {
            $useMinMax = false;
            if (isset($endpersonId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::ENDPERSON_ID, $endpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endpersonId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::ENDPERSON_ID, $endpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::ENDPERSON_ID, $endpersonId, $comparison);
    }

    /**
     * Filter the query on the endDate column
     *
     * Example usage:
     * <code>
     * $query->filterByEnddate('2011-03-14'); // WHERE endDate = '2011-03-14'
     * $query->filterByEnddate('now'); // WHERE endDate = '2011-03-14'
     * $query->filterByEnddate(array('max' => 'yesterday')); // WHERE endDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $enddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the isExternal column
     *
     * Example usage:
     * <code>
     * $query->filterByIsexternal(true); // WHERE isExternal = true
     * $query->filterByIsexternal('yes'); // WHERE isExternal = true
     * </code>
     *
     * @param     boolean|string $isexternal The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByIsexternal($isexternal = null, $comparison = null)
    {
        if (is_string($isexternal)) {
            $isexternal = in_array(strtolower($isexternal), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::ISEXTERNAL, $isexternal, $comparison);
    }

    /**
     * Filter the query on the regime_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegimeId(1234); // WHERE regime_id = 1234
     * $query->filterByRegimeId(array(12, 34)); // WHERE regime_id IN (12, 34)
     * $query->filterByRegimeId(array('min' => 12)); // WHERE regime_id >= 12
     * $query->filterByRegimeId(array('max' => 12)); // WHERE regime_id <= 12
     * </code>
     *
     * @param     mixed $regimeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByRegimeId($regimeId = null, $comparison = null)
    {
        if (is_array($regimeId)) {
            $useMinMax = false;
            if (isset($regimeId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::REGIME_ID, $regimeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regimeId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::REGIME_ID, $regimeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::REGIME_ID, $regimeId, $comparison);
    }

    /**
     * Filter the query on the break_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBreakId(1234); // WHERE break_id = 1234
     * $query->filterByBreakId(array(12, 34)); // WHERE break_id IN (12, 34)
     * $query->filterByBreakId(array('min' => 12)); // WHERE break_id >= 12
     * $query->filterByBreakId(array('max' => 12)); // WHERE break_id <= 12
     * </code>
     *
     * @param     mixed $breakId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByBreakId($breakId = null, $comparison = null)
    {
        if (is_array($breakId)) {
            $useMinMax = false;
            if (isset($breakId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::BREAK_ID, $breakId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($breakId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::BREAK_ID, $breakId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::BREAK_ID, $breakId, $comparison);
    }

    /**
     * Filter the query on the result_id column
     *
     * Example usage:
     * <code>
     * $query->filterByResultId(1234); // WHERE result_id = 1234
     * $query->filterByResultId(array(12, 34)); // WHERE result_id IN (12, 34)
     * $query->filterByResultId(array('min' => 12)); // WHERE result_id >= 12
     * $query->filterByResultId(array('max' => 12)); // WHERE result_id <= 12
     * </code>
     *
     * @param     mixed $resultId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByResultId($resultId = null, $comparison = null)
    {
        if (is_array($resultId)) {
            $useMinMax = false;
            if (isset($resultId['min'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::RESULT_ID, $resultId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($resultId['max'])) {
                $this->addUsingAlias(TempinvalidPeriodPeer::RESULT_ID, $resultId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::RESULT_ID, $resultId, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TempinvalidPeriodPeer::NOTE, $note, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   TempinvalidPeriod $tempinvalidPeriod Object to remove from the list of results
     *
     * @return TempinvalidPeriodQuery The current query, for fluid interface
     */
    public function prune($tempinvalidPeriod = null)
    {
        if ($tempinvalidPeriod) {
            $this->addUsingAlias(TempinvalidPeriodPeer::ID, $tempinvalidPeriod->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
