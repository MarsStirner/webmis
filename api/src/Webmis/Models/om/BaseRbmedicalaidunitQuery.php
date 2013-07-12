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
use Webmis\Models\Medicalkindunit;
use Webmis\Models\Rbmedicalaidunit;
use Webmis\Models\RbmedicalaidunitPeer;
use Webmis\Models\RbmedicalaidunitQuery;

/**
 * Base class that represents a query for the 'rbMedicalAidUnit' table.
 *
 *
 *
 * @method RbmedicalaidunitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbmedicalaidunitQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbmedicalaidunitQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbmedicalaidunitQuery orderByDescr($order = Criteria::ASC) Order by the descr column
 * @method RbmedicalaidunitQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 *
 * @method RbmedicalaidunitQuery groupById() Group by the id column
 * @method RbmedicalaidunitQuery groupByCode() Group by the code column
 * @method RbmedicalaidunitQuery groupByName() Group by the name column
 * @method RbmedicalaidunitQuery groupByDescr() Group by the descr column
 * @method RbmedicalaidunitQuery groupByRegionalcode() Group by the regionalCode column
 *
 * @method RbmedicalaidunitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbmedicalaidunitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbmedicalaidunitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbmedicalaidunitQuery leftJoinMedicalkindunit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Medicalkindunit relation
 * @method RbmedicalaidunitQuery rightJoinMedicalkindunit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Medicalkindunit relation
 * @method RbmedicalaidunitQuery innerJoinMedicalkindunit($relationAlias = null) Adds a INNER JOIN clause to the query using the Medicalkindunit relation
 *
 * @method Rbmedicalaidunit findOne(PropelPDO $con = null) Return the first Rbmedicalaidunit matching the query
 * @method Rbmedicalaidunit findOneOrCreate(PropelPDO $con = null) Return the first Rbmedicalaidunit matching the query, or a new Rbmedicalaidunit object populated from the query conditions when no match is found
 *
 * @method Rbmedicalaidunit findOneByCode(string $code) Return the first Rbmedicalaidunit filtered by the code column
 * @method Rbmedicalaidunit findOneByName(string $name) Return the first Rbmedicalaidunit filtered by the name column
 * @method Rbmedicalaidunit findOneByDescr(string $descr) Return the first Rbmedicalaidunit filtered by the descr column
 * @method Rbmedicalaidunit findOneByRegionalcode(string $regionalCode) Return the first Rbmedicalaidunit filtered by the regionalCode column
 *
 * @method array findById(int $id) Return Rbmedicalaidunit objects filtered by the id column
 * @method array findByCode(string $code) Return Rbmedicalaidunit objects filtered by the code column
 * @method array findByName(string $name) Return Rbmedicalaidunit objects filtered by the name column
 * @method array findByDescr(string $descr) Return Rbmedicalaidunit objects filtered by the descr column
 * @method array findByRegionalcode(string $regionalCode) Return Rbmedicalaidunit objects filtered by the regionalCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbmedicalaidunitQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbmedicalaidunitQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbmedicalaidunit', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbmedicalaidunitQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbmedicalaidunitQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbmedicalaidunitQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbmedicalaidunitQuery) {
            return $criteria;
        }
        $query = new RbmedicalaidunitQuery();
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
     * @return   Rbmedicalaidunit|Rbmedicalaidunit[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbmedicalaidunitPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbmedicalaidunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbmedicalaidunit A model object, or null if the key is not found
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
     * @return                 Rbmedicalaidunit A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `descr`, `regionalCode` FROM `rbMedicalAidUnit` WHERE `id` = :p0';
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
            $obj = new Rbmedicalaidunit();
            $obj->hydrate($row);
            RbmedicalaidunitPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbmedicalaidunit|Rbmedicalaidunit[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbmedicalaidunit[]|mixed the list of results, formatted by the current formatter
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
     * @return RbmedicalaidunitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbmedicalaidunitPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbmedicalaidunitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbmedicalaidunitPeer::ID, $keys, Criteria::IN);
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
     * @return RbmedicalaidunitQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbmedicalaidunitPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbmedicalaidunitPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbmedicalaidunitPeer::ID, $id, $comparison);
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
     * @return RbmedicalaidunitQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmedicalaidunitPeer::CODE, $code, $comparison);
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
     * @return RbmedicalaidunitQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmedicalaidunitPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the descr column
     *
     * Example usage:
     * <code>
     * $query->filterByDescr('fooValue');   // WHERE descr = 'fooValue'
     * $query->filterByDescr('%fooValue%'); // WHERE descr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbmedicalaidunitQuery The current query, for fluid interface
     */
    public function filterByDescr($descr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descr)) {
                $descr = str_replace('*', '%', $descr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbmedicalaidunitPeer::DESCR, $descr, $comparison);
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
     * @return RbmedicalaidunitQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbmedicalaidunitPeer::REGIONALCODE, $regionalcode, $comparison);
    }

    /**
     * Filter the query by a related Medicalkindunit object
     *
     * @param   Medicalkindunit|PropelObjectCollection $medicalkindunit  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbmedicalaidunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMedicalkindunit($medicalkindunit, $comparison = null)
    {
        if ($medicalkindunit instanceof Medicalkindunit) {
            return $this
                ->addUsingAlias(RbmedicalaidunitPeer::ID, $medicalkindunit->getRbmedicalaidunitId(), $comparison);
        } elseif ($medicalkindunit instanceof PropelObjectCollection) {
            return $this
                ->useMedicalkindunitQuery()
                ->filterByPrimaryKeys($medicalkindunit->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMedicalkindunit() only accepts arguments of type Medicalkindunit or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Medicalkindunit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbmedicalaidunitQuery The current query, for fluid interface
     */
    public function joinMedicalkindunit($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Medicalkindunit');

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
            $this->addJoinObject($join, 'Medicalkindunit');
        }

        return $this;
    }

    /**
     * Use the Medicalkindunit relation Medicalkindunit object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\MedicalkindunitQuery A secondary query class using the current class as primary query
     */
    public function useMedicalkindunitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedicalkindunit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Medicalkindunit', '\Webmis\Models\MedicalkindunitQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbmedicalaidunit $rbmedicalaidunit Object to remove from the list of results
     *
     * @return RbmedicalaidunitQuery The current query, for fluid interface
     */
    public function prune($rbmedicalaidunit = null)
    {
        if ($rbmedicalaidunit) {
            $this->addUsingAlias(RbmedicalaidunitPeer::ID, $rbmedicalaidunit->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
