<?php

namespace Webmis\Models\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Webmis\Models\Rbdiseasephases;
use Webmis\Models\RbdiseasephasesPeer;
use Webmis\Models\RbdiseasephasesQuery;

/**
 * Base class that represents a query for the 'rbDiseasePhases' table.
 *
 *
 *
 * @method RbdiseasephasesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbdiseasephasesQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbdiseasephasesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbdiseasephasesQuery orderByCharacterrelation($order = Criteria::ASC) Order by the characterRelation column
 *
 * @method RbdiseasephasesQuery groupById() Group by the id column
 * @method RbdiseasephasesQuery groupByCode() Group by the code column
 * @method RbdiseasephasesQuery groupByName() Group by the name column
 * @method RbdiseasephasesQuery groupByCharacterrelation() Group by the characterRelation column
 *
 * @method RbdiseasephasesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbdiseasephasesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbdiseasephasesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbdiseasephases findOne(PropelPDO $con = null) Return the first Rbdiseasephases matching the query
 * @method Rbdiseasephases findOneOrCreate(PropelPDO $con = null) Return the first Rbdiseasephases matching the query, or a new Rbdiseasephases object populated from the query conditions when no match is found
 *
 * @method Rbdiseasephases findOneByCode(string $code) Return the first Rbdiseasephases filtered by the code column
 * @method Rbdiseasephases findOneByName(string $name) Return the first Rbdiseasephases filtered by the name column
 * @method Rbdiseasephases findOneByCharacterrelation(int $characterRelation) Return the first Rbdiseasephases filtered by the characterRelation column
 *
 * @method array findById(int $id) Return Rbdiseasephases objects filtered by the id column
 * @method array findByCode(string $code) Return Rbdiseasephases objects filtered by the code column
 * @method array findByName(string $name) Return Rbdiseasephases objects filtered by the name column
 * @method array findByCharacterrelation(int $characterRelation) Return Rbdiseasephases objects filtered by the characterRelation column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbdiseasephasesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbdiseasephasesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbdiseasephases', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbdiseasephasesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbdiseasephasesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbdiseasephasesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbdiseasephasesQuery) {
            return $criteria;
        }
        $query = new RbdiseasephasesQuery();
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
     * @return   Rbdiseasephases|Rbdiseasephases[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbdiseasephasesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbdiseasephasesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbdiseasephases A model object, or null if the key is not found
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
     * @return                 Rbdiseasephases A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `characterRelation` FROM `rbDiseasePhases` WHERE `id` = :p0';
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
            $obj = new Rbdiseasephases();
            $obj->hydrate($row);
            RbdiseasephasesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbdiseasephases|Rbdiseasephases[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbdiseasephases[]|mixed the list of results, formatted by the current formatter
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
     * @return RbdiseasephasesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbdiseasephasesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbdiseasephasesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbdiseasephasesPeer::ID, $keys, Criteria::IN);
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
     * @return RbdiseasephasesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbdiseasephasesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbdiseasephasesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdiseasephasesPeer::ID, $id, $comparison);
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
     * @return RbdiseasephasesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbdiseasephasesPeer::CODE, $code, $comparison);
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
     * @return RbdiseasephasesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbdiseasephasesPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the characterRelation column
     *
     * Example usage:
     * <code>
     * $query->filterByCharacterrelation(1234); // WHERE characterRelation = 1234
     * $query->filterByCharacterrelation(array(12, 34)); // WHERE characterRelation IN (12, 34)
     * $query->filterByCharacterrelation(array('min' => 12)); // WHERE characterRelation >= 12
     * $query->filterByCharacterrelation(array('max' => 12)); // WHERE characterRelation <= 12
     * </code>
     *
     * @param     mixed $characterrelation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbdiseasephasesQuery The current query, for fluid interface
     */
    public function filterByCharacterrelation($characterrelation = null, $comparison = null)
    {
        if (is_array($characterrelation)) {
            $useMinMax = false;
            if (isset($characterrelation['min'])) {
                $this->addUsingAlias(RbdiseasephasesPeer::CHARACTERRELATION, $characterrelation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($characterrelation['max'])) {
                $this->addUsingAlias(RbdiseasephasesPeer::CHARACTERRELATION, $characterrelation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbdiseasephasesPeer::CHARACTERRELATION, $characterrelation, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbdiseasephases $rbdiseasephases Object to remove from the list of results
     *
     * @return RbdiseasephasesQuery The current query, for fluid interface
     */
    public function prune($rbdiseasephases = null)
    {
        if ($rbdiseasephases) {
            $this->addUsingAlias(RbdiseasephasesPeer::ID, $rbdiseasephases->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
