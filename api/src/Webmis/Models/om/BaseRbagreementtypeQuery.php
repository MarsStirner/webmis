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
use Webmis\Models\Rbagreementtype;
use Webmis\Models\RbagreementtypePeer;
use Webmis\Models\RbagreementtypeQuery;

/**
 * Base class that represents a query for the 'rbAgreementType' table.
 *
 *
 *
 * @method RbagreementtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbagreementtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbagreementtypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbagreementtypeQuery orderByQuotastatusmodifier($order = Criteria::ASC) Order by the quotaStatusModifier column
 *
 * @method RbagreementtypeQuery groupById() Group by the id column
 * @method RbagreementtypeQuery groupByCode() Group by the code column
 * @method RbagreementtypeQuery groupByName() Group by the name column
 * @method RbagreementtypeQuery groupByQuotastatusmodifier() Group by the quotaStatusModifier column
 *
 * @method RbagreementtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbagreementtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbagreementtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbagreementtype findOne(PropelPDO $con = null) Return the first Rbagreementtype matching the query
 * @method Rbagreementtype findOneOrCreate(PropelPDO $con = null) Return the first Rbagreementtype matching the query, or a new Rbagreementtype object populated from the query conditions when no match is found
 *
 * @method Rbagreementtype findOneByCode(string $code) Return the first Rbagreementtype filtered by the code column
 * @method Rbagreementtype findOneByName(string $name) Return the first Rbagreementtype filtered by the name column
 * @method Rbagreementtype findOneByQuotastatusmodifier(int $quotaStatusModifier) Return the first Rbagreementtype filtered by the quotaStatusModifier column
 *
 * @method array findById(int $id) Return Rbagreementtype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbagreementtype objects filtered by the code column
 * @method array findByName(string $name) Return Rbagreementtype objects filtered by the name column
 * @method array findByQuotastatusmodifier(int $quotaStatusModifier) Return Rbagreementtype objects filtered by the quotaStatusModifier column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbagreementtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbagreementtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbagreementtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbagreementtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbagreementtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbagreementtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbagreementtypeQuery) {
            return $criteria;
        }
        $query = new RbagreementtypeQuery();
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
     * @return   Rbagreementtype|Rbagreementtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbagreementtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbagreementtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbagreementtype A model object, or null if the key is not found
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
     * @return                 Rbagreementtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `quotaStatusModifier` FROM `rbAgreementType` WHERE `id` = :p0';
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
            $obj = new Rbagreementtype();
            $obj->hydrate($row);
            RbagreementtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbagreementtype|Rbagreementtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbagreementtype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbagreementtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbagreementtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbagreementtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbagreementtypePeer::ID, $keys, Criteria::IN);
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
     * @return RbagreementtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbagreementtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbagreementtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbagreementtypePeer::ID, $id, $comparison);
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
     * @return RbagreementtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbagreementtypePeer::CODE, $code, $comparison);
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
     * @return RbagreementtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbagreementtypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the quotaStatusModifier column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotastatusmodifier(1234); // WHERE quotaStatusModifier = 1234
     * $query->filterByQuotastatusmodifier(array(12, 34)); // WHERE quotaStatusModifier IN (12, 34)
     * $query->filterByQuotastatusmodifier(array('min' => 12)); // WHERE quotaStatusModifier >= 12
     * $query->filterByQuotastatusmodifier(array('max' => 12)); // WHERE quotaStatusModifier <= 12
     * </code>
     *
     * @param     mixed $quotastatusmodifier The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbagreementtypeQuery The current query, for fluid interface
     */
    public function filterByQuotastatusmodifier($quotastatusmodifier = null, $comparison = null)
    {
        if (is_array($quotastatusmodifier)) {
            $useMinMax = false;
            if (isset($quotastatusmodifier['min'])) {
                $this->addUsingAlias(RbagreementtypePeer::QUOTASTATUSMODIFIER, $quotastatusmodifier['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotastatusmodifier['max'])) {
                $this->addUsingAlias(RbagreementtypePeer::QUOTASTATUSMODIFIER, $quotastatusmodifier['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbagreementtypePeer::QUOTASTATUSMODIFIER, $quotastatusmodifier, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbagreementtype $rbagreementtype Object to remove from the list of results
     *
     * @return RbagreementtypeQuery The current query, for fluid interface
     */
    public function prune($rbagreementtype = null)
    {
        if ($rbagreementtype) {
            $this->addUsingAlias(RbagreementtypePeer::ID, $rbagreementtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
