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
use Webmis\Models\Client;
use Webmis\Models\Person;
use Webmis\Models\Rbtissuetype;
use Webmis\Models\Rbunit;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\TakentissuejournalPeer;
use Webmis\Models\TakentissuejournalQuery;

/**
 * Base class that represents a query for the 'TakenTissueJournal' table.
 *
 *
 *
 * @method TakentissuejournalQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TakentissuejournalQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method TakentissuejournalQuery orderByTissuetypeId($order = Criteria::ASC) Order by the tissueType_id column
 * @method TakentissuejournalQuery orderByExternalid($order = Criteria::ASC) Order by the externalId column
 * @method TakentissuejournalQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method TakentissuejournalQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method TakentissuejournalQuery orderByDatetimetaken($order = Criteria::ASC) Order by the datetimeTaken column
 * @method TakentissuejournalQuery orderByExecpersonId($order = Criteria::ASC) Order by the execPerson_id column
 * @method TakentissuejournalQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method TakentissuejournalQuery orderByBarcode($order = Criteria::ASC) Order by the barcode column
 * @method TakentissuejournalQuery orderByPeriod($order = Criteria::ASC) Order by the period column
 *
 * @method TakentissuejournalQuery groupById() Group by the id column
 * @method TakentissuejournalQuery groupByClientId() Group by the client_id column
 * @method TakentissuejournalQuery groupByTissuetypeId() Group by the tissueType_id column
 * @method TakentissuejournalQuery groupByExternalid() Group by the externalId column
 * @method TakentissuejournalQuery groupByAmount() Group by the amount column
 * @method TakentissuejournalQuery groupByUnitId() Group by the unit_id column
 * @method TakentissuejournalQuery groupByDatetimetaken() Group by the datetimeTaken column
 * @method TakentissuejournalQuery groupByExecpersonId() Group by the execPerson_id column
 * @method TakentissuejournalQuery groupByNote() Group by the note column
 * @method TakentissuejournalQuery groupByBarcode() Group by the barcode column
 * @method TakentissuejournalQuery groupByPeriod() Group by the period column
 *
 * @method TakentissuejournalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TakentissuejournalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TakentissuejournalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TakentissuejournalQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method TakentissuejournalQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method TakentissuejournalQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method TakentissuejournalQuery leftJoinRbtissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtissuetype relation
 * @method TakentissuejournalQuery rightJoinRbtissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtissuetype relation
 * @method TakentissuejournalQuery innerJoinRbtissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtissuetype relation
 *
 * @method TakentissuejournalQuery leftJoinRbunit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbunit relation
 * @method TakentissuejournalQuery rightJoinRbunit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbunit relation
 * @method TakentissuejournalQuery innerJoinRbunit($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbunit relation
 *
 * @method TakentissuejournalQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method TakentissuejournalQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method TakentissuejournalQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method TakentissuejournalQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method TakentissuejournalQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method TakentissuejournalQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method Takentissuejournal findOne(PropelPDO $con = null) Return the first Takentissuejournal matching the query
 * @method Takentissuejournal findOneOrCreate(PropelPDO $con = null) Return the first Takentissuejournal matching the query, or a new Takentissuejournal object populated from the query conditions when no match is found
 *
 * @method Takentissuejournal findOneByClientId(int $client_id) Return the first Takentissuejournal filtered by the client_id column
 * @method Takentissuejournal findOneByTissuetypeId(int $tissueType_id) Return the first Takentissuejournal filtered by the tissueType_id column
 * @method Takentissuejournal findOneByExternalid(string $externalId) Return the first Takentissuejournal filtered by the externalId column
 * @method Takentissuejournal findOneByAmount(int $amount) Return the first Takentissuejournal filtered by the amount column
 * @method Takentissuejournal findOneByUnitId(int $unit_id) Return the first Takentissuejournal filtered by the unit_id column
 * @method Takentissuejournal findOneByDatetimetaken(string $datetimeTaken) Return the first Takentissuejournal filtered by the datetimeTaken column
 * @method Takentissuejournal findOneByExecpersonId(int $execPerson_id) Return the first Takentissuejournal filtered by the execPerson_id column
 * @method Takentissuejournal findOneByNote(string $note) Return the first Takentissuejournal filtered by the note column
 * @method Takentissuejournal findOneByBarcode(int $barcode) Return the first Takentissuejournal filtered by the barcode column
 * @method Takentissuejournal findOneByPeriod(int $period) Return the first Takentissuejournal filtered by the period column
 *
 * @method array findById(int $id) Return Takentissuejournal objects filtered by the id column
 * @method array findByClientId(int $client_id) Return Takentissuejournal objects filtered by the client_id column
 * @method array findByTissuetypeId(int $tissueType_id) Return Takentissuejournal objects filtered by the tissueType_id column
 * @method array findByExternalid(string $externalId) Return Takentissuejournal objects filtered by the externalId column
 * @method array findByAmount(int $amount) Return Takentissuejournal objects filtered by the amount column
 * @method array findByUnitId(int $unit_id) Return Takentissuejournal objects filtered by the unit_id column
 * @method array findByDatetimetaken(string $datetimeTaken) Return Takentissuejournal objects filtered by the datetimeTaken column
 * @method array findByExecpersonId(int $execPerson_id) Return Takentissuejournal objects filtered by the execPerson_id column
 * @method array findByNote(string $note) Return Takentissuejournal objects filtered by the note column
 * @method array findByBarcode(int $barcode) Return Takentissuejournal objects filtered by the barcode column
 * @method array findByPeriod(int $period) Return Takentissuejournal objects filtered by the period column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTakentissuejournalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTakentissuejournalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Takentissuejournal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TakentissuejournalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TakentissuejournalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TakentissuejournalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TakentissuejournalQuery) {
            return $criteria;
        }
        $query = new TakentissuejournalQuery();
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
     * @return   Takentissuejournal|Takentissuejournal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TakentissuejournalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TakentissuejournalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Takentissuejournal A model object, or null if the key is not found
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
     * @return                 Takentissuejournal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `client_id`, `tissueType_id`, `externalId`, `amount`, `unit_id`, `datetimeTaken`, `execPerson_id`, `note`, `barcode`, `period` FROM `TakenTissueJournal` WHERE `id` = :p0';
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
            $obj = new Takentissuejournal();
            $obj->hydrate($row);
            TakentissuejournalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Takentissuejournal|Takentissuejournal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Takentissuejournal[]|mixed the list of results, formatted by the current formatter
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
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TakentissuejournalPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TakentissuejournalPeer::ID, $keys, Criteria::IN);
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
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::ID, $id, $comparison);
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
     * @see       filterByClient()
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the tissueType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTissuetypeId(1234); // WHERE tissueType_id = 1234
     * $query->filterByTissuetypeId(array(12, 34)); // WHERE tissueType_id IN (12, 34)
     * $query->filterByTissuetypeId(array('min' => 12)); // WHERE tissueType_id >= 12
     * $query->filterByTissuetypeId(array('max' => 12)); // WHERE tissueType_id <= 12
     * </code>
     *
     * @see       filterByRbtissuetype()
     *
     * @param     mixed $tissuetypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByTissuetypeId($tissuetypeId = null, $comparison = null)
    {
        if (is_array($tissuetypeId)) {
            $useMinMax = false;
            if (isset($tissuetypeId['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::TISSUETYPE_ID, $tissuetypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tissuetypeId['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::TISSUETYPE_ID, $tissuetypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::TISSUETYPE_ID, $tissuetypeId, $comparison);
    }

    /**
     * Filter the query on the externalId column
     *
     * Example usage:
     * <code>
     * $query->filterByExternalid('fooValue');   // WHERE externalId = 'fooValue'
     * $query->filterByExternalid('%fooValue%'); // WHERE externalId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $externalid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByExternalid($externalid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($externalid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $externalid)) {
                $externalid = str_replace('*', '%', $externalid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::EXTERNALID, $externalid, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount >= 12
     * $query->filterByAmount(array('max' => 12)); // WHERE amount <= 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the unit_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitId(1234); // WHERE unit_id = 1234
     * $query->filterByUnitId(array(12, 34)); // WHERE unit_id IN (12, 34)
     * $query->filterByUnitId(array('min' => 12)); // WHERE unit_id >= 12
     * $query->filterByUnitId(array('max' => 12)); // WHERE unit_id <= 12
     * </code>
     *
     * @see       filterByRbunit()
     *
     * @param     mixed $unitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::UNIT_ID, $unitId, $comparison);
    }

    /**
     * Filter the query on the datetimeTaken column
     *
     * Example usage:
     * <code>
     * $query->filterByDatetimetaken('2011-03-14'); // WHERE datetimeTaken = '2011-03-14'
     * $query->filterByDatetimetaken('now'); // WHERE datetimeTaken = '2011-03-14'
     * $query->filterByDatetimetaken(array('max' => 'yesterday')); // WHERE datetimeTaken > '2011-03-13'
     * </code>
     *
     * @param     mixed $datetimetaken The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByDatetimetaken($datetimetaken = null, $comparison = null)
    {
        if (is_array($datetimetaken)) {
            $useMinMax = false;
            if (isset($datetimetaken['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::DATETIMETAKEN, $datetimetaken['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datetimetaken['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::DATETIMETAKEN, $datetimetaken['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::DATETIMETAKEN, $datetimetaken, $comparison);
    }

    /**
     * Filter the query on the execPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExecpersonId(1234); // WHERE execPerson_id = 1234
     * $query->filterByExecpersonId(array(12, 34)); // WHERE execPerson_id IN (12, 34)
     * $query->filterByExecpersonId(array('min' => 12)); // WHERE execPerson_id >= 12
     * $query->filterByExecpersonId(array('max' => 12)); // WHERE execPerson_id <= 12
     * </code>
     *
     * @see       filterByPerson()
     *
     * @param     mixed $execpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByExecpersonId($execpersonId = null, $comparison = null)
    {
        if (is_array($execpersonId)) {
            $useMinMax = false;
            if (isset($execpersonId['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::EXECPERSON_ID, $execpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($execpersonId['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::EXECPERSON_ID, $execpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::EXECPERSON_ID, $execpersonId, $comparison);
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
     * @return TakentissuejournalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TakentissuejournalPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the barcode column
     *
     * Example usage:
     * <code>
     * $query->filterByBarcode(1234); // WHERE barcode = 1234
     * $query->filterByBarcode(array(12, 34)); // WHERE barcode IN (12, 34)
     * $query->filterByBarcode(array('min' => 12)); // WHERE barcode >= 12
     * $query->filterByBarcode(array('max' => 12)); // WHERE barcode <= 12
     * </code>
     *
     * @param     mixed $barcode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByBarcode($barcode = null, $comparison = null)
    {
        if (is_array($barcode)) {
            $useMinMax = false;
            if (isset($barcode['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::BARCODE, $barcode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($barcode['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::BARCODE, $barcode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::BARCODE, $barcode, $comparison);
    }

    /**
     * Filter the query on the period column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriod(1234); // WHERE period = 1234
     * $query->filterByPeriod(array(12, 34)); // WHERE period IN (12, 34)
     * $query->filterByPeriod(array('min' => 12)); // WHERE period >= 12
     * $query->filterByPeriod(array('max' => 12)); // WHERE period <= 12
     * </code>
     *
     * @param     mixed $period The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function filterByPeriod($period = null, $comparison = null)
    {
        if (is_array($period)) {
            $useMinMax = false;
            if (isset($period['min'])) {
                $this->addUsingAlias(TakentissuejournalPeer::PERIOD, $period['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($period['max'])) {
                $this->addUsingAlias(TakentissuejournalPeer::PERIOD, $period['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TakentissuejournalPeer::PERIOD, $period, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TakentissuejournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(TakentissuejournalPeer::CLIENT_ID, $client->getId(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TakentissuejournalPeer::CLIENT_ID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', '\Webmis\Models\ClientQuery');
    }

    /**
     * Filter the query by a related Rbtissuetype object
     *
     * @param   Rbtissuetype|PropelObjectCollection $rbtissuetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TakentissuejournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtissuetype($rbtissuetype, $comparison = null)
    {
        if ($rbtissuetype instanceof Rbtissuetype) {
            return $this
                ->addUsingAlias(TakentissuejournalPeer::TISSUETYPE_ID, $rbtissuetype->getId(), $comparison);
        } elseif ($rbtissuetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TakentissuejournalPeer::TISSUETYPE_ID, $rbtissuetype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtissuetype() only accepts arguments of type Rbtissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtissuetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function joinRbtissuetype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtissuetype');

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
            $this->addJoinObject($join, 'Rbtissuetype');
        }

        return $this;
    }

    /**
     * Use the Rbtissuetype relation Rbtissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtissuetypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtissuetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtissuetype', '\Webmis\Models\RbtissuetypeQuery');
    }

    /**
     * Filter the query by a related Rbunit object
     *
     * @param   Rbunit|PropelObjectCollection $rbunit The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TakentissuejournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbunit($rbunit, $comparison = null)
    {
        if ($rbunit instanceof Rbunit) {
            return $this
                ->addUsingAlias(TakentissuejournalPeer::UNIT_ID, $rbunit->getId(), $comparison);
        } elseif ($rbunit instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TakentissuejournalPeer::UNIT_ID, $rbunit->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbunit() only accepts arguments of type Rbunit or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbunit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function joinRbunit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbunit');

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
            $this->addJoinObject($join, 'Rbunit');
        }

        return $this;
    }

    /**
     * Use the Rbunit relation Rbunit object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbunitQuery A secondary query class using the current class as primary query
     */
    public function useRbunitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbunit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbunit', '\Webmis\Models\RbunitQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TakentissuejournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerson($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(TakentissuejournalPeer::EXECPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TakentissuejournalPeer::EXECPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPerson() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function joinPerson($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person');

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
            $this->addJoinObject($join, 'Person');
        }

        return $this;
    }

    /**
     * Use the Person relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TakentissuejournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(TakentissuejournalPeer::ID, $action->getTakentissuejournalId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            return $this
                ->useActionQuery()
                ->filterByPrimaryKeys($action->getPrimaryKeys())
                ->endUse();
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
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function joinAction($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useActionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Action', '\Webmis\Models\ActionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Takentissuejournal $takentissuejournal Object to remove from the list of results
     *
     * @return TakentissuejournalQuery The current query, for fluid interface
     */
    public function prune($takentissuejournal = null)
    {
        if ($takentissuejournal) {
            $this->addUsingAlias(TakentissuejournalPeer::ID, $takentissuejournal->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
