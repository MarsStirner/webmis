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
use Webmis\Models\ClientQuoting;
use Webmis\Models\ClientQuotingPeer;
use Webmis\Models\ClientQuotingQuery;

/**
 * Base class that represents a query for the 'Client_Quoting' table.
 *
 *
 *
 * @method ClientQuotingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientQuotingQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientQuotingQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientQuotingQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientQuotingQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientQuotingQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientQuotingQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ClientQuotingQuery orderByIdentifier($order = Criteria::ASC) Order by the identifier column
 * @method ClientQuotingQuery orderByQuotaticket($order = Criteria::ASC) Order by the quotaTicket column
 * @method ClientQuotingQuery orderByQuotatypeId($order = Criteria::ASC) Order by the quotaType_id column
 * @method ClientQuotingQuery orderByStage($order = Criteria::ASC) Order by the stage column
 * @method ClientQuotingQuery orderByDirectiondate($order = Criteria::ASC) Order by the directionDate column
 * @method ClientQuotingQuery orderByFreeinput($order = Criteria::ASC) Order by the freeInput column
 * @method ClientQuotingQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method ClientQuotingQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ClientQuotingQuery orderByMkb($order = Criteria::ASC) Order by the MKB column
 * @method ClientQuotingQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ClientQuotingQuery orderByRequest($order = Criteria::ASC) Order by the request column
 * @method ClientQuotingQuery orderByStatment($order = Criteria::ASC) Order by the statment column
 * @method ClientQuotingQuery orderByDateregistration($order = Criteria::ASC) Order by the dateRegistration column
 * @method ClientQuotingQuery orderByDateend($order = Criteria::ASC) Order by the dateEnd column
 * @method ClientQuotingQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method ClientQuotingQuery orderByRegioncode($order = Criteria::ASC) Order by the regionCode column
 * @method ClientQuotingQuery orderByPacientmodelId($order = Criteria::ASC) Order by the pacientModel_id column
 * @method ClientQuotingQuery orderByTreatmentId($order = Criteria::ASC) Order by the treatment_id column
 * @method ClientQuotingQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method ClientQuotingQuery orderByPrevtalonEventId($order = Criteria::ASC) Order by the prevTalon_event_id column
 * @method ClientQuotingQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ClientQuotingQuery groupById() Group by the id column
 * @method ClientQuotingQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientQuotingQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientQuotingQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientQuotingQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientQuotingQuery groupByDeleted() Group by the deleted column
 * @method ClientQuotingQuery groupByMasterId() Group by the master_id column
 * @method ClientQuotingQuery groupByIdentifier() Group by the identifier column
 * @method ClientQuotingQuery groupByQuotaticket() Group by the quotaTicket column
 * @method ClientQuotingQuery groupByQuotatypeId() Group by the quotaType_id column
 * @method ClientQuotingQuery groupByStage() Group by the stage column
 * @method ClientQuotingQuery groupByDirectiondate() Group by the directionDate column
 * @method ClientQuotingQuery groupByFreeinput() Group by the freeInput column
 * @method ClientQuotingQuery groupByOrgId() Group by the org_id column
 * @method ClientQuotingQuery groupByAmount() Group by the amount column
 * @method ClientQuotingQuery groupByMkb() Group by the MKB column
 * @method ClientQuotingQuery groupByStatus() Group by the status column
 * @method ClientQuotingQuery groupByRequest() Group by the request column
 * @method ClientQuotingQuery groupByStatment() Group by the statment column
 * @method ClientQuotingQuery groupByDateregistration() Group by the dateRegistration column
 * @method ClientQuotingQuery groupByDateend() Group by the dateEnd column
 * @method ClientQuotingQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method ClientQuotingQuery groupByRegioncode() Group by the regionCode column
 * @method ClientQuotingQuery groupByPacientmodelId() Group by the pacientModel_id column
 * @method ClientQuotingQuery groupByTreatmentId() Group by the treatment_id column
 * @method ClientQuotingQuery groupByEventId() Group by the event_id column
 * @method ClientQuotingQuery groupByPrevtalonEventId() Group by the prevTalon_event_id column
 * @method ClientQuotingQuery groupByVersion() Group by the version column
 *
 * @method ClientQuotingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientQuotingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientQuotingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientQuoting findOne(PropelPDO $con = null) Return the first ClientQuoting matching the query
 * @method ClientQuoting findOneOrCreate(PropelPDO $con = null) Return the first ClientQuoting matching the query, or a new ClientQuoting object populated from the query conditions when no match is found
 *
 * @method ClientQuoting findOneByCreatedatetime(string $createDatetime) Return the first ClientQuoting filtered by the createDatetime column
 * @method ClientQuoting findOneByCreatepersonId(int $createPerson_id) Return the first ClientQuoting filtered by the createPerson_id column
 * @method ClientQuoting findOneByModifydatetime(string $modifyDatetime) Return the first ClientQuoting filtered by the modifyDatetime column
 * @method ClientQuoting findOneByModifypersonId(int $modifyPerson_id) Return the first ClientQuoting filtered by the modifyPerson_id column
 * @method ClientQuoting findOneByDeleted(boolean $deleted) Return the first ClientQuoting filtered by the deleted column
 * @method ClientQuoting findOneByMasterId(int $master_id) Return the first ClientQuoting filtered by the master_id column
 * @method ClientQuoting findOneByIdentifier(string $identifier) Return the first ClientQuoting filtered by the identifier column
 * @method ClientQuoting findOneByQuotaticket(string $quotaTicket) Return the first ClientQuoting filtered by the quotaTicket column
 * @method ClientQuoting findOneByQuotatypeId(int $quotaType_id) Return the first ClientQuoting filtered by the quotaType_id column
 * @method ClientQuoting findOneByStage(int $stage) Return the first ClientQuoting filtered by the stage column
 * @method ClientQuoting findOneByDirectiondate(string $directionDate) Return the first ClientQuoting filtered by the directionDate column
 * @method ClientQuoting findOneByFreeinput(string $freeInput) Return the first ClientQuoting filtered by the freeInput column
 * @method ClientQuoting findOneByOrgId(int $org_id) Return the first ClientQuoting filtered by the org_id column
 * @method ClientQuoting findOneByAmount(int $amount) Return the first ClientQuoting filtered by the amount column
 * @method ClientQuoting findOneByMkb(string $MKB) Return the first ClientQuoting filtered by the MKB column
 * @method ClientQuoting findOneByStatus(int $status) Return the first ClientQuoting filtered by the status column
 * @method ClientQuoting findOneByRequest(int $request) Return the first ClientQuoting filtered by the request column
 * @method ClientQuoting findOneByStatment(string $statment) Return the first ClientQuoting filtered by the statment column
 * @method ClientQuoting findOneByDateregistration(string $dateRegistration) Return the first ClientQuoting filtered by the dateRegistration column
 * @method ClientQuoting findOneByDateend(string $dateEnd) Return the first ClientQuoting filtered by the dateEnd column
 * @method ClientQuoting findOneByOrgstructureId(int $orgStructure_id) Return the first ClientQuoting filtered by the orgStructure_id column
 * @method ClientQuoting findOneByRegioncode(string $regionCode) Return the first ClientQuoting filtered by the regionCode column
 * @method ClientQuoting findOneByPacientmodelId(int $pacientModel_id) Return the first ClientQuoting filtered by the pacientModel_id column
 * @method ClientQuoting findOneByTreatmentId(int $treatment_id) Return the first ClientQuoting filtered by the treatment_id column
 * @method ClientQuoting findOneByEventId(int $event_id) Return the first ClientQuoting filtered by the event_id column
 * @method ClientQuoting findOneByPrevtalonEventId(int $prevTalon_event_id) Return the first ClientQuoting filtered by the prevTalon_event_id column
 * @method ClientQuoting findOneByVersion(int $version) Return the first ClientQuoting filtered by the version column
 *
 * @method array findById(int $id) Return ClientQuoting objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return ClientQuoting objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return ClientQuoting objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return ClientQuoting objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return ClientQuoting objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return ClientQuoting objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return ClientQuoting objects filtered by the master_id column
 * @method array findByIdentifier(string $identifier) Return ClientQuoting objects filtered by the identifier column
 * @method array findByQuotaticket(string $quotaTicket) Return ClientQuoting objects filtered by the quotaTicket column
 * @method array findByQuotatypeId(int $quotaType_id) Return ClientQuoting objects filtered by the quotaType_id column
 * @method array findByStage(int $stage) Return ClientQuoting objects filtered by the stage column
 * @method array findByDirectiondate(string $directionDate) Return ClientQuoting objects filtered by the directionDate column
 * @method array findByFreeinput(string $freeInput) Return ClientQuoting objects filtered by the freeInput column
 * @method array findByOrgId(int $org_id) Return ClientQuoting objects filtered by the org_id column
 * @method array findByAmount(int $amount) Return ClientQuoting objects filtered by the amount column
 * @method array findByMkb(string $MKB) Return ClientQuoting objects filtered by the MKB column
 * @method array findByStatus(int $status) Return ClientQuoting objects filtered by the status column
 * @method array findByRequest(int $request) Return ClientQuoting objects filtered by the request column
 * @method array findByStatment(string $statment) Return ClientQuoting objects filtered by the statment column
 * @method array findByDateregistration(string $dateRegistration) Return ClientQuoting objects filtered by the dateRegistration column
 * @method array findByDateend(string $dateEnd) Return ClientQuoting objects filtered by the dateEnd column
 * @method array findByOrgstructureId(int $orgStructure_id) Return ClientQuoting objects filtered by the orgStructure_id column
 * @method array findByRegioncode(string $regionCode) Return ClientQuoting objects filtered by the regionCode column
 * @method array findByPacientmodelId(int $pacientModel_id) Return ClientQuoting objects filtered by the pacientModel_id column
 * @method array findByTreatmentId(int $treatment_id) Return ClientQuoting objects filtered by the treatment_id column
 * @method array findByEventId(int $event_id) Return ClientQuoting objects filtered by the event_id column
 * @method array findByPrevtalonEventId(int $prevTalon_event_id) Return ClientQuoting objects filtered by the prevTalon_event_id column
 * @method array findByVersion(int $version) Return ClientQuoting objects filtered by the version column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientQuotingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientQuotingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ClientQuoting', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientQuotingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientQuotingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientQuotingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientQuotingQuery) {
            return $criteria;
        }
        $query = new ClientQuotingQuery();
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
     * @return   ClientQuoting|ClientQuoting[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientQuotingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientQuotingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ClientQuoting A model object, or null if the key is not found
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
     * @return                 ClientQuoting A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `master_id`, `identifier`, `quotaTicket`, `quotaType_id`, `stage`, `directionDate`, `freeInput`, `org_id`, `amount`, `MKB`, `status`, `request`, `statment`, `dateRegistration`, `dateEnd`, `orgStructure_id`, `regionCode`, `pacientModel_id`, `treatment_id`, `event_id`, `prevTalon_event_id`, `version` FROM `Client_Quoting` WHERE `id` = :p0';
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
            $obj = new ClientQuoting();
            $obj->hydrate($row);
            ClientQuotingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ClientQuoting|ClientQuoting[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ClientQuoting[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientQuotingPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientQuotingPeer::ID, $keys, Criteria::IN);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::ID, $id, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientQuotingPeer::DELETED, $deleted, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentifier('fooValue');   // WHERE identifier = 'fooValue'
     * $query->filterByIdentifier('%fooValue%'); // WHERE identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByIdentifier($identifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identifier)) {
                $identifier = str_replace('*', '%', $identifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::IDENTIFIER, $identifier, $comparison);
    }

    /**
     * Filter the query on the quotaTicket column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotaticket('fooValue');   // WHERE quotaTicket = 'fooValue'
     * $query->filterByQuotaticket('%fooValue%'); // WHERE quotaTicket LIKE '%fooValue%'
     * </code>
     *
     * @param     string $quotaticket The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByQuotaticket($quotaticket = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($quotaticket)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $quotaticket)) {
                $quotaticket = str_replace('*', '%', $quotaticket);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::QUOTATICKET, $quotaticket, $comparison);
    }

    /**
     * Filter the query on the quotaType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotatypeId(1234); // WHERE quotaType_id = 1234
     * $query->filterByQuotatypeId(array(12, 34)); // WHERE quotaType_id IN (12, 34)
     * $query->filterByQuotatypeId(array('min' => 12)); // WHERE quotaType_id >= 12
     * $query->filterByQuotatypeId(array('max' => 12)); // WHERE quotaType_id <= 12
     * </code>
     *
     * @param     mixed $quotatypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByQuotatypeId($quotatypeId = null, $comparison = null)
    {
        if (is_array($quotatypeId)) {
            $useMinMax = false;
            if (isset($quotatypeId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::QUOTATYPE_ID, $quotatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotatypeId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::QUOTATYPE_ID, $quotatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::QUOTATYPE_ID, $quotatypeId, $comparison);
    }

    /**
     * Filter the query on the stage column
     *
     * Example usage:
     * <code>
     * $query->filterByStage(1234); // WHERE stage = 1234
     * $query->filterByStage(array(12, 34)); // WHERE stage IN (12, 34)
     * $query->filterByStage(array('min' => 12)); // WHERE stage >= 12
     * $query->filterByStage(array('max' => 12)); // WHERE stage <= 12
     * </code>
     *
     * @param     mixed $stage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByStage($stage = null, $comparison = null)
    {
        if (is_array($stage)) {
            $useMinMax = false;
            if (isset($stage['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::STAGE, $stage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stage['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::STAGE, $stage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::STAGE, $stage, $comparison);
    }

    /**
     * Filter the query on the directionDate column
     *
     * Example usage:
     * <code>
     * $query->filterByDirectiondate('2011-03-14'); // WHERE directionDate = '2011-03-14'
     * $query->filterByDirectiondate('now'); // WHERE directionDate = '2011-03-14'
     * $query->filterByDirectiondate(array('max' => 'yesterday')); // WHERE directionDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $directiondate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByDirectiondate($directiondate = null, $comparison = null)
    {
        if (is_array($directiondate)) {
            $useMinMax = false;
            if (isset($directiondate['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::DIRECTIONDATE, $directiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($directiondate['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::DIRECTIONDATE, $directiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::DIRECTIONDATE, $directiondate, $comparison);
    }

    /**
     * Filter the query on the freeInput column
     *
     * Example usage:
     * <code>
     * $query->filterByFreeinput('fooValue');   // WHERE freeInput = 'fooValue'
     * $query->filterByFreeinput('%fooValue%'); // WHERE freeInput LIKE '%fooValue%'
     * </code>
     *
     * @param     string $freeinput The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByFreeinput($freeinput = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freeinput)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $freeinput)) {
                $freeinput = str_replace('*', '%', $freeinput);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::FREEINPUT, $freeinput, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByOrgId($orgId = null, $comparison = null)
    {
        if (is_array($orgId)) {
            $useMinMax = false;
            if (isset($orgId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::ORG_ID, $orgId, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::AMOUNT, $amount, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientQuotingPeer::MKB, $mkb, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the request column
     *
     * Example usage:
     * <code>
     * $query->filterByRequest(1234); // WHERE request = 1234
     * $query->filterByRequest(array(12, 34)); // WHERE request IN (12, 34)
     * $query->filterByRequest(array('min' => 12)); // WHERE request >= 12
     * $query->filterByRequest(array('max' => 12)); // WHERE request <= 12
     * </code>
     *
     * @param     mixed $request The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByRequest($request = null, $comparison = null)
    {
        if (is_array($request)) {
            $useMinMax = false;
            if (isset($request['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::REQUEST, $request['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($request['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::REQUEST, $request['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::REQUEST, $request, $comparison);
    }

    /**
     * Filter the query on the statment column
     *
     * Example usage:
     * <code>
     * $query->filterByStatment('fooValue');   // WHERE statment = 'fooValue'
     * $query->filterByStatment('%fooValue%'); // WHERE statment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByStatment($statment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $statment)) {
                $statment = str_replace('*', '%', $statment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::STATMENT, $statment, $comparison);
    }

    /**
     * Filter the query on the dateRegistration column
     *
     * Example usage:
     * <code>
     * $query->filterByDateregistration('2011-03-14'); // WHERE dateRegistration = '2011-03-14'
     * $query->filterByDateregistration('now'); // WHERE dateRegistration = '2011-03-14'
     * $query->filterByDateregistration(array('max' => 'yesterday')); // WHERE dateRegistration > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateregistration The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByDateregistration($dateregistration = null, $comparison = null)
    {
        if (is_array($dateregistration)) {
            $useMinMax = false;
            if (isset($dateregistration['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::DATEREGISTRATION, $dateregistration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateregistration['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::DATEREGISTRATION, $dateregistration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::DATEREGISTRATION, $dateregistration, $comparison);
    }

    /**
     * Filter the query on the dateEnd column
     *
     * Example usage:
     * <code>
     * $query->filterByDateend('2011-03-14'); // WHERE dateEnd = '2011-03-14'
     * $query->filterByDateend('now'); // WHERE dateEnd = '2011-03-14'
     * $query->filterByDateend(array('max' => 'yesterday')); // WHERE dateEnd > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateend The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByDateend($dateend = null, $comparison = null)
    {
        if (is_array($dateend)) {
            $useMinMax = false;
            if (isset($dateend['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::DATEEND, $dateend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateend['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::DATEEND, $dateend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::DATEEND, $dateend, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
    }

    /**
     * Filter the query on the regionCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegioncode('fooValue');   // WHERE regionCode = 'fooValue'
     * $query->filterByRegioncode('%fooValue%'); // WHERE regionCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regioncode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByRegioncode($regioncode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regioncode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regioncode)) {
                $regioncode = str_replace('*', '%', $regioncode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::REGIONCODE, $regioncode, $comparison);
    }

    /**
     * Filter the query on the pacientModel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientmodelId(1234); // WHERE pacientModel_id = 1234
     * $query->filterByPacientmodelId(array(12, 34)); // WHERE pacientModel_id IN (12, 34)
     * $query->filterByPacientmodelId(array('min' => 12)); // WHERE pacientModel_id >= 12
     * $query->filterByPacientmodelId(array('max' => 12)); // WHERE pacientModel_id <= 12
     * </code>
     *
     * @param     mixed $pacientmodelId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByPacientmodelId($pacientmodelId = null, $comparison = null)
    {
        if (is_array($pacientmodelId)) {
            $useMinMax = false;
            if (isset($pacientmodelId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::PACIENTMODEL_ID, $pacientmodelId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pacientmodelId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::PACIENTMODEL_ID, $pacientmodelId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::PACIENTMODEL_ID, $pacientmodelId, $comparison);
    }

    /**
     * Filter the query on the treatment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTreatmentId(1234); // WHERE treatment_id = 1234
     * $query->filterByTreatmentId(array(12, 34)); // WHERE treatment_id IN (12, 34)
     * $query->filterByTreatmentId(array('min' => 12)); // WHERE treatment_id >= 12
     * $query->filterByTreatmentId(array('max' => 12)); // WHERE treatment_id <= 12
     * </code>
     *
     * @param     mixed $treatmentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByTreatmentId($treatmentId = null, $comparison = null)
    {
        if (is_array($treatmentId)) {
            $useMinMax = false;
            if (isset($treatmentId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::TREATMENT_ID, $treatmentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($treatmentId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::TREATMENT_ID, $treatmentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::TREATMENT_ID, $treatmentId, $comparison);
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
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the prevTalon_event_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrevtalonEventId(1234); // WHERE prevTalon_event_id = 1234
     * $query->filterByPrevtalonEventId(array(12, 34)); // WHERE prevTalon_event_id IN (12, 34)
     * $query->filterByPrevtalonEventId(array('min' => 12)); // WHERE prevTalon_event_id >= 12
     * $query->filterByPrevtalonEventId(array('max' => 12)); // WHERE prevTalon_event_id <= 12
     * </code>
     *
     * @param     mixed $prevtalonEventId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByPrevtalonEventId($prevtalonEventId = null, $comparison = null)
    {
        if (is_array($prevtalonEventId)) {
            $useMinMax = false;
            if (isset($prevtalonEventId['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::PREVTALON_EVENT_ID, $prevtalonEventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prevtalonEventId['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::PREVTALON_EVENT_ID, $prevtalonEventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::PREVTALON_EVENT_ID, $prevtalonEventId, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientQuotingPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientQuotingPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingPeer::VERSION, $version, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ClientQuoting $clientQuoting Object to remove from the list of results
     *
     * @return ClientQuotingQuery The current query, for fluid interface
     */
    public function prune($clientQuoting = null)
    {
        if ($clientQuoting) {
            $this->addUsingAlias(ClientQuotingPeer::ID, $clientQuoting->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
