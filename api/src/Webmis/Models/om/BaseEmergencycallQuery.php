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
use Webmis\Models\Emergencycall;
use Webmis\Models\EmergencycallPeer;
use Webmis\Models\EmergencycallQuery;

/**
 * Base class that represents a query for the 'EmergencyCall' table.
 *
 *
 *
 * @method EmergencycallQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EmergencycallQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method EmergencycallQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method EmergencycallQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method EmergencycallQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method EmergencycallQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EmergencycallQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 * @method EmergencycallQuery orderByNumbercardcall($order = Criteria::ASC) Order by the numberCardCall column
 * @method EmergencycallQuery orderByBrigadeId($order = Criteria::ASC) Order by the brigade_id column
 * @method EmergencycallQuery orderByCausecallId($order = Criteria::ASC) Order by the causeCall_id column
 * @method EmergencycallQuery orderByWhocallonphone($order = Criteria::ASC) Order by the whoCallOnPhone column
 * @method EmergencycallQuery orderByNumberphone($order = Criteria::ASC) Order by the numberPhone column
 * @method EmergencycallQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method EmergencycallQuery orderByPassdate($order = Criteria::ASC) Order by the passDate column
 * @method EmergencycallQuery orderByDeparturedate($order = Criteria::ASC) Order by the departureDate column
 * @method EmergencycallQuery orderByArrivaldate($order = Criteria::ASC) Order by the arrivalDate column
 * @method EmergencycallQuery orderByFinishservicedate($order = Criteria::ASC) Order by the finishServiceDate column
 * @method EmergencycallQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method EmergencycallQuery orderByPlacereceptioncallId($order = Criteria::ASC) Order by the placeReceptionCall_id column
 * @method EmergencycallQuery orderByReceivedcallId($order = Criteria::ASC) Order by the receivedCall_id column
 * @method EmergencycallQuery orderByReasonddelaysId($order = Criteria::ASC) Order by the reasondDelays_id column
 * @method EmergencycallQuery orderByResultcallId($order = Criteria::ASC) Order by the resultCall_id column
 * @method EmergencycallQuery orderByAccidentId($order = Criteria::ASC) Order by the accident_id column
 * @method EmergencycallQuery orderByDeathId($order = Criteria::ASC) Order by the death_id column
 * @method EmergencycallQuery orderByEbrietyId($order = Criteria::ASC) Order by the ebriety_id column
 * @method EmergencycallQuery orderByDiseasedId($order = Criteria::ASC) Order by the diseased_id column
 * @method EmergencycallQuery orderByPlacecallId($order = Criteria::ASC) Order by the placeCall_id column
 * @method EmergencycallQuery orderByMethodtransportId($order = Criteria::ASC) Order by the methodTransport_id column
 * @method EmergencycallQuery orderByTransftransportId($order = Criteria::ASC) Order by the transfTransport_id column
 * @method EmergencycallQuery orderByRenunofhospital($order = Criteria::ASC) Order by the renunOfHospital column
 * @method EmergencycallQuery orderByFacerenunofhospital($order = Criteria::ASC) Order by the faceRenunOfHospital column
 * @method EmergencycallQuery orderByDisease($order = Criteria::ASC) Order by the disease column
 * @method EmergencycallQuery orderByBirth($order = Criteria::ASC) Order by the birth column
 * @method EmergencycallQuery orderByPregnancyfailure($order = Criteria::ASC) Order by the pregnancyFailure column
 * @method EmergencycallQuery orderByNotecall($order = Criteria::ASC) Order by the noteCall column
 *
 * @method EmergencycallQuery groupById() Group by the id column
 * @method EmergencycallQuery groupByCreatedatetime() Group by the createDatetime column
 * @method EmergencycallQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method EmergencycallQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method EmergencycallQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method EmergencycallQuery groupByDeleted() Group by the deleted column
 * @method EmergencycallQuery groupByEventId() Group by the event_id column
 * @method EmergencycallQuery groupByNumbercardcall() Group by the numberCardCall column
 * @method EmergencycallQuery groupByBrigadeId() Group by the brigade_id column
 * @method EmergencycallQuery groupByCausecallId() Group by the causeCall_id column
 * @method EmergencycallQuery groupByWhocallonphone() Group by the whoCallOnPhone column
 * @method EmergencycallQuery groupByNumberphone() Group by the numberPhone column
 * @method EmergencycallQuery groupByBegdate() Group by the begDate column
 * @method EmergencycallQuery groupByPassdate() Group by the passDate column
 * @method EmergencycallQuery groupByDeparturedate() Group by the departureDate column
 * @method EmergencycallQuery groupByArrivaldate() Group by the arrivalDate column
 * @method EmergencycallQuery groupByFinishservicedate() Group by the finishServiceDate column
 * @method EmergencycallQuery groupByEnddate() Group by the endDate column
 * @method EmergencycallQuery groupByPlacereceptioncallId() Group by the placeReceptionCall_id column
 * @method EmergencycallQuery groupByReceivedcallId() Group by the receivedCall_id column
 * @method EmergencycallQuery groupByReasonddelaysId() Group by the reasondDelays_id column
 * @method EmergencycallQuery groupByResultcallId() Group by the resultCall_id column
 * @method EmergencycallQuery groupByAccidentId() Group by the accident_id column
 * @method EmergencycallQuery groupByDeathId() Group by the death_id column
 * @method EmergencycallQuery groupByEbrietyId() Group by the ebriety_id column
 * @method EmergencycallQuery groupByDiseasedId() Group by the diseased_id column
 * @method EmergencycallQuery groupByPlacecallId() Group by the placeCall_id column
 * @method EmergencycallQuery groupByMethodtransportId() Group by the methodTransport_id column
 * @method EmergencycallQuery groupByTransftransportId() Group by the transfTransport_id column
 * @method EmergencycallQuery groupByRenunofhospital() Group by the renunOfHospital column
 * @method EmergencycallQuery groupByFacerenunofhospital() Group by the faceRenunOfHospital column
 * @method EmergencycallQuery groupByDisease() Group by the disease column
 * @method EmergencycallQuery groupByBirth() Group by the birth column
 * @method EmergencycallQuery groupByPregnancyfailure() Group by the pregnancyFailure column
 * @method EmergencycallQuery groupByNotecall() Group by the noteCall column
 *
 * @method EmergencycallQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EmergencycallQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EmergencycallQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Emergencycall findOne(PropelPDO $con = null) Return the first Emergencycall matching the query
 * @method Emergencycall findOneOrCreate(PropelPDO $con = null) Return the first Emergencycall matching the query, or a new Emergencycall object populated from the query conditions when no match is found
 *
 * @method Emergencycall findOneByCreatedatetime(string $createDatetime) Return the first Emergencycall filtered by the createDatetime column
 * @method Emergencycall findOneByCreatepersonId(int $createPerson_id) Return the first Emergencycall filtered by the createPerson_id column
 * @method Emergencycall findOneByModifydatetime(string $modifyDatetime) Return the first Emergencycall filtered by the modifyDatetime column
 * @method Emergencycall findOneByModifypersonId(int $modifyPerson_id) Return the first Emergencycall filtered by the modifyPerson_id column
 * @method Emergencycall findOneByDeleted(boolean $deleted) Return the first Emergencycall filtered by the deleted column
 * @method Emergencycall findOneByEventId(int $event_id) Return the first Emergencycall filtered by the event_id column
 * @method Emergencycall findOneByNumbercardcall(string $numberCardCall) Return the first Emergencycall filtered by the numberCardCall column
 * @method Emergencycall findOneByBrigadeId(int $brigade_id) Return the first Emergencycall filtered by the brigade_id column
 * @method Emergencycall findOneByCausecallId(int $causeCall_id) Return the first Emergencycall filtered by the causeCall_id column
 * @method Emergencycall findOneByWhocallonphone(string $whoCallOnPhone) Return the first Emergencycall filtered by the whoCallOnPhone column
 * @method Emergencycall findOneByNumberphone(string $numberPhone) Return the first Emergencycall filtered by the numberPhone column
 * @method Emergencycall findOneByBegdate(string $begDate) Return the first Emergencycall filtered by the begDate column
 * @method Emergencycall findOneByPassdate(string $passDate) Return the first Emergencycall filtered by the passDate column
 * @method Emergencycall findOneByDeparturedate(string $departureDate) Return the first Emergencycall filtered by the departureDate column
 * @method Emergencycall findOneByArrivaldate(string $arrivalDate) Return the first Emergencycall filtered by the arrivalDate column
 * @method Emergencycall findOneByFinishservicedate(string $finishServiceDate) Return the first Emergencycall filtered by the finishServiceDate column
 * @method Emergencycall findOneByEnddate(string $endDate) Return the first Emergencycall filtered by the endDate column
 * @method Emergencycall findOneByPlacereceptioncallId(int $placeReceptionCall_id) Return the first Emergencycall filtered by the placeReceptionCall_id column
 * @method Emergencycall findOneByReceivedcallId(int $receivedCall_id) Return the first Emergencycall filtered by the receivedCall_id column
 * @method Emergencycall findOneByReasonddelaysId(int $reasondDelays_id) Return the first Emergencycall filtered by the reasondDelays_id column
 * @method Emergencycall findOneByResultcallId(int $resultCall_id) Return the first Emergencycall filtered by the resultCall_id column
 * @method Emergencycall findOneByAccidentId(int $accident_id) Return the first Emergencycall filtered by the accident_id column
 * @method Emergencycall findOneByDeathId(int $death_id) Return the first Emergencycall filtered by the death_id column
 * @method Emergencycall findOneByEbrietyId(int $ebriety_id) Return the first Emergencycall filtered by the ebriety_id column
 * @method Emergencycall findOneByDiseasedId(int $diseased_id) Return the first Emergencycall filtered by the diseased_id column
 * @method Emergencycall findOneByPlacecallId(int $placeCall_id) Return the first Emergencycall filtered by the placeCall_id column
 * @method Emergencycall findOneByMethodtransportId(int $methodTransport_id) Return the first Emergencycall filtered by the methodTransport_id column
 * @method Emergencycall findOneByTransftransportId(int $transfTransport_id) Return the first Emergencycall filtered by the transfTransport_id column
 * @method Emergencycall findOneByRenunofhospital(boolean $renunOfHospital) Return the first Emergencycall filtered by the renunOfHospital column
 * @method Emergencycall findOneByFacerenunofhospital(string $faceRenunOfHospital) Return the first Emergencycall filtered by the faceRenunOfHospital column
 * @method Emergencycall findOneByDisease(boolean $disease) Return the first Emergencycall filtered by the disease column
 * @method Emergencycall findOneByBirth(boolean $birth) Return the first Emergencycall filtered by the birth column
 * @method Emergencycall findOneByPregnancyfailure(boolean $pregnancyFailure) Return the first Emergencycall filtered by the pregnancyFailure column
 * @method Emergencycall findOneByNotecall(string $noteCall) Return the first Emergencycall filtered by the noteCall column
 *
 * @method array findById(int $id) Return Emergencycall objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Emergencycall objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Emergencycall objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Emergencycall objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Emergencycall objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Emergencycall objects filtered by the deleted column
 * @method array findByEventId(int $event_id) Return Emergencycall objects filtered by the event_id column
 * @method array findByNumbercardcall(string $numberCardCall) Return Emergencycall objects filtered by the numberCardCall column
 * @method array findByBrigadeId(int $brigade_id) Return Emergencycall objects filtered by the brigade_id column
 * @method array findByCausecallId(int $causeCall_id) Return Emergencycall objects filtered by the causeCall_id column
 * @method array findByWhocallonphone(string $whoCallOnPhone) Return Emergencycall objects filtered by the whoCallOnPhone column
 * @method array findByNumberphone(string $numberPhone) Return Emergencycall objects filtered by the numberPhone column
 * @method array findByBegdate(string $begDate) Return Emergencycall objects filtered by the begDate column
 * @method array findByPassdate(string $passDate) Return Emergencycall objects filtered by the passDate column
 * @method array findByDeparturedate(string $departureDate) Return Emergencycall objects filtered by the departureDate column
 * @method array findByArrivaldate(string $arrivalDate) Return Emergencycall objects filtered by the arrivalDate column
 * @method array findByFinishservicedate(string $finishServiceDate) Return Emergencycall objects filtered by the finishServiceDate column
 * @method array findByEnddate(string $endDate) Return Emergencycall objects filtered by the endDate column
 * @method array findByPlacereceptioncallId(int $placeReceptionCall_id) Return Emergencycall objects filtered by the placeReceptionCall_id column
 * @method array findByReceivedcallId(int $receivedCall_id) Return Emergencycall objects filtered by the receivedCall_id column
 * @method array findByReasonddelaysId(int $reasondDelays_id) Return Emergencycall objects filtered by the reasondDelays_id column
 * @method array findByResultcallId(int $resultCall_id) Return Emergencycall objects filtered by the resultCall_id column
 * @method array findByAccidentId(int $accident_id) Return Emergencycall objects filtered by the accident_id column
 * @method array findByDeathId(int $death_id) Return Emergencycall objects filtered by the death_id column
 * @method array findByEbrietyId(int $ebriety_id) Return Emergencycall objects filtered by the ebriety_id column
 * @method array findByDiseasedId(int $diseased_id) Return Emergencycall objects filtered by the diseased_id column
 * @method array findByPlacecallId(int $placeCall_id) Return Emergencycall objects filtered by the placeCall_id column
 * @method array findByMethodtransportId(int $methodTransport_id) Return Emergencycall objects filtered by the methodTransport_id column
 * @method array findByTransftransportId(int $transfTransport_id) Return Emergencycall objects filtered by the transfTransport_id column
 * @method array findByRenunofhospital(boolean $renunOfHospital) Return Emergencycall objects filtered by the renunOfHospital column
 * @method array findByFacerenunofhospital(string $faceRenunOfHospital) Return Emergencycall objects filtered by the faceRenunOfHospital column
 * @method array findByDisease(boolean $disease) Return Emergencycall objects filtered by the disease column
 * @method array findByBirth(boolean $birth) Return Emergencycall objects filtered by the birth column
 * @method array findByPregnancyfailure(boolean $pregnancyFailure) Return Emergencycall objects filtered by the pregnancyFailure column
 * @method array findByNotecall(string $noteCall) Return Emergencycall objects filtered by the noteCall column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEmergencycallQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEmergencycallQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Emergencycall', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EmergencycallQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EmergencycallQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EmergencycallQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EmergencycallQuery) {
            return $criteria;
        }
        $query = new EmergencycallQuery();
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
     * @return   Emergencycall|Emergencycall[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EmergencycallPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EmergencycallPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Emergencycall A model object, or null if the key is not found
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
     * @return                 Emergencycall A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `event_id`, `numberCardCall`, `brigade_id`, `causeCall_id`, `whoCallOnPhone`, `numberPhone`, `begDate`, `passDate`, `departureDate`, `arrivalDate`, `finishServiceDate`, `endDate`, `placeReceptionCall_id`, `receivedCall_id`, `reasondDelays_id`, `resultCall_id`, `accident_id`, `death_id`, `ebriety_id`, `diseased_id`, `placeCall_id`, `methodTransport_id`, `transfTransport_id`, `renunOfHospital`, `faceRenunOfHospital`, `disease`, `birth`, `pregnancyFailure`, `noteCall` FROM `EmergencyCall` WHERE `id` = :p0';
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
            $obj = new Emergencycall();
            $obj->hydrate($row);
            EmergencycallPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Emergencycall|Emergencycall[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Emergencycall[]|mixed the list of results, formatted by the current formatter
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EmergencycallPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EmergencycallPeer::ID, $keys, Criteria::IN);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EmergencycallPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EmergencycallPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::ID, $id, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(EmergencycallPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(EmergencycallPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(EmergencycallPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(EmergencycallPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmergencycallPeer::DELETED, $deleted, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Filter the query on the numberCardCall column
     *
     * Example usage:
     * <code>
     * $query->filterByNumbercardcall('fooValue');   // WHERE numberCardCall = 'fooValue'
     * $query->filterByNumbercardcall('%fooValue%'); // WHERE numberCardCall LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numbercardcall The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByNumbercardcall($numbercardcall = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numbercardcall)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numbercardcall)) {
                $numbercardcall = str_replace('*', '%', $numbercardcall);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::NUMBERCARDCALL, $numbercardcall, $comparison);
    }

    /**
     * Filter the query on the brigade_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBrigadeId(1234); // WHERE brigade_id = 1234
     * $query->filterByBrigadeId(array(12, 34)); // WHERE brigade_id IN (12, 34)
     * $query->filterByBrigadeId(array('min' => 12)); // WHERE brigade_id >= 12
     * $query->filterByBrigadeId(array('max' => 12)); // WHERE brigade_id <= 12
     * </code>
     *
     * @param     mixed $brigadeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByBrigadeId($brigadeId = null, $comparison = null)
    {
        if (is_array($brigadeId)) {
            $useMinMax = false;
            if (isset($brigadeId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::BRIGADE_ID, $brigadeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($brigadeId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::BRIGADE_ID, $brigadeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::BRIGADE_ID, $brigadeId, $comparison);
    }

    /**
     * Filter the query on the causeCall_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCausecallId(1234); // WHERE causeCall_id = 1234
     * $query->filterByCausecallId(array(12, 34)); // WHERE causeCall_id IN (12, 34)
     * $query->filterByCausecallId(array('min' => 12)); // WHERE causeCall_id >= 12
     * $query->filterByCausecallId(array('max' => 12)); // WHERE causeCall_id <= 12
     * </code>
     *
     * @param     mixed $causecallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByCausecallId($causecallId = null, $comparison = null)
    {
        if (is_array($causecallId)) {
            $useMinMax = false;
            if (isset($causecallId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::CAUSECALL_ID, $causecallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($causecallId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::CAUSECALL_ID, $causecallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::CAUSECALL_ID, $causecallId, $comparison);
    }

    /**
     * Filter the query on the whoCallOnPhone column
     *
     * Example usage:
     * <code>
     * $query->filterByWhocallonphone('fooValue');   // WHERE whoCallOnPhone = 'fooValue'
     * $query->filterByWhocallonphone('%fooValue%'); // WHERE whoCallOnPhone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whocallonphone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByWhocallonphone($whocallonphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whocallonphone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $whocallonphone)) {
                $whocallonphone = str_replace('*', '%', $whocallonphone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::WHOCALLONPHONE, $whocallonphone, $comparison);
    }

    /**
     * Filter the query on the numberPhone column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberphone('fooValue');   // WHERE numberPhone = 'fooValue'
     * $query->filterByNumberphone('%fooValue%'); // WHERE numberPhone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numberphone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByNumberphone($numberphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numberphone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numberphone)) {
                $numberphone = str_replace('*', '%', $numberphone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::NUMBERPHONE, $numberphone, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(EmergencycallPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(EmergencycallPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::BEGDATE, $begdate, $comparison);
    }

    /**
     * Filter the query on the passDate column
     *
     * Example usage:
     * <code>
     * $query->filterByPassdate('2011-03-14'); // WHERE passDate = '2011-03-14'
     * $query->filterByPassdate('now'); // WHERE passDate = '2011-03-14'
     * $query->filterByPassdate(array('max' => 'yesterday')); // WHERE passDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $passdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByPassdate($passdate = null, $comparison = null)
    {
        if (is_array($passdate)) {
            $useMinMax = false;
            if (isset($passdate['min'])) {
                $this->addUsingAlias(EmergencycallPeer::PASSDATE, $passdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($passdate['max'])) {
                $this->addUsingAlias(EmergencycallPeer::PASSDATE, $passdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::PASSDATE, $passdate, $comparison);
    }

    /**
     * Filter the query on the departureDate column
     *
     * Example usage:
     * <code>
     * $query->filterByDeparturedate('2011-03-14'); // WHERE departureDate = '2011-03-14'
     * $query->filterByDeparturedate('now'); // WHERE departureDate = '2011-03-14'
     * $query->filterByDeparturedate(array('max' => 'yesterday')); // WHERE departureDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $departuredate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByDeparturedate($departuredate = null, $comparison = null)
    {
        if (is_array($departuredate)) {
            $useMinMax = false;
            if (isset($departuredate['min'])) {
                $this->addUsingAlias(EmergencycallPeer::DEPARTUREDATE, $departuredate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($departuredate['max'])) {
                $this->addUsingAlias(EmergencycallPeer::DEPARTUREDATE, $departuredate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::DEPARTUREDATE, $departuredate, $comparison);
    }

    /**
     * Filter the query on the arrivalDate column
     *
     * Example usage:
     * <code>
     * $query->filterByArrivaldate('2011-03-14'); // WHERE arrivalDate = '2011-03-14'
     * $query->filterByArrivaldate('now'); // WHERE arrivalDate = '2011-03-14'
     * $query->filterByArrivaldate(array('max' => 'yesterday')); // WHERE arrivalDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $arrivaldate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByArrivaldate($arrivaldate = null, $comparison = null)
    {
        if (is_array($arrivaldate)) {
            $useMinMax = false;
            if (isset($arrivaldate['min'])) {
                $this->addUsingAlias(EmergencycallPeer::ARRIVALDATE, $arrivaldate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($arrivaldate['max'])) {
                $this->addUsingAlias(EmergencycallPeer::ARRIVALDATE, $arrivaldate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::ARRIVALDATE, $arrivaldate, $comparison);
    }

    /**
     * Filter the query on the finishServiceDate column
     *
     * Example usage:
     * <code>
     * $query->filterByFinishservicedate('2011-03-14'); // WHERE finishServiceDate = '2011-03-14'
     * $query->filterByFinishservicedate('now'); // WHERE finishServiceDate = '2011-03-14'
     * $query->filterByFinishservicedate(array('max' => 'yesterday')); // WHERE finishServiceDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $finishservicedate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByFinishservicedate($finishservicedate = null, $comparison = null)
    {
        if (is_array($finishservicedate)) {
            $useMinMax = false;
            if (isset($finishservicedate['min'])) {
                $this->addUsingAlias(EmergencycallPeer::FINISHSERVICEDATE, $finishservicedate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($finishservicedate['max'])) {
                $this->addUsingAlias(EmergencycallPeer::FINISHSERVICEDATE, $finishservicedate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::FINISHSERVICEDATE, $finishservicedate, $comparison);
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
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(EmergencycallPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(EmergencycallPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the placeReceptionCall_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPlacereceptioncallId(1234); // WHERE placeReceptionCall_id = 1234
     * $query->filterByPlacereceptioncallId(array(12, 34)); // WHERE placeReceptionCall_id IN (12, 34)
     * $query->filterByPlacereceptioncallId(array('min' => 12)); // WHERE placeReceptionCall_id >= 12
     * $query->filterByPlacereceptioncallId(array('max' => 12)); // WHERE placeReceptionCall_id <= 12
     * </code>
     *
     * @param     mixed $placereceptioncallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByPlacereceptioncallId($placereceptioncallId = null, $comparison = null)
    {
        if (is_array($placereceptioncallId)) {
            $useMinMax = false;
            if (isset($placereceptioncallId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::PLACERECEPTIONCALL_ID, $placereceptioncallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($placereceptioncallId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::PLACERECEPTIONCALL_ID, $placereceptioncallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::PLACERECEPTIONCALL_ID, $placereceptioncallId, $comparison);
    }

    /**
     * Filter the query on the receivedCall_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReceivedcallId(1234); // WHERE receivedCall_id = 1234
     * $query->filterByReceivedcallId(array(12, 34)); // WHERE receivedCall_id IN (12, 34)
     * $query->filterByReceivedcallId(array('min' => 12)); // WHERE receivedCall_id >= 12
     * $query->filterByReceivedcallId(array('max' => 12)); // WHERE receivedCall_id <= 12
     * </code>
     *
     * @param     mixed $receivedcallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByReceivedcallId($receivedcallId = null, $comparison = null)
    {
        if (is_array($receivedcallId)) {
            $useMinMax = false;
            if (isset($receivedcallId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::RECEIVEDCALL_ID, $receivedcallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receivedcallId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::RECEIVEDCALL_ID, $receivedcallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::RECEIVEDCALL_ID, $receivedcallId, $comparison);
    }

    /**
     * Filter the query on the reasondDelays_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReasonddelaysId(1234); // WHERE reasondDelays_id = 1234
     * $query->filterByReasonddelaysId(array(12, 34)); // WHERE reasondDelays_id IN (12, 34)
     * $query->filterByReasonddelaysId(array('min' => 12)); // WHERE reasondDelays_id >= 12
     * $query->filterByReasonddelaysId(array('max' => 12)); // WHERE reasondDelays_id <= 12
     * </code>
     *
     * @param     mixed $reasonddelaysId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByReasonddelaysId($reasonddelaysId = null, $comparison = null)
    {
        if (is_array($reasonddelaysId)) {
            $useMinMax = false;
            if (isset($reasonddelaysId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::REASONDDELAYS_ID, $reasonddelaysId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reasonddelaysId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::REASONDDELAYS_ID, $reasonddelaysId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::REASONDDELAYS_ID, $reasonddelaysId, $comparison);
    }

    /**
     * Filter the query on the resultCall_id column
     *
     * Example usage:
     * <code>
     * $query->filterByResultcallId(1234); // WHERE resultCall_id = 1234
     * $query->filterByResultcallId(array(12, 34)); // WHERE resultCall_id IN (12, 34)
     * $query->filterByResultcallId(array('min' => 12)); // WHERE resultCall_id >= 12
     * $query->filterByResultcallId(array('max' => 12)); // WHERE resultCall_id <= 12
     * </code>
     *
     * @param     mixed $resultcallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByResultcallId($resultcallId = null, $comparison = null)
    {
        if (is_array($resultcallId)) {
            $useMinMax = false;
            if (isset($resultcallId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::RESULTCALL_ID, $resultcallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($resultcallId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::RESULTCALL_ID, $resultcallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::RESULTCALL_ID, $resultcallId, $comparison);
    }

    /**
     * Filter the query on the accident_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAccidentId(1234); // WHERE accident_id = 1234
     * $query->filterByAccidentId(array(12, 34)); // WHERE accident_id IN (12, 34)
     * $query->filterByAccidentId(array('min' => 12)); // WHERE accident_id >= 12
     * $query->filterByAccidentId(array('max' => 12)); // WHERE accident_id <= 12
     * </code>
     *
     * @param     mixed $accidentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByAccidentId($accidentId = null, $comparison = null)
    {
        if (is_array($accidentId)) {
            $useMinMax = false;
            if (isset($accidentId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::ACCIDENT_ID, $accidentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accidentId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::ACCIDENT_ID, $accidentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::ACCIDENT_ID, $accidentId, $comparison);
    }

    /**
     * Filter the query on the death_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDeathId(1234); // WHERE death_id = 1234
     * $query->filterByDeathId(array(12, 34)); // WHERE death_id IN (12, 34)
     * $query->filterByDeathId(array('min' => 12)); // WHERE death_id >= 12
     * $query->filterByDeathId(array('max' => 12)); // WHERE death_id <= 12
     * </code>
     *
     * @param     mixed $deathId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByDeathId($deathId = null, $comparison = null)
    {
        if (is_array($deathId)) {
            $useMinMax = false;
            if (isset($deathId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::DEATH_ID, $deathId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deathId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::DEATH_ID, $deathId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::DEATH_ID, $deathId, $comparison);
    }

    /**
     * Filter the query on the ebriety_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEbrietyId(1234); // WHERE ebriety_id = 1234
     * $query->filterByEbrietyId(array(12, 34)); // WHERE ebriety_id IN (12, 34)
     * $query->filterByEbrietyId(array('min' => 12)); // WHERE ebriety_id >= 12
     * $query->filterByEbrietyId(array('max' => 12)); // WHERE ebriety_id <= 12
     * </code>
     *
     * @param     mixed $ebrietyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByEbrietyId($ebrietyId = null, $comparison = null)
    {
        if (is_array($ebrietyId)) {
            $useMinMax = false;
            if (isset($ebrietyId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::EBRIETY_ID, $ebrietyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ebrietyId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::EBRIETY_ID, $ebrietyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::EBRIETY_ID, $ebrietyId, $comparison);
    }

    /**
     * Filter the query on the diseased_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiseasedId(1234); // WHERE diseased_id = 1234
     * $query->filterByDiseasedId(array(12, 34)); // WHERE diseased_id IN (12, 34)
     * $query->filterByDiseasedId(array('min' => 12)); // WHERE diseased_id >= 12
     * $query->filterByDiseasedId(array('max' => 12)); // WHERE diseased_id <= 12
     * </code>
     *
     * @param     mixed $diseasedId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByDiseasedId($diseasedId = null, $comparison = null)
    {
        if (is_array($diseasedId)) {
            $useMinMax = false;
            if (isset($diseasedId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::DISEASED_ID, $diseasedId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diseasedId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::DISEASED_ID, $diseasedId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::DISEASED_ID, $diseasedId, $comparison);
    }

    /**
     * Filter the query on the placeCall_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPlacecallId(1234); // WHERE placeCall_id = 1234
     * $query->filterByPlacecallId(array(12, 34)); // WHERE placeCall_id IN (12, 34)
     * $query->filterByPlacecallId(array('min' => 12)); // WHERE placeCall_id >= 12
     * $query->filterByPlacecallId(array('max' => 12)); // WHERE placeCall_id <= 12
     * </code>
     *
     * @param     mixed $placecallId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByPlacecallId($placecallId = null, $comparison = null)
    {
        if (is_array($placecallId)) {
            $useMinMax = false;
            if (isset($placecallId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::PLACECALL_ID, $placecallId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($placecallId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::PLACECALL_ID, $placecallId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::PLACECALL_ID, $placecallId, $comparison);
    }

    /**
     * Filter the query on the methodTransport_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMethodtransportId(1234); // WHERE methodTransport_id = 1234
     * $query->filterByMethodtransportId(array(12, 34)); // WHERE methodTransport_id IN (12, 34)
     * $query->filterByMethodtransportId(array('min' => 12)); // WHERE methodTransport_id >= 12
     * $query->filterByMethodtransportId(array('max' => 12)); // WHERE methodTransport_id <= 12
     * </code>
     *
     * @param     mixed $methodtransportId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByMethodtransportId($methodtransportId = null, $comparison = null)
    {
        if (is_array($methodtransportId)) {
            $useMinMax = false;
            if (isset($methodtransportId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::METHODTRANSPORT_ID, $methodtransportId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($methodtransportId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::METHODTRANSPORT_ID, $methodtransportId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::METHODTRANSPORT_ID, $methodtransportId, $comparison);
    }

    /**
     * Filter the query on the transfTransport_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTransftransportId(1234); // WHERE transfTransport_id = 1234
     * $query->filterByTransftransportId(array(12, 34)); // WHERE transfTransport_id IN (12, 34)
     * $query->filterByTransftransportId(array('min' => 12)); // WHERE transfTransport_id >= 12
     * $query->filterByTransftransportId(array('max' => 12)); // WHERE transfTransport_id <= 12
     * </code>
     *
     * @param     mixed $transftransportId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByTransftransportId($transftransportId = null, $comparison = null)
    {
        if (is_array($transftransportId)) {
            $useMinMax = false;
            if (isset($transftransportId['min'])) {
                $this->addUsingAlias(EmergencycallPeer::TRANSFTRANSPORT_ID, $transftransportId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transftransportId['max'])) {
                $this->addUsingAlias(EmergencycallPeer::TRANSFTRANSPORT_ID, $transftransportId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::TRANSFTRANSPORT_ID, $transftransportId, $comparison);
    }

    /**
     * Filter the query on the renunOfHospital column
     *
     * Example usage:
     * <code>
     * $query->filterByRenunofhospital(true); // WHERE renunOfHospital = true
     * $query->filterByRenunofhospital('yes'); // WHERE renunOfHospital = true
     * </code>
     *
     * @param     boolean|string $renunofhospital The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByRenunofhospital($renunofhospital = null, $comparison = null)
    {
        if (is_string($renunofhospital)) {
            $renunofhospital = in_array(strtolower($renunofhospital), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmergencycallPeer::RENUNOFHOSPITAL, $renunofhospital, $comparison);
    }

    /**
     * Filter the query on the faceRenunOfHospital column
     *
     * Example usage:
     * <code>
     * $query->filterByFacerenunofhospital('fooValue');   // WHERE faceRenunOfHospital = 'fooValue'
     * $query->filterByFacerenunofhospital('%fooValue%'); // WHERE faceRenunOfHospital LIKE '%fooValue%'
     * </code>
     *
     * @param     string $facerenunofhospital The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByFacerenunofhospital($facerenunofhospital = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($facerenunofhospital)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $facerenunofhospital)) {
                $facerenunofhospital = str_replace('*', '%', $facerenunofhospital);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::FACERENUNOFHOSPITAL, $facerenunofhospital, $comparison);
    }

    /**
     * Filter the query on the disease column
     *
     * Example usage:
     * <code>
     * $query->filterByDisease(true); // WHERE disease = true
     * $query->filterByDisease('yes'); // WHERE disease = true
     * </code>
     *
     * @param     boolean|string $disease The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByDisease($disease = null, $comparison = null)
    {
        if (is_string($disease)) {
            $disease = in_array(strtolower($disease), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmergencycallPeer::DISEASE, $disease, $comparison);
    }

    /**
     * Filter the query on the birth column
     *
     * Example usage:
     * <code>
     * $query->filterByBirth(true); // WHERE birth = true
     * $query->filterByBirth('yes'); // WHERE birth = true
     * </code>
     *
     * @param     boolean|string $birth The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByBirth($birth = null, $comparison = null)
    {
        if (is_string($birth)) {
            $birth = in_array(strtolower($birth), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmergencycallPeer::BIRTH, $birth, $comparison);
    }

    /**
     * Filter the query on the pregnancyFailure column
     *
     * Example usage:
     * <code>
     * $query->filterByPregnancyfailure(true); // WHERE pregnancyFailure = true
     * $query->filterByPregnancyfailure('yes'); // WHERE pregnancyFailure = true
     * </code>
     *
     * @param     boolean|string $pregnancyfailure The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByPregnancyfailure($pregnancyfailure = null, $comparison = null)
    {
        if (is_string($pregnancyfailure)) {
            $pregnancyfailure = in_array(strtolower($pregnancyfailure), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EmergencycallPeer::PREGNANCYFAILURE, $pregnancyfailure, $comparison);
    }

    /**
     * Filter the query on the noteCall column
     *
     * Example usage:
     * <code>
     * $query->filterByNotecall('fooValue');   // WHERE noteCall = 'fooValue'
     * $query->filterByNotecall('%fooValue%'); // WHERE noteCall LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notecall The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function filterByNotecall($notecall = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notecall)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notecall)) {
                $notecall = str_replace('*', '%', $notecall);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EmergencycallPeer::NOTECALL, $notecall, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Emergencycall $emergencycall Object to remove from the list of results
     *
     * @return EmergencycallQuery The current query, for fluid interface
     */
    public function prune($emergencycall = null)
    {
        if ($emergencycall) {
            $this->addUsingAlias(EmergencycallPeer::ID, $emergencycall->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
