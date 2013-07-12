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
use Webmis\Models\Rlsatcgrouptocode;
use Webmis\Models\RlsatcgrouptocodePeer;
use Webmis\Models\RlsatcgrouptocodeQuery;

/**
 * Base class that represents a query for the 'rlsATCGroupToCode' table.
 *
 *
 *
 * @method RlsatcgrouptocodeQuery orderByRlsatcgroupId($order = Criteria::ASC) Order by the rlsATCGroup_id column
 * @method RlsatcgrouptocodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method RlsatcgrouptocodeQuery groupByRlsatcgroupId() Group by the rlsATCGroup_id column
 * @method RlsatcgrouptocodeQuery groupByCode() Group by the code column
 *
 * @method RlsatcgrouptocodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RlsatcgrouptocodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RlsatcgrouptocodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rlsatcgrouptocode findOne(PropelPDO $con = null) Return the first Rlsatcgrouptocode matching the query
 * @method Rlsatcgrouptocode findOneOrCreate(PropelPDO $con = null) Return the first Rlsatcgrouptocode matching the query, or a new Rlsatcgrouptocode object populated from the query conditions when no match is found
 *
 * @method Rlsatcgrouptocode findOneByRlsatcgroupId(int $rlsATCGroup_id) Return the first Rlsatcgrouptocode filtered by the rlsATCGroup_id column
 * @method Rlsatcgrouptocode findOneByCode(int $code) Return the first Rlsatcgrouptocode filtered by the code column
 *
 * @method array findByRlsatcgroupId(int $rlsATCGroup_id) Return Rlsatcgrouptocode objects filtered by the rlsATCGroup_id column
 * @method array findByCode(int $code) Return Rlsatcgrouptocode objects filtered by the code column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRlsatcgrouptocodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRlsatcgrouptocodeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rlsatcgrouptocode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RlsatcgrouptocodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RlsatcgrouptocodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RlsatcgrouptocodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RlsatcgrouptocodeQuery) {
            return $criteria;
        }
        $query = new RlsatcgrouptocodeQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$rlsATCGroup_id, $code]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Rlsatcgrouptocode|Rlsatcgrouptocode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RlsatcgrouptocodePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RlsatcgrouptocodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Rlsatcgrouptocode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `rlsATCGroup_id`, `code` FROM `rlsATCGroupToCode` WHERE `rlsATCGroup_id` = :p0 AND `code` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Rlsatcgrouptocode();
            $obj->hydrate($row);
            RlsatcgrouptocodePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Rlsatcgrouptocode|Rlsatcgrouptocode[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Rlsatcgrouptocode[]|mixed the list of results, formatted by the current formatter
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
     * @return RlsatcgrouptocodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RlsatcgrouptocodePeer::RLSATCGROUP_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RlsatcgrouptocodePeer::CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RlsatcgrouptocodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RlsatcgrouptocodePeer::RLSATCGROUP_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RlsatcgrouptocodePeer::CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the rlsATCGroup_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRlsatcgroupId(1234); // WHERE rlsATCGroup_id = 1234
     * $query->filterByRlsatcgroupId(array(12, 34)); // WHERE rlsATCGroup_id IN (12, 34)
     * $query->filterByRlsatcgroupId(array('min' => 12)); // WHERE rlsATCGroup_id >= 12
     * $query->filterByRlsatcgroupId(array('max' => 12)); // WHERE rlsATCGroup_id <= 12
     * </code>
     *
     * @param     mixed $rlsatcgroupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsatcgrouptocodeQuery The current query, for fluid interface
     */
    public function filterByRlsatcgroupId($rlsatcgroupId = null, $comparison = null)
    {
        if (is_array($rlsatcgroupId)) {
            $useMinMax = false;
            if (isset($rlsatcgroupId['min'])) {
                $this->addUsingAlias(RlsatcgrouptocodePeer::RLSATCGROUP_ID, $rlsatcgroupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rlsatcgroupId['max'])) {
                $this->addUsingAlias(RlsatcgrouptocodePeer::RLSATCGROUP_ID, $rlsatcgroupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsatcgrouptocodePeer::RLSATCGROUP_ID, $rlsatcgroupId, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode(1234); // WHERE code = 1234
     * $query->filterByCode(array(12, 34)); // WHERE code IN (12, 34)
     * $query->filterByCode(array('min' => 12)); // WHERE code >= 12
     * $query->filterByCode(array('max' => 12)); // WHERE code <= 12
     * </code>
     *
     * @param     mixed $code The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsatcgrouptocodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(RlsatcgrouptocodePeer::CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(RlsatcgrouptocodePeer::CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsatcgrouptocodePeer::CODE, $code, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rlsatcgrouptocode $rlsatcgrouptocode Object to remove from the list of results
     *
     * @return RlsatcgrouptocodeQuery The current query, for fluid interface
     */
    public function prune($rlsatcgrouptocode = null)
    {
        if ($rlsatcgrouptocode) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RlsatcgrouptocodePeer::RLSATCGROUP_ID), $rlsatcgrouptocode->getRlsatcgroupId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RlsatcgrouptocodePeer::CODE), $rlsatcgrouptocode->getCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
