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
use Webmis\Models\Rbaptable;
use Webmis\Models\RbaptablePeer;
use Webmis\Models\RbaptableQuery;
use Webmis\Models\Rbaptablefield;

/**
 * Base class that represents a query for the 'rbAPTable' table.
 *
 *
 *
 * @method RbaptableQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbaptableQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbaptableQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbaptableQuery orderByTablename($order = Criteria::ASC) Order by the tableName column
 * @method RbaptableQuery orderByMasterfield($order = Criteria::ASC) Order by the masterField column
 *
 * @method RbaptableQuery groupById() Group by the id column
 * @method RbaptableQuery groupByCode() Group by the code column
 * @method RbaptableQuery groupByName() Group by the name column
 * @method RbaptableQuery groupByTablename() Group by the tableName column
 * @method RbaptableQuery groupByMasterfield() Group by the masterField column
 *
 * @method RbaptableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbaptableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbaptableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbaptableQuery leftJoinRbaptablefield($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbaptablefield relation
 * @method RbaptableQuery rightJoinRbaptablefield($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbaptablefield relation
 * @method RbaptableQuery innerJoinRbaptablefield($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbaptablefield relation
 *
 * @method Rbaptable findOne(PropelPDO $con = null) Return the first Rbaptable matching the query
 * @method Rbaptable findOneOrCreate(PropelPDO $con = null) Return the first Rbaptable matching the query, or a new Rbaptable object populated from the query conditions when no match is found
 *
 * @method Rbaptable findOneByCode(string $code) Return the first Rbaptable filtered by the code column
 * @method Rbaptable findOneByName(string $name) Return the first Rbaptable filtered by the name column
 * @method Rbaptable findOneByTablename(string $tableName) Return the first Rbaptable filtered by the tableName column
 * @method Rbaptable findOneByMasterfield(string $masterField) Return the first Rbaptable filtered by the masterField column
 *
 * @method array findById(int $id) Return Rbaptable objects filtered by the id column
 * @method array findByCode(string $code) Return Rbaptable objects filtered by the code column
 * @method array findByName(string $name) Return Rbaptable objects filtered by the name column
 * @method array findByTablename(string $tableName) Return Rbaptable objects filtered by the tableName column
 * @method array findByMasterfield(string $masterField) Return Rbaptable objects filtered by the masterField column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbaptableQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbaptableQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbaptable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbaptableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbaptableQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbaptableQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbaptableQuery) {
            return $criteria;
        }
        $query = new RbaptableQuery();
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
     * @return   Rbaptable|Rbaptable[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbaptablePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbaptablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbaptable A model object, or null if the key is not found
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
     * @return                 Rbaptable A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `tableName`, `masterField` FROM `rbAPTable` WHERE `id` = :p0';
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
            $obj = new Rbaptable();
            $obj->hydrate($row);
            RbaptablePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbaptable|Rbaptable[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbaptable[]|mixed the list of results, formatted by the current formatter
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
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbaptablePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbaptablePeer::ID, $keys, Criteria::IN);
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
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbaptablePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbaptablePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbaptablePeer::ID, $id, $comparison);
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
     * @return RbaptableQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaptablePeer::CODE, $code, $comparison);
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
     * @return RbaptableQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaptablePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the tableName column
     *
     * Example usage:
     * <code>
     * $query->filterByTablename('fooValue');   // WHERE tableName = 'fooValue'
     * $query->filterByTablename('%fooValue%'); // WHERE tableName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tablename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function filterByTablename($tablename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tablename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tablename)) {
                $tablename = str_replace('*', '%', $tablename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaptablePeer::TABLENAME, $tablename, $comparison);
    }

    /**
     * Filter the query on the masterField column
     *
     * Example usage:
     * <code>
     * $query->filterByMasterfield('fooValue');   // WHERE masterField = 'fooValue'
     * $query->filterByMasterfield('%fooValue%'); // WHERE masterField LIKE '%fooValue%'
     * </code>
     *
     * @param     string $masterfield The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function filterByMasterfield($masterfield = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($masterfield)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $masterfield)) {
                $masterfield = str_replace('*', '%', $masterfield);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaptablePeer::MASTERFIELD, $masterfield, $comparison);
    }

    /**
     * Filter the query by a related Rbaptablefield object
     *
     * @param   Rbaptablefield|PropelObjectCollection $rbaptablefield  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbaptableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbaptablefield($rbaptablefield, $comparison = null)
    {
        if ($rbaptablefield instanceof Rbaptablefield) {
            return $this
                ->addUsingAlias(RbaptablePeer::ID, $rbaptablefield->getMasterId(), $comparison);
        } elseif ($rbaptablefield instanceof PropelObjectCollection) {
            return $this
                ->useRbaptablefieldQuery()
                ->filterByPrimaryKeys($rbaptablefield->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbaptablefield() only accepts arguments of type Rbaptablefield or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbaptablefield relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function joinRbaptablefield($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbaptablefield');

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
            $this->addJoinObject($join, 'Rbaptablefield');
        }

        return $this;
    }

    /**
     * Use the Rbaptablefield relation Rbaptablefield object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbaptablefieldQuery A secondary query class using the current class as primary query
     */
    public function useRbaptablefieldQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbaptablefield($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbaptablefield', '\Webmis\Models\RbaptablefieldQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbaptable $rbaptable Object to remove from the list of results
     *
     * @return RbaptableQuery The current query, for fluid interface
     */
    public function prune($rbaptable = null)
    {
        if ($rbaptable) {
            $this->addUsingAlias(RbaptablePeer::ID, $rbaptable->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
