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
use Webmis\Models\Rbaccountingsystem;
use Webmis\Models\RbaccountingsystemPeer;
use Webmis\Models\RbaccountingsystemQuery;

/**
 * Base class that represents a query for the 'rbAccountingSystem' table.
 *
 *
 *
 * @method RbaccountingsystemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbaccountingsystemQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbaccountingsystemQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbaccountingsystemQuery orderByIseditable($order = Criteria::ASC) Order by the isEditable column
 * @method RbaccountingsystemQuery orderByShowinclientinfo($order = Criteria::ASC) Order by the showInClientInfo column
 *
 * @method RbaccountingsystemQuery groupById() Group by the id column
 * @method RbaccountingsystemQuery groupByCode() Group by the code column
 * @method RbaccountingsystemQuery groupByName() Group by the name column
 * @method RbaccountingsystemQuery groupByIseditable() Group by the isEditable column
 * @method RbaccountingsystemQuery groupByShowinclientinfo() Group by the showInClientInfo column
 *
 * @method RbaccountingsystemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbaccountingsystemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbaccountingsystemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbaccountingsystem findOne(PropelPDO $con = null) Return the first Rbaccountingsystem matching the query
 * @method Rbaccountingsystem findOneOrCreate(PropelPDO $con = null) Return the first Rbaccountingsystem matching the query, or a new Rbaccountingsystem object populated from the query conditions when no match is found
 *
 * @method Rbaccountingsystem findOneByCode(string $code) Return the first Rbaccountingsystem filtered by the code column
 * @method Rbaccountingsystem findOneByName(string $name) Return the first Rbaccountingsystem filtered by the name column
 * @method Rbaccountingsystem findOneByIseditable(boolean $isEditable) Return the first Rbaccountingsystem filtered by the isEditable column
 * @method Rbaccountingsystem findOneByShowinclientinfo(boolean $showInClientInfo) Return the first Rbaccountingsystem filtered by the showInClientInfo column
 *
 * @method array findById(int $id) Return Rbaccountingsystem objects filtered by the id column
 * @method array findByCode(string $code) Return Rbaccountingsystem objects filtered by the code column
 * @method array findByName(string $name) Return Rbaccountingsystem objects filtered by the name column
 * @method array findByIseditable(boolean $isEditable) Return Rbaccountingsystem objects filtered by the isEditable column
 * @method array findByShowinclientinfo(boolean $showInClientInfo) Return Rbaccountingsystem objects filtered by the showInClientInfo column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbaccountingsystemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbaccountingsystemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbaccountingsystem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbaccountingsystemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbaccountingsystemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbaccountingsystemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbaccountingsystemQuery) {
            return $criteria;
        }
        $query = new RbaccountingsystemQuery();
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
     * @return   Rbaccountingsystem|Rbaccountingsystem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbaccountingsystemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbaccountingsystemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbaccountingsystem A model object, or null if the key is not found
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
     * @return                 Rbaccountingsystem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `isEditable`, `showInClientInfo` FROM `rbAccountingSystem` WHERE `id` = :p0';
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
            $obj = new Rbaccountingsystem();
            $obj->hydrate($row);
            RbaccountingsystemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbaccountingsystem|Rbaccountingsystem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbaccountingsystem[]|mixed the list of results, formatted by the current formatter
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
     * @return RbaccountingsystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbaccountingsystemPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbaccountingsystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbaccountingsystemPeer::ID, $keys, Criteria::IN);
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
     * @return RbaccountingsystemQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbaccountingsystemPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbaccountingsystemPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbaccountingsystemPeer::ID, $id, $comparison);
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
     * @return RbaccountingsystemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaccountingsystemPeer::CODE, $code, $comparison);
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
     * @return RbaccountingsystemQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaccountingsystemPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the isEditable column
     *
     * Example usage:
     * <code>
     * $query->filterByIseditable(true); // WHERE isEditable = true
     * $query->filterByIseditable('yes'); // WHERE isEditable = true
     * </code>
     *
     * @param     boolean|string $iseditable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountingsystemQuery The current query, for fluid interface
     */
    public function filterByIseditable($iseditable = null, $comparison = null)
    {
        if (is_string($iseditable)) {
            $iseditable = in_array(strtolower($iseditable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbaccountingsystemPeer::ISEDITABLE, $iseditable, $comparison);
    }

    /**
     * Filter the query on the showInClientInfo column
     *
     * Example usage:
     * <code>
     * $query->filterByShowinclientinfo(true); // WHERE showInClientInfo = true
     * $query->filterByShowinclientinfo('yes'); // WHERE showInClientInfo = true
     * </code>
     *
     * @param     boolean|string $showinclientinfo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountingsystemQuery The current query, for fluid interface
     */
    public function filterByShowinclientinfo($showinclientinfo = null, $comparison = null)
    {
        if (is_string($showinclientinfo)) {
            $showinclientinfo = in_array(strtolower($showinclientinfo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbaccountingsystemPeer::SHOWINCLIENTINFO, $showinclientinfo, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbaccountingsystem $rbaccountingsystem Object to remove from the list of results
     *
     * @return RbaccountingsystemQuery The current query, for fluid interface
     */
    public function prune($rbaccountingsystem = null)
    {
        if ($rbaccountingsystem) {
            $this->addUsingAlias(RbaccountingsystemPeer::ID, $rbaccountingsystem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
