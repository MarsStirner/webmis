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
use Webmis\Models\Mkb;
use Webmis\Models\MkbQuotatypePacientmodel;
use Webmis\Models\MkbQuotatypePacientmodelPeer;
use Webmis\Models\MkbQuotatypePacientmodelQuery;
use Webmis\Models\Quotatype;
use Webmis\Models\Rbpacientmodel;

/**
 * Base class that represents a query for the 'MKB_QuotaType_PacientModel' table.
 *
 *
 *
 * @method MkbQuotatypePacientmodelQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MkbQuotatypePacientmodelQuery orderByMkbId($order = Criteria::ASC) Order by the MKB_id column
 * @method MkbQuotatypePacientmodelQuery orderByPacientmodelId($order = Criteria::ASC) Order by the pacientModel_id column
 * @method MkbQuotatypePacientmodelQuery orderByQuotatypeId($order = Criteria::ASC) Order by the quotaType_id column
 *
 * @method MkbQuotatypePacientmodelQuery groupById() Group by the id column
 * @method MkbQuotatypePacientmodelQuery groupByMkbId() Group by the MKB_id column
 * @method MkbQuotatypePacientmodelQuery groupByPacientmodelId() Group by the pacientModel_id column
 * @method MkbQuotatypePacientmodelQuery groupByQuotatypeId() Group by the quotaType_id column
 *
 * @method MkbQuotatypePacientmodelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MkbQuotatypePacientmodelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MkbQuotatypePacientmodelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MkbQuotatypePacientmodelQuery leftJoinMkb($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mkb relation
 * @method MkbQuotatypePacientmodelQuery rightJoinMkb($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mkb relation
 * @method MkbQuotatypePacientmodelQuery innerJoinMkb($relationAlias = null) Adds a INNER JOIN clause to the query using the Mkb relation
 *
 * @method MkbQuotatypePacientmodelQuery leftJoinRbpacientmodel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbpacientmodel relation
 * @method MkbQuotatypePacientmodelQuery rightJoinRbpacientmodel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbpacientmodel relation
 * @method MkbQuotatypePacientmodelQuery innerJoinRbpacientmodel($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbpacientmodel relation
 *
 * @method MkbQuotatypePacientmodelQuery leftJoinQuotatype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quotatype relation
 * @method MkbQuotatypePacientmodelQuery rightJoinQuotatype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quotatype relation
 * @method MkbQuotatypePacientmodelQuery innerJoinQuotatype($relationAlias = null) Adds a INNER JOIN clause to the query using the Quotatype relation
 *
 * @method MkbQuotatypePacientmodel findOne(PropelPDO $con = null) Return the first MkbQuotatypePacientmodel matching the query
 * @method MkbQuotatypePacientmodel findOneOrCreate(PropelPDO $con = null) Return the first MkbQuotatypePacientmodel matching the query, or a new MkbQuotatypePacientmodel object populated from the query conditions when no match is found
 *
 * @method MkbQuotatypePacientmodel findOneByMkbId(int $MKB_id) Return the first MkbQuotatypePacientmodel filtered by the MKB_id column
 * @method MkbQuotatypePacientmodel findOneByPacientmodelId(int $pacientModel_id) Return the first MkbQuotatypePacientmodel filtered by the pacientModel_id column
 * @method MkbQuotatypePacientmodel findOneByQuotatypeId(int $quotaType_id) Return the first MkbQuotatypePacientmodel filtered by the quotaType_id column
 *
 * @method array findById(int $id) Return MkbQuotatypePacientmodel objects filtered by the id column
 * @method array findByMkbId(int $MKB_id) Return MkbQuotatypePacientmodel objects filtered by the MKB_id column
 * @method array findByPacientmodelId(int $pacientModel_id) Return MkbQuotatypePacientmodel objects filtered by the pacientModel_id column
 * @method array findByQuotatypeId(int $quotaType_id) Return MkbQuotatypePacientmodel objects filtered by the quotaType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseMkbQuotatypePacientmodelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMkbQuotatypePacientmodelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\MkbQuotatypePacientmodel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MkbQuotatypePacientmodelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MkbQuotatypePacientmodelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MkbQuotatypePacientmodelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MkbQuotatypePacientmodelQuery) {
            return $criteria;
        }
        $query = new MkbQuotatypePacientmodelQuery();
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
     * @return   MkbQuotatypePacientmodel|MkbQuotatypePacientmodel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MkbQuotatypePacientmodelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MkbQuotatypePacientmodelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MkbQuotatypePacientmodel A model object, or null if the key is not found
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
     * @return                 MkbQuotatypePacientmodel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `MKB_id`, `pacientModel_id`, `quotaType_id` FROM `MKB_QuotaType_PacientModel` WHERE `id` = :p0';
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
            $obj = new MkbQuotatypePacientmodel();
            $obj->hydrate($row);
            MkbQuotatypePacientmodelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MkbQuotatypePacientmodel|MkbQuotatypePacientmodel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MkbQuotatypePacientmodel[]|mixed the list of results, formatted by the current formatter
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
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MkbQuotatypePacientmodelPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MkbQuotatypePacientmodelPeer::ID, $keys, Criteria::IN);
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
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbQuotatypePacientmodelPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the MKB_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMkbId(1234); // WHERE MKB_id = 1234
     * $query->filterByMkbId(array(12, 34)); // WHERE MKB_id IN (12, 34)
     * $query->filterByMkbId(array('min' => 12)); // WHERE MKB_id >= 12
     * $query->filterByMkbId(array('max' => 12)); // WHERE MKB_id <= 12
     * </code>
     *
     * @see       filterByMkb()
     *
     * @param     mixed $mkbId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function filterByMkbId($mkbId = null, $comparison = null)
    {
        if (is_array($mkbId)) {
            $useMinMax = false;
            if (isset($mkbId['min'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::MKB_ID, $mkbId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mkbId['max'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::MKB_ID, $mkbId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbQuotatypePacientmodelPeer::MKB_ID, $mkbId, $comparison);
    }

    /**
     * Filter the query on the pacientModel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPacientmodelId(1234); // WHERE pacientModel_id = 1234
     * $query->filterByPacientmodelId(array(12, 34)); // WHERE pacientModel_id IN (12, 34)
     * $query->filterByPacientmodelId(array('min' => 12)); // WHERE pacientModel_id >= 12
     * $query->filterByPacientmodelId(array('max' => 12)); // WHERE pacientModel_id <= 12
     * </code>
     *
     * @see       filterByRbpacientmodel()
     *
     * @param     mixed $pacientmodelId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function filterByPacientmodelId($pacientmodelId = null, $comparison = null)
    {
        if (is_array($pacientmodelId)) {
            $useMinMax = false;
            if (isset($pacientmodelId['min'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::PACIENTMODEL_ID, $pacientmodelId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pacientmodelId['max'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::PACIENTMODEL_ID, $pacientmodelId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbQuotatypePacientmodelPeer::PACIENTMODEL_ID, $pacientmodelId, $comparison);
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
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function filterByQuotatypeId($quotatypeId = null, $comparison = null)
    {
        if (is_array($quotatypeId)) {
            $useMinMax = false;
            if (isset($quotatypeId['min'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::QUOTATYPE_ID, $quotatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotatypeId['max'])) {
                $this->addUsingAlias(MkbQuotatypePacientmodelPeer::QUOTATYPE_ID, $quotatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbQuotatypePacientmodelPeer::QUOTATYPE_ID, $quotatypeId, $comparison);
    }

    /**
     * Filter the query by a related Mkb object
     *
     * @param   Mkb|PropelObjectCollection $mkb The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MkbQuotatypePacientmodelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMkb($mkb, $comparison = null)
    {
        if ($mkb instanceof Mkb) {
            return $this
                ->addUsingAlias(MkbQuotatypePacientmodelPeer::MKB_ID, $mkb->getId(), $comparison);
        } elseif ($mkb instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MkbQuotatypePacientmodelPeer::MKB_ID, $mkb->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMkb() only accepts arguments of type Mkb or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mkb relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function joinMkb($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mkb');

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
            $this->addJoinObject($join, 'Mkb');
        }

        return $this;
    }

    /**
     * Use the Mkb relation Mkb object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\MkbQuery A secondary query class using the current class as primary query
     */
    public function useMkbQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMkb($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mkb', '\Webmis\Models\MkbQuery');
    }

    /**
     * Filter the query by a related Rbpacientmodel object
     *
     * @param   Rbpacientmodel|PropelObjectCollection $rbpacientmodel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MkbQuotatypePacientmodelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbpacientmodel($rbpacientmodel, $comparison = null)
    {
        if ($rbpacientmodel instanceof Rbpacientmodel) {
            return $this
                ->addUsingAlias(MkbQuotatypePacientmodelPeer::PACIENTMODEL_ID, $rbpacientmodel->getId(), $comparison);
        } elseif ($rbpacientmodel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MkbQuotatypePacientmodelPeer::PACIENTMODEL_ID, $rbpacientmodel->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbpacientmodel() only accepts arguments of type Rbpacientmodel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbpacientmodel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function joinRbpacientmodel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbpacientmodel');

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
            $this->addJoinObject($join, 'Rbpacientmodel');
        }

        return $this;
    }

    /**
     * Use the Rbpacientmodel relation Rbpacientmodel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbpacientmodelQuery A secondary query class using the current class as primary query
     */
    public function useRbpacientmodelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbpacientmodel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbpacientmodel', '\Webmis\Models\RbpacientmodelQuery');
    }

    /**
     * Filter the query by a related Quotatype object
     *
     * @param   Quotatype|PropelObjectCollection $quotatype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MkbQuotatypePacientmodelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuotatype($quotatype, $comparison = null)
    {
        if ($quotatype instanceof Quotatype) {
            return $this
                ->addUsingAlias(MkbQuotatypePacientmodelPeer::QUOTATYPE_ID, $quotatype->getId(), $comparison);
        } elseif ($quotatype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MkbQuotatypePacientmodelPeer::QUOTATYPE_ID, $quotatype->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   MkbQuotatypePacientmodel $mkbQuotatypePacientmodel Object to remove from the list of results
     *
     * @return MkbQuotatypePacientmodelQuery The current query, for fluid interface
     */
    public function prune($mkbQuotatypePacientmodel = null)
    {
        if ($mkbQuotatypePacientmodel) {
            $this->addUsingAlias(MkbQuotatypePacientmodelPeer::ID, $mkbQuotatypePacientmodel->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
