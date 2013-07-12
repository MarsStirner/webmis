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
use Webmis\Models\MkbQuotatypePacientmodel;
use Webmis\Models\Quotatype;
use Webmis\Models\Rbpacientmodel;
use Webmis\Models\RbpacientmodelPeer;
use Webmis\Models\RbpacientmodelQuery;
use Webmis\Models\Rbtreatment;

/**
 * Base class that represents a query for the 'rbPacientModel' table.
 *
 *
 *
 * @method RbpacientmodelQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbpacientmodelQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbpacientmodelQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbpacientmodelQuery orderByQuotatypeId($order = Criteria::ASC) Order by the quotaType_id column
 *
 * @method RbpacientmodelQuery groupById() Group by the id column
 * @method RbpacientmodelQuery groupByCode() Group by the code column
 * @method RbpacientmodelQuery groupByName() Group by the name column
 * @method RbpacientmodelQuery groupByQuotatypeId() Group by the quotaType_id column
 *
 * @method RbpacientmodelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbpacientmodelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbpacientmodelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbpacientmodelQuery leftJoinQuotatype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quotatype relation
 * @method RbpacientmodelQuery rightJoinQuotatype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quotatype relation
 * @method RbpacientmodelQuery innerJoinQuotatype($relationAlias = null) Adds a INNER JOIN clause to the query using the Quotatype relation
 *
 * @method RbpacientmodelQuery leftJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a LEFT JOIN clause to the query using the MkbQuotatypePacientmodel relation
 * @method RbpacientmodelQuery rightJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MkbQuotatypePacientmodel relation
 * @method RbpacientmodelQuery innerJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a INNER JOIN clause to the query using the MkbQuotatypePacientmodel relation
 *
 * @method RbpacientmodelQuery leftJoinRbtreatment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtreatment relation
 * @method RbpacientmodelQuery rightJoinRbtreatment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtreatment relation
 * @method RbpacientmodelQuery innerJoinRbtreatment($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtreatment relation
 *
 * @method Rbpacientmodel findOne(PropelPDO $con = null) Return the first Rbpacientmodel matching the query
 * @method Rbpacientmodel findOneOrCreate(PropelPDO $con = null) Return the first Rbpacientmodel matching the query, or a new Rbpacientmodel object populated from the query conditions when no match is found
 *
 * @method Rbpacientmodel findOneByCode(string $code) Return the first Rbpacientmodel filtered by the code column
 * @method Rbpacientmodel findOneByName(string $name) Return the first Rbpacientmodel filtered by the name column
 * @method Rbpacientmodel findOneByQuotatypeId(int $quotaType_id) Return the first Rbpacientmodel filtered by the quotaType_id column
 *
 * @method array findById(int $id) Return Rbpacientmodel objects filtered by the id column
 * @method array findByCode(string $code) Return Rbpacientmodel objects filtered by the code column
 * @method array findByName(string $name) Return Rbpacientmodel objects filtered by the name column
 * @method array findByQuotatypeId(int $quotaType_id) Return Rbpacientmodel objects filtered by the quotaType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbpacientmodelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbpacientmodelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbpacientmodel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbpacientmodelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbpacientmodelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbpacientmodelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbpacientmodelQuery) {
            return $criteria;
        }
        $query = new RbpacientmodelQuery();
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
     * @return   Rbpacientmodel|Rbpacientmodel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbpacientmodelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbpacientmodelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbpacientmodel A model object, or null if the key is not found
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
     * @return                 Rbpacientmodel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `quotaType_id` FROM `rbPacientModel` WHERE `id` = :p0';
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
            $obj = new Rbpacientmodel();
            $obj->hydrate($row);
            RbpacientmodelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbpacientmodel|Rbpacientmodel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbpacientmodel[]|mixed the list of results, formatted by the current formatter
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
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbpacientmodelPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbpacientmodelPeer::ID, $keys, Criteria::IN);
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
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbpacientmodelPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbpacientmodelPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbpacientmodelPeer::ID, $id, $comparison);
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
     * @return RbpacientmodelQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbpacientmodelPeer::CODE, $code, $comparison);
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
     * @return RbpacientmodelQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbpacientmodelPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the quotaType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotatypeId(1234); // WHERE quotaType_id = 1234
     * $query->filterByQuotatypeId(array(12, 34)); // WHERE quotaType_id IN (12, 34)
     * $query->filterByQuotatypeId(array('min' => 12)); // WHERE quotaType_id >= 12
     * $query->filterByQuotatypeId(array('max' => 12)); // WHERE quotaType_id <= 12
     * </code>
     *
     * @see       filterByQuotatype()
     *
     * @param     mixed $quotatypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function filterByQuotatypeId($quotatypeId = null, $comparison = null)
    {
        if (is_array($quotatypeId)) {
            $useMinMax = false;
            if (isset($quotatypeId['min'])) {
                $this->addUsingAlias(RbpacientmodelPeer::QUOTATYPE_ID, $quotatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotatypeId['max'])) {
                $this->addUsingAlias(RbpacientmodelPeer::QUOTATYPE_ID, $quotatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbpacientmodelPeer::QUOTATYPE_ID, $quotatypeId, $comparison);
    }

    /**
     * Filter the query by a related Quotatype object
     *
     * @param   Quotatype|PropelObjectCollection $quotatype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbpacientmodelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuotatype($quotatype, $comparison = null)
    {
        if ($quotatype instanceof Quotatype) {
            return $this
                ->addUsingAlias(RbpacientmodelPeer::QUOTATYPE_ID, $quotatype->getId(), $comparison);
        } elseif ($quotatype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RbpacientmodelPeer::QUOTATYPE_ID, $quotatype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByQuotatype() only accepts arguments of type Quotatype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quotatype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function joinQuotatype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quotatype');

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
            $this->addJoinObject($join, 'Quotatype');
        }

        return $this;
    }

    /**
     * Use the Quotatype relation Quotatype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\QuotatypeQuery A secondary query class using the current class as primary query
     */
    public function useQuotatypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuotatype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quotatype', '\Webmis\Models\QuotatypeQuery');
    }

    /**
     * Filter the query by a related MkbQuotatypePacientmodel object
     *
     * @param   MkbQuotatypePacientmodel|PropelObjectCollection $mkbQuotatypePacientmodel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbpacientmodelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMkbQuotatypePacientmodel($mkbQuotatypePacientmodel, $comparison = null)
    {
        if ($mkbQuotatypePacientmodel instanceof MkbQuotatypePacientmodel) {
            return $this
                ->addUsingAlias(RbpacientmodelPeer::ID, $mkbQuotatypePacientmodel->getPacientmodelId(), $comparison);
        } elseif ($mkbQuotatypePacientmodel instanceof PropelObjectCollection) {
            return $this
                ->useMkbQuotatypePacientmodelQuery()
                ->filterByPrimaryKeys($mkbQuotatypePacientmodel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMkbQuotatypePacientmodel() only accepts arguments of type MkbQuotatypePacientmodel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MkbQuotatypePacientmodel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function joinMkbQuotatypePacientmodel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MkbQuotatypePacientmodel');

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
            $this->addJoinObject($join, 'MkbQuotatypePacientmodel');
        }

        return $this;
    }

    /**
     * Use the MkbQuotatypePacientmodel relation MkbQuotatypePacientmodel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\MkbQuotatypePacientmodelQuery A secondary query class using the current class as primary query
     */
    public function useMkbQuotatypePacientmodelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMkbQuotatypePacientmodel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MkbQuotatypePacientmodel', '\Webmis\Models\MkbQuotatypePacientmodelQuery');
    }

    /**
     * Filter the query by a related Rbtreatment object
     *
     * @param   Rbtreatment|PropelObjectCollection $rbtreatment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbpacientmodelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtreatment($rbtreatment, $comparison = null)
    {
        if ($rbtreatment instanceof Rbtreatment) {
            return $this
                ->addUsingAlias(RbpacientmodelPeer::ID, $rbtreatment->getPacientmodelId(), $comparison);
        } elseif ($rbtreatment instanceof PropelObjectCollection) {
            return $this
                ->useRbtreatmentQuery()
                ->filterByPrimaryKeys($rbtreatment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbtreatment() only accepts arguments of type Rbtreatment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtreatment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function joinRbtreatment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtreatment');

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
            $this->addJoinObject($join, 'Rbtreatment');
        }

        return $this;
    }

    /**
     * Use the Rbtreatment relation Rbtreatment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtreatmentQuery A secondary query class using the current class as primary query
     */
    public function useRbtreatmentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtreatment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtreatment', '\Webmis\Models\RbtreatmentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbpacientmodel $rbpacientmodel Object to remove from the list of results
     *
     * @return RbpacientmodelQuery The current query, for fluid interface
     */
    public function prune($rbpacientmodel = null)
    {
        if ($rbpacientmodel) {
            $this->addUsingAlias(RbpacientmodelPeer::ID, $rbpacientmodel->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
