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
use Webmis\Models\Actionpropertytype;
use Webmis\Models\ActionpropertytypePeer;
use Webmis\Models\ActionpropertytypeQuery;

/**
 * Base class that represents a query for the 'ActionPropertyType' table.
 *
 *
 *
 * @method ActionpropertytypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionpropertytypeQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ActionpropertytypeQuery orderByActiontypeId($order = Criteria::ASC) Order by the actionType_id column
 * @method ActionpropertytypeQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method ActionpropertytypeQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method ActionpropertytypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ActionpropertytypeQuery orderByDescr($order = Criteria::ASC) Order by the descr column
 * @method ActionpropertytypeQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method ActionpropertytypeQuery orderByTypename($order = Criteria::ASC) Order by the typeName column
 * @method ActionpropertytypeQuery orderByValuedomain($order = Criteria::ASC) Order by the valueDomain column
 * @method ActionpropertytypeQuery orderByDefaultvalue($order = Criteria::ASC) Order by the defaultValue column
 * @method ActionpropertytypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method ActionpropertytypeQuery orderByIsvector($order = Criteria::ASC) Order by the isVector column
 * @method ActionpropertytypeQuery orderByNorm($order = Criteria::ASC) Order by the norm column
 * @method ActionpropertytypeQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method ActionpropertytypeQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method ActionpropertytypeQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method ActionpropertytypeQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method ActionpropertytypeQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method ActionpropertytypeQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method ActionpropertytypeQuery orderByPenalty($order = Criteria::ASC) Order by the penalty column
 * @method ActionpropertytypeQuery orderByVisibleinjobticket($order = Criteria::ASC) Order by the visibleInJobTicket column
 * @method ActionpropertytypeQuery orderByIsassignable($order = Criteria::ASC) Order by the isAssignable column
 * @method ActionpropertytypeQuery orderByTestId($order = Criteria::ASC) Order by the test_id column
 * @method ActionpropertytypeQuery orderByDefaultevaluation($order = Criteria::ASC) Order by the defaultEvaluation column
 * @method ActionpropertytypeQuery orderByToepicrisis($order = Criteria::ASC) Order by the toEpicrisis column
 * @method ActionpropertytypeQuery orderByMandatory($order = Criteria::ASC) Order by the mandatory column
 * @method ActionpropertytypeQuery orderByReadonly($order = Criteria::ASC) Order by the readOnly column
 *
 * @method ActionpropertytypeQuery groupById() Group by the id column
 * @method ActionpropertytypeQuery groupByDeleted() Group by the deleted column
 * @method ActionpropertytypeQuery groupByActiontypeId() Group by the actionType_id column
 * @method ActionpropertytypeQuery groupByIdx() Group by the idx column
 * @method ActionpropertytypeQuery groupByTemplateId() Group by the template_id column
 * @method ActionpropertytypeQuery groupByName() Group by the name column
 * @method ActionpropertytypeQuery groupByDescr() Group by the descr column
 * @method ActionpropertytypeQuery groupByUnitId() Group by the unit_id column
 * @method ActionpropertytypeQuery groupByTypename() Group by the typeName column
 * @method ActionpropertytypeQuery groupByValuedomain() Group by the valueDomain column
 * @method ActionpropertytypeQuery groupByDefaultvalue() Group by the defaultValue column
 * @method ActionpropertytypeQuery groupByCode() Group by the code column
 * @method ActionpropertytypeQuery groupByIsvector() Group by the isVector column
 * @method ActionpropertytypeQuery groupByNorm() Group by the norm column
 * @method ActionpropertytypeQuery groupBySex() Group by the sex column
 * @method ActionpropertytypeQuery groupByAge() Group by the age column
 * @method ActionpropertytypeQuery groupByAgeBu() Group by the age_bu column
 * @method ActionpropertytypeQuery groupByAgeBc() Group by the age_bc column
 * @method ActionpropertytypeQuery groupByAgeEu() Group by the age_eu column
 * @method ActionpropertytypeQuery groupByAgeEc() Group by the age_ec column
 * @method ActionpropertytypeQuery groupByPenalty() Group by the penalty column
 * @method ActionpropertytypeQuery groupByVisibleinjobticket() Group by the visibleInJobTicket column
 * @method ActionpropertytypeQuery groupByIsassignable() Group by the isAssignable column
 * @method ActionpropertytypeQuery groupByTestId() Group by the test_id column
 * @method ActionpropertytypeQuery groupByDefaultevaluation() Group by the defaultEvaluation column
 * @method ActionpropertytypeQuery groupByToepicrisis() Group by the toEpicrisis column
 * @method ActionpropertytypeQuery groupByMandatory() Group by the mandatory column
 * @method ActionpropertytypeQuery groupByReadonly() Group by the readOnly column
 *
 * @method ActionpropertytypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionpropertytypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionpropertytypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Actionpropertytype findOne(PropelPDO $con = null) Return the first Actionpropertytype matching the query
 * @method Actionpropertytype findOneOrCreate(PropelPDO $con = null) Return the first Actionpropertytype matching the query, or a new Actionpropertytype object populated from the query conditions when no match is found
 *
 * @method Actionpropertytype findOneByDeleted(boolean $deleted) Return the first Actionpropertytype filtered by the deleted column
 * @method Actionpropertytype findOneByActiontypeId(int $actionType_id) Return the first Actionpropertytype filtered by the actionType_id column
 * @method Actionpropertytype findOneByIdx(int $idx) Return the first Actionpropertytype filtered by the idx column
 * @method Actionpropertytype findOneByTemplateId(int $template_id) Return the first Actionpropertytype filtered by the template_id column
 * @method Actionpropertytype findOneByName(string $name) Return the first Actionpropertytype filtered by the name column
 * @method Actionpropertytype findOneByDescr(string $descr) Return the first Actionpropertytype filtered by the descr column
 * @method Actionpropertytype findOneByUnitId(int $unit_id) Return the first Actionpropertytype filtered by the unit_id column
 * @method Actionpropertytype findOneByTypename(string $typeName) Return the first Actionpropertytype filtered by the typeName column
 * @method Actionpropertytype findOneByValuedomain(string $valueDomain) Return the first Actionpropertytype filtered by the valueDomain column
 * @method Actionpropertytype findOneByDefaultvalue(string $defaultValue) Return the first Actionpropertytype filtered by the defaultValue column
 * @method Actionpropertytype findOneByCode(string $code) Return the first Actionpropertytype filtered by the code column
 * @method Actionpropertytype findOneByIsvector(boolean $isVector) Return the first Actionpropertytype filtered by the isVector column
 * @method Actionpropertytype findOneByNorm(string $norm) Return the first Actionpropertytype filtered by the norm column
 * @method Actionpropertytype findOneBySex(int $sex) Return the first Actionpropertytype filtered by the sex column
 * @method Actionpropertytype findOneByAge(string $age) Return the first Actionpropertytype filtered by the age column
 * @method Actionpropertytype findOneByAgeBu(int $age_bu) Return the first Actionpropertytype filtered by the age_bu column
 * @method Actionpropertytype findOneByAgeBc(int $age_bc) Return the first Actionpropertytype filtered by the age_bc column
 * @method Actionpropertytype findOneByAgeEu(int $age_eu) Return the first Actionpropertytype filtered by the age_eu column
 * @method Actionpropertytype findOneByAgeEc(int $age_ec) Return the first Actionpropertytype filtered by the age_ec column
 * @method Actionpropertytype findOneByPenalty(int $penalty) Return the first Actionpropertytype filtered by the penalty column
 * @method Actionpropertytype findOneByVisibleinjobticket(boolean $visibleInJobTicket) Return the first Actionpropertytype filtered by the visibleInJobTicket column
 * @method Actionpropertytype findOneByIsassignable(boolean $isAssignable) Return the first Actionpropertytype filtered by the isAssignable column
 * @method Actionpropertytype findOneByTestId(int $test_id) Return the first Actionpropertytype filtered by the test_id column
 * @method Actionpropertytype findOneByDefaultevaluation(boolean $defaultEvaluation) Return the first Actionpropertytype filtered by the defaultEvaluation column
 * @method Actionpropertytype findOneByToepicrisis(boolean $toEpicrisis) Return the first Actionpropertytype filtered by the toEpicrisis column
 * @method Actionpropertytype findOneByMandatory(boolean $mandatory) Return the first Actionpropertytype filtered by the mandatory column
 * @method Actionpropertytype findOneByReadonly(boolean $readOnly) Return the first Actionpropertytype filtered by the readOnly column
 *
 * @method array findById(int $id) Return Actionpropertytype objects filtered by the id column
 * @method array findByDeleted(boolean $deleted) Return Actionpropertytype objects filtered by the deleted column
 * @method array findByActiontypeId(int $actionType_id) Return Actionpropertytype objects filtered by the actionType_id column
 * @method array findByIdx(int $idx) Return Actionpropertytype objects filtered by the idx column
 * @method array findByTemplateId(int $template_id) Return Actionpropertytype objects filtered by the template_id column
 * @method array findByName(string $name) Return Actionpropertytype objects filtered by the name column
 * @method array findByDescr(string $descr) Return Actionpropertytype objects filtered by the descr column
 * @method array findByUnitId(int $unit_id) Return Actionpropertytype objects filtered by the unit_id column
 * @method array findByTypename(string $typeName) Return Actionpropertytype objects filtered by the typeName column
 * @method array findByValuedomain(string $valueDomain) Return Actionpropertytype objects filtered by the valueDomain column
 * @method array findByDefaultvalue(string $defaultValue) Return Actionpropertytype objects filtered by the defaultValue column
 * @method array findByCode(string $code) Return Actionpropertytype objects filtered by the code column
 * @method array findByIsvector(boolean $isVector) Return Actionpropertytype objects filtered by the isVector column
 * @method array findByNorm(string $norm) Return Actionpropertytype objects filtered by the norm column
 * @method array findBySex(int $sex) Return Actionpropertytype objects filtered by the sex column
 * @method array findByAge(string $age) Return Actionpropertytype objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return Actionpropertytype objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return Actionpropertytype objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return Actionpropertytype objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return Actionpropertytype objects filtered by the age_ec column
 * @method array findByPenalty(int $penalty) Return Actionpropertytype objects filtered by the penalty column
 * @method array findByVisibleinjobticket(boolean $visibleInJobTicket) Return Actionpropertytype objects filtered by the visibleInJobTicket column
 * @method array findByIsassignable(boolean $isAssignable) Return Actionpropertytype objects filtered by the isAssignable column
 * @method array findByTestId(int $test_id) Return Actionpropertytype objects filtered by the test_id column
 * @method array findByDefaultevaluation(boolean $defaultEvaluation) Return Actionpropertytype objects filtered by the defaultEvaluation column
 * @method array findByToepicrisis(boolean $toEpicrisis) Return Actionpropertytype objects filtered by the toEpicrisis column
 * @method array findByMandatory(boolean $mandatory) Return Actionpropertytype objects filtered by the mandatory column
 * @method array findByReadonly(boolean $readOnly) Return Actionpropertytype objects filtered by the readOnly column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionpropertytypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionpropertytypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Actionpropertytype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionpropertytypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionpropertytypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionpropertytypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionpropertytypeQuery) {
            return $criteria;
        }
        $query = new ActionpropertytypeQuery();
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
     * @return   Actionpropertytype|Actionpropertytype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionpropertytypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionpropertytypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actionpropertytype A model object, or null if the key is not found
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
     * @return                 Actionpropertytype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `deleted`, `actionType_id`, `idx`, `template_id`, `name`, `descr`, `unit_id`, `typeName`, `valueDomain`, `defaultValue`, `code`, `isVector`, `norm`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `penalty`, `visibleInJobTicket`, `isAssignable`, `test_id`, `defaultEvaluation`, `toEpicrisis`, `mandatory`, `readOnly` FROM `ActionPropertyType` WHERE `id` = :p0';
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
            $obj = new Actionpropertytype();
            $obj->hydrate($row);
            ActionpropertytypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Actionpropertytype|Actionpropertytype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Actionpropertytype[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionpropertytypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionpropertytypePeer::ID, $keys, Criteria::IN);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::ID, $id, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::DELETED, $deleted, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByActiontypeId($actiontypeId = null, $comparison = null)
    {
        if (is_array($actiontypeId)) {
            $useMinMax = false;
            if (isset($actiontypeId['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::ACTIONTYPE_ID, $actiontypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actiontypeId['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::ACTIONTYPE_ID, $actiontypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::ACTIONTYPE_ID, $actiontypeId, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the template_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplateId(1234); // WHERE template_id = 1234
     * $query->filterByTemplateId(array(12, 34)); // WHERE template_id IN (12, 34)
     * $query->filterByTemplateId(array('min' => 12)); // WHERE template_id >= 12
     * $query->filterByTemplateId(array('max' => 12)); // WHERE template_id <= 12
     * </code>
     *
     * @param     mixed $templateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByTemplateId($templateId = null, $comparison = null)
    {
        if (is_array($templateId)) {
            $useMinMax = false;
            if (isset($templateId['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::TEMPLATE_ID, $templateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($templateId['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::TEMPLATE_ID, $templateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::TEMPLATE_ID, $templateId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the descr column
     *
     * Example usage:
     * <code>
     * $query->filterByDescr('fooValue');   // WHERE descr = 'fooValue'
     * $query->filterByDescr('%fooValue%'); // WHERE descr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByDescr($descr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descr)) {
                $descr = str_replace('*', '%', $descr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::DESCR, $descr, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::UNIT_ID, $unitId, $comparison);
    }

    /**
     * Filter the query on the typeName column
     *
     * Example usage:
     * <code>
     * $query->filterByTypename('fooValue');   // WHERE typeName = 'fooValue'
     * $query->filterByTypename('%fooValue%'); // WHERE typeName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByTypename($typename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $typename)) {
                $typename = str_replace('*', '%', $typename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::TYPENAME, $typename, $comparison);
    }

    /**
     * Filter the query on the valueDomain column
     *
     * Example usage:
     * <code>
     * $query->filterByValuedomain('fooValue');   // WHERE valueDomain = 'fooValue'
     * $query->filterByValuedomain('%fooValue%'); // WHERE valueDomain LIKE '%fooValue%'
     * </code>
     *
     * @param     string $valuedomain The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByValuedomain($valuedomain = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($valuedomain)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $valuedomain)) {
                $valuedomain = str_replace('*', '%', $valuedomain);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::VALUEDOMAIN, $valuedomain, $comparison);
    }

    /**
     * Filter the query on the defaultValue column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultvalue('fooValue');   // WHERE defaultValue = 'fooValue'
     * $query->filterByDefaultvalue('%fooValue%'); // WHERE defaultValue LIKE '%fooValue%'
     * </code>
     *
     * @param     string $defaultvalue The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByDefaultvalue($defaultvalue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($defaultvalue)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $defaultvalue)) {
                $defaultvalue = str_replace('*', '%', $defaultvalue);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::DEFAULTVALUE, $defaultvalue, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the isVector column
     *
     * Example usage:
     * <code>
     * $query->filterByIsvector(true); // WHERE isVector = true
     * $query->filterByIsvector('yes'); // WHERE isVector = true
     * </code>
     *
     * @param     boolean|string $isvector The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByIsvector($isvector = null, $comparison = null)
    {
        if (is_string($isvector)) {
            $isvector = in_array(strtolower($isvector), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::ISVECTOR, $isvector, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActionpropertytypePeer::NORM, $norm, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex(1234); // WHERE sex = 1234
     * $query->filterBySex(array(12, 34)); // WHERE sex IN (12, 34)
     * $query->filterBySex(array('min' => 12)); // WHERE sex >= 12
     * $query->filterBySex(array('max' => 12)); // WHERE sex <= 12
     * </code>
     *
     * @param     mixed $sex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge('fooValue');   // WHERE age = 'fooValue'
     * $query->filterByAge('%fooValue%'); // WHERE age LIKE '%fooValue%'
     * </code>
     *
     * @param     string $age The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($age)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $age)) {
                $age = str_replace('*', '%', $age);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::AGE, $age, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::AGE_BU, $ageBu, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::AGE_BC, $ageBc, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::AGE_EU, $ageEu, $comparison);
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
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the penalty column
     *
     * Example usage:
     * <code>
     * $query->filterByPenalty(1234); // WHERE penalty = 1234
     * $query->filterByPenalty(array(12, 34)); // WHERE penalty IN (12, 34)
     * $query->filterByPenalty(array('min' => 12)); // WHERE penalty >= 12
     * $query->filterByPenalty(array('max' => 12)); // WHERE penalty <= 12
     * </code>
     *
     * @param     mixed $penalty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByPenalty($penalty = null, $comparison = null)
    {
        if (is_array($penalty)) {
            $useMinMax = false;
            if (isset($penalty['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::PENALTY, $penalty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penalty['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::PENALTY, $penalty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::PENALTY, $penalty, $comparison);
    }

    /**
     * Filter the query on the visibleInJobTicket column
     *
     * Example usage:
     * <code>
     * $query->filterByVisibleinjobticket(true); // WHERE visibleInJobTicket = true
     * $query->filterByVisibleinjobticket('yes'); // WHERE visibleInJobTicket = true
     * </code>
     *
     * @param     boolean|string $visibleinjobticket The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByVisibleinjobticket($visibleinjobticket = null, $comparison = null)
    {
        if (is_string($visibleinjobticket)) {
            $visibleinjobticket = in_array(strtolower($visibleinjobticket), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::VISIBLEINJOBTICKET, $visibleinjobticket, $comparison);
    }

    /**
     * Filter the query on the isAssignable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsassignable(true); // WHERE isAssignable = true
     * $query->filterByIsassignable('yes'); // WHERE isAssignable = true
     * </code>
     *
     * @param     boolean|string $isassignable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByIsassignable($isassignable = null, $comparison = null)
    {
        if (is_string($isassignable)) {
            $isassignable = in_array(strtolower($isassignable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::ISASSIGNABLE, $isassignable, $comparison);
    }

    /**
     * Filter the query on the test_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTestId(1234); // WHERE test_id = 1234
     * $query->filterByTestId(array(12, 34)); // WHERE test_id IN (12, 34)
     * $query->filterByTestId(array('min' => 12)); // WHERE test_id >= 12
     * $query->filterByTestId(array('max' => 12)); // WHERE test_id <= 12
     * </code>
     *
     * @param     mixed $testId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByTestId($testId = null, $comparison = null)
    {
        if (is_array($testId)) {
            $useMinMax = false;
            if (isset($testId['min'])) {
                $this->addUsingAlias(ActionpropertytypePeer::TEST_ID, $testId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($testId['max'])) {
                $this->addUsingAlias(ActionpropertytypePeer::TEST_ID, $testId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionpropertytypePeer::TEST_ID, $testId, $comparison);
    }

    /**
     * Filter the query on the defaultEvaluation column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultevaluation(true); // WHERE defaultEvaluation = true
     * $query->filterByDefaultevaluation('yes'); // WHERE defaultEvaluation = true
     * </code>
     *
     * @param     boolean|string $defaultevaluation The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByDefaultevaluation($defaultevaluation = null, $comparison = null)
    {
        if (is_string($defaultevaluation)) {
            $defaultevaluation = in_array(strtolower($defaultevaluation), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::DEFAULTEVALUATION, $defaultevaluation, $comparison);
    }

    /**
     * Filter the query on the toEpicrisis column
     *
     * Example usage:
     * <code>
     * $query->filterByToepicrisis(true); // WHERE toEpicrisis = true
     * $query->filterByToepicrisis('yes'); // WHERE toEpicrisis = true
     * </code>
     *
     * @param     boolean|string $toepicrisis The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByToepicrisis($toepicrisis = null, $comparison = null)
    {
        if (is_string($toepicrisis)) {
            $toepicrisis = in_array(strtolower($toepicrisis), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::TOEPICRISIS, $toepicrisis, $comparison);
    }

    /**
     * Filter the query on the mandatory column
     *
     * Example usage:
     * <code>
     * $query->filterByMandatory(true); // WHERE mandatory = true
     * $query->filterByMandatory('yes'); // WHERE mandatory = true
     * </code>
     *
     * @param     boolean|string $mandatory The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByMandatory($mandatory = null, $comparison = null)
    {
        if (is_string($mandatory)) {
            $mandatory = in_array(strtolower($mandatory), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::MANDATORY, $mandatory, $comparison);
    }

    /**
     * Filter the query on the readOnly column
     *
     * Example usage:
     * <code>
     * $query->filterByReadonly(true); // WHERE readOnly = true
     * $query->filterByReadonly('yes'); // WHERE readOnly = true
     * </code>
     *
     * @param     boolean|string $readonly The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function filterByReadonly($readonly = null, $comparison = null)
    {
        if (is_string($readonly)) {
            $readonly = in_array(strtolower($readonly), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActionpropertytypePeer::READONLY, $readonly, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Actionpropertytype $actionpropertytype Object to remove from the list of results
     *
     * @return ActionpropertytypeQuery The current query, for fluid interface
     */
    public function prune($actionpropertytype = null)
    {
        if ($actionpropertytype) {
            $this->addUsingAlias(ActionpropertytypePeer::ID, $actionpropertytype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
