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
use Webmis\Models\Layoutattribute;
use Webmis\Models\Layoutattributevalue;
use Webmis\Models\LayoutattributevaluePeer;
use Webmis\Models\LayoutattributevalueQuery;

/**
 * Base class that represents a query for the 'LayoutAttributeValue' table.
 *
 *
 *
 * @method LayoutattributevalueQuery orderById($order = Criteria::ASC) Order by the id column
 * @method LayoutattributevalueQuery orderByActionpropertytypeId($order = Criteria::ASC) Order by the actionPropertyType_id column
 * @method LayoutattributevalueQuery orderByLayoutattributeId($order = Criteria::ASC) Order by the layoutAttribute_id column
 * @method LayoutattributevalueQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method LayoutattributevalueQuery groupById() Group by the id column
 * @method LayoutattributevalueQuery groupByActionpropertytypeId() Group by the actionPropertyType_id column
 * @method LayoutattributevalueQuery groupByLayoutattributeId() Group by the layoutAttribute_id column
 * @method LayoutattributevalueQuery groupByValue() Group by the value column
 *
 * @method LayoutattributevalueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LayoutattributevalueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LayoutattributevalueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LayoutattributevalueQuery leftJoinLayoutattribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Layoutattribute relation
 * @method LayoutattributevalueQuery rightJoinLayoutattribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Layoutattribute relation
 * @method LayoutattributevalueQuery innerJoinLayoutattribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Layoutattribute relation
 *
 * @method Layoutattributevalue findOne(PropelPDO $con = null) Return the first Layoutattributevalue matching the query
 * @method Layoutattributevalue findOneOrCreate(PropelPDO $con = null) Return the first Layoutattributevalue matching the query, or a new Layoutattributevalue object populated from the query conditions when no match is found
 *
 * @method Layoutattributevalue findOneByActionpropertytypeId(int $actionPropertyType_id) Return the first Layoutattributevalue filtered by the actionPropertyType_id column
 * @method Layoutattributevalue findOneByLayoutattributeId(int $layoutAttribute_id) Return the first Layoutattributevalue filtered by the layoutAttribute_id column
 * @method Layoutattributevalue findOneByValue(string $value) Return the first Layoutattributevalue filtered by the value column
 *
 * @method array findById(int $id) Return Layoutattributevalue objects filtered by the id column
 * @method array findByActionpropertytypeId(int $actionPropertyType_id) Return Layoutattributevalue objects filtered by the actionPropertyType_id column
 * @method array findByLayoutattributeId(int $layoutAttribute_id) Return Layoutattributevalue objects filtered by the layoutAttribute_id column
 * @method array findByValue(string $value) Return Layoutattributevalue objects filtered by the value column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseLayoutattributevalueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLayoutattributevalueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Layoutattributevalue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LayoutattributevalueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LayoutattributevalueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LayoutattributevalueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LayoutattributevalueQuery) {
            return $criteria;
        }
        $query = new LayoutattributevalueQuery();
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
     * @return   Layoutattributevalue|Layoutattributevalue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LayoutattributevaluePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LayoutattributevaluePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Layoutattributevalue A model object, or null if the key is not found
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
     * @return                 Layoutattributevalue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `actionPropertyType_id`, `layoutAttribute_id`, `value` FROM `LayoutAttributeValue` WHERE `id` = :p0';
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
            $obj = new Layoutattributevalue();
            $obj->hydrate($row);
            LayoutattributevaluePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Layoutattributevalue|Layoutattributevalue[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Layoutattributevalue[]|mixed the list of results, formatted by the current formatter
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
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LayoutattributevaluePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LayoutattributevaluePeer::ID, $keys, Criteria::IN);
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
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LayoutattributevaluePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LayoutattributevaluePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayoutattributevaluePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the actionPropertyType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionpropertytypeId(1234); // WHERE actionPropertyType_id = 1234
     * $query->filterByActionpropertytypeId(array(12, 34)); // WHERE actionPropertyType_id IN (12, 34)
     * $query->filterByActionpropertytypeId(array('min' => 12)); // WHERE actionPropertyType_id >= 12
     * $query->filterByActionpropertytypeId(array('max' => 12)); // WHERE actionPropertyType_id <= 12
     * </code>
     *
     * @param     mixed $actionpropertytypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function filterByActionpropertytypeId($actionpropertytypeId = null, $comparison = null)
    {
        if (is_array($actionpropertytypeId)) {
            $useMinMax = false;
            if (isset($actionpropertytypeId['min'])) {
                $this->addUsingAlias(LayoutattributevaluePeer::ACTIONPROPERTYTYPE_ID, $actionpropertytypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionpropertytypeId['max'])) {
                $this->addUsingAlias(LayoutattributevaluePeer::ACTIONPROPERTYTYPE_ID, $actionpropertytypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayoutattributevaluePeer::ACTIONPROPERTYTYPE_ID, $actionpropertytypeId, $comparison);
    }

    /**
     * Filter the query on the layoutAttribute_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLayoutattributeId(1234); // WHERE layoutAttribute_id = 1234
     * $query->filterByLayoutattributeId(array(12, 34)); // WHERE layoutAttribute_id IN (12, 34)
     * $query->filterByLayoutattributeId(array('min' => 12)); // WHERE layoutAttribute_id >= 12
     * $query->filterByLayoutattributeId(array('max' => 12)); // WHERE layoutAttribute_id <= 12
     * </code>
     *
     * @see       filterByLayoutattribute()
     *
     * @param     mixed $layoutattributeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function filterByLayoutattributeId($layoutattributeId = null, $comparison = null)
    {
        if (is_array($layoutattributeId)) {
            $useMinMax = false;
            if (isset($layoutattributeId['min'])) {
                $this->addUsingAlias(LayoutattributevaluePeer::LAYOUTATTRIBUTE_ID, $layoutattributeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layoutattributeId['max'])) {
                $this->addUsingAlias(LayoutattributevaluePeer::LAYOUTATTRIBUTE_ID, $layoutattributeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayoutattributevaluePeer::LAYOUTATTRIBUTE_ID, $layoutattributeId, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayoutattributevaluePeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related Layoutattribute object
     *
     * @param   Layoutattribute|PropelObjectCollection $layoutattribute The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LayoutattributevalueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLayoutattribute($layoutattribute, $comparison = null)
    {
        if ($layoutattribute instanceof Layoutattribute) {
            return $this
                ->addUsingAlias(LayoutattributevaluePeer::LAYOUTATTRIBUTE_ID, $layoutattribute->getId(), $comparison);
        } elseif ($layoutattribute instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LayoutattributevaluePeer::LAYOUTATTRIBUTE_ID, $layoutattribute->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLayoutattribute() only accepts arguments of type Layoutattribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Layoutattribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function joinLayoutattribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Layoutattribute');

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
            $this->addJoinObject($join, 'Layoutattribute');
        }

        return $this;
    }

    /**
     * Use the Layoutattribute relation Layoutattribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\LayoutattributeQuery A secondary query class using the current class as primary query
     */
    public function useLayoutattributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLayoutattribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Layoutattribute', '\Webmis\Models\LayoutattributeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Layoutattributevalue $layoutattributevalue Object to remove from the list of results
     *
     * @return LayoutattributevalueQuery The current query, for fluid interface
     */
    public function prune($layoutattributevalue = null)
    {
        if ($layoutattributevalue) {
            $this->addUsingAlias(LayoutattributevaluePeer::ID, $layoutattributevalue->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
