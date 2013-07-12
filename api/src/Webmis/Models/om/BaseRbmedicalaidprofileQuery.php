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
use Webmis\Models\Rbmedicalaidprofile;
use Webmis\Models\RbmedicalaidprofilePeer;
use Webmis\Models\RbmedicalaidprofileQuery;
use Webmis\Models\Rbservice;
use Webmis\Models\RbserviceProfile;

/**
 * Base class that represents a query for the 'rbMedicalAidProfile' table.
 *
 *
 *
 * @method RbmedicalaidprofileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbmedicalaidprofileQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbmedicalaidprofileQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method RbmedicalaidprofileQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RbmedicalaidprofileQuery groupById() Group by the id column
 * @method RbmedicalaidprofileQuery groupByCode() Group by the code column
 * @method RbmedicalaidprofileQuery groupByRegionalcode() Group by the regionalCode column
 * @method RbmedicalaidprofileQuery groupByName() Group by the name column
 *
 * @method RbmedicalaidprofileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbmedicalaidprofileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbmedicalaidprofileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbmedicalaidprofileQuery leftJoinRbservice($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbservice relation
 * @method RbmedicalaidprofileQuery rightJoinRbservice($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbservice relation
 * @method RbmedicalaidprofileQuery innerJoinRbservice($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbservice relation
 *
 * @method RbmedicalaidprofileQuery leftJoinRbserviceProfile($relationAlias = null) Adds a LEFT JOIN clause to the query using the RbserviceProfile relation
 * @method RbmedicalaidprofileQuery rightJoinRbserviceProfile($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RbserviceProfile relation
 * @method RbmedicalaidprofileQuery innerJoinRbserviceProfile($relationAlias = null) Adds a INNER JOIN clause to the query using the RbserviceProfile relation
 *
 * @method Rbmedicalaidprofile findOne(PropelPDO $con = null) Return the first Rbmedicalaidprofile matching the query
 * @method Rbmedicalaidprofile findOneOrCreate(PropelPDO $con = null) Return the first Rbmedicalaidprofile matching the query, or a new Rbmedicalaidprofile object populated from the query conditions when no match is found
 *
 * @method Rbmedicalaidprofile findOneByCode(string $code) Return the first Rbmedicalaidprofile filtered by the code column
 * @method Rbmedicalaidprofile findOneByRegionalcode(string $regionalCode) Return the first Rbmedicalaidprofile filtered by the regionalCode column
 * @method Rbmedicalaidprofile findOneByName(string $name) Return the first Rbmedicalaidprofile filtered by the name column
 *
 * @method array findById(int $id) Return Rbmedicalaidprofile objects filtered by the id column
 * @method array findByCode(string $code) Return Rbmedicalaidprofile objects filtered by the code column
 * @method array findByRegionalcode(string $regionalCode) Return Rbmedicalaidprofile objects filtered by the regionalCode column
 * @method array findByName(string $name) Return Rbmedicalaidprofile objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbmedicalaidprofileQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbmedicalaidprofileQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbmedicalaidprofile', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbmedicalaidprofileQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbmedicalaidprofileQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbmedicalaidprofileQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbmedicalaidprofileQuery) {
            return $criteria;
        }
        $query = new RbmedicalaidprofileQuery();
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
     * @return   Rbmedicalaidprofile|Rbmedicalaidprofile[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbmedicalaidprofilePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbmedicalaidprofilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbmedicalaidprofile A model object, or null if the key is not found
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
     * @return                 Rbmedicalaidprofile A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `regionalCode`, `name` FROM `rbMedicalAidProfile` WHERE `id` = :p0';
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
            $obj = new Rbmedicalaidprofile();
            $obj->hydrate($row);
            RbmedicalaidprofilePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbmedicalaidprofile|Rbmedicalaidprofile[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbmedicalaidprofile[]|mixed the list of results, formatted by the current formatter
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
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbmedicalaidprofilePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbmedicalaidprofilePeer::ID, $keys, Criteria::IN);
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
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbmedicalaidprofilePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbmedicalaidprofilePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbmedicalaidprofilePeer::ID, $id, $comparison);
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
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmedicalaidprofilePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the regionalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalcode('fooValue');   // WHERE regionalCode = 'fooValue'
     * $query->filterByRegionalcode('%fooValue%'); // WHERE regionalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function filterByRegionalcode($regionalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalcode)) {
                $regionalcode = str_replace('*', '%', $regionalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbmedicalaidprofilePeer::REGIONALCODE, $regionalcode, $comparison);
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
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmedicalaidprofilePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related Rbservice object
     *
     * @param   Rbservice|PropelObjectCollection $rbservice  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbmedicalaidprofileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbservice($rbservice, $comparison = null)
    {
        if ($rbservice instanceof Rbservice) {
            return $this
                ->addUsingAlias(RbmedicalaidprofilePeer::ID, $rbservice->getMedicalaidprofileId(), $comparison);
        } elseif ($rbservice instanceof PropelObjectCollection) {
            return $this
                ->useRbserviceQuery()
                ->filterByPrimaryKeys($rbservice->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbservice() only accepts arguments of type Rbservice or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbservice relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function joinRbservice($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbservice');

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
            $this->addJoinObject($join, 'Rbservice');
        }

        return $this;
    }

    /**
     * Use the Rbservice relation Rbservice object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbserviceQuery A secondary query class using the current class as primary query
     */
    public function useRbserviceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbservice($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbservice', '\Webmis\Models\RbserviceQuery');
    }

    /**
     * Filter the query by a related RbserviceProfile object
     *
     * @param   RbserviceProfile|PropelObjectCollection $rbserviceProfile  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbmedicalaidprofileQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbserviceProfile($rbserviceProfile, $comparison = null)
    {
        if ($rbserviceProfile instanceof RbserviceProfile) {
            return $this
                ->addUsingAlias(RbmedicalaidprofilePeer::ID, $rbserviceProfile->getMedicalaidprofileId(), $comparison);
        } elseif ($rbserviceProfile instanceof PropelObjectCollection) {
            return $this
                ->useRbserviceProfileQuery()
                ->filterByPrimaryKeys($rbserviceProfile->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbserviceProfile() only accepts arguments of type RbserviceProfile or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RbserviceProfile relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function joinRbserviceProfile($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RbserviceProfile');

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
            $this->addJoinObject($join, 'RbserviceProfile');
        }

        return $this;
    }

    /**
     * Use the RbserviceProfile relation RbserviceProfile object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbserviceProfileQuery A secondary query class using the current class as primary query
     */
    public function useRbserviceProfileQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbserviceProfile($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RbserviceProfile', '\Webmis\Models\RbserviceProfileQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbmedicalaidprofile $rbmedicalaidprofile Object to remove from the list of results
     *
     * @return RbmedicalaidprofileQuery The current query, for fluid interface
     */
    public function prune($rbmedicalaidprofile = null)
    {
        if ($rbmedicalaidprofile) {
            $this->addUsingAlias(RbmedicalaidprofilePeer::ID, $rbmedicalaidprofile->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
