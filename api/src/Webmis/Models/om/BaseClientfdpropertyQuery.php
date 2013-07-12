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
use Webmis\Models\ClientfdpropertyPeer;
use Webmis\Models\ClientfdpropertyQuery;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\Flatdirectory;

/**
 * Base class that represents a query for the 'ClientFDProperty' table.
 *
 *
 *
 * @method ClientfdpropertyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientfdpropertyQuery orderByFlatdirectoryId($order = Criteria::ASC) Order by the flatDirectory_id column
 * @method ClientfdpropertyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ClientfdpropertyQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ClientfdpropertyQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ClientfdpropertyQuery groupById() Group by the id column
 * @method ClientfdpropertyQuery groupByFlatdirectoryId() Group by the flatDirectory_id column
 * @method ClientfdpropertyQuery groupByName() Group by the name column
 * @method ClientfdpropertyQuery groupByDescription() Group by the description column
 * @method ClientfdpropertyQuery groupByVersion() Group by the version column
 *
 * @method ClientfdpropertyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientfdpropertyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientfdpropertyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientfdpropertyQuery leftJoinFlatdirectory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Flatdirectory relation
 * @method ClientfdpropertyQuery rightJoinFlatdirectory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Flatdirectory relation
 * @method ClientfdpropertyQuery innerJoinFlatdirectory($relationAlias = null) Adds a INNER JOIN clause to the query using the Flatdirectory relation
 *
 * @method ClientfdpropertyQuery leftJoinClientflatdirectory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientflatdirectory relation
 * @method ClientfdpropertyQuery rightJoinClientflatdirectory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientflatdirectory relation
 * @method ClientfdpropertyQuery innerJoinClientflatdirectory($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientflatdirectory relation
 *
 * @method Clientfdproperty findOne(PropelPDO $con = null) Return the first Clientfdproperty matching the query
 * @method Clientfdproperty findOneOrCreate(PropelPDO $con = null) Return the first Clientfdproperty matching the query, or a new Clientfdproperty object populated from the query conditions when no match is found
 *
 * @method Clientfdproperty findOneByFlatdirectoryId(int $flatDirectory_id) Return the first Clientfdproperty filtered by the flatDirectory_id column
 * @method Clientfdproperty findOneByName(string $name) Return the first Clientfdproperty filtered by the name column
 * @method Clientfdproperty findOneByDescription(string $description) Return the first Clientfdproperty filtered by the description column
 * @method Clientfdproperty findOneByVersion(int $version) Return the first Clientfdproperty filtered by the version column
 *
 * @method array findById(int $id) Return Clientfdproperty objects filtered by the id column
 * @method array findByFlatdirectoryId(int $flatDirectory_id) Return Clientfdproperty objects filtered by the flatDirectory_id column
 * @method array findByName(string $name) Return Clientfdproperty objects filtered by the name column
 * @method array findByDescription(string $description) Return Clientfdproperty objects filtered by the description column
 * @method array findByVersion(int $version) Return Clientfdproperty objects filtered by the version column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientfdpropertyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientfdpropertyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientfdproperty', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientfdpropertyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientfdpropertyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientfdpropertyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientfdpropertyQuery) {
            return $criteria;
        }
        $query = new ClientfdpropertyQuery();
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
     * @return   Clientfdproperty|Clientfdproperty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientfdpropertyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientfdpropertyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientfdproperty A model object, or null if the key is not found
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
     * @return                 Clientfdproperty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `flatDirectory_id`, `name`, `description`, `version` FROM `ClientFDProperty` WHERE `id` = :p0';
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
            $obj = new Clientfdproperty();
            $obj->hydrate($row);
            ClientfdpropertyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientfdproperty|Clientfdproperty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientfdproperty[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientfdpropertyPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientfdpropertyPeer::ID, $keys, Criteria::IN);
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
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientfdpropertyPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientfdpropertyPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientfdpropertyPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the flatDirectory_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatdirectoryId(1234); // WHERE flatDirectory_id = 1234
     * $query->filterByFlatdirectoryId(array(12, 34)); // WHERE flatDirectory_id IN (12, 34)
     * $query->filterByFlatdirectoryId(array('min' => 12)); // WHERE flatDirectory_id >= 12
     * $query->filterByFlatdirectoryId(array('max' => 12)); // WHERE flatDirectory_id <= 12
     * </code>
     *
     * @see       filterByFlatdirectory()
     *
     * @param     mixed $flatdirectoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function filterByFlatdirectoryId($flatdirectoryId = null, $comparison = null)
    {
        if (is_array($flatdirectoryId)) {
            $useMinMax = false;
            if (isset($flatdirectoryId['min'])) {
                $this->addUsingAlias(ClientfdpropertyPeer::FLATDIRECTORY_ID, $flatdirectoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flatdirectoryId['max'])) {
                $this->addUsingAlias(ClientfdpropertyPeer::FLATDIRECTORY_ID, $flatdirectoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientfdpropertyPeer::FLATDIRECTORY_ID, $flatdirectoryId, $comparison);
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
     * @return ClientfdpropertyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientfdpropertyPeer::NAME, $name, $comparison);
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
     * @return ClientfdpropertyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientfdpropertyPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientfdpropertyPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientfdpropertyPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientfdpropertyPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query by a related Flatdirectory object
     *
     * @param   Flatdirectory|PropelObjectCollection $flatdirectory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientfdpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFlatdirectory($flatdirectory, $comparison = null)
    {
        if ($flatdirectory instanceof Flatdirectory) {
            return $this
                ->addUsingAlias(ClientfdpropertyPeer::FLATDIRECTORY_ID, $flatdirectory->getId(), $comparison);
        } elseif ($flatdirectory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientfdpropertyPeer::FLATDIRECTORY_ID, $flatdirectory->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFlatdirectory() only accepts arguments of type Flatdirectory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Flatdirectory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function joinFlatdirectory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Flatdirectory');

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
            $this->addJoinObject($join, 'Flatdirectory');
        }

        return $this;
    }

    /**
     * Use the Flatdirectory relation Flatdirectory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FlatdirectoryQuery A secondary query class using the current class as primary query
     */
    public function useFlatdirectoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFlatdirectory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Flatdirectory', '\Webmis\Models\FlatdirectoryQuery');
    }

    /**
     * Filter the query by a related Clientflatdirectory object
     *
     * @param   Clientflatdirectory|PropelObjectCollection $clientflatdirectory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientfdpropertyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientflatdirectory($clientflatdirectory, $comparison = null)
    {
        if ($clientflatdirectory instanceof Clientflatdirectory) {
            return $this
                ->addUsingAlias(ClientfdpropertyPeer::ID, $clientflatdirectory->getClientfdpropertyId(), $comparison);
        } elseif ($clientflatdirectory instanceof PropelObjectCollection) {
            return $this
                ->useClientflatdirectoryQuery()
                ->filterByPrimaryKeys($clientflatdirectory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientflatdirectory() only accepts arguments of type Clientflatdirectory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientflatdirectory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function joinClientflatdirectory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientflatdirectory');

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
            $this->addJoinObject($join, 'Clientflatdirectory');
        }

        return $this;
    }

    /**
     * Use the Clientflatdirectory relation Clientflatdirectory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientflatdirectoryQuery A secondary query class using the current class as primary query
     */
    public function useClientflatdirectoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientflatdirectory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientflatdirectory', '\Webmis\Models\ClientflatdirectoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Clientfdproperty $clientfdproperty Object to remove from the list of results
     *
     * @return ClientfdpropertyQuery The current query, for fluid interface
     */
    public function prune($clientfdproperty = null)
    {
        if ($clientfdproperty) {
            $this->addUsingAlias(ClientfdpropertyPeer::ID, $clientfdproperty->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
