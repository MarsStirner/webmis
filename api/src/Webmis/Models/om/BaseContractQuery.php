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
use Webmis\Models\Contract;
use Webmis\Models\ContractPeer;
use Webmis\Models\ContractQuery;

/**
 * Base class that represents a query for the 'Contract' table.
 *
 *
 *
 * @method ContractQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContractQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ContractQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ContractQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ContractQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ContractQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ContractQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method ContractQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method ContractQuery orderByRecipientId($order = Criteria::ASC) Order by the recipient_id column
 * @method ContractQuery orderByRecipientaccountId($order = Criteria::ASC) Order by the recipientAccount_id column
 * @method ContractQuery orderByRecipientkbk($order = Criteria::ASC) Order by the recipientKBK column
 * @method ContractQuery orderByPayerId($order = Criteria::ASC) Order by the payer_id column
 * @method ContractQuery orderByPayeraccountId($order = Criteria::ASC) Order by the payerAccount_id column
 * @method ContractQuery orderByPayerkbk($order = Criteria::ASC) Order by the payerKBK column
 * @method ContractQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ContractQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method ContractQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method ContractQuery orderByGrouping($order = Criteria::ASC) Order by the grouping column
 * @method ContractQuery orderByResolution($order = Criteria::ASC) Order by the resolution column
 * @method ContractQuery orderByFormatId($order = Criteria::ASC) Order by the format_id column
 * @method ContractQuery orderByExposeunfinishedeventvisits($order = Criteria::ASC) Order by the exposeUnfinishedEventVisits column
 * @method ContractQuery orderByExposeunfinishedeventactions($order = Criteria::ASC) Order by the exposeUnfinishedEventActions column
 * @method ContractQuery orderByVisitexposition($order = Criteria::ASC) Order by the visitExposition column
 * @method ContractQuery orderByActionexposition($order = Criteria::ASC) Order by the actionExposition column
 * @method ContractQuery orderByExposediscipline($order = Criteria::ASC) Order by the exposeDiscipline column
 * @method ContractQuery orderByPricelistId($order = Criteria::ASC) Order by the priceList_id column
 * @method ContractQuery orderByCoefficient($order = Criteria::ASC) Order by the coefficient column
 * @method ContractQuery orderByCoefficientex($order = Criteria::ASC) Order by the coefficientEx column
 *
 * @method ContractQuery groupById() Group by the id column
 * @method ContractQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ContractQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ContractQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ContractQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ContractQuery groupByDeleted() Group by the deleted column
 * @method ContractQuery groupByNumber() Group by the number column
 * @method ContractQuery groupByDate() Group by the date column
 * @method ContractQuery groupByRecipientId() Group by the recipient_id column
 * @method ContractQuery groupByRecipientaccountId() Group by the recipientAccount_id column
 * @method ContractQuery groupByRecipientkbk() Group by the recipientKBK column
 * @method ContractQuery groupByPayerId() Group by the payer_id column
 * @method ContractQuery groupByPayeraccountId() Group by the payerAccount_id column
 * @method ContractQuery groupByPayerkbk() Group by the payerKBK column
 * @method ContractQuery groupByBegdate() Group by the begDate column
 * @method ContractQuery groupByEnddate() Group by the endDate column
 * @method ContractQuery groupByFinanceId() Group by the finance_id column
 * @method ContractQuery groupByGrouping() Group by the grouping column
 * @method ContractQuery groupByResolution() Group by the resolution column
 * @method ContractQuery groupByFormatId() Group by the format_id column
 * @method ContractQuery groupByExposeunfinishedeventvisits() Group by the exposeUnfinishedEventVisits column
 * @method ContractQuery groupByExposeunfinishedeventactions() Group by the exposeUnfinishedEventActions column
 * @method ContractQuery groupByVisitexposition() Group by the visitExposition column
 * @method ContractQuery groupByActionexposition() Group by the actionExposition column
 * @method ContractQuery groupByExposediscipline() Group by the exposeDiscipline column
 * @method ContractQuery groupByPricelistId() Group by the priceList_id column
 * @method ContractQuery groupByCoefficient() Group by the coefficient column
 * @method ContractQuery groupByCoefficientex() Group by the coefficientEx column
 *
 * @method ContractQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContractQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContractQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Contract findOne(PropelPDO $con = null) Return the first Contract matching the query
 * @method Contract findOneOrCreate(PropelPDO $con = null) Return the first Contract matching the query, or a new Contract object populated from the query conditions when no match is found
 *
 * @method Contract findOneByCreatedatetime(string $createDatetime) Return the first Contract filtered by the createDatetime column
 * @method Contract findOneByCreatepersonId(int $createPerson_id) Return the first Contract filtered by the createPerson_id column
 * @method Contract findOneByModifydatetime(string $modifyDatetime) Return the first Contract filtered by the modifyDatetime column
 * @method Contract findOneByModifypersonId(int $modifyPerson_id) Return the first Contract filtered by the modifyPerson_id column
 * @method Contract findOneByDeleted(boolean $deleted) Return the first Contract filtered by the deleted column
 * @method Contract findOneByNumber(string $number) Return the first Contract filtered by the number column
 * @method Contract findOneByDate(string $date) Return the first Contract filtered by the date column
 * @method Contract findOneByRecipientId(int $recipient_id) Return the first Contract filtered by the recipient_id column
 * @method Contract findOneByRecipientaccountId(int $recipientAccount_id) Return the first Contract filtered by the recipientAccount_id column
 * @method Contract findOneByRecipientkbk(string $recipientKBK) Return the first Contract filtered by the recipientKBK column
 * @method Contract findOneByPayerId(int $payer_id) Return the first Contract filtered by the payer_id column
 * @method Contract findOneByPayeraccountId(int $payerAccount_id) Return the first Contract filtered by the payerAccount_id column
 * @method Contract findOneByPayerkbk(string $payerKBK) Return the first Contract filtered by the payerKBK column
 * @method Contract findOneByBegdate(string $begDate) Return the first Contract filtered by the begDate column
 * @method Contract findOneByEnddate(string $endDate) Return the first Contract filtered by the endDate column
 * @method Contract findOneByFinanceId(int $finance_id) Return the first Contract filtered by the finance_id column
 * @method Contract findOneByGrouping(string $grouping) Return the first Contract filtered by the grouping column
 * @method Contract findOneByResolution(string $resolution) Return the first Contract filtered by the resolution column
 * @method Contract findOneByFormatId(int $format_id) Return the first Contract filtered by the format_id column
 * @method Contract findOneByExposeunfinishedeventvisits(boolean $exposeUnfinishedEventVisits) Return the first Contract filtered by the exposeUnfinishedEventVisits column
 * @method Contract findOneByExposeunfinishedeventactions(boolean $exposeUnfinishedEventActions) Return the first Contract filtered by the exposeUnfinishedEventActions column
 * @method Contract findOneByVisitexposition(boolean $visitExposition) Return the first Contract filtered by the visitExposition column
 * @method Contract findOneByActionexposition(boolean $actionExposition) Return the first Contract filtered by the actionExposition column
 * @method Contract findOneByExposediscipline(boolean $exposeDiscipline) Return the first Contract filtered by the exposeDiscipline column
 * @method Contract findOneByPricelistId(int $priceList_id) Return the first Contract filtered by the priceList_id column
 * @method Contract findOneByCoefficient(double $coefficient) Return the first Contract filtered by the coefficient column
 * @method Contract findOneByCoefficientex(double $coefficientEx) Return the first Contract filtered by the coefficientEx column
 *
 * @method array findById(int $id) Return Contract objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Contract objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Contract objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Contract objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Contract objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Contract objects filtered by the deleted column
 * @method array findByNumber(string $number) Return Contract objects filtered by the number column
 * @method array findByDate(string $date) Return Contract objects filtered by the date column
 * @method array findByRecipientId(int $recipient_id) Return Contract objects filtered by the recipient_id column
 * @method array findByRecipientaccountId(int $recipientAccount_id) Return Contract objects filtered by the recipientAccount_id column
 * @method array findByRecipientkbk(string $recipientKBK) Return Contract objects filtered by the recipientKBK column
 * @method array findByPayerId(int $payer_id) Return Contract objects filtered by the payer_id column
 * @method array findByPayeraccountId(int $payerAccount_id) Return Contract objects filtered by the payerAccount_id column
 * @method array findByPayerkbk(string $payerKBK) Return Contract objects filtered by the payerKBK column
 * @method array findByBegdate(string $begDate) Return Contract objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Contract objects filtered by the endDate column
 * @method array findByFinanceId(int $finance_id) Return Contract objects filtered by the finance_id column
 * @method array findByGrouping(string $grouping) Return Contract objects filtered by the grouping column
 * @method array findByResolution(string $resolution) Return Contract objects filtered by the resolution column
 * @method array findByFormatId(int $format_id) Return Contract objects filtered by the format_id column
 * @method array findByExposeunfinishedeventvisits(boolean $exposeUnfinishedEventVisits) Return Contract objects filtered by the exposeUnfinishedEventVisits column
 * @method array findByExposeunfinishedeventactions(boolean $exposeUnfinishedEventActions) Return Contract objects filtered by the exposeUnfinishedEventActions column
 * @method array findByVisitexposition(boolean $visitExposition) Return Contract objects filtered by the visitExposition column
 * @method array findByActionexposition(boolean $actionExposition) Return Contract objects filtered by the actionExposition column
 * @method array findByExposediscipline(boolean $exposeDiscipline) Return Contract objects filtered by the exposeDiscipline column
 * @method array findByPricelistId(int $priceList_id) Return Contract objects filtered by the priceList_id column
 * @method array findByCoefficient(double $coefficient) Return Contract objects filtered by the coefficient column
 * @method array findByCoefficientex(double $coefficientEx) Return Contract objects filtered by the coefficientEx column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContractQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContractQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Contract', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContractQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContractQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContractQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContractQuery) {
            return $criteria;
        }
        $query = new ContractQuery();
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
     * @return   Contract|Contract[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContractPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContractPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Contract A model object, or null if the key is not found
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
     * @return                 Contract A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `number`, `date`, `recipient_id`, `recipientAccount_id`, `recipientKBK`, `payer_id`, `payerAccount_id`, `payerKBK`, `begDate`, `endDate`, `finance_id`, `grouping`, `resolution`, `format_id`, `exposeUnfinishedEventVisits`, `exposeUnfinishedEventActions`, `visitExposition`, `actionExposition`, `exposeDiscipline`, `priceList_id`, `coefficient`, `coefficientEx` FROM `Contract` WHERE `id` = :p0';
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
            $obj = new Contract();
            $obj->hydrate($row);
            ContractPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Contract|Contract[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Contract[]|mixed the list of results, formatted by the current formatter
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContractPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContractPeer::ID, $keys, Criteria::IN);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContractPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContractPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::ID, $id, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ContractPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ContractPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ContractPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ContractPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ContractPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ContractPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ContractPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ContractPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractPeer::DELETED, $deleted, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContractPeer::NUMBER, $number, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ContractPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ContractPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the recipient_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipientId(1234); // WHERE recipient_id = 1234
     * $query->filterByRecipientId(array(12, 34)); // WHERE recipient_id IN (12, 34)
     * $query->filterByRecipientId(array('min' => 12)); // WHERE recipient_id >= 12
     * $query->filterByRecipientId(array('max' => 12)); // WHERE recipient_id <= 12
     * </code>
     *
     * @param     mixed $recipientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByRecipientId($recipientId = null, $comparison = null)
    {
        if (is_array($recipientId)) {
            $useMinMax = false;
            if (isset($recipientId['min'])) {
                $this->addUsingAlias(ContractPeer::RECIPIENT_ID, $recipientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recipientId['max'])) {
                $this->addUsingAlias(ContractPeer::RECIPIENT_ID, $recipientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::RECIPIENT_ID, $recipientId, $comparison);
    }

    /**
     * Filter the query on the recipientAccount_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipientaccountId(1234); // WHERE recipientAccount_id = 1234
     * $query->filterByRecipientaccountId(array(12, 34)); // WHERE recipientAccount_id IN (12, 34)
     * $query->filterByRecipientaccountId(array('min' => 12)); // WHERE recipientAccount_id >= 12
     * $query->filterByRecipientaccountId(array('max' => 12)); // WHERE recipientAccount_id <= 12
     * </code>
     *
     * @param     mixed $recipientaccountId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByRecipientaccountId($recipientaccountId = null, $comparison = null)
    {
        if (is_array($recipientaccountId)) {
            $useMinMax = false;
            if (isset($recipientaccountId['min'])) {
                $this->addUsingAlias(ContractPeer::RECIPIENTACCOUNT_ID, $recipientaccountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recipientaccountId['max'])) {
                $this->addUsingAlias(ContractPeer::RECIPIENTACCOUNT_ID, $recipientaccountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::RECIPIENTACCOUNT_ID, $recipientaccountId, $comparison);
    }

    /**
     * Filter the query on the recipientKBK column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipientkbk('fooValue');   // WHERE recipientKBK = 'fooValue'
     * $query->filterByRecipientkbk('%fooValue%'); // WHERE recipientKBK LIKE '%fooValue%'
     * </code>
     *
     * @param     string $recipientkbk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByRecipientkbk($recipientkbk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($recipientkbk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $recipientkbk)) {
                $recipientkbk = str_replace('*', '%', $recipientkbk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContractPeer::RECIPIENTKBK, $recipientkbk, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByPayerId($payerId = null, $comparison = null)
    {
        if (is_array($payerId)) {
            $useMinMax = false;
            if (isset($payerId['min'])) {
                $this->addUsingAlias(ContractPeer::PAYER_ID, $payerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payerId['max'])) {
                $this->addUsingAlias(ContractPeer::PAYER_ID, $payerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::PAYER_ID, $payerId, $comparison);
    }

    /**
     * Filter the query on the payerAccount_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPayeraccountId(1234); // WHERE payerAccount_id = 1234
     * $query->filterByPayeraccountId(array(12, 34)); // WHERE payerAccount_id IN (12, 34)
     * $query->filterByPayeraccountId(array('min' => 12)); // WHERE payerAccount_id >= 12
     * $query->filterByPayeraccountId(array('max' => 12)); // WHERE payerAccount_id <= 12
     * </code>
     *
     * @param     mixed $payeraccountId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByPayeraccountId($payeraccountId = null, $comparison = null)
    {
        if (is_array($payeraccountId)) {
            $useMinMax = false;
            if (isset($payeraccountId['min'])) {
                $this->addUsingAlias(ContractPeer::PAYERACCOUNT_ID, $payeraccountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payeraccountId['max'])) {
                $this->addUsingAlias(ContractPeer::PAYERACCOUNT_ID, $payeraccountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::PAYERACCOUNT_ID, $payeraccountId, $comparison);
    }

    /**
     * Filter the query on the payerKBK column
     *
     * Example usage:
     * <code>
     * $query->filterByPayerkbk('fooValue');   // WHERE payerKBK = 'fooValue'
     * $query->filterByPayerkbk('%fooValue%'); // WHERE payerKBK LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payerkbk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByPayerkbk($payerkbk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payerkbk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $payerkbk)) {
                $payerkbk = str_replace('*', '%', $payerkbk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContractPeer::PAYERKBK, $payerkbk, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ContractPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ContractPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::BEGDATE, $begdate, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ContractPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ContractPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the finance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFinanceId(1234); // WHERE finance_id = 1234
     * $query->filterByFinanceId(array(12, 34)); // WHERE finance_id IN (12, 34)
     * $query->filterByFinanceId(array('min' => 12)); // WHERE finance_id >= 12
     * $query->filterByFinanceId(array('max' => 12)); // WHERE finance_id <= 12
     * </code>
     *
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(ContractPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(ContractPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the grouping column
     *
     * Example usage:
     * <code>
     * $query->filterByGrouping('fooValue');   // WHERE grouping = 'fooValue'
     * $query->filterByGrouping('%fooValue%'); // WHERE grouping LIKE '%fooValue%'
     * </code>
     *
     * @param     string $grouping The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByGrouping($grouping = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($grouping)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $grouping)) {
                $grouping = str_replace('*', '%', $grouping);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContractPeer::GROUPING, $grouping, $comparison);
    }

    /**
     * Filter the query on the resolution column
     *
     * Example usage:
     * <code>
     * $query->filterByResolution('fooValue');   // WHERE resolution = 'fooValue'
     * $query->filterByResolution('%fooValue%'); // WHERE resolution LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resolution The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByResolution($resolution = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resolution)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $resolution)) {
                $resolution = str_replace('*', '%', $resolution);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContractPeer::RESOLUTION, $resolution, $comparison);
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
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByFormatId($formatId = null, $comparison = null)
    {
        if (is_array($formatId)) {
            $useMinMax = false;
            if (isset($formatId['min'])) {
                $this->addUsingAlias(ContractPeer::FORMAT_ID, $formatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($formatId['max'])) {
                $this->addUsingAlias(ContractPeer::FORMAT_ID, $formatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::FORMAT_ID, $formatId, $comparison);
    }

    /**
     * Filter the query on the exposeUnfinishedEventVisits column
     *
     * Example usage:
     * <code>
     * $query->filterByExposeunfinishedeventvisits(true); // WHERE exposeUnfinishedEventVisits = true
     * $query->filterByExposeunfinishedeventvisits('yes'); // WHERE exposeUnfinishedEventVisits = true
     * </code>
     *
     * @param     boolean|string $exposeunfinishedeventvisits The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByExposeunfinishedeventvisits($exposeunfinishedeventvisits = null, $comparison = null)
    {
        if (is_string($exposeunfinishedeventvisits)) {
            $exposeunfinishedeventvisits = in_array(strtolower($exposeunfinishedeventvisits), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractPeer::EXPOSEUNFINISHEDEVENTVISITS, $exposeunfinishedeventvisits, $comparison);
    }

    /**
     * Filter the query on the exposeUnfinishedEventActions column
     *
     * Example usage:
     * <code>
     * $query->filterByExposeunfinishedeventactions(true); // WHERE exposeUnfinishedEventActions = true
     * $query->filterByExposeunfinishedeventactions('yes'); // WHERE exposeUnfinishedEventActions = true
     * </code>
     *
     * @param     boolean|string $exposeunfinishedeventactions The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByExposeunfinishedeventactions($exposeunfinishedeventactions = null, $comparison = null)
    {
        if (is_string($exposeunfinishedeventactions)) {
            $exposeunfinishedeventactions = in_array(strtolower($exposeunfinishedeventactions), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractPeer::EXPOSEUNFINISHEDEVENTACTIONS, $exposeunfinishedeventactions, $comparison);
    }

    /**
     * Filter the query on the visitExposition column
     *
     * Example usage:
     * <code>
     * $query->filterByVisitexposition(true); // WHERE visitExposition = true
     * $query->filterByVisitexposition('yes'); // WHERE visitExposition = true
     * </code>
     *
     * @param     boolean|string $visitexposition The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByVisitexposition($visitexposition = null, $comparison = null)
    {
        if (is_string($visitexposition)) {
            $visitexposition = in_array(strtolower($visitexposition), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractPeer::VISITEXPOSITION, $visitexposition, $comparison);
    }

    /**
     * Filter the query on the actionExposition column
     *
     * Example usage:
     * <code>
     * $query->filterByActionexposition(true); // WHERE actionExposition = true
     * $query->filterByActionexposition('yes'); // WHERE actionExposition = true
     * </code>
     *
     * @param     boolean|string $actionexposition The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByActionexposition($actionexposition = null, $comparison = null)
    {
        if (is_string($actionexposition)) {
            $actionexposition = in_array(strtolower($actionexposition), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractPeer::ACTIONEXPOSITION, $actionexposition, $comparison);
    }

    /**
     * Filter the query on the exposeDiscipline column
     *
     * Example usage:
     * <code>
     * $query->filterByExposediscipline(true); // WHERE exposeDiscipline = true
     * $query->filterByExposediscipline('yes'); // WHERE exposeDiscipline = true
     * </code>
     *
     * @param     boolean|string $exposediscipline The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByExposediscipline($exposediscipline = null, $comparison = null)
    {
        if (is_string($exposediscipline)) {
            $exposediscipline = in_array(strtolower($exposediscipline), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractPeer::EXPOSEDISCIPLINE, $exposediscipline, $comparison);
    }

    /**
     * Filter the query on the priceList_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPricelistId(1234); // WHERE priceList_id = 1234
     * $query->filterByPricelistId(array(12, 34)); // WHERE priceList_id IN (12, 34)
     * $query->filterByPricelistId(array('min' => 12)); // WHERE priceList_id >= 12
     * $query->filterByPricelistId(array('max' => 12)); // WHERE priceList_id <= 12
     * </code>
     *
     * @param     mixed $pricelistId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByPricelistId($pricelistId = null, $comparison = null)
    {
        if (is_array($pricelistId)) {
            $useMinMax = false;
            if (isset($pricelistId['min'])) {
                $this->addUsingAlias(ContractPeer::PRICELIST_ID, $pricelistId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pricelistId['max'])) {
                $this->addUsingAlias(ContractPeer::PRICELIST_ID, $pricelistId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::PRICELIST_ID, $pricelistId, $comparison);
    }

    /**
     * Filter the query on the coefficient column
     *
     * Example usage:
     * <code>
     * $query->filterByCoefficient(1234); // WHERE coefficient = 1234
     * $query->filterByCoefficient(array(12, 34)); // WHERE coefficient IN (12, 34)
     * $query->filterByCoefficient(array('min' => 12)); // WHERE coefficient >= 12
     * $query->filterByCoefficient(array('max' => 12)); // WHERE coefficient <= 12
     * </code>
     *
     * @param     mixed $coefficient The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByCoefficient($coefficient = null, $comparison = null)
    {
        if (is_array($coefficient)) {
            $useMinMax = false;
            if (isset($coefficient['min'])) {
                $this->addUsingAlias(ContractPeer::COEFFICIENT, $coefficient['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coefficient['max'])) {
                $this->addUsingAlias(ContractPeer::COEFFICIENT, $coefficient['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::COEFFICIENT, $coefficient, $comparison);
    }

    /**
     * Filter the query on the coefficientEx column
     *
     * Example usage:
     * <code>
     * $query->filterByCoefficientex(1234); // WHERE coefficientEx = 1234
     * $query->filterByCoefficientex(array(12, 34)); // WHERE coefficientEx IN (12, 34)
     * $query->filterByCoefficientex(array('min' => 12)); // WHERE coefficientEx >= 12
     * $query->filterByCoefficientex(array('max' => 12)); // WHERE coefficientEx <= 12
     * </code>
     *
     * @param     mixed $coefficientex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function filterByCoefficientex($coefficientex = null, $comparison = null)
    {
        if (is_array($coefficientex)) {
            $useMinMax = false;
            if (isset($coefficientex['min'])) {
                $this->addUsingAlias(ContractPeer::COEFFICIENTEX, $coefficientex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coefficientex['max'])) {
                $this->addUsingAlias(ContractPeer::COEFFICIENTEX, $coefficientex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractPeer::COEFFICIENTEX, $coefficientex, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Contract $contract Object to remove from the list of results
     *
     * @return ContractQuery The current query, for fluid interface
     */
    public function prune($contract = null)
    {
        if ($contract) {
            $this->addUsingAlias(ContractPeer::ID, $contract->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
