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
use Webmis\Models\Rbmedicalaidprofile;
use Webmis\Models\Rbservice;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceProfilePeer;
use Webmis\Models\RbserviceProfileQuery;
use Webmis\Models\Rbspeciality;

/**
 * Base class that represents a query for the 'rbService_Profile' table.
 *
 *
 *
 * @method RbserviceProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbserviceProfileQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method RbserviceProfileQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method RbserviceProfileQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method RbserviceProfileQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method RbserviceProfileQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method RbserviceProfileQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method RbserviceProfileQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method RbserviceProfileQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method RbserviceProfileQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method RbserviceProfileQuery orderByMkbregexp($order = Criteria::ASC) Order by the mkbRegExp column
 * @method RbserviceProfileQuery orderByMedicalaidprofileId($order = Criteria::ASC) Order by the medicalAidProfile_id column
 *
 * @method RbserviceProfileQuery groupById() Group by the id column
 * @method RbserviceProfileQuery groupByIdx() Group by the idx column
 * @method RbserviceProfileQuery groupByMasterId() Group by the master_id column
 * @method RbserviceProfileQuery groupBySpecialityId() Group by the speciality_id column
 * @method RbserviceProfileQuery groupBySex() Group by the sex column
 * @method RbserviceProfileQuery groupByAge() Group by the age column
 * @method RbserviceProfileQuery groupByAgeBu() Group by the age_bu column
 * @method RbserviceProfileQuery groupByAgeBc() Group by the age_bc column
 * @method RbserviceProfileQuery groupByAgeEu() Group by the age_eu column
 * @method RbserviceProfileQuery groupByAgeEc() Group by the age_ec column
 * @method RbserviceProfileQuery groupByMkbregexp() Group by the mkbRegExp column
 * @method RbserviceProfileQuery groupByMedicalaidprofileId() Group by the medicalAidProfile_id column
 *
 * @method RbserviceProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbserviceProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbserviceProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbserviceProfileQuery leftJoinRbservice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbservice relation
 * @method RbserviceProfileQuery rightJoinRbservice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbservice relation
 * @method RbserviceProfileQuery innerJoinRbservice($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbservice relation
 *
 * @method RbserviceProfileQuery leftJoinRbmedicalaidprofile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmedicalaidprofile relation
 * @method RbserviceProfileQuery rightJoinRbmedicalaidprofile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmedicalaidprofile relation
 * @method RbserviceProfileQuery innerJoinRbmedicalaidprofile($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmedicalaidprofile relation
 *
 * @method RbserviceProfileQuery leftJoinRbspeciality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbspeciality relation
 * @method RbserviceProfileQuery rightJoinRbspeciality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbspeciality relation
 * @method RbserviceProfileQuery innerJoinRbspeciality($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbspeciality relation
 *
 * @method RbserviceProfile findOne(PropelPDO $con = null) Return the first RbserviceProfile matching the query
 * @method RbserviceProfile findOneOrCreate(PropelPDO $con = null) Return the first RbserviceProfile matching the query, or a new RbserviceProfile object populated from the query conditions when no match is found
 *
 * @method RbserviceProfile findOneByIdx(int $idx) Return the first RbserviceProfile filtered by the idx column
 * @method RbserviceProfile findOneByMasterId(int $master_id) Return the first RbserviceProfile filtered by the master_id column
 * @method RbserviceProfile findOneBySpecialityId(int $speciality_id) Return the first RbserviceProfile filtered by the speciality_id column
 * @method RbserviceProfile findOneBySex(int $sex) Return the first RbserviceProfile filtered by the sex column
 * @method RbserviceProfile findOneByAge(string $age) Return the first RbserviceProfile filtered by the age column
 * @method RbserviceProfile findOneByAgeBu(int $age_bu) Return the first RbserviceProfile filtered by the age_bu column
 * @method RbserviceProfile findOneByAgeBc(int $age_bc) Return the first RbserviceProfile filtered by the age_bc column
 * @method RbserviceProfile findOneByAgeEu(int $age_eu) Return the first RbserviceProfile filtered by the age_eu column
 * @method RbserviceProfile findOneByAgeEc(int $age_ec) Return the first RbserviceProfile filtered by the age_ec column
 * @method RbserviceProfile findOneByMkbregexp(string $mkbRegExp) Return the first RbserviceProfile filtered by the mkbRegExp column
 * @method RbserviceProfile findOneByMedicalaidprofileId(int $medicalAidProfile_id) Return the first RbserviceProfile filtered by the medicalAidProfile_id column
 *
 * @method array findById(int $id) Return RbserviceProfile objects filtered by the id column
 * @method array findByIdx(int $idx) Return RbserviceProfile objects filtered by the idx column
 * @method array findByMasterId(int $master_id) Return RbserviceProfile objects filtered by the master_id column
 * @method array findBySpecialityId(int $speciality_id) Return RbserviceProfile objects filtered by the speciality_id column
 * @method array findBySex(int $sex) Return RbserviceProfile objects filtered by the sex column
 * @method array findByAge(string $age) Return RbserviceProfile objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return RbserviceProfile objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return RbserviceProfile objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return RbserviceProfile objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return RbserviceProfile objects filtered by the age_ec column
 * @method array findByMkbregexp(string $mkbRegExp) Return RbserviceProfile objects filtered by the mkbRegExp column
 * @method array findByMedicalaidprofileId(int $medicalAidProfile_id) Return RbserviceProfile objects filtered by the medicalAidProfile_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbserviceProfileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbserviceProfileQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\RbserviceProfile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbserviceProfileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbserviceProfileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbserviceProfileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbserviceProfileQuery) {
            return $criteria;
        }
        $query = new RbserviceProfileQuery();
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
     * @return   RbserviceProfile|RbserviceProfile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbserviceProfilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbserviceProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RbserviceProfile A model object, or null if the key is not found
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
     * @return                 RbserviceProfile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `idx`, `master_id`, `speciality_id`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `mkbRegExp`, `medicalAidProfile_id` FROM `rbService_Profile` WHERE `id` = :p0';
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
            $obj = new RbserviceProfile();
            $obj->hydrate($row);
            RbserviceProfilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return RbserviceProfile|RbserviceProfile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RbserviceProfile[]|mixed the list of results, formatted by the current formatter
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbserviceProfilePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbserviceProfilePeer::ID, $keys, Criteria::IN);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the idx column
     *
     * Example usage:
     * <code>
     * $query->filterByIdx(1234); // WHERE idx = 1234
     * $query->filterByIdx(array(12, 34)); // WHERE idx IN (12, 34)
     * $query->filterByIdx(array('min' => 12)); // WHERE idx >= 12
     * $query->filterByIdx(array('max' => 12)); // WHERE idx <= 12
     * </code>
     *
     * @param     mixed $idx The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::IDX, $idx, $comparison);
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
     * @see       filterByRbservice()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the speciality_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecialityId(1234); // WHERE speciality_id = 1234
     * $query->filterBySpecialityId(array(12, 34)); // WHERE speciality_id IN (12, 34)
     * $query->filterBySpecialityId(array('min' => 12)); // WHERE speciality_id >= 12
     * $query->filterBySpecialityId(array('max' => 12)); // WHERE speciality_id <= 12
     * </code>
     *
     * @see       filterByRbspeciality()
     *
     * @param     mixed $specialityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::SPECIALITY_ID, $specialityId, $comparison);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::SEX, $sex, $comparison);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbserviceProfilePeer::AGE, $age, $comparison);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::AGE_BU, $ageBu, $comparison);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::AGE_BC, $ageBc, $comparison);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::AGE_EU, $ageEu, $comparison);
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
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the mkbRegExp column
     *
     * Example usage:
     * <code>
     * $query->filterByMkbregexp('fooValue');   // WHERE mkbRegExp = 'fooValue'
     * $query->filterByMkbregexp('%fooValue%'); // WHERE mkbRegExp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mkbregexp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByMkbregexp($mkbregexp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mkbregexp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mkbregexp)) {
                $mkbregexp = str_replace('*', '%', $mkbregexp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::MKBREGEXP, $mkbregexp, $comparison);
    }

    /**
     * Filter the query on the medicalAidProfile_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMedicalaidprofileId(1234); // WHERE medicalAidProfile_id = 1234
     * $query->filterByMedicalaidprofileId(array(12, 34)); // WHERE medicalAidProfile_id IN (12, 34)
     * $query->filterByMedicalaidprofileId(array('min' => 12)); // WHERE medicalAidProfile_id >= 12
     * $query->filterByMedicalaidprofileId(array('max' => 12)); // WHERE medicalAidProfile_id <= 12
     * </code>
     *
     * @see       filterByRbmedicalaidprofile()
     *
     * @param     mixed $medicalaidprofileId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function filterByMedicalaidprofileId($medicalaidprofileId = null, $comparison = null)
    {
        if (is_array($medicalaidprofileId)) {
            $useMinMax = false;
            if (isset($medicalaidprofileId['min'])) {
                $this->addUsingAlias(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, $medicalaidprofileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($medicalaidprofileId['max'])) {
                $this->addUsingAlias(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, $medicalaidprofileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, $medicalaidprofileId, $comparison);
    }

    /**
     * Filter the query by a related Rbservice object
     *
     * @param   Rbservice|PropelObjectCollection $rbservice The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceProfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbservice($rbservice, $comparison = null)
    {
        if ($rbservice instanceof Rbservice) {
            return $this
                ->addUsingAlias(RbserviceProfilePeer::MASTER_ID, $rbservice->getId(), $comparison);
        } elseif ($rbservice instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbserviceProfilePeer::MASTER_ID, $rbservice->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbservice() only accepts arguments of type Rbservice or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbservice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function joinRbservice($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbservice');

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
            $this->addJoinObject($join, 'Rbservice');
        }

        return $this;
    }

    /**
     * Use the Rbservice relation Rbservice object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbserviceQuery A secondary query class using the current class as primary query
     */
    public function useRbserviceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbservice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbservice', '\Webmis\Models\RbserviceQuery');
    }

    /**
     * Filter the query by a related Rbmedicalaidprofile object
     *
     * @param   Rbmedicalaidprofile|PropelObjectCollection $rbmedicalaidprofile The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceProfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmedicalaidprofile($rbmedicalaidprofile, $comparison = null)
    {
        if ($rbmedicalaidprofile instanceof Rbmedicalaidprofile) {
            return $this
                ->addUsingAlias(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, $rbmedicalaidprofile->getId(), $comparison);
        } elseif ($rbmedicalaidprofile instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbserviceProfilePeer::MEDICALAIDPROFILE_ID, $rbmedicalaidprofile->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbmedicalaidprofile() only accepts arguments of type Rbmedicalaidprofile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbmedicalaidprofile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function joinRbmedicalaidprofile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbmedicalaidprofile');

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
            $this->addJoinObject($join, 'Rbmedicalaidprofile');
        }

        return $this;
    }

    /**
     * Use the Rbmedicalaidprofile relation Rbmedicalaidprofile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbmedicalaidprofileQuery A secondary query class using the current class as primary query
     */
    public function useRbmedicalaidprofileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbmedicalaidprofile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbmedicalaidprofile', '\Webmis\Models\RbmedicalaidprofileQuery');
    }

    /**
     * Filter the query by a related Rbspeciality object
     *
     * @param   Rbspeciality|PropelObjectCollection $rbspeciality The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceProfileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbspeciality($rbspeciality, $comparison = null)
    {
        if ($rbspeciality instanceof Rbspeciality) {
            return $this
                ->addUsingAlias(RbserviceProfilePeer::SPECIALITY_ID, $rbspeciality->getId(), $comparison);
        } elseif ($rbspeciality instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbserviceProfilePeer::SPECIALITY_ID, $rbspeciality->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbspeciality() only accepts arguments of type Rbspeciality or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbspeciality relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function joinRbspeciality($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbspeciality');

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
            $this->addJoinObject($join, 'Rbspeciality');
        }

        return $this;
    }

    /**
     * Use the Rbspeciality relation Rbspeciality object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbspecialityQuery A secondary query class using the current class as primary query
     */
    public function useRbspecialityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbspeciality($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbspeciality', '\Webmis\Models\RbspecialityQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RbserviceProfile $rbserviceProfile Object to remove from the list of results
     *
     * @return RbserviceProfileQuery The current query, for fluid interface
     */
    public function prune($rbserviceProfile = null)
    {
        if ($rbserviceProfile) {
            $this->addUsingAlias(RbserviceProfilePeer::ID, $rbserviceProfile->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
