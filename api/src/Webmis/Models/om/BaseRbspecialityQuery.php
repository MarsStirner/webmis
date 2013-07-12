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
use Webmis\Models\Quotingbyspeciality;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\Rbspeciality;
use Webmis\Models\RbspecialityPeer;
use Webmis\Models\RbspecialityQuery;

/**
 * Base class that represents a query for the 'rbSpeciality' table.
 *
 *
 *
 * @method RbspecialityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbspecialityQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbspecialityQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbspecialityQuery orderByOksoname($order = Criteria::ASC) Order by the OKSOName column
 * @method RbspecialityQuery orderByOksocode($order = Criteria::ASC) Order by the OKSOCode column
 * @method RbspecialityQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method RbspecialityQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method RbspecialityQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method RbspecialityQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method RbspecialityQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method RbspecialityQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method RbspecialityQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method RbspecialityQuery orderByMkbfilter($order = Criteria::ASC) Order by the mkbFilter column
 * @method RbspecialityQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method RbspecialityQuery orderByQuotingenabled($order = Criteria::ASC) Order by the quotingEnabled column
 *
 * @method RbspecialityQuery groupById() Group by the id column
 * @method RbspecialityQuery groupByCode() Group by the code column
 * @method RbspecialityQuery groupByName() Group by the name column
 * @method RbspecialityQuery groupByOksoname() Group by the OKSOName column
 * @method RbspecialityQuery groupByOksocode() Group by the OKSOCode column
 * @method RbspecialityQuery groupByServiceId() Group by the service_id column
 * @method RbspecialityQuery groupBySex() Group by the sex column
 * @method RbspecialityQuery groupByAge() Group by the age column
 * @method RbspecialityQuery groupByAgeBu() Group by the age_bu column
 * @method RbspecialityQuery groupByAgeBc() Group by the age_bc column
 * @method RbspecialityQuery groupByAgeEu() Group by the age_eu column
 * @method RbspecialityQuery groupByAgeEc() Group by the age_ec column
 * @method RbspecialityQuery groupByMkbfilter() Group by the mkbFilter column
 * @method RbspecialityQuery groupByRegionalcode() Group by the regionalCode column
 * @method RbspecialityQuery groupByQuotingenabled() Group by the quotingEnabled column
 *
 * @method RbspecialityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbspecialityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbspecialityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbspecialityQuery leftJoinQuotingbyspeciality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quotingbyspeciality relation
 * @method RbspecialityQuery rightJoinQuotingbyspeciality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quotingbyspeciality relation
 * @method RbspecialityQuery innerJoinQuotingbyspeciality($relationAlias = null) Adds a INNER JOIN clause to the query using the Quotingbyspeciality relation
 *
 * @method RbspecialityQuery leftJoinRbserviceProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbserviceProfile relation
 * @method RbspecialityQuery rightJoinRbserviceProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbserviceProfile relation
 * @method RbspecialityQuery innerJoinRbserviceProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the RbserviceProfile relation
 *
 * @method Rbspeciality findOne(PropelPDO $con = null) Return the first Rbspeciality matching the query
 * @method Rbspeciality findOneOrCreate(PropelPDO $con = null) Return the first Rbspeciality matching the query, or a new Rbspeciality object populated from the query conditions when no match is found
 *
 * @method Rbspeciality findOneByCode(string $code) Return the first Rbspeciality filtered by the code column
 * @method Rbspeciality findOneByName(string $name) Return the first Rbspeciality filtered by the name column
 * @method Rbspeciality findOneByOksoname(string $OKSOName) Return the first Rbspeciality filtered by the OKSOName column
 * @method Rbspeciality findOneByOksocode(string $OKSOCode) Return the first Rbspeciality filtered by the OKSOCode column
 * @method Rbspeciality findOneByServiceId(int $service_id) Return the first Rbspeciality filtered by the service_id column
 * @method Rbspeciality findOneBySex(int $sex) Return the first Rbspeciality filtered by the sex column
 * @method Rbspeciality findOneByAge(string $age) Return the first Rbspeciality filtered by the age column
 * @method Rbspeciality findOneByAgeBu(int $age_bu) Return the first Rbspeciality filtered by the age_bu column
 * @method Rbspeciality findOneByAgeBc(int $age_bc) Return the first Rbspeciality filtered by the age_bc column
 * @method Rbspeciality findOneByAgeEu(int $age_eu) Return the first Rbspeciality filtered by the age_eu column
 * @method Rbspeciality findOneByAgeEc(int $age_ec) Return the first Rbspeciality filtered by the age_ec column
 * @method Rbspeciality findOneByMkbfilter(string $mkbFilter) Return the first Rbspeciality filtered by the mkbFilter column
 * @method Rbspeciality findOneByRegionalcode(string $regionalCode) Return the first Rbspeciality filtered by the regionalCode column
 * @method Rbspeciality findOneByQuotingenabled(int $quotingEnabled) Return the first Rbspeciality filtered by the quotingEnabled column
 *
 * @method array findById(int $id) Return Rbspeciality objects filtered by the id column
 * @method array findByCode(string $code) Return Rbspeciality objects filtered by the code column
 * @method array findByName(string $name) Return Rbspeciality objects filtered by the name column
 * @method array findByOksoname(string $OKSOName) Return Rbspeciality objects filtered by the OKSOName column
 * @method array findByOksocode(string $OKSOCode) Return Rbspeciality objects filtered by the OKSOCode column
 * @method array findByServiceId(int $service_id) Return Rbspeciality objects filtered by the service_id column
 * @method array findBySex(int $sex) Return Rbspeciality objects filtered by the sex column
 * @method array findByAge(string $age) Return Rbspeciality objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return Rbspeciality objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return Rbspeciality objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return Rbspeciality objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return Rbspeciality objects filtered by the age_ec column
 * @method array findByMkbfilter(string $mkbFilter) Return Rbspeciality objects filtered by the mkbFilter column
 * @method array findByRegionalcode(string $regionalCode) Return Rbspeciality objects filtered by the regionalCode column
 * @method array findByQuotingenabled(int $quotingEnabled) Return Rbspeciality objects filtered by the quotingEnabled column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbspecialityQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbspecialityQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbspeciality', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbspecialityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbspecialityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbspecialityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbspecialityQuery) {
            return $criteria;
        }
        $query = new RbspecialityQuery();
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
     * @return   Rbspeciality|Rbspeciality[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbspecialityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbspecialityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbspeciality A model object, or null if the key is not found
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
     * @return                 Rbspeciality A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `OKSOName`, `OKSOCode`, `service_id`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `mkbFilter`, `regionalCode`, `quotingEnabled` FROM `rbSpeciality` WHERE `id` = :p0';
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
            $obj = new Rbspeciality();
            $obj->hydrate($row);
            RbspecialityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbspeciality|Rbspeciality[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbspeciality[]|mixed the list of results, formatted by the current formatter
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbspecialityPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbspecialityPeer::ID, $keys, Criteria::IN);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbspecialityPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbspecialityPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the OKSOName column
     *
     * Example usage:
     * <code>
     * $query->filterByOksoname('fooValue');   // WHERE OKSOName = 'fooValue'
     * $query->filterByOksoname('%fooValue%'); // WHERE OKSOName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oksoname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByOksoname($oksoname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oksoname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $oksoname)) {
                $oksoname = str_replace('*', '%', $oksoname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::OKSONAME, $oksoname, $comparison);
    }

    /**
     * Filter the query on the OKSOCode column
     *
     * Example usage:
     * <code>
     * $query->filterByOksocode('fooValue');   // WHERE OKSOCode = 'fooValue'
     * $query->filterByOksocode('%fooValue%'); // WHERE OKSOCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oksocode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByOksocode($oksocode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oksocode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $oksocode)) {
                $oksocode = str_replace('*', '%', $oksocode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::OKSOCODE, $oksocode, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(RbspecialityPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(RbspecialityPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::SERVICE_ID, $serviceId, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(RbspecialityPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(RbspecialityPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::SEX, $sex, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbspecialityPeer::AGE, $age, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::AGE_BU, $ageBu, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::AGE_BC, $ageBc, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::AGE_EU, $ageEu, $comparison);
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
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(RbspecialityPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the mkbFilter column
     *
     * Example usage:
     * <code>
     * $query->filterByMkbfilter('fooValue');   // WHERE mkbFilter = 'fooValue'
     * $query->filterByMkbfilter('%fooValue%'); // WHERE mkbFilter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mkbfilter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByMkbfilter($mkbfilter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mkbfilter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mkbfilter)) {
                $mkbfilter = str_replace('*', '%', $mkbfilter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::MKBFILTER, $mkbfilter, $comparison);
    }

    /**
     * Filter the query on the regionalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalcode('fooValue');   // WHERE regionalCode = 'fooValue'
     * $query->filterByRegionalcode('%fooValue%'); // WHERE regionalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByRegionalcode($regionalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalcode)) {
                $regionalcode = str_replace('*', '%', $regionalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::REGIONALCODE, $regionalcode, $comparison);
    }

    /**
     * Filter the query on the quotingEnabled column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotingenabled(1234); // WHERE quotingEnabled = 1234
     * $query->filterByQuotingenabled(array(12, 34)); // WHERE quotingEnabled IN (12, 34)
     * $query->filterByQuotingenabled(array('min' => 12)); // WHERE quotingEnabled >= 12
     * $query->filterByQuotingenabled(array('max' => 12)); // WHERE quotingEnabled <= 12
     * </code>
     *
     * @param     mixed $quotingenabled The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function filterByQuotingenabled($quotingenabled = null, $comparison = null)
    {
        if (is_array($quotingenabled)) {
            $useMinMax = false;
            if (isset($quotingenabled['min'])) {
                $this->addUsingAlias(RbspecialityPeer::QUOTINGENABLED, $quotingenabled['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotingenabled['max'])) {
                $this->addUsingAlias(RbspecialityPeer::QUOTINGENABLED, $quotingenabled['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbspecialityPeer::QUOTINGENABLED, $quotingenabled, $comparison);
    }

    /**
     * Filter the query by a related Quotingbyspeciality object
     *
     * @param   Quotingbyspeciality|PropelObjectCollection $quotingbyspeciality  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbspecialityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuotingbyspeciality($quotingbyspeciality, $comparison = null)
    {
        if ($quotingbyspeciality instanceof Quotingbyspeciality) {
            return $this
                ->addUsingAlias(RbspecialityPeer::ID, $quotingbyspeciality->getSpecialityId(), $comparison);
        } elseif ($quotingbyspeciality instanceof PropelObjectCollection) {
            return $this
                ->useQuotingbyspecialityQuery()
                ->filterByPrimaryKeys($quotingbyspeciality->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByQuotingbyspeciality() only accepts arguments of type Quotingbyspeciality or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quotingbyspeciality relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function joinQuotingbyspeciality($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quotingbyspeciality');

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
            $this->addJoinObject($join, 'Quotingbyspeciality');
        }

        return $this;
    }

    /**
     * Use the Quotingbyspeciality relation Quotingbyspeciality object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\QuotingbyspecialityQuery A secondary query class using the current class as primary query
     */
    public function useQuotingbyspecialityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuotingbyspeciality($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quotingbyspeciality', '\Webmis\Models\QuotingbyspecialityQuery');
    }

    /**
     * Filter the query by a related RbserviceProfile object
     *
     * @param   RbserviceProfile|PropelObjectCollection $rbserviceProfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbspecialityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbserviceProfile($rbserviceProfile, $comparison = null)
    {
        if ($rbserviceProfile instanceof RbserviceProfile) {
            return $this
                ->addUsingAlias(RbspecialityPeer::ID, $rbserviceProfile->getSpecialityId(), $comparison);
        } elseif ($rbserviceProfile instanceof PropelObjectCollection) {
            return $this
                ->useRbserviceProfileQuery()
                ->filterByPrimaryKeys($rbserviceProfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbserviceProfile() only accepts arguments of type RbserviceProfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbserviceProfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function joinRbserviceProfile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbserviceProfile');

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
            $this->addJoinObject($join, 'RbserviceProfile');
        }

        return $this;
    }

    /**
     * Use the RbserviceProfile relation RbserviceProfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbserviceProfileQuery A secondary query class using the current class as primary query
     */
    public function useRbserviceProfileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbserviceProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbserviceProfile', '\Webmis\Models\RbserviceProfileQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbspeciality $rbspeciality Object to remove from the list of results
     *
     * @return RbspecialityQuery The current query, for fluid interface
     */
    public function prune($rbspeciality = null)
    {
        if ($rbspeciality) {
            $this->addUsingAlias(RbspecialityPeer::ID, $rbspeciality->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
