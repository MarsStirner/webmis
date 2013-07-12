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
use Webmis\Models\Tempinvalid;
use Webmis\Models\TempinvalidPeer;
use Webmis\Models\TempinvalidQuery;

/**
 * Base class that represents a query for the 'TempInvalid' table.
 *
 *
 *
 * @method TempinvalidQuery orderById($order = Criteria::ASC) Order by the id column
 * @method TempinvalidQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method TempinvalidQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method TempinvalidQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method TempinvalidQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method TempinvalidQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method TempinvalidQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method TempinvalidQuery orderByDoctype($order = Criteria::ASC) Order by the doctype column
 * @method TempinvalidQuery orderByDoctypeId($order = Criteria::ASC) Order by the doctype_id column
 * @method TempinvalidQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method TempinvalidQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method TempinvalidQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method TempinvalidQuery orderByTempinvalidreasonId($order = Criteria::ASC) Order by the tempInvalidReason_id column
 * @method TempinvalidQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method TempinvalidQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method TempinvalidQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method TempinvalidQuery orderByDiagnosisId($order = Criteria::ASC) Order by the diagnosis_id column
 * @method TempinvalidQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method TempinvalidQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method TempinvalidQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method TempinvalidQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method TempinvalidQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method TempinvalidQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method TempinvalidQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method TempinvalidQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method TempinvalidQuery orderByClosed($order = Criteria::ASC) Order by the closed column
 * @method TempinvalidQuery orderByPrevId($order = Criteria::ASC) Order by the prev_id column
 * @method TempinvalidQuery orderByInsuranceofficemark($order = Criteria::ASC) Order by the insuranceOfficeMark column
 * @method TempinvalidQuery orderByCasebegdate($order = Criteria::ASC) Order by the caseBegDate column
 * @method TempinvalidQuery orderByEventId($order = Criteria::ASC) Order by the event_id column
 *
 * @method TempinvalidQuery groupById() Group by the id column
 * @method TempinvalidQuery groupByCreatedatetime() Group by the createDatetime column
 * @method TempinvalidQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method TempinvalidQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method TempinvalidQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method TempinvalidQuery groupByDeleted() Group by the deleted column
 * @method TempinvalidQuery groupByType() Group by the type column
 * @method TempinvalidQuery groupByDoctype() Group by the doctype column
 * @method TempinvalidQuery groupByDoctypeId() Group by the doctype_id column
 * @method TempinvalidQuery groupBySerial() Group by the serial column
 * @method TempinvalidQuery groupByNumber() Group by the number column
 * @method TempinvalidQuery groupByClientId() Group by the client_id column
 * @method TempinvalidQuery groupByTempinvalidreasonId() Group by the tempInvalidReason_id column
 * @method TempinvalidQuery groupByBegdate() Group by the begDate column
 * @method TempinvalidQuery groupByEnddate() Group by the endDate column
 * @method TempinvalidQuery groupByPersonId() Group by the person_id column
 * @method TempinvalidQuery groupByDiagnosisId() Group by the diagnosis_id column
 * @method TempinvalidQuery groupBySex() Group by the sex column
 * @method TempinvalidQuery groupByAge() Group by the age column
 * @method TempinvalidQuery groupByAgeBu() Group by the age_bu column
 * @method TempinvalidQuery groupByAgeBc() Group by the age_bc column
 * @method TempinvalidQuery groupByAgeEu() Group by the age_eu column
 * @method TempinvalidQuery groupByAgeEc() Group by the age_ec column
 * @method TempinvalidQuery groupByNotes() Group by the notes column
 * @method TempinvalidQuery groupByDuration() Group by the duration column
 * @method TempinvalidQuery groupByClosed() Group by the closed column
 * @method TempinvalidQuery groupByPrevId() Group by the prev_id column
 * @method TempinvalidQuery groupByInsuranceofficemark() Group by the insuranceOfficeMark column
 * @method TempinvalidQuery groupByCasebegdate() Group by the caseBegDate column
 * @method TempinvalidQuery groupByEventId() Group by the event_id column
 *
 * @method TempinvalidQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TempinvalidQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TempinvalidQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Tempinvalid findOne(PropelPDO $con = null) Return the first Tempinvalid matching the query
 * @method Tempinvalid findOneOrCreate(PropelPDO $con = null) Return the first Tempinvalid matching the query, or a new Tempinvalid object populated from the query conditions when no match is found
 *
 * @method Tempinvalid findOneByCreatedatetime(string $createDatetime) Return the first Tempinvalid filtered by the createDatetime column
 * @method Tempinvalid findOneByCreatepersonId(int $createPerson_id) Return the first Tempinvalid filtered by the createPerson_id column
 * @method Tempinvalid findOneByModifydatetime(string $modifyDatetime) Return the first Tempinvalid filtered by the modifyDatetime column
 * @method Tempinvalid findOneByModifypersonId(int $modifyPerson_id) Return the first Tempinvalid filtered by the modifyPerson_id column
 * @method Tempinvalid findOneByDeleted(boolean $deleted) Return the first Tempinvalid filtered by the deleted column
 * @method Tempinvalid findOneByType(int $type) Return the first Tempinvalid filtered by the type column
 * @method Tempinvalid findOneByDoctype(int $doctype) Return the first Tempinvalid filtered by the doctype column
 * @method Tempinvalid findOneByDoctypeId(int $doctype_id) Return the first Tempinvalid filtered by the doctype_id column
 * @method Tempinvalid findOneBySerial(string $serial) Return the first Tempinvalid filtered by the serial column
 * @method Tempinvalid findOneByNumber(string $number) Return the first Tempinvalid filtered by the number column
 * @method Tempinvalid findOneByClientId(int $client_id) Return the first Tempinvalid filtered by the client_id column
 * @method Tempinvalid findOneByTempinvalidreasonId(int $tempInvalidReason_id) Return the first Tempinvalid filtered by the tempInvalidReason_id column
 * @method Tempinvalid findOneByBegdate(string $begDate) Return the first Tempinvalid filtered by the begDate column
 * @method Tempinvalid findOneByEnddate(string $endDate) Return the first Tempinvalid filtered by the endDate column
 * @method Tempinvalid findOneByPersonId(int $person_id) Return the first Tempinvalid filtered by the person_id column
 * @method Tempinvalid findOneByDiagnosisId(int $diagnosis_id) Return the first Tempinvalid filtered by the diagnosis_id column
 * @method Tempinvalid findOneBySex(boolean $sex) Return the first Tempinvalid filtered by the sex column
 * @method Tempinvalid findOneByAge(int $age) Return the first Tempinvalid filtered by the age column
 * @method Tempinvalid findOneByAgeBu(int $age_bu) Return the first Tempinvalid filtered by the age_bu column
 * @method Tempinvalid findOneByAgeBc(int $age_bc) Return the first Tempinvalid filtered by the age_bc column
 * @method Tempinvalid findOneByAgeEu(int $age_eu) Return the first Tempinvalid filtered by the age_eu column
 * @method Tempinvalid findOneByAgeEc(int $age_ec) Return the first Tempinvalid filtered by the age_ec column
 * @method Tempinvalid findOneByNotes(string $notes) Return the first Tempinvalid filtered by the notes column
 * @method Tempinvalid findOneByDuration(int $duration) Return the first Tempinvalid filtered by the duration column
 * @method Tempinvalid findOneByClosed(boolean $closed) Return the first Tempinvalid filtered by the closed column
 * @method Tempinvalid findOneByPrevId(int $prev_id) Return the first Tempinvalid filtered by the prev_id column
 * @method Tempinvalid findOneByInsuranceofficemark(int $insuranceOfficeMark) Return the first Tempinvalid filtered by the insuranceOfficeMark column
 * @method Tempinvalid findOneByCasebegdate(string $caseBegDate) Return the first Tempinvalid filtered by the caseBegDate column
 * @method Tempinvalid findOneByEventId(int $event_id) Return the first Tempinvalid filtered by the event_id column
 *
 * @method array findById(int $id) Return Tempinvalid objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Tempinvalid objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Tempinvalid objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Tempinvalid objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Tempinvalid objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Tempinvalid objects filtered by the deleted column
 * @method array findByType(int $type) Return Tempinvalid objects filtered by the type column
 * @method array findByDoctype(int $doctype) Return Tempinvalid objects filtered by the doctype column
 * @method array findByDoctypeId(int $doctype_id) Return Tempinvalid objects filtered by the doctype_id column
 * @method array findBySerial(string $serial) Return Tempinvalid objects filtered by the serial column
 * @method array findByNumber(string $number) Return Tempinvalid objects filtered by the number column
 * @method array findByClientId(int $client_id) Return Tempinvalid objects filtered by the client_id column
 * @method array findByTempinvalidreasonId(int $tempInvalidReason_id) Return Tempinvalid objects filtered by the tempInvalidReason_id column
 * @method array findByBegdate(string $begDate) Return Tempinvalid objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Tempinvalid objects filtered by the endDate column
 * @method array findByPersonId(int $person_id) Return Tempinvalid objects filtered by the person_id column
 * @method array findByDiagnosisId(int $diagnosis_id) Return Tempinvalid objects filtered by the diagnosis_id column
 * @method array findBySex(boolean $sex) Return Tempinvalid objects filtered by the sex column
 * @method array findByAge(int $age) Return Tempinvalid objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return Tempinvalid objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return Tempinvalid objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return Tempinvalid objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return Tempinvalid objects filtered by the age_ec column
 * @method array findByNotes(string $notes) Return Tempinvalid objects filtered by the notes column
 * @method array findByDuration(int $duration) Return Tempinvalid objects filtered by the duration column
 * @method array findByClosed(boolean $closed) Return Tempinvalid objects filtered by the closed column
 * @method array findByPrevId(int $prev_id) Return Tempinvalid objects filtered by the prev_id column
 * @method array findByInsuranceofficemark(int $insuranceOfficeMark) Return Tempinvalid objects filtered by the insuranceOfficeMark column
 * @method array findByCasebegdate(string $caseBegDate) Return Tempinvalid objects filtered by the caseBegDate column
 * @method array findByEventId(int $event_id) Return Tempinvalid objects filtered by the event_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseTempinvalidQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTempinvalidQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Tempinvalid', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TempinvalidQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TempinvalidQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TempinvalidQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TempinvalidQuery) {
            return $criteria;
        }
        $query = new TempinvalidQuery();
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
     * @return   Tempinvalid|Tempinvalid[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TempinvalidPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TempinvalidPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tempinvalid A model object, or null if the key is not found
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
     * @return                 Tempinvalid A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `type`, `doctype`, `doctype_id`, `serial`, `number`, `client_id`, `tempInvalidReason_id`, `begDate`, `endDate`, `person_id`, `diagnosis_id`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `notes`, `duration`, `closed`, `prev_id`, `insuranceOfficeMark`, `caseBegDate`, `event_id` FROM `TempInvalid` WHERE `id` = :p0';
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
            $obj = new Tempinvalid();
            $obj->hydrate($row);
            TempinvalidPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tempinvalid|Tempinvalid[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tempinvalid[]|mixed the list of results, formatted by the current formatter
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TempinvalidPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TempinvalidPeer::ID, $keys, Criteria::IN);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TempinvalidPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TempinvalidPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::ID, $id, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(TempinvalidPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(TempinvalidPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(TempinvalidPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(TempinvalidPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TempinvalidPeer::DELETED, $deleted, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(TempinvalidPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(TempinvalidPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the doctype column
     *
     * Example usage:
     * <code>
     * $query->filterByDoctype(1234); // WHERE doctype = 1234
     * $query->filterByDoctype(array(12, 34)); // WHERE doctype IN (12, 34)
     * $query->filterByDoctype(array('min' => 12)); // WHERE doctype >= 12
     * $query->filterByDoctype(array('max' => 12)); // WHERE doctype <= 12
     * </code>
     *
     * @param     mixed $doctype The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByDoctype($doctype = null, $comparison = null)
    {
        if (is_array($doctype)) {
            $useMinMax = false;
            if (isset($doctype['min'])) {
                $this->addUsingAlias(TempinvalidPeer::DOCTYPE, $doctype['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doctype['max'])) {
                $this->addUsingAlias(TempinvalidPeer::DOCTYPE, $doctype['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::DOCTYPE, $doctype, $comparison);
    }

    /**
     * Filter the query on the doctype_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDoctypeId(1234); // WHERE doctype_id = 1234
     * $query->filterByDoctypeId(array(12, 34)); // WHERE doctype_id IN (12, 34)
     * $query->filterByDoctypeId(array('min' => 12)); // WHERE doctype_id >= 12
     * $query->filterByDoctypeId(array('max' => 12)); // WHERE doctype_id <= 12
     * </code>
     *
     * @param     mixed $doctypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByDoctypeId($doctypeId = null, $comparison = null)
    {
        if (is_array($doctypeId)) {
            $useMinMax = false;
            if (isset($doctypeId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::DOCTYPE_ID, $doctypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doctypeId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::DOCTYPE_ID, $doctypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::DOCTYPE_ID, $doctypeId, $comparison);
    }

    /**
     * Filter the query on the serial column
     *
     * Example usage:
     * <code>
     * $query->filterBySerial('fooValue');   // WHERE serial = 'fooValue'
     * $query->filterBySerial('%fooValue%'); // WHERE serial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterBySerial($serial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serial)) {
                $serial = str_replace('*', '%', $serial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::SERIAL, $serial, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber('fooValue');   // WHERE number = 'fooValue'
     * $query->filterByNumber('%fooValue%'); // WHERE number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $number The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($number)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $number)) {
                $number = str_replace('*', '%', $number);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::NUMBER, $number, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the tempInvalidReason_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTempinvalidreasonId(1234); // WHERE tempInvalidReason_id = 1234
     * $query->filterByTempinvalidreasonId(array(12, 34)); // WHERE tempInvalidReason_id IN (12, 34)
     * $query->filterByTempinvalidreasonId(array('min' => 12)); // WHERE tempInvalidReason_id >= 12
     * $query->filterByTempinvalidreasonId(array('max' => 12)); // WHERE tempInvalidReason_id <= 12
     * </code>
     *
     * @param     mixed $tempinvalidreasonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByTempinvalidreasonId($tempinvalidreasonId = null, $comparison = null)
    {
        if (is_array($tempinvalidreasonId)) {
            $useMinMax = false;
            if (isset($tempinvalidreasonId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::TEMPINVALIDREASON_ID, $tempinvalidreasonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tempinvalidreasonId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::TEMPINVALIDREASON_ID, $tempinvalidreasonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::TEMPINVALIDREASON_ID, $tempinvalidreasonId, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(TempinvalidPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(TempinvalidPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::BEGDATE, $begdate, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(TempinvalidPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(TempinvalidPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::ENDDATE, $enddate, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::PERSON_ID, $personId, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByDiagnosisId($diagnosisId = null, $comparison = null)
    {
        if (is_array($diagnosisId)) {
            $useMinMax = false;
            if (isset($diagnosisId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::DIAGNOSIS_ID, $diagnosisId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diagnosisId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::DIAGNOSIS_ID, $diagnosisId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::DIAGNOSIS_ID, $diagnosisId, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex(true); // WHERE sex = true
     * $query->filterBySex('yes'); // WHERE sex = true
     * </code>
     *
     * @param     boolean|string $sex The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_string($sex)) {
            $sex = in_array(strtolower($sex), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TempinvalidPeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge(1234); // WHERE age = 1234
     * $query->filterByAge(array(12, 34)); // WHERE age IN (12, 34)
     * $query->filterByAge(array('min' => 12)); // WHERE age >= 12
     * $query->filterByAge(array('max' => 12)); // WHERE age <= 12
     * </code>
     *
     * @param     mixed $age The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (is_array($age)) {
            $useMinMax = false;
            if (isset($age['min'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE, $age['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($age['max'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE, $age['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::AGE, $age, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::AGE_BU, $ageBu, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::AGE_BC, $ageBc, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::AGE_EU, $ageEu, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(TempinvalidPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::AGE_EC, $ageEc, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TempinvalidPeer::NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration(1234); // WHERE duration = 1234
     * $query->filterByDuration(array(12, 34)); // WHERE duration IN (12, 34)
     * $query->filterByDuration(array('min' => 12)); // WHERE duration >= 12
     * $query->filterByDuration(array('max' => 12)); // WHERE duration <= 12
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(TempinvalidPeer::DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(TempinvalidPeer::DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the closed column
     *
     * Example usage:
     * <code>
     * $query->filterByClosed(true); // WHERE closed = true
     * $query->filterByClosed('yes'); // WHERE closed = true
     * </code>
     *
     * @param     boolean|string $closed The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByClosed($closed = null, $comparison = null)
    {
        if (is_string($closed)) {
            $closed = in_array(strtolower($closed), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(TempinvalidPeer::CLOSED, $closed, $comparison);
    }

    /**
     * Filter the query on the prev_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrevId(1234); // WHERE prev_id = 1234
     * $query->filterByPrevId(array(12, 34)); // WHERE prev_id IN (12, 34)
     * $query->filterByPrevId(array('min' => 12)); // WHERE prev_id >= 12
     * $query->filterByPrevId(array('max' => 12)); // WHERE prev_id <= 12
     * </code>
     *
     * @param     mixed $prevId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByPrevId($prevId = null, $comparison = null)
    {
        if (is_array($prevId)) {
            $useMinMax = false;
            if (isset($prevId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::PREV_ID, $prevId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prevId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::PREV_ID, $prevId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::PREV_ID, $prevId, $comparison);
    }

    /**
     * Filter the query on the insuranceOfficeMark column
     *
     * Example usage:
     * <code>
     * $query->filterByInsuranceofficemark(1234); // WHERE insuranceOfficeMark = 1234
     * $query->filterByInsuranceofficemark(array(12, 34)); // WHERE insuranceOfficeMark IN (12, 34)
     * $query->filterByInsuranceofficemark(array('min' => 12)); // WHERE insuranceOfficeMark >= 12
     * $query->filterByInsuranceofficemark(array('max' => 12)); // WHERE insuranceOfficeMark <= 12
     * </code>
     *
     * @param     mixed $insuranceofficemark The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByInsuranceofficemark($insuranceofficemark = null, $comparison = null)
    {
        if (is_array($insuranceofficemark)) {
            $useMinMax = false;
            if (isset($insuranceofficemark['min'])) {
                $this->addUsingAlias(TempinvalidPeer::INSURANCEOFFICEMARK, $insuranceofficemark['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insuranceofficemark['max'])) {
                $this->addUsingAlias(TempinvalidPeer::INSURANCEOFFICEMARK, $insuranceofficemark['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::INSURANCEOFFICEMARK, $insuranceofficemark, $comparison);
    }

    /**
     * Filter the query on the caseBegDate column
     *
     * Example usage:
     * <code>
     * $query->filterByCasebegdate('2011-03-14'); // WHERE caseBegDate = '2011-03-14'
     * $query->filterByCasebegdate('now'); // WHERE caseBegDate = '2011-03-14'
     * $query->filterByCasebegdate(array('max' => 'yesterday')); // WHERE caseBegDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $casebegdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByCasebegdate($casebegdate = null, $comparison = null)
    {
        if (is_array($casebegdate)) {
            $useMinMax = false;
            if (isset($casebegdate['min'])) {
                $this->addUsingAlias(TempinvalidPeer::CASEBEGDATE, $casebegdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($casebegdate['max'])) {
                $this->addUsingAlias(TempinvalidPeer::CASEBEGDATE, $casebegdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::CASEBEGDATE, $casebegdate, $comparison);
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
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function filterByEventId($eventId = null, $comparison = null)
    {
        if (is_array($eventId)) {
            $useMinMax = false;
            if (isset($eventId['min'])) {
                $this->addUsingAlias(TempinvalidPeer::EVENT_ID, $eventId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventId['max'])) {
                $this->addUsingAlias(TempinvalidPeer::EVENT_ID, $eventId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TempinvalidPeer::EVENT_ID, $eventId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Tempinvalid $tempinvalid Object to remove from the list of results
     *
     * @return TempinvalidQuery The current query, for fluid interface
     */
    public function prune($tempinvalid = null)
    {
        if ($tempinvalid) {
            $this->addUsingAlias(TempinvalidPeer::ID, $tempinvalid->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
