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
use Webmis\Models\Clientfdproperty;
use Webmis\Models\Fdfield;
use Webmis\Models\Fdrecord;
use Webmis\Models\Flatdirectory;
use Webmis\Models\FlatdirectoryPeer;
use Webmis\Models\FlatdirectoryQuery;

/**
 * Base class that represents a query for the 'FlatDirectory' table.
 *
 *
 *
 * @method FlatdirectoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FlatdirectoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method FlatdirectoryQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method FlatdirectoryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 *
 * @method FlatdirectoryQuery groupById() Group by the id column
 * @method FlatdirectoryQuery groupByName() Group by the name column
 * @method FlatdirectoryQuery groupByCode() Group by the code column
 * @method FlatdirectoryQuery groupByDescription() Group by the description column
 *
 * @method FlatdirectoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FlatdirectoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FlatdirectoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FlatdirectoryQuery leftJoinClientfdproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientfdproperty relation
 * @method FlatdirectoryQuery rightJoinClientfdproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientfdproperty relation
 * @method FlatdirectoryQuery innerJoinClientfdproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientfdproperty relation
 *
 * @method FlatdirectoryQuery leftJoinFdfieldRelatedByFlatdirectoryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the FdfieldRelatedByFlatdirectoryId relation
 * @method FlatdirectoryQuery rightJoinFdfieldRelatedByFlatdirectoryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FdfieldRelatedByFlatdirectoryId relation
 * @method FlatdirectoryQuery innerJoinFdfieldRelatedByFlatdirectoryId($relationAlias = null) Adds a INNER JOIN clause to the query using the FdfieldRelatedByFlatdirectoryId relation
 *
 * @method FlatdirectoryQuery leftJoinFdfieldRelatedByFlatdirectoryCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the FdfieldRelatedByFlatdirectoryCode relation
 * @method FlatdirectoryQuery rightJoinFdfieldRelatedByFlatdirectoryCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FdfieldRelatedByFlatdirectoryCode relation
 * @method FlatdirectoryQuery innerJoinFdfieldRelatedByFlatdirectoryCode($relationAlias = null) Adds a INNER JOIN clause to the query using the FdfieldRelatedByFlatdirectoryCode relation
 *
 * @method FlatdirectoryQuery leftJoinFdrecordRelatedByFlatdirectoryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the FdrecordRelatedByFlatdirectoryId relation
 * @method FlatdirectoryQuery rightJoinFdrecordRelatedByFlatdirectoryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FdrecordRelatedByFlatdirectoryId relation
 * @method FlatdirectoryQuery innerJoinFdrecordRelatedByFlatdirectoryId($relationAlias = null) Adds a INNER JOIN clause to the query using the FdrecordRelatedByFlatdirectoryId relation
 *
 * @method FlatdirectoryQuery leftJoinFdrecordRelatedByFlatdirectoryCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the FdrecordRelatedByFlatdirectoryCode relation
 * @method FlatdirectoryQuery rightJoinFdrecordRelatedByFlatdirectoryCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FdrecordRelatedByFlatdirectoryCode relation
 * @method FlatdirectoryQuery innerJoinFdrecordRelatedByFlatdirectoryCode($relationAlias = null) Adds a INNER JOIN clause to the query using the FdrecordRelatedByFlatdirectoryCode relation
 *
 * @method Flatdirectory findOne(PropelPDO $con = null) Return the first Flatdirectory matching the query
 * @method Flatdirectory findOneOrCreate(PropelPDO $con = null) Return the first Flatdirectory matching the query, or a new Flatdirectory object populated from the query conditions when no match is found
 *
 * @method Flatdirectory findOneByName(string $name) Return the first Flatdirectory filtered by the name column
 * @method Flatdirectory findOneByCode(string $code) Return the first Flatdirectory filtered by the code column
 * @method Flatdirectory findOneByDescription(string $description) Return the first Flatdirectory filtered by the description column
 *
 * @method array findById(int $id) Return Flatdirectory objects filtered by the id column
 * @method array findByName(string $name) Return Flatdirectory objects filtered by the name column
 * @method array findByCode(string $code) Return Flatdirectory objects filtered by the code column
 * @method array findByDescription(string $description) Return Flatdirectory objects filtered by the description column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseFlatdirectoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFlatdirectoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Flatdirectory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FlatdirectoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FlatdirectoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FlatdirectoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FlatdirectoryQuery) {
            return $criteria;
        }
        $query = new FlatdirectoryQuery();
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
     * @return   Flatdirectory|Flatdirectory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FlatdirectoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FlatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Flatdirectory A model object, or null if the key is not found
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
     * @return                 Flatdirectory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `code`, `description` FROM `FlatDirectory` WHERE `id` = :p0';
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
            $obj = new Flatdirectory();
            $obj->hydrate($row);
            FlatdirectoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Flatdirectory|Flatdirectory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Flatdirectory[]|mixed the list of results, formatted by the current formatter
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
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FlatdirectoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FlatdirectoryPeer::ID, $keys, Criteria::IN);
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
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FlatdirectoryPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FlatdirectoryPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FlatdirectoryPeer::ID, $id, $comparison);
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
     * @return FlatdirectoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FlatdirectoryPeer::NAME, $name, $comparison);
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
     * @return FlatdirectoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FlatdirectoryPeer::CODE, $code, $comparison);
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
     * @return FlatdirectoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FlatdirectoryPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query by a related Clientfdproperty object
     *
     * @param   Clientfdproperty|PropelObjectCollection $clientfdproperty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FlatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientfdproperty($clientfdproperty, $comparison = null)
    {
        if ($clientfdproperty instanceof Clientfdproperty) {
            return $this
                ->addUsingAlias(FlatdirectoryPeer::ID, $clientfdproperty->getFlatdirectoryId(), $comparison);
        } elseif ($clientfdproperty instanceof PropelObjectCollection) {
            return $this
                ->useClientfdpropertyQuery()
                ->filterByPrimaryKeys($clientfdproperty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientfdproperty() only accepts arguments of type Clientfdproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientfdproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function joinClientfdproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientfdproperty');

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
            $this->addJoinObject($join, 'Clientfdproperty');
        }

        return $this;
    }

    /**
     * Use the Clientfdproperty relation Clientfdproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientfdpropertyQuery A secondary query class using the current class as primary query
     */
    public function useClientfdpropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientfdproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientfdproperty', '\Webmis\Models\ClientfdpropertyQuery');
    }

    /**
     * Filter the query by a related Fdfield object
     *
     * @param   Fdfield|PropelObjectCollection $fdfield  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FlatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdfieldRelatedByFlatdirectoryId($fdfield, $comparison = null)
    {
        if ($fdfield instanceof Fdfield) {
            return $this
                ->addUsingAlias(FlatdirectoryPeer::ID, $fdfield->getFlatdirectoryId(), $comparison);
        } elseif ($fdfield instanceof PropelObjectCollection) {
            return $this
                ->useFdfieldRelatedByFlatdirectoryIdQuery()
                ->filterByPrimaryKeys($fdfield->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFdfieldRelatedByFlatdirectoryId() only accepts arguments of type Fdfield or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FdfieldRelatedByFlatdirectoryId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function joinFdfieldRelatedByFlatdirectoryId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FdfieldRelatedByFlatdirectoryId');

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
            $this->addJoinObject($join, 'FdfieldRelatedByFlatdirectoryId');
        }

        return $this;
    }

    /**
     * Use the FdfieldRelatedByFlatdirectoryId relation Fdfield object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdfieldQuery A secondary query class using the current class as primary query
     */
    public function useFdfieldRelatedByFlatdirectoryIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFdfieldRelatedByFlatdirectoryId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FdfieldRelatedByFlatdirectoryId', '\Webmis\Models\FdfieldQuery');
    }

    /**
     * Filter the query by a related Fdfield object
     *
     * @param   Fdfield|PropelObjectCollection $fdfield  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FlatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdfieldRelatedByFlatdirectoryCode($fdfield, $comparison = null)
    {
        if ($fdfield instanceof Fdfield) {
            return $this
                ->addUsingAlias(FlatdirectoryPeer::CODE, $fdfield->getFlatdirectoryCode(), $comparison);
        } elseif ($fdfield instanceof PropelObjectCollection) {
            return $this
                ->useFdfieldRelatedByFlatdirectoryCodeQuery()
                ->filterByPrimaryKeys($fdfield->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFdfieldRelatedByFlatdirectoryCode() only accepts arguments of type Fdfield or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FdfieldRelatedByFlatdirectoryCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function joinFdfieldRelatedByFlatdirectoryCode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FdfieldRelatedByFlatdirectoryCode');

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
            $this->addJoinObject($join, 'FdfieldRelatedByFlatdirectoryCode');
        }

        return $this;
    }

    /**
     * Use the FdfieldRelatedByFlatdirectoryCode relation Fdfield object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdfieldQuery A secondary query class using the current class as primary query
     */
    public function useFdfieldRelatedByFlatdirectoryCodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFdfieldRelatedByFlatdirectoryCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FdfieldRelatedByFlatdirectoryCode', '\Webmis\Models\FdfieldQuery');
    }

    /**
     * Filter the query by a related Fdrecord object
     *
     * @param   Fdrecord|PropelObjectCollection $fdrecord  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FlatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdrecordRelatedByFlatdirectoryId($fdrecord, $comparison = null)
    {
        if ($fdrecord instanceof Fdrecord) {
            return $this
                ->addUsingAlias(FlatdirectoryPeer::ID, $fdrecord->getFlatdirectoryId(), $comparison);
        } elseif ($fdrecord instanceof PropelObjectCollection) {
            return $this
                ->useFdrecordRelatedByFlatdirectoryIdQuery()
                ->filterByPrimaryKeys($fdrecord->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFdrecordRelatedByFlatdirectoryId() only accepts arguments of type Fdrecord or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FdrecordRelatedByFlatdirectoryId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function joinFdrecordRelatedByFlatdirectoryId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FdrecordRelatedByFlatdirectoryId');

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
            $this->addJoinObject($join, 'FdrecordRelatedByFlatdirectoryId');
        }

        return $this;
    }

    /**
     * Use the FdrecordRelatedByFlatdirectoryId relation Fdrecord object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdrecordQuery A secondary query class using the current class as primary query
     */
    public function useFdrecordRelatedByFlatdirectoryIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFdrecordRelatedByFlatdirectoryId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FdrecordRelatedByFlatdirectoryId', '\Webmis\Models\FdrecordQuery');
    }

    /**
     * Filter the query by a related Fdrecord object
     *
     * @param   Fdrecord|PropelObjectCollection $fdrecord  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FlatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdrecordRelatedByFlatdirectoryCode($fdrecord, $comparison = null)
    {
        if ($fdrecord instanceof Fdrecord) {
            return $this
                ->addUsingAlias(FlatdirectoryPeer::CODE, $fdrecord->getFlatdirectoryCode(), $comparison);
        } elseif ($fdrecord instanceof PropelObjectCollection) {
            return $this
                ->useFdrecordRelatedByFlatdirectoryCodeQuery()
                ->filterByPrimaryKeys($fdrecord->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFdrecordRelatedByFlatdirectoryCode() only accepts arguments of type Fdrecord or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FdrecordRelatedByFlatdirectoryCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function joinFdrecordRelatedByFlatdirectoryCode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FdrecordRelatedByFlatdirectoryCode');

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
            $this->addJoinObject($join, 'FdrecordRelatedByFlatdirectoryCode');
        }

        return $this;
    }

    /**
     * Use the FdrecordRelatedByFlatdirectoryCode relation Fdrecord object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdrecordQuery A secondary query class using the current class as primary query
     */
    public function useFdrecordRelatedByFlatdirectoryCodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFdrecordRelatedByFlatdirectoryCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FdrecordRelatedByFlatdirectoryCode', '\Webmis\Models\FdrecordQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Flatdirectory $flatdirectory Object to remove from the list of results
     *
     * @return FlatdirectoryQuery The current query, for fluid interface
     */
    public function prune($flatdirectory = null)
    {
        if ($flatdirectory) {
            $this->addUsingAlias(FlatdirectoryPeer::ID, $flatdirectory->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
