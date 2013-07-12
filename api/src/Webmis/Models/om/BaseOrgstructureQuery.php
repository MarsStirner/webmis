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
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureDisabledattendance;
use Webmis\Models\OrgstructurePeer;
use Webmis\Models\OrgstructureQuery;
use Webmis\Models\OrgstructureStock;
use Webmis\Models\Stockmotion;
use Webmis\Models\Stockrequisition;
use Webmis\Models\Stocktrans;

/**
 * Base class that represents a query for the 'OrgStructure' table.
 *
 *
 *
 * @method OrgstructureQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method OrgstructureQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method OrgstructureQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method OrgstructureQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method OrgstructureQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method OrgstructureQuery orderByOrganisationId($order = Criteria::ASC) Order by the organisation_id column
 * @method OrgstructureQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method OrgstructureQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method OrgstructureQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method OrgstructureQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method OrgstructureQuery orderByNetId($order = Criteria::ASC) Order by the net_id column
 * @method OrgstructureQuery orderByIsarea($order = Criteria::ASC) Order by the isArea column
 * @method OrgstructureQuery orderByHashospitalbeds($order = Criteria::ASC) Order by the hasHospitalBeds column
 * @method OrgstructureQuery orderByHasstocks($order = Criteria::ASC) Order by the hasStocks column
 * @method OrgstructureQuery orderByInfiscode($order = Criteria::ASC) Order by the infisCode column
 * @method OrgstructureQuery orderByInfisinternalcode($order = Criteria::ASC) Order by the infisInternalCode column
 * @method OrgstructureQuery orderByInfisdeptypecode($order = Criteria::ASC) Order by the infisDepTypeCode column
 * @method OrgstructureQuery orderByInfistariffcode($order = Criteria::ASC) Order by the infisTariffCode column
 * @method OrgstructureQuery orderByAvailableforexternal($order = Criteria::ASC) Order by the availableForExternal column
 * @method OrgstructureQuery orderByAddress($order = Criteria::ASC) Order by the Address column
 * @method OrgstructureQuery orderByInheriteventtypes($order = Criteria::ASC) Order by the inheritEventTypes column
 * @method OrgstructureQuery orderByInheritactiontypes($order = Criteria::ASC) Order by the inheritActionTypes column
 * @method OrgstructureQuery orderByInheritgaps($order = Criteria::ASC) Order by the inheritGaps column
 * @method OrgstructureQuery orderByUuidId($order = Criteria::ASC) Order by the uuid_id column
 * @method OrgstructureQuery orderByShow($order = Criteria::ASC) Order by the show column
 *
 * @method OrgstructureQuery groupById() Group by the id column
 * @method OrgstructureQuery groupByCreatedatetime() Group by the createDatetime column
 * @method OrgstructureQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method OrgstructureQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method OrgstructureQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method OrgstructureQuery groupByDeleted() Group by the deleted column
 * @method OrgstructureQuery groupByOrganisationId() Group by the organisation_id column
 * @method OrgstructureQuery groupByCode() Group by the code column
 * @method OrgstructureQuery groupByName() Group by the name column
 * @method OrgstructureQuery groupByParentId() Group by the parent_id column
 * @method OrgstructureQuery groupByType() Group by the type column
 * @method OrgstructureQuery groupByNetId() Group by the net_id column
 * @method OrgstructureQuery groupByIsarea() Group by the isArea column
 * @method OrgstructureQuery groupByHashospitalbeds() Group by the hasHospitalBeds column
 * @method OrgstructureQuery groupByHasstocks() Group by the hasStocks column
 * @method OrgstructureQuery groupByInfiscode() Group by the infisCode column
 * @method OrgstructureQuery groupByInfisinternalcode() Group by the infisInternalCode column
 * @method OrgstructureQuery groupByInfisdeptypecode() Group by the infisDepTypeCode column
 * @method OrgstructureQuery groupByInfistariffcode() Group by the infisTariffCode column
 * @method OrgstructureQuery groupByAvailableforexternal() Group by the availableForExternal column
 * @method OrgstructureQuery groupByAddress() Group by the Address column
 * @method OrgstructureQuery groupByInheriteventtypes() Group by the inheritEventTypes column
 * @method OrgstructureQuery groupByInheritactiontypes() Group by the inheritActionTypes column
 * @method OrgstructureQuery groupByInheritgaps() Group by the inheritGaps column
 * @method OrgstructureQuery groupByUuidId() Group by the uuid_id column
 * @method OrgstructureQuery groupByShow() Group by the show column
 *
 * @method OrgstructureQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureQuery leftJoinBlankactionsMoving($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsMoving relation
 * @method OrgstructureQuery rightJoinBlankactionsMoving($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsMoving relation
 * @method OrgstructureQuery innerJoinBlankactionsMoving($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsMoving relation
 *
 * @method OrgstructureQuery leftJoinOrgstructureDisabledattendance($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureDisabledattendance relation
 * @method OrgstructureQuery rightJoinOrgstructureDisabledattendance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureDisabledattendance relation
 * @method OrgstructureQuery innerJoinOrgstructureDisabledattendance($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureDisabledattendance relation
 *
 * @method OrgstructureQuery leftJoinOrgstructureStock($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureStock relation
 * @method OrgstructureQuery rightJoinOrgstructureStock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureStock relation
 * @method OrgstructureQuery innerJoinOrgstructureStock($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureStock relation
 *
 * @method OrgstructureQuery leftJoinStockmotionRelatedByReceiverId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionRelatedByReceiverId relation
 * @method OrgstructureQuery rightJoinStockmotionRelatedByReceiverId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionRelatedByReceiverId relation
 * @method OrgstructureQuery innerJoinStockmotionRelatedByReceiverId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionRelatedByReceiverId relation
 *
 * @method OrgstructureQuery leftJoinStockmotionRelatedBySupplierId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionRelatedBySupplierId relation
 * @method OrgstructureQuery rightJoinStockmotionRelatedBySupplierId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionRelatedBySupplierId relation
 * @method OrgstructureQuery innerJoinStockmotionRelatedBySupplierId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionRelatedBySupplierId relation
 *
 * @method OrgstructureQuery leftJoinStockrequisitionRelatedByRecipientId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionRelatedByRecipientId relation
 * @method OrgstructureQuery rightJoinStockrequisitionRelatedByRecipientId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionRelatedByRecipientId relation
 * @method OrgstructureQuery innerJoinStockrequisitionRelatedByRecipientId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionRelatedByRecipientId relation
 *
 * @method OrgstructureQuery leftJoinStockrequisitionRelatedBySupplierId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionRelatedBySupplierId relation
 * @method OrgstructureQuery rightJoinStockrequisitionRelatedBySupplierId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionRelatedBySupplierId relation
 * @method OrgstructureQuery innerJoinStockrequisitionRelatedBySupplierId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionRelatedBySupplierId relation
 *
 * @method OrgstructureQuery leftJoinStocktransRelatedByCreorgstructureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StocktransRelatedByCreorgstructureId relation
 * @method OrgstructureQuery rightJoinStocktransRelatedByCreorgstructureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StocktransRelatedByCreorgstructureId relation
 * @method OrgstructureQuery innerJoinStocktransRelatedByCreorgstructureId($relationAlias = null) Adds a INNER JOIN clause to the query using the StocktransRelatedByCreorgstructureId relation
 *
 * @method OrgstructureQuery leftJoinStocktransRelatedByDeborgstructureId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StocktransRelatedByDeborgstructureId relation
 * @method OrgstructureQuery rightJoinStocktransRelatedByDeborgstructureId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StocktransRelatedByDeborgstructureId relation
 * @method OrgstructureQuery innerJoinStocktransRelatedByDeborgstructureId($relationAlias = null) Adds a INNER JOIN clause to the query using the StocktransRelatedByDeborgstructureId relation
 *
 * @method Orgstructure findOne(PropelPDO $con = null) Return the first Orgstructure matching the query
 * @method Orgstructure findOneOrCreate(PropelPDO $con = null) Return the first Orgstructure matching the query, or a new Orgstructure object populated from the query conditions when no match is found
 *
 * @method Orgstructure findOneByCreatedatetime(string $createDatetime) Return the first Orgstructure filtered by the createDatetime column
 * @method Orgstructure findOneByCreatepersonId(int $createPerson_id) Return the first Orgstructure filtered by the createPerson_id column
 * @method Orgstructure findOneByModifydatetime(string $modifyDatetime) Return the first Orgstructure filtered by the modifyDatetime column
 * @method Orgstructure findOneByModifypersonId(int $modifyPerson_id) Return the first Orgstructure filtered by the modifyPerson_id column
 * @method Orgstructure findOneByDeleted(boolean $deleted) Return the first Orgstructure filtered by the deleted column
 * @method Orgstructure findOneByOrganisationId(int $organisation_id) Return the first Orgstructure filtered by the organisation_id column
 * @method Orgstructure findOneByCode(string $code) Return the first Orgstructure filtered by the code column
 * @method Orgstructure findOneByName(string $name) Return the first Orgstructure filtered by the name column
 * @method Orgstructure findOneByParentId(int $parent_id) Return the first Orgstructure filtered by the parent_id column
 * @method Orgstructure findOneByType(int $type) Return the first Orgstructure filtered by the type column
 * @method Orgstructure findOneByNetId(int $net_id) Return the first Orgstructure filtered by the net_id column
 * @method Orgstructure findOneByIsarea(int $isArea) Return the first Orgstructure filtered by the isArea column
 * @method Orgstructure findOneByHashospitalbeds(boolean $hasHospitalBeds) Return the first Orgstructure filtered by the hasHospitalBeds column
 * @method Orgstructure findOneByHasstocks(boolean $hasStocks) Return the first Orgstructure filtered by the hasStocks column
 * @method Orgstructure findOneByInfiscode(string $infisCode) Return the first Orgstructure filtered by the infisCode column
 * @method Orgstructure findOneByInfisinternalcode(string $infisInternalCode) Return the first Orgstructure filtered by the infisInternalCode column
 * @method Orgstructure findOneByInfisdeptypecode(string $infisDepTypeCode) Return the first Orgstructure filtered by the infisDepTypeCode column
 * @method Orgstructure findOneByInfistariffcode(string $infisTariffCode) Return the first Orgstructure filtered by the infisTariffCode column
 * @method Orgstructure findOneByAvailableforexternal(int $availableForExternal) Return the first Orgstructure filtered by the availableForExternal column
 * @method Orgstructure findOneByAddress(string $Address) Return the first Orgstructure filtered by the Address column
 * @method Orgstructure findOneByInheriteventtypes(boolean $inheritEventTypes) Return the first Orgstructure filtered by the inheritEventTypes column
 * @method Orgstructure findOneByInheritactiontypes(boolean $inheritActionTypes) Return the first Orgstructure filtered by the inheritActionTypes column
 * @method Orgstructure findOneByInheritgaps(boolean $inheritGaps) Return the first Orgstructure filtered by the inheritGaps column
 * @method Orgstructure findOneByUuidId(int $uuid_id) Return the first Orgstructure filtered by the uuid_id column
 * @method Orgstructure findOneByShow(int $show) Return the first Orgstructure filtered by the show column
 *
 * @method array findById(int $id) Return Orgstructure objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Orgstructure objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Orgstructure objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Orgstructure objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Orgstructure objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Orgstructure objects filtered by the deleted column
 * @method array findByOrganisationId(int $organisation_id) Return Orgstructure objects filtered by the organisation_id column
 * @method array findByCode(string $code) Return Orgstructure objects filtered by the code column
 * @method array findByName(string $name) Return Orgstructure objects filtered by the name column
 * @method array findByParentId(int $parent_id) Return Orgstructure objects filtered by the parent_id column
 * @method array findByType(int $type) Return Orgstructure objects filtered by the type column
 * @method array findByNetId(int $net_id) Return Orgstructure objects filtered by the net_id column
 * @method array findByIsarea(int $isArea) Return Orgstructure objects filtered by the isArea column
 * @method array findByHashospitalbeds(boolean $hasHospitalBeds) Return Orgstructure objects filtered by the hasHospitalBeds column
 * @method array findByHasstocks(boolean $hasStocks) Return Orgstructure objects filtered by the hasStocks column
 * @method array findByInfiscode(string $infisCode) Return Orgstructure objects filtered by the infisCode column
 * @method array findByInfisinternalcode(string $infisInternalCode) Return Orgstructure objects filtered by the infisInternalCode column
 * @method array findByInfisdeptypecode(string $infisDepTypeCode) Return Orgstructure objects filtered by the infisDepTypeCode column
 * @method array findByInfistariffcode(string $infisTariffCode) Return Orgstructure objects filtered by the infisTariffCode column
 * @method array findByAvailableforexternal(int $availableForExternal) Return Orgstructure objects filtered by the availableForExternal column
 * @method array findByAddress(string $Address) Return Orgstructure objects filtered by the Address column
 * @method array findByInheriteventtypes(boolean $inheritEventTypes) Return Orgstructure objects filtered by the inheritEventTypes column
 * @method array findByInheritactiontypes(boolean $inheritActionTypes) Return Orgstructure objects filtered by the inheritActionTypes column
 * @method array findByInheritgaps(boolean $inheritGaps) Return Orgstructure objects filtered by the inheritGaps column
 * @method array findByUuidId(int $uuid_id) Return Orgstructure objects filtered by the uuid_id column
 * @method array findByShow(int $show) Return Orgstructure objects filtered by the show column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Orgstructure', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureQuery) {
            return $criteria;
        }
        $query = new OrgstructureQuery();
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
     * @return   Orgstructure|Orgstructure[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructurePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructurePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Orgstructure A model object, or null if the key is not found
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
     * @return                 Orgstructure A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `organisation_id`, `code`, `name`, `parent_id`, `type`, `net_id`, `isArea`, `hasHospitalBeds`, `hasStocks`, `infisCode`, `infisInternalCode`, `infisDepTypeCode`, `infisTariffCode`, `availableForExternal`, `Address`, `inheritEventTypes`, `inheritActionTypes`, `inheritGaps`, `uuid_id`, `show` FROM `OrgStructure` WHERE `id` = :p0';
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
            $obj = new Orgstructure();
            $obj->hydrate($row);
            OrgstructurePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Orgstructure|Orgstructure[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Orgstructure[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructurePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructurePeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructurePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructurePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::ID, $id, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(OrgstructurePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(OrgstructurePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(OrgstructurePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(OrgstructurePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(OrgstructurePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(OrgstructurePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(OrgstructurePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(OrgstructurePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructurePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the organisation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganisationId(1234); // WHERE organisation_id = 1234
     * $query->filterByOrganisationId(array(12, 34)); // WHERE organisation_id IN (12, 34)
     * $query->filterByOrganisationId(array('min' => 12)); // WHERE organisation_id >= 12
     * $query->filterByOrganisationId(array('max' => 12)); // WHERE organisation_id <= 12
     * </code>
     *
     * @param     mixed $organisationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByOrganisationId($organisationId = null, $comparison = null)
    {
        if (is_array($organisationId)) {
            $useMinMax = false;
            if (isset($organisationId['min'])) {
                $this->addUsingAlias(OrgstructurePeer::ORGANISATION_ID, $organisationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organisationId['max'])) {
                $this->addUsingAlias(OrgstructurePeer::ORGANISATION_ID, $organisationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::ORGANISATION_ID, $organisationId, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
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

        return $this->addUsingAlias(OrgstructurePeer::CODE, $code, $comparison);
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
     * @return OrgstructureQuery The current query, for fluid interface
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

        return $this->addUsingAlias(OrgstructurePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id >= 12
     * $query->filterByParentId(array('max' => 12)); // WHERE parent_id <= 12
     * </code>
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(OrgstructurePeer::PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(OrgstructurePeer::PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::PARENT_ID, $parentId, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type >= 12
     * $query->filterByType(array('max' => 12)); // WHERE type <= 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(OrgstructurePeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(OrgstructurePeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the net_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNetId(1234); // WHERE net_id = 1234
     * $query->filterByNetId(array(12, 34)); // WHERE net_id IN (12, 34)
     * $query->filterByNetId(array('min' => 12)); // WHERE net_id >= 12
     * $query->filterByNetId(array('max' => 12)); // WHERE net_id <= 12
     * </code>
     *
     * @param     mixed $netId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByNetId($netId = null, $comparison = null)
    {
        if (is_array($netId)) {
            $useMinMax = false;
            if (isset($netId['min'])) {
                $this->addUsingAlias(OrgstructurePeer::NET_ID, $netId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($netId['max'])) {
                $this->addUsingAlias(OrgstructurePeer::NET_ID, $netId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::NET_ID, $netId, $comparison);
    }

    /**
     * Filter the query on the isArea column
     *
     * Example usage:
     * <code>
     * $query->filterByIsarea(1234); // WHERE isArea = 1234
     * $query->filterByIsarea(array(12, 34)); // WHERE isArea IN (12, 34)
     * $query->filterByIsarea(array('min' => 12)); // WHERE isArea >= 12
     * $query->filterByIsarea(array('max' => 12)); // WHERE isArea <= 12
     * </code>
     *
     * @param     mixed $isarea The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByIsarea($isarea = null, $comparison = null)
    {
        if (is_array($isarea)) {
            $useMinMax = false;
            if (isset($isarea['min'])) {
                $this->addUsingAlias(OrgstructurePeer::ISAREA, $isarea['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isarea['max'])) {
                $this->addUsingAlias(OrgstructurePeer::ISAREA, $isarea['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::ISAREA, $isarea, $comparison);
    }

    /**
     * Filter the query on the hasHospitalBeds column
     *
     * Example usage:
     * <code>
     * $query->filterByHashospitalbeds(true); // WHERE hasHospitalBeds = true
     * $query->filterByHashospitalbeds('yes'); // WHERE hasHospitalBeds = true
     * </code>
     *
     * @param     boolean|string $hashospitalbeds The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByHashospitalbeds($hashospitalbeds = null, $comparison = null)
    {
        if (is_string($hashospitalbeds)) {
            $hashospitalbeds = in_array(strtolower($hashospitalbeds), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructurePeer::HASHOSPITALBEDS, $hashospitalbeds, $comparison);
    }

    /**
     * Filter the query on the hasStocks column
     *
     * Example usage:
     * <code>
     * $query->filterByHasstocks(true); // WHERE hasStocks = true
     * $query->filterByHasstocks('yes'); // WHERE hasStocks = true
     * </code>
     *
     * @param     boolean|string $hasstocks The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByHasstocks($hasstocks = null, $comparison = null)
    {
        if (is_string($hasstocks)) {
            $hasstocks = in_array(strtolower($hasstocks), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructurePeer::HASSTOCKS, $hasstocks, $comparison);
    }

    /**
     * Filter the query on the infisCode column
     *
     * Example usage:
     * <code>
     * $query->filterByInfiscode('fooValue');   // WHERE infisCode = 'fooValue'
     * $query->filterByInfiscode('%fooValue%'); // WHERE infisCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infiscode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInfiscode($infiscode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infiscode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infiscode)) {
                $infiscode = str_replace('*', '%', $infiscode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::INFISCODE, $infiscode, $comparison);
    }

    /**
     * Filter the query on the infisInternalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByInfisinternalcode('fooValue');   // WHERE infisInternalCode = 'fooValue'
     * $query->filterByInfisinternalcode('%fooValue%'); // WHERE infisInternalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infisinternalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInfisinternalcode($infisinternalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infisinternalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infisinternalcode)) {
                $infisinternalcode = str_replace('*', '%', $infisinternalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::INFISINTERNALCODE, $infisinternalcode, $comparison);
    }

    /**
     * Filter the query on the infisDepTypeCode column
     *
     * Example usage:
     * <code>
     * $query->filterByInfisdeptypecode('fooValue');   // WHERE infisDepTypeCode = 'fooValue'
     * $query->filterByInfisdeptypecode('%fooValue%'); // WHERE infisDepTypeCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infisdeptypecode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInfisdeptypecode($infisdeptypecode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infisdeptypecode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infisdeptypecode)) {
                $infisdeptypecode = str_replace('*', '%', $infisdeptypecode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::INFISDEPTYPECODE, $infisdeptypecode, $comparison);
    }

    /**
     * Filter the query on the infisTariffCode column
     *
     * Example usage:
     * <code>
     * $query->filterByInfistariffcode('fooValue');   // WHERE infisTariffCode = 'fooValue'
     * $query->filterByInfistariffcode('%fooValue%'); // WHERE infisTariffCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infistariffcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInfistariffcode($infistariffcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infistariffcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infistariffcode)) {
                $infistariffcode = str_replace('*', '%', $infistariffcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::INFISTARIFFCODE, $infistariffcode, $comparison);
    }

    /**
     * Filter the query on the availableForExternal column
     *
     * Example usage:
     * <code>
     * $query->filterByAvailableforexternal(1234); // WHERE availableForExternal = 1234
     * $query->filterByAvailableforexternal(array(12, 34)); // WHERE availableForExternal IN (12, 34)
     * $query->filterByAvailableforexternal(array('min' => 12)); // WHERE availableForExternal >= 12
     * $query->filterByAvailableforexternal(array('max' => 12)); // WHERE availableForExternal <= 12
     * </code>
     *
     * @param     mixed $availableforexternal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByAvailableforexternal($availableforexternal = null, $comparison = null)
    {
        if (is_array($availableforexternal)) {
            $useMinMax = false;
            if (isset($availableforexternal['min'])) {
                $this->addUsingAlias(OrgstructurePeer::AVAILABLEFOREXTERNAL, $availableforexternal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($availableforexternal['max'])) {
                $this->addUsingAlias(OrgstructurePeer::AVAILABLEFOREXTERNAL, $availableforexternal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::AVAILABLEFOREXTERNAL, $availableforexternal, $comparison);
    }

    /**
     * Filter the query on the Address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE Address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE Address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the inheritEventTypes column
     *
     * Example usage:
     * <code>
     * $query->filterByInheriteventtypes(true); // WHERE inheritEventTypes = true
     * $query->filterByInheriteventtypes('yes'); // WHERE inheritEventTypes = true
     * </code>
     *
     * @param     boolean|string $inheriteventtypes The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInheriteventtypes($inheriteventtypes = null, $comparison = null)
    {
        if (is_string($inheriteventtypes)) {
            $inheriteventtypes = in_array(strtolower($inheriteventtypes), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructurePeer::INHERITEVENTTYPES, $inheriteventtypes, $comparison);
    }

    /**
     * Filter the query on the inheritActionTypes column
     *
     * Example usage:
     * <code>
     * $query->filterByInheritactiontypes(true); // WHERE inheritActionTypes = true
     * $query->filterByInheritactiontypes('yes'); // WHERE inheritActionTypes = true
     * </code>
     *
     * @param     boolean|string $inheritactiontypes The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInheritactiontypes($inheritactiontypes = null, $comparison = null)
    {
        if (is_string($inheritactiontypes)) {
            $inheritactiontypes = in_array(strtolower($inheritactiontypes), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructurePeer::INHERITACTIONTYPES, $inheritactiontypes, $comparison);
    }

    /**
     * Filter the query on the inheritGaps column
     *
     * Example usage:
     * <code>
     * $query->filterByInheritgaps(true); // WHERE inheritGaps = true
     * $query->filterByInheritgaps('yes'); // WHERE inheritGaps = true
     * </code>
     *
     * @param     boolean|string $inheritgaps The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByInheritgaps($inheritgaps = null, $comparison = null)
    {
        if (is_string($inheritgaps)) {
            $inheritgaps = in_array(strtolower($inheritgaps), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructurePeer::INHERITGAPS, $inheritgaps, $comparison);
    }

    /**
     * Filter the query on the uuid_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUuidId(1234); // WHERE uuid_id = 1234
     * $query->filterByUuidId(array(12, 34)); // WHERE uuid_id IN (12, 34)
     * $query->filterByUuidId(array('min' => 12)); // WHERE uuid_id >= 12
     * $query->filterByUuidId(array('max' => 12)); // WHERE uuid_id <= 12
     * </code>
     *
     * @param     mixed $uuidId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByUuidId($uuidId = null, $comparison = null)
    {
        if (is_array($uuidId)) {
            $useMinMax = false;
            if (isset($uuidId['min'])) {
                $this->addUsingAlias(OrgstructurePeer::UUID_ID, $uuidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uuidId['max'])) {
                $this->addUsingAlias(OrgstructurePeer::UUID_ID, $uuidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::UUID_ID, $uuidId, $comparison);
    }

    /**
     * Filter the query on the show column
     *
     * Example usage:
     * <code>
     * $query->filterByShow(1234); // WHERE show = 1234
     * $query->filterByShow(array(12, 34)); // WHERE show IN (12, 34)
     * $query->filterByShow(array('min' => 12)); // WHERE show >= 12
     * $query->filterByShow(array('max' => 12)); // WHERE show <= 12
     * </code>
     *
     * @param     mixed $show The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function filterByShow($show = null, $comparison = null)
    {
        if (is_array($show)) {
            $useMinMax = false;
            if (isset($show['min'])) {
                $this->addUsingAlias(OrgstructurePeer::SHOW, $show['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($show['max'])) {
                $this->addUsingAlias(OrgstructurePeer::SHOW, $show['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructurePeer::SHOW, $show, $comparison);
    }

    /**
     * Filter the query by a related BlankactionsMoving object
     *
     * @param   BlankactionsMoving|PropelObjectCollection $blankactionsMoving  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsMoving($blankactionsMoving, $comparison = null)
    {
        if ($blankactionsMoving instanceof BlankactionsMoving) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $blankactionsMoving->getOrgstructureId(), $comparison);
        } elseif ($blankactionsMoving instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsMovingQuery()
                ->filterByPrimaryKeys($blankactionsMoving->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsMoving() only accepts arguments of type BlankactionsMoving or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsMoving relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinBlankactionsMoving($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsMoving');

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
            $this->addJoinObject($join, 'BlankactionsMoving');
        }

        return $this;
    }

    /**
     * Use the BlankactionsMoving relation BlankactionsMoving object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsMovingQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsMovingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsMoving($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsMoving', '\Webmis\Models\BlankactionsMovingQuery');
    }

    /**
     * Filter the query by a related OrgstructureDisabledattendance object
     *
     * @param   OrgstructureDisabledattendance|PropelObjectCollection $orgstructureDisabledattendance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureDisabledattendance($orgstructureDisabledattendance, $comparison = null)
    {
        if ($orgstructureDisabledattendance instanceof OrgstructureDisabledattendance) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $orgstructureDisabledattendance->getMasterId(), $comparison);
        } elseif ($orgstructureDisabledattendance instanceof PropelObjectCollection) {
            return $this
                ->useOrgstructureDisabledattendanceQuery()
                ->filterByPrimaryKeys($orgstructureDisabledattendance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrgstructureDisabledattendance() only accepts arguments of type OrgstructureDisabledattendance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureDisabledattendance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinOrgstructureDisabledattendance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureDisabledattendance');

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
            $this->addJoinObject($join, 'OrgstructureDisabledattendance');
        }

        return $this;
    }

    /**
     * Use the OrgstructureDisabledattendance relation OrgstructureDisabledattendance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureDisabledattendanceQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureDisabledattendanceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrgstructureDisabledattendance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureDisabledattendance', '\Webmis\Models\OrgstructureDisabledattendanceQuery');
    }

    /**
     * Filter the query by a related OrgstructureStock object
     *
     * @param   OrgstructureStock|PropelObjectCollection $orgstructureStock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureStock($orgstructureStock, $comparison = null)
    {
        if ($orgstructureStock instanceof OrgstructureStock) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $orgstructureStock->getMasterId(), $comparison);
        } elseif ($orgstructureStock instanceof PropelObjectCollection) {
            return $this
                ->useOrgstructureStockQuery()
                ->filterByPrimaryKeys($orgstructureStock->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrgstructureStock() only accepts arguments of type OrgstructureStock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureStock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinOrgstructureStock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureStock');

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
            $this->addJoinObject($join, 'OrgstructureStock');
        }

        return $this;
    }

    /**
     * Use the OrgstructureStock relation OrgstructureStock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureStockQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureStockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrgstructureStock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureStock', '\Webmis\Models\OrgstructureStockQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionRelatedByReceiverId($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $stockmotion->getReceiverId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionRelatedByReceiverIdQuery()
                ->filterByPrimaryKeys($stockmotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionRelatedByReceiverId() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionRelatedByReceiverId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinStockmotionRelatedByReceiverId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionRelatedByReceiverId');

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
            $this->addJoinObject($join, 'StockmotionRelatedByReceiverId');
        }

        return $this;
    }

    /**
     * Use the StockmotionRelatedByReceiverId relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionRelatedByReceiverIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionRelatedByReceiverId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionRelatedByReceiverId', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionRelatedBySupplierId($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $stockmotion->getSupplierId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionRelatedBySupplierIdQuery()
                ->filterByPrimaryKeys($stockmotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionRelatedBySupplierId() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionRelatedBySupplierId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinStockmotionRelatedBySupplierId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionRelatedBySupplierId');

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
            $this->addJoinObject($join, 'StockmotionRelatedBySupplierId');
        }

        return $this;
    }

    /**
     * Use the StockmotionRelatedBySupplierId relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionRelatedBySupplierIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionRelatedBySupplierId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionRelatedBySupplierId', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Stockrequisition object
     *
     * @param   Stockrequisition|PropelObjectCollection $stockrequisition  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionRelatedByRecipientId($stockrequisition, $comparison = null)
    {
        if ($stockrequisition instanceof Stockrequisition) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $stockrequisition->getRecipientId(), $comparison);
        } elseif ($stockrequisition instanceof PropelObjectCollection) {
            return $this
                ->useStockrequisitionRelatedByRecipientIdQuery()
                ->filterByPrimaryKeys($stockrequisition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrequisitionRelatedByRecipientId() only accepts arguments of type Stockrequisition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrequisitionRelatedByRecipientId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinStockrequisitionRelatedByRecipientId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrequisitionRelatedByRecipientId');

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
            $this->addJoinObject($join, 'StockrequisitionRelatedByRecipientId');
        }

        return $this;
    }

    /**
     * Use the StockrequisitionRelatedByRecipientId relation Stockrequisition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionRelatedByRecipientIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrequisitionRelatedByRecipientId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrequisitionRelatedByRecipientId', '\Webmis\Models\StockrequisitionQuery');
    }

    /**
     * Filter the query by a related Stockrequisition object
     *
     * @param   Stockrequisition|PropelObjectCollection $stockrequisition  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionRelatedBySupplierId($stockrequisition, $comparison = null)
    {
        if ($stockrequisition instanceof Stockrequisition) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $stockrequisition->getSupplierId(), $comparison);
        } elseif ($stockrequisition instanceof PropelObjectCollection) {
            return $this
                ->useStockrequisitionRelatedBySupplierIdQuery()
                ->filterByPrimaryKeys($stockrequisition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrequisitionRelatedBySupplierId() only accepts arguments of type Stockrequisition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrequisitionRelatedBySupplierId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinStockrequisitionRelatedBySupplierId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrequisitionRelatedBySupplierId');

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
            $this->addJoinObject($join, 'StockrequisitionRelatedBySupplierId');
        }

        return $this;
    }

    /**
     * Use the StockrequisitionRelatedBySupplierId relation Stockrequisition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionRelatedBySupplierIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrequisitionRelatedBySupplierId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrequisitionRelatedBySupplierId', '\Webmis\Models\StockrequisitionQuery');
    }

    /**
     * Filter the query by a related Stocktrans object
     *
     * @param   Stocktrans|PropelObjectCollection $stocktrans  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktransRelatedByCreorgstructureId($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $stocktrans->getCreorgstructureId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransRelatedByCreorgstructureIdQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktransRelatedByCreorgstructureId() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StocktransRelatedByCreorgstructureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinStocktransRelatedByCreorgstructureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StocktransRelatedByCreorgstructureId');

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
            $this->addJoinObject($join, 'StocktransRelatedByCreorgstructureId');
        }

        return $this;
    }

    /**
     * Use the StocktransRelatedByCreorgstructureId relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransRelatedByCreorgstructureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStocktransRelatedByCreorgstructureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StocktransRelatedByCreorgstructureId', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Filter the query by a related Stocktrans object
     *
     * @param   Stocktrans|PropelObjectCollection $stocktrans  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStocktransRelatedByDeborgstructureId($stocktrans, $comparison = null)
    {
        if ($stocktrans instanceof Stocktrans) {
            return $this
                ->addUsingAlias(OrgstructurePeer::ID, $stocktrans->getDeborgstructureId(), $comparison);
        } elseif ($stocktrans instanceof PropelObjectCollection) {
            return $this
                ->useStocktransRelatedByDeborgstructureIdQuery()
                ->filterByPrimaryKeys($stocktrans->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStocktransRelatedByDeborgstructureId() only accepts arguments of type Stocktrans or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StocktransRelatedByDeborgstructureId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function joinStocktransRelatedByDeborgstructureId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StocktransRelatedByDeborgstructureId');

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
            $this->addJoinObject($join, 'StocktransRelatedByDeborgstructureId');
        }

        return $this;
    }

    /**
     * Use the StocktransRelatedByDeborgstructureId relation Stocktrans object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StocktransQuery A secondary query class using the current class as primary query
     */
    public function useStocktransRelatedByDeborgstructureIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStocktransRelatedByDeborgstructureId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StocktransRelatedByDeborgstructureId', '\Webmis\Models\StocktransQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Orgstructure $orgstructure Object to remove from the list of results
     *
     * @return OrgstructureQuery The current query, for fluid interface
     */
    public function prune($orgstructure = null)
    {
        if ($orgstructure) {
            $this->addUsingAlias(OrgstructurePeer::ID, $orgstructure->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
