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
use Webmis\Models\Rlstradenametocode;
use Webmis\Models\RlstradenametocodePeer;
use Webmis\Models\RlstradenametocodeQuery;

/**
 * Base class that represents a query for the 'rlsTradeNameToCode' table.
 *
 *
 *
 * @method RlstradenametocodeQuery orderByRlstradenameId($order = Criteria::ASC) Order by the rlsTradeName_id column
 * @method RlstradenametocodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method RlstradenametocodeQuery groupByRlstradenameId() Group by the rlsTradeName_id column
 * @method RlstradenametocodeQuery groupByCode() Group by the code column
 *
 * @method RlstradenametocodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RlstradenametocodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RlstradenametocodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rlstradenametocode findOne(PropelPDO $con = null) Return the first Rlstradenametocode matching the query
 * @method Rlstradenametocode findOneOrCreate(PropelPDO $con = null) Return the first Rlstradenametocode matching the query, or a new Rlstradenametocode object populated from the query conditions when no match is found
 *
 * @method Rlstradenametocode findOneByRlstradenameId(int $rlsTradeName_id) Return the first Rlstradenametocode filtered by the rlsTradeName_id column
 * @method Rlstradenametocode findOneByCode(int $code) Return the first Rlstradenametocode filtered by the code column
 *
 * @method array findByRlstradenameId(int $rlsTradeName_id) Return Rlstradenametocode objects filtered by the rlsTradeName_id column
 * @method array findByCode(int $code) Return Rlstradenametocode objects filtered by the code column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRlstradenametocodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRlstradenametocodeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rlstradenametocode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RlstradenametocodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RlstradenametocodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RlstradenametocodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RlstradenametocodeQuery) {
            return $criteria;
        }
        $query = new RlstradenametocodeQuery();
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
                         A Primary key composition: [$rlsTradeName_id, $code]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Rlstradenametocode|Rlstradenametocode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RlstradenametocodePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RlstradenametocodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rlstradenametocode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `rlsTradeName_id`, `code` FROM `rlsTradeNameToCode` WHERE `rlsTradeName_id` = :p0 AND `code` = :p1';
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
            $obj = new Rlstradenametocode();
            $obj->hydrate($row);
            RlstradenametocodePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Rlstradenametocode|Rlstradenametocode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rlstradenametocode[]|mixed the list of results, formatted by the current formatter
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
     * @return RlstradenametocodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RlstradenametocodePeer::RLSTRADENAME_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RlstradenametocodePeer::CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RlstradenametocodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RlstradenametocodePeer::RLSTRADENAME_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RlstradenametocodePeer::CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the rlsTradeName_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRlstradenameId(1234); // WHERE rlsTradeName_id = 1234
     * $query->filterByRlstradenameId(array(12, 34)); // WHERE rlsTradeName_id IN (12, 34)
     * $query->filterByRlstradenameId(array('min' => 12)); // WHERE rlsTradeName_id >= 12
     * $query->filterByRlstradenameId(array('max' => 12)); // WHERE rlsTradeName_id <= 12
     * </code>
     *
     * @param     mixed $rlstradenameId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlstradenametocodeQuery The current query, for fluid interface
     */
    public function filterByRlstradenameId($rlstradenameId = null, $comparison = null)
    {
        if (is_array($rlstradenameId)) {
            $useMinMax = false;
            if (isset($rlstradenameId['min'])) {
                $this->addUsingAlias(RlstradenametocodePeer::RLSTRADENAME_ID, $rlstradenameId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rlstradenameId['max'])) {
                $this->addUsingAlias(RlstradenametocodePeer::RLSTRADENAME_ID, $rlstradenameId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlstradenametocodePeer::RLSTRADENAME_ID, $rlstradenameId, $comparison);
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
     * @return RlstradenametocodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(RlstradenametocodePeer::CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(RlstradenametocodePeer::CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlstradenametocodePeer::CODE, $code, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rlstradenametocode $rlstradenametocode Object to remove from the list of results
     *
     * @return RlstradenametocodeQuery The current query, for fluid interface
     */
    public function prune($rlstradenametocode = null)
    {
        if ($rlstradenametocode) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RlstradenametocodePeer::RLSTRADENAME_ID), $rlstradenametocode->getRlstradenameId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RlstradenametocodePeer::CODE), $rlstradenametocode->getCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
