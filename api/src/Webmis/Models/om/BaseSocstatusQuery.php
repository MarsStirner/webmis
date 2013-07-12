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
use Webmis\Models\Socstatus;
use Webmis\Models\SocstatusPeer;
use Webmis\Models\SocstatusQuery;

/**
 * Base class that represents a query for the 'SocStatus' table.
 *
 *
 *
 * @method SocstatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method SocstatusQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method SocstatusQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method SocstatusQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method SocstatusQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method SocstatusQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method SocstatusQuery orderBySocstatusclassId($order = Criteria::ASC) Order by the socStatusClass_id column
 * @method SocstatusQuery orderBySocstatustypeId($order = Criteria::ASC) Order by the socStatusType_id column
 *
 * @method SocstatusQuery groupById() Group by the id column
 * @method SocstatusQuery groupByCreatedatetime() Group by the createDatetime column
 * @method SocstatusQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method SocstatusQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method SocstatusQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method SocstatusQuery groupByDeleted() Group by the deleted column
 * @method SocstatusQuery groupBySocstatusclassId() Group by the socStatusClass_id column
 * @method SocstatusQuery groupBySocstatustypeId() Group by the socStatusType_id column
 *
 * @method SocstatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SocstatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SocstatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Socstatus findOne(PropelPDO $con = null) Return the first Socstatus matching the query
 * @method Socstatus findOneOrCreate(PropelPDO $con = null) Return the first Socstatus matching the query, or a new Socstatus object populated from the query conditions when no match is found
 *
 * @method Socstatus findOneByCreatedatetime(string $createDatetime) Return the first Socstatus filtered by the createDatetime column
 * @method Socstatus findOneByCreatepersonId(int $createPerson_id) Return the first Socstatus filtered by the createPerson_id column
 * @method Socstatus findOneByModifydatetime(string $modifyDatetime) Return the first Socstatus filtered by the modifyDatetime column
 * @method Socstatus findOneByModifypersonId(int $modifyPerson_id) Return the first Socstatus filtered by the modifyPerson_id column
 * @method Socstatus findOneByDeleted(boolean $deleted) Return the first Socstatus filtered by the deleted column
 * @method Socstatus findOneBySocstatusclassId(int $socStatusClass_id) Return the first Socstatus filtered by the socStatusClass_id column
 * @method Socstatus findOneBySocstatustypeId(int $socStatusType_id) Return the first Socstatus filtered by the socStatusType_id column
 *
 * @method array findById(int $id) Return Socstatus objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Socstatus objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Socstatus objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Socstatus objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Socstatus objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Socstatus objects filtered by the deleted column
 * @method array findBySocstatusclassId(int $socStatusClass_id) Return Socstatus objects filtered by the socStatusClass_id column
 * @method array findBySocstatustypeId(int $socStatusType_id) Return Socstatus objects filtered by the socStatusType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseSocstatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSocstatusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Socstatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SocstatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SocstatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SocstatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SocstatusQuery) {
            return $criteria;
        }
        $query = new SocstatusQuery();
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
     * @return   Socstatus|Socstatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SocstatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SocstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Socstatus A model object, or null if the key is not found
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
     * @return                 Socstatus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `socStatusClass_id`, `socStatusType_id` FROM `SocStatus` WHERE `id` = :p0';
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
            $obj = new Socstatus();
            $obj->hydrate($row);
            SocstatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Socstatus|Socstatus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Socstatus[]|mixed the list of results, formatted by the current formatter
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SocstatusPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SocstatusPeer::ID, $keys, Criteria::IN);
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(SocstatusPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SocstatusPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::ID, $id, $comparison);
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(SocstatusPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(SocstatusPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(SocstatusPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(SocstatusPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(SocstatusPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(SocstatusPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(SocstatusPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(SocstatusPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SocstatusPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the socStatusClass_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocstatusclassId(1234); // WHERE socStatusClass_id = 1234
     * $query->filterBySocstatusclassId(array(12, 34)); // WHERE socStatusClass_id IN (12, 34)
     * $query->filterBySocstatusclassId(array('min' => 12)); // WHERE socStatusClass_id >= 12
     * $query->filterBySocstatusclassId(array('max' => 12)); // WHERE socStatusClass_id <= 12
     * </code>
     *
     * @param     mixed $socstatusclassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterBySocstatusclassId($socstatusclassId = null, $comparison = null)
    {
        if (is_array($socstatusclassId)) {
            $useMinMax = false;
            if (isset($socstatusclassId['min'])) {
                $this->addUsingAlias(SocstatusPeer::SOCSTATUSCLASS_ID, $socstatusclassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socstatusclassId['max'])) {
                $this->addUsingAlias(SocstatusPeer::SOCSTATUSCLASS_ID, $socstatusclassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::SOCSTATUSCLASS_ID, $socstatusclassId, $comparison);
    }

    /**
     * Filter the query on the socStatusType_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocstatustypeId(1234); // WHERE socStatusType_id = 1234
     * $query->filterBySocstatustypeId(array(12, 34)); // WHERE socStatusType_id IN (12, 34)
     * $query->filterBySocstatustypeId(array('min' => 12)); // WHERE socStatusType_id >= 12
     * $query->filterBySocstatustypeId(array('max' => 12)); // WHERE socStatusType_id <= 12
     * </code>
     *
     * @param     mixed $socstatustypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function filterBySocstatustypeId($socstatustypeId = null, $comparison = null)
    {
        if (is_array($socstatustypeId)) {
            $useMinMax = false;
            if (isset($socstatustypeId['min'])) {
                $this->addUsingAlias(SocstatusPeer::SOCSTATUSTYPE_ID, $socstatustypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socstatustypeId['max'])) {
                $this->addUsingAlias(SocstatusPeer::SOCSTATUSTYPE_ID, $socstatustypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SocstatusPeer::SOCSTATUSTYPE_ID, $socstatustypeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Socstatus $socstatus Object to remove from the list of results
     *
     * @return SocstatusQuery The current query, for fluid interface
     */
    public function prune($socstatus = null)
    {
        if ($socstatus) {
            $this->addUsingAlias(SocstatusPeer::ID, $socstatus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
