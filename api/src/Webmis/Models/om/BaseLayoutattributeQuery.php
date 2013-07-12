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
use Webmis\Models\LayoutattributePeer;
use Webmis\Models\LayoutattributeQuery;
use Webmis\Models\Layoutattributevalue;

/**
 * Base class that represents a query for the 'LayoutAttribute' table.
 *
 *
 *
 * @method LayoutattributeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method LayoutattributeQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method LayoutattributeQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method LayoutattributeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method LayoutattributeQuery orderByTypename($order = Criteria::ASC) Order by the typeName column
 * @method LayoutattributeQuery orderByMeasure($order = Criteria::ASC) Order by the measure column
 * @method LayoutattributeQuery orderByDefaultvalue($order = Criteria::ASC) Order by the defaultValue column
 *
 * @method LayoutattributeQuery groupById() Group by the id column
 * @method LayoutattributeQuery groupByTitle() Group by the title column
 * @method LayoutattributeQuery groupByDescription() Group by the description column
 * @method LayoutattributeQuery groupByCode() Group by the code column
 * @method LayoutattributeQuery groupByTypename() Group by the typeName column
 * @method LayoutattributeQuery groupByMeasure() Group by the measure column
 * @method LayoutattributeQuery groupByDefaultvalue() Group by the defaultValue column
 *
 * @method LayoutattributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LayoutattributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LayoutattributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LayoutattributeQuery leftJoinLayoutattributevalue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Layoutattributevalue relation
 * @method LayoutattributeQuery rightJoinLayoutattributevalue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Layoutattributevalue relation
 * @method LayoutattributeQuery innerJoinLayoutattributevalue($relationAlias = null) Adds a INNER JOIN clause to the query using the Layoutattributevalue relation
 *
 * @method Layoutattribute findOne(PropelPDO $con = null) Return the first Layoutattribute matching the query
 * @method Layoutattribute findOneOrCreate(PropelPDO $con = null) Return the first Layoutattribute matching the query, or a new Layoutattribute object populated from the query conditions when no match is found
 *
 * @method Layoutattribute findOneByTitle(string $title) Return the first Layoutattribute filtered by the title column
 * @method Layoutattribute findOneByDescription(string $description) Return the first Layoutattribute filtered by the description column
 * @method Layoutattribute findOneByCode(string $code) Return the first Layoutattribute filtered by the code column
 * @method Layoutattribute findOneByTypename(string $typeName) Return the first Layoutattribute filtered by the typeName column
 * @method Layoutattribute findOneByMeasure(string $measure) Return the first Layoutattribute filtered by the measure column
 * @method Layoutattribute findOneByDefaultvalue(string $defaultValue) Return the first Layoutattribute filtered by the defaultValue column
 *
 * @method array findById(int $id) Return Layoutattribute objects filtered by the id column
 * @method array findByTitle(string $title) Return Layoutattribute objects filtered by the title column
 * @method array findByDescription(string $description) Return Layoutattribute objects filtered by the description column
 * @method array findByCode(string $code) Return Layoutattribute objects filtered by the code column
 * @method array findByTypename(string $typeName) Return Layoutattribute objects filtered by the typeName column
 * @method array findByMeasure(string $measure) Return Layoutattribute objects filtered by the measure column
 * @method array findByDefaultvalue(string $defaultValue) Return Layoutattribute objects filtered by the defaultValue column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseLayoutattributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLayoutattributeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Layoutattribute', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LayoutattributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LayoutattributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LayoutattributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LayoutattributeQuery) {
            return $criteria;
        }
        $query = new LayoutattributeQuery();
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
     * @return   Layoutattribute|Layoutattribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LayoutattributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LayoutattributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Layoutattribute A model object, or null if the key is not found
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
     * @return                 Layoutattribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `title`, `description`, `code`, `typeName`, `measure`, `defaultValue` FROM `LayoutAttribute` WHERE `id` = :p0';
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
            $obj = new Layoutattribute();
            $obj->hydrate($row);
            LayoutattributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Layoutattribute|Layoutattribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Layoutattribute[]|mixed the list of results, formatted by the current formatter
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
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LayoutattributePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LayoutattributePeer::ID, $keys, Criteria::IN);
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
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LayoutattributePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LayoutattributePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LayoutattributePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayoutattributePeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayoutattributePeer::DESCRIPTION, $description, $comparison);
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
     * @return LayoutattributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LayoutattributePeer::CODE, $code, $comparison);
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
     * @return LayoutattributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LayoutattributePeer::TYPENAME, $typename, $comparison);
    }

    /**
     * Filter the query on the measure column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasure('fooValue');   // WHERE measure = 'fooValue'
     * $query->filterByMeasure('%fooValue%'); // WHERE measure LIKE '%fooValue%'
     * </code>
     *
     * @param     string $measure The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function filterByMeasure($measure = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($measure)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $measure)) {
                $measure = str_replace('*', '%', $measure);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LayoutattributePeer::MEASURE, $measure, $comparison);
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
     * @return LayoutattributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LayoutattributePeer::DEFAULTVALUE, $defaultvalue, $comparison);
    }

    /**
     * Filter the query by a related Layoutattributevalue object
     *
     * @param   Layoutattributevalue|PropelObjectCollection $layoutattributevalue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LayoutattributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLayoutattributevalue($layoutattributevalue, $comparison = null)
    {
        if ($layoutattributevalue instanceof Layoutattributevalue) {
            return $this
                ->addUsingAlias(LayoutattributePeer::ID, $layoutattributevalue->getLayoutattributeId(), $comparison);
        } elseif ($layoutattributevalue instanceof PropelObjectCollection) {
            return $this
                ->useLayoutattributevalueQuery()
                ->filterByPrimaryKeys($layoutattributevalue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLayoutattributevalue() only accepts arguments of type Layoutattributevalue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Layoutattributevalue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function joinLayoutattributevalue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Layoutattributevalue');

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
            $this->addJoinObject($join, 'Layoutattributevalue');
        }

        return $this;
    }

    /**
     * Use the Layoutattributevalue relation Layoutattributevalue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\LayoutattributevalueQuery A secondary query class using the current class as primary query
     */
    public function useLayoutattributevalueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLayoutattributevalue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Layoutattributevalue', '\Webmis\Models\LayoutattributevalueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Layoutattribute $layoutattribute Object to remove from the list of results
     *
     * @return LayoutattributeQuery The current query, for fluid interface
     */
    public function prune($layoutattribute = null)
    {
        if ($layoutattribute) {
            $this->addUsingAlias(LayoutattributePeer::ID, $layoutattribute->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
