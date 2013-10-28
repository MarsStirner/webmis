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
use Webmis\Models\rlsForm;
use Webmis\Models\rlsFormPeer;
use Webmis\Models\rlsFormQuery;
use Webmis\Models\rlsNomen;

/**
 * Base class that represents a query for the 'rlsForm' table.
 *
 *
 *
 * @method rlsFormQuery orderByid($order = Criteria::ASC) Order by the id column
 * @method rlsFormQuery orderByname($order = Criteria::ASC) Order by the name column
 *
 * @method rlsFormQuery groupByid() Group by the id column
 * @method rlsFormQuery groupByname() Group by the name column
 *
 * @method rlsFormQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method rlsFormQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method rlsFormQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method rlsFormQuery leftJoinrlsNomen($relationAlias = null) Adds a LEFT JOIN clause to the query using the rlsNomen relation
 * @method rlsFormQuery rightJoinrlsNomen($relationAlias = null) Adds a RIGHT JOIN clause to the query using the rlsNomen relation
 * @method rlsFormQuery innerJoinrlsNomen($relationAlias = null) Adds a INNER JOIN clause to the query using the rlsNomen relation
 *
 * @method rlsForm findOne(PropelPDO $con = null) Return the first rlsForm matching the query
 * @method rlsForm findOneOrCreate(PropelPDO $con = null) Return the first rlsForm matching the query, or a new rlsForm object populated from the query conditions when no match is found
 *
 * @method rlsForm findOneByname(string $name) Return the first rlsForm filtered by the name column
 *
 * @method array findByid(int $id) Return rlsForm objects filtered by the id column
 * @method array findByname(string $name) Return rlsForm objects filtered by the name column
 *
 * @package    propel.generator.Models.om
 */
abstract class BaserlsFormQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaserlsFormQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\rlsForm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new rlsFormQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   rlsFormQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return rlsFormQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof rlsFormQuery) {
            return $criteria;
        }
        $query = new rlsFormQuery();
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
     * @return   rlsForm|rlsForm[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = rlsFormPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(rlsFormPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 rlsForm A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByid($key, $con = null)
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
     * @return                 rlsForm A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name` FROM `rlsForm` WHERE `id` = :p0';
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
            $obj = new rlsForm();
            $obj->hydrate($row);
            rlsFormPeer::addInstanceToPool($obj, (string) $key);
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
     * @return rlsForm|rlsForm[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|rlsForm[]|mixed the list of results, formatted by the current formatter
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
     * @return rlsFormQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(rlsFormPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return rlsFormQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(rlsFormPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterByid(1234); // WHERE id = 1234
     * $query->filterByid(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterByid(array('min' => 12)); // WHERE id >= 12
     * $query->filterByid(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return rlsFormQuery The current query, for fluid interface
     */
    public function filterByid($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(rlsFormPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(rlsFormPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(rlsFormPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByname('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByname('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return rlsFormQuery The current query, for fluid interface
     */
    public function filterByname($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(rlsFormPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related rlsNomen object
     *
     * @param   rlsNomen|PropelObjectCollection $rlsNomen  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 rlsFormQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByrlsNomen($rlsNomen, $comparison = null)
    {
        if ($rlsNomen instanceof rlsNomen) {
            return $this
                ->addUsingAlias(rlsFormPeer::ID, $rlsNomen->getformId(), $comparison);
        } elseif ($rlsNomen instanceof PropelObjectCollection) {
            return $this
                ->userlsNomenQuery()
                ->filterByPrimaryKeys($rlsNomen->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByrlsNomen() only accepts arguments of type rlsNomen or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the rlsNomen relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return rlsFormQuery The current query, for fluid interface
     */
    public function joinrlsNomen($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('rlsNomen');

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
            $this->addJoinObject($join, 'rlsNomen');
        }

        return $this;
    }

    /**
     * Use the rlsNomen relation rlsNomen object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\rlsNomenQuery A secondary query class using the current class as primary query
     */
    public function userlsNomenQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinrlsNomen($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'rlsNomen', '\Webmis\Models\rlsNomenQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   rlsForm $rlsForm Object to remove from the list of results
     *
     * @return rlsFormQuery The current query, for fluid interface
     */
    public function prune($rlsForm = null)
    {
        if ($rlsForm) {
            $this->addUsingAlias(rlsFormPeer::ID, $rlsForm->getid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}