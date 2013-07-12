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
use Webmis\Models\Personorder;
use Webmis\Models\PersonorderPeer;
use Webmis\Models\PersonorderQuery;

/**
 * Base class that represents a query for the 'PersonOrder' table.
 *
 *
 *
 * @method PersonorderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersonorderQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method PersonorderQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method PersonorderQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method PersonorderQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method PersonorderQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method PersonorderQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method PersonorderQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method PersonorderQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method PersonorderQuery orderByDocumentdate($order = Criteria::ASC) Order by the documentDate column
 * @method PersonorderQuery orderByDocumentnumber($order = Criteria::ASC) Order by the documentNumber column
 * @method PersonorderQuery orderByDocumenttypeId($order = Criteria::ASC) Order by the documentType_id column
 * @method PersonorderQuery orderBySalary($order = Criteria::ASC) Order by the salary column
 * @method PersonorderQuery orderByValidfromdate($order = Criteria::ASC) Order by the validFromDate column
 * @method PersonorderQuery orderByValidtodate($order = Criteria::ASC) Order by the validToDate column
 * @method PersonorderQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method PersonorderQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 *
 * @method PersonorderQuery groupById() Group by the id column
 * @method PersonorderQuery groupByCreatedatetime() Group by the createDatetime column
 * @method PersonorderQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method PersonorderQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method PersonorderQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method PersonorderQuery groupByDeleted() Group by the deleted column
 * @method PersonorderQuery groupByPersonId() Group by the person_id column
 * @method PersonorderQuery groupByDate() Group by the date column
 * @method PersonorderQuery groupByType() Group by the type column
 * @method PersonorderQuery groupByDocumentdate() Group by the documentDate column
 * @method PersonorderQuery groupByDocumentnumber() Group by the documentNumber column
 * @method PersonorderQuery groupByDocumenttypeId() Group by the documentType_id column
 * @method PersonorderQuery groupBySalary() Group by the salary column
 * @method PersonorderQuery groupByValidfromdate() Group by the validFromDate column
 * @method PersonorderQuery groupByValidtodate() Group by the validToDate column
 * @method PersonorderQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method PersonorderQuery groupByPostId() Group by the post_id column
 *
 * @method PersonorderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonorderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonorderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Personorder findOne(PropelPDO $con = null) Return the first Personorder matching the query
 * @method Personorder findOneOrCreate(PropelPDO $con = null) Return the first Personorder matching the query, or a new Personorder object populated from the query conditions when no match is found
 *
 * @method Personorder findOneByCreatedatetime(string $createDatetime) Return the first Personorder filtered by the createDatetime column
 * @method Personorder findOneByCreatepersonId(int $createPerson_id) Return the first Personorder filtered by the createPerson_id column
 * @method Personorder findOneByModifydatetime(string $modifyDatetime) Return the first Personorder filtered by the modifyDatetime column
 * @method Personorder findOneByModifypersonId(int $modifyPerson_id) Return the first Personorder filtered by the modifyPerson_id column
 * @method Personorder findOneByDeleted(boolean $deleted) Return the first Personorder filtered by the deleted column
 * @method Personorder findOneByPersonId(int $person_id) Return the first Personorder filtered by the person_id column
 * @method Personorder findOneByDate(string $date) Return the first Personorder filtered by the date column
 * @method Personorder findOneByType(string $type) Return the first Personorder filtered by the type column
 * @method Personorder findOneByDocumentdate(string $documentDate) Return the first Personorder filtered by the documentDate column
 * @method Personorder findOneByDocumentnumber(string $documentNumber) Return the first Personorder filtered by the documentNumber column
 * @method Personorder findOneByDocumenttypeId(int $documentType_id) Return the first Personorder filtered by the documentType_id column
 * @method Personorder findOneBySalary(string $salary) Return the first Personorder filtered by the salary column
 * @method Personorder findOneByValidfromdate(string $validFromDate) Return the first Personorder filtered by the validFromDate column
 * @method Personorder findOneByValidtodate(string $validToDate) Return the first Personorder filtered by the validToDate column
 * @method Personorder findOneByOrgstructureId(int $orgStructure_id) Return the first Personorder filtered by the orgStructure_id column
 * @method Personorder findOneByPostId(int $post_id) Return the first Personorder filtered by the post_id column
 *
 * @method array findById(int $id) Return Personorder objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Personorder objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Personorder objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Personorder objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Personorder objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Personorder objects filtered by the deleted column
 * @method array findByPersonId(int $person_id) Return Personorder objects filtered by the person_id column
 * @method array findByDate(string $date) Return Personorder objects filtered by the date column
 * @method array findByType(string $type) Return Personorder objects filtered by the type column
 * @method array findByDocumentdate(string $documentDate) Return Personorder objects filtered by the documentDate column
 * @method array findByDocumentnumber(string $documentNumber) Return Personorder objects filtered by the documentNumber column
 * @method array findByDocumenttypeId(int $documentType_id) Return Personorder objects filtered by the documentType_id column
 * @method array findBySalary(string $salary) Return Personorder objects filtered by the salary column
 * @method array findByValidfromdate(string $validFromDate) Return Personorder objects filtered by the validFromDate column
 * @method array findByValidtodate(string $validToDate) Return Personorder objects filtered by the validToDate column
 * @method array findByOrgstructureId(int $orgStructure_id) Return Personorder objects filtered by the orgStructure_id column
 * @method array findByPostId(int $post_id) Return Personorder objects filtered by the post_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePersonorderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonorderQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Personorder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonorderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersonorderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonorderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonorderQuery) {
            return $criteria;
        }
        $query = new PersonorderQuery();
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
     * @return   Personorder|Personorder[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonorderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonorderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Personorder A model object, or null if the key is not found
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
     * @return                 Personorder A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `person_id`, `date`, `type`, `documentDate`, `documentNumber`, `documentType_id`, `salary`, `validFromDate`, `validToDate`, `orgStructure_id`, `post_id` FROM `PersonOrder` WHERE `id` = :p0';
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
            $obj = new Personorder();
            $obj->hydrate($row);
            PersonorderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Personorder|Personorder[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Personorder[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonorderPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonorderPeer::ID, $keys, Criteria::IN);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonorderPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonorderPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::ID, $id, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(PersonorderPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(PersonorderPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(PersonorderPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(PersonorderPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(PersonorderPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(PersonorderPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(PersonorderPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(PersonorderPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersonorderPeer::DELETED, $deleted, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(PersonorderPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(PersonorderPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::PERSON_ID, $personId, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PersonorderPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PersonorderPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the documentDate column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentdate('2011-03-14'); // WHERE documentDate = '2011-03-14'
     * $query->filterByDocumentdate('now'); // WHERE documentDate = '2011-03-14'
     * $query->filterByDocumentdate(array('max' => 'yesterday')); // WHERE documentDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $documentdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByDocumentdate($documentdate = null, $comparison = null)
    {
        if (is_array($documentdate)) {
            $useMinMax = false;
            if (isset($documentdate['min'])) {
                $this->addUsingAlias(PersonorderPeer::DOCUMENTDATE, $documentdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documentdate['max'])) {
                $this->addUsingAlias(PersonorderPeer::DOCUMENTDATE, $documentdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::DOCUMENTDATE, $documentdate, $comparison);
    }

    /**
     * Filter the query on the documentNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentnumber('fooValue');   // WHERE documentNumber = 'fooValue'
     * $query->filterByDocumentnumber('%fooValue%'); // WHERE documentNumber LIKE '%fooValue%'
     * </code>
     *
     * @param     string $documentnumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByDocumentnumber($documentnumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($documentnumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $documentnumber)) {
                $documentnumber = str_replace('*', '%', $documentnumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::DOCUMENTNUMBER, $documentnumber, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByDocumenttypeId($documenttypeId = null, $comparison = null)
    {
        if (is_array($documenttypeId)) {
            $useMinMax = false;
            if (isset($documenttypeId['min'])) {
                $this->addUsingAlias(PersonorderPeer::DOCUMENTTYPE_ID, $documenttypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documenttypeId['max'])) {
                $this->addUsingAlias(PersonorderPeer::DOCUMENTTYPE_ID, $documenttypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::DOCUMENTTYPE_ID, $documenttypeId, $comparison);
    }

    /**
     * Filter the query on the salary column
     *
     * Example usage:
     * <code>
     * $query->filterBySalary('fooValue');   // WHERE salary = 'fooValue'
     * $query->filterBySalary('%fooValue%'); // WHERE salary LIKE '%fooValue%'
     * </code>
     *
     * @param     string $salary The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterBySalary($salary = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($salary)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $salary)) {
                $salary = str_replace('*', '%', $salary);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::SALARY, $salary, $comparison);
    }

    /**
     * Filter the query on the validFromDate column
     *
     * Example usage:
     * <code>
     * $query->filterByValidfromdate('2011-03-14'); // WHERE validFromDate = '2011-03-14'
     * $query->filterByValidfromdate('now'); // WHERE validFromDate = '2011-03-14'
     * $query->filterByValidfromdate(array('max' => 'yesterday')); // WHERE validFromDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $validfromdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByValidfromdate($validfromdate = null, $comparison = null)
    {
        if (is_array($validfromdate)) {
            $useMinMax = false;
            if (isset($validfromdate['min'])) {
                $this->addUsingAlias(PersonorderPeer::VALIDFROMDATE, $validfromdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validfromdate['max'])) {
                $this->addUsingAlias(PersonorderPeer::VALIDFROMDATE, $validfromdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::VALIDFROMDATE, $validfromdate, $comparison);
    }

    /**
     * Filter the query on the validToDate column
     *
     * Example usage:
     * <code>
     * $query->filterByValidtodate('2011-03-14'); // WHERE validToDate = '2011-03-14'
     * $query->filterByValidtodate('now'); // WHERE validToDate = '2011-03-14'
     * $query->filterByValidtodate(array('max' => 'yesterday')); // WHERE validToDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $validtodate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByValidtodate($validtodate = null, $comparison = null)
    {
        if (is_array($validtodate)) {
            $useMinMax = false;
            if (isset($validtodate['min'])) {
                $this->addUsingAlias(PersonorderPeer::VALIDTODATE, $validtodate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($validtodate['max'])) {
                $this->addUsingAlias(PersonorderPeer::VALIDTODATE, $validtodate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::VALIDTODATE, $validtodate, $comparison);
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
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(PersonorderPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(PersonorderPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
    }

    /**
     * Filter the query on the post_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPostId(1234); // WHERE post_id = 1234
     * $query->filterByPostId(array(12, 34)); // WHERE post_id IN (12, 34)
     * $query->filterByPostId(array('min' => 12)); // WHERE post_id >= 12
     * $query->filterByPostId(array('max' => 12)); // WHERE post_id <= 12
     * </code>
     *
     * @param     mixed $postId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function filterByPostId($postId = null, $comparison = null)
    {
        if (is_array($postId)) {
            $useMinMax = false;
            if (isset($postId['min'])) {
                $this->addUsingAlias(PersonorderPeer::POST_ID, $postId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postId['max'])) {
                $this->addUsingAlias(PersonorderPeer::POST_ID, $postId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonorderPeer::POST_ID, $postId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Personorder $personorder Object to remove from the list of results
     *
     * @return PersonorderQuery The current query, for fluid interface
     */
    public function prune($personorder = null)
    {
        if ($personorder) {
            $this->addUsingAlias(PersonorderPeer::ID, $personorder->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
