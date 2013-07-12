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
use Webmis\Models\Tempinvalidduplicate;
use Webmis\Models\TempinvalidduplicatePeer;
use Webmis\Models\TempinvalidduplicateQuery;

/**
 * Base class that represents a query for the 'TempInvalidDuplicate' table.
 *
 *
 *
 * @method TempinvalidduplicateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TempinvalidduplicateQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method TempinvalidduplicateQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method TempinvalidduplicateQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method TempinvalidduplicateQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method TempinvalidduplicateQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method TempinvalidduplicateQuery orderByTempinvalidId($order = Criteria::ASC) Order by the tempInvalid_id column
 * @method TempinvalidduplicateQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method TempinvalidduplicateQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method TempinvalidduplicateQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method TempinvalidduplicateQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method TempinvalidduplicateQuery orderByDestination($order = Criteria::ASC) Order by the destination column
 * @method TempinvalidduplicateQuery orderByReasonId($order = Criteria::ASC) Order by the reason_id column
 * @method TempinvalidduplicateQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method TempinvalidduplicateQuery orderByInsuranceofficemark($order = Criteria::ASC) Order by the insuranceOfficeMark column
 *
 * @method TempinvalidduplicateQuery groupById() Group by the id column
 * @method TempinvalidduplicateQuery groupByCreatedatetime() Group by the createDatetime column
 * @method TempinvalidduplicateQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method TempinvalidduplicateQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method TempinvalidduplicateQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method TempinvalidduplicateQuery groupByDeleted() Group by the deleted column
 * @method TempinvalidduplicateQuery groupByTempinvalidId() Group by the tempInvalid_id column
 * @method TempinvalidduplicateQuery groupByPersonId() Group by the person_id column
 * @method TempinvalidduplicateQuery groupByDate() Group by the date column
 * @method TempinvalidduplicateQuery groupBySerial() Group by the serial column
 * @method TempinvalidduplicateQuery groupByNumber() Group by the number column
 * @method TempinvalidduplicateQuery groupByDestination() Group by the destination column
 * @method TempinvalidduplicateQuery groupByReasonId() Group by the reason_id column
 * @method TempinvalidduplicateQuery groupByNote() Group by the note column
 * @method TempinvalidduplicateQuery groupByInsuranceofficemark() Group by the insuranceOfficeMark column
 *
 * @method TempinvalidduplicateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TempinvalidduplicateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TempinvalidduplicateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Tempinvalidduplicate findOne(PropelPDO $con = null) Return the first Tempinvalidduplicate matching the query
 * @method Tempinvalidduplicate findOneOrCreate(PropelPDO $con = null) Return the first Tempinvalidduplicate matching the query, or a new Tempinvalidduplicate object populated from the query conditions when no match is found
 *
 * @method Tempinvalidduplicate findOneByCreatedatetime(string $createDatetime) Return the first Tempinvalidduplicate filtered by the createDatetime column
 * @method Tempinvalidduplicate findOneByCreatepersonId(int $createPerson_id) Return the first Tempinvalidduplicate filtered by the createPerson_id column
 * @method Tempinvalidduplicate findOneByModifydatetime(string $modifyDatetime) Return the first Tempinvalidduplicate filtered by the modifyDatetime column
 * @method Tempinvalidduplicate findOneByModifypersonId(int $modifyPerson_id) Return the first Tempinvalidduplicate filtered by the modifyPerson_id column
 * @method Tempinvalidduplicate findOneByDeleted(boolean $deleted) Return the first Tempinvalidduplicate filtered by the deleted column
 * @method Tempinvalidduplicate findOneByTempinvalidId(int $tempInvalid_id) Return the first Tempinvalidduplicate filtered by the tempInvalid_id column
 * @method Tempinvalidduplicate findOneByPersonId(int $person_id) Return the first Tempinvalidduplicate filtered by the person_id column
 * @method Tempinvalidduplicate findOneByDate(string $date) Return the first Tempinvalidduplicate filtered by the date column
 * @method Tempinvalidduplicate findOneBySerial(string $serial) Return the first Tempinvalidduplicate filtered by the serial column
 * @method Tempinvalidduplicate findOneByNumber(string $number) Return the first Tempinvalidduplicate filtered by the number column
 * @method Tempinvalidduplicate findOneByDestination(string $destination) Return the first Tempinvalidduplicate filtered by the destination column
 * @method Tempinvalidduplicate findOneByReasonId(int $reason_id) Return the first Tempinvalidduplicate filtered by the reason_id column
 * @method Tempinvalidduplicate findOneByNote(string $note) Return the first Tempinvalidduplicate filtered by the note column
 * @method Tempinvalidduplicate findOneByInsuranceofficemark(int $insuranceOfficeMark) Return the first Tempinvalidduplicate filtered by the insuranceOfficeMark column
 *
 * @method array findById(int $id) Return Tempinvalidduplicate objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Tempinvalidduplicate objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Tempinvalidduplicate objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Tempinvalidduplicate objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Tempinvalidduplicate objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Tempinvalidduplicate objects filtered by the deleted column
 * @method array findByTempinvalidId(int $tempInvalid_id) Return Tempinvalidduplicate objects filtered by the tempInvalid_id column
 * @method array findByPersonId(int $person_id) Return Tempinvalidduplicate objects filtered by the person_id column
 * @method array findByDate(string $date) Return Tempinvalidduplicate objects filtered by the date column
 * @method array findBySerial(string $serial) Return Tempinvalidduplicate objects filtered by the serial column
 * @method array findByNumber(string $number) Return Tempinvalidduplicate objects filtered by the number column
 * @method array findByDestination(string $destination) Return Tempinvalidduplicate objects filtered by the destination column
 * @method array findByReasonId(int $reason_id) Return Tempinvalidduplicate objects filtered by the reason_id column
 * @method array findByNote(string $note) Return Tempinvalidduplicate objects filtered by the note column
 * @method array findByInsuranceofficemark(int $insuranceOfficeMark) Return Tempinvalidduplicate objects filtered by the insuranceOfficeMark column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTempinvalidduplicateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTempinvalidduplicateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Tempinvalidduplicate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TempinvalidduplicateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TempinvalidduplicateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TempinvalidduplicateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TempinvalidduplicateQuery) {
            return $criteria;
        }
        $query = new TempinvalidduplicateQuery();
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
     * @return   Tempinvalidduplicate|Tempinvalidduplicate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TempinvalidduplicatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidduplicatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tempinvalidduplicate A model object, or null if the key is not found
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
     * @return                 Tempinvalidduplicate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `tempInvalid_id`, `person_id`, `date`, `serial`, `number`, `destination`, `reason_id`, `note`, `insuranceOfficeMark` FROM `TempInvalidDuplicate` WHERE `id` = :p0';
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
            $obj = new Tempinvalidduplicate();
            $obj->hydrate($row);
            TempinvalidduplicatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tempinvalidduplicate|Tempinvalidduplicate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tempinvalidduplicate[]|mixed the list of results, formatted by the current formatter
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
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TempinvalidduplicatePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TempinvalidduplicatePeer::ID, $keys, Criteria::IN);
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
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the createDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedatetime('2011-03-14'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime('now'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime(array('max' => 'yesterday')); // WHERE createDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::CREATEDATETIME, $createdatetime, $comparison);
    }

    /**
     * Filter the query on the createPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatepersonId(1234); // WHERE createPerson_id = 1234
     * $query->filterByCreatepersonId(array(12, 34)); // WHERE createPerson_id IN (12, 34)
     * $query->filterByCreatepersonId(array('min' => 12)); // WHERE createPerson_id >= 12
     * $query->filterByCreatepersonId(array('max' => 12)); // WHERE createPerson_id <= 12
     * </code>
     *
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::CREATEPERSON_ID, $createpersonId, $comparison);
    }

    /**
     * Filter the query on the modifyDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByModifydatetime('2011-03-14'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime('now'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime(array('max' => 'yesterday')); // WHERE modifyDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifydatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::MODIFYDATETIME, $modifydatetime, $comparison);
    }

    /**
     * Filter the query on the modifyPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModifypersonId(1234); // WHERE modifyPerson_id = 1234
     * $query->filterByModifypersonId(array(12, 34)); // WHERE modifyPerson_id IN (12, 34)
     * $query->filterByModifypersonId(array('min' => 12)); // WHERE modifyPerson_id >= 12
     * $query->filterByModifypersonId(array('max' => 12)); // WHERE modifyPerson_id <= 12
     * </code>
     *
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the tempInvalid_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTempinvalidId(1234); // WHERE tempInvalid_id = 1234
     * $query->filterByTempinvalidId(array(12, 34)); // WHERE tempInvalid_id IN (12, 34)
     * $query->filterByTempinvalidId(array('min' => 12)); // WHERE tempInvalid_id >= 12
     * $query->filterByTempinvalidId(array('max' => 12)); // WHERE tempInvalid_id <= 12
     * </code>
     *
     * @param     mixed $tempinvalidId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByTempinvalidId($tempinvalidId = null, $comparison = null)
    {
        if (is_array($tempinvalidId)) {
            $useMinMax = false;
            if (isset($tempinvalidId['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::TEMPINVALID_ID, $tempinvalidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tempinvalidId['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::TEMPINVALID_ID, $tempinvalidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::TEMPINVALID_ID, $tempinvalidId, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id >= 12
     * $query->filterByPersonId(array('max' => 12)); // WHERE person_id <= 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the serial column
     *
     * Example usage:
     * <code>
     * $query->filterBySerial('fooValue');   // WHERE serial = 'fooValue'
     * $query->filterBySerial('%fooValue%'); // WHERE serial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterBySerial($serial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serial)) {
                $serial = str_replace('*', '%', $serial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::SERIAL, $serial, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber('fooValue');   // WHERE number = 'fooValue'
     * $query->filterByNumber('%fooValue%'); // WHERE number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $number The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($number)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $number)) {
                $number = str_replace('*', '%', $number);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the destination column
     *
     * Example usage:
     * <code>
     * $query->filterByDestination('fooValue');   // WHERE destination = 'fooValue'
     * $query->filterByDestination('%fooValue%'); // WHERE destination LIKE '%fooValue%'
     * </code>
     *
     * @param     string $destination The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByDestination($destination = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($destination)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $destination)) {
                $destination = str_replace('*', '%', $destination);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::DESTINATION, $destination, $comparison);
    }

    /**
     * Filter the query on the reason_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReasonId(1234); // WHERE reason_id = 1234
     * $query->filterByReasonId(array(12, 34)); // WHERE reason_id IN (12, 34)
     * $query->filterByReasonId(array('min' => 12)); // WHERE reason_id >= 12
     * $query->filterByReasonId(array('max' => 12)); // WHERE reason_id <= 12
     * </code>
     *
     * @param     mixed $reasonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByReasonId($reasonId = null, $comparison = null)
    {
        if (is_array($reasonId)) {
            $useMinMax = false;
            if (isset($reasonId['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::REASON_ID, $reasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reasonId['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::REASON_ID, $reasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::REASON_ID, $reasonId, $comparison);
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
     * @return TempinvalidduplicateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TempinvalidduplicatePeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the insuranceOfficeMark column
     *
     * Example usage:
     * <code>
     * $query->filterByInsuranceofficemark(1234); // WHERE insuranceOfficeMark = 1234
     * $query->filterByInsuranceofficemark(array(12, 34)); // WHERE insuranceOfficeMark IN (12, 34)
     * $query->filterByInsuranceofficemark(array('min' => 12)); // WHERE insuranceOfficeMark >= 12
     * $query->filterByInsuranceofficemark(array('max' => 12)); // WHERE insuranceOfficeMark <= 12
     * </code>
     *
     * @param     mixed $insuranceofficemark The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function filterByInsuranceofficemark($insuranceofficemark = null, $comparison = null)
    {
        if (is_array($insuranceofficemark)) {
            $useMinMax = false;
            if (isset($insuranceofficemark['min'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::INSURANCEOFFICEMARK, $insuranceofficemark['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceofficemark['max'])) {
                $this->addUsingAlias(TempinvalidduplicatePeer::INSURANCEOFFICEMARK, $insuranceofficemark['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidduplicatePeer::INSURANCEOFFICEMARK, $insuranceofficemark, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Tempinvalidduplicate $tempinvalidduplicate Object to remove from the list of results
     *
     * @return TempinvalidduplicateQuery The current query, for fluid interface
     */
    public function prune($tempinvalidduplicate = null)
    {
        if ($tempinvalidduplicate) {
            $this->addUsingAlias(TempinvalidduplicatePeer::ID, $tempinvalidduplicate->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
