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
use Webmis\Models\Orgstructure;
use Webmis\Models\OrgstructureDisabledattendance;
use Webmis\Models\OrgstructureDisabledattendancePeer;
use Webmis\Models\OrgstructureDisabledattendanceQuery;
use Webmis\Models\Rbattachtype;

/**
 * Base class that represents a query for the 'OrgStructure_DisabledAttendance' table.
 *
 *
 *
 * @method OrgstructureDisabledattendanceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrgstructureDisabledattendanceQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method OrgstructureDisabledattendanceQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method OrgstructureDisabledattendanceQuery orderByAttachtypeId($order = Criteria::ASC) Order by the attachType_id column
 * @method OrgstructureDisabledattendanceQuery orderByDisabledtype($order = Criteria::ASC) Order by the disabledType column
 *
 * @method OrgstructureDisabledattendanceQuery groupById() Group by the id column
 * @method OrgstructureDisabledattendanceQuery groupByMasterId() Group by the master_id column
 * @method OrgstructureDisabledattendanceQuery groupByIdx() Group by the idx column
 * @method OrgstructureDisabledattendanceQuery groupByAttachtypeId() Group by the attachType_id column
 * @method OrgstructureDisabledattendanceQuery groupByDisabledtype() Group by the disabledType column
 *
 * @method OrgstructureDisabledattendanceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrgstructureDisabledattendanceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrgstructureDisabledattendanceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrgstructureDisabledattendanceQuery leftJoinRbattachtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbattachtype relation
 * @method OrgstructureDisabledattendanceQuery rightJoinRbattachtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbattachtype relation
 * @method OrgstructureDisabledattendanceQuery innerJoinRbattachtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbattachtype relation
 *
 * @method OrgstructureDisabledattendanceQuery leftJoinOrgstructure($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orgstructure relation
 * @method OrgstructureDisabledattendanceQuery rightJoinOrgstructure($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orgstructure relation
 * @method OrgstructureDisabledattendanceQuery innerJoinOrgstructure($relationAlias = null) Adds a INNER JOIN clause to the query using the Orgstructure relation
 *
 * @method OrgstructureDisabledattendance findOne(PropelPDO $con = null) Return the first OrgstructureDisabledattendance matching the query
 * @method OrgstructureDisabledattendance findOneOrCreate(PropelPDO $con = null) Return the first OrgstructureDisabledattendance matching the query, or a new OrgstructureDisabledattendance object populated from the query conditions when no match is found
 *
 * @method OrgstructureDisabledattendance findOneByMasterId(int $master_id) Return the first OrgstructureDisabledattendance filtered by the master_id column
 * @method OrgstructureDisabledattendance findOneByIdx(int $idx) Return the first OrgstructureDisabledattendance filtered by the idx column
 * @method OrgstructureDisabledattendance findOneByAttachtypeId(int $attachType_id) Return the first OrgstructureDisabledattendance filtered by the attachType_id column
 * @method OrgstructureDisabledattendance findOneByDisabledtype(boolean $disabledType) Return the first OrgstructureDisabledattendance filtered by the disabledType column
 *
 * @method array findById(int $id) Return OrgstructureDisabledattendance objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return OrgstructureDisabledattendance objects filtered by the master_id column
 * @method array findByIdx(int $idx) Return OrgstructureDisabledattendance objects filtered by the idx column
 * @method array findByAttachtypeId(int $attachType_id) Return OrgstructureDisabledattendance objects filtered by the attachType_id column
 * @method array findByDisabledtype(boolean $disabledType) Return OrgstructureDisabledattendance objects filtered by the disabledType column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrgstructureDisabledattendanceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrgstructureDisabledattendanceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrgstructureDisabledattendance', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrgstructureDisabledattendanceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrgstructureDisabledattendanceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrgstructureDisabledattendanceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrgstructureDisabledattendanceQuery) {
            return $criteria;
        }
        $query = new OrgstructureDisabledattendanceQuery();
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
     * @return   OrgstructureDisabledattendance|OrgstructureDisabledattendance[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrgstructureDisabledattendancePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrgstructureDisabledattendancePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrgstructureDisabledattendance A model object, or null if the key is not found
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
     * @return                 OrgstructureDisabledattendance A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `idx`, `attachType_id`, `disabledType` FROM `OrgStructure_DisabledAttendance` WHERE `id` = :p0';
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
            $obj = new OrgstructureDisabledattendance();
            $obj->hydrate($row);
            OrgstructureDisabledattendancePeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrgstructureDisabledattendance|OrgstructureDisabledattendance[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrgstructureDisabledattendance[]|mixed the list of results, formatted by the current formatter
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
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::ID, $keys, Criteria::IN);
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
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::ID, $id, $comparison);
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
     * @see       filterByOrgstructure()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::MASTER_ID, $masterId, $comparison);
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
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::IDX, $idx, $comparison);
    }

    /**
     * Filter the query on the attachType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAttachtypeId(1234); // WHERE attachType_id = 1234
     * $query->filterByAttachtypeId(array(12, 34)); // WHERE attachType_id IN (12, 34)
     * $query->filterByAttachtypeId(array('min' => 12)); // WHERE attachType_id >= 12
     * $query->filterByAttachtypeId(array('max' => 12)); // WHERE attachType_id <= 12
     * </code>
     *
     * @see       filterByRbattachtype()
     *
     * @param     mixed $attachtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterByAttachtypeId($attachtypeId = null, $comparison = null)
    {
        if (is_array($attachtypeId)) {
            $useMinMax = false;
            if (isset($attachtypeId['min'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::ATTACHTYPE_ID, $attachtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($attachtypeId['max'])) {
                $this->addUsingAlias(OrgstructureDisabledattendancePeer::ATTACHTYPE_ID, $attachtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::ATTACHTYPE_ID, $attachtypeId, $comparison);
    }

    /**
     * Filter the query on the disabledType column
     *
     * Example usage:
     * <code>
     * $query->filterByDisabledtype(true); // WHERE disabledType = true
     * $query->filterByDisabledtype('yes'); // WHERE disabledType = true
     * </code>
     *
     * @param     boolean|string $disabledtype The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function filterByDisabledtype($disabledtype = null, $comparison = null)
    {
        if (is_string($disabledtype)) {
            $disabledtype = in_array(strtolower($disabledtype), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrgstructureDisabledattendancePeer::DISABLEDTYPE, $disabledtype, $comparison);
    }

    /**
     * Filter the query by a related Rbattachtype object
     *
     * @param   Rbattachtype|PropelObjectCollection $rbattachtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureDisabledattendanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbattachtype($rbattachtype, $comparison = null)
    {
        if ($rbattachtype instanceof Rbattachtype) {
            return $this
                ->addUsingAlias(OrgstructureDisabledattendancePeer::ATTACHTYPE_ID, $rbattachtype->getId(), $comparison);
        } elseif ($rbattachtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrgstructureDisabledattendancePeer::ATTACHTYPE_ID, $rbattachtype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbattachtype() only accepts arguments of type Rbattachtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbattachtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function joinRbattachtype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbattachtype');

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
            $this->addJoinObject($join, 'Rbattachtype');
        }

        return $this;
    }

    /**
     * Use the Rbattachtype relation Rbattachtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbattachtypeQuery A secondary query class using the current class as primary query
     */
    public function useRbattachtypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbattachtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbattachtype', '\Webmis\Models\RbattachtypeQuery');
    }

    /**
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 OrgstructureDisabledattendanceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructure($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(OrgstructureDisabledattendancePeer::MASTER_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrgstructureDisabledattendancePeer::MASTER_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructure() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orgstructure relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function joinOrgstructure($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orgstructure');

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
            $this->addJoinObject($join, 'Orgstructure');
        }

        return $this;
    }

    /**
     * Use the Orgstructure relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrgstructure($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orgstructure', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   OrgstructureDisabledattendance $orgstructureDisabledattendance Object to remove from the list of results
     *
     * @return OrgstructureDisabledattendanceQuery The current query, for fluid interface
     */
    public function prune($orgstructureDisabledattendance = null)
    {
        if ($orgstructureDisabledattendance) {
            $this->addUsingAlias(OrgstructureDisabledattendancePeer::ID, $orgstructureDisabledattendance->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
