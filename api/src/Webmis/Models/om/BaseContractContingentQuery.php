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
use Webmis\Models\ContractContingent;
use Webmis\Models\ContractContingentPeer;
use Webmis\Models\ContractContingentQuery;

/**
 * Base class that represents a query for the 'Contract_Contingent' table.
 *
 *
 *
 * @method ContractContingentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ContractContingentQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ContractContingentQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ContractContingentQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ContractContingentQuery orderByAttachtypeId($order = Criteria::ASC) Order by the attachType_id column
 * @method ContractContingentQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method ContractContingentQuery orderBySocstatustypeId($order = Criteria::ASC) Order by the socStatusType_id column
 * @method ContractContingentQuery orderByInsurerId($order = Criteria::ASC) Order by the insurer_id column
 * @method ContractContingentQuery orderByPolicytypeId($order = Criteria::ASC) Order by the policyType_id column
 * @method ContractContingentQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method ContractContingentQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method ContractContingentQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method ContractContingentQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method ContractContingentQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method ContractContingentQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 *
 * @method ContractContingentQuery groupById() Group by the id column
 * @method ContractContingentQuery groupByDeleted() Group by the deleted column
 * @method ContractContingentQuery groupByMasterId() Group by the master_id column
 * @method ContractContingentQuery groupByClientId() Group by the client_id column
 * @method ContractContingentQuery groupByAttachtypeId() Group by the attachType_id column
 * @method ContractContingentQuery groupByOrgId() Group by the org_id column
 * @method ContractContingentQuery groupBySocstatustypeId() Group by the socStatusType_id column
 * @method ContractContingentQuery groupByInsurerId() Group by the insurer_id column
 * @method ContractContingentQuery groupByPolicytypeId() Group by the policyType_id column
 * @method ContractContingentQuery groupBySex() Group by the sex column
 * @method ContractContingentQuery groupByAge() Group by the age column
 * @method ContractContingentQuery groupByAgeBu() Group by the age_bu column
 * @method ContractContingentQuery groupByAgeBc() Group by the age_bc column
 * @method ContractContingentQuery groupByAgeEu() Group by the age_eu column
 * @method ContractContingentQuery groupByAgeEc() Group by the age_ec column
 *
 * @method ContractContingentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ContractContingentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ContractContingentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ContractContingent findOne(PropelPDO $con = null) Return the first ContractContingent matching the query
 * @method ContractContingent findOneOrCreate(PropelPDO $con = null) Return the first ContractContingent matching the query, or a new ContractContingent object populated from the query conditions when no match is found
 *
 * @method ContractContingent findOneByDeleted(boolean $deleted) Return the first ContractContingent filtered by the deleted column
 * @method ContractContingent findOneByMasterId(int $master_id) Return the first ContractContingent filtered by the master_id column
 * @method ContractContingent findOneByClientId(int $client_id) Return the first ContractContingent filtered by the client_id column
 * @method ContractContingent findOneByAttachtypeId(int $attachType_id) Return the first ContractContingent filtered by the attachType_id column
 * @method ContractContingent findOneByOrgId(int $org_id) Return the first ContractContingent filtered by the org_id column
 * @method ContractContingent findOneBySocstatustypeId(int $socStatusType_id) Return the first ContractContingent filtered by the socStatusType_id column
 * @method ContractContingent findOneByInsurerId(int $insurer_id) Return the first ContractContingent filtered by the insurer_id column
 * @method ContractContingent findOneByPolicytypeId(int $policyType_id) Return the first ContractContingent filtered by the policyType_id column
 * @method ContractContingent findOneBySex(int $sex) Return the first ContractContingent filtered by the sex column
 * @method ContractContingent findOneByAge(string $age) Return the first ContractContingent filtered by the age column
 * @method ContractContingent findOneByAgeBu(int $age_bu) Return the first ContractContingent filtered by the age_bu column
 * @method ContractContingent findOneByAgeBc(int $age_bc) Return the first ContractContingent filtered by the age_bc column
 * @method ContractContingent findOneByAgeEu(int $age_eu) Return the first ContractContingent filtered by the age_eu column
 * @method ContractContingent findOneByAgeEc(int $age_ec) Return the first ContractContingent filtered by the age_ec column
 *
 * @method array findById(int $id) Return ContractContingent objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return ContractContingent objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return ContractContingent objects filtered by the master_id column
 * @method array findByClientId(int $client_id) Return ContractContingent objects filtered by the client_id column
 * @method array findByAttachtypeId(int $attachType_id) Return ContractContingent objects filtered by the attachType_id column
 * @method array findByOrgId(int $org_id) Return ContractContingent objects filtered by the org_id column
 * @method array findBySocstatustypeId(int $socStatusType_id) Return ContractContingent objects filtered by the socStatusType_id column
 * @method array findByInsurerId(int $insurer_id) Return ContractContingent objects filtered by the insurer_id column
 * @method array findByPolicytypeId(int $policyType_id) Return ContractContingent objects filtered by the policyType_id column
 * @method array findBySex(int $sex) Return ContractContingent objects filtered by the sex column
 * @method array findByAge(string $age) Return ContractContingent objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return ContractContingent objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return ContractContingent objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return ContractContingent objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return ContractContingent objects filtered by the age_ec column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseContractContingentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseContractContingentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ContractContingent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ContractContingentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ContractContingentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ContractContingentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ContractContingentQuery) {
            return $criteria;
        }
        $query = new ContractContingentQuery();
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
     * @return   ContractContingent|ContractContingent[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ContractContingentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ContractContingentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ContractContingent A model object, or null if the key is not found
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
     * @return                 ContractContingent A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `master_id`, `client_id`, `attachType_id`, `org_id`, `socStatusType_id`, `insurer_id`, `policyType_id`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec` FROM `Contract_Contingent` WHERE `id` = :p0';
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
            $obj = new ContractContingent();
            $obj->hydrate($row);
            ContractContingentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ContractContingent|ContractContingent[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ContractContingent[]|mixed the list of results, formatted by the current formatter
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContractContingentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContractContingentPeer::ID, $keys, Criteria::IN);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ContractContingentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ContractContingentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::ID, $id, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ContractContingentPeer::DELETED, $deleted, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::MASTER_ID, $masterId, $comparison);
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
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the attachType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAttachtypeId(1234); // WHERE attachType_id = 1234
     * $query->filterByAttachtypeId(array(12, 34)); // WHERE attachType_id IN (12, 34)
     * $query->filterByAttachtypeId(array('min' => 12)); // WHERE attachType_id >= 12
     * $query->filterByAttachtypeId(array('max' => 12)); // WHERE attachType_id <= 12
     * </code>
     *
     * @param     mixed $attachtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByAttachtypeId($attachtypeId = null, $comparison = null)
    {
        if (is_array($attachtypeId)) {
            $useMinMax = false;
            if (isset($attachtypeId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::ATTACHTYPE_ID, $attachtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($attachtypeId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::ATTACHTYPE_ID, $attachtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::ATTACHTYPE_ID, $attachtypeId, $comparison);
    }

    /**
     * Filter the query on the org_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgId(1234); // WHERE org_id = 1234
     * $query->filterByOrgId(array(12, 34)); // WHERE org_id IN (12, 34)
     * $query->filterByOrgId(array('min' => 12)); // WHERE org_id >= 12
     * $query->filterByOrgId(array('max' => 12)); // WHERE org_id <= 12
     * </code>
     *
     * @param     mixed $orgId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByOrgId($orgId = null, $comparison = null)
    {
        if (is_array($orgId)) {
            $useMinMax = false;
            if (isset($orgId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::ORG_ID, $orgId, $comparison);
    }

    /**
     * Filter the query on the socStatusType_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocstatustypeId(1234); // WHERE socStatusType_id = 1234
     * $query->filterBySocstatustypeId(array(12, 34)); // WHERE socStatusType_id IN (12, 34)
     * $query->filterBySocstatustypeId(array('min' => 12)); // WHERE socStatusType_id >= 12
     * $query->filterBySocstatustypeId(array('max' => 12)); // WHERE socStatusType_id <= 12
     * </code>
     *
     * @param     mixed $socstatustypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterBySocstatustypeId($socstatustypeId = null, $comparison = null)
    {
        if (is_array($socstatustypeId)) {
            $useMinMax = false;
            if (isset($socstatustypeId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::SOCSTATUSTYPE_ID, $socstatustypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socstatustypeId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::SOCSTATUSTYPE_ID, $socstatustypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::SOCSTATUSTYPE_ID, $socstatustypeId, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByInsurerId($insurerId = null, $comparison = null)
    {
        if (is_array($insurerId)) {
            $useMinMax = false;
            if (isset($insurerId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::INSURER_ID, $insurerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insurerId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::INSURER_ID, $insurerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::INSURER_ID, $insurerId, $comparison);
    }

    /**
     * Filter the query on the policyType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPolicytypeId(1234); // WHERE policyType_id = 1234
     * $query->filterByPolicytypeId(array(12, 34)); // WHERE policyType_id IN (12, 34)
     * $query->filterByPolicytypeId(array('min' => 12)); // WHERE policyType_id >= 12
     * $query->filterByPolicytypeId(array('max' => 12)); // WHERE policyType_id <= 12
     * </code>
     *
     * @param     mixed $policytypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByPolicytypeId($policytypeId = null, $comparison = null)
    {
        if (is_array($policytypeId)) {
            $useMinMax = false;
            if (isset($policytypeId['min'])) {
                $this->addUsingAlias(ContractContingentPeer::POLICYTYPE_ID, $policytypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($policytypeId['max'])) {
                $this->addUsingAlias(ContractContingentPeer::POLICYTYPE_ID, $policytypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::POLICYTYPE_ID, $policytypeId, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(ContractContingentPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(ContractContingentPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::SEX, $sex, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ContractContingentPeer::AGE, $age, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::AGE_BU, $ageBu, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::AGE_BC, $ageBc, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::AGE_EU, $ageEu, $comparison);
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
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(ContractContingentPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContractContingentPeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ContractContingent $contractContingent Object to remove from the list of results
     *
     * @return ContractContingentQuery The current query, for fluid interface
     */
    public function prune($contractContingent = null)
    {
        if ($contractContingent) {
            $this->addUsingAlias(ContractContingentPeer::ID, $contractContingent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
