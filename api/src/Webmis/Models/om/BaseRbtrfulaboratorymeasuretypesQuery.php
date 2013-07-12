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
use Webmis\Models\Rbtrfulaboratorymeasuretypes;
use Webmis\Models\RbtrfulaboratorymeasuretypesPeer;
use Webmis\Models\RbtrfulaboratorymeasuretypesQuery;
use Webmis\Models\Trfulaboratorymeasure;

/**
 * Base class that represents a query for the 'rbTrfuLaboratoryMeasureTypes' table.
 *
 *
 *
 * @method RbtrfulaboratorymeasuretypesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbtrfulaboratorymeasuretypesQuery orderByTrfuId($order = Criteria::ASC) Order by the trfu_id column
 * @method RbtrfulaboratorymeasuretypesQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbtrfulaboratorymeasuretypesQuery groupById() Group by the id column
 * @method RbtrfulaboratorymeasuretypesQuery groupByTrfuId() Group by the trfu_id column
 * @method RbtrfulaboratorymeasuretypesQuery groupByName() Group by the name column
 *
 * @method RbtrfulaboratorymeasuretypesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbtrfulaboratorymeasuretypesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbtrfulaboratorymeasuretypesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbtrfulaboratorymeasuretypesQuery leftJoinTrfulaboratorymeasure($relationAlias = null) Adds a LEFT JOIN clause to the query using the Trfulaboratorymeasure relation
 * @method RbtrfulaboratorymeasuretypesQuery rightJoinTrfulaboratorymeasure($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Trfulaboratorymeasure relation
 * @method RbtrfulaboratorymeasuretypesQuery innerJoinTrfulaboratorymeasure($relationAlias = null) Adds a INNER JOIN clause to the query using the Trfulaboratorymeasure relation
 *
 * @method Rbtrfulaboratorymeasuretypes findOne(PropelPDO $con = null) Return the first Rbtrfulaboratorymeasuretypes matching the query
 * @method Rbtrfulaboratorymeasuretypes findOneOrCreate(PropelPDO $con = null) Return the first Rbtrfulaboratorymeasuretypes matching the query, or a new Rbtrfulaboratorymeasuretypes object populated from the query conditions when no match is found
 *
 * @method Rbtrfulaboratorymeasuretypes findOneByTrfuId(int $trfu_id) Return the first Rbtrfulaboratorymeasuretypes filtered by the trfu_id column
 * @method Rbtrfulaboratorymeasuretypes findOneByName(string $name) Return the first Rbtrfulaboratorymeasuretypes filtered by the name column
 *
 * @method array findById(int $id) Return Rbtrfulaboratorymeasuretypes objects filtered by the id column
 * @method array findByTrfuId(int $trfu_id) Return Rbtrfulaboratorymeasuretypes objects filtered by the trfu_id column
 * @method array findByName(string $name) Return Rbtrfulaboratorymeasuretypes objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtrfulaboratorymeasuretypesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbtrfulaboratorymeasuretypesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbtrfulaboratorymeasuretypes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbtrfulaboratorymeasuretypesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbtrfulaboratorymeasuretypesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbtrfulaboratorymeasuretypesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbtrfulaboratorymeasuretypesQuery) {
            return $criteria;
        }
        $query = new RbtrfulaboratorymeasuretypesQuery();
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
     * @return   Rbtrfulaboratorymeasuretypes|Rbtrfulaboratorymeasuretypes[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbtrfulaboratorymeasuretypesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbtrfulaboratorymeasuretypesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbtrfulaboratorymeasuretypes A model object, or null if the key is not found
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
     * @return                 Rbtrfulaboratorymeasuretypes A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `trfu_id`, `name` FROM `rbTrfuLaboratoryMeasureTypes` WHERE `id` = :p0';
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
            $obj = new Rbtrfulaboratorymeasuretypes();
            $obj->hydrate($row);
            RbtrfulaboratorymeasuretypesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbtrfulaboratorymeasuretypes|Rbtrfulaboratorymeasuretypes[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbtrfulaboratorymeasuretypes[]|mixed the list of results, formatted by the current formatter
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
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $keys, Criteria::IN);
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
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the trfu_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTrfuId(1234); // WHERE trfu_id = 1234
     * $query->filterByTrfuId(array(12, 34)); // WHERE trfu_id IN (12, 34)
     * $query->filterByTrfuId(array('min' => 12)); // WHERE trfu_id >= 12
     * $query->filterByTrfuId(array('max' => 12)); // WHERE trfu_id <= 12
     * </code>
     *
     * @param     mixed $trfuId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     */
    public function filterByTrfuId($trfuId = null, $comparison = null)
    {
        if (is_array($trfuId)) {
            $useMinMax = false;
            if (isset($trfuId['min'])) {
                $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::TRFU_ID, $trfuId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($trfuId['max'])) {
                $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::TRFU_ID, $trfuId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::TRFU_ID, $trfuId, $comparison);
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
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related Trfulaboratorymeasure object
     *
     * @param   Trfulaboratorymeasure|PropelObjectCollection $trfulaboratorymeasure  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrfulaboratorymeasure($trfulaboratorymeasure, $comparison = null)
    {
        if ($trfulaboratorymeasure instanceof Trfulaboratorymeasure) {
            return $this
                ->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $trfulaboratorymeasure->getTrfuLabMeasureId(), $comparison);
        } elseif ($trfulaboratorymeasure instanceof PropelObjectCollection) {
            return $this
                ->useTrfulaboratorymeasureQuery()
                ->filterByPrimaryKeys($trfulaboratorymeasure->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrfulaboratorymeasure() only accepts arguments of type Trfulaboratorymeasure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Trfulaboratorymeasure relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     */
    public function joinTrfulaboratorymeasure($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Trfulaboratorymeasure');

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
            $this->addJoinObject($join, 'Trfulaboratorymeasure');
        }

        return $this;
    }

    /**
     * Use the Trfulaboratorymeasure relation Trfulaboratorymeasure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TrfulaboratorymeasureQuery A secondary query class using the current class as primary query
     */
    public function useTrfulaboratorymeasureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTrfulaboratorymeasure($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Trfulaboratorymeasure', '\Webmis\Models\TrfulaboratorymeasureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbtrfulaboratorymeasuretypes $rbtrfulaboratorymeasuretypes Object to remove from the list of results
     *
     * @return RbtrfulaboratorymeasuretypesQuery The current query, for fluid interface
     */
    public function prune($rbtrfulaboratorymeasuretypes = null)
    {
        if ($rbtrfulaboratorymeasuretypes) {
            $this->addUsingAlias(RbtrfulaboratorymeasuretypesPeer::ID, $rbtrfulaboratorymeasuretypes->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
