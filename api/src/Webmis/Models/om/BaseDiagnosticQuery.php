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
use Webmis\Models\Diagnostic;
use Webmis\Models\DiagnosticPeer;
use Webmis\Models\DiagnosticQuery;
use Webmis\Models\Rbacheresult;

/**
 * Base class that represents a query for the 'Diagnostic' table.
 *
 *
 *
 * @method DiagnosticQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DiagnosticQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method DiagnosticQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method DiagnosticQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method DiagnosticQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method DiagnosticQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method DiagnosticQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method DiagnosticQuery orderByDiagnosisId($order = Criteria::ASC) Order by the diagnosis_id column
 * @method DiagnosticQuery orderByDiagnosistypeId($order = Criteria::ASC) Order by the diagnosisType_id column
 * @method DiagnosticQuery orderByCharacterId($order = Criteria::ASC) Order by the character_id column
 * @method DiagnosticQuery orderByStageId($order = Criteria::ASC) Order by the stage_id column
 * @method DiagnosticQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method DiagnosticQuery orderByDispanserId($order = Criteria::ASC) Order by the dispanser_id column
 * @method DiagnosticQuery orderBySanatorium($order = Criteria::ASC) Order by the sanatorium column
 * @method DiagnosticQuery orderByHospital($order = Criteria::ASC) Order by the hospital column
 * @method DiagnosticQuery orderByTraumatypeId($order = Criteria::ASC) Order by the traumaType_id column
 * @method DiagnosticQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method DiagnosticQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method DiagnosticQuery orderByHealthgroupId($order = Criteria::ASC) Order by the healthGroup_id column
 * @method DiagnosticQuery orderByResultId($order = Criteria::ASC) Order by the result_id column
 * @method DiagnosticQuery orderBySetdate($order = Criteria::ASC) Order by the setDate column
 * @method DiagnosticQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method DiagnosticQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method DiagnosticQuery orderByRbacheresultId($order = Criteria::ASC) Order by the rbAcheResult_id column
 * @method DiagnosticQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method DiagnosticQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 *
 * @method DiagnosticQuery groupById() Group by the id column
 * @method DiagnosticQuery groupByCreatedatetime() Group by the createDatetime column
 * @method DiagnosticQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method DiagnosticQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method DiagnosticQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method DiagnosticQuery groupByDeleted() Group by the deleted column
 * @method DiagnosticQuery groupByEventId() Group by the event_id column
 * @method DiagnosticQuery groupByDiagnosisId() Group by the diagnosis_id column
 * @method DiagnosticQuery groupByDiagnosistypeId() Group by the diagnosisType_id column
 * @method DiagnosticQuery groupByCharacterId() Group by the character_id column
 * @method DiagnosticQuery groupByStageId() Group by the stage_id column
 * @method DiagnosticQuery groupByPhaseId() Group by the phase_id column
 * @method DiagnosticQuery groupByDispanserId() Group by the dispanser_id column
 * @method DiagnosticQuery groupBySanatorium() Group by the sanatorium column
 * @method DiagnosticQuery groupByHospital() Group by the hospital column
 * @method DiagnosticQuery groupByTraumatypeId() Group by the traumaType_id column
 * @method DiagnosticQuery groupBySpecialityId() Group by the speciality_id column
 * @method DiagnosticQuery groupByPersonId() Group by the person_id column
 * @method DiagnosticQuery groupByHealthgroupId() Group by the healthGroup_id column
 * @method DiagnosticQuery groupByResultId() Group by the result_id column
 * @method DiagnosticQuery groupBySetdate() Group by the setDate column
 * @method DiagnosticQuery groupByEnddate() Group by the endDate column
 * @method DiagnosticQuery groupByNotes() Group by the notes column
 * @method DiagnosticQuery groupByRbacheresultId() Group by the rbAcheResult_id column
 * @method DiagnosticQuery groupByVersion() Group by the version column
 * @method DiagnosticQuery groupByActionId() Group by the action_id column
 *
 * @method DiagnosticQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DiagnosticQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DiagnosticQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DiagnosticQuery leftJoinRbacheresult($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbacheresult relation
 * @method DiagnosticQuery rightJoinRbacheresult($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbacheresult relation
 * @method DiagnosticQuery innerJoinRbacheresult($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbacheresult relation
 *
 * @method Diagnostic findOne(PropelPDO $con = null) Return the first Diagnostic matching the query
 * @method Diagnostic findOneOrCreate(PropelPDO $con = null) Return the first Diagnostic matching the query, or a new Diagnostic object populated from the query conditions when no match is found
 *
 * @method Diagnostic findOneByCreatedatetime(string $createDatetime) Return the first Diagnostic filtered by the createDatetime column
 * @method Diagnostic findOneByCreatepersonId(int $createPerson_id) Return the first Diagnostic filtered by the createPerson_id column
 * @method Diagnostic findOneByModifydatetime(string $modifyDatetime) Return the first Diagnostic filtered by the modifyDatetime column
 * @method Diagnostic findOneByModifypersonId(int $modifyPerson_id) Return the first Diagnostic filtered by the modifyPerson_id column
 * @method Diagnostic findOneByDeleted(boolean $deleted) Return the first Diagnostic filtered by the deleted column
 * @method Diagnostic findOneByEventId(int $event_id) Return the first Diagnostic filtered by the event_id column
 * @method Diagnostic findOneByDiagnosisId(int $diagnosis_id) Return the first Diagnostic filtered by the diagnosis_id column
 * @method Diagnostic findOneByDiagnosistypeId(int $diagnosisType_id) Return the first Diagnostic filtered by the diagnosisType_id column
 * @method Diagnostic findOneByCharacterId(int $character_id) Return the first Diagnostic filtered by the character_id column
 * @method Diagnostic findOneByStageId(int $stage_id) Return the first Diagnostic filtered by the stage_id column
 * @method Diagnostic findOneByPhaseId(int $phase_id) Return the first Diagnostic filtered by the phase_id column
 * @method Diagnostic findOneByDispanserId(int $dispanser_id) Return the first Diagnostic filtered by the dispanser_id column
 * @method Diagnostic findOneBySanatorium(boolean $sanatorium) Return the first Diagnostic filtered by the sanatorium column
 * @method Diagnostic findOneByHospital(boolean $hospital) Return the first Diagnostic filtered by the hospital column
 * @method Diagnostic findOneByTraumatypeId(int $traumaType_id) Return the first Diagnostic filtered by the traumaType_id column
 * @method Diagnostic findOneBySpecialityId(int $speciality_id) Return the first Diagnostic filtered by the speciality_id column
 * @method Diagnostic findOneByPersonId(int $person_id) Return the first Diagnostic filtered by the person_id column
 * @method Diagnostic findOneByHealthgroupId(int $healthGroup_id) Return the first Diagnostic filtered by the healthGroup_id column
 * @method Diagnostic findOneByResultId(int $result_id) Return the first Diagnostic filtered by the result_id column
 * @method Diagnostic findOneBySetdate(string $setDate) Return the first Diagnostic filtered by the setDate column
 * @method Diagnostic findOneByEnddate(string $endDate) Return the first Diagnostic filtered by the endDate column
 * @method Diagnostic findOneByNotes(string $notes) Return the first Diagnostic filtered by the notes column
 * @method Diagnostic findOneByRbacheresultId(int $rbAcheResult_id) Return the first Diagnostic filtered by the rbAcheResult_id column
 * @method Diagnostic findOneByVersion(int $version) Return the first Diagnostic filtered by the version column
 * @method Diagnostic findOneByActionId(int $action_id) Return the first Diagnostic filtered by the action_id column
 *
 * @method array findById(int $id) Return Diagnostic objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Diagnostic objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Diagnostic objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Diagnostic objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Diagnostic objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Diagnostic objects filtered by the deleted column
 * @method array findByEventId(int $event_id) Return Diagnostic objects filtered by the event_id column
 * @method array findByDiagnosisId(int $diagnosis_id) Return Diagnostic objects filtered by the diagnosis_id column
 * @method array findByDiagnosistypeId(int $diagnosisType_id) Return Diagnostic objects filtered by the diagnosisType_id column
 * @method array findByCharacterId(int $character_id) Return Diagnostic objects filtered by the character_id column
 * @method array findByStageId(int $stage_id) Return Diagnostic objects filtered by the stage_id column
 * @method array findByPhaseId(int $phase_id) Return Diagnostic objects filtered by the phase_id column
 * @method array findByDispanserId(int $dispanser_id) Return Diagnostic objects filtered by the dispanser_id column
 * @method array findBySanatorium(boolean $sanatorium) Return Diagnostic objects filtered by the sanatorium column
 * @method array findByHospital(boolean $hospital) Return Diagnostic objects filtered by the hospital column
 * @method array findByTraumatypeId(int $traumaType_id) Return Diagnostic objects filtered by the traumaType_id column
 * @method array findBySpecialityId(int $speciality_id) Return Diagnostic objects filtered by the speciality_id column
 * @method array findByPersonId(int $person_id) Return Diagnostic objects filtered by the person_id column
 * @method array findByHealthgroupId(int $healthGroup_id) Return Diagnostic objects filtered by the healthGroup_id column
 * @method array findByResultId(int $result_id) Return Diagnostic objects filtered by the result_id column
 * @method array findBySetdate(string $setDate) Return Diagnostic objects filtered by the setDate column
 * @method array findByEnddate(string $endDate) Return Diagnostic objects filtered by the endDate column
 * @method array findByNotes(string $notes) Return Diagnostic objects filtered by the notes column
 * @method array findByRbacheresultId(int $rbAcheResult_id) Return Diagnostic objects filtered by the rbAcheResult_id column
 * @method array findByVersion(int $version) Return Diagnostic objects filtered by the version column
 * @method array findByActionId(int $action_id) Return Diagnostic objects filtered by the action_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseDiagnosticQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDiagnosticQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Diagnostic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DiagnosticQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DiagnosticQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DiagnosticQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DiagnosticQuery) {
            return $criteria;
        }
        $query = new DiagnosticQuery();
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
     * @return   Diagnostic|Diagnostic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiagnosticPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DiagnosticPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Diagnostic A model object, or null if the key is not found
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
     * @return                 Diagnostic A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `event_id`, `diagnosis_id`, `diagnosisType_id`, `character_id`, `stage_id`, `phase_id`, `dispanser_id`, `sanatorium`, `hospital`, `traumaType_id`, `speciality_id`, `person_id`, `healthGroup_id`, `result_id`, `setDate`, `endDate`, `notes`, `rbAcheResult_id`, `version`, `action_id` FROM `Diagnostic` WHERE `id` = :p0';
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
            $obj = new Diagnostic();
            $obj->hydrate($row);
            DiagnosticPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Diagnostic|Diagnostic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Diagnostic[]|mixed the list of results, formatted by the current formatter
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiagnosticPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiagnosticPeer::ID, $keys, Criteria::IN);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DiagnosticPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DiagnosticPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::ID, $id, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(DiagnosticPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(DiagnosticPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(DiagnosticPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(DiagnosticPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(DiagnosticPeer::DELETED, $deleted, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the diagnosis_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiagnosisId(1234); // WHERE diagnosis_id = 1234
     * $query->filterByDiagnosisId(array(12, 34)); // WHERE diagnosis_id IN (12, 34)
     * $query->filterByDiagnosisId(array('min' => 12)); // WHERE diagnosis_id >= 12
     * $query->filterByDiagnosisId(array('max' => 12)); // WHERE diagnosis_id <= 12
     * </code>
     *
     * @param     mixed $diagnosisId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByDiagnosisId($diagnosisId = null, $comparison = null)
    {
        if (is_array($diagnosisId)) {
            $useMinMax = false;
            if (isset($diagnosisId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::DIAGNOSIS_ID, $diagnosisId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diagnosisId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::DIAGNOSIS_ID, $diagnosisId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::DIAGNOSIS_ID, $diagnosisId, $comparison);
    }

    /**
     * Filter the query on the diagnosisType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiagnosistypeId(1234); // WHERE diagnosisType_id = 1234
     * $query->filterByDiagnosistypeId(array(12, 34)); // WHERE diagnosisType_id IN (12, 34)
     * $query->filterByDiagnosistypeId(array('min' => 12)); // WHERE diagnosisType_id >= 12
     * $query->filterByDiagnosistypeId(array('max' => 12)); // WHERE diagnosisType_id <= 12
     * </code>
     *
     * @param     mixed $diagnosistypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByDiagnosistypeId($diagnosistypeId = null, $comparison = null)
    {
        if (is_array($diagnosistypeId)) {
            $useMinMax = false;
            if (isset($diagnosistypeId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::DIAGNOSISTYPE_ID, $diagnosistypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diagnosistypeId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::DIAGNOSISTYPE_ID, $diagnosistypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::DIAGNOSISTYPE_ID, $diagnosistypeId, $comparison);
    }

    /**
     * Filter the query on the character_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCharacterId(1234); // WHERE character_id = 1234
     * $query->filterByCharacterId(array(12, 34)); // WHERE character_id IN (12, 34)
     * $query->filterByCharacterId(array('min' => 12)); // WHERE character_id >= 12
     * $query->filterByCharacterId(array('max' => 12)); // WHERE character_id <= 12
     * </code>
     *
     * @param     mixed $characterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByCharacterId($characterId = null, $comparison = null)
    {
        if (is_array($characterId)) {
            $useMinMax = false;
            if (isset($characterId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::CHARACTER_ID, $characterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($characterId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::CHARACTER_ID, $characterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::CHARACTER_ID, $characterId, $comparison);
    }

    /**
     * Filter the query on the stage_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStageId(1234); // WHERE stage_id = 1234
     * $query->filterByStageId(array(12, 34)); // WHERE stage_id IN (12, 34)
     * $query->filterByStageId(array('min' => 12)); // WHERE stage_id >= 12
     * $query->filterByStageId(array('max' => 12)); // WHERE stage_id <= 12
     * </code>
     *
     * @param     mixed $stageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByStageId($stageId = null, $comparison = null)
    {
        if (is_array($stageId)) {
            $useMinMax = false;
            if (isset($stageId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::STAGE_ID, $stageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stageId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::STAGE_ID, $stageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::STAGE_ID, $stageId, $comparison);
    }

    /**
     * Filter the query on the phase_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseId(1234); // WHERE phase_id = 1234
     * $query->filterByPhaseId(array(12, 34)); // WHERE phase_id IN (12, 34)
     * $query->filterByPhaseId(array('min' => 12)); // WHERE phase_id >= 12
     * $query->filterByPhaseId(array('max' => 12)); // WHERE phase_id <= 12
     * </code>
     *
     * @param     mixed $phaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::PHASE_ID, $phaseId, $comparison);
    }

    /**
     * Filter the query on the dispanser_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDispanserId(1234); // WHERE dispanser_id = 1234
     * $query->filterByDispanserId(array(12, 34)); // WHERE dispanser_id IN (12, 34)
     * $query->filterByDispanserId(array('min' => 12)); // WHERE dispanser_id >= 12
     * $query->filterByDispanserId(array('max' => 12)); // WHERE dispanser_id <= 12
     * </code>
     *
     * @param     mixed $dispanserId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByDispanserId($dispanserId = null, $comparison = null)
    {
        if (is_array($dispanserId)) {
            $useMinMax = false;
            if (isset($dispanserId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::DISPANSER_ID, $dispanserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dispanserId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::DISPANSER_ID, $dispanserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::DISPANSER_ID, $dispanserId, $comparison);
    }

    /**
     * Filter the query on the sanatorium column
     *
     * Example usage:
     * <code>
     * $query->filterBySanatorium(true); // WHERE sanatorium = true
     * $query->filterBySanatorium('yes'); // WHERE sanatorium = true
     * </code>
     *
     * @param     boolean|string $sanatorium The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterBySanatorium($sanatorium = null, $comparison = null)
    {
        if (is_string($sanatorium)) {
            $sanatorium = in_array(strtolower($sanatorium), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(DiagnosticPeer::SANATORIUM, $sanatorium, $comparison);
    }

    /**
     * Filter the query on the hospital column
     *
     * Example usage:
     * <code>
     * $query->filterByHospital(true); // WHERE hospital = true
     * $query->filterByHospital('yes'); // WHERE hospital = true
     * </code>
     *
     * @param     boolean|string $hospital The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByHospital($hospital = null, $comparison = null)
    {
        if (is_string($hospital)) {
            $hospital = in_array(strtolower($hospital), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(DiagnosticPeer::HOSPITAL, $hospital, $comparison);
    }

    /**
     * Filter the query on the traumaType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTraumatypeId(1234); // WHERE traumaType_id = 1234
     * $query->filterByTraumatypeId(array(12, 34)); // WHERE traumaType_id IN (12, 34)
     * $query->filterByTraumatypeId(array('min' => 12)); // WHERE traumaType_id >= 12
     * $query->filterByTraumatypeId(array('max' => 12)); // WHERE traumaType_id <= 12
     * </code>
     *
     * @param     mixed $traumatypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByTraumatypeId($traumatypeId = null, $comparison = null)
    {
        if (is_array($traumatypeId)) {
            $useMinMax = false;
            if (isset($traumatypeId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::TRAUMATYPE_ID, $traumatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($traumatypeId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::TRAUMATYPE_ID, $traumatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::TRAUMATYPE_ID, $traumatypeId, $comparison);
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
     * @param     mixed $specialityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::SPECIALITY_ID, $specialityId, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the healthGroup_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHealthgroupId(1234); // WHERE healthGroup_id = 1234
     * $query->filterByHealthgroupId(array(12, 34)); // WHERE healthGroup_id IN (12, 34)
     * $query->filterByHealthgroupId(array('min' => 12)); // WHERE healthGroup_id >= 12
     * $query->filterByHealthgroupId(array('max' => 12)); // WHERE healthGroup_id <= 12
     * </code>
     *
     * @param     mixed $healthgroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByHealthgroupId($healthgroupId = null, $comparison = null)
    {
        if (is_array($healthgroupId)) {
            $useMinMax = false;
            if (isset($healthgroupId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::HEALTHGROUP_ID, $healthgroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($healthgroupId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::HEALTHGROUP_ID, $healthgroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::HEALTHGROUP_ID, $healthgroupId, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByResultId($resultId = null, $comparison = null)
    {
        if (is_array($resultId)) {
            $useMinMax = false;
            if (isset($resultId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::RESULT_ID, $resultId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($resultId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::RESULT_ID, $resultId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::RESULT_ID, $resultId, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterBySetdate($setdate = null, $comparison = null)
    {
        if (is_array($setdate)) {
            $useMinMax = false;
            if (isset($setdate['min'])) {
                $this->addUsingAlias(DiagnosticPeer::SETDATE, $setdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setdate['max'])) {
                $this->addUsingAlias(DiagnosticPeer::SETDATE, $setdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::SETDATE, $setdate, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(DiagnosticPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(DiagnosticPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::NOTES, $notes, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByRbacheresultId($rbacheresultId = null, $comparison = null)
    {
        if (is_array($rbacheresultId)) {
            $useMinMax = false;
            if (isset($rbacheresultId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::RBACHERESULT_ID, $rbacheresultId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbacheresultId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::RBACHERESULT_ID, $rbacheresultId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::RBACHERESULT_ID, $rbacheresultId, $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(DiagnosticPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(DiagnosticPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the action_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionId(1234); // WHERE action_id = 1234
     * $query->filterByActionId(array(12, 34)); // WHERE action_id IN (12, 34)
     * $query->filterByActionId(array('min' => 12)); // WHERE action_id >= 12
     * $query->filterByActionId(array('max' => 12)); // WHERE action_id <= 12
     * </code>
     *
     * @param     mixed $actionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(DiagnosticPeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(DiagnosticPeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosticPeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query by a related Rbacheresult object
     *
     * @param   Rbacheresult|PropelObjectCollection $rbacheresult The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DiagnosticQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbacheresult($rbacheresult, $comparison = null)
    {
        if ($rbacheresult instanceof Rbacheresult) {
            return $this
                ->addUsingAlias(DiagnosticPeer::RBACHERESULT_ID, $rbacheresult->getId(), $comparison);
        } elseif ($rbacheresult instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiagnosticPeer::RBACHERESULT_ID, $rbacheresult->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return DiagnosticQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Diagnostic $diagnostic Object to remove from the list of results
     *
     * @return DiagnosticQuery The current query, for fluid interface
     */
    public function prune($diagnostic = null)
    {
        if ($diagnostic) {
            $this->addUsingAlias(DiagnosticPeer::ID, $diagnostic->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
