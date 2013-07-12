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
use Webmis\Models\OrgstructureDisabledattendance;
use Webmis\Models\Rbattachtype;
use Webmis\Models\RbattachtypePeer;
use Webmis\Models\RbattachtypeQuery;

/**
 * Base class that represents a query for the 'rbAttachType' table.
 *
 *
 *
 * @method RbattachtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbattachtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbattachtypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbattachtypeQuery orderByTemporary($order = Criteria::ASC) Order by the temporary column
 * @method RbattachtypeQuery orderByOutcome($order = Criteria::ASC) Order by the outcome column
 * @method RbattachtypeQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 *
 * @method RbattachtypeQuery groupById() Group by the id column
 * @method RbattachtypeQuery groupByCode() Group by the code column
 * @method RbattachtypeQuery groupByName() Group by the name column
 * @method RbattachtypeQuery groupByTemporary() Group by the temporary column
 * @method RbattachtypeQuery groupByOutcome() Group by the outcome column
 * @method RbattachtypeQuery groupByFinanceId() Group by the finance_id column
 *
 * @method RbattachtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbattachtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbattachtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbattachtypeQuery leftJoinOrgstructureDisabledattendance($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureDisabledattendance relation
 * @method RbattachtypeQuery rightJoinOrgstructureDisabledattendance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureDisabledattendance relation
 * @method RbattachtypeQuery innerJoinOrgstructureDisabledattendance($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureDisabledattendance relation
 *
 * @method Rbattachtype findOne(PropelPDO $con = null) Return the first Rbattachtype matching the query
 * @method Rbattachtype findOneOrCreate(PropelPDO $con = null) Return the first Rbattachtype matching the query, or a new Rbattachtype object populated from the query conditions when no match is found
 *
 * @method Rbattachtype findOneByCode(string $code) Return the first Rbattachtype filtered by the code column
 * @method Rbattachtype findOneByName(string $name) Return the first Rbattachtype filtered by the name column
 * @method Rbattachtype findOneByTemporary(boolean $temporary) Return the first Rbattachtype filtered by the temporary column
 * @method Rbattachtype findOneByOutcome(int $outcome) Return the first Rbattachtype filtered by the outcome column
 * @method Rbattachtype findOneByFinanceId(int $finance_id) Return the first Rbattachtype filtered by the finance_id column
 *
 * @method array findById(int $id) Return Rbattachtype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbattachtype objects filtered by the code column
 * @method array findByName(string $name) Return Rbattachtype objects filtered by the name column
 * @method array findByTemporary(boolean $temporary) Return Rbattachtype objects filtered by the temporary column
 * @method array findByOutcome(int $outcome) Return Rbattachtype objects filtered by the outcome column
 * @method array findByFinanceId(int $finance_id) Return Rbattachtype objects filtered by the finance_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbattachtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbattachtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbattachtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbattachtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbattachtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbattachtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbattachtypeQuery) {
            return $criteria;
        }
        $query = new RbattachtypeQuery();
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
     * @return   Rbattachtype|Rbattachtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbattachtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbattachtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbattachtype A model object, or null if the key is not found
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
     * @return                 Rbattachtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `temporary`, `outcome`, `finance_id` FROM `rbAttachType` WHERE `id` = :p0';
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
            $obj = new Rbattachtype();
            $obj->hydrate($row);
            RbattachtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbattachtype|Rbattachtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbattachtype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbattachtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbattachtypePeer::ID, $keys, Criteria::IN);
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
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbattachtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbattachtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbattachtypePeer::ID, $id, $comparison);
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
     * @return RbattachtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbattachtypePeer::CODE, $code, $comparison);
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
     * @return RbattachtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbattachtypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the temporary column
     *
     * Example usage:
     * <code>
     * $query->filterByTemporary(true); // WHERE temporary = true
     * $query->filterByTemporary('yes'); // WHERE temporary = true
     * </code>
     *
     * @param     boolean|string $temporary The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function filterByTemporary($temporary = null, $comparison = null)
    {
        if (is_string($temporary)) {
            $temporary = in_array(strtolower($temporary), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbattachtypePeer::TEMPORARY, $temporary, $comparison);
    }

    /**
     * Filter the query on the outcome column
     *
     * Example usage:
     * <code>
     * $query->filterByOutcome(1234); // WHERE outcome = 1234
     * $query->filterByOutcome(array(12, 34)); // WHERE outcome IN (12, 34)
     * $query->filterByOutcome(array('min' => 12)); // WHERE outcome >= 12
     * $query->filterByOutcome(array('max' => 12)); // WHERE outcome <= 12
     * </code>
     *
     * @param     mixed $outcome The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function filterByOutcome($outcome = null, $comparison = null)
    {
        if (is_array($outcome)) {
            $useMinMax = false;
            if (isset($outcome['min'])) {
                $this->addUsingAlias(RbattachtypePeer::OUTCOME, $outcome['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($outcome['max'])) {
                $this->addUsingAlias(RbattachtypePeer::OUTCOME, $outcome['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbattachtypePeer::OUTCOME, $outcome, $comparison);
    }

    /**
     * Filter the query on the finance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFinanceId(1234); // WHERE finance_id = 1234
     * $query->filterByFinanceId(array(12, 34)); // WHERE finance_id IN (12, 34)
     * $query->filterByFinanceId(array('min' => 12)); // WHERE finance_id >= 12
     * $query->filterByFinanceId(array('max' => 12)); // WHERE finance_id <= 12
     * </code>
     *
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(RbattachtypePeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(RbattachtypePeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbattachtypePeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query by a related OrgstructureDisabledattendance object
     *
     * @param   OrgstructureDisabledattendance|PropelObjectCollection $orgstructureDisabledattendance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbattachtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureDisabledattendance($orgstructureDisabledattendance, $comparison = null)
    {
        if ($orgstructureDisabledattendance instanceof OrgstructureDisabledattendance) {
            return $this
                ->addUsingAlias(RbattachtypePeer::ID, $orgstructureDisabledattendance->getAttachtypeId(), $comparison);
        } elseif ($orgstructureDisabledattendance instanceof PropelObjectCollection) {
            return $this
                ->useOrgstructureDisabledattendanceQuery()
                ->filterByPrimaryKeys($orgstructureDisabledattendance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOrgstructureDisabledattendance() only accepts arguments of type OrgstructureDisabledattendance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureDisabledattendance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function joinOrgstructureDisabledattendance($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureDisabledattendance');

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
            $this->addJoinObject($join, 'OrgstructureDisabledattendance');
        }

        return $this;
    }

    /**
     * Use the OrgstructureDisabledattendance relation OrgstructureDisabledattendance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureDisabledattendanceQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureDisabledattendanceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureDisabledattendance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureDisabledattendance', '\Webmis\Models\OrgstructureDisabledattendanceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbattachtype $rbattachtype Object to remove from the list of results
     *
     * @return RbattachtypeQuery The current query, for fluid interface
     */
    public function prune($rbattachtype = null)
    {
        if ($rbattachtype) {
            $this->addUsingAlias(RbattachtypePeer::ID, $rbattachtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
