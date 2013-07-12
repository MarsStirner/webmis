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
use Webmis\Models\Actiontype;
use Webmis\Models\Rbjobtype;
use Webmis\Models\RbjobtypePeer;
use Webmis\Models\RbjobtypeQuery;

/**
 * Base class that represents a query for the 'rbJobType' table.
 *
 *
 *
 * @method RbjobtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbjobtypeQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method RbjobtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbjobtypeQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method RbjobtypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbjobtypeQuery orderByLaboratoryId($order = Criteria::ASC) Order by the laboratory_id column
 * @method RbjobtypeQuery orderByIsinstant($order = Criteria::ASC) Order by the isInstant column
 *
 * @method RbjobtypeQuery groupById() Group by the id column
 * @method RbjobtypeQuery groupByGroupId() Group by the group_id column
 * @method RbjobtypeQuery groupByCode() Group by the code column
 * @method RbjobtypeQuery groupByRegionalcode() Group by the regionalCode column
 * @method RbjobtypeQuery groupByName() Group by the name column
 * @method RbjobtypeQuery groupByLaboratoryId() Group by the laboratory_id column
 * @method RbjobtypeQuery groupByIsinstant() Group by the isInstant column
 *
 * @method RbjobtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbjobtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbjobtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbjobtypeQuery leftJoinActiontype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontype relation
 * @method RbjobtypeQuery rightJoinActiontype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontype relation
 * @method RbjobtypeQuery innerJoinActiontype($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontype relation
 *
 * @method Rbjobtype findOne(PropelPDO $con = null) Return the first Rbjobtype matching the query
 * @method Rbjobtype findOneOrCreate(PropelPDO $con = null) Return the first Rbjobtype matching the query, or a new Rbjobtype object populated from the query conditions when no match is found
 *
 * @method Rbjobtype findOneByGroupId(int $group_id) Return the first Rbjobtype filtered by the group_id column
 * @method Rbjobtype findOneByCode(string $code) Return the first Rbjobtype filtered by the code column
 * @method Rbjobtype findOneByRegionalcode(string $regionalCode) Return the first Rbjobtype filtered by the regionalCode column
 * @method Rbjobtype findOneByName(string $name) Return the first Rbjobtype filtered by the name column
 * @method Rbjobtype findOneByLaboratoryId(int $laboratory_id) Return the first Rbjobtype filtered by the laboratory_id column
 * @method Rbjobtype findOneByIsinstant(boolean $isInstant) Return the first Rbjobtype filtered by the isInstant column
 *
 * @method array findById(int $id) Return Rbjobtype objects filtered by the id column
 * @method array findByGroupId(int $group_id) Return Rbjobtype objects filtered by the group_id column
 * @method array findByCode(string $code) Return Rbjobtype objects filtered by the code column
 * @method array findByRegionalcode(string $regionalCode) Return Rbjobtype objects filtered by the regionalCode column
 * @method array findByName(string $name) Return Rbjobtype objects filtered by the name column
 * @method array findByLaboratoryId(int $laboratory_id) Return Rbjobtype objects filtered by the laboratory_id column
 * @method array findByIsinstant(boolean $isInstant) Return Rbjobtype objects filtered by the isInstant column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbjobtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbjobtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbjobtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbjobtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbjobtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbjobtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbjobtypeQuery) {
            return $criteria;
        }
        $query = new RbjobtypeQuery();
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
     * @return   Rbjobtype|Rbjobtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbjobtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbjobtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbjobtype A model object, or null if the key is not found
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
     * @return                 Rbjobtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `group_id`, `code`, `regionalCode`, `name`, `laboratory_id`, `isInstant` FROM `rbJobType` WHERE `id` = :p0';
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
            $obj = new Rbjobtype();
            $obj->hydrate($row);
            RbjobtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbjobtype|Rbjobtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbjobtype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbjobtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbjobtypePeer::ID, $keys, Criteria::IN);
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
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbjobtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbjobtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbjobtypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id >= 12
     * $query->filterByGroupId(array('max' => 12)); // WHERE group_id <= 12
     * </code>
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(RbjobtypePeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(RbjobtypePeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbjobtypePeer::GROUP_ID, $groupId, $comparison);
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
     * @return RbjobtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbjobtypePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the regionalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalcode('fooValue');   // WHERE regionalCode = 'fooValue'
     * $query->filterByRegionalcode('%fooValue%'); // WHERE regionalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterByRegionalcode($regionalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalcode)) {
                $regionalcode = str_replace('*', '%', $regionalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbjobtypePeer::REGIONALCODE, $regionalcode, $comparison);
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
     * @return RbjobtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbjobtypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the laboratory_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLaboratoryId(1234); // WHERE laboratory_id = 1234
     * $query->filterByLaboratoryId(array(12, 34)); // WHERE laboratory_id IN (12, 34)
     * $query->filterByLaboratoryId(array('min' => 12)); // WHERE laboratory_id >= 12
     * $query->filterByLaboratoryId(array('max' => 12)); // WHERE laboratory_id <= 12
     * </code>
     *
     * @param     mixed $laboratoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterByLaboratoryId($laboratoryId = null, $comparison = null)
    {
        if (is_array($laboratoryId)) {
            $useMinMax = false;
            if (isset($laboratoryId['min'])) {
                $this->addUsingAlias(RbjobtypePeer::LABORATORY_ID, $laboratoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($laboratoryId['max'])) {
                $this->addUsingAlias(RbjobtypePeer::LABORATORY_ID, $laboratoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbjobtypePeer::LABORATORY_ID, $laboratoryId, $comparison);
    }

    /**
     * Filter the query on the isInstant column
     *
     * Example usage:
     * <code>
     * $query->filterByIsinstant(true); // WHERE isInstant = true
     * $query->filterByIsinstant('yes'); // WHERE isInstant = true
     * </code>
     *
     * @param     boolean|string $isinstant The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function filterByIsinstant($isinstant = null, $comparison = null)
    {
        if (is_string($isinstant)) {
            $isinstant = in_array(strtolower($isinstant), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbjobtypePeer::ISINSTANT, $isinstant, $comparison);
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbjobtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontype($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(RbjobtypePeer::ID, $actiontype->getJobtypeId(), $comparison);
        } elseif ($actiontype instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeQuery()
                ->filterByPrimaryKeys($actiontype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontype() only accepts arguments of type Actiontype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actiontype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function joinActiontype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actiontype');

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
            $this->addJoinObject($join, 'Actiontype');
        }

        return $this;
    }

    /**
     * Use the Actiontype relation Actiontype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActiontype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actiontype', '\Webmis\Models\ActiontypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbjobtype $rbjobtype Object to remove from the list of results
     *
     * @return RbjobtypeQuery The current query, for fluid interface
     */
    public function prune($rbjobtype = null)
    {
        if ($rbjobtype) {
            $this->addUsingAlias(RbjobtypePeer::ID, $rbjobtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
