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
use Webmis\Models\Rlsmkbtocode;
use Webmis\Models\RlsmkbtocodePeer;
use Webmis\Models\RlsmkbtocodeQuery;

/**
 * Base class that represents a query for the 'rlsMKBToCode' table.
 *
 *
 *
 * @method RlsmkbtocodeQuery orderByMkb($order = Criteria::ASC) Order by the MKB column
 * @method RlsmkbtocodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method RlsmkbtocodeQuery groupByMkb() Group by the MKB column
 * @method RlsmkbtocodeQuery groupByCode() Group by the code column
 *
 * @method RlsmkbtocodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RlsmkbtocodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RlsmkbtocodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rlsmkbtocode findOne(PropelPDO $con = null) Return the first Rlsmkbtocode matching the query
 * @method Rlsmkbtocode findOneOrCreate(PropelPDO $con = null) Return the first Rlsmkbtocode matching the query, or a new Rlsmkbtocode object populated from the query conditions when no match is found
 *
 * @method Rlsmkbtocode findOneByMkb(string $MKB) Return the first Rlsmkbtocode filtered by the MKB column
 * @method Rlsmkbtocode findOneByCode(int $code) Return the first Rlsmkbtocode filtered by the code column
 *
 * @method array findByMkb(string $MKB) Return Rlsmkbtocode objects filtered by the MKB column
 * @method array findByCode(int $code) Return Rlsmkbtocode objects filtered by the code column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRlsmkbtocodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRlsmkbtocodeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rlsmkbtocode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RlsmkbtocodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RlsmkbtocodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RlsmkbtocodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RlsmkbtocodeQuery) {
            return $criteria;
        }
        $query = new RlsmkbtocodeQuery();
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
                         A Primary key composition: [$MKB, $code]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Rlsmkbtocode|Rlsmkbtocode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RlsmkbtocodePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RlsmkbtocodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rlsmkbtocode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `MKB`, `code` FROM `rlsMKBToCode` WHERE `MKB` = :p0 AND `code` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Rlsmkbtocode();
            $obj->hydrate($row);
            RlsmkbtocodePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return Rlsmkbtocode|Rlsmkbtocode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rlsmkbtocode[]|mixed the list of results, formatted by the current formatter
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
     * @return RlsmkbtocodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RlsmkbtocodePeer::MKB, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RlsmkbtocodePeer::CODE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RlsmkbtocodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RlsmkbtocodePeer::MKB, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RlsmkbtocodePeer::CODE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the MKB column
     *
     * Example usage:
     * <code>
     * $query->filterByMkb('fooValue');   // WHERE MKB = 'fooValue'
     * $query->filterByMkb('%fooValue%'); // WHERE MKB LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mkb The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsmkbtocodeQuery The current query, for fluid interface
     */
    public function filterByMkb($mkb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mkb)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mkb)) {
                $mkb = str_replace('*', '%', $mkb);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RlsmkbtocodePeer::MKB, $mkb, $comparison);
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
     * @return RlsmkbtocodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(RlsmkbtocodePeer::CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(RlsmkbtocodePeer::CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsmkbtocodePeer::CODE, $code, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rlsmkbtocode $rlsmkbtocode Object to remove from the list of results
     *
     * @return RlsmkbtocodeQuery The current query, for fluid interface
     */
    public function prune($rlsmkbtocode = null)
    {
        if ($rlsmkbtocode) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RlsmkbtocodePeer::MKB), $rlsmkbtocode->getMkb(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RlsmkbtocodePeer::CODE), $rlsmkbtocode->getCode(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
