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
use Webmis\Models\Action;
use Webmis\Models\ActionDocument;
use Webmis\Models\ActionPeer;
use Webmis\Models\ActionQuery;
use Webmis\Models\Actiontissue;
use Webmis\Models\Takentissuejournal;
use Webmis\Models\Trfufinalvolume;
use Webmis\Models\Trfulaboratorymeasure;
use Webmis\Models\Trfuorderissueresult;

/**
 * Base class that represents a query for the 'Action' table.
 *
 *
 *
 * @method ActionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ActionQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ActionQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ActionQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ActionQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ActionQuery orderByActiontypeId($order = Criteria::ASC) Order by the actionType_id column
 * @method ActionQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method ActionQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method ActionQuery orderByDirectiondate($order = Criteria::ASC) Order by the directionDate column
 * @method ActionQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method ActionQuery orderBySetpersonId($order = Criteria::ASC) Order by the setPerson_id column
 * @method ActionQuery orderByIsurgent($order = Criteria::ASC) Order by the isUrgent column
 * @method ActionQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ActionQuery orderByPlannedenddate($order = Criteria::ASC) Order by the plannedEndDate column
 * @method ActionQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method ActionQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method ActionQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method ActionQuery orderByOffice($order = Criteria::ASC) Order by the office column
 * @method ActionQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ActionQuery orderByUet($order = Criteria::ASC) Order by the uet column
 * @method ActionQuery orderByExpose($order = Criteria::ASC) Order by the expose column
 * @method ActionQuery orderByPaystatus($order = Criteria::ASC) Order by the payStatus column
 * @method ActionQuery orderByAccount($order = Criteria::ASC) Order by the account column
 * @method ActionQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method ActionQuery orderByPrescriptionId($order = Criteria::ASC) Order by the prescription_id column
 * @method ActionQuery orderByTakentissuejournalId($order = Criteria::ASC) Order by the takenTissueJournal_id column
 * @method ActionQuery orderByContractId($order = Criteria::ASC) Order by the contract_id column
 * @method ActionQuery orderByCoorddate($order = Criteria::ASC) Order by the coordDate column
 * @method ActionQuery orderByCoordagent($order = Criteria::ASC) Order by the coordAgent column
 * @method ActionQuery orderByCoordinspector($order = Criteria::ASC) Order by the coordInspector column
 * @method ActionQuery orderByCoordtext($order = Criteria::ASC) Order by the coordText column
 * @method ActionQuery orderByHospitaluidfrom($order = Criteria::ASC) Order by the hospitalUidFrom column
 * @method ActionQuery orderByPacientinqueuetype($order = Criteria::ASC) Order by the pacientInQueueType column
 * @method ActionQuery orderByAppointmenttype($order = Criteria::ASC) Order by the AppointmentType column
 * @method ActionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ActionQuery orderByParentactionId($order = Criteria::ASC) Order by the parentAction_id column
 * @method ActionQuery orderByUuidId($order = Criteria::ASC) Order by the uuid_id column
 * @method ActionQuery orderByDcmStudyUid($order = Criteria::ASC) Order by the dcm_study_uid column
 *
 * @method ActionQuery groupById() Group by the id column
 * @method ActionQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ActionQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ActionQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ActionQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ActionQuery groupByDeleted() Group by the deleted column
 * @method ActionQuery groupByActiontypeId() Group by the actionType_id column
 * @method ActionQuery groupByEventId() Group by the event_id column
 * @method ActionQuery groupByIdx() Group by the idx column
 * @method ActionQuery groupByDirectiondate() Group by the directionDate column
 * @method ActionQuery groupByStatus() Group by the status column
 * @method ActionQuery groupBySetpersonId() Group by the setPerson_id column
 * @method ActionQuery groupByIsurgent() Group by the isUrgent column
 * @method ActionQuery groupByBegdate() Group by the begDate column
 * @method ActionQuery groupByPlannedenddate() Group by the plannedEndDate column
 * @method ActionQuery groupByEnddate() Group by the endDate column
 * @method ActionQuery groupByNote() Group by the note column
 * @method ActionQuery groupByPersonId() Group by the person_id column
 * @method ActionQuery groupByOffice() Group by the office column
 * @method ActionQuery groupByAmount() Group by the amount column
 * @method ActionQuery groupByUet() Group by the uet column
 * @method ActionQuery groupByExpose() Group by the expose column
 * @method ActionQuery groupByPaystatus() Group by the payStatus column
 * @method ActionQuery groupByAccount() Group by the account column
 * @method ActionQuery groupByFinanceId() Group by the finance_id column
 * @method ActionQuery groupByPrescriptionId() Group by the prescription_id column
 * @method ActionQuery groupByTakentissuejournalId() Group by the takenTissueJournal_id column
 * @method ActionQuery groupByContractId() Group by the contract_id column
 * @method ActionQuery groupByCoorddate() Group by the coordDate column
 * @method ActionQuery groupByCoordagent() Group by the coordAgent column
 * @method ActionQuery groupByCoordinspector() Group by the coordInspector column
 * @method ActionQuery groupByCoordtext() Group by the coordText column
 * @method ActionQuery groupByHospitaluidfrom() Group by the hospitalUidFrom column
 * @method ActionQuery groupByPacientinqueuetype() Group by the pacientInQueueType column
 * @method ActionQuery groupByAppointmenttype() Group by the AppointmentType column
 * @method ActionQuery groupByVersion() Group by the version column
 * @method ActionQuery groupByParentactionId() Group by the parentAction_id column
 * @method ActionQuery groupByUuidId() Group by the uuid_id column
 * @method ActionQuery groupByDcmStudyUid() Group by the dcm_study_uid column
 *
 * @method ActionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionQuery leftJoinTakentissuejournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Takentissuejournal relation
 * @method ActionQuery rightJoinTakentissuejournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Takentissuejournal relation
 * @method ActionQuery innerJoinTakentissuejournal($relationAlias = null) Adds a INNER JOIN clause to the query using the Takentissuejournal relation
 *
 * @method ActionQuery leftJoinActiontissue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontissue relation
 * @method ActionQuery rightJoinActiontissue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontissue relation
 * @method ActionQuery innerJoinActiontissue($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontissue relation
 *
 * @method ActionQuery leftJoinActionDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionDocument relation
 * @method ActionQuery rightJoinActionDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionDocument relation
 * @method ActionQuery innerJoinActionDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionDocument relation
 *
 * @method ActionQuery leftJoinTrfufinalvolume($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trfufinalvolume relation
 * @method ActionQuery rightJoinTrfufinalvolume($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trfufinalvolume relation
 * @method ActionQuery innerJoinTrfufinalvolume($relationAlias = null) Adds a INNER JOIN clause to the query using the Trfufinalvolume relation
 *
 * @method ActionQuery leftJoinTrfulaboratorymeasure($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trfulaboratorymeasure relation
 * @method ActionQuery rightJoinTrfulaboratorymeasure($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trfulaboratorymeasure relation
 * @method ActionQuery innerJoinTrfulaboratorymeasure($relationAlias = null) Adds a INNER JOIN clause to the query using the Trfulaboratorymeasure relation
 *
 * @method ActionQuery leftJoinTrfuorderissueresult($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trfuorderissueresult relation
 * @method ActionQuery rightJoinTrfuorderissueresult($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trfuorderissueresult relation
 * @method ActionQuery innerJoinTrfuorderissueresult($relationAlias = null) Adds a INNER JOIN clause to the query using the Trfuorderissueresult relation
 *
 * @method Action findOne(PropelPDO $con = null) Return the first Action matching the query
 * @method Action findOneOrCreate(PropelPDO $con = null) Return the first Action matching the query, or a new Action object populated from the query conditions when no match is found
 *
 * @method Action findOneByCreatedatetime(string $createDatetime) Return the first Action filtered by the createDatetime column
 * @method Action findOneByCreatepersonId(int $createPerson_id) Return the first Action filtered by the createPerson_id column
 * @method Action findOneByModifydatetime(string $modifyDatetime) Return the first Action filtered by the modifyDatetime column
 * @method Action findOneByModifypersonId(int $modifyPerson_id) Return the first Action filtered by the modifyPerson_id column
 * @method Action findOneByDeleted(boolean $deleted) Return the first Action filtered by the deleted column
 * @method Action findOneByActiontypeId(int $actionType_id) Return the first Action filtered by the actionType_id column
 * @method Action findOneByEventId(int $event_id) Return the first Action filtered by the event_id column
 * @method Action findOneByIdx(int $idx) Return the first Action filtered by the idx column
 * @method Action findOneByDirectiondate(string $directionDate) Return the first Action filtered by the directionDate column
 * @method Action findOneByStatus(int $status) Return the first Action filtered by the status column
 * @method Action findOneBySetpersonId(int $setPerson_id) Return the first Action filtered by the setPerson_id column
 * @method Action findOneByIsurgent(int $isUrgent) Return the first Action filtered by the isUrgent column
 * @method Action findOneByBegdate(string $begDate) Return the first Action filtered by the begDate column
 * @method Action findOneByPlannedenddate(string $plannedEndDate) Return the first Action filtered by the plannedEndDate column
 * @method Action findOneByEnddate(string $endDate) Return the first Action filtered by the endDate column
 * @method Action findOneByNote(string $note) Return the first Action filtered by the note column
 * @method Action findOneByPersonId(int $person_id) Return the first Action filtered by the person_id column
 * @method Action findOneByOffice(string $office) Return the first Action filtered by the office column
 * @method Action findOneByAmount(double $amount) Return the first Action filtered by the amount column
 * @method Action findOneByUet(double $uet) Return the first Action filtered by the uet column
 * @method Action findOneByExpose(int $expose) Return the first Action filtered by the expose column
 * @method Action findOneByPaystatus(int $payStatus) Return the first Action filtered by the payStatus column
 * @method Action findOneByAccount(boolean $account) Return the first Action filtered by the account column
 * @method Action findOneByFinanceId(int $finance_id) Return the first Action filtered by the finance_id column
 * @method Action findOneByPrescriptionId(int $prescription_id) Return the first Action filtered by the prescription_id column
 * @method Action findOneByTakentissuejournalId(int $takenTissueJournal_id) Return the first Action filtered by the takenTissueJournal_id column
 * @method Action findOneByContractId(int $contract_id) Return the first Action filtered by the contract_id column
 * @method Action findOneByCoorddate(string $coordDate) Return the first Action filtered by the coordDate column
 * @method Action findOneByCoordagent(string $coordAgent) Return the first Action filtered by the coordAgent column
 * @method Action findOneByCoordinspector(string $coordInspector) Return the first Action filtered by the coordInspector column
 * @method Action findOneByCoordtext(string $coordText) Return the first Action filtered by the coordText column
 * @method Action findOneByHospitaluidfrom(string $hospitalUidFrom) Return the first Action filtered by the hospitalUidFrom column
 * @method Action findOneByPacientinqueuetype(int $pacientInQueueType) Return the first Action filtered by the pacientInQueueType column
 * @method Action findOneByAppointmenttype(string $AppointmentType) Return the first Action filtered by the AppointmentType column
 * @method Action findOneByVersion(int $version) Return the first Action filtered by the version column
 * @method Action findOneByParentactionId(int $parentAction_id) Return the first Action filtered by the parentAction_id column
 * @method Action findOneByUuidId(int $uuid_id) Return the first Action filtered by the uuid_id column
 * @method Action findOneByDcmStudyUid(string $dcm_study_uid) Return the first Action filtered by the dcm_study_uid column
 *
 * @method array findById(int $id) Return Action objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Action objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Action objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Action objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Action objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Action objects filtered by the deleted column
 * @method array findByActiontypeId(int $actionType_id) Return Action objects filtered by the actionType_id column
 * @method array findByEventId(int $event_id) Return Action objects filtered by the event_id column
 * @method array findByIdx(int $idx) Return Action objects filtered by the idx column
 * @method array findByDirectiondate(string $directionDate) Return Action objects filtered by the directionDate column
 * @method array findByStatus(int $status) Return Action objects filtered by the status column
 * @method array findBySetpersonId(int $setPerson_id) Return Action objects filtered by the setPerson_id column
 * @method array findByIsurgent(int $isUrgent) Return Action objects filtered by the isUrgent column
 * @method array findByBegdate(string $begDate) Return Action objects filtered by the begDate column
 * @method array findByPlannedenddate(string $plannedEndDate) Return Action objects filtered by the plannedEndDate column
 * @method array findByEnddate(string $endDate) Return Action objects filtered by the endDate column
 * @method array findByNote(string $note) Return Action objects filtered by the note column
 * @method array findByPersonId(int $person_id) Return Action objects filtered by the person_id column
 * @method array findByOffice(string $office) Return Action objects filtered by the office column
 * @method array findByAmount(double $amount) Return Action objects filtered by the amount column
 * @method array findByUet(double $uet) Return Action objects filtered by the uet column
 * @method array findByExpose(int $expose) Return Action objects filtered by the expose column
 * @method array findByPaystatus(int $payStatus) Return Action objects filtered by the payStatus column
 * @method array findByAccount(boolean $account) Return Action objects filtered by the account column
 * @method array findByFinanceId(int $finance_id) Return Action objects filtered by the finance_id column
 * @method array findByPrescriptionId(int $prescription_id) Return Action objects filtered by the prescription_id column
 * @method array findByTakentissuejournalId(int $takenTissueJournal_id) Return Action objects filtered by the takenTissueJournal_id column
 * @method array findByContractId(int $contract_id) Return Action objects filtered by the contract_id column
 * @method array findByCoorddate(string $coordDate) Return Action objects filtered by the coordDate column
 * @method array findByCoordagent(string $coordAgent) Return Action objects filtered by the coordAgent column
 * @method array findByCoordinspector(string $coordInspector) Return Action objects filtered by the coordInspector column
 * @method array findByCoordtext(string $coordText) Return Action objects filtered by the coordText column
 * @method array findByHospitaluidfrom(string $hospitalUidFrom) Return Action objects filtered by the hospitalUidFrom column
 * @method array findByPacientinqueuetype(int $pacientInQueueType) Return Action objects filtered by the pacientInQueueType column
 * @method array findByAppointmenttype(string $AppointmentType) Return Action objects filtered by the AppointmentType column
 * @method array findByVersion(int $version) Return Action objects filtered by the version column
 * @method array findByParentactionId(int $parentAction_id) Return Action objects filtered by the parentAction_id column
 * @method array findByUuidId(int $uuid_id) Return Action objects filtered by the uuid_id column
 * @method array findByDcmStudyUid(string $dcm_study_uid) Return Action objects filtered by the dcm_study_uid column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Action', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionQuery) {
            return $criteria;
        }
        $query = new ActionQuery();
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
     * @return   Action|Action[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Action A model object, or null if the key is not found
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
     * @return                 Action A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `actionType_id`, `event_id`, `idx`, `directionDate`, `status`, `setPerson_id`, `isUrgent`, `begDate`, `plannedEndDate`, `endDate`, `note`, `person_id`, `office`, `amount`, `uet`, `expose`, `payStatus`, `account`, `finance_id`, `prescription_id`, `takenTissueJournal_id`, `contract_id`, `coordDate`, `coordAgent`, `coordInspector`, `coordText`, `hospitalUidFrom`, `pacientInQueueType`, `AppointmentType`, `version`, `parentAction_id`, `uuid_id`, `dcm_study_uid` FROM `Action` WHERE `id` = :p0';
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
            $obj = new Action();
            $obj->hydrate($row);
            ActionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Action|Action[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Action[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionPeer::ID, $keys, Criteria::IN);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ID, $id, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ActionPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ActionPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ActionPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ActionPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ActionPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ActionPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ActionPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ActionPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the actionType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActiontypeId(1234); // WHERE actionType_id = 1234
     * $query->filterByActiontypeId(array(12, 34)); // WHERE actionType_id IN (12, 34)
     * $query->filterByActiontypeId(array('min' => 12)); // WHERE actionType_id >= 12
     * $query->filterByActiontypeId(array('max' => 12)); // WHERE actionType_id <= 12
     * </code>
     *
     * @param     mixed $actiontypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByActiontypeId($actiontypeId = null, $comparison = null)
    {
        if (is_array($actiontypeId)) {
            $useMinMax = false;
            if (isset($actiontypeId['min'])) {
                $this->addUsingAlias(ActionPeer::ACTIONTYPE_ID, $actiontypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiontypeId['max'])) {
                $this->addUsingAlias(ActionPeer::ACTIONTYPE_ID, $actiontypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ACTIONTYPE_ID, $actiontypeId, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(ActionPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(ActionPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::EVENT_ID, $eventId, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(ActionPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(ActionPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::IDX, $idx, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByDirectiondate($directiondate = null, $comparison = null)
    {
        if (is_array($directiondate)) {
            $useMinMax = false;
            if (isset($directiondate['min'])) {
                $this->addUsingAlias(ActionPeer::DIRECTIONDATE, $directiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($directiondate['max'])) {
                $this->addUsingAlias(ActionPeer::DIRECTIONDATE, $directiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::DIRECTIONDATE, $directiondate, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(ActionPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(ActionPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::STATUS, $status, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterBySetpersonId($setpersonId = null, $comparison = null)
    {
        if (is_array($setpersonId)) {
            $useMinMax = false;
            if (isset($setpersonId['min'])) {
                $this->addUsingAlias(ActionPeer::SETPERSON_ID, $setpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setpersonId['max'])) {
                $this->addUsingAlias(ActionPeer::SETPERSON_ID, $setpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::SETPERSON_ID, $setpersonId, $comparison);
    }

    /**
     * Filter the query on the isUrgent column
     *
     * Example usage:
     * <code>
     * $query->filterByIsurgent(1234); // WHERE isUrgent = 1234
     * $query->filterByIsurgent(array(12, 34)); // WHERE isUrgent IN (12, 34)
     * $query->filterByIsurgent(array('min' => 12)); // WHERE isUrgent >= 12
     * $query->filterByIsurgent(array('max' => 12)); // WHERE isUrgent <= 12
     * </code>
     *
     * @param     mixed $isurgent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByIsurgent($isurgent = null, $comparison = null)
    {
        if (is_array($isurgent)) {
            $useMinMax = false;
            if (isset($isurgent['min'])) {
                $this->addUsingAlias(ActionPeer::ISURGENT, $isurgent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isurgent['max'])) {
                $this->addUsingAlias(ActionPeer::ISURGENT, $isurgent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ISURGENT, $isurgent, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ActionPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ActionPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::BEGDATE, $begdate, $comparison);
    }

    /**
     * Filter the query on the plannedEndDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPlannedenddate('2011-03-14'); // WHERE plannedEndDate = '2011-03-14'
     * $query->filterByPlannedenddate('now'); // WHERE plannedEndDate = '2011-03-14'
     * $query->filterByPlannedenddate(array('max' => 'yesterday')); // WHERE plannedEndDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $plannedenddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPlannedenddate($plannedenddate = null, $comparison = null)
    {
        if (is_array($plannedenddate)) {
            $useMinMax = false;
            if (isset($plannedenddate['min'])) {
                $this->addUsingAlias(ActionPeer::PLANNEDENDDATE, $plannedenddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($plannedenddate['max'])) {
                $this->addUsingAlias(ActionPeer::PLANNEDENDDATE, $plannedenddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::PLANNEDENDDATE, $plannedenddate, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ActionPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ActionPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::ENDDATE, $enddate, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActionPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id >= 12
     * $query->filterByPersonId(array('max' => 12)); // WHERE person_id <= 12
     * </code>
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(ActionPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(ActionPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the office column
     *
     * Example usage:
     * <code>
     * $query->filterByOffice('fooValue');   // WHERE office = 'fooValue'
     * $query->filterByOffice('%fooValue%'); // WHERE office LIKE '%fooValue%'
     * </code>
     *
     * @param     string $office The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByOffice($office = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($office)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $office)) {
                $office = str_replace('*', '%', $office);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::OFFICE, $office, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ActionPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ActionPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::AMOUNT, $amount, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByUet($uet = null, $comparison = null)
    {
        if (is_array($uet)) {
            $useMinMax = false;
            if (isset($uet['min'])) {
                $this->addUsingAlias(ActionPeer::UET, $uet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uet['max'])) {
                $this->addUsingAlias(ActionPeer::UET, $uet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::UET, $uet, $comparison);
    }

    /**
     * Filter the query on the expose column
     *
     * Example usage:
     * <code>
     * $query->filterByExpose(1234); // WHERE expose = 1234
     * $query->filterByExpose(array(12, 34)); // WHERE expose IN (12, 34)
     * $query->filterByExpose(array('min' => 12)); // WHERE expose >= 12
     * $query->filterByExpose(array('max' => 12)); // WHERE expose <= 12
     * </code>
     *
     * @param     mixed $expose The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByExpose($expose = null, $comparison = null)
    {
        if (is_array($expose)) {
            $useMinMax = false;
            if (isset($expose['min'])) {
                $this->addUsingAlias(ActionPeer::EXPOSE, $expose['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expose['max'])) {
                $this->addUsingAlias(ActionPeer::EXPOSE, $expose['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::EXPOSE, $expose, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPaystatus($paystatus = null, $comparison = null)
    {
        if (is_array($paystatus)) {
            $useMinMax = false;
            if (isset($paystatus['min'])) {
                $this->addUsingAlias(ActionPeer::PAYSTATUS, $paystatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($paystatus['max'])) {
                $this->addUsingAlias(ActionPeer::PAYSTATUS, $paystatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::PAYSTATUS, $paystatus, $comparison);
    }

    /**
     * Filter the query on the account column
     *
     * Example usage:
     * <code>
     * $query->filterByAccount(true); // WHERE account = true
     * $query->filterByAccount('yes'); // WHERE account = true
     * </code>
     *
     * @param     boolean|string $account The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByAccount($account = null, $comparison = null)
    {
        if (is_string($account)) {
            $account = in_array(strtolower($account), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionPeer::ACCOUNT, $account, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(ActionPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(ActionPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the prescription_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrescriptionId(1234); // WHERE prescription_id = 1234
     * $query->filterByPrescriptionId(array(12, 34)); // WHERE prescription_id IN (12, 34)
     * $query->filterByPrescriptionId(array('min' => 12)); // WHERE prescription_id >= 12
     * $query->filterByPrescriptionId(array('max' => 12)); // WHERE prescription_id <= 12
     * </code>
     *
     * @param     mixed $prescriptionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPrescriptionId($prescriptionId = null, $comparison = null)
    {
        if (is_array($prescriptionId)) {
            $useMinMax = false;
            if (isset($prescriptionId['min'])) {
                $this->addUsingAlias(ActionPeer::PRESCRIPTION_ID, $prescriptionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prescriptionId['max'])) {
                $this->addUsingAlias(ActionPeer::PRESCRIPTION_ID, $prescriptionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::PRESCRIPTION_ID, $prescriptionId, $comparison);
    }

    /**
     * Filter the query on the takenTissueJournal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTakentissuejournalId(1234); // WHERE takenTissueJournal_id = 1234
     * $query->filterByTakentissuejournalId(array(12, 34)); // WHERE takenTissueJournal_id IN (12, 34)
     * $query->filterByTakentissuejournalId(array('min' => 12)); // WHERE takenTissueJournal_id >= 12
     * $query->filterByTakentissuejournalId(array('max' => 12)); // WHERE takenTissueJournal_id <= 12
     * </code>
     *
     * @see       filterByTakentissuejournal()
     *
     * @param     mixed $takentissuejournalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByTakentissuejournalId($takentissuejournalId = null, $comparison = null)
    {
        if (is_array($takentissuejournalId)) {
            $useMinMax = false;
            if (isset($takentissuejournalId['min'])) {
                $this->addUsingAlias(ActionPeer::TAKENTISSUEJOURNAL_ID, $takentissuejournalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($takentissuejournalId['max'])) {
                $this->addUsingAlias(ActionPeer::TAKENTISSUEJOURNAL_ID, $takentissuejournalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::TAKENTISSUEJOURNAL_ID, $takentissuejournalId, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByContractId($contractId = null, $comparison = null)
    {
        if (is_array($contractId)) {
            $useMinMax = false;
            if (isset($contractId['min'])) {
                $this->addUsingAlias(ActionPeer::CONTRACT_ID, $contractId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($contractId['max'])) {
                $this->addUsingAlias(ActionPeer::CONTRACT_ID, $contractId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::CONTRACT_ID, $contractId, $comparison);
    }

    /**
     * Filter the query on the coordDate column
     *
     * Example usage:
     * <code>
     * $query->filterByCoorddate('2011-03-14'); // WHERE coordDate = '2011-03-14'
     * $query->filterByCoorddate('now'); // WHERE coordDate = '2011-03-14'
     * $query->filterByCoorddate(array('max' => 'yesterday')); // WHERE coordDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $coorddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCoorddate($coorddate = null, $comparison = null)
    {
        if (is_array($coorddate)) {
            $useMinMax = false;
            if (isset($coorddate['min'])) {
                $this->addUsingAlias(ActionPeer::COORDDATE, $coorddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($coorddate['max'])) {
                $this->addUsingAlias(ActionPeer::COORDDATE, $coorddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::COORDDATE, $coorddate, $comparison);
    }

    /**
     * Filter the query on the coordAgent column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordagent('fooValue');   // WHERE coordAgent = 'fooValue'
     * $query->filterByCoordagent('%fooValue%'); // WHERE coordAgent LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordagent The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCoordagent($coordagent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordagent)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coordagent)) {
                $coordagent = str_replace('*', '%', $coordagent);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::COORDAGENT, $coordagent, $comparison);
    }

    /**
     * Filter the query on the coordInspector column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordinspector('fooValue');   // WHERE coordInspector = 'fooValue'
     * $query->filterByCoordinspector('%fooValue%'); // WHERE coordInspector LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordinspector The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCoordinspector($coordinspector = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordinspector)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coordinspector)) {
                $coordinspector = str_replace('*', '%', $coordinspector);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::COORDINSPECTOR, $coordinspector, $comparison);
    }

    /**
     * Filter the query on the coordText column
     *
     * Example usage:
     * <code>
     * $query->filterByCoordtext('fooValue');   // WHERE coordText = 'fooValue'
     * $query->filterByCoordtext('%fooValue%'); // WHERE coordText LIKE '%fooValue%'
     * </code>
     *
     * @param     string $coordtext The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByCoordtext($coordtext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($coordtext)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $coordtext)) {
                $coordtext = str_replace('*', '%', $coordtext);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::COORDTEXT, $coordtext, $comparison);
    }

    /**
     * Filter the query on the hospitalUidFrom column
     *
     * Example usage:
     * <code>
     * $query->filterByHospitaluidfrom('fooValue');   // WHERE hospitalUidFrom = 'fooValue'
     * $query->filterByHospitaluidfrom('%fooValue%'); // WHERE hospitalUidFrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hospitaluidfrom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByHospitaluidfrom($hospitaluidfrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hospitaluidfrom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hospitaluidfrom)) {
                $hospitaluidfrom = str_replace('*', '%', $hospitaluidfrom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::HOSPITALUIDFROM, $hospitaluidfrom, $comparison);
    }

    /**
     * Filter the query on the pacientInQueueType column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientinqueuetype(1234); // WHERE pacientInQueueType = 1234
     * $query->filterByPacientinqueuetype(array(12, 34)); // WHERE pacientInQueueType IN (12, 34)
     * $query->filterByPacientinqueuetype(array('min' => 12)); // WHERE pacientInQueueType >= 12
     * $query->filterByPacientinqueuetype(array('max' => 12)); // WHERE pacientInQueueType <= 12
     * </code>
     *
     * @param     mixed $pacientinqueuetype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByPacientinqueuetype($pacientinqueuetype = null, $comparison = null)
    {
        if (is_array($pacientinqueuetype)) {
            $useMinMax = false;
            if (isset($pacientinqueuetype['min'])) {
                $this->addUsingAlias(ActionPeer::PACIENTINQUEUETYPE, $pacientinqueuetype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pacientinqueuetype['max'])) {
                $this->addUsingAlias(ActionPeer::PACIENTINQUEUETYPE, $pacientinqueuetype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::PACIENTINQUEUETYPE, $pacientinqueuetype, $comparison);
    }

    /**
     * Filter the query on the AppointmentType column
     *
     * Example usage:
     * <code>
     * $query->filterByAppointmenttype('fooValue');   // WHERE AppointmentType = 'fooValue'
     * $query->filterByAppointmenttype('%fooValue%'); // WHERE AppointmentType LIKE '%fooValue%'
     * </code>
     *
     * @param     string $appointmenttype The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByAppointmenttype($appointmenttype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($appointmenttype)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $appointmenttype)) {
                $appointmenttype = str_replace('*', '%', $appointmenttype);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::APPOINTMENTTYPE, $appointmenttype, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ActionPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ActionPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the parentAction_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentactionId(1234); // WHERE parentAction_id = 1234
     * $query->filterByParentactionId(array(12, 34)); // WHERE parentAction_id IN (12, 34)
     * $query->filterByParentactionId(array('min' => 12)); // WHERE parentAction_id >= 12
     * $query->filterByParentactionId(array('max' => 12)); // WHERE parentAction_id <= 12
     * </code>
     *
     * @param     mixed $parentactionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByParentactionId($parentactionId = null, $comparison = null)
    {
        if (is_array($parentactionId)) {
            $useMinMax = false;
            if (isset($parentactionId['min'])) {
                $this->addUsingAlias(ActionPeer::PARENTACTION_ID, $parentactionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentactionId['max'])) {
                $this->addUsingAlias(ActionPeer::PARENTACTION_ID, $parentactionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::PARENTACTION_ID, $parentactionId, $comparison);
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
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByUuidId($uuidId = null, $comparison = null)
    {
        if (is_array($uuidId)) {
            $useMinMax = false;
            if (isset($uuidId['min'])) {
                $this->addUsingAlias(ActionPeer::UUID_ID, $uuidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uuidId['max'])) {
                $this->addUsingAlias(ActionPeer::UUID_ID, $uuidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionPeer::UUID_ID, $uuidId, $comparison);
    }

    /**
     * Filter the query on the dcm_study_uid column
     *
     * Example usage:
     * <code>
     * $query->filterByDcmStudyUid('fooValue');   // WHERE dcm_study_uid = 'fooValue'
     * $query->filterByDcmStudyUid('%fooValue%'); // WHERE dcm_study_uid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dcmStudyUid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function filterByDcmStudyUid($dcmStudyUid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dcmStudyUid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dcmStudyUid)) {
                $dcmStudyUid = str_replace('*', '%', $dcmStudyUid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionPeer::DCM_STUDY_UID, $dcmStudyUid, $comparison);
    }

    /**
     * Filter the query by a related Takentissuejournal object
     *
     * @param   Takentissuejournal|PropelObjectCollection $takentissuejournal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTakentissuejournal($takentissuejournal, $comparison = null)
    {
        if ($takentissuejournal instanceof Takentissuejournal) {
            return $this
                ->addUsingAlias(ActionPeer::TAKENTISSUEJOURNAL_ID, $takentissuejournal->getId(), $comparison);
        } elseif ($takentissuejournal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionPeer::TAKENTISSUEJOURNAL_ID, $takentissuejournal->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByTakentissuejournal() only accepts arguments of type Takentissuejournal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Takentissuejournal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinTakentissuejournal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Takentissuejournal');

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
            $this->addJoinObject($join, 'Takentissuejournal');
        }

        return $this;
    }

    /**
     * Use the Takentissuejournal relation Takentissuejournal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TakentissuejournalQuery A secondary query class using the current class as primary query
     */
    public function useTakentissuejournalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTakentissuejournal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Takentissuejournal', '\Webmis\Models\TakentissuejournalQuery');
    }

    /**
     * Filter the query by a related Actiontissue object
     *
     * @param   Actiontissue|PropelObjectCollection $actiontissue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontissue($actiontissue, $comparison = null)
    {
        if ($actiontissue instanceof Actiontissue) {
            return $this
                ->addUsingAlias(ActionPeer::ID, $actiontissue->getActionId(), $comparison);
        } elseif ($actiontissue instanceof PropelObjectCollection) {
            return $this
                ->useActiontissueQuery()
                ->filterByPrimaryKeys($actiontissue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontissue() only accepts arguments of type Actiontissue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actiontissue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinActiontissue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actiontissue');

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
            $this->addJoinObject($join, 'Actiontissue');
        }

        return $this;
    }

    /**
     * Use the Actiontissue relation Actiontissue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontissueQuery A secondary query class using the current class as primary query
     */
    public function useActiontissueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontissue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actiontissue', '\Webmis\Models\ActiontissueQuery');
    }

    /**
     * Filter the query by a related ActionDocument object
     *
     * @param   ActionDocument|PropelObjectCollection $actionDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionDocument($actionDocument, $comparison = null)
    {
        if ($actionDocument instanceof ActionDocument) {
            return $this
                ->addUsingAlias(ActionPeer::ID, $actionDocument->getActionId(), $comparison);
        } elseif ($actionDocument instanceof PropelObjectCollection) {
            return $this
                ->useActionDocumentQuery()
                ->filterByPrimaryKeys($actionDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionDocument() only accepts arguments of type ActionDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinActionDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionDocument');

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
            $this->addJoinObject($join, 'ActionDocument');
        }

        return $this;
    }

    /**
     * Use the ActionDocument relation ActionDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionDocumentQuery A secondary query class using the current class as primary query
     */
    public function useActionDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionDocument', '\Webmis\Models\ActionDocumentQuery');
    }

    /**
     * Filter the query by a related Trfufinalvolume object
     *
     * @param   Trfufinalvolume|PropelObjectCollection $trfufinalvolume  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrfufinalvolume($trfufinalvolume, $comparison = null)
    {
        if ($trfufinalvolume instanceof Trfufinalvolume) {
            return $this
                ->addUsingAlias(ActionPeer::ID, $trfufinalvolume->getActionId(), $comparison);
        } elseif ($trfufinalvolume instanceof PropelObjectCollection) {
            return $this
                ->useTrfufinalvolumeQuery()
                ->filterByPrimaryKeys($trfufinalvolume->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrfufinalvolume() only accepts arguments of type Trfufinalvolume or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trfufinalvolume relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinTrfufinalvolume($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trfufinalvolume');

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
            $this->addJoinObject($join, 'Trfufinalvolume');
        }

        return $this;
    }

    /**
     * Use the Trfufinalvolume relation Trfufinalvolume object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TrfufinalvolumeQuery A secondary query class using the current class as primary query
     */
    public function useTrfufinalvolumeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrfufinalvolume($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trfufinalvolume', '\Webmis\Models\TrfufinalvolumeQuery');
    }

    /**
     * Filter the query by a related Trfulaboratorymeasure object
     *
     * @param   Trfulaboratorymeasure|PropelObjectCollection $trfulaboratorymeasure  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrfulaboratorymeasure($trfulaboratorymeasure, $comparison = null)
    {
        if ($trfulaboratorymeasure instanceof Trfulaboratorymeasure) {
            return $this
                ->addUsingAlias(ActionPeer::ID, $trfulaboratorymeasure->getActionId(), $comparison);
        } elseif ($trfulaboratorymeasure instanceof PropelObjectCollection) {
            return $this
                ->useTrfulaboratorymeasureQuery()
                ->filterByPrimaryKeys($trfulaboratorymeasure->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrfulaboratorymeasure() only accepts arguments of type Trfulaboratorymeasure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trfulaboratorymeasure relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinTrfulaboratorymeasure($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trfulaboratorymeasure');

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
            $this->addJoinObject($join, 'Trfulaboratorymeasure');
        }

        return $this;
    }

    /**
     * Use the Trfulaboratorymeasure relation Trfulaboratorymeasure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TrfulaboratorymeasureQuery A secondary query class using the current class as primary query
     */
    public function useTrfulaboratorymeasureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrfulaboratorymeasure($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trfulaboratorymeasure', '\Webmis\Models\TrfulaboratorymeasureQuery');
    }

    /**
     * Filter the query by a related Trfuorderissueresult object
     *
     * @param   Trfuorderissueresult|PropelObjectCollection $trfuorderissueresult  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrfuorderissueresult($trfuorderissueresult, $comparison = null)
    {
        if ($trfuorderissueresult instanceof Trfuorderissueresult) {
            return $this
                ->addUsingAlias(ActionPeer::ID, $trfuorderissueresult->getActionId(), $comparison);
        } elseif ($trfuorderissueresult instanceof PropelObjectCollection) {
            return $this
                ->useTrfuorderissueresultQuery()
                ->filterByPrimaryKeys($trfuorderissueresult->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrfuorderissueresult() only accepts arguments of type Trfuorderissueresult or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trfuorderissueresult relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function joinTrfuorderissueresult($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trfuorderissueresult');

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
            $this->addJoinObject($join, 'Trfuorderissueresult');
        }

        return $this;
    }

    /**
     * Use the Trfuorderissueresult relation Trfuorderissueresult object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TrfuorderissueresultQuery A secondary query class using the current class as primary query
     */
    public function useTrfuorderissueresultQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrfuorderissueresult($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trfuorderissueresult', '\Webmis\Models\TrfuorderissueresultQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Action $action Object to remove from the list of results
     *
     * @return ActionQuery The current query, for fluid interface
     */
    public function prune($action = null)
    {
        if ($action) {
            $this->addUsingAlias(ActionPeer::ID, $action->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
