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
use Webmis\Models\EventPayment;
use Webmis\Models\EventPaymentPeer;
use Webmis\Models\EventPaymentQuery;
use Webmis\Models\Rbcashoperation;

/**
 * Base class that represents a query for the 'Event_Payment' table.
 *
 *
 *
 * @method EventPaymentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventPaymentQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method EventPaymentQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method EventPaymentQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method EventPaymentQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method EventPaymentQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EventPaymentQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method EventPaymentQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method EventPaymentQuery orderByCashoperationId($order = Criteria::ASC) Order by the cashOperation_id column
 * @method EventPaymentQuery orderBySum($order = Criteria::ASC) Order by the sum column
 * @method EventPaymentQuery orderByTypepayment($order = Criteria::ASC) Order by the typePayment column
 * @method EventPaymentQuery orderBySettlementaccount($order = Criteria::ASC) Order by the settlementAccount column
 * @method EventPaymentQuery orderByBankId($order = Criteria::ASC) Order by the bank_id column
 * @method EventPaymentQuery orderByNumbercreditcard($order = Criteria::ASC) Order by the numberCreditCard column
 * @method EventPaymentQuery orderByCashbox($order = Criteria::ASC) Order by the cashBox column
 *
 * @method EventPaymentQuery groupById() Group by the id column
 * @method EventPaymentQuery groupByCreatedatetime() Group by the createDatetime column
 * @method EventPaymentQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method EventPaymentQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method EventPaymentQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method EventPaymentQuery groupByDeleted() Group by the deleted column
 * @method EventPaymentQuery groupByMasterId() Group by the master_id column
 * @method EventPaymentQuery groupByDate() Group by the date column
 * @method EventPaymentQuery groupByCashoperationId() Group by the cashOperation_id column
 * @method EventPaymentQuery groupBySum() Group by the sum column
 * @method EventPaymentQuery groupByTypepayment() Group by the typePayment column
 * @method EventPaymentQuery groupBySettlementaccount() Group by the settlementAccount column
 * @method EventPaymentQuery groupByBankId() Group by the bank_id column
 * @method EventPaymentQuery groupByNumbercreditcard() Group by the numberCreditCard column
 * @method EventPaymentQuery groupByCashbox() Group by the cashBox column
 *
 * @method EventPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventPaymentQuery leftJoinRbcashoperation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbcashoperation relation
 * @method EventPaymentQuery rightJoinRbcashoperation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbcashoperation relation
 * @method EventPaymentQuery innerJoinRbcashoperation($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbcashoperation relation
 *
 * @method EventPayment findOne(PropelPDO $con = null) Return the first EventPayment matching the query
 * @method EventPayment findOneOrCreate(PropelPDO $con = null) Return the first EventPayment matching the query, or a new EventPayment object populated from the query conditions when no match is found
 *
 * @method EventPayment findOneByCreatedatetime(string $createDatetime) Return the first EventPayment filtered by the createDatetime column
 * @method EventPayment findOneByCreatepersonId(int $createPerson_id) Return the first EventPayment filtered by the createPerson_id column
 * @method EventPayment findOneByModifydatetime(string $modifyDatetime) Return the first EventPayment filtered by the modifyDatetime column
 * @method EventPayment findOneByModifypersonId(int $modifyPerson_id) Return the first EventPayment filtered by the modifyPerson_id column
 * @method EventPayment findOneByDeleted(boolean $deleted) Return the first EventPayment filtered by the deleted column
 * @method EventPayment findOneByMasterId(int $master_id) Return the first EventPayment filtered by the master_id column
 * @method EventPayment findOneByDate(string $date) Return the first EventPayment filtered by the date column
 * @method EventPayment findOneByCashoperationId(int $cashOperation_id) Return the first EventPayment filtered by the cashOperation_id column
 * @method EventPayment findOneBySum(double $sum) Return the first EventPayment filtered by the sum column
 * @method EventPayment findOneByTypepayment(boolean $typePayment) Return the first EventPayment filtered by the typePayment column
 * @method EventPayment findOneBySettlementaccount(string $settlementAccount) Return the first EventPayment filtered by the settlementAccount column
 * @method EventPayment findOneByBankId(int $bank_id) Return the first EventPayment filtered by the bank_id column
 * @method EventPayment findOneByNumbercreditcard(string $numberCreditCard) Return the first EventPayment filtered by the numberCreditCard column
 * @method EventPayment findOneByCashbox(string $cashBox) Return the first EventPayment filtered by the cashBox column
 *
 * @method array findById(int $id) Return EventPayment objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return EventPayment objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return EventPayment objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return EventPayment objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return EventPayment objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return EventPayment objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return EventPayment objects filtered by the master_id column
 * @method array findByDate(string $date) Return EventPayment objects filtered by the date column
 * @method array findByCashoperationId(int $cashOperation_id) Return EventPayment objects filtered by the cashOperation_id column
 * @method array findBySum(double $sum) Return EventPayment objects filtered by the sum column
 * @method array findByTypepayment(boolean $typePayment) Return EventPayment objects filtered by the typePayment column
 * @method array findBySettlementaccount(string $settlementAccount) Return EventPayment objects filtered by the settlementAccount column
 * @method array findByBankId(int $bank_id) Return EventPayment objects filtered by the bank_id column
 * @method array findByNumbercreditcard(string $numberCreditCard) Return EventPayment objects filtered by the numberCreditCard column
 * @method array findByCashbox(string $cashBox) Return EventPayment objects filtered by the cashBox column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventPaymentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventPaymentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\EventPayment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventPaymentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventPaymentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventPaymentQuery) {
            return $criteria;
        }
        $query = new EventPaymentQuery();
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
     * @return   EventPayment|EventPayment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventPaymentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventPaymentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 EventPayment A model object, or null if the key is not found
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
     * @return                 EventPayment A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `master_id`, `date`, `cashOperation_id`, `sum`, `typePayment`, `settlementAccount`, `bank_id`, `numberCreditCard`, `cashBox` FROM `Event_Payment` WHERE `id` = :p0';
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
            $obj = new EventPayment();
            $obj->hydrate($row);
            EventPaymentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return EventPayment|EventPayment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|EventPayment[]|mixed the list of results, formatted by the current formatter
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventPaymentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventPaymentPeer::ID, $keys, Criteria::IN);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventPaymentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventPaymentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::ID, $id, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(EventPaymentPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(EventPaymentPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(EventPaymentPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(EventPaymentPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(EventPaymentPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(EventPaymentPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(EventPaymentPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(EventPaymentPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPaymentPeer::DELETED, $deleted, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(EventPaymentPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(EventPaymentPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::MASTER_ID, $masterId, $comparison);
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
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(EventPaymentPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(EventPaymentPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the cashOperation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCashoperationId(1234); // WHERE cashOperation_id = 1234
     * $query->filterByCashoperationId(array(12, 34)); // WHERE cashOperation_id IN (12, 34)
     * $query->filterByCashoperationId(array('min' => 12)); // WHERE cashOperation_id >= 12
     * $query->filterByCashoperationId(array('max' => 12)); // WHERE cashOperation_id <= 12
     * </code>
     *
     * @see       filterByRbcashoperation()
     *
     * @param     mixed $cashoperationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByCashoperationId($cashoperationId = null, $comparison = null)
    {
        if (is_array($cashoperationId)) {
            $useMinMax = false;
            if (isset($cashoperationId['min'])) {
                $this->addUsingAlias(EventPaymentPeer::CASHOPERATION_ID, $cashoperationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cashoperationId['max'])) {
                $this->addUsingAlias(EventPaymentPeer::CASHOPERATION_ID, $cashoperationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::CASHOPERATION_ID, $cashoperationId, $comparison);
    }

    /**
     * Filter the query on the sum column
     *
     * Example usage:
     * <code>
     * $query->filterBySum(1234); // WHERE sum = 1234
     * $query->filterBySum(array(12, 34)); // WHERE sum IN (12, 34)
     * $query->filterBySum(array('min' => 12)); // WHERE sum >= 12
     * $query->filterBySum(array('max' => 12)); // WHERE sum <= 12
     * </code>
     *
     * @param     mixed $sum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterBySum($sum = null, $comparison = null)
    {
        if (is_array($sum)) {
            $useMinMax = false;
            if (isset($sum['min'])) {
                $this->addUsingAlias(EventPaymentPeer::SUM, $sum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sum['max'])) {
                $this->addUsingAlias(EventPaymentPeer::SUM, $sum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::SUM, $sum, $comparison);
    }

    /**
     * Filter the query on the typePayment column
     *
     * Example usage:
     * <code>
     * $query->filterByTypepayment(true); // WHERE typePayment = true
     * $query->filterByTypepayment('yes'); // WHERE typePayment = true
     * </code>
     *
     * @param     boolean|string $typepayment The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByTypepayment($typepayment = null, $comparison = null)
    {
        if (is_string($typepayment)) {
            $typepayment = in_array(strtolower($typepayment), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPaymentPeer::TYPEPAYMENT, $typepayment, $comparison);
    }

    /**
     * Filter the query on the settlementAccount column
     *
     * Example usage:
     * <code>
     * $query->filterBySettlementaccount('fooValue');   // WHERE settlementAccount = 'fooValue'
     * $query->filterBySettlementaccount('%fooValue%'); // WHERE settlementAccount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $settlementaccount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterBySettlementaccount($settlementaccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($settlementaccount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $settlementaccount)) {
                $settlementaccount = str_replace('*', '%', $settlementaccount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::SETTLEMENTACCOUNT, $settlementaccount, $comparison);
    }

    /**
     * Filter the query on the bank_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBankId(1234); // WHERE bank_id = 1234
     * $query->filterByBankId(array(12, 34)); // WHERE bank_id IN (12, 34)
     * $query->filterByBankId(array('min' => 12)); // WHERE bank_id >= 12
     * $query->filterByBankId(array('max' => 12)); // WHERE bank_id <= 12
     * </code>
     *
     * @param     mixed $bankId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByBankId($bankId = null, $comparison = null)
    {
        if (is_array($bankId)) {
            $useMinMax = false;
            if (isset($bankId['min'])) {
                $this->addUsingAlias(EventPaymentPeer::BANK_ID, $bankId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankId['max'])) {
                $this->addUsingAlias(EventPaymentPeer::BANK_ID, $bankId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::BANK_ID, $bankId, $comparison);
    }

    /**
     * Filter the query on the numberCreditCard column
     *
     * Example usage:
     * <code>
     * $query->filterByNumbercreditcard('fooValue');   // WHERE numberCreditCard = 'fooValue'
     * $query->filterByNumbercreditcard('%fooValue%'); // WHERE numberCreditCard LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numbercreditcard The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByNumbercreditcard($numbercreditcard = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numbercreditcard)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numbercreditcard)) {
                $numbercreditcard = str_replace('*', '%', $numbercreditcard);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::NUMBERCREDITCARD, $numbercreditcard, $comparison);
    }

    /**
     * Filter the query on the cashBox column
     *
     * Example usage:
     * <code>
     * $query->filterByCashbox('fooValue');   // WHERE cashBox = 'fooValue'
     * $query->filterByCashbox('%fooValue%'); // WHERE cashBox LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cashbox The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function filterByCashbox($cashbox = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cashbox)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cashbox)) {
                $cashbox = str_replace('*', '%', $cashbox);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPaymentPeer::CASHBOX, $cashbox, $comparison);
    }

    /**
     * Filter the query by a related Rbcashoperation object
     *
     * @param   Rbcashoperation|PropelObjectCollection $rbcashoperation The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventPaymentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbcashoperation($rbcashoperation, $comparison = null)
    {
        if ($rbcashoperation instanceof Rbcashoperation) {
            return $this
                ->addUsingAlias(EventPaymentPeer::CASHOPERATION_ID, $rbcashoperation->getId(), $comparison);
        } elseif ($rbcashoperation instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPaymentPeer::CASHOPERATION_ID, $rbcashoperation->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbcashoperation() only accepts arguments of type Rbcashoperation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbcashoperation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function joinRbcashoperation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbcashoperation');

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
            $this->addJoinObject($join, 'Rbcashoperation');
        }

        return $this;
    }

    /**
     * Use the Rbcashoperation relation Rbcashoperation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbcashoperationQuery A secondary query class using the current class as primary query
     */
    public function useRbcashoperationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbcashoperation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbcashoperation', '\Webmis\Models\RbcashoperationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   EventPayment $eventPayment Object to remove from the list of results
     *
     * @return EventPaymentQuery The current query, for fluid interface
     */
    public function prune($eventPayment = null)
    {
        if ($eventPayment) {
            $this->addUsingAlias(EventPaymentPeer::ID, $eventPayment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
