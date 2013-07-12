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
use Webmis\Models\Diagnosis;
use Webmis\Models\DiagnosisPeer;
use Webmis\Models\DiagnosisQuery;

/**
 * Base class that represents a query for the 'Diagnosis' table.
 *
 *
 *
 * @method DiagnosisQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DiagnosisQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method DiagnosisQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method DiagnosisQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method DiagnosisQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method DiagnosisQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method DiagnosisQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method DiagnosisQuery orderByDiagnosistypeId($order = Criteria::ASC) Order by the diagnosisType_id column
 * @method DiagnosisQuery orderByCharacterId($order = Criteria::ASC) Order by the character_id column
 * @method DiagnosisQuery orderByMkb($order = Criteria::ASC) Order by the MKB column
 * @method DiagnosisQuery orderByMkbex($order = Criteria::ASC) Order by the MKBEx column
 * @method DiagnosisQuery orderByDispanserId($order = Criteria::ASC) Order by the dispanser_id column
 * @method DiagnosisQuery orderByTraumatypeId($order = Criteria::ASC) Order by the traumaType_id column
 * @method DiagnosisQuery orderBySetdate($order = Criteria::ASC) Order by the setDate column
 * @method DiagnosisQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method DiagnosisQuery orderByModId($order = Criteria::ASC) Order by the mod_id column
 * @method DiagnosisQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 *
 * @method DiagnosisQuery groupById() Group by the id column
 * @method DiagnosisQuery groupByCreatedatetime() Group by the createDatetime column
 * @method DiagnosisQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method DiagnosisQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method DiagnosisQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method DiagnosisQuery groupByDeleted() Group by the deleted column
 * @method DiagnosisQuery groupByClientId() Group by the client_id column
 * @method DiagnosisQuery groupByDiagnosistypeId() Group by the diagnosisType_id column
 * @method DiagnosisQuery groupByCharacterId() Group by the character_id column
 * @method DiagnosisQuery groupByMkb() Group by the MKB column
 * @method DiagnosisQuery groupByMkbex() Group by the MKBEx column
 * @method DiagnosisQuery groupByDispanserId() Group by the dispanser_id column
 * @method DiagnosisQuery groupByTraumatypeId() Group by the traumaType_id column
 * @method DiagnosisQuery groupBySetdate() Group by the setDate column
 * @method DiagnosisQuery groupByEnddate() Group by the endDate column
 * @method DiagnosisQuery groupByModId() Group by the mod_id column
 * @method DiagnosisQuery groupByPersonId() Group by the person_id column
 *
 * @method DiagnosisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DiagnosisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DiagnosisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Diagnosis findOne(PropelPDO $con = null) Return the first Diagnosis matching the query
 * @method Diagnosis findOneOrCreate(PropelPDO $con = null) Return the first Diagnosis matching the query, or a new Diagnosis object populated from the query conditions when no match is found
 *
 * @method Diagnosis findOneByCreatedatetime(string $createDatetime) Return the first Diagnosis filtered by the createDatetime column
 * @method Diagnosis findOneByCreatepersonId(int $createPerson_id) Return the first Diagnosis filtered by the createPerson_id column
 * @method Diagnosis findOneByModifydatetime(string $modifyDatetime) Return the first Diagnosis filtered by the modifyDatetime column
 * @method Diagnosis findOneByModifypersonId(int $modifyPerson_id) Return the first Diagnosis filtered by the modifyPerson_id column
 * @method Diagnosis findOneByDeleted(boolean $deleted) Return the first Diagnosis filtered by the deleted column
 * @method Diagnosis findOneByClientId(int $client_id) Return the first Diagnosis filtered by the client_id column
 * @method Diagnosis findOneByDiagnosistypeId(int $diagnosisType_id) Return the first Diagnosis filtered by the diagnosisType_id column
 * @method Diagnosis findOneByCharacterId(int $character_id) Return the first Diagnosis filtered by the character_id column
 * @method Diagnosis findOneByMkb(string $MKB) Return the first Diagnosis filtered by the MKB column
 * @method Diagnosis findOneByMkbex(string $MKBEx) Return the first Diagnosis filtered by the MKBEx column
 * @method Diagnosis findOneByDispanserId(int $dispanser_id) Return the first Diagnosis filtered by the dispanser_id column
 * @method Diagnosis findOneByTraumatypeId(int $traumaType_id) Return the first Diagnosis filtered by the traumaType_id column
 * @method Diagnosis findOneBySetdate(string $setDate) Return the first Diagnosis filtered by the setDate column
 * @method Diagnosis findOneByEnddate(string $endDate) Return the first Diagnosis filtered by the endDate column
 * @method Diagnosis findOneByModId(int $mod_id) Return the first Diagnosis filtered by the mod_id column
 * @method Diagnosis findOneByPersonId(int $person_id) Return the first Diagnosis filtered by the person_id column
 *
 * @method array findById(int $id) Return Diagnosis objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Diagnosis objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Diagnosis objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Diagnosis objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Diagnosis objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Diagnosis objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Diagnosis objects filtered by the client_id column
 * @method array findByDiagnosistypeId(int $diagnosisType_id) Return Diagnosis objects filtered by the diagnosisType_id column
 * @method array findByCharacterId(int $character_id) Return Diagnosis objects filtered by the character_id column
 * @method array findByMkb(string $MKB) Return Diagnosis objects filtered by the MKB column
 * @method array findByMkbex(string $MKBEx) Return Diagnosis objects filtered by the MKBEx column
 * @method array findByDispanserId(int $dispanser_id) Return Diagnosis objects filtered by the dispanser_id column
 * @method array findByTraumatypeId(int $traumaType_id) Return Diagnosis objects filtered by the traumaType_id column
 * @method array findBySetdate(string $setDate) Return Diagnosis objects filtered by the setDate column
 * @method array findByEnddate(string $endDate) Return Diagnosis objects filtered by the endDate column
 * @method array findByModId(int $mod_id) Return Diagnosis objects filtered by the mod_id column
 * @method array findByPersonId(int $person_id) Return Diagnosis objects filtered by the person_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseDiagnosisQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDiagnosisQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Diagnosis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DiagnosisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DiagnosisQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DiagnosisQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DiagnosisQuery) {
            return $criteria;
        }
        $query = new DiagnosisQuery();
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
     * @return   Diagnosis|Diagnosis[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiagnosisPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DiagnosisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Diagnosis A model object, or null if the key is not found
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
     * @return                 Diagnosis A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `client_id`, `diagnosisType_id`, `character_id`, `MKB`, `MKBEx`, `dispanser_id`, `traumaType_id`, `setDate`, `endDate`, `mod_id`, `person_id` FROM `Diagnosis` WHERE `id` = :p0';
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
            $obj = new Diagnosis();
            $obj->hydrate($row);
            DiagnosisPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Diagnosis|Diagnosis[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Diagnosis[]|mixed the list of results, formatted by the current formatter
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiagnosisPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiagnosisPeer::ID, $keys, Criteria::IN);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DiagnosisPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DiagnosisPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::ID, $id, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(DiagnosisPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(DiagnosisPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(DiagnosisPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(DiagnosisPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(DiagnosisPeer::DELETED, $deleted, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::CLIENT_ID, $clientId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByDiagnosistypeId($diagnosistypeId = null, $comparison = null)
    {
        if (is_array($diagnosistypeId)) {
            $useMinMax = false;
            if (isset($diagnosistypeId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::DIAGNOSISTYPE_ID, $diagnosistypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($diagnosistypeId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::DIAGNOSISTYPE_ID, $diagnosistypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::DIAGNOSISTYPE_ID, $diagnosistypeId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByCharacterId($characterId = null, $comparison = null)
    {
        if (is_array($characterId)) {
            $useMinMax = false;
            if (isset($characterId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::CHARACTER_ID, $characterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($characterId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::CHARACTER_ID, $characterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::CHARACTER_ID, $characterId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiagnosisPeer::MKB, $mkb, $comparison);
    }

    /**
     * Filter the query on the MKBEx column
     *
     * Example usage:
     * <code>
     * $query->filterByMkbex('fooValue');   // WHERE MKBEx = 'fooValue'
     * $query->filterByMkbex('%fooValue%'); // WHERE MKBEx LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mkbex The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByMkbex($mkbex = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mkbex)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mkbex)) {
                $mkbex = str_replace('*', '%', $mkbex);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::MKBEX, $mkbex, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByDispanserId($dispanserId = null, $comparison = null)
    {
        if (is_array($dispanserId)) {
            $useMinMax = false;
            if (isset($dispanserId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::DISPANSER_ID, $dispanserId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dispanserId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::DISPANSER_ID, $dispanserId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::DISPANSER_ID, $dispanserId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByTraumatypeId($traumatypeId = null, $comparison = null)
    {
        if (is_array($traumatypeId)) {
            $useMinMax = false;
            if (isset($traumatypeId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::TRAUMATYPE_ID, $traumatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($traumatypeId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::TRAUMATYPE_ID, $traumatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::TRAUMATYPE_ID, $traumatypeId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterBySetdate($setdate = null, $comparison = null)
    {
        if (is_array($setdate)) {
            $useMinMax = false;
            if (isset($setdate['min'])) {
                $this->addUsingAlias(DiagnosisPeer::SETDATE, $setdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($setdate['max'])) {
                $this->addUsingAlias(DiagnosisPeer::SETDATE, $setdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::SETDATE, $setdate, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(DiagnosisPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(DiagnosisPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the mod_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModId(1234); // WHERE mod_id = 1234
     * $query->filterByModId(array(12, 34)); // WHERE mod_id IN (12, 34)
     * $query->filterByModId(array('min' => 12)); // WHERE mod_id >= 12
     * $query->filterByModId(array('max' => 12)); // WHERE mod_id <= 12
     * </code>
     *
     * @param     mixed $modId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByModId($modId = null, $comparison = null)
    {
        if (is_array($modId)) {
            $useMinMax = false;
            if (isset($modId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::MOD_ID, $modId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::MOD_ID, $modId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::MOD_ID, $modId, $comparison);
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
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(DiagnosisPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(DiagnosisPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiagnosisPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Diagnosis $diagnosis Object to remove from the list of results
     *
     * @return DiagnosisQuery The current query, for fluid interface
     */
    public function prune($diagnosis = null)
    {
        if ($diagnosis) {
            $this->addUsingAlias(DiagnosisPeer::ID, $diagnosis->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
