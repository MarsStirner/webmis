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
use Webmis\Models\RdpolisS;
use Webmis\Models\RdpolisSPeer;
use Webmis\Models\RdpolisSQuery;

/**
 * Base class that represents a query for the 'rdPOLIS_S' table.
 *
 *
 *
 * @method RdpolisSQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RdpolisSQuery orderByCode($order = Criteria::ASC) Order by the CODE column
 * @method RdpolisSQuery orderByPayer($order = Criteria::ASC) Order by the PAYER column
 * @method RdpolisSQuery orderByTypeins($order = Criteria::ASC) Order by the TYPEINS column
 *
 * @method RdpolisSQuery groupById() Group by the id column
 * @method RdpolisSQuery groupByCode() Group by the CODE column
 * @method RdpolisSQuery groupByPayer() Group by the PAYER column
 * @method RdpolisSQuery groupByTypeins() Group by the TYPEINS column
 *
 * @method RdpolisSQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RdpolisSQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RdpolisSQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RdpolisS findOne(PropelPDO $con = null) Return the first RdpolisS matching the query
 * @method RdpolisS findOneOrCreate(PropelPDO $con = null) Return the first RdpolisS matching the query, or a new RdpolisS object populated from the query conditions when no match is found
 *
 * @method RdpolisS findOneByCode(string $CODE) Return the first RdpolisS filtered by the CODE column
 * @method RdpolisS findOneByPayer(string $PAYER) Return the first RdpolisS filtered by the PAYER column
 * @method RdpolisS findOneByTypeins(string $TYPEINS) Return the first RdpolisS filtered by the TYPEINS column
 *
 * @method array findById(int $id) Return RdpolisS objects filtered by the id column
 * @method array findByCode(string $CODE) Return RdpolisS objects filtered by the CODE column
 * @method array findByPayer(string $PAYER) Return RdpolisS objects filtered by the PAYER column
 * @method array findByTypeins(string $TYPEINS) Return RdpolisS objects filtered by the TYPEINS column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRdpolisSQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRdpolisSQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\RdpolisS', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RdpolisSQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RdpolisSQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RdpolisSQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RdpolisSQuery) {
            return $criteria;
        }
        $query = new RdpolisSQuery();
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
     * @return   RdpolisS|RdpolisS[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RdpolisSPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RdpolisSPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RdpolisS A model object, or null if the key is not found
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
     * @return                 RdpolisS A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `CODE`, `PAYER`, `TYPEINS` FROM `rdPOLIS_S` WHERE `id` = :p0';
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
            $obj = new RdpolisS();
            $obj->hydrate($row);
            RdpolisSPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RdpolisS|RdpolisS[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RdpolisS[]|mixed the list of results, formatted by the current formatter
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
     * @return RdpolisSQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RdpolisSPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RdpolisSQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RdpolisSPeer::ID, $keys, Criteria::IN);
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
     * @return RdpolisSQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RdpolisSPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RdpolisSPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RdpolisSPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the CODE column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE CODE = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE CODE LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RdpolisSQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RdpolisSPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the PAYER column
     *
     * Example usage:
     * <code>
     * $query->filterByPayer('fooValue');   // WHERE PAYER = 'fooValue'
     * $query->filterByPayer('%fooValue%'); // WHERE PAYER LIKE '%fooValue%'
     * </code>
     *
     * @param     string $payer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RdpolisSQuery The current query, for fluid interface
     */
    public function filterByPayer($payer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $payer)) {
                $payer = str_replace('*', '%', $payer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RdpolisSPeer::PAYER, $payer, $comparison);
    }

    /**
     * Filter the query on the TYPEINS column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeins('fooValue');   // WHERE TYPEINS = 'fooValue'
     * $query->filterByTypeins('%fooValue%'); // WHERE TYPEINS LIKE '%fooValue%'
     * </code>
     *
     * @param     string $typeins The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RdpolisSQuery The current query, for fluid interface
     */
    public function filterByTypeins($typeins = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($typeins)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $typeins)) {
                $typeins = str_replace('*', '%', $typeins);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RdpolisSPeer::TYPEINS, $typeins, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   RdpolisS $rdpolisS Object to remove from the list of results
     *
     * @return RdpolisSQuery The current query, for fluid interface
     */
    public function prune($rdpolisS = null)
    {
        if ($rdpolisS) {
            $this->addUsingAlias(RdpolisSPeer::ID, $rdpolisS->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
