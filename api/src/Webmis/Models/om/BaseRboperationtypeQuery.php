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
use Webmis\Models\Rboperationtype;
use Webmis\Models\RboperationtypePeer;
use Webmis\Models\RboperationtypeQuery;

/**
 * Base class that represents a query for the 'rbOperationType' table.
 *
 *
 *
 * @method RboperationtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RboperationtypeQuery orderByCdR($order = Criteria::ASC) Order by the cd_r column
 * @method RboperationtypeQuery orderByCdSubr($order = Criteria::ASC) Order by the cd_subr column
 * @method RboperationtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RboperationtypeQuery orderByKtso($order = Criteria::ASC) Order by the ktso column
 * @method RboperationtypeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method RboperationtypeQuery groupById() Group by the id column
 * @method RboperationtypeQuery groupByCdR() Group by the cd_r column
 * @method RboperationtypeQuery groupByCdSubr() Group by the cd_subr column
 * @method RboperationtypeQuery groupByCode() Group by the code column
 * @method RboperationtypeQuery groupByKtso() Group by the ktso column
 * @method RboperationtypeQuery groupByName() Group by the name column
 *
 * @method RboperationtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RboperationtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RboperationtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rboperationtype findOne(PropelPDO $con = null) Return the first Rboperationtype matching the query
 * @method Rboperationtype findOneOrCreate(PropelPDO $con = null) Return the first Rboperationtype matching the query, or a new Rboperationtype object populated from the query conditions when no match is found
 *
 * @method Rboperationtype findOneByCdR(int $cd_r) Return the first Rboperationtype filtered by the cd_r column
 * @method Rboperationtype findOneByCdSubr(int $cd_subr) Return the first Rboperationtype filtered by the cd_subr column
 * @method Rboperationtype findOneByCode(string $code) Return the first Rboperationtype filtered by the code column
 * @method Rboperationtype findOneByKtso(int $ktso) Return the first Rboperationtype filtered by the ktso column
 * @method Rboperationtype findOneByName(string $name) Return the first Rboperationtype filtered by the name column
 *
 * @method array findById(int $id) Return Rboperationtype objects filtered by the id column
 * @method array findByCdR(int $cd_r) Return Rboperationtype objects filtered by the cd_r column
 * @method array findByCdSubr(int $cd_subr) Return Rboperationtype objects filtered by the cd_subr column
 * @method array findByCode(string $code) Return Rboperationtype objects filtered by the code column
 * @method array findByKtso(int $ktso) Return Rboperationtype objects filtered by the ktso column
 * @method array findByName(string $name) Return Rboperationtype objects filtered by the name column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRboperationtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRboperationtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rboperationtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RboperationtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RboperationtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RboperationtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RboperationtypeQuery) {
            return $criteria;
        }
        $query = new RboperationtypeQuery();
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
     * @return   Rboperationtype|Rboperationtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RboperationtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RboperationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rboperationtype A model object, or null if the key is not found
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
     * @return                 Rboperationtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `cd_r`, `cd_subr`, `code`, `ktso`, `name` FROM `rbOperationType` WHERE `id` = :p0';
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
            $obj = new Rboperationtype();
            $obj->hydrate($row);
            RboperationtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rboperationtype|Rboperationtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rboperationtype[]|mixed the list of results, formatted by the current formatter
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
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RboperationtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RboperationtypePeer::ID, $keys, Criteria::IN);
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
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RboperationtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RboperationtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RboperationtypePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the cd_r column
     *
     * Example usage:
     * <code>
     * $query->filterByCdR(1234); // WHERE cd_r = 1234
     * $query->filterByCdR(array(12, 34)); // WHERE cd_r IN (12, 34)
     * $query->filterByCdR(array('min' => 12)); // WHERE cd_r >= 12
     * $query->filterByCdR(array('max' => 12)); // WHERE cd_r <= 12
     * </code>
     *
     * @param     mixed $cdR The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function filterByCdR($cdR = null, $comparison = null)
    {
        if (is_array($cdR)) {
            $useMinMax = false;
            if (isset($cdR['min'])) {
                $this->addUsingAlias(RboperationtypePeer::CD_R, $cdR['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cdR['max'])) {
                $this->addUsingAlias(RboperationtypePeer::CD_R, $cdR['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RboperationtypePeer::CD_R, $cdR, $comparison);
    }

    /**
     * Filter the query on the cd_subr column
     *
     * Example usage:
     * <code>
     * $query->filterByCdSubr(1234); // WHERE cd_subr = 1234
     * $query->filterByCdSubr(array(12, 34)); // WHERE cd_subr IN (12, 34)
     * $query->filterByCdSubr(array('min' => 12)); // WHERE cd_subr >= 12
     * $query->filterByCdSubr(array('max' => 12)); // WHERE cd_subr <= 12
     * </code>
     *
     * @param     mixed $cdSubr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function filterByCdSubr($cdSubr = null, $comparison = null)
    {
        if (is_array($cdSubr)) {
            $useMinMax = false;
            if (isset($cdSubr['min'])) {
                $this->addUsingAlias(RboperationtypePeer::CD_SUBR, $cdSubr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cdSubr['max'])) {
                $this->addUsingAlias(RboperationtypePeer::CD_SUBR, $cdSubr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RboperationtypePeer::CD_SUBR, $cdSubr, $comparison);
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
     * @return RboperationtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RboperationtypePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the ktso column
     *
     * Example usage:
     * <code>
     * $query->filterByKtso(1234); // WHERE ktso = 1234
     * $query->filterByKtso(array(12, 34)); // WHERE ktso IN (12, 34)
     * $query->filterByKtso(array('min' => 12)); // WHERE ktso >= 12
     * $query->filterByKtso(array('max' => 12)); // WHERE ktso <= 12
     * </code>
     *
     * @param     mixed $ktso The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function filterByKtso($ktso = null, $comparison = null)
    {
        if (is_array($ktso)) {
            $useMinMax = false;
            if (isset($ktso['min'])) {
                $this->addUsingAlias(RboperationtypePeer::KTSO, $ktso['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ktso['max'])) {
                $this->addUsingAlias(RboperationtypePeer::KTSO, $ktso['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RboperationtypePeer::KTSO, $ktso, $comparison);
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
     * @return RboperationtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RboperationtypePeer::NAME, $name, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rboperationtype $rboperationtype Object to remove from the list of results
     *
     * @return RboperationtypeQuery The current query, for fluid interface
     */
    public function prune($rboperationtype = null)
    {
        if ($rboperationtype) {
            $this->addUsingAlias(RboperationtypePeer::ID, $rboperationtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
