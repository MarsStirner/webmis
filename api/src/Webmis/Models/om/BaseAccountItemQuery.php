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
use Webmis\Models\AccountItem;
use Webmis\Models\AccountItemPeer;
use Webmis\Models\AccountItemQuery;

/**
 * Base class that represents a query for the 'Account_Item' table.
 *
 *
 *
 * @method AccountItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AccountItemQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method AccountItemQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method AccountItemQuery orderByServicedate($order = Criteria::ASC) Order by the serviceDate column
 * @method AccountItemQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method AccountItemQuery orderByVisitId($order = Criteria::ASC) Order by the visit_id column
 * @method AccountItemQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method AccountItemQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method AccountItemQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method AccountItemQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method AccountItemQuery orderByUet($order = Criteria::ASC) Order by the uet column
 * @method AccountItemQuery orderBySum($order = Criteria::ASC) Order by the sum column
 * @method AccountItemQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method AccountItemQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method AccountItemQuery orderByRefusetypeId($order = Criteria::ASC) Order by the refuseType_id column
 * @method AccountItemQuery orderByReexposeitemId($order = Criteria::ASC) Order by the reexposeItem_id column
 * @method AccountItemQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method AccountItemQuery orderByTariffId($order = Criteria::ASC) Order by the tariff_id column
 * @method AccountItemQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 *
 * @method AccountItemQuery groupById() Group by the id column
 * @method AccountItemQuery groupByDeleted() Group by the deleted column
 * @method AccountItemQuery groupByMasterId() Group by the master_id column
 * @method AccountItemQuery groupByServicedate() Group by the serviceDate column
 * @method AccountItemQuery groupByEventId() Group by the event_id column
 * @method AccountItemQuery groupByVisitId() Group by the visit_id column
 * @method AccountItemQuery groupByActionId() Group by the action_id column
 * @method AccountItemQuery groupByPrice() Group by the price column
 * @method AccountItemQuery groupByUnitId() Group by the unit_id column
 * @method AccountItemQuery groupByAmount() Group by the amount column
 * @method AccountItemQuery groupByUet() Group by the uet column
 * @method AccountItemQuery groupBySum() Group by the sum column
 * @method AccountItemQuery groupByDate() Group by the date column
 * @method AccountItemQuery groupByNumber() Group by the number column
 * @method AccountItemQuery groupByRefusetypeId() Group by the refuseType_id column
 * @method AccountItemQuery groupByReexposeitemId() Group by the reexposeItem_id column
 * @method AccountItemQuery groupByNote() Group by the note column
 * @method AccountItemQuery groupByTariffId() Group by the tariff_id column
 * @method AccountItemQuery groupByServiceId() Group by the service_id column
 *
 * @method AccountItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AccountItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AccountItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AccountItem findOne(PropelPDO $con = null) Return the first AccountItem matching the query
 * @method AccountItem findOneOrCreate(PropelPDO $con = null) Return the first AccountItem matching the query, or a new AccountItem object populated from the query conditions when no match is found
 *
 * @method AccountItem findOneByDeleted(boolean $deleted) Return the first AccountItem filtered by the deleted column
 * @method AccountItem findOneByMasterId(int $master_id) Return the first AccountItem filtered by the master_id column
 * @method AccountItem findOneByServicedate(string $serviceDate) Return the first AccountItem filtered by the serviceDate column
 * @method AccountItem findOneByEventId(int $event_id) Return the first AccountItem filtered by the event_id column
 * @method AccountItem findOneByVisitId(int $visit_id) Return the first AccountItem filtered by the visit_id column
 * @method AccountItem findOneByActionId(int $action_id) Return the first AccountItem filtered by the action_id column
 * @method AccountItem findOneByPrice(double $price) Return the first AccountItem filtered by the price column
 * @method AccountItem findOneByUnitId(int $unit_id) Return the first AccountItem filtered by the unit_id column
 * @method AccountItem findOneByAmount(double $amount) Return the first AccountItem filtered by the amount column
 * @method AccountItem findOneByUet(double $uet) Return the first AccountItem filtered by the uet column
 * @method AccountItem findOneBySum(double $sum) Return the first AccountItem filtered by the sum column
 * @method AccountItem findOneByDate(string $date) Return the first AccountItem filtered by the date column
 * @method AccountItem findOneByNumber(string $number) Return the first AccountItem filtered by the number column
 * @method AccountItem findOneByRefusetypeId(int $refuseType_id) Return the first AccountItem filtered by the refuseType_id column
 * @method AccountItem findOneByReexposeitemId(int $reexposeItem_id) Return the first AccountItem filtered by the reexposeItem_id column
 * @method AccountItem findOneByNote(string $note) Return the first AccountItem filtered by the note column
 * @method AccountItem findOneByTariffId(int $tariff_id) Return the first AccountItem filtered by the tariff_id column
 * @method AccountItem findOneByServiceId(int $service_id) Return the first AccountItem filtered by the service_id column
 *
 * @method array findById(int $id) Return AccountItem objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return AccountItem objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return AccountItem objects filtered by the master_id column
 * @method array findByServicedate(string $serviceDate) Return AccountItem objects filtered by the serviceDate column
 * @method array findByEventId(int $event_id) Return AccountItem objects filtered by the event_id column
 * @method array findByVisitId(int $visit_id) Return AccountItem objects filtered by the visit_id column
 * @method array findByActionId(int $action_id) Return AccountItem objects filtered by the action_id column
 * @method array findByPrice(double $price) Return AccountItem objects filtered by the price column
 * @method array findByUnitId(int $unit_id) Return AccountItem objects filtered by the unit_id column
 * @method array findByAmount(double $amount) Return AccountItem objects filtered by the amount column
 * @method array findByUet(double $uet) Return AccountItem objects filtered by the uet column
 * @method array findBySum(double $sum) Return AccountItem objects filtered by the sum column
 * @method array findByDate(string $date) Return AccountItem objects filtered by the date column
 * @method array findByNumber(string $number) Return AccountItem objects filtered by the number column
 * @method array findByRefusetypeId(int $refuseType_id) Return AccountItem objects filtered by the refuseType_id column
 * @method array findByReexposeitemId(int $reexposeItem_id) Return AccountItem objects filtered by the reexposeItem_id column
 * @method array findByNote(string $note) Return AccountItem objects filtered by the note column
 * @method array findByTariffId(int $tariff_id) Return AccountItem objects filtered by the tariff_id column
 * @method array findByServiceId(int $service_id) Return AccountItem objects filtered by the service_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseAccountItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAccountItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\AccountItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AccountItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AccountItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AccountItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AccountItemQuery) {
            return $criteria;
        }
        $query = new AccountItemQuery();
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
     * @return   AccountItem|AccountItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AccountItemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AccountItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AccountItem A model object, or null if the key is not found
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
     * @return                 AccountItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `master_id`, `serviceDate`, `event_id`, `visit_id`, `action_id`, `price`, `unit_id`, `amount`, `uet`, `sum`, `date`, `number`, `refuseType_id`, `reexposeItem_id`, `note`, `tariff_id`, `service_id` FROM `Account_Item` WHERE `id` = :p0';
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
            $obj = new AccountItem();
            $obj->hydrate($row);
            AccountItemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AccountItem|AccountItem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AccountItem[]|mixed the list of results, formatted by the current formatter
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AccountItemPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AccountItemPeer::ID, $keys, Criteria::IN);
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AccountItemPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AccountItemPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::ID, $id, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AccountItemPeer::DELETED, $deleted, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(AccountItemPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(AccountItemPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the serviceDate column
     *
     * Example usage:
     * <code>
     * $query->filterByServicedate('2011-03-14'); // WHERE serviceDate = '2011-03-14'
     * $query->filterByServicedate('now'); // WHERE serviceDate = '2011-03-14'
     * $query->filterByServicedate(array('max' => 'yesterday')); // WHERE serviceDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $servicedate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByServicedate($servicedate = null, $comparison = null)
    {
        if (is_array($servicedate)) {
            $useMinMax = false;
            if (isset($servicedate['min'])) {
                $this->addUsingAlias(AccountItemPeer::SERVICEDATE, $servicedate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($servicedate['max'])) {
                $this->addUsingAlias(AccountItemPeer::SERVICEDATE, $servicedate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::SERVICEDATE, $servicedate, $comparison);
    }

    /**
     * Filter the query on the event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventId(1234); // WHERE event_id = 1234
     * $query->filterByEventId(array(12, 34)); // WHERE event_id IN (12, 34)
     * $query->filterByEventId(array('min' => 12)); // WHERE event_id >= 12
     * $query->filterByEventId(array('max' => 12)); // WHERE event_id <= 12
     * </code>
     *
     * @param     mixed $eventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(AccountItemPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(AccountItemPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the visit_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVisitId(1234); // WHERE visit_id = 1234
     * $query->filterByVisitId(array(12, 34)); // WHERE visit_id IN (12, 34)
     * $query->filterByVisitId(array('min' => 12)); // WHERE visit_id >= 12
     * $query->filterByVisitId(array('max' => 12)); // WHERE visit_id <= 12
     * </code>
     *
     * @param     mixed $visitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByVisitId($visitId = null, $comparison = null)
    {
        if (is_array($visitId)) {
            $useMinMax = false;
            if (isset($visitId['min'])) {
                $this->addUsingAlias(AccountItemPeer::VISIT_ID, $visitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visitId['max'])) {
                $this->addUsingAlias(AccountItemPeer::VISIT_ID, $visitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::VISIT_ID, $visitId, $comparison);
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
     * @param     mixed $actionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(AccountItemPeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(AccountItemPeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price >= 12
     * $query->filterByPrice(array('max' => 12)); // WHERE price <= 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(AccountItemPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(AccountItemPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::PRICE, $price, $comparison);
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
     * @param     mixed $unitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(AccountItemPeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(AccountItemPeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::UNIT_ID, $unitId, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(AccountItemPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(AccountItemPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the uet column
     *
     * Example usage:
     * <code>
     * $query->filterByUet(1234); // WHERE uet = 1234
     * $query->filterByUet(array(12, 34)); // WHERE uet IN (12, 34)
     * $query->filterByUet(array('min' => 12)); // WHERE uet >= 12
     * $query->filterByUet(array('max' => 12)); // WHERE uet <= 12
     * </code>
     *
     * @param     mixed $uet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByUet($uet = null, $comparison = null)
    {
        if (is_array($uet)) {
            $useMinMax = false;
            if (isset($uet['min'])) {
                $this->addUsingAlias(AccountItemPeer::UET, $uet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uet['max'])) {
                $this->addUsingAlias(AccountItemPeer::UET, $uet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::UET, $uet, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterBySum($sum = null, $comparison = null)
    {
        if (is_array($sum)) {
            $useMinMax = false;
            if (isset($sum['min'])) {
                $this->addUsingAlias(AccountItemPeer::SUM, $sum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sum['max'])) {
                $this->addUsingAlias(AccountItemPeer::SUM, $sum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::SUM, $sum, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(AccountItemPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(AccountItemPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::DATE, $date, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AccountItemPeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the refuseType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRefusetypeId(1234); // WHERE refuseType_id = 1234
     * $query->filterByRefusetypeId(array(12, 34)); // WHERE refuseType_id IN (12, 34)
     * $query->filterByRefusetypeId(array('min' => 12)); // WHERE refuseType_id >= 12
     * $query->filterByRefusetypeId(array('max' => 12)); // WHERE refuseType_id <= 12
     * </code>
     *
     * @param     mixed $refusetypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByRefusetypeId($refusetypeId = null, $comparison = null)
    {
        if (is_array($refusetypeId)) {
            $useMinMax = false;
            if (isset($refusetypeId['min'])) {
                $this->addUsingAlias(AccountItemPeer::REFUSETYPE_ID, $refusetypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($refusetypeId['max'])) {
                $this->addUsingAlias(AccountItemPeer::REFUSETYPE_ID, $refusetypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::REFUSETYPE_ID, $refusetypeId, $comparison);
    }

    /**
     * Filter the query on the reexposeItem_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReexposeitemId(1234); // WHERE reexposeItem_id = 1234
     * $query->filterByReexposeitemId(array(12, 34)); // WHERE reexposeItem_id IN (12, 34)
     * $query->filterByReexposeitemId(array('min' => 12)); // WHERE reexposeItem_id >= 12
     * $query->filterByReexposeitemId(array('max' => 12)); // WHERE reexposeItem_id <= 12
     * </code>
     *
     * @param     mixed $reexposeitemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByReexposeitemId($reexposeitemId = null, $comparison = null)
    {
        if (is_array($reexposeitemId)) {
            $useMinMax = false;
            if (isset($reexposeitemId['min'])) {
                $this->addUsingAlias(AccountItemPeer::REEXPOSEITEM_ID, $reexposeitemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reexposeitemId['max'])) {
                $this->addUsingAlias(AccountItemPeer::REEXPOSEITEM_ID, $reexposeitemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::REEXPOSEITEM_ID, $reexposeitemId, $comparison);
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
     * @return AccountItemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AccountItemPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the tariff_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTariffId(1234); // WHERE tariff_id = 1234
     * $query->filterByTariffId(array(12, 34)); // WHERE tariff_id IN (12, 34)
     * $query->filterByTariffId(array('min' => 12)); // WHERE tariff_id >= 12
     * $query->filterByTariffId(array('max' => 12)); // WHERE tariff_id <= 12
     * </code>
     *
     * @param     mixed $tariffId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByTariffId($tariffId = null, $comparison = null)
    {
        if (is_array($tariffId)) {
            $useMinMax = false;
            if (isset($tariffId['min'])) {
                $this->addUsingAlias(AccountItemPeer::TARIFF_ID, $tariffId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tariffId['max'])) {
                $this->addUsingAlias(AccountItemPeer::TARIFF_ID, $tariffId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::TARIFF_ID, $tariffId, $comparison);
    }

    /**
     * Filter the query on the service_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceId(1234); // WHERE service_id = 1234
     * $query->filterByServiceId(array(12, 34)); // WHERE service_id IN (12, 34)
     * $query->filterByServiceId(array('min' => 12)); // WHERE service_id >= 12
     * $query->filterByServiceId(array('max' => 12)); // WHERE service_id <= 12
     * </code>
     *
     * @param     mixed $serviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(AccountItemPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(AccountItemPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountItemPeer::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   AccountItem $accountItem Object to remove from the list of results
     *
     * @return AccountItemQuery The current query, for fluid interface
     */
    public function prune($accountItem = null)
    {
        if ($accountItem) {
            $this->addUsingAlias(AccountItemPeer::ID, $accountItem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
