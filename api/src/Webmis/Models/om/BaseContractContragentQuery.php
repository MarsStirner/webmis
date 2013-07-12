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
use Webmis\Models\ContractContragent;
use Webmis\Models\ContractContragentPeer;
use Webmis\Models\ContractContragentQuery;

/**
 * Base class that represents a query for the 'Contract_Contragent' table.
 *
 *
 *
 * @method ContractContragentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContractContragentQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ContractContragentQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ContractContragentQuery orderByInsurerId($order = Criteria::ASC) Order by the insurer_id column
 * @method ContractContragentQuery orderByPayerId($order = Criteria::ASC) Order by the payer_id column
 * @method ContractContragentQuery orderByPayeraccountId($order = Criteria::ASC) Order by the payerAccount_id column
 * @method ContractContragentQuery orderByPayerkbk($order = Criteria::ASC) Order by the payerKBK column
 * @method ContractContragentQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ContractContragentQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 *
 * @method ContractContragentQuery groupById() Group by the id column
 * @method ContractContragentQuery groupByDeleted() Group by the deleted column
 * @method ContractContragentQuery groupByMasterId() Group by the master_id column
 * @method ContractContragentQuery groupByInsurerId() Group by the insurer_id column
 * @method ContractContragentQuery groupByPayerId() Group by the payer_id column
 * @method ContractContragentQuery groupByPayeraccountId() Group by the payerAccount_id column
 * @method ContractContragentQuery groupByPayerkbk() Group by the payerKBK column
 * @method ContractContragentQuery groupByBegdate() Group by the begDate column
 * @method ContractContragentQuery groupByEnddate() Group by the endDate column
 *
 * @method ContractContragentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContractContragentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContractContragentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContractContragent findOne(PropelPDO $con = null) Return the first ContractContragent matching the query
 * @method ContractContragent findOneOrCreate(PropelPDO $con = null) Return the first ContractContragent matching the query, or a new ContractContragent object populated from the query conditions when no match is found
 *
 * @method ContractContragent findOneByDeleted(boolean $deleted) Return the first ContractContragent filtered by the deleted column
 * @method ContractContragent findOneByMasterId(int $master_id) Return the first ContractContragent filtered by the master_id column
 * @method ContractContragent findOneByInsurerId(int $insurer_id) Return the first ContractContragent filtered by the insurer_id column
 * @method ContractContragent findOneByPayerId(int $payer_id) Return the first ContractContragent filtered by the payer_id column
 * @method ContractContragent findOneByPayeraccountId(int $payerAccount_id) Return the first ContractContragent filtered by the payerAccount_id column
 * @method ContractContragent findOneByPayerkbk(string $payerKBK) Return the first ContractContragent filtered by the payerKBK column
 * @method ContractContragent findOneByBegdate(string $begDate) Return the first ContractContragent filtered by the begDate column
 * @method ContractContragent findOneByEnddate(string $endDate) Return the first ContractContragent filtered by the endDate column
 *
 * @method array findById(int $id) Return ContractContragent objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return ContractContragent objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return ContractContragent objects filtered by the master_id column
 * @method array findByInsurerId(int $insurer_id) Return ContractContragent objects filtered by the insurer_id column
 * @method array findByPayerId(int $payer_id) Return ContractContragent objects filtered by the payer_id column
 * @method array findByPayeraccountId(int $payerAccount_id) Return ContractContragent objects filtered by the payerAccount_id column
 * @method array findByPayerkbk(string $payerKBK) Return ContractContragent objects filtered by the payerKBK column
 * @method array findByBegdate(string $begDate) Return ContractContragent objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return ContractContragent objects filtered by the endDate column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContractContragentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContractContragentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ContractContragent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContractContragentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContractContragentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContractContragentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContractContragentQuery) {
            return $criteria;
        }
        $query = new ContractContragentQuery();
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
     * @return   ContractContragent|ContractContragent[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContractContragentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContractContragentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ContractContragent A model object, or null if the key is not found
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
     * @return                 ContractContragent A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `master_id`, `insurer_id`, `payer_id`, `payerAccount_id`, `payerKBK`, `begDate`, `endDate` FROM `Contract_Contragent` WHERE `id` = :p0';
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
            $obj = new ContractContragent();
            $obj->hydrate($row);
            ContractContragentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ContractContragent|ContractContragent[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContractContragent[]|mixed the list of results, formatted by the current formatter
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContractContragentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContractContragentPeer::ID, $keys, Criteria::IN);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContractContragentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContractContragentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::ID, $id, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractContragentPeer::DELETED, $deleted, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ContractContragentPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ContractContragentPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the insurer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInsurerId(1234); // WHERE insurer_id = 1234
     * $query->filterByInsurerId(array(12, 34)); // WHERE insurer_id IN (12, 34)
     * $query->filterByInsurerId(array('min' => 12)); // WHERE insurer_id >= 12
     * $query->filterByInsurerId(array('max' => 12)); // WHERE insurer_id <= 12
     * </code>
     *
     * @param     mixed $insurerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByInsurerId($insurerId = null, $comparison = null)
    {
        if (is_array($insurerId)) {
            $useMinMax = false;
            if (isset($insurerId['min'])) {
                $this->addUsingAlias(ContractContragentPeer::INSURER_ID, $insurerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insurerId['max'])) {
                $this->addUsingAlias(ContractContragentPeer::INSURER_ID, $insurerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::INSURER_ID, $insurerId, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByPayerId($payerId = null, $comparison = null)
    {
        if (is_array($payerId)) {
            $useMinMax = false;
            if (isset($payerId['min'])) {
                $this->addUsingAlias(ContractContragentPeer::PAYER_ID, $payerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payerId['max'])) {
                $this->addUsingAlias(ContractContragentPeer::PAYER_ID, $payerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::PAYER_ID, $payerId, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByPayeraccountId($payeraccountId = null, $comparison = null)
    {
        if (is_array($payeraccountId)) {
            $useMinMax = false;
            if (isset($payeraccountId['min'])) {
                $this->addUsingAlias(ContractContragentPeer::PAYERACCOUNT_ID, $payeraccountId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($payeraccountId['max'])) {
                $this->addUsingAlias(ContractContragentPeer::PAYERACCOUNT_ID, $payeraccountId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::PAYERACCOUNT_ID, $payeraccountId, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContractContragentPeer::PAYERKBK, $payerkbk, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ContractContragentPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ContractContragentPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::BEGDATE, $begdate, $comparison);
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
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ContractContragentPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ContractContragentPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContragentPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ContractContragent $contractContragent Object to remove from the list of results
     *
     * @return ContractContragentQuery The current query, for fluid interface
     */
    public function prune($contractContragent = null)
    {
        if ($contractContragent) {
            $this->addUsingAlias(ContractContragentPeer::ID, $contractContragent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
