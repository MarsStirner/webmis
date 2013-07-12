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
use Webmis\Models\Account;
use Webmis\Models\AccountPeer;
use Webmis\Models\AccountQuery;

/**
 * Base class that represents a query for the 'Account' table.
 *
 *
 *
 * @method AccountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AccountQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method AccountQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method AccountQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method AccountQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method AccountQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method AccountQuery orderByContractId($order = Criteria::ASC) Order by the contract_id column
 * @method AccountQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method AccountQuery orderByPayerId($order = Criteria::ASC) Order by the payer_id column
 * @method AccountQuery orderBySettledate($order = Criteria::ASC) Order by the settleDate column
 * @method AccountQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method AccountQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method AccountQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method AccountQuery orderByUet($order = Criteria::ASC) Order by the uet column
 * @method AccountQuery orderBySum($order = Criteria::ASC) Order by the sum column
 * @method AccountQuery orderByExposedate($order = Criteria::ASC) Order by the exposeDate column
 * @method AccountQuery orderByPayedamount($order = Criteria::ASC) Order by the payedAmount column
 * @method AccountQuery orderByPayedsum($order = Criteria::ASC) Order by the payedSum column
 * @method AccountQuery orderByRefusedamount($order = Criteria::ASC) Order by the refusedAmount column
 * @method AccountQuery orderByRefusedsum($order = Criteria::ASC) Order by the refusedSum column
 * @method AccountQuery orderByFormatId($order = Criteria::ASC) Order by the format_id column
 *
 * @method AccountQuery groupById() Group by the id column
 * @method AccountQuery groupByCreatedatetime() Group by the createDatetime column
 * @method AccountQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method AccountQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method AccountQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method AccountQuery groupByDeleted() Group by the deleted column
 * @method AccountQuery groupByContractId() Group by the contract_id column
 * @method AccountQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method AccountQuery groupByPayerId() Group by the payer_id column
 * @method AccountQuery groupBySettledate() Group by the settleDate column
 * @method AccountQuery groupByNumber() Group by the number column
 * @method AccountQuery groupByDate() Group by the date column
 * @method AccountQuery groupByAmount() Group by the amount column
 * @method AccountQuery groupByUet() Group by the uet column
 * @method AccountQuery groupBySum() Group by the sum column
 * @method AccountQuery groupByExposedate() Group by the exposeDate column
 * @method AccountQuery groupByPayedamount() Group by the payedAmount column
 * @method AccountQuery groupByPayedsum() Group by the payedSum column
 * @method AccountQuery groupByRefusedamount() Group by the refusedAmount column
 * @method AccountQuery groupByRefusedsum() Group by the refusedSum column
 * @method AccountQuery groupByFormatId() Group by the format_id column
 *
 * @method AccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Account findOne(PropelPDO $con = null) Return the first Account matching the query
 * @method Account findOneOrCreate(PropelPDO $con = null) Return the first Account matching the query, or a new Account object populated from the query conditions when no match is found
 *
 * @method Account findOneByCreatedatetime(string $createDatetime) Return the first Account filtered by the createDatetime column
 * @method Account findOneByCreatepersonId(int $createPerson_id) Return the first Account filtered by the createPerson_id column
 * @method Account findOneByModifydatetime(string $modifyDatetime) Return the first Account filtered by the modifyDatetime column
 * @method Account findOneByModifypersonId(int $modifyPerson_id) Return the first Account filtered by the modifyPerson_id column
 * @method Account findOneByDeleted(boolean $deleted) Return the first Account filtered by the deleted column
 * @method Account findOneByContractId(int $contract_id) Return the first Account filtered by the contract_id column
 * @method Account findOneByOrgstructureId(int $orgStructure_id) Return the first Account filtered by the orgStructure_id column
 * @method Account findOneByPayerId(int $payer_id) Return the first Account filtered by the payer_id column
 * @method Account findOneBySettledate(string $settleDate) Return the first Account filtered by the settleDate column
 * @method Account findOneByNumber(string $number) Return the first Account filtered by the number column
 * @method Account findOneByDate(string $date) Return the first Account filtered by the date column
 * @method Account findOneByAmount(double $amount) Return the first Account filtered by the amount column
 * @method Account findOneByUet(double $uet) Return the first Account filtered by the uet column
 * @method Account findOneBySum(double $sum) Return the first Account filtered by the sum column
 * @method Account findOneByExposedate(string $exposeDate) Return the first Account filtered by the exposeDate column
 * @method Account findOneByPayedamount(double $payedAmount) Return the first Account filtered by the payedAmount column
 * @method Account findOneByPayedsum(double $payedSum) Return the first Account filtered by the payedSum column
 * @method Account findOneByRefusedamount(double $refusedAmount) Return the first Account filtered by the refusedAmount column
 * @method Account findOneByRefusedsum(double $refusedSum) Return the first Account filtered by the refusedSum column
 * @method Account findOneByFormatId(int $format_id) Return the first Account filtered by the format_id column
 *
 * @method array findById(int $id) Return Account objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Account objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Account objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Account objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Account objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Account objects filtered by the deleted column
 * @method array findByContractId(int $contract_id) Return Account objects filtered by the contract_id column
 * @method array findByOrgstructureId(int $orgStructure_id) Return Account objects filtered by the orgStructure_id column
 * @method array findByPayerId(int $payer_id) Return Account objects filtered by the payer_id column
 * @method array findBySettledate(string $settleDate) Return Account objects filtered by the settleDate column
 * @method array findByNumber(string $number) Return Account objects filtered by the number column
 * @method array findByDate(string $date) Return Account objects filtered by the date column
 * @method array findByAmount(double $amount) Return Account objects filtered by the amount column
 * @method array findByUet(double $uet) Return Account objects filtered by the uet column
 * @method array findBySum(double $sum) Return Account objects filtered by the sum column
 * @method array findByExposedate(string $exposeDate) Return Account objects filtered by the exposeDate column
 * @method array findByPayedamount(double $payedAmount) Return Account objects filtered by the payedAmount column
 * @method array findByPayedsum(double $payedSum) Return Account objects filtered by the payedSum column
 * @method array findByRefusedamount(double $refusedAmount) Return Account objects filtered by the refusedAmount column
 * @method array findByRefusedsum(double $refusedSum) Return Account objects filtered by the refusedSum column
 * @method array findByFormatId(int $format_id) Return Account objects filtered by the format_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseAccountQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAccountQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Account', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AccountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AccountQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AccountQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AccountQuery) {
            return $criteria;
        }
        $query = new AccountQuery();
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
     * @return   Account|Account[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AccountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Account A model object, or null if the key is not found
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
     * @return                 Account A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `contract_id`, `orgStructure_id`, `payer_id`, `settleDate`, `number`, `date`, `amount`, `uet`, `sum`, `exposeDate`, `payedAmount`, `payedSum`, `refusedAmount`, `refusedSum`, `format_id` FROM `Account` WHERE `id` = :p0';
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
            $obj = new Account();
            $obj->hydrate($row);
            AccountPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Account|Account[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Account[]|mixed the list of results, formatted by the current formatter
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AccountPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AccountPeer::ID, $keys, Criteria::IN);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AccountPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AccountPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::ID, $id, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(AccountPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(AccountPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(AccountPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(AccountPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(AccountPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(AccountPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(AccountPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(AccountPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AccountPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the contract_id column
     *
     * Example usage:
     * <code>
     * $query->filterByContractId(1234); // WHERE contract_id = 1234
     * $query->filterByContractId(array(12, 34)); // WHERE contract_id IN (12, 34)
     * $query->filterByContractId(array('min' => 12)); // WHERE contract_id >= 12
     * $query->filterByContractId(array('max' => 12)); // WHERE contract_id <= 12
     * </code>
     *
     * @param     mixed $contractId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByContractId($contractId = null, $comparison = null)
    {
        if (is_array($contractId)) {
            $useMinMax = false;
            if (isset($contractId['min'])) {
                $this->addUsingAlias(AccountPeer::CONTRACT_ID, $contractId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contractId['max'])) {
                $this->addUsingAlias(AccountPeer::CONTRACT_ID, $contractId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::CONTRACT_ID, $contractId, $comparison);
    }

    /**
     * Filter the query on the orgStructure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgstructureId(1234); // WHERE orgStructure_id = 1234
     * $query->filterByOrgstructureId(array(12, 34)); // WHERE orgStructure_id IN (12, 34)
     * $query->filterByOrgstructureId(array('min' => 12)); // WHERE orgStructure_id >= 12
     * $query->filterByOrgstructureId(array('max' => 12)); // WHERE orgStructure_id <= 12
     * </code>
     *
     * @param     mixed $orgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(AccountPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(AccountPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
    }

    /**
     * Filter the query on the payer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPayerId(1234); // WHERE payer_id = 1234
     * $query->filterByPayerId(array(12, 34)); // WHERE payer_id IN (12, 34)
     * $query->filterByPayerId(array('min' => 12)); // WHERE payer_id >= 12
     * $query->filterByPayerId(array('max' => 12)); // WHERE payer_id <= 12
     * </code>
     *
     * @param     mixed $payerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByPayerId($payerId = null, $comparison = null)
    {
        if (is_array($payerId)) {
            $useMinMax = false;
            if (isset($payerId['min'])) {
                $this->addUsingAlias(AccountPeer::PAYER_ID, $payerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payerId['max'])) {
                $this->addUsingAlias(AccountPeer::PAYER_ID, $payerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::PAYER_ID, $payerId, $comparison);
    }

    /**
     * Filter the query on the settleDate column
     *
     * Example usage:
     * <code>
     * $query->filterBySettledate('2011-03-14'); // WHERE settleDate = '2011-03-14'
     * $query->filterBySettledate('now'); // WHERE settleDate = '2011-03-14'
     * $query->filterBySettledate(array('max' => 'yesterday')); // WHERE settleDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $settledate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterBySettledate($settledate = null, $comparison = null)
    {
        if (is_array($settledate)) {
            $useMinMax = false;
            if (isset($settledate['min'])) {
                $this->addUsingAlias(AccountPeer::SETTLEDATE, $settledate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($settledate['max'])) {
                $this->addUsingAlias(AccountPeer::SETTLEDATE, $settledate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::SETTLEDATE, $settledate, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AccountPeer::NUMBER, $number, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(AccountPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(AccountPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::DATE, $date, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(AccountPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(AccountPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::AMOUNT, $amount, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByUet($uet = null, $comparison = null)
    {
        if (is_array($uet)) {
            $useMinMax = false;
            if (isset($uet['min'])) {
                $this->addUsingAlias(AccountPeer::UET, $uet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uet['max'])) {
                $this->addUsingAlias(AccountPeer::UET, $uet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::UET, $uet, $comparison);
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
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterBySum($sum = null, $comparison = null)
    {
        if (is_array($sum)) {
            $useMinMax = false;
            if (isset($sum['min'])) {
                $this->addUsingAlias(AccountPeer::SUM, $sum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sum['max'])) {
                $this->addUsingAlias(AccountPeer::SUM, $sum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::SUM, $sum, $comparison);
    }

    /**
     * Filter the query on the exposeDate column
     *
     * Example usage:
     * <code>
     * $query->filterByExposedate('2011-03-14'); // WHERE exposeDate = '2011-03-14'
     * $query->filterByExposedate('now'); // WHERE exposeDate = '2011-03-14'
     * $query->filterByExposedate(array('max' => 'yesterday')); // WHERE exposeDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $exposedate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByExposedate($exposedate = null, $comparison = null)
    {
        if (is_array($exposedate)) {
            $useMinMax = false;
            if (isset($exposedate['min'])) {
                $this->addUsingAlias(AccountPeer::EXPOSEDATE, $exposedate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($exposedate['max'])) {
                $this->addUsingAlias(AccountPeer::EXPOSEDATE, $exposedate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::EXPOSEDATE, $exposedate, $comparison);
    }

    /**
     * Filter the query on the payedAmount column
     *
     * Example usage:
     * <code>
     * $query->filterByPayedamount(1234); // WHERE payedAmount = 1234
     * $query->filterByPayedamount(array(12, 34)); // WHERE payedAmount IN (12, 34)
     * $query->filterByPayedamount(array('min' => 12)); // WHERE payedAmount >= 12
     * $query->filterByPayedamount(array('max' => 12)); // WHERE payedAmount <= 12
     * </code>
     *
     * @param     mixed $payedamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByPayedamount($payedamount = null, $comparison = null)
    {
        if (is_array($payedamount)) {
            $useMinMax = false;
            if (isset($payedamount['min'])) {
                $this->addUsingAlias(AccountPeer::PAYEDAMOUNT, $payedamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payedamount['max'])) {
                $this->addUsingAlias(AccountPeer::PAYEDAMOUNT, $payedamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::PAYEDAMOUNT, $payedamount, $comparison);
    }

    /**
     * Filter the query on the payedSum column
     *
     * Example usage:
     * <code>
     * $query->filterByPayedsum(1234); // WHERE payedSum = 1234
     * $query->filterByPayedsum(array(12, 34)); // WHERE payedSum IN (12, 34)
     * $query->filterByPayedsum(array('min' => 12)); // WHERE payedSum >= 12
     * $query->filterByPayedsum(array('max' => 12)); // WHERE payedSum <= 12
     * </code>
     *
     * @param     mixed $payedsum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByPayedsum($payedsum = null, $comparison = null)
    {
        if (is_array($payedsum)) {
            $useMinMax = false;
            if (isset($payedsum['min'])) {
                $this->addUsingAlias(AccountPeer::PAYEDSUM, $payedsum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payedsum['max'])) {
                $this->addUsingAlias(AccountPeer::PAYEDSUM, $payedsum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::PAYEDSUM, $payedsum, $comparison);
    }

    /**
     * Filter the query on the refusedAmount column
     *
     * Example usage:
     * <code>
     * $query->filterByRefusedamount(1234); // WHERE refusedAmount = 1234
     * $query->filterByRefusedamount(array(12, 34)); // WHERE refusedAmount IN (12, 34)
     * $query->filterByRefusedamount(array('min' => 12)); // WHERE refusedAmount >= 12
     * $query->filterByRefusedamount(array('max' => 12)); // WHERE refusedAmount <= 12
     * </code>
     *
     * @param     mixed $refusedamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByRefusedamount($refusedamount = null, $comparison = null)
    {
        if (is_array($refusedamount)) {
            $useMinMax = false;
            if (isset($refusedamount['min'])) {
                $this->addUsingAlias(AccountPeer::REFUSEDAMOUNT, $refusedamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($refusedamount['max'])) {
                $this->addUsingAlias(AccountPeer::REFUSEDAMOUNT, $refusedamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::REFUSEDAMOUNT, $refusedamount, $comparison);
    }

    /**
     * Filter the query on the refusedSum column
     *
     * Example usage:
     * <code>
     * $query->filterByRefusedsum(1234); // WHERE refusedSum = 1234
     * $query->filterByRefusedsum(array(12, 34)); // WHERE refusedSum IN (12, 34)
     * $query->filterByRefusedsum(array('min' => 12)); // WHERE refusedSum >= 12
     * $query->filterByRefusedsum(array('max' => 12)); // WHERE refusedSum <= 12
     * </code>
     *
     * @param     mixed $refusedsum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByRefusedsum($refusedsum = null, $comparison = null)
    {
        if (is_array($refusedsum)) {
            $useMinMax = false;
            if (isset($refusedsum['min'])) {
                $this->addUsingAlias(AccountPeer::REFUSEDSUM, $refusedsum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($refusedsum['max'])) {
                $this->addUsingAlias(AccountPeer::REFUSEDSUM, $refusedsum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::REFUSEDSUM, $refusedsum, $comparison);
    }

    /**
     * Filter the query on the format_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFormatId(1234); // WHERE format_id = 1234
     * $query->filterByFormatId(array(12, 34)); // WHERE format_id IN (12, 34)
     * $query->filterByFormatId(array('min' => 12)); // WHERE format_id >= 12
     * $query->filterByFormatId(array('max' => 12)); // WHERE format_id <= 12
     * </code>
     *
     * @param     mixed $formatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function filterByFormatId($formatId = null, $comparison = null)
    {
        if (is_array($formatId)) {
            $useMinMax = false;
            if (isset($formatId['min'])) {
                $this->addUsingAlias(AccountPeer::FORMAT_ID, $formatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($formatId['max'])) {
                $this->addUsingAlias(AccountPeer::FORMAT_ID, $formatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccountPeer::FORMAT_ID, $formatId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Account $account Object to remove from the list of results
     *
     * @return AccountQuery The current query, for fluid interface
     */
    public function prune($account = null)
    {
        if ($account) {
            $this->addUsingAlias(AccountPeer::ID, $account->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
