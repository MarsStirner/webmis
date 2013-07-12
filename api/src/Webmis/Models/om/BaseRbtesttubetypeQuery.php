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
use Webmis\Models\Rbtesttubetype;
use Webmis\Models\RbtesttubetypePeer;
use Webmis\Models\RbtesttubetypeQuery;
use Webmis\Models\Rbunit;

/**
 * Base class that represents a query for the 'rbTestTubeType' table.
 *
 *
 *
 * @method RbtesttubetypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbtesttubetypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbtesttubetypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbtesttubetypeQuery orderByVolume($order = Criteria::ASC) Order by the volume column
 * @method RbtesttubetypeQuery orderByUnitId($order = Criteria::ASC) Order by the unit_id column
 * @method RbtesttubetypeQuery orderByCovcol($order = Criteria::ASC) Order by the covCol column
 * @method RbtesttubetypeQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method RbtesttubetypeQuery orderByColor($order = Criteria::ASC) Order by the color column
 *
 * @method RbtesttubetypeQuery groupById() Group by the id column
 * @method RbtesttubetypeQuery groupByCode() Group by the code column
 * @method RbtesttubetypeQuery groupByName() Group by the name column
 * @method RbtesttubetypeQuery groupByVolume() Group by the volume column
 * @method RbtesttubetypeQuery groupByUnitId() Group by the unit_id column
 * @method RbtesttubetypeQuery groupByCovcol() Group by the covCol column
 * @method RbtesttubetypeQuery groupByImage() Group by the image column
 * @method RbtesttubetypeQuery groupByColor() Group by the color column
 *
 * @method RbtesttubetypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbtesttubetypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbtesttubetypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbtesttubetypeQuery leftJoinRbunit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbunit relation
 * @method RbtesttubetypeQuery rightJoinRbunit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbunit relation
 * @method RbtesttubetypeQuery innerJoinRbunit($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbunit relation
 *
 * @method RbtesttubetypeQuery leftJoinActiontype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontype relation
 * @method RbtesttubetypeQuery rightJoinActiontype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontype relation
 * @method RbtesttubetypeQuery innerJoinActiontype($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontype relation
 *
 * @method Rbtesttubetype findOne(PropelPDO $con = null) Return the first Rbtesttubetype matching the query
 * @method Rbtesttubetype findOneOrCreate(PropelPDO $con = null) Return the first Rbtesttubetype matching the query, or a new Rbtesttubetype object populated from the query conditions when no match is found
 *
 * @method Rbtesttubetype findOneByCode(string $code) Return the first Rbtesttubetype filtered by the code column
 * @method Rbtesttubetype findOneByName(string $name) Return the first Rbtesttubetype filtered by the name column
 * @method Rbtesttubetype findOneByVolume(double $volume) Return the first Rbtesttubetype filtered by the volume column
 * @method Rbtesttubetype findOneByUnitId(int $unit_id) Return the first Rbtesttubetype filtered by the unit_id column
 * @method Rbtesttubetype findOneByCovcol(string $covCol) Return the first Rbtesttubetype filtered by the covCol column
 * @method Rbtesttubetype findOneByImage(resource $image) Return the first Rbtesttubetype filtered by the image column
 * @method Rbtesttubetype findOneByColor(string $color) Return the first Rbtesttubetype filtered by the color column
 *
 * @method array findById(int $id) Return Rbtesttubetype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbtesttubetype objects filtered by the code column
 * @method array findByName(string $name) Return Rbtesttubetype objects filtered by the name column
 * @method array findByVolume(double $volume) Return Rbtesttubetype objects filtered by the volume column
 * @method array findByUnitId(int $unit_id) Return Rbtesttubetype objects filtered by the unit_id column
 * @method array findByCovcol(string $covCol) Return Rbtesttubetype objects filtered by the covCol column
 * @method array findByImage(resource $image) Return Rbtesttubetype objects filtered by the image column
 * @method array findByColor(string $color) Return Rbtesttubetype objects filtered by the color column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtesttubetypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbtesttubetypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbtesttubetype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbtesttubetypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbtesttubetypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbtesttubetypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbtesttubetypeQuery) {
            return $criteria;
        }
        $query = new RbtesttubetypeQuery();
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
     * @return   Rbtesttubetype|Rbtesttubetype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbtesttubetypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbtesttubetypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbtesttubetype A model object, or null if the key is not found
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
     * @return                 Rbtesttubetype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `volume`, `unit_id`, `covCol`, `image`, `color` FROM `rbTestTubeType` WHERE `id` = :p0';
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
            $obj = new Rbtesttubetype();
            $obj->hydrate($row);
            RbtesttubetypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbtesttubetype|Rbtesttubetype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbtesttubetype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbtesttubetypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbtesttubetypePeer::ID, $keys, Criteria::IN);
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
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbtesttubetypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbtesttubetypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtesttubetypePeer::ID, $id, $comparison);
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
     * @return RbtesttubetypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtesttubetypePeer::CODE, $code, $comparison);
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
     * @return RbtesttubetypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtesttubetypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the volume column
     *
     * Example usage:
     * <code>
     * $query->filterByVolume(1234); // WHERE volume = 1234
     * $query->filterByVolume(array(12, 34)); // WHERE volume IN (12, 34)
     * $query->filterByVolume(array('min' => 12)); // WHERE volume >= 12
     * $query->filterByVolume(array('max' => 12)); // WHERE volume <= 12
     * </code>
     *
     * @param     mixed $volume The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByVolume($volume = null, $comparison = null)
    {
        if (is_array($volume)) {
            $useMinMax = false;
            if (isset($volume['min'])) {
                $this->addUsingAlias(RbtesttubetypePeer::VOLUME, $volume['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volume['max'])) {
                $this->addUsingAlias(RbtesttubetypePeer::VOLUME, $volume['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtesttubetypePeer::VOLUME, $volume, $comparison);
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
     * @see       filterByRbunit()
     *
     * @param     mixed $unitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByUnitId($unitId = null, $comparison = null)
    {
        if (is_array($unitId)) {
            $useMinMax = false;
            if (isset($unitId['min'])) {
                $this->addUsingAlias(RbtesttubetypePeer::UNIT_ID, $unitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unitId['max'])) {
                $this->addUsingAlias(RbtesttubetypePeer::UNIT_ID, $unitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtesttubetypePeer::UNIT_ID, $unitId, $comparison);
    }

    /**
     * Filter the query on the covCol column
     *
     * Example usage:
     * <code>
     * $query->filterByCovcol('fooValue');   // WHERE covCol = 'fooValue'
     * $query->filterByCovcol('%fooValue%'); // WHERE covCol LIKE '%fooValue%'
     * </code>
     *
     * @param     string $covcol The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByCovcol($covcol = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($covcol)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $covcol)) {
                $covcol = str_replace('*', '%', $covcol);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbtesttubetypePeer::COVCOL, $covcol, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * @param     mixed $image The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {

        return $this->addUsingAlias(RbtesttubetypePeer::IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the color column
     *
     * Example usage:
     * <code>
     * $query->filterByColor('fooValue');   // WHERE color = 'fooValue'
     * $query->filterByColor('%fooValue%'); // WHERE color LIKE '%fooValue%'
     * </code>
     *
     * @param     string $color The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function filterByColor($color = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($color)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $color)) {
                $color = str_replace('*', '%', $color);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbtesttubetypePeer::COLOR, $color, $comparison);
    }

    /**
     * Filter the query by a related Rbunit object
     *
     * @param   Rbunit|PropelObjectCollection $rbunit The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtesttubetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbunit($rbunit, $comparison = null)
    {
        if ($rbunit instanceof Rbunit) {
            return $this
                ->addUsingAlias(RbtesttubetypePeer::UNIT_ID, $rbunit->getId(), $comparison);
        } elseif ($rbunit instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbtesttubetypePeer::UNIT_ID, $rbunit->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbunit() only accepts arguments of type Rbunit or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbunit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function joinRbunit($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbunit');

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
            $this->addJoinObject($join, 'Rbunit');
        }

        return $this;
    }

    /**
     * Use the Rbunit relation Rbunit object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbunitQuery A secondary query class using the current class as primary query
     */
    public function useRbunitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbunit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbunit', '\Webmis\Models\RbunitQuery');
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbtesttubetypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontype($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(RbtesttubetypePeer::ID, $actiontype->getTesttubetypeId(), $comparison);
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
     * @return RbtesttubetypeQuery The current query, for fluid interface
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
     * @param   Rbtesttubetype $rbtesttubetype Object to remove from the list of results
     *
     * @return RbtesttubetypeQuery The current query, for fluid interface
     */
    public function prune($rbtesttubetype = null)
    {
        if ($rbtesttubetype) {
            $this->addUsingAlias(RbtesttubetypePeer::ID, $rbtesttubetype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
