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
use Webmis\Models\Rblaboratory;
use Webmis\Models\RblaboratoryPeer;
use Webmis\Models\RblaboratoryQuery;

/**
 * Base class that represents a query for the 'rbLaboratory' table.
 *
 *
 *
 * @method RblaboratoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RblaboratoryQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RblaboratoryQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RblaboratoryQuery orderByProtocol($order = Criteria::ASC) Order by the protocol column
 * @method RblaboratoryQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method RblaboratoryQuery orderByOwnname($order = Criteria::ASC) Order by the ownName column
 * @method RblaboratoryQuery orderByLabname($order = Criteria::ASC) Order by the labName column
 *
 * @method RblaboratoryQuery groupById() Group by the id column
 * @method RblaboratoryQuery groupByCode() Group by the code column
 * @method RblaboratoryQuery groupByName() Group by the name column
 * @method RblaboratoryQuery groupByProtocol() Group by the protocol column
 * @method RblaboratoryQuery groupByAddress() Group by the address column
 * @method RblaboratoryQuery groupByOwnname() Group by the ownName column
 * @method RblaboratoryQuery groupByLabname() Group by the labName column
 *
 * @method RblaboratoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RblaboratoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RblaboratoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rblaboratory findOne(PropelPDO $con = null) Return the first Rblaboratory matching the query
 * @method Rblaboratory findOneOrCreate(PropelPDO $con = null) Return the first Rblaboratory matching the query, or a new Rblaboratory object populated from the query conditions when no match is found
 *
 * @method Rblaboratory findOneByCode(string $code) Return the first Rblaboratory filtered by the code column
 * @method Rblaboratory findOneByName(string $name) Return the first Rblaboratory filtered by the name column
 * @method Rblaboratory findOneByProtocol(int $protocol) Return the first Rblaboratory filtered by the protocol column
 * @method Rblaboratory findOneByAddress(string $address) Return the first Rblaboratory filtered by the address column
 * @method Rblaboratory findOneByOwnname(string $ownName) Return the first Rblaboratory filtered by the ownName column
 * @method Rblaboratory findOneByLabname(string $labName) Return the first Rblaboratory filtered by the labName column
 *
 * @method array findById(int $id) Return Rblaboratory objects filtered by the id column
 * @method array findByCode(string $code) Return Rblaboratory objects filtered by the code column
 * @method array findByName(string $name) Return Rblaboratory objects filtered by the name column
 * @method array findByProtocol(int $protocol) Return Rblaboratory objects filtered by the protocol column
 * @method array findByAddress(string $address) Return Rblaboratory objects filtered by the address column
 * @method array findByOwnname(string $ownName) Return Rblaboratory objects filtered by the ownName column
 * @method array findByLabname(string $labName) Return Rblaboratory objects filtered by the labName column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRblaboratoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRblaboratoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rblaboratory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RblaboratoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RblaboratoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RblaboratoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RblaboratoryQuery) {
            return $criteria;
        }
        $query = new RblaboratoryQuery();
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
     * @return   Rblaboratory|Rblaboratory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RblaboratoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RblaboratoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rblaboratory A model object, or null if the key is not found
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
     * @return                 Rblaboratory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `protocol`, `address`, `ownName`, `labName` FROM `rbLaboratory` WHERE `id` = :p0';
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
            $obj = new Rblaboratory();
            $obj->hydrate($row);
            RblaboratoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rblaboratory|Rblaboratory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rblaboratory[]|mixed the list of results, formatted by the current formatter
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
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RblaboratoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RblaboratoryPeer::ID, $keys, Criteria::IN);
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
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RblaboratoryPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RblaboratoryPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RblaboratoryPeer::ID, $id, $comparison);
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
     * @return RblaboratoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RblaboratoryPeer::CODE, $code, $comparison);
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
     * @return RblaboratoryQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RblaboratoryPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the protocol column
     *
     * Example usage:
     * <code>
     * $query->filterByProtocol(1234); // WHERE protocol = 1234
     * $query->filterByProtocol(array(12, 34)); // WHERE protocol IN (12, 34)
     * $query->filterByProtocol(array('min' => 12)); // WHERE protocol >= 12
     * $query->filterByProtocol(array('max' => 12)); // WHERE protocol <= 12
     * </code>
     *
     * @param     mixed $protocol The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterByProtocol($protocol = null, $comparison = null)
    {
        if (is_array($protocol)) {
            $useMinMax = false;
            if (isset($protocol['min'])) {
                $this->addUsingAlias(RblaboratoryPeer::PROTOCOL, $protocol['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($protocol['max'])) {
                $this->addUsingAlias(RblaboratoryPeer::PROTOCOL, $protocol['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RblaboratoryPeer::PROTOCOL, $protocol, $comparison);
    }

    /**
     * Filter the query on the address column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
     * $query->filterByAddress('%fooValue%'); // WHERE address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterByAddress($address = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address)) {
                $address = str_replace('*', '%', $address);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RblaboratoryPeer::ADDRESS, $address, $comparison);
    }

    /**
     * Filter the query on the ownName column
     *
     * Example usage:
     * <code>
     * $query->filterByOwnname('fooValue');   // WHERE ownName = 'fooValue'
     * $query->filterByOwnname('%fooValue%'); // WHERE ownName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ownname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterByOwnname($ownname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ownname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ownname)) {
                $ownname = str_replace('*', '%', $ownname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RblaboratoryPeer::OWNNAME, $ownname, $comparison);
    }

    /**
     * Filter the query on the labName column
     *
     * Example usage:
     * <code>
     * $query->filterByLabname('fooValue');   // WHERE labName = 'fooValue'
     * $query->filterByLabname('%fooValue%'); // WHERE labName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $labname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function filterByLabname($labname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($labname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $labname)) {
                $labname = str_replace('*', '%', $labname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RblaboratoryPeer::LABNAME, $labname, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rblaboratory $rblaboratory Object to remove from the list of results
     *
     * @return RblaboratoryQuery The current query, for fluid interface
     */
    public function prune($rblaboratory = null)
    {
        if ($rblaboratory) {
            $this->addUsingAlias(RblaboratoryPeer::ID, $rblaboratory->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
