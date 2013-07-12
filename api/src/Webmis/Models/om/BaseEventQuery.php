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
use Webmis\Models\Event;
use Webmis\Models\EventPeer;
use Webmis\Models\EventQuery;
use Webmis\Models\Rbacheresult;
use Webmis\Models\Rbmesspecification;
use Webmis\Models\Tissue;

/**
 * Base class that represents a query for the 'Event' table.
 *
 *
 *
 * @method EventQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method EventQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method EventQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method EventQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method EventQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EventQuery orderByExternalid($order = Criteria::ASC) Order by the externalId column
 * @method EventQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method EventQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method EventQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method EventQuery orderByContractId($order = Criteria::ASC) Order by the contract_id column
 * @method EventQuery orderByPreveventdate($order = Criteria::ASC) Order by the prevEventDate column
 * @method EventQuery orderBySetdate($order = Criteria::ASC) Order by the setDate column
 * @method EventQuery orderBySetpersonId($order = Criteria::ASC) Order by the setPerson_id column
 * @method EventQuery orderByExecdate($order = Criteria::ASC) Order by the execDate column
 * @method EventQuery orderByExecpersonId($order = Criteria::ASC) Order by the execPerson_id column
 * @method EventQuery orderByIsprimary($order = Criteria::ASC) Order by the isPrimary column
 * @method EventQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method EventQuery orderByResultId($order = Criteria::ASC) Order by the result_id column
 * @method EventQuery orderByNexteventdate($order = Criteria::ASC) Order by the nextEventDate column
 * @method EventQuery orderByPaystatus($order = Criteria::ASC) Order by the payStatus column
 * @method EventQuery orderByTypeassetId($order = Criteria::ASC) Order by the typeAsset_id column
 * @method EventQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method EventQuery orderByCuratorId($order = Criteria::ASC) Order by the curator_id column
 * @method EventQuery orderByAssistantId($order = Criteria::ASC) Order by the assistant_id column
 * @method EventQuery orderByPregnancyweek($order = Criteria::ASC) Order by the pregnancyWeek column
 * @method EventQuery orderByMesId($order = Criteria::ASC) Order by the MES_id column
 * @method EventQuery orderByMesspecificationId($order = Criteria::ASC) Order by the mesSpecification_id column
 * @method EventQuery orderByRbacheresultId($order = Criteria::ASC) Order by the rbAcheResult_id column
 * @method EventQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method EventQuery orderByPrivilege($order = Criteria::ASC) Order by the privilege column
 * @method EventQuery orderByUrgent($order = Criteria::ASC) Order by the urgent column
 * @method EventQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method EventQuery orderByUuidId($order = Criteria::ASC) Order by the uuid_id column
 * @method EventQuery orderByLpuTransfer($order = Criteria::ASC) Order by the lpu_transfer column
 *
 * @method EventQuery groupById() Group by the id column
 * @method EventQuery groupByCreatedatetime() Group by the createDatetime column
 * @method EventQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method EventQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method EventQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method EventQuery groupByDeleted() Group by the deleted column
 * @method EventQuery groupByExternalid() Group by the externalId column
 * @method EventQuery groupByEventtypeId() Group by the eventType_id column
 * @method EventQuery groupByOrgId() Group by the org_id column
 * @method EventQuery groupByClientId() Group by the client_id column
 * @method EventQuery groupByContractId() Group by the contract_id column
 * @method EventQuery groupByPreveventdate() Group by the prevEventDate column
 * @method EventQuery groupBySetdate() Group by the setDate column
 * @method EventQuery groupBySetpersonId() Group by the setPerson_id column
 * @method EventQuery groupByExecdate() Group by the execDate column
 * @method EventQuery groupByExecpersonId() Group by the execPerson_id column
 * @method EventQuery groupByIsprimary() Group by the isPrimary column
 * @method EventQuery groupByOrder() Group by the order column
 * @method EventQuery groupByResultId() Group by the result_id column
 * @method EventQuery groupByNexteventdate() Group by the nextEventDate column
 * @method EventQuery groupByPaystatus() Group by the payStatus column
 * @method EventQuery groupByTypeassetId() Group by the typeAsset_id column
 * @method EventQuery groupByNote() Group by the note column
 * @method EventQuery groupByCuratorId() Group by the curator_id column
 * @method EventQuery groupByAssistantId() Group by the assistant_id column
 * @method EventQuery groupByPregnancyweek() Group by the pregnancyWeek column
 * @method EventQuery groupByMesId() Group by the MES_id column
 * @method EventQuery groupByMesspecificationId() Group by the mesSpecification_id column
 * @method EventQuery groupByRbacheresultId() Group by the rbAcheResult_id column
 * @method EventQuery groupByVersion() Group by the version column
 * @method EventQuery groupByPrivilege() Group by the privilege column
 * @method EventQuery groupByUrgent() Group by the urgent column
 * @method EventQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method EventQuery groupByUuidId() Group by the uuid_id column
 * @method EventQuery groupByLpuTransfer() Group by the lpu_transfer column
 *
 * @method EventQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventQuery leftJoinRbacheresult($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbacheresult relation
 * @method EventQuery rightJoinRbacheresult($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbacheresult relation
 * @method EventQuery innerJoinRbacheresult($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbacheresult relation
 *
 * @method EventQuery leftJoinRbmesspecification($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmesspecification relation
 * @method EventQuery rightJoinRbmesspecification($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmesspecification relation
 * @method EventQuery innerJoinRbmesspecification($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmesspecification relation
 *
 * @method EventQuery leftJoinTissue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tissue relation
 * @method EventQuery rightJoinTissue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tissue relation
 * @method EventQuery innerJoinTissue($relationAlias = null) Adds a INNER JOIN clause to the query using the Tissue relation
 *
 * @method Event findOne(PropelPDO $con = null) Return the first Event matching the query
 * @method Event findOneOrCreate(PropelPDO $con = null) Return the first Event matching the query, or a new Event object populated from the query conditions when no match is found
 *
 * @method Event findOneByCreatedatetime(string $createDatetime) Return the first Event filtered by the createDatetime column
 * @method Event findOneByCreatepersonId(int $createPerson_id) Return the first Event filtered by the createPerson_id column
 * @method Event findOneByModifydatetime(string $modifyDatetime) Return the first Event filtered by the modifyDatetime column
 * @method Event findOneByModifypersonId(int $modifyPerson_id) Return the first Event filtered by the modifyPerson_id column
 * @method Event findOneByDeleted(boolean $deleted) Return the first Event filtered by the deleted column
 * @method Event findOneByExternalid(string $externalId) Return the first Event filtered by the externalId column
 * @method Event findOneByEventtypeId(int $eventType_id) Return the first Event filtered by the eventType_id column
 * @method Event findOneByOrgId(int $org_id) Return the first Event filtered by the org_id column
 * @method Event findOneByClientId(int $client_id) Return the first Event filtered by the client_id column
 * @method Event findOneByContractId(int $contract_id) Return the first Event filtered by the contract_id column
 * @method Event findOneByPreveventdate(string $prevEventDate) Return the first Event filtered by the prevEventDate column
 * @method Event findOneBySetdate(string $setDate) Return the first Event filtered by the setDate column
 * @method Event findOneBySetpersonId(int $setPerson_id) Return the first Event filtered by the setPerson_id column
 * @method Event findOneByExecdate(string $execDate) Return the first Event filtered by the execDate column
 * @method Event findOneByExecpersonId(int $execPerson_id) Return the first Event filtered by the execPerson_id column
 * @method Event findOneByIsprimary(boolean $isPrimary) Return the first Event filtered by the isPrimary column
 * @method Event findOneByOrder(boolean $order) Return the first Event filtered by the order column
 * @method Event findOneByResultId(int $result_id) Return the first Event filtered by the result_id column
 * @method Event findOneByNexteventdate(string $nextEventDate) Return the first Event filtered by the nextEventDate column
 * @method Event findOneByPaystatus(int $payStatus) Return the first Event filtered by the payStatus column
 * @method Event findOneByTypeassetId(int $typeAsset_id) Return the first Event filtered by the typeAsset_id column
 * @method Event findOneByNote(string $note) Return the first Event filtered by the note column
 * @method Event findOneByCuratorId(int $curator_id) Return the first Event filtered by the curator_id column
 * @method Event findOneByAssistantId(int $assistant_id) Return the first Event filtered by the assistant_id column
 * @method Event findOneByPregnancyweek(int $pregnancyWeek) Return the first Event filtered by the pregnancyWeek column
 * @method Event findOneByMesId(int $MES_id) Return the first Event filtered by the MES_id column
 * @method Event findOneByMesspecificationId(int $mesSpecification_id) Return the first Event filtered by the mesSpecification_id column
 * @method Event findOneByRbacheresultId(int $rbAcheResult_id) Return the first Event filtered by the rbAcheResult_id column
 * @method Event findOneByVersion(int $version) Return the first Event filtered by the version column
 * @method Event findOneByPrivilege(boolean $privilege) Return the first Event filtered by the privilege column
 * @method Event findOneByUrgent(boolean $urgent) Return the first Event filtered by the urgent column
 * @method Event findOneByOrgstructureId(int $orgStructure_id) Return the first Event filtered by the orgStructure_id column
 * @method Event findOneByUuidId(int $uuid_id) Return the first Event filtered by the uuid_id column
 * @method Event findOneByLpuTransfer(string $lpu_transfer) Return the first Event filtered by the lpu_transfer column
 *
 * @method array findById(int $id) Return Event objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Event objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Event objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Event objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Event objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Event objects filtered by the deleted column
 * @method array findByExternalid(string $externalId) Return Event objects filtered by the externalId column
 * @method array findByEventtypeId(int $eventType_id) Return Event objects filtered by the eventType_id column
 * @method array findByOrgId(int $org_id) Return Event objects filtered by the org_id column
 * @method array findByClientId(int $client_id) Return Event objects filtered by the client_id column
 * @method array findByContractId(int $contract_id) Return Event objects filtered by the contract_id column
 * @method array findByPreveventdate(string $prevEventDate) Return Event objects filtered by the prevEventDate column
 * @method array findBySetdate(string $setDate) Return Event objects filtered by the setDate column
 * @method array findBySetpersonId(int $setPerson_id) Return Event objects filtered by the setPerson_id column
 * @method array findByExecdate(string $execDate) Return Event objects filtered by the execDate column
 * @method array findByExecpersonId(int $execPerson_id) Return Event objects filtered by the execPerson_id column
 * @method array findByIsprimary(boolean $isPrimary) Return Event objects filtered by the isPrimary column
 * @method array findByOrder(boolean $order) Return Event objects filtered by the order column
 * @method array findByResultId(int $result_id) Return Event objects filtered by the result_id column
 * @method array findByNexteventdate(string $nextEventDate) Return Event objects filtered by the nextEventDate column
 * @method array findByPaystatus(int $payStatus) Return Event objects filtered by the payStatus column
 * @method array findByTypeassetId(int $typeAsset_id) Return Event objects filtered by the typeAsset_id column
 * @method array findByNote(string $note) Return Event objects filtered by the note column
 * @method array findByCuratorId(int $curator_id) Return Event objects filtered by the curator_id column
 * @method array findByAssistantId(int $assistant_id) Return Event objects filtered by the assistant_id column
 * @method array findByPregnancyweek(int $pregnancyWeek) Return Event objects filtered by the pregnancyWeek column
 * @method array findByMesId(int $MES_id) Return Event objects filtered by the MES_id column
 * @method array findByMesspecificationId(int $mesSpecification_id) Return Event objects filtered by the mesSpecification_id column
 * @method array findByRbacheresultId(int $rbAcheResult_id) Return Event objects filtered by the rbAcheResult_id column
 * @method array findByVersion(int $version) Return Event objects filtered by the version column
 * @method array findByPrivilege(boolean $privilege) Return Event objects filtered by the privilege column
 * @method array findByUrgent(boolean $urgent) Return Event objects filtered by the urgent column
 * @method array findByOrgstructureId(int $orgStructure_id) Return Event objects filtered by the orgStructure_id column
 * @method array findByUuidId(int $uuid_id) Return Event objects filtered by the uuid_id column
 * @method array findByLpuTransfer(string $lpu_transfer) Return Event objects filtered by the lpu_transfer column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Event', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventQuery) {
            return $criteria;
        }
        $query = new EventQuery();
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
     * @return   Event|Event[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Event A model object, or null if the key is not found
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
     * @return                 Event A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `externalId`, `eventType_id`, `org_id`, `client_id`, `contract_id`, `prevEventDate`, `setDate`, `setPerson_id`, `execDate`, `execPerson_id`, `isPrimary`, `order`, `result_id`, `nextEventDate`, `payStatus`, `typeAsset_id`, `note`, `curator_id`, `assistant_id`, `pregnancyWeek`, `MES_id`, `mesSpecification_id`, `rbAcheResult_id`, `version`, `privilege`, `urgent`, `orgStructure_id`, `uuid_id`, `lpu_transfer` FROM `Event` WHERE `id` = :p0';
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
            $obj = new Event();
            $obj->hydrate($row);
            EventPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Event|Event[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Event[]|mixed the list of results, formatted by the current formatter
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventPeer::ID, $keys, Criteria::IN);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::ID, $id, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(EventPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(EventPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(EventPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(EventPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(EventPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(EventPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(EventPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(EventPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the externalId column
     *
     * Example usage:
     * <code>
     * $query->filterByExternalid('fooValue');   // WHERE externalId = 'fooValue'
     * $query->filterByExternalid('%fooValue%'); // WHERE externalId LIKE '%fooValue%'
     * </code>
     *
     * @param     string $externalid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByExternalid($externalid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($externalid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $externalid)) {
                $externalid = str_replace('*', '%', $externalid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::EXTERNALID, $externalid, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(EventPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(EventPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByOrgId($orgId = null, $comparison = null)
    {
        if (is_array($orgId)) {
            $useMinMax = false;
            if (isset($orgId['min'])) {
                $this->addUsingAlias(EventPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgId['max'])) {
                $this->addUsingAlias(EventPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::ORG_ID, $orgId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(EventPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(EventPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CLIENT_ID, $clientId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByContractId($contractId = null, $comparison = null)
    {
        if (is_array($contractId)) {
            $useMinMax = false;
            if (isset($contractId['min'])) {
                $this->addUsingAlias(EventPeer::CONTRACT_ID, $contractId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contractId['max'])) {
                $this->addUsingAlias(EventPeer::CONTRACT_ID, $contractId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CONTRACT_ID, $contractId, $comparison);
    }

    /**
     * Filter the query on the prevEventDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPreveventdate('2011-03-14'); // WHERE prevEventDate = '2011-03-14'
     * $query->filterByPreveventdate('now'); // WHERE prevEventDate = '2011-03-14'
     * $query->filterByPreveventdate(array('max' => 'yesterday')); // WHERE prevEventDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $preveventdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPreveventdate($preveventdate = null, $comparison = null)
    {
        if (is_array($preveventdate)) {
            $useMinMax = false;
            if (isset($preveventdate['min'])) {
                $this->addUsingAlias(EventPeer::PREVEVENTDATE, $preveventdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($preveventdate['max'])) {
                $this->addUsingAlias(EventPeer::PREVEVENTDATE, $preveventdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::PREVEVENTDATE, $preveventdate, $comparison);
    }

    /**
     * Filter the query on the setDate column
     *
     * Example usage:
     * <code>
     * $query->filterBySetdate('2011-03-14'); // WHERE setDate = '2011-03-14'
     * $query->filterBySetdate('now'); // WHERE setDate = '2011-03-14'
     * $query->filterBySetdate(array('max' => 'yesterday')); // WHERE setDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $setdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterBySetdate($setdate = null, $comparison = null)
    {
        if (is_array($setdate)) {
            $useMinMax = false;
            if (isset($setdate['min'])) {
                $this->addUsingAlias(EventPeer::SETDATE, $setdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setdate['max'])) {
                $this->addUsingAlias(EventPeer::SETDATE, $setdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::SETDATE, $setdate, $comparison);
    }

    /**
     * Filter the query on the setPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySetpersonId(1234); // WHERE setPerson_id = 1234
     * $query->filterBySetpersonId(array(12, 34)); // WHERE setPerson_id IN (12, 34)
     * $query->filterBySetpersonId(array('min' => 12)); // WHERE setPerson_id >= 12
     * $query->filterBySetpersonId(array('max' => 12)); // WHERE setPerson_id <= 12
     * </code>
     *
     * @param     mixed $setpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterBySetpersonId($setpersonId = null, $comparison = null)
    {
        if (is_array($setpersonId)) {
            $useMinMax = false;
            if (isset($setpersonId['min'])) {
                $this->addUsingAlias(EventPeer::SETPERSON_ID, $setpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setpersonId['max'])) {
                $this->addUsingAlias(EventPeer::SETPERSON_ID, $setpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::SETPERSON_ID, $setpersonId, $comparison);
    }

    /**
     * Filter the query on the execDate column
     *
     * Example usage:
     * <code>
     * $query->filterByExecdate('2011-03-14'); // WHERE execDate = '2011-03-14'
     * $query->filterByExecdate('now'); // WHERE execDate = '2011-03-14'
     * $query->filterByExecdate(array('max' => 'yesterday')); // WHERE execDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $execdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByExecdate($execdate = null, $comparison = null)
    {
        if (is_array($execdate)) {
            $useMinMax = false;
            if (isset($execdate['min'])) {
                $this->addUsingAlias(EventPeer::EXECDATE, $execdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($execdate['max'])) {
                $this->addUsingAlias(EventPeer::EXECDATE, $execdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EXECDATE, $execdate, $comparison);
    }

    /**
     * Filter the query on the execPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByExecpersonId(1234); // WHERE execPerson_id = 1234
     * $query->filterByExecpersonId(array(12, 34)); // WHERE execPerson_id IN (12, 34)
     * $query->filterByExecpersonId(array('min' => 12)); // WHERE execPerson_id >= 12
     * $query->filterByExecpersonId(array('max' => 12)); // WHERE execPerson_id <= 12
     * </code>
     *
     * @param     mixed $execpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByExecpersonId($execpersonId = null, $comparison = null)
    {
        if (is_array($execpersonId)) {
            $useMinMax = false;
            if (isset($execpersonId['min'])) {
                $this->addUsingAlias(EventPeer::EXECPERSON_ID, $execpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($execpersonId['max'])) {
                $this->addUsingAlias(EventPeer::EXECPERSON_ID, $execpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::EXECPERSON_ID, $execpersonId, $comparison);
    }

    /**
     * Filter the query on the isPrimary column
     *
     * Example usage:
     * <code>
     * $query->filterByIsprimary(true); // WHERE isPrimary = true
     * $query->filterByIsprimary('yes'); // WHERE isPrimary = true
     * </code>
     *
     * @param     boolean|string $isprimary The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByIsprimary($isprimary = null, $comparison = null)
    {
        if (is_string($isprimary)) {
            $isprimary = in_array(strtolower($isprimary), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::ISPRIMARY, $isprimary, $comparison);
    }

    /**
     * Filter the query on the order column
     *
     * Example usage:
     * <code>
     * $query->filterByOrder(true); // WHERE order = true
     * $query->filterByOrder('yes'); // WHERE order = true
     * </code>
     *
     * @param     boolean|string $order The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByOrder($order = null, $comparison = null)
    {
        if (is_string($order)) {
            $order = in_array(strtolower($order), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::ORDER, $order, $comparison);
    }

    /**
     * Filter the query on the result_id column
     *
     * Example usage:
     * <code>
     * $query->filterByResultId(1234); // WHERE result_id = 1234
     * $query->filterByResultId(array(12, 34)); // WHERE result_id IN (12, 34)
     * $query->filterByResultId(array('min' => 12)); // WHERE result_id >= 12
     * $query->filterByResultId(array('max' => 12)); // WHERE result_id <= 12
     * </code>
     *
     * @param     mixed $resultId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByResultId($resultId = null, $comparison = null)
    {
        if (is_array($resultId)) {
            $useMinMax = false;
            if (isset($resultId['min'])) {
                $this->addUsingAlias(EventPeer::RESULT_ID, $resultId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($resultId['max'])) {
                $this->addUsingAlias(EventPeer::RESULT_ID, $resultId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::RESULT_ID, $resultId, $comparison);
    }

    /**
     * Filter the query on the nextEventDate column
     *
     * Example usage:
     * <code>
     * $query->filterByNexteventdate('2011-03-14'); // WHERE nextEventDate = '2011-03-14'
     * $query->filterByNexteventdate('now'); // WHERE nextEventDate = '2011-03-14'
     * $query->filterByNexteventdate(array('max' => 'yesterday')); // WHERE nextEventDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $nexteventdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByNexteventdate($nexteventdate = null, $comparison = null)
    {
        if (is_array($nexteventdate)) {
            $useMinMax = false;
            if (isset($nexteventdate['min'])) {
                $this->addUsingAlias(EventPeer::NEXTEVENTDATE, $nexteventdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nexteventdate['max'])) {
                $this->addUsingAlias(EventPeer::NEXTEVENTDATE, $nexteventdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::NEXTEVENTDATE, $nexteventdate, $comparison);
    }

    /**
     * Filter the query on the payStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByPaystatus(1234); // WHERE payStatus = 1234
     * $query->filterByPaystatus(array(12, 34)); // WHERE payStatus IN (12, 34)
     * $query->filterByPaystatus(array('min' => 12)); // WHERE payStatus >= 12
     * $query->filterByPaystatus(array('max' => 12)); // WHERE payStatus <= 12
     * </code>
     *
     * @param     mixed $paystatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPaystatus($paystatus = null, $comparison = null)
    {
        if (is_array($paystatus)) {
            $useMinMax = false;
            if (isset($paystatus['min'])) {
                $this->addUsingAlias(EventPeer::PAYSTATUS, $paystatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paystatus['max'])) {
                $this->addUsingAlias(EventPeer::PAYSTATUS, $paystatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::PAYSTATUS, $paystatus, $comparison);
    }

    /**
     * Filter the query on the typeAsset_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeassetId(1234); // WHERE typeAsset_id = 1234
     * $query->filterByTypeassetId(array(12, 34)); // WHERE typeAsset_id IN (12, 34)
     * $query->filterByTypeassetId(array('min' => 12)); // WHERE typeAsset_id >= 12
     * $query->filterByTypeassetId(array('max' => 12)); // WHERE typeAsset_id <= 12
     * </code>
     *
     * @param     mixed $typeassetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByTypeassetId($typeassetId = null, $comparison = null)
    {
        if (is_array($typeassetId)) {
            $useMinMax = false;
            if (isset($typeassetId['min'])) {
                $this->addUsingAlias(EventPeer::TYPEASSET_ID, $typeassetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeassetId['max'])) {
                $this->addUsingAlias(EventPeer::TYPEASSET_ID, $typeassetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::TYPEASSET_ID, $typeassetId, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the curator_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCuratorId(1234); // WHERE curator_id = 1234
     * $query->filterByCuratorId(array(12, 34)); // WHERE curator_id IN (12, 34)
     * $query->filterByCuratorId(array('min' => 12)); // WHERE curator_id >= 12
     * $query->filterByCuratorId(array('max' => 12)); // WHERE curator_id <= 12
     * </code>
     *
     * @param     mixed $curatorId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByCuratorId($curatorId = null, $comparison = null)
    {
        if (is_array($curatorId)) {
            $useMinMax = false;
            if (isset($curatorId['min'])) {
                $this->addUsingAlias(EventPeer::CURATOR_ID, $curatorId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($curatorId['max'])) {
                $this->addUsingAlias(EventPeer::CURATOR_ID, $curatorId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::CURATOR_ID, $curatorId, $comparison);
    }

    /**
     * Filter the query on the assistant_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAssistantId(1234); // WHERE assistant_id = 1234
     * $query->filterByAssistantId(array(12, 34)); // WHERE assistant_id IN (12, 34)
     * $query->filterByAssistantId(array('min' => 12)); // WHERE assistant_id >= 12
     * $query->filterByAssistantId(array('max' => 12)); // WHERE assistant_id <= 12
     * </code>
     *
     * @param     mixed $assistantId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByAssistantId($assistantId = null, $comparison = null)
    {
        if (is_array($assistantId)) {
            $useMinMax = false;
            if (isset($assistantId['min'])) {
                $this->addUsingAlias(EventPeer::ASSISTANT_ID, $assistantId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($assistantId['max'])) {
                $this->addUsingAlias(EventPeer::ASSISTANT_ID, $assistantId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::ASSISTANT_ID, $assistantId, $comparison);
    }

    /**
     * Filter the query on the pregnancyWeek column
     *
     * Example usage:
     * <code>
     * $query->filterByPregnancyweek(1234); // WHERE pregnancyWeek = 1234
     * $query->filterByPregnancyweek(array(12, 34)); // WHERE pregnancyWeek IN (12, 34)
     * $query->filterByPregnancyweek(array('min' => 12)); // WHERE pregnancyWeek >= 12
     * $query->filterByPregnancyweek(array('max' => 12)); // WHERE pregnancyWeek <= 12
     * </code>
     *
     * @param     mixed $pregnancyweek The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPregnancyweek($pregnancyweek = null, $comparison = null)
    {
        if (is_array($pregnancyweek)) {
            $useMinMax = false;
            if (isset($pregnancyweek['min'])) {
                $this->addUsingAlias(EventPeer::PREGNANCYWEEK, $pregnancyweek['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pregnancyweek['max'])) {
                $this->addUsingAlias(EventPeer::PREGNANCYWEEK, $pregnancyweek['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::PREGNANCYWEEK, $pregnancyweek, $comparison);
    }

    /**
     * Filter the query on the MES_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMesId(1234); // WHERE MES_id = 1234
     * $query->filterByMesId(array(12, 34)); // WHERE MES_id IN (12, 34)
     * $query->filterByMesId(array('min' => 12)); // WHERE MES_id >= 12
     * $query->filterByMesId(array('max' => 12)); // WHERE MES_id <= 12
     * </code>
     *
     * @param     mixed $mesId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByMesId($mesId = null, $comparison = null)
    {
        if (is_array($mesId)) {
            $useMinMax = false;
            if (isset($mesId['min'])) {
                $this->addUsingAlias(EventPeer::MES_ID, $mesId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mesId['max'])) {
                $this->addUsingAlias(EventPeer::MES_ID, $mesId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::MES_ID, $mesId, $comparison);
    }

    /**
     * Filter the query on the mesSpecification_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMesspecificationId(1234); // WHERE mesSpecification_id = 1234
     * $query->filterByMesspecificationId(array(12, 34)); // WHERE mesSpecification_id IN (12, 34)
     * $query->filterByMesspecificationId(array('min' => 12)); // WHERE mesSpecification_id >= 12
     * $query->filterByMesspecificationId(array('max' => 12)); // WHERE mesSpecification_id <= 12
     * </code>
     *
     * @see       filterByRbmesspecification()
     *
     * @param     mixed $messpecificationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByMesspecificationId($messpecificationId = null, $comparison = null)
    {
        if (is_array($messpecificationId)) {
            $useMinMax = false;
            if (isset($messpecificationId['min'])) {
                $this->addUsingAlias(EventPeer::MESSPECIFICATION_ID, $messpecificationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($messpecificationId['max'])) {
                $this->addUsingAlias(EventPeer::MESSPECIFICATION_ID, $messpecificationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::MESSPECIFICATION_ID, $messpecificationId, $comparison);
    }

    /**
     * Filter the query on the rbAcheResult_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbacheresultId(1234); // WHERE rbAcheResult_id = 1234
     * $query->filterByRbacheresultId(array(12, 34)); // WHERE rbAcheResult_id IN (12, 34)
     * $query->filterByRbacheresultId(array('min' => 12)); // WHERE rbAcheResult_id >= 12
     * $query->filterByRbacheresultId(array('max' => 12)); // WHERE rbAcheResult_id <= 12
     * </code>
     *
     * @see       filterByRbacheresult()
     *
     * @param     mixed $rbacheresultId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByRbacheresultId($rbacheresultId = null, $comparison = null)
    {
        if (is_array($rbacheresultId)) {
            $useMinMax = false;
            if (isset($rbacheresultId['min'])) {
                $this->addUsingAlias(EventPeer::RBACHERESULT_ID, $rbacheresultId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbacheresultId['max'])) {
                $this->addUsingAlias(EventPeer::RBACHERESULT_ID, $rbacheresultId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::RBACHERESULT_ID, $rbacheresultId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(EventPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(EventPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the privilege column
     *
     * Example usage:
     * <code>
     * $query->filterByPrivilege(true); // WHERE privilege = true
     * $query->filterByPrivilege('yes'); // WHERE privilege = true
     * </code>
     *
     * @param     boolean|string $privilege The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByPrivilege($privilege = null, $comparison = null)
    {
        if (is_string($privilege)) {
            $privilege = in_array(strtolower($privilege), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::PRIVILEGE, $privilege, $comparison);
    }

    /**
     * Filter the query on the urgent column
     *
     * Example usage:
     * <code>
     * $query->filterByUrgent(true); // WHERE urgent = true
     * $query->filterByUrgent('yes'); // WHERE urgent = true
     * </code>
     *
     * @param     boolean|string $urgent The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByUrgent($urgent = null, $comparison = null)
    {
        if (is_string($urgent)) {
            $urgent = in_array(strtolower($urgent), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventPeer::URGENT, $urgent, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(EventPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(EventPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
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
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByUuidId($uuidId = null, $comparison = null)
    {
        if (is_array($uuidId)) {
            $useMinMax = false;
            if (isset($uuidId['min'])) {
                $this->addUsingAlias(EventPeer::UUID_ID, $uuidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uuidId['max'])) {
                $this->addUsingAlias(EventPeer::UUID_ID, $uuidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventPeer::UUID_ID, $uuidId, $comparison);
    }

    /**
     * Filter the query on the lpu_transfer column
     *
     * Example usage:
     * <code>
     * $query->filterByLpuTransfer('fooValue');   // WHERE lpu_transfer = 'fooValue'
     * $query->filterByLpuTransfer('%fooValue%'); // WHERE lpu_transfer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lpuTransfer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function filterByLpuTransfer($lpuTransfer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lpuTransfer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lpuTransfer)) {
                $lpuTransfer = str_replace('*', '%', $lpuTransfer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventPeer::LPU_TRANSFER, $lpuTransfer, $comparison);
    }

    /**
     * Filter the query by a related Rbacheresult object
     *
     * @param   Rbacheresult|PropelObjectCollection $rbacheresult The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbacheresult($rbacheresult, $comparison = null)
    {
        if ($rbacheresult instanceof Rbacheresult) {
            return $this
                ->addUsingAlias(EventPeer::RBACHERESULT_ID, $rbacheresult->getId(), $comparison);
        } elseif ($rbacheresult instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::RBACHERESULT_ID, $rbacheresult->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbacheresult() only accepts arguments of type Rbacheresult or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbacheresult relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinRbacheresult($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbacheresult');

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
            $this->addJoinObject($join, 'Rbacheresult');
        }

        return $this;
    }

    /**
     * Use the Rbacheresult relation Rbacheresult object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbacheresultQuery A secondary query class using the current class as primary query
     */
    public function useRbacheresultQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbacheresult($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbacheresult', '\Webmis\Models\RbacheresultQuery');
    }

    /**
     * Filter the query by a related Rbmesspecification object
     *
     * @param   Rbmesspecification|PropelObjectCollection $rbmesspecification The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmesspecification($rbmesspecification, $comparison = null)
    {
        if ($rbmesspecification instanceof Rbmesspecification) {
            return $this
                ->addUsingAlias(EventPeer::MESSPECIFICATION_ID, $rbmesspecification->getId(), $comparison);
        } elseif ($rbmesspecification instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventPeer::MESSPECIFICATION_ID, $rbmesspecification->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbmesspecification() only accepts arguments of type Rbmesspecification or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbmesspecification relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinRbmesspecification($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbmesspecification');

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
            $this->addJoinObject($join, 'Rbmesspecification');
        }

        return $this;
    }

    /**
     * Use the Rbmesspecification relation Rbmesspecification object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbmesspecificationQuery A secondary query class using the current class as primary query
     */
    public function useRbmesspecificationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbmesspecification($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbmesspecification', '\Webmis\Models\RbmesspecificationQuery');
    }

    /**
     * Filter the query by a related Tissue object
     *
     * @param   Tissue|PropelObjectCollection $tissue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTissue($tissue, $comparison = null)
    {
        if ($tissue instanceof Tissue) {
            return $this
                ->addUsingAlias(EventPeer::ID, $tissue->getEventId(), $comparison);
        } elseif ($tissue instanceof PropelObjectCollection) {
            return $this
                ->useTissueQuery()
                ->filterByPrimaryKeys($tissue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTissue() only accepts arguments of type Tissue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tissue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function joinTissue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tissue');

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
            $this->addJoinObject($join, 'Tissue');
        }

        return $this;
    }

    /**
     * Use the Tissue relation Tissue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TissueQuery A secondary query class using the current class as primary query
     */
    public function useTissueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTissue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tissue', '\Webmis\Models\TissueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Event $event Object to remove from the list of results
     *
     * @return EventQuery The current query, for fluid interface
     */
    public function prune($event = null)
    {
        if ($event) {
            $this->addUsingAlias(EventPeer::ID, $event->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
