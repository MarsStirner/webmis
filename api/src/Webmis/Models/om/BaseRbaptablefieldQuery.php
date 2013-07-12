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
use Webmis\Models\Rbaptablefield;
use Webmis\Models\RbaptablefieldPeer;
use Webmis\Models\RbaptablefieldQuery;

/**
 * Base class that represents a query for the 'rbAPTableField' table.
 *
 *
 *
 * @method RbaptablefieldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbaptablefieldQuery orderByIdx($order = Criteria::ASC) Order by the idx column
 * @method RbaptablefieldQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method RbaptablefieldQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbaptablefieldQuery orderByFieldname($order = Criteria::ASC) Order by the fieldName column
 * @method RbaptablefieldQuery orderByReferencetable($order = Criteria::ASC) Order by the referenceTable column
 *
 * @method RbaptablefieldQuery groupById() Group by the id column
 * @method RbaptablefieldQuery groupByIdx() Group by the idx column
 * @method RbaptablefieldQuery groupByMasterId() Group by the master_id column
 * @method RbaptablefieldQuery groupByName() Group by the name column
 * @method RbaptablefieldQuery groupByFieldname() Group by the fieldName column
 * @method RbaptablefieldQuery groupByReferencetable() Group by the referenceTable column
 *
 * @method RbaptablefieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbaptablefieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbaptablefieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbaptablefieldQuery leftJoinRbaptable($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbaptable relation
 * @method RbaptablefieldQuery rightJoinRbaptable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbaptable relation
 * @method RbaptablefieldQuery innerJoinRbaptable($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbaptable relation
 *
 * @method Rbaptablefield findOne(PropelPDO $con = null) Return the first Rbaptablefield matching the query
 * @method Rbaptablefield findOneOrCreate(PropelPDO $con = null) Return the first Rbaptablefield matching the query, or a new Rbaptablefield object populated from the query conditions when no match is found
 *
 * @method Rbaptablefield findOneByIdx(int $idx) Return the first Rbaptablefield filtered by the idx column
 * @method Rbaptablefield findOneByMasterId(int $master_id) Return the first Rbaptablefield filtered by the master_id column
 * @method Rbaptablefield findOneByName(string $name) Return the first Rbaptablefield filtered by the name column
 * @method Rbaptablefield findOneByFieldname(string $fieldName) Return the first Rbaptablefield filtered by the fieldName column
 * @method Rbaptablefield findOneByReferencetable(string $referenceTable) Return the first Rbaptablefield filtered by the referenceTable column
 *
 * @method array findById(int $id) Return Rbaptablefield objects filtered by the id column
 * @method array findByIdx(int $idx) Return Rbaptablefield objects filtered by the idx column
 * @method array findByMasterId(int $master_id) Return Rbaptablefield objects filtered by the master_id column
 * @method array findByName(string $name) Return Rbaptablefield objects filtered by the name column
 * @method array findByFieldname(string $fieldName) Return Rbaptablefield objects filtered by the fieldName column
 * @method array findByReferencetable(string $referenceTable) Return Rbaptablefield objects filtered by the referenceTable column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbaptablefieldQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbaptablefieldQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbaptablefield', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbaptablefieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbaptablefieldQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbaptablefieldQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbaptablefieldQuery) {
            return $criteria;
        }
        $query = new RbaptablefieldQuery();
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
     * @return   Rbaptablefield|Rbaptablefield[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbaptablefieldPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbaptablefieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbaptablefield A model object, or null if the key is not found
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
     * @return                 Rbaptablefield A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `idx`, `master_id`, `name`, `fieldName`, `referenceTable` FROM `rbAPTableField` WHERE `id` = :p0';
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
            $obj = new Rbaptablefield();
            $obj->hydrate($row);
            RbaptablefieldPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbaptablefield|Rbaptablefield[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbaptablefield[]|mixed the list of results, formatted by the current formatter
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
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbaptablefieldPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbaptablefieldPeer::ID, $keys, Criteria::IN);
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
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbaptablefieldPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbaptablefieldPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbaptablefieldPeer::ID, $id, $comparison);
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
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterByIdx($idx = null, $comparison = null)
    {
        if (is_array($idx)) {
            $useMinMax = false;
            if (isset($idx['min'])) {
                $this->addUsingAlias(RbaptablefieldPeer::IDX, $idx['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idx['max'])) {
                $this->addUsingAlias(RbaptablefieldPeer::IDX, $idx['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbaptablefieldPeer::IDX, $idx, $comparison);
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
     * @see       filterByRbaptable()
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(RbaptablefieldPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(RbaptablefieldPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbaptablefieldPeer::MASTER_ID, $masterId, $comparison);
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
     * @return RbaptablefieldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaptablefieldPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the fieldName column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldname('fooValue');   // WHERE fieldName = 'fooValue'
     * $query->filterByFieldname('%fooValue%'); // WHERE fieldName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterByFieldname($fieldname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fieldname)) {
                $fieldname = str_replace('*', '%', $fieldname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaptablefieldPeer::FIELDNAME, $fieldname, $comparison);
    }

    /**
     * Filter the query on the referenceTable column
     *
     * Example usage:
     * <code>
     * $query->filterByReferencetable('fooValue');   // WHERE referenceTable = 'fooValue'
     * $query->filterByReferencetable('%fooValue%'); // WHERE referenceTable LIKE '%fooValue%'
     * </code>
     *
     * @param     string $referencetable The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function filterByReferencetable($referencetable = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($referencetable)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $referencetable)) {
                $referencetable = str_replace('*', '%', $referencetable);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaptablefieldPeer::REFERENCETABLE, $referencetable, $comparison);
    }

    /**
     * Filter the query by a related Rbaptable object
     *
     * @param   Rbaptable|PropelObjectCollection $rbaptable The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbaptablefieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbaptable($rbaptable, $comparison = null)
    {
        if ($rbaptable instanceof Rbaptable) {
            return $this
                ->addUsingAlias(RbaptablefieldPeer::MASTER_ID, $rbaptable->getId(), $comparison);
        } elseif ($rbaptable instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbaptablefieldPeer::MASTER_ID, $rbaptable->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbaptable() only accepts arguments of type Rbaptable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbaptable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function joinRbaptable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbaptable');

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
            $this->addJoinObject($join, 'Rbaptable');
        }

        return $this;
    }

    /**
     * Use the Rbaptable relation Rbaptable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbaptableQuery A secondary query class using the current class as primary query
     */
    public function useRbaptableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbaptable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbaptable', '\Webmis\Models\RbaptableQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbaptablefield $rbaptablefield Object to remove from the list of results
     *
     * @return RbaptablefieldQuery The current query, for fluid interface
     */
    public function prune($rbaptablefield = null)
    {
        if ($rbaptablefield) {
            $this->addUsingAlias(RbaptablefieldPeer::ID, $rbaptablefield->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
