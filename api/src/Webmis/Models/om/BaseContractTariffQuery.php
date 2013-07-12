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
use Webmis\Models\ContractTariff;
use Webmis\Models\ContractTariffPeer;
use Webmis\Models\ContractTariffQuery;
use Webmis\Models\Rbservicefinance;

/**
 * Base class that represents a query for the 'Contract_Tariff' table.
 *
 *
 *
 * @method ContractTariffQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContractTariffQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ContractTariffQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ContractTariffQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method ContractTariffQuery orderByTarifftype($order = Criteria::ASC) Order by the tariffType column
 * @method ContractTariffQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method ContractTariffQuery orderByTariffcategoryId($order = Criteria::ASC) Order by the tariffCategory_id column
 * @method ContractTariffQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ContractTariffQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method ContractTariffQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method ContractTariffQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method ContractTariffQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method ContractTariffQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method ContractTariffQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method ContractTariffQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method ContractTariffQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method ContractTariffQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ContractTariffQuery orderByUet($order = Criteria::ASC) Order by the uet column
 * @method ContractTariffQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method ContractTariffQuery orderByLimitationexceedmode($order = Criteria::ASC) Order by the limitationExceedMode column
 * @method ContractTariffQuery orderByLimitation($order = Criteria::ASC) Order by the limitation column
 * @method ContractTariffQuery orderByPriceex($order = Criteria::ASC) Order by the priceEx column
 * @method ContractTariffQuery orderByMkb($order = Criteria::ASC) Order by the MKB column
 * @method ContractTariffQuery orderByRbservicefinanceId($order = Criteria::ASC) Order by the rbServiceFinance_id column
 *
 * @method ContractTariffQuery groupById() Group by the id column
 * @method ContractTariffQuery groupByDeleted() Group by the deleted column
 * @method ContractTariffQuery groupByMasterId() Group by the master_id column
 * @method ContractTariffQuery groupByEventtypeId() Group by the eventType_id column
 * @method ContractTariffQuery groupByTarifftype() Group by the tariffType column
 * @method ContractTariffQuery groupByServiceId() Group by the service_id column
 * @method ContractTariffQuery groupByTariffcategoryId() Group by the tariffCategory_id column
 * @method ContractTariffQuery groupByBegdate() Group by the begDate column
 * @method ContractTariffQuery groupByEnddate() Group by the endDate column
 * @method ContractTariffQuery groupBySex() Group by the sex column
 * @method ContractTariffQuery groupByAge() Group by the age column
 * @method ContractTariffQuery groupByAgeBu() Group by the age_bu column
 * @method ContractTariffQuery groupByAgeBc() Group by the age_bc column
 * @method ContractTariffQuery groupByAgeEu() Group by the age_eu column
 * @method ContractTariffQuery groupByAgeEc() Group by the age_ec column
 * @method ContractTariffQuery groupByUnitId() Group by the unit_id column
 * @method ContractTariffQuery groupByAmount() Group by the amount column
 * @method ContractTariffQuery groupByUet() Group by the uet column
 * @method ContractTariffQuery groupByPrice() Group by the price column
 * @method ContractTariffQuery groupByLimitationexceedmode() Group by the limitationExceedMode column
 * @method ContractTariffQuery groupByLimitation() Group by the limitation column
 * @method ContractTariffQuery groupByPriceex() Group by the priceEx column
 * @method ContractTariffQuery groupByMkb() Group by the MKB column
 * @method ContractTariffQuery groupByRbservicefinanceId() Group by the rbServiceFinance_id column
 *
 * @method ContractTariffQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContractTariffQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContractTariffQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContractTariffQuery leftJoinRbservicefinance($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbservicefinance relation
 * @method ContractTariffQuery rightJoinRbservicefinance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbservicefinance relation
 * @method ContractTariffQuery innerJoinRbservicefinance($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbservicefinance relation
 *
 * @method ContractTariff findOne(PropelPDO $con = null) Return the first ContractTariff matching the query
 * @method ContractTariff findOneOrCreate(PropelPDO $con = null) Return the first ContractTariff matching the query, or a new ContractTariff object populated from the query conditions when no match is found
 *
 * @method ContractTariff findOneByDeleted(boolean $deleted) Return the first ContractTariff filtered by the deleted column
 * @method ContractTariff findOneByMasterId(int $master_id) Return the first ContractTariff filtered by the master_id column
 * @method ContractTariff findOneByEventtypeId(int $eventType_id) Return the first ContractTariff filtered by the eventType_id column
 * @method ContractTariff findOneByTarifftype(boolean $tariffType) Return the first ContractTariff filtered by the tariffType column
 * @method ContractTariff findOneByServiceId(int $service_id) Return the first ContractTariff filtered by the service_id column
 * @method ContractTariff findOneByTariffcategoryId(int $tariffCategory_id) Return the first ContractTariff filtered by the tariffCategory_id column
 * @method ContractTariff findOneByBegdate(string $begDate) Return the first ContractTariff filtered by the begDate column
 * @method ContractTariff findOneByEnddate(string $endDate) Return the first ContractTariff filtered by the endDate column
 * @method ContractTariff findOneBySex(int $sex) Return the first ContractTariff filtered by the sex column
 * @method ContractTariff findOneByAge(string $age) Return the first ContractTariff filtered by the age column
 * @method ContractTariff findOneByAgeBu(int $age_bu) Return the first ContractTariff filtered by the age_bu column
 * @method ContractTariff findOneByAgeBc(int $age_bc) Return the first ContractTariff filtered by the age_bc column
 * @method ContractTariff findOneByAgeEu(int $age_eu) Return the first ContractTariff filtered by the age_eu column
 * @method ContractTariff findOneByAgeEc(int $age_ec) Return the first ContractTariff filtered by the age_ec column
 * @method ContractTariff findOneByUnitId(int $unit_id) Return the first ContractTariff filtered by the unit_id column
 * @method ContractTariff findOneByAmount(double $amount) Return the first ContractTariff filtered by the amount column
 * @method ContractTariff findOneByUet(double $uet) Return the first ContractTariff filtered by the uet column
 * @method ContractTariff findOneByPrice(double $price) Return the first ContractTariff filtered by the price column
 * @method ContractTariff findOneByLimitationexceedmode(int $limitationExceedMode) Return the first ContractTariff filtered by the limitationExceedMode column
 * @method ContractTariff findOneByLimitation(double $limitation) Return the first ContractTariff filtered by the limitation column
 * @method ContractTariff findOneByPriceex(double $priceEx) Return the first ContractTariff filtered by the priceEx column
 * @method ContractTariff findOneByMkb(string $MKB) Return the first ContractTariff filtered by the MKB column
 * @method ContractTariff findOneByRbservicefinanceId(int $rbServiceFinance_id) Return the first ContractTariff filtered by the rbServiceFinance_id column
 *
 * @method array findById(int $id) Return ContractTariff objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return ContractTariff objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return ContractTariff objects filtered by the master_id column
 * @method array findByEventtypeId(int $eventType_id) Return ContractTariff objects filtered by the eventType_id column
 * @method array findByTarifftype(boolean $tariffType) Return ContractTariff objects filtered by the tariffType column
 * @method array findByServiceId(int $service_id) Return ContractTariff objects filtered by the service_id column
 * @method array findByTariffcategoryId(int $tariffCategory_id) Return ContractTariff objects filtered by the tariffCategory_id column
 * @method array findByBegdate(string $begDate) Return ContractTariff objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return ContractTariff objects filtered by the endDate column
 * @method array findBySex(int $sex) Return ContractTariff objects filtered by the sex column
 * @method array findByAge(string $age) Return ContractTariff objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return ContractTariff objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return ContractTariff objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return ContractTariff objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return ContractTariff objects filtered by the age_ec column
 * @method array findByUnitId(int $unit_id) Return ContractTariff objects filtered by the unit_id column
 * @method array findByAmount(double $amount) Return ContractTariff objects filtered by the amount column
 * @method array findByUet(double $uet) Return ContractTariff objects filtered by the uet column
 * @method array findByPrice(double $price) Return ContractTariff objects filtered by the price column
 * @method array findByLimitationexceedmode(int $limitationExceedMode) Return ContractTariff objects filtered by the limitationExceedMode column
 * @method array findByLimitation(double $limitation) Return ContractTariff objects filtered by the limitation column
 * @method array findByPriceex(double $priceEx) Return ContractTariff objects filtered by the priceEx column
 * @method array findByMkb(string $MKB) Return ContractTariff objects filtered by the MKB column
 * @method array findByRbservicefinanceId(int $rbServiceFinance_id) Return ContractTariff objects filtered by the rbServiceFinance_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContractTariffQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContractTariffQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ContractTariff', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContractTariffQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContractTariffQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContractTariffQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContractTariffQuery) {
            return $criteria;
        }
        $query = new ContractTariffQuery();
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
     * @return   ContractTariff|ContractTariff[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContractTariffPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContractTariffPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ContractTariff A model object, or null if the key is not found
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
     * @return                 ContractTariff A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `master_id`, `eventType_id`, `tariffType`, `service_id`, `tariffCategory_id`, `begDate`, `endDate`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `unit_id`, `amount`, `uet`, `price`, `limitationExceedMode`, `limitation`, `priceEx`, `MKB`, `rbServiceFinance_id` FROM `Contract_Tariff` WHERE `id` = :p0';
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
            $obj = new ContractTariff();
            $obj->hydrate($row);
            ContractTariffPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ContractTariff|ContractTariff[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContractTariff[]|mixed the list of results, formatted by the current formatter
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContractTariffPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContractTariffPeer::ID, $keys, Criteria::IN);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContractTariffPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContractTariffPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::ID, $id, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractTariffPeer::DELETED, $deleted, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ContractTariffPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ContractTariffPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the eventType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventtypeId(1234); // WHERE eventType_id = 1234
     * $query->filterByEventtypeId(array(12, 34)); // WHERE eventType_id IN (12, 34)
     * $query->filterByEventtypeId(array('min' => 12)); // WHERE eventType_id >= 12
     * $query->filterByEventtypeId(array('max' => 12)); // WHERE eventType_id <= 12
     * </code>
     *
     * @param     mixed $eventtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(ContractTariffPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(ContractTariffPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
    }

    /**
     * Filter the query on the tariffType column
     *
     * Example usage:
     * <code>
     * $query->filterByTarifftype(true); // WHERE tariffType = true
     * $query->filterByTarifftype('yes'); // WHERE tariffType = true
     * </code>
     *
     * @param     boolean|string $tarifftype The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByTarifftype($tarifftype = null, $comparison = null)
    {
        if (is_string($tarifftype)) {
            $tarifftype = in_array(strtolower($tarifftype), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractTariffPeer::TARIFFTYPE, $tarifftype, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(ContractTariffPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(ContractTariffPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Filter the query on the tariffCategory_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTariffcategoryId(1234); // WHERE tariffCategory_id = 1234
     * $query->filterByTariffcategoryId(array(12, 34)); // WHERE tariffCategory_id IN (12, 34)
     * $query->filterByTariffcategoryId(array('min' => 12)); // WHERE tariffCategory_id >= 12
     * $query->filterByTariffcategoryId(array('max' => 12)); // WHERE tariffCategory_id <= 12
     * </code>
     *
     * @param     mixed $tariffcategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByTariffcategoryId($tariffcategoryId = null, $comparison = null)
    {
        if (is_array($tariffcategoryId)) {
            $useMinMax = false;
            if (isset($tariffcategoryId['min'])) {
                $this->addUsingAlias(ContractTariffPeer::TARIFFCATEGORY_ID, $tariffcategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tariffcategoryId['max'])) {
                $this->addUsingAlias(ContractTariffPeer::TARIFFCATEGORY_ID, $tariffcategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::TARIFFCATEGORY_ID, $tariffcategoryId, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ContractTariffPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ContractTariffPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::BEGDATE, $begdate, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ContractTariffPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ContractTariffPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex(1234); // WHERE sex = 1234
     * $query->filterBySex(array(12, 34)); // WHERE sex IN (12, 34)
     * $query->filterBySex(array('min' => 12)); // WHERE sex >= 12
     * $query->filterBySex(array('max' => 12)); // WHERE sex <= 12
     * </code>
     *
     * @param     mixed $sex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(ContractTariffPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(ContractTariffPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge('fooValue');   // WHERE age = 'fooValue'
     * $query->filterByAge('%fooValue%'); // WHERE age LIKE '%fooValue%'
     * </code>
     *
     * @param     string $age The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($age)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $age)) {
                $age = str_replace('*', '%', $age);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::AGE, $age, $comparison);
    }

    /**
     * Filter the query on the age_bu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeBu(1234); // WHERE age_bu = 1234
     * $query->filterByAgeBu(array(12, 34)); // WHERE age_bu IN (12, 34)
     * $query->filterByAgeBu(array('min' => 12)); // WHERE age_bu >= 12
     * $query->filterByAgeBu(array('max' => 12)); // WHERE age_bu <= 12
     * </code>
     *
     * @param     mixed $ageBu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::AGE_BU, $ageBu, $comparison);
    }

    /**
     * Filter the query on the age_bc column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeBc(1234); // WHERE age_bc = 1234
     * $query->filterByAgeBc(array(12, 34)); // WHERE age_bc IN (12, 34)
     * $query->filterByAgeBc(array('min' => 12)); // WHERE age_bc >= 12
     * $query->filterByAgeBc(array('max' => 12)); // WHERE age_bc <= 12
     * </code>
     *
     * @param     mixed $ageBc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::AGE_BC, $ageBc, $comparison);
    }

    /**
     * Filter the query on the age_eu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEu(1234); // WHERE age_eu = 1234
     * $query->filterByAgeEu(array(12, 34)); // WHERE age_eu IN (12, 34)
     * $query->filterByAgeEu(array('min' => 12)); // WHERE age_eu >= 12
     * $query->filterByAgeEu(array('max' => 12)); // WHERE age_eu <= 12
     * </code>
     *
     * @param     mixed $ageEu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::AGE_EU, $ageEu, $comparison);
    }

    /**
     * Filter the query on the age_ec column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEc(1234); // WHERE age_ec = 1234
     * $query->filterByAgeEc(array(12, 34)); // WHERE age_ec IN (12, 34)
     * $query->filterByAgeEc(array('min' => 12)); // WHERE age_ec >= 12
     * $query->filterByAgeEc(array('max' => 12)); // WHERE age_ec <= 12
     * </code>
     *
     * @param     mixed $ageEc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(ContractTariffPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::AGE_EC, $ageEc, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(ContractTariffPeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(ContractTariffPeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::UNIT_ID, $unitId, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ContractTariffPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ContractTariffPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::AMOUNT, $amount, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByUet($uet = null, $comparison = null)
    {
        if (is_array($uet)) {
            $useMinMax = false;
            if (isset($uet['min'])) {
                $this->addUsingAlias(ContractTariffPeer::UET, $uet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uet['max'])) {
                $this->addUsingAlias(ContractTariffPeer::UET, $uet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::UET, $uet, $comparison);
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
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ContractTariffPeer::PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ContractTariffPeer::PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the limitationExceedMode column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitationexceedmode(1234); // WHERE limitationExceedMode = 1234
     * $query->filterByLimitationexceedmode(array(12, 34)); // WHERE limitationExceedMode IN (12, 34)
     * $query->filterByLimitationexceedmode(array('min' => 12)); // WHERE limitationExceedMode >= 12
     * $query->filterByLimitationexceedmode(array('max' => 12)); // WHERE limitationExceedMode <= 12
     * </code>
     *
     * @param     mixed $limitationexceedmode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByLimitationexceedmode($limitationexceedmode = null, $comparison = null)
    {
        if (is_array($limitationexceedmode)) {
            $useMinMax = false;
            if (isset($limitationexceedmode['min'])) {
                $this->addUsingAlias(ContractTariffPeer::LIMITATIONEXCEEDMODE, $limitationexceedmode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($limitationexceedmode['max'])) {
                $this->addUsingAlias(ContractTariffPeer::LIMITATIONEXCEEDMODE, $limitationexceedmode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::LIMITATIONEXCEEDMODE, $limitationexceedmode, $comparison);
    }

    /**
     * Filter the query on the limitation column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitation(1234); // WHERE limitation = 1234
     * $query->filterByLimitation(array(12, 34)); // WHERE limitation IN (12, 34)
     * $query->filterByLimitation(array('min' => 12)); // WHERE limitation >= 12
     * $query->filterByLimitation(array('max' => 12)); // WHERE limitation <= 12
     * </code>
     *
     * @param     mixed $limitation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByLimitation($limitation = null, $comparison = null)
    {
        if (is_array($limitation)) {
            $useMinMax = false;
            if (isset($limitation['min'])) {
                $this->addUsingAlias(ContractTariffPeer::LIMITATION, $limitation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($limitation['max'])) {
                $this->addUsingAlias(ContractTariffPeer::LIMITATION, $limitation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::LIMITATION, $limitation, $comparison);
    }

    /**
     * Filter the query on the priceEx column
     *
     * Example usage:
     * <code>
     * $query->filterByPriceex(1234); // WHERE priceEx = 1234
     * $query->filterByPriceex(array(12, 34)); // WHERE priceEx IN (12, 34)
     * $query->filterByPriceex(array('min' => 12)); // WHERE priceEx >= 12
     * $query->filterByPriceex(array('max' => 12)); // WHERE priceEx <= 12
     * </code>
     *
     * @param     mixed $priceex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByPriceex($priceex = null, $comparison = null)
    {
        if (is_array($priceex)) {
            $useMinMax = false;
            if (isset($priceex['min'])) {
                $this->addUsingAlias(ContractTariffPeer::PRICEEX, $priceex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priceex['max'])) {
                $this->addUsingAlias(ContractTariffPeer::PRICEEX, $priceex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::PRICEEX, $priceex, $comparison);
    }

    /**
     * Filter the query on the MKB column
     *
     * Example usage:
     * <code>
     * $query->filterByMkb('fooValue');   // WHERE MKB = 'fooValue'
     * $query->filterByMkb('%fooValue%'); // WHERE MKB LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mkb The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByMkb($mkb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mkb)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mkb)) {
                $mkb = str_replace('*', '%', $mkb);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::MKB, $mkb, $comparison);
    }

    /**
     * Filter the query on the rbServiceFinance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbservicefinanceId(1234); // WHERE rbServiceFinance_id = 1234
     * $query->filterByRbservicefinanceId(array(12, 34)); // WHERE rbServiceFinance_id IN (12, 34)
     * $query->filterByRbservicefinanceId(array('min' => 12)); // WHERE rbServiceFinance_id >= 12
     * $query->filterByRbservicefinanceId(array('max' => 12)); // WHERE rbServiceFinance_id <= 12
     * </code>
     *
     * @see       filterByRbservicefinance()
     *
     * @param     mixed $rbservicefinanceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function filterByRbservicefinanceId($rbservicefinanceId = null, $comparison = null)
    {
        if (is_array($rbservicefinanceId)) {
            $useMinMax = false;
            if (isset($rbservicefinanceId['min'])) {
                $this->addUsingAlias(ContractTariffPeer::RBSERVICEFINANCE_ID, $rbservicefinanceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbservicefinanceId['max'])) {
                $this->addUsingAlias(ContractTariffPeer::RBSERVICEFINANCE_ID, $rbservicefinanceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractTariffPeer::RBSERVICEFINANCE_ID, $rbservicefinanceId, $comparison);
    }

    /**
     * Filter the query by a related Rbservicefinance object
     *
     * @param   Rbservicefinance|PropelObjectCollection $rbservicefinance The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ContractTariffQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbservicefinance($rbservicefinance, $comparison = null)
    {
        if ($rbservicefinance instanceof Rbservicefinance) {
            return $this
                ->addUsingAlias(ContractTariffPeer::RBSERVICEFINANCE_ID, $rbservicefinance->getId(), $comparison);
        } elseif ($rbservicefinance instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ContractTariffPeer::RBSERVICEFINANCE_ID, $rbservicefinance->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbservicefinance() only accepts arguments of type Rbservicefinance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbservicefinance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function joinRbservicefinance($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbservicefinance');

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
            $this->addJoinObject($join, 'Rbservicefinance');
        }

        return $this;
    }

    /**
     * Use the Rbservicefinance relation Rbservicefinance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbservicefinanceQuery A secondary query class using the current class as primary query
     */
    public function useRbservicefinanceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbservicefinance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbservicefinance', '\Webmis\Models\RbservicefinanceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ContractTariff $contractTariff Object to remove from the list of results
     *
     * @return ContractTariffQuery The current query, for fluid interface
     */
    public function prune($contractTariff = null)
    {
        if ($contractTariff) {
            $this->addUsingAlias(ContractTariffPeer::ID, $contractTariff->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
