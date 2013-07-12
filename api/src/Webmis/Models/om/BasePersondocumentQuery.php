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
use Webmis\Models\Persondocument;
use Webmis\Models\PersondocumentPeer;
use Webmis\Models\PersondocumentQuery;

/**
 * Base class that represents a query for the 'PersonDocument' table.
 *
 *
 *
 * @method PersondocumentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersondocumentQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method PersondocumentQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method PersondocumentQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method PersondocumentQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method PersondocumentQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method PersondocumentQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method PersondocumentQuery orderByDocumenttypeId($order = Criteria::ASC) Order by the documentType_id column
 * @method PersondocumentQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method PersondocumentQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method PersondocumentQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method PersondocumentQuery orderByOrigin($order = Criteria::ASC) Order by the origin column
 *
 * @method PersondocumentQuery groupById() Group by the id column
 * @method PersondocumentQuery groupByCreatedatetime() Group by the createDatetime column
 * @method PersondocumentQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method PersondocumentQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method PersondocumentQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method PersondocumentQuery groupByDeleted() Group by the deleted column
 * @method PersondocumentQuery groupByPersonId() Group by the person_id column
 * @method PersondocumentQuery groupByDocumenttypeId() Group by the documentType_id column
 * @method PersondocumentQuery groupBySerial() Group by the serial column
 * @method PersondocumentQuery groupByNumber() Group by the number column
 * @method PersondocumentQuery groupByDate() Group by the date column
 * @method PersondocumentQuery groupByOrigin() Group by the origin column
 *
 * @method PersondocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersondocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersondocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Persondocument findOne(PropelPDO $con = null) Return the first Persondocument matching the query
 * @method Persondocument findOneOrCreate(PropelPDO $con = null) Return the first Persondocument matching the query, or a new Persondocument object populated from the query conditions when no match is found
 *
 * @method Persondocument findOneByCreatedatetime(string $createDatetime) Return the first Persondocument filtered by the createDatetime column
 * @method Persondocument findOneByCreatepersonId(int $createPerson_id) Return the first Persondocument filtered by the createPerson_id column
 * @method Persondocument findOneByModifydatetime(string $modifyDatetime) Return the first Persondocument filtered by the modifyDatetime column
 * @method Persondocument findOneByModifypersonId(int $modifyPerson_id) Return the first Persondocument filtered by the modifyPerson_id column
 * @method Persondocument findOneByDeleted(boolean $deleted) Return the first Persondocument filtered by the deleted column
 * @method Persondocument findOneByPersonId(int $person_id) Return the first Persondocument filtered by the person_id column
 * @method Persondocument findOneByDocumenttypeId(int $documentType_id) Return the first Persondocument filtered by the documentType_id column
 * @method Persondocument findOneBySerial(string $serial) Return the first Persondocument filtered by the serial column
 * @method Persondocument findOneByNumber(string $number) Return the first Persondocument filtered by the number column
 * @method Persondocument findOneByDate(string $date) Return the first Persondocument filtered by the date column
 * @method Persondocument findOneByOrigin(string $origin) Return the first Persondocument filtered by the origin column
 *
 * @method array findById(int $id) Return Persondocument objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Persondocument objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Persondocument objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Persondocument objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Persondocument objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Persondocument objects filtered by the deleted column
 * @method array findByPersonId(int $person_id) Return Persondocument objects filtered by the person_id column
 * @method array findByDocumenttypeId(int $documentType_id) Return Persondocument objects filtered by the documentType_id column
 * @method array findBySerial(string $serial) Return Persondocument objects filtered by the serial column
 * @method array findByNumber(string $number) Return Persondocument objects filtered by the number column
 * @method array findByDate(string $date) Return Persondocument objects filtered by the date column
 * @method array findByOrigin(string $origin) Return Persondocument objects filtered by the origin column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePersondocumentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersondocumentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Persondocument', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersondocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersondocumentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersondocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersondocumentQuery) {
            return $criteria;
        }
        $query = new PersondocumentQuery();
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
     * @return   Persondocument|Persondocument[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersondocumentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersondocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Persondocument A model object, or null if the key is not found
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
     * @return                 Persondocument A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `person_id`, `documentType_id`, `serial`, `number`, `date`, `origin` FROM `PersonDocument` WHERE `id` = :p0';
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
            $obj = new Persondocument();
            $obj->hydrate($row);
            PersondocumentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Persondocument|Persondocument[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Persondocument[]|mixed the list of results, formatted by the current formatter
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersondocumentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersondocumentPeer::ID, $keys, Criteria::IN);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersondocumentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersondocumentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::ID, $id, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(PersondocumentPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(PersondocumentPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(PersondocumentPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(PersondocumentPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(PersondocumentPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(PersondocumentPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(PersondocumentPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(PersondocumentPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersondocumentPeer::DELETED, $deleted, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(PersondocumentPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(PersondocumentPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the documentType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumenttypeId(1234); // WHERE documentType_id = 1234
     * $query->filterByDocumenttypeId(array(12, 34)); // WHERE documentType_id IN (12, 34)
     * $query->filterByDocumenttypeId(array('min' => 12)); // WHERE documentType_id >= 12
     * $query->filterByDocumenttypeId(array('max' => 12)); // WHERE documentType_id <= 12
     * </code>
     *
     * @param     mixed $documenttypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByDocumenttypeId($documenttypeId = null, $comparison = null)
    {
        if (is_array($documenttypeId)) {
            $useMinMax = false;
            if (isset($documenttypeId['min'])) {
                $this->addUsingAlias(PersondocumentPeer::DOCUMENTTYPE_ID, $documenttypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documenttypeId['max'])) {
                $this->addUsingAlias(PersondocumentPeer::DOCUMENTTYPE_ID, $documenttypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::DOCUMENTTYPE_ID, $documenttypeId, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersondocumentPeer::SERIAL, $serial, $comparison);
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
     * @return PersondocumentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersondocumentPeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PersondocumentPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PersondocumentPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the origin column
     *
     * Example usage:
     * <code>
     * $query->filterByOrigin('fooValue');   // WHERE origin = 'fooValue'
     * $query->filterByOrigin('%fooValue%'); // WHERE origin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $origin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function filterByOrigin($origin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($origin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $origin)) {
                $origin = str_replace('*', '%', $origin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersondocumentPeer::ORIGIN, $origin, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Persondocument $persondocument Object to remove from the list of results
     *
     * @return PersondocumentQuery The current query, for fluid interface
     */
    public function prune($persondocument = null)
    {
        if ($persondocument) {
            $this->addUsingAlias(PersondocumentPeer::ID, $persondocument->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
