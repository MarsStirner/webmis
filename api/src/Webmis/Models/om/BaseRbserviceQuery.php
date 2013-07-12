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
use Webmis\Models\RbhospitalbedprofileService;
use Webmis\Models\Rbmedicalaidprofile;
use Webmis\Models\Rbmedicalkind;
use Webmis\Models\Rbservice;
use Webmis\Models\RbservicePeer;
use Webmis\Models\RbserviceProfile;
use Webmis\Models\RbserviceQuery;
use Webmis\Models\Rbserviceuet;

/**
 * Base class that represents a query for the 'rbService' table.
 *
 *
 *
 * @method RbserviceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbserviceQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbserviceQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbserviceQuery orderByEislegacy($order = Criteria::ASC) Order by the eisLegacy column
 * @method RbserviceQuery orderByNomenclaturelegacy($order = Criteria::ASC) Order by the nomenclatureLegacy column
 * @method RbserviceQuery orderByLicense($order = Criteria::ASC) Order by the license column
 * @method RbserviceQuery orderByInfis($order = Criteria::ASC) Order by the infis column
 * @method RbserviceQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method RbserviceQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method RbserviceQuery orderByMedicalaidprofileId($order = Criteria::ASC) Order by the medicalAidProfile_id column
 * @method RbserviceQuery orderByAdultuetdoctor($order = Criteria::ASC) Order by the adultUetDoctor column
 * @method RbserviceQuery orderByAdultuetaveragemedworker($order = Criteria::ASC) Order by the adultUetAverageMedWorker column
 * @method RbserviceQuery orderByChilduetdoctor($order = Criteria::ASC) Order by the childUetDoctor column
 * @method RbserviceQuery orderByChilduetaveragemedworker($order = Criteria::ASC) Order by the childUetAverageMedWorker column
 * @method RbserviceQuery orderByRbmedicalkindId($order = Criteria::ASC) Order by the rbMedicalKind_id column
 * @method RbserviceQuery orderByUet($order = Criteria::ASC) Order by the UET column
 * @method RbserviceQuery orderByDepartcode($order = Criteria::ASC) Order by the departCode column
 *
 * @method RbserviceQuery groupById() Group by the id column
 * @method RbserviceQuery groupByCode() Group by the code column
 * @method RbserviceQuery groupByName() Group by the name column
 * @method RbserviceQuery groupByEislegacy() Group by the eisLegacy column
 * @method RbserviceQuery groupByNomenclaturelegacy() Group by the nomenclatureLegacy column
 * @method RbserviceQuery groupByLicense() Group by the license column
 * @method RbserviceQuery groupByInfis() Group by the infis column
 * @method RbserviceQuery groupByBegdate() Group by the begDate column
 * @method RbserviceQuery groupByEnddate() Group by the endDate column
 * @method RbserviceQuery groupByMedicalaidprofileId() Group by the medicalAidProfile_id column
 * @method RbserviceQuery groupByAdultuetdoctor() Group by the adultUetDoctor column
 * @method RbserviceQuery groupByAdultuetaveragemedworker() Group by the adultUetAverageMedWorker column
 * @method RbserviceQuery groupByChilduetdoctor() Group by the childUetDoctor column
 * @method RbserviceQuery groupByChilduetaveragemedworker() Group by the childUetAverageMedWorker column
 * @method RbserviceQuery groupByRbmedicalkindId() Group by the rbMedicalKind_id column
 * @method RbserviceQuery groupByUet() Group by the UET column
 * @method RbserviceQuery groupByDepartcode() Group by the departCode column
 *
 * @method RbserviceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbserviceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbserviceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbserviceQuery leftJoinRbmedicalkind($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmedicalkind relation
 * @method RbserviceQuery rightJoinRbmedicalkind($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmedicalkind relation
 * @method RbserviceQuery innerJoinRbmedicalkind($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmedicalkind relation
 *
 * @method RbserviceQuery leftJoinRbmedicalaidprofile($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmedicalaidprofile relation
 * @method RbserviceQuery rightJoinRbmedicalaidprofile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmedicalaidprofile relation
 * @method RbserviceQuery innerJoinRbmedicalaidprofile($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmedicalaidprofile relation
 *
 * @method RbserviceQuery leftJoinRbhospitalbedprofileService($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbhospitalbedprofileService relation
 * @method RbserviceQuery rightJoinRbhospitalbedprofileService($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbhospitalbedprofileService relation
 * @method RbserviceQuery innerJoinRbhospitalbedprofileService($relationAlias = null) Adds a INNER JOIN clause to the query using the RbhospitalbedprofileService relation
 *
 * @method RbserviceQuery leftJoinRbserviceuet($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbserviceuet relation
 * @method RbserviceQuery rightJoinRbserviceuet($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbserviceuet relation
 * @method RbserviceQuery innerJoinRbserviceuet($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbserviceuet relation
 *
 * @method RbserviceQuery leftJoinRbserviceProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbserviceProfile relation
 * @method RbserviceQuery rightJoinRbserviceProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbserviceProfile relation
 * @method RbserviceQuery innerJoinRbserviceProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the RbserviceProfile relation
 *
 * @method Rbservice findOne(PropelPDO $con = null) Return the first Rbservice matching the query
 * @method Rbservice findOneOrCreate(PropelPDO $con = null) Return the first Rbservice matching the query, or a new Rbservice object populated from the query conditions when no match is found
 *
 * @method Rbservice findOneByCode(string $code) Return the first Rbservice filtered by the code column
 * @method Rbservice findOneByName(string $name) Return the first Rbservice filtered by the name column
 * @method Rbservice findOneByEislegacy(boolean $eisLegacy) Return the first Rbservice filtered by the eisLegacy column
 * @method Rbservice findOneByNomenclaturelegacy(boolean $nomenclatureLegacy) Return the first Rbservice filtered by the nomenclatureLegacy column
 * @method Rbservice findOneByLicense(boolean $license) Return the first Rbservice filtered by the license column
 * @method Rbservice findOneByInfis(string $infis) Return the first Rbservice filtered by the infis column
 * @method Rbservice findOneByBegdate(string $begDate) Return the first Rbservice filtered by the begDate column
 * @method Rbservice findOneByEnddate(string $endDate) Return the first Rbservice filtered by the endDate column
 * @method Rbservice findOneByMedicalaidprofileId(int $medicalAidProfile_id) Return the first Rbservice filtered by the medicalAidProfile_id column
 * @method Rbservice findOneByAdultuetdoctor(double $adultUetDoctor) Return the first Rbservice filtered by the adultUetDoctor column
 * @method Rbservice findOneByAdultuetaveragemedworker(double $adultUetAverageMedWorker) Return the first Rbservice filtered by the adultUetAverageMedWorker column
 * @method Rbservice findOneByChilduetdoctor(double $childUetDoctor) Return the first Rbservice filtered by the childUetDoctor column
 * @method Rbservice findOneByChilduetaveragemedworker(double $childUetAverageMedWorker) Return the first Rbservice filtered by the childUetAverageMedWorker column
 * @method Rbservice findOneByRbmedicalkindId(int $rbMedicalKind_id) Return the first Rbservice filtered by the rbMedicalKind_id column
 * @method Rbservice findOneByUet(double $UET) Return the first Rbservice filtered by the UET column
 * @method Rbservice findOneByDepartcode(string $departCode) Return the first Rbservice filtered by the departCode column
 *
 * @method array findById(int $id) Return Rbservice objects filtered by the id column
 * @method array findByCode(string $code) Return Rbservice objects filtered by the code column
 * @method array findByName(string $name) Return Rbservice objects filtered by the name column
 * @method array findByEislegacy(boolean $eisLegacy) Return Rbservice objects filtered by the eisLegacy column
 * @method array findByNomenclaturelegacy(boolean $nomenclatureLegacy) Return Rbservice objects filtered by the nomenclatureLegacy column
 * @method array findByLicense(boolean $license) Return Rbservice objects filtered by the license column
 * @method array findByInfis(string $infis) Return Rbservice objects filtered by the infis column
 * @method array findByBegdate(string $begDate) Return Rbservice objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Rbservice objects filtered by the endDate column
 * @method array findByMedicalaidprofileId(int $medicalAidProfile_id) Return Rbservice objects filtered by the medicalAidProfile_id column
 * @method array findByAdultuetdoctor(double $adultUetDoctor) Return Rbservice objects filtered by the adultUetDoctor column
 * @method array findByAdultuetaveragemedworker(double $adultUetAverageMedWorker) Return Rbservice objects filtered by the adultUetAverageMedWorker column
 * @method array findByChilduetdoctor(double $childUetDoctor) Return Rbservice objects filtered by the childUetDoctor column
 * @method array findByChilduetaveragemedworker(double $childUetAverageMedWorker) Return Rbservice objects filtered by the childUetAverageMedWorker column
 * @method array findByRbmedicalkindId(int $rbMedicalKind_id) Return Rbservice objects filtered by the rbMedicalKind_id column
 * @method array findByUet(double $UET) Return Rbservice objects filtered by the UET column
 * @method array findByDepartcode(string $departCode) Return Rbservice objects filtered by the departCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbserviceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbserviceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbservice', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbserviceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbserviceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbserviceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbserviceQuery) {
            return $criteria;
        }
        $query = new RbserviceQuery();
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
     * @return   Rbservice|Rbservice[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbservicePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbservicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbservice A model object, or null if the key is not found
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
     * @return                 Rbservice A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `eisLegacy`, `nomenclatureLegacy`, `license`, `infis`, `begDate`, `endDate`, `medicalAidProfile_id`, `adultUetDoctor`, `adultUetAverageMedWorker`, `childUetDoctor`, `childUetAverageMedWorker`, `rbMedicalKind_id`, `UET`, `departCode` FROM `rbService` WHERE `id` = :p0';
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
            $obj = new Rbservice();
            $obj->hydrate($row);
            RbservicePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbservice|Rbservice[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbservice[]|mixed the list of results, formatted by the current formatter
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
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbservicePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbservicePeer::ID, $keys, Criteria::IN);
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
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbservicePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbservicePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::ID, $id, $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbservicePeer::CODE, $code, $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbservicePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the eisLegacy column
     *
     * Example usage:
     * <code>
     * $query->filterByEislegacy(true); // WHERE eisLegacy = true
     * $query->filterByEislegacy('yes'); // WHERE eisLegacy = true
     * </code>
     *
     * @param     boolean|string $eislegacy The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByEislegacy($eislegacy = null, $comparison = null)
    {
        if (is_string($eislegacy)) {
            $eislegacy = in_array(strtolower($eislegacy), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbservicePeer::EISLEGACY, $eislegacy, $comparison);
    }

    /**
     * Filter the query on the nomenclatureLegacy column
     *
     * Example usage:
     * <code>
     * $query->filterByNomenclaturelegacy(true); // WHERE nomenclatureLegacy = true
     * $query->filterByNomenclaturelegacy('yes'); // WHERE nomenclatureLegacy = true
     * </code>
     *
     * @param     boolean|string $nomenclaturelegacy The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByNomenclaturelegacy($nomenclaturelegacy = null, $comparison = null)
    {
        if (is_string($nomenclaturelegacy)) {
            $nomenclaturelegacy = in_array(strtolower($nomenclaturelegacy), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbservicePeer::NOMENCLATURELEGACY, $nomenclaturelegacy, $comparison);
    }

    /**
     * Filter the query on the license column
     *
     * Example usage:
     * <code>
     * $query->filterByLicense(true); // WHERE license = true
     * $query->filterByLicense('yes'); // WHERE license = true
     * </code>
     *
     * @param     boolean|string $license The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByLicense($license = null, $comparison = null)
    {
        if (is_string($license)) {
            $license = in_array(strtolower($license), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbservicePeer::LICENSE, $license, $comparison);
    }

    /**
     * Filter the query on the infis column
     *
     * Example usage:
     * <code>
     * $query->filterByInfis('fooValue');   // WHERE infis = 'fooValue'
     * $query->filterByInfis('%fooValue%'); // WHERE infis LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infis The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByInfis($infis = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infis)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infis)) {
                $infis = str_replace('*', '%', $infis);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbservicePeer::INFIS, $infis, $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(RbservicePeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(RbservicePeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::BEGDATE, $begdate, $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(RbservicePeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(RbservicePeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::ENDDATE, $enddate, $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByMedicalaidprofileId($medicalaidprofileId = null, $comparison = null)
    {
        if (is_array($medicalaidprofileId)) {
            $useMinMax = false;
            if (isset($medicalaidprofileId['min'])) {
                $this->addUsingAlias(RbservicePeer::MEDICALAIDPROFILE_ID, $medicalaidprofileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($medicalaidprofileId['max'])) {
                $this->addUsingAlias(RbservicePeer::MEDICALAIDPROFILE_ID, $medicalaidprofileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::MEDICALAIDPROFILE_ID, $medicalaidprofileId, $comparison);
    }

    /**
     * Filter the query on the adultUetDoctor column
     *
     * Example usage:
     * <code>
     * $query->filterByAdultuetdoctor(1234); // WHERE adultUetDoctor = 1234
     * $query->filterByAdultuetdoctor(array(12, 34)); // WHERE adultUetDoctor IN (12, 34)
     * $query->filterByAdultuetdoctor(array('min' => 12)); // WHERE adultUetDoctor >= 12
     * $query->filterByAdultuetdoctor(array('max' => 12)); // WHERE adultUetDoctor <= 12
     * </code>
     *
     * @param     mixed $adultuetdoctor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByAdultuetdoctor($adultuetdoctor = null, $comparison = null)
    {
        if (is_array($adultuetdoctor)) {
            $useMinMax = false;
            if (isset($adultuetdoctor['min'])) {
                $this->addUsingAlias(RbservicePeer::ADULTUETDOCTOR, $adultuetdoctor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adultuetdoctor['max'])) {
                $this->addUsingAlias(RbservicePeer::ADULTUETDOCTOR, $adultuetdoctor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::ADULTUETDOCTOR, $adultuetdoctor, $comparison);
    }

    /**
     * Filter the query on the adultUetAverageMedWorker column
     *
     * Example usage:
     * <code>
     * $query->filterByAdultuetaveragemedworker(1234); // WHERE adultUetAverageMedWorker = 1234
     * $query->filterByAdultuetaveragemedworker(array(12, 34)); // WHERE adultUetAverageMedWorker IN (12, 34)
     * $query->filterByAdultuetaveragemedworker(array('min' => 12)); // WHERE adultUetAverageMedWorker >= 12
     * $query->filterByAdultuetaveragemedworker(array('max' => 12)); // WHERE adultUetAverageMedWorker <= 12
     * </code>
     *
     * @param     mixed $adultuetaveragemedworker The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByAdultuetaveragemedworker($adultuetaveragemedworker = null, $comparison = null)
    {
        if (is_array($adultuetaveragemedworker)) {
            $useMinMax = false;
            if (isset($adultuetaveragemedworker['min'])) {
                $this->addUsingAlias(RbservicePeer::ADULTUETAVERAGEMEDWORKER, $adultuetaveragemedworker['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($adultuetaveragemedworker['max'])) {
                $this->addUsingAlias(RbservicePeer::ADULTUETAVERAGEMEDWORKER, $adultuetaveragemedworker['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::ADULTUETAVERAGEMEDWORKER, $adultuetaveragemedworker, $comparison);
    }

    /**
     * Filter the query on the childUetDoctor column
     *
     * Example usage:
     * <code>
     * $query->filterByChilduetdoctor(1234); // WHERE childUetDoctor = 1234
     * $query->filterByChilduetdoctor(array(12, 34)); // WHERE childUetDoctor IN (12, 34)
     * $query->filterByChilduetdoctor(array('min' => 12)); // WHERE childUetDoctor >= 12
     * $query->filterByChilduetdoctor(array('max' => 12)); // WHERE childUetDoctor <= 12
     * </code>
     *
     * @param     mixed $childuetdoctor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByChilduetdoctor($childuetdoctor = null, $comparison = null)
    {
        if (is_array($childuetdoctor)) {
            $useMinMax = false;
            if (isset($childuetdoctor['min'])) {
                $this->addUsingAlias(RbservicePeer::CHILDUETDOCTOR, $childuetdoctor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childuetdoctor['max'])) {
                $this->addUsingAlias(RbservicePeer::CHILDUETDOCTOR, $childuetdoctor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::CHILDUETDOCTOR, $childuetdoctor, $comparison);
    }

    /**
     * Filter the query on the childUetAverageMedWorker column
     *
     * Example usage:
     * <code>
     * $query->filterByChilduetaveragemedworker(1234); // WHERE childUetAverageMedWorker = 1234
     * $query->filterByChilduetaveragemedworker(array(12, 34)); // WHERE childUetAverageMedWorker IN (12, 34)
     * $query->filterByChilduetaveragemedworker(array('min' => 12)); // WHERE childUetAverageMedWorker >= 12
     * $query->filterByChilduetaveragemedworker(array('max' => 12)); // WHERE childUetAverageMedWorker <= 12
     * </code>
     *
     * @param     mixed $childuetaveragemedworker The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByChilduetaveragemedworker($childuetaveragemedworker = null, $comparison = null)
    {
        if (is_array($childuetaveragemedworker)) {
            $useMinMax = false;
            if (isset($childuetaveragemedworker['min'])) {
                $this->addUsingAlias(RbservicePeer::CHILDUETAVERAGEMEDWORKER, $childuetaveragemedworker['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($childuetaveragemedworker['max'])) {
                $this->addUsingAlias(RbservicePeer::CHILDUETAVERAGEMEDWORKER, $childuetaveragemedworker['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::CHILDUETAVERAGEMEDWORKER, $childuetaveragemedworker, $comparison);
    }

    /**
     * Filter the query on the rbMedicalKind_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbmedicalkindId(1234); // WHERE rbMedicalKind_id = 1234
     * $query->filterByRbmedicalkindId(array(12, 34)); // WHERE rbMedicalKind_id IN (12, 34)
     * $query->filterByRbmedicalkindId(array('min' => 12)); // WHERE rbMedicalKind_id >= 12
     * $query->filterByRbmedicalkindId(array('max' => 12)); // WHERE rbMedicalKind_id <= 12
     * </code>
     *
     * @see       filterByRbmedicalkind()
     *
     * @param     mixed $rbmedicalkindId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByRbmedicalkindId($rbmedicalkindId = null, $comparison = null)
    {
        if (is_array($rbmedicalkindId)) {
            $useMinMax = false;
            if (isset($rbmedicalkindId['min'])) {
                $this->addUsingAlias(RbservicePeer::RBMEDICALKIND_ID, $rbmedicalkindId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbmedicalkindId['max'])) {
                $this->addUsingAlias(RbservicePeer::RBMEDICALKIND_ID, $rbmedicalkindId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::RBMEDICALKIND_ID, $rbmedicalkindId, $comparison);
    }

    /**
     * Filter the query on the UET column
     *
     * Example usage:
     * <code>
     * $query->filterByUet(1234); // WHERE UET = 1234
     * $query->filterByUet(array(12, 34)); // WHERE UET IN (12, 34)
     * $query->filterByUet(array('min' => 12)); // WHERE UET >= 12
     * $query->filterByUet(array('max' => 12)); // WHERE UET <= 12
     * </code>
     *
     * @param     mixed $uet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByUet($uet = null, $comparison = null)
    {
        if (is_array($uet)) {
            $useMinMax = false;
            if (isset($uet['min'])) {
                $this->addUsingAlias(RbservicePeer::UET, $uet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uet['max'])) {
                $this->addUsingAlias(RbservicePeer::UET, $uet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbservicePeer::UET, $uet, $comparison);
    }

    /**
     * Filter the query on the departCode column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartcode('fooValue');   // WHERE departCode = 'fooValue'
     * $query->filterByDepartcode('%fooValue%'); // WHERE departCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $departcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function filterByDepartcode($departcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $departcode)) {
                $departcode = str_replace('*', '%', $departcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbservicePeer::DEPARTCODE, $departcode, $comparison);
    }

    /**
     * Filter the query by a related Rbmedicalkind object
     *
     * @param   Rbmedicalkind|PropelObjectCollection $rbmedicalkind The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmedicalkind($rbmedicalkind, $comparison = null)
    {
        if ($rbmedicalkind instanceof Rbmedicalkind) {
            return $this
                ->addUsingAlias(RbservicePeer::RBMEDICALKIND_ID, $rbmedicalkind->getId(), $comparison);
        } elseif ($rbmedicalkind instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbservicePeer::RBMEDICALKIND_ID, $rbmedicalkind->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbmedicalkind() only accepts arguments of type Rbmedicalkind or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbmedicalkind relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function joinRbmedicalkind($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbmedicalkind');

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
            $this->addJoinObject($join, 'Rbmedicalkind');
        }

        return $this;
    }

    /**
     * Use the Rbmedicalkind relation Rbmedicalkind object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbmedicalkindQuery A secondary query class using the current class as primary query
     */
    public function useRbmedicalkindQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbmedicalkind($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbmedicalkind', '\Webmis\Models\RbmedicalkindQuery');
    }

    /**
     * Filter the query by a related Rbmedicalaidprofile object
     *
     * @param   Rbmedicalaidprofile|PropelObjectCollection $rbmedicalaidprofile The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmedicalaidprofile($rbmedicalaidprofile, $comparison = null)
    {
        if ($rbmedicalaidprofile instanceof Rbmedicalaidprofile) {
            return $this
                ->addUsingAlias(RbservicePeer::MEDICALAIDPROFILE_ID, $rbmedicalaidprofile->getId(), $comparison);
        } elseif ($rbmedicalaidprofile instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbservicePeer::MEDICALAIDPROFILE_ID, $rbmedicalaidprofile->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
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
     * Filter the query by a related RbhospitalbedprofileService object
     *
     * @param   RbhospitalbedprofileService|PropelObjectCollection $rbhospitalbedprofileService  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbhospitalbedprofileService($rbhospitalbedprofileService, $comparison = null)
    {
        if ($rbhospitalbedprofileService instanceof RbhospitalbedprofileService) {
            return $this
                ->addUsingAlias(RbservicePeer::ID, $rbhospitalbedprofileService->getRbserviceId(), $comparison);
        } elseif ($rbhospitalbedprofileService instanceof PropelObjectCollection) {
            return $this
                ->useRbhospitalbedprofileServiceQuery()
                ->filterByPrimaryKeys($rbhospitalbedprofileService->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbhospitalbedprofileService() only accepts arguments of type RbhospitalbedprofileService or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbhospitalbedprofileService relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function joinRbhospitalbedprofileService($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbhospitalbedprofileService');

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
            $this->addJoinObject($join, 'RbhospitalbedprofileService');
        }

        return $this;
    }

    /**
     * Use the RbhospitalbedprofileService relation RbhospitalbedprofileService object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbhospitalbedprofileServiceQuery A secondary query class using the current class as primary query
     */
    public function useRbhospitalbedprofileServiceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbhospitalbedprofileService($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbhospitalbedprofileService', '\Webmis\Models\RbhospitalbedprofileServiceQuery');
    }

    /**
     * Filter the query by a related Rbserviceuet object
     *
     * @param   Rbserviceuet|PropelObjectCollection $rbserviceuet  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbserviceuet($rbserviceuet, $comparison = null)
    {
        if ($rbserviceuet instanceof Rbserviceuet) {
            return $this
                ->addUsingAlias(RbservicePeer::ID, $rbserviceuet->getRbserviceId(), $comparison);
        } elseif ($rbserviceuet instanceof PropelObjectCollection) {
            return $this
                ->useRbserviceuetQuery()
                ->filterByPrimaryKeys($rbserviceuet->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbserviceuet() only accepts arguments of type Rbserviceuet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbserviceuet relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function joinRbserviceuet($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbserviceuet');

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
            $this->addJoinObject($join, 'Rbserviceuet');
        }

        return $this;
    }

    /**
     * Use the Rbserviceuet relation Rbserviceuet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbserviceuetQuery A secondary query class using the current class as primary query
     */
    public function useRbserviceuetQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbserviceuet($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbserviceuet', '\Webmis\Models\RbserviceuetQuery');
    }

    /**
     * Filter the query by a related RbserviceProfile object
     *
     * @param   RbserviceProfile|PropelObjectCollection $rbserviceProfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbserviceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbserviceProfile($rbserviceProfile, $comparison = null)
    {
        if ($rbserviceProfile instanceof RbserviceProfile) {
            return $this
                ->addUsingAlias(RbservicePeer::ID, $rbserviceProfile->getMasterId(), $comparison);
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
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function joinRbserviceProfile($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useRbserviceProfileQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbserviceProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbserviceProfile', '\Webmis\Models\RbserviceProfileQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbservice $rbservice Object to remove from the list of results
     *
     * @return RbserviceQuery The current query, for fluid interface
     */
    public function prune($rbservice = null)
    {
        if ($rbservice) {
            $this->addUsingAlias(RbservicePeer::ID, $rbservice->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
