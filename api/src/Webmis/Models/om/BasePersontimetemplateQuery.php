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
use Webmis\Models\Persontimetemplate;
use Webmis\Models\PersontimetemplatePeer;
use Webmis\Models\PersontimetemplateQuery;

/**
 * Base class that represents a query for the 'PersonTimeTemplate' table.
 *
 *
 *
 * @method PersontimetemplateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersontimetemplateQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method PersontimetemplateQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method PersontimetemplateQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method PersontimetemplateQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method PersontimetemplateQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method PersontimetemplateQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method PersontimetemplateQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method PersontimetemplateQuery orderByAmbbegtime($order = Criteria::ASC) Order by the ambBegTime column
 * @method PersontimetemplateQuery orderByAmbendtime($order = Criteria::ASC) Order by the ambEndTime column
 * @method PersontimetemplateQuery orderByAmbplan($order = Criteria::ASC) Order by the ambPlan column
 * @method PersontimetemplateQuery orderByOffice($order = Criteria::ASC) Order by the office column
 * @method PersontimetemplateQuery orderByAmbbegtime2($order = Criteria::ASC) Order by the ambBegTime2 column
 * @method PersontimetemplateQuery orderByAmbendtime2($order = Criteria::ASC) Order by the ambEndTime2 column
 * @method PersontimetemplateQuery orderByAmbplan2($order = Criteria::ASC) Order by the ambPlan2 column
 * @method PersontimetemplateQuery orderByOffice2($order = Criteria::ASC) Order by the office2 column
 * @method PersontimetemplateQuery orderByHombegtime($order = Criteria::ASC) Order by the homBegTime column
 * @method PersontimetemplateQuery orderByHomendtime($order = Criteria::ASC) Order by the homEndTime column
 * @method PersontimetemplateQuery orderByHomplan($order = Criteria::ASC) Order by the homPlan column
 * @method PersontimetemplateQuery orderByHombegtime2($order = Criteria::ASC) Order by the homBegTime2 column
 * @method PersontimetemplateQuery orderByHomendtime2($order = Criteria::ASC) Order by the homEndTime2 column
 * @method PersontimetemplateQuery orderByHomplan2($order = Criteria::ASC) Order by the homPlan2 column
 *
 * @method PersontimetemplateQuery groupById() Group by the id column
 * @method PersontimetemplateQuery groupByCreatedatetime() Group by the createDatetime column
 * @method PersontimetemplateQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method PersontimetemplateQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method PersontimetemplateQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method PersontimetemplateQuery groupByDeleted() Group by the deleted column
 * @method PersontimetemplateQuery groupByMasterId() Group by the master_id column
 * @method PersontimetemplateQuery groupByIdx() Group by the idx column
 * @method PersontimetemplateQuery groupByAmbbegtime() Group by the ambBegTime column
 * @method PersontimetemplateQuery groupByAmbendtime() Group by the ambEndTime column
 * @method PersontimetemplateQuery groupByAmbplan() Group by the ambPlan column
 * @method PersontimetemplateQuery groupByOffice() Group by the office column
 * @method PersontimetemplateQuery groupByAmbbegtime2() Group by the ambBegTime2 column
 * @method PersontimetemplateQuery groupByAmbendtime2() Group by the ambEndTime2 column
 * @method PersontimetemplateQuery groupByAmbplan2() Group by the ambPlan2 column
 * @method PersontimetemplateQuery groupByOffice2() Group by the office2 column
 * @method PersontimetemplateQuery groupByHombegtime() Group by the homBegTime column
 * @method PersontimetemplateQuery groupByHomendtime() Group by the homEndTime column
 * @method PersontimetemplateQuery groupByHomplan() Group by the homPlan column
 * @method PersontimetemplateQuery groupByHombegtime2() Group by the homBegTime2 column
 * @method PersontimetemplateQuery groupByHomendtime2() Group by the homEndTime2 column
 * @method PersontimetemplateQuery groupByHomplan2() Group by the homPlan2 column
 *
 * @method PersontimetemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersontimetemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersontimetemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Persontimetemplate findOne(PropelPDO $con = null) Return the first Persontimetemplate matching the query
 * @method Persontimetemplate findOneOrCreate(PropelPDO $con = null) Return the first Persontimetemplate matching the query, or a new Persontimetemplate object populated from the query conditions when no match is found
 *
 * @method Persontimetemplate findOneByCreatedatetime(string $createDatetime) Return the first Persontimetemplate filtered by the createDatetime column
 * @method Persontimetemplate findOneByCreatepersonId(int $createPerson_id) Return the first Persontimetemplate filtered by the createPerson_id column
 * @method Persontimetemplate findOneByModifydatetime(string $modifyDatetime) Return the first Persontimetemplate filtered by the modifyDatetime column
 * @method Persontimetemplate findOneByModifypersonId(int $modifyPerson_id) Return the first Persontimetemplate filtered by the modifyPerson_id column
 * @method Persontimetemplate findOneByDeleted(boolean $deleted) Return the first Persontimetemplate filtered by the deleted column
 * @method Persontimetemplate findOneByMasterId(int $master_id) Return the first Persontimetemplate filtered by the master_id column
 * @method Persontimetemplate findOneByIdx(int $idx) Return the first Persontimetemplate filtered by the idx column
 * @method Persontimetemplate findOneByAmbbegtime(string $ambBegTime) Return the first Persontimetemplate filtered by the ambBegTime column
 * @method Persontimetemplate findOneByAmbendtime(string $ambEndTime) Return the first Persontimetemplate filtered by the ambEndTime column
 * @method Persontimetemplate findOneByAmbplan(int $ambPlan) Return the first Persontimetemplate filtered by the ambPlan column
 * @method Persontimetemplate findOneByOffice(string $office) Return the first Persontimetemplate filtered by the office column
 * @method Persontimetemplate findOneByAmbbegtime2(string $ambBegTime2) Return the first Persontimetemplate filtered by the ambBegTime2 column
 * @method Persontimetemplate findOneByAmbendtime2(string $ambEndTime2) Return the first Persontimetemplate filtered by the ambEndTime2 column
 * @method Persontimetemplate findOneByAmbplan2(int $ambPlan2) Return the first Persontimetemplate filtered by the ambPlan2 column
 * @method Persontimetemplate findOneByOffice2(string $office2) Return the first Persontimetemplate filtered by the office2 column
 * @method Persontimetemplate findOneByHombegtime(string $homBegTime) Return the first Persontimetemplate filtered by the homBegTime column
 * @method Persontimetemplate findOneByHomendtime(string $homEndTime) Return the first Persontimetemplate filtered by the homEndTime column
 * @method Persontimetemplate findOneByHomplan(int $homPlan) Return the first Persontimetemplate filtered by the homPlan column
 * @method Persontimetemplate findOneByHombegtime2(string $homBegTime2) Return the first Persontimetemplate filtered by the homBegTime2 column
 * @method Persontimetemplate findOneByHomendtime2(string $homEndTime2) Return the first Persontimetemplate filtered by the homEndTime2 column
 * @method Persontimetemplate findOneByHomplan2(int $homPlan2) Return the first Persontimetemplate filtered by the homPlan2 column
 *
 * @method array findById(int $id) Return Persontimetemplate objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Persontimetemplate objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Persontimetemplate objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Persontimetemplate objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Persontimetemplate objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Persontimetemplate objects filtered by the deleted column
 * @method array findByMasterId(int $master_id) Return Persontimetemplate objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return Persontimetemplate objects filtered by the idx column
 * @method array findByAmbbegtime(string $ambBegTime) Return Persontimetemplate objects filtered by the ambBegTime column
 * @method array findByAmbendtime(string $ambEndTime) Return Persontimetemplate objects filtered by the ambEndTime column
 * @method array findByAmbplan(int $ambPlan) Return Persontimetemplate objects filtered by the ambPlan column
 * @method array findByOffice(string $office) Return Persontimetemplate objects filtered by the office column
 * @method array findByAmbbegtime2(string $ambBegTime2) Return Persontimetemplate objects filtered by the ambBegTime2 column
 * @method array findByAmbendtime2(string $ambEndTime2) Return Persontimetemplate objects filtered by the ambEndTime2 column
 * @method array findByAmbplan2(int $ambPlan2) Return Persontimetemplate objects filtered by the ambPlan2 column
 * @method array findByOffice2(string $office2) Return Persontimetemplate objects filtered by the office2 column
 * @method array findByHombegtime(string $homBegTime) Return Persontimetemplate objects filtered by the homBegTime column
 * @method array findByHomendtime(string $homEndTime) Return Persontimetemplate objects filtered by the homEndTime column
 * @method array findByHomplan(int $homPlan) Return Persontimetemplate objects filtered by the homPlan column
 * @method array findByHombegtime2(string $homBegTime2) Return Persontimetemplate objects filtered by the homBegTime2 column
 * @method array findByHomendtime2(string $homEndTime2) Return Persontimetemplate objects filtered by the homEndTime2 column
 * @method array findByHomplan2(int $homPlan2) Return Persontimetemplate objects filtered by the homPlan2 column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePersontimetemplateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersontimetemplateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Persontimetemplate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersontimetemplateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersontimetemplateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersontimetemplateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersontimetemplateQuery) {
            return $criteria;
        }
        $query = new PersontimetemplateQuery();
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
     * @return   Persontimetemplate|Persontimetemplate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersontimetemplatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersontimetemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Persontimetemplate A model object, or null if the key is not found
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
     * @return                 Persontimetemplate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `master_id`, `idx`, `ambBegTime`, `ambEndTime`, `ambPlan`, `office`, `ambBegTime2`, `ambEndTime2`, `ambPlan2`, `office2`, `homBegTime`, `homEndTime`, `homPlan`, `homBegTime2`, `homEndTime2`, `homPlan2` FROM `PersonTimeTemplate` WHERE `id` = :p0';
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
            $obj = new Persontimetemplate();
            $obj->hydrate($row);
            PersontimetemplatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Persontimetemplate|Persontimetemplate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Persontimetemplate[]|mixed the list of results, formatted by the current formatter
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersontimetemplatePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersontimetemplatePeer::ID, $keys, Criteria::IN);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::ID, $id, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersontimetemplatePeer::DELETED, $deleted, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::MASTER_ID, $masterId, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the ambBegTime column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbbegtime('2011-03-14'); // WHERE ambBegTime = '2011-03-14'
     * $query->filterByAmbbegtime('now'); // WHERE ambBegTime = '2011-03-14'
     * $query->filterByAmbbegtime(array('max' => 'yesterday')); // WHERE ambBegTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $ambbegtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByAmbbegtime($ambbegtime = null, $comparison = null)
    {
        if (is_array($ambbegtime)) {
            $useMinMax = false;
            if (isset($ambbegtime['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBBEGTIME, $ambbegtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambbegtime['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBBEGTIME, $ambbegtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::AMBBEGTIME, $ambbegtime, $comparison);
    }

    /**
     * Filter the query on the ambEndTime column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbendtime('2011-03-14'); // WHERE ambEndTime = '2011-03-14'
     * $query->filterByAmbendtime('now'); // WHERE ambEndTime = '2011-03-14'
     * $query->filterByAmbendtime(array('max' => 'yesterday')); // WHERE ambEndTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $ambendtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByAmbendtime($ambendtime = null, $comparison = null)
    {
        if (is_array($ambendtime)) {
            $useMinMax = false;
            if (isset($ambendtime['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBENDTIME, $ambendtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambendtime['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBENDTIME, $ambendtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::AMBENDTIME, $ambendtime, $comparison);
    }

    /**
     * Filter the query on the ambPlan column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbplan(1234); // WHERE ambPlan = 1234
     * $query->filterByAmbplan(array(12, 34)); // WHERE ambPlan IN (12, 34)
     * $query->filterByAmbplan(array('min' => 12)); // WHERE ambPlan >= 12
     * $query->filterByAmbplan(array('max' => 12)); // WHERE ambPlan <= 12
     * </code>
     *
     * @param     mixed $ambplan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByAmbplan($ambplan = null, $comparison = null)
    {
        if (is_array($ambplan)) {
            $useMinMax = false;
            if (isset($ambplan['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBPLAN, $ambplan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambplan['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBPLAN, $ambplan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::AMBPLAN, $ambplan, $comparison);
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
     * @return PersontimetemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersontimetemplatePeer::OFFICE, $office, $comparison);
    }

    /**
     * Filter the query on the ambBegTime2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbbegtime2('2011-03-14'); // WHERE ambBegTime2 = '2011-03-14'
     * $query->filterByAmbbegtime2('now'); // WHERE ambBegTime2 = '2011-03-14'
     * $query->filterByAmbbegtime2(array('max' => 'yesterday')); // WHERE ambBegTime2 > '2011-03-13'
     * </code>
     *
     * @param     mixed $ambbegtime2 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByAmbbegtime2($ambbegtime2 = null, $comparison = null)
    {
        if (is_array($ambbegtime2)) {
            $useMinMax = false;
            if (isset($ambbegtime2['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBBEGTIME2, $ambbegtime2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambbegtime2['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBBEGTIME2, $ambbegtime2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::AMBBEGTIME2, $ambbegtime2, $comparison);
    }

    /**
     * Filter the query on the ambEndTime2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbendtime2('2011-03-14'); // WHERE ambEndTime2 = '2011-03-14'
     * $query->filterByAmbendtime2('now'); // WHERE ambEndTime2 = '2011-03-14'
     * $query->filterByAmbendtime2(array('max' => 'yesterday')); // WHERE ambEndTime2 > '2011-03-13'
     * </code>
     *
     * @param     mixed $ambendtime2 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByAmbendtime2($ambendtime2 = null, $comparison = null)
    {
        if (is_array($ambendtime2)) {
            $useMinMax = false;
            if (isset($ambendtime2['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBENDTIME2, $ambendtime2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambendtime2['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBENDTIME2, $ambendtime2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::AMBENDTIME2, $ambendtime2, $comparison);
    }

    /**
     * Filter the query on the ambPlan2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbplan2(1234); // WHERE ambPlan2 = 1234
     * $query->filterByAmbplan2(array(12, 34)); // WHERE ambPlan2 IN (12, 34)
     * $query->filterByAmbplan2(array('min' => 12)); // WHERE ambPlan2 >= 12
     * $query->filterByAmbplan2(array('max' => 12)); // WHERE ambPlan2 <= 12
     * </code>
     *
     * @param     mixed $ambplan2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByAmbplan2($ambplan2 = null, $comparison = null)
    {
        if (is_array($ambplan2)) {
            $useMinMax = false;
            if (isset($ambplan2['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBPLAN2, $ambplan2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambplan2['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::AMBPLAN2, $ambplan2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::AMBPLAN2, $ambplan2, $comparison);
    }

    /**
     * Filter the query on the office2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOffice2('fooValue');   // WHERE office2 = 'fooValue'
     * $query->filterByOffice2('%fooValue%'); // WHERE office2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $office2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByOffice2($office2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($office2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $office2)) {
                $office2 = str_replace('*', '%', $office2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::OFFICE2, $office2, $comparison);
    }

    /**
     * Filter the query on the homBegTime column
     *
     * Example usage:
     * <code>
     * $query->filterByHombegtime('2011-03-14'); // WHERE homBegTime = '2011-03-14'
     * $query->filterByHombegtime('now'); // WHERE homBegTime = '2011-03-14'
     * $query->filterByHombegtime(array('max' => 'yesterday')); // WHERE homBegTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $hombegtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByHombegtime($hombegtime = null, $comparison = null)
    {
        if (is_array($hombegtime)) {
            $useMinMax = false;
            if (isset($hombegtime['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMBEGTIME, $hombegtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hombegtime['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMBEGTIME, $hombegtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::HOMBEGTIME, $hombegtime, $comparison);
    }

    /**
     * Filter the query on the homEndTime column
     *
     * Example usage:
     * <code>
     * $query->filterByHomendtime('2011-03-14'); // WHERE homEndTime = '2011-03-14'
     * $query->filterByHomendtime('now'); // WHERE homEndTime = '2011-03-14'
     * $query->filterByHomendtime(array('max' => 'yesterday')); // WHERE homEndTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $homendtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByHomendtime($homendtime = null, $comparison = null)
    {
        if (is_array($homendtime)) {
            $useMinMax = false;
            if (isset($homendtime['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMENDTIME, $homendtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homendtime['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMENDTIME, $homendtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::HOMENDTIME, $homendtime, $comparison);
    }

    /**
     * Filter the query on the homPlan column
     *
     * Example usage:
     * <code>
     * $query->filterByHomplan(1234); // WHERE homPlan = 1234
     * $query->filterByHomplan(array(12, 34)); // WHERE homPlan IN (12, 34)
     * $query->filterByHomplan(array('min' => 12)); // WHERE homPlan >= 12
     * $query->filterByHomplan(array('max' => 12)); // WHERE homPlan <= 12
     * </code>
     *
     * @param     mixed $homplan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByHomplan($homplan = null, $comparison = null)
    {
        if (is_array($homplan)) {
            $useMinMax = false;
            if (isset($homplan['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMPLAN, $homplan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homplan['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMPLAN, $homplan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::HOMPLAN, $homplan, $comparison);
    }

    /**
     * Filter the query on the homBegTime2 column
     *
     * Example usage:
     * <code>
     * $query->filterByHombegtime2('2011-03-14'); // WHERE homBegTime2 = '2011-03-14'
     * $query->filterByHombegtime2('now'); // WHERE homBegTime2 = '2011-03-14'
     * $query->filterByHombegtime2(array('max' => 'yesterday')); // WHERE homBegTime2 > '2011-03-13'
     * </code>
     *
     * @param     mixed $hombegtime2 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByHombegtime2($hombegtime2 = null, $comparison = null)
    {
        if (is_array($hombegtime2)) {
            $useMinMax = false;
            if (isset($hombegtime2['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMBEGTIME2, $hombegtime2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hombegtime2['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMBEGTIME2, $hombegtime2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::HOMBEGTIME2, $hombegtime2, $comparison);
    }

    /**
     * Filter the query on the homEndTime2 column
     *
     * Example usage:
     * <code>
     * $query->filterByHomendtime2('2011-03-14'); // WHERE homEndTime2 = '2011-03-14'
     * $query->filterByHomendtime2('now'); // WHERE homEndTime2 = '2011-03-14'
     * $query->filterByHomendtime2(array('max' => 'yesterday')); // WHERE homEndTime2 > '2011-03-13'
     * </code>
     *
     * @param     mixed $homendtime2 The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByHomendtime2($homendtime2 = null, $comparison = null)
    {
        if (is_array($homendtime2)) {
            $useMinMax = false;
            if (isset($homendtime2['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMENDTIME2, $homendtime2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homendtime2['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMENDTIME2, $homendtime2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::HOMENDTIME2, $homendtime2, $comparison);
    }

    /**
     * Filter the query on the homPlan2 column
     *
     * Example usage:
     * <code>
     * $query->filterByHomplan2(1234); // WHERE homPlan2 = 1234
     * $query->filterByHomplan2(array(12, 34)); // WHERE homPlan2 IN (12, 34)
     * $query->filterByHomplan2(array('min' => 12)); // WHERE homPlan2 >= 12
     * $query->filterByHomplan2(array('max' => 12)); // WHERE homPlan2 <= 12
     * </code>
     *
     * @param     mixed $homplan2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function filterByHomplan2($homplan2 = null, $comparison = null)
    {
        if (is_array($homplan2)) {
            $useMinMax = false;
            if (isset($homplan2['min'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMPLAN2, $homplan2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homplan2['max'])) {
                $this->addUsingAlias(PersontimetemplatePeer::HOMPLAN2, $homplan2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersontimetemplatePeer::HOMPLAN2, $homplan2, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Persontimetemplate $persontimetemplate Object to remove from the list of results
     *
     * @return PersontimetemplateQuery The current query, for fluid interface
     */
    public function prune($persontimetemplate = null)
    {
        if ($persontimetemplate) {
            $this->addUsingAlias(PersontimetemplatePeer::ID, $persontimetemplate->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
