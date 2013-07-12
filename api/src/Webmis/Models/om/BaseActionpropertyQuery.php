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
use Webmis\Models\Actionproperty;
use Webmis\Models\ActionpropertyHospitalbed;
use Webmis\Models\ActionpropertyPeer;
use Webmis\Models\ActionpropertyPerson;
use Webmis\Models\ActionpropertyQuery;

/**
 * Base class that represents a query for the 'ActionProperty' table.
 *
 *
 *
 * @method ActionpropertyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionpropertyQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ActionpropertyQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ActionpropertyQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ActionpropertyQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ActionpropertyQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ActionpropertyQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method ActionpropertyQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method ActionpropertyQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method ActionpropertyQuery orderByNorm($order = Criteria::ASC) Order by the norm column
 * @method ActionpropertyQuery orderByIsassigned($order = Criteria::ASC) Order by the isAssigned column
 * @method ActionpropertyQuery orderByEvaluation($order = Criteria::ASC) Order by the evaluation column
 * @method ActionpropertyQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ActionpropertyQuery groupById() Group by the id column
 * @method ActionpropertyQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ActionpropertyQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ActionpropertyQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ActionpropertyQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ActionpropertyQuery groupByDeleted() Group by the deleted column
 * @method ActionpropertyQuery groupByActionId() Group by the action_id column
 * @method ActionpropertyQuery groupByTypeId() Group by the type_id column
 * @method ActionpropertyQuery groupByUnitId() Group by the unit_id column
 * @method ActionpropertyQuery groupByNorm() Group by the norm column
 * @method ActionpropertyQuery groupByIsassigned() Group by the isAssigned column
 * @method ActionpropertyQuery groupByEvaluation() Group by the evaluation column
 * @method ActionpropertyQuery groupByVersion() Group by the version column
 *
 * @method ActionpropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionpropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionpropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionpropertyQuery leftJoinActionpropertyHospitalbed($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionpropertyHospitalbed relation
 * @method ActionpropertyQuery rightJoinActionpropertyHospitalbed($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionpropertyHospitalbed relation
 * @method ActionpropertyQuery innerJoinActionpropertyHospitalbed($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionpropertyHospitalbed relation
 *
 * @method ActionpropertyQuery leftJoinActionpropertyPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionpropertyPerson relation
 * @method ActionpropertyQuery rightJoinActionpropertyPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionpropertyPerson relation
 * @method ActionpropertyQuery innerJoinActionpropertyPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionpropertyPerson relation
 *
 * @method Actionproperty findOne(PropelPDO $con = null) Return the first Actionproperty matching the query
 * @method Actionproperty findOneOrCreate(PropelPDO $con = null) Return the first Actionproperty matching the query, or a new Actionproperty object populated from the query conditions when no match is found
 *
 * @method Actionproperty findOneByCreatedatetime(string $createDatetime) Return the first Actionproperty filtered by the createDatetime column
 * @method Actionproperty findOneByCreatepersonId(int $createPerson_id) Return the first Actionproperty filtered by the createPerson_id column
 * @method Actionproperty findOneByModifydatetime(string $modifyDatetime) Return the first Actionproperty filtered by the modifyDatetime column
 * @method Actionproperty findOneByModifypersonId(int $modifyPerson_id) Return the first Actionproperty filtered by the modifyPerson_id column
 * @method Actionproperty findOneByDeleted(boolean $deleted) Return the first Actionproperty filtered by the deleted column
 * @method Actionproperty findOneByActionId(int $action_id) Return the first Actionproperty filtered by the action_id column
 * @method Actionproperty findOneByTypeId(int $type_id) Return the first Actionproperty filtered by the type_id column
 * @method Actionproperty findOneByUnitId(int $unit_id) Return the first Actionproperty filtered by the unit_id column
 * @method Actionproperty findOneByNorm(string $norm) Return the first Actionproperty filtered by the norm column
 * @method Actionproperty findOneByIsassigned(boolean $isAssigned) Return the first Actionproperty filtered by the isAssigned column
 * @method Actionproperty findOneByEvaluation(boolean $evaluation) Return the first Actionproperty filtered by the evaluation column
 * @method Actionproperty findOneByVersion(int $version) Return the first Actionproperty filtered by the version column
 *
 * @method array findById(int $id) Return Actionproperty objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Actionproperty objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Actionproperty objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Actionproperty objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Actionproperty objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Actionproperty objects filtered by the deleted column
 * @method array findByActionId(int $action_id) Return Actionproperty objects filtered by the action_id column
 * @method array findByTypeId(int $type_id) Return Actionproperty objects filtered by the type_id column
 * @method array findByUnitId(int $unit_id) Return Actionproperty objects filtered by the unit_id column
 * @method array findByNorm(string $norm) Return Actionproperty objects filtered by the norm column
 * @method array findByIsassigned(boolean $isAssigned) Return Actionproperty objects filtered by the isAssigned column
 * @method array findByEvaluation(boolean $evaluation) Return Actionproperty objects filtered by the evaluation column
 * @method array findByVersion(int $version) Return Actionproperty objects filtered by the version column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionpropertyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Actionproperty', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionpropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionpropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionpropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionpropertyQuery) {
            return $criteria;
        }
        $query = new ActionpropertyQuery();
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
     * @return   Actionproperty|Actionproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionpropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actionproperty A model object, or null if the key is not found
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
     * @return                 Actionproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `action_id`, `type_id`, `unit_id`, `norm`, `isAssigned`, `evaluation`, `version` FROM `ActionProperty` WHERE `id` = :p0';
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
            $obj = new Actionproperty();
            $obj->hydrate($row);
            ActionpropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Actionproperty|Actionproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Actionproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionpropertyPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionpropertyPeer::ID, $keys, Criteria::IN);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::ID, $id, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertyPeer::DELETED, $deleted, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id >= 12
     * $query->filterByTypeId(array('max' => 12)); // WHERE type_id <= 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query on the unit_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitId(1234); // WHERE unit_id = 1234
     * $query->filterByUnitId(array(12, 34)); // WHERE unit_id IN (12, 34)
     * $query->filterByUnitId(array('min' => 12)); // WHERE unit_id >= 12
     * $query->filterByUnitId(array('max' => 12)); // WHERE unit_id <= 12
     * </code>
     *
     * @param     mixed $unitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::UNIT_ID, $unitId, $comparison);
    }

    /**
     * Filter the query on the norm column
     *
     * Example usage:
     * <code>
     * $query->filterByNorm('fooValue');   // WHERE norm = 'fooValue'
     * $query->filterByNorm('%fooValue%'); // WHERE norm LIKE '%fooValue%'
     * </code>
     *
     * @param     string $norm The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByNorm($norm = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($norm)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $norm)) {
                $norm = str_replace('*', '%', $norm);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::NORM, $norm, $comparison);
    }

    /**
     * Filter the query on the isAssigned column
     *
     * Example usage:
     * <code>
     * $query->filterByIsassigned(true); // WHERE isAssigned = true
     * $query->filterByIsassigned('yes'); // WHERE isAssigned = true
     * </code>
     *
     * @param     boolean|string $isassigned The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByIsassigned($isassigned = null, $comparison = null)
    {
        if (is_string($isassigned)) {
            $isassigned = in_array(strtolower($isassigned), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertyPeer::ISASSIGNED, $isassigned, $comparison);
    }

    /**
     * Filter the query on the evaluation column
     *
     * Example usage:
     * <code>
     * $query->filterByEvaluation(true); // WHERE evaluation = true
     * $query->filterByEvaluation('yes'); // WHERE evaluation = true
     * </code>
     *
     * @param     boolean|string $evaluation The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByEvaluation($evaluation = null, $comparison = null)
    {
        if (is_string($evaluation)) {
            $evaluation = in_array(strtolower($evaluation), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertyPeer::EVALUATION, $evaluation, $comparison);
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
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ActionpropertyPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ActionpropertyPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertyPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query by a related ActionpropertyHospitalbed object
     *
     * @param   ActionpropertyHospitalbed|PropelObjectCollection $actionpropertyHospitalbed  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionpropertyHospitalbed($actionpropertyHospitalbed, $comparison = null)
    {
        if ($actionpropertyHospitalbed instanceof ActionpropertyHospitalbed) {
            return $this
                ->addUsingAlias(ActionpropertyPeer::ID, $actionpropertyHospitalbed->getId(), $comparison);
        } elseif ($actionpropertyHospitalbed instanceof PropelObjectCollection) {
            return $this
                ->useActionpropertyHospitalbedQuery()
                ->filterByPrimaryKeys($actionpropertyHospitalbed->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionpropertyHospitalbed() only accepts arguments of type ActionpropertyHospitalbed or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionpropertyHospitalbed relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function joinActionpropertyHospitalbed($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionpropertyHospitalbed');

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
            $this->addJoinObject($join, 'ActionpropertyHospitalbed');
        }

        return $this;
    }

    /**
     * Use the ActionpropertyHospitalbed relation ActionpropertyHospitalbed object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionpropertyHospitalbedQuery A secondary query class using the current class as primary query
     */
    public function useActionpropertyHospitalbedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionpropertyHospitalbed($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionpropertyHospitalbed', '\Webmis\Models\ActionpropertyHospitalbedQuery');
    }

    /**
     * Filter the query by a related ActionpropertyPerson object
     *
     * @param   ActionpropertyPerson|PropelObjectCollection $actionpropertyPerson  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionpropertyPerson($actionpropertyPerson, $comparison = null)
    {
        if ($actionpropertyPerson instanceof ActionpropertyPerson) {
            return $this
                ->addUsingAlias(ActionpropertyPeer::ID, $actionpropertyPerson->getId(), $comparison);
        } elseif ($actionpropertyPerson instanceof PropelObjectCollection) {
            return $this
                ->useActionpropertyPersonQuery()
                ->filterByPrimaryKeys($actionpropertyPerson->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionpropertyPerson() only accepts arguments of type ActionpropertyPerson or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionpropertyPerson relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function joinActionpropertyPerson($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionpropertyPerson');

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
            $this->addJoinObject($join, 'ActionpropertyPerson');
        }

        return $this;
    }

    /**
     * Use the ActionpropertyPerson relation ActionpropertyPerson object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionpropertyPersonQuery A secondary query class using the current class as primary query
     */
    public function useActionpropertyPersonQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionpropertyPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionpropertyPerson', '\Webmis\Models\ActionpropertyPersonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Actionproperty $actionproperty Object to remove from the list of results
     *
     * @return ActionpropertyQuery The current query, for fluid interface
     */
    public function prune($actionproperty = null)
    {
        if ($actionproperty) {
            $this->addUsingAlias(ActionpropertyPeer::ID, $actionproperty->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
