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
use Webmis\Models\Fdfield;
use Webmis\Models\FdfieldPeer;
use Webmis\Models\FdfieldQuery;
use Webmis\Models\Fdfieldtype;
use Webmis\Models\Fdfieldvalue;
use Webmis\Models\Flatdirectory;

/**
 * Base class that represents a query for the 'FDField' table.
 *
 *
 *
 * @method FdfieldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FdfieldQuery orderByFdfieldtypeId($order = Criteria::ASC) Order by the fdFieldType_id column
 * @method FdfieldQuery orderByFlatdirectoryId($order = Criteria::ASC) Order by the flatDirectory_id column
 * @method FdfieldQuery orderByFlatdirectoryCode($order = Criteria::ASC) Order by the flatDirectory_code column
 * @method FdfieldQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method FdfieldQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method FdfieldQuery orderByMask($order = Criteria::ASC) Order by the mask column
 * @method FdfieldQuery orderByMandatory($order = Criteria::ASC) Order by the mandatory column
 * @method FdfieldQuery orderByOrder($order = Criteria::ASC) Order by the order column
 *
 * @method FdfieldQuery groupById() Group by the id column
 * @method FdfieldQuery groupByFdfieldtypeId() Group by the fdFieldType_id column
 * @method FdfieldQuery groupByFlatdirectoryId() Group by the flatDirectory_id column
 * @method FdfieldQuery groupByFlatdirectoryCode() Group by the flatDirectory_code column
 * @method FdfieldQuery groupByName() Group by the name column
 * @method FdfieldQuery groupByDescription() Group by the description column
 * @method FdfieldQuery groupByMask() Group by the mask column
 * @method FdfieldQuery groupByMandatory() Group by the mandatory column
 * @method FdfieldQuery groupByOrder() Group by the order column
 *
 * @method FdfieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FdfieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FdfieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FdfieldQuery leftJoinFdfieldtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fdfieldtype relation
 * @method FdfieldQuery rightJoinFdfieldtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fdfieldtype relation
 * @method FdfieldQuery innerJoinFdfieldtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Fdfieldtype relation
 *
 * @method FdfieldQuery leftJoinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
 * @method FdfieldQuery rightJoinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
 * @method FdfieldQuery innerJoinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null) Adds a INNER JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
 *
 * @method FdfieldQuery leftJoinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
 * @method FdfieldQuery rightJoinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
 * @method FdfieldQuery innerJoinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null) Adds a INNER JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
 *
 * @method FdfieldQuery leftJoinFdfieldvalue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fdfieldvalue relation
 * @method FdfieldQuery rightJoinFdfieldvalue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fdfieldvalue relation
 * @method FdfieldQuery innerJoinFdfieldvalue($relationAlias = null) Adds a INNER JOIN clause to the query using the Fdfieldvalue relation
 *
 * @method Fdfield findOne(PropelPDO $con = null) Return the first Fdfield matching the query
 * @method Fdfield findOneOrCreate(PropelPDO $con = null) Return the first Fdfield matching the query, or a new Fdfield object populated from the query conditions when no match is found
 *
 * @method Fdfield findOneByFdfieldtypeId(int $fdFieldType_id) Return the first Fdfield filtered by the fdFieldType_id column
 * @method Fdfield findOneByFlatdirectoryId(int $flatDirectory_id) Return the first Fdfield filtered by the flatDirectory_id column
 * @method Fdfield findOneByFlatdirectoryCode(string $flatDirectory_code) Return the first Fdfield filtered by the flatDirectory_code column
 * @method Fdfield findOneByName(string $name) Return the first Fdfield filtered by the name column
 * @method Fdfield findOneByDescription(string $description) Return the first Fdfield filtered by the description column
 * @method Fdfield findOneByMask(string $mask) Return the first Fdfield filtered by the mask column
 * @method Fdfield findOneByMandatory(boolean $mandatory) Return the first Fdfield filtered by the mandatory column
 * @method Fdfield findOneByOrder(int $order) Return the first Fdfield filtered by the order column
 *
 * @method array findById(int $id) Return Fdfield objects filtered by the id column
 * @method array findByFdfieldtypeId(int $fdFieldType_id) Return Fdfield objects filtered by the fdFieldType_id column
 * @method array findByFlatdirectoryId(int $flatDirectory_id) Return Fdfield objects filtered by the flatDirectory_id column
 * @method array findByFlatdirectoryCode(string $flatDirectory_code) Return Fdfield objects filtered by the flatDirectory_code column
 * @method array findByName(string $name) Return Fdfield objects filtered by the name column
 * @method array findByDescription(string $description) Return Fdfield objects filtered by the description column
 * @method array findByMask(string $mask) Return Fdfield objects filtered by the mask column
 * @method array findByMandatory(boolean $mandatory) Return Fdfield objects filtered by the mandatory column
 * @method array findByOrder(int $order) Return Fdfield objects filtered by the order column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseFdfieldQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFdfieldQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Fdfield', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FdfieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FdfieldQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FdfieldQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FdfieldQuery) {
            return $criteria;
        }
        $query = new FdfieldQuery();
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
     * @return   Fdfield|Fdfield[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FdfieldPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FdfieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Fdfield A model object, or null if the key is not found
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
     * @return                 Fdfield A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `fdFieldType_id`, `flatDirectory_id`, `flatDirectory_code`, `name`, `description`, `mask`, `mandatory`, `order` FROM `FDField` WHERE `id` = :p0';
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
            $obj = new Fdfield();
            $obj->hydrate($row);
            FdfieldPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Fdfield|Fdfield[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Fdfield[]|mixed the list of results, formatted by the current formatter
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
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FdfieldPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FdfieldPeer::ID, $keys, Criteria::IN);
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
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FdfieldPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FdfieldPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the fdFieldType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFdfieldtypeId(1234); // WHERE fdFieldType_id = 1234
     * $query->filterByFdfieldtypeId(array(12, 34)); // WHERE fdFieldType_id IN (12, 34)
     * $query->filterByFdfieldtypeId(array('min' => 12)); // WHERE fdFieldType_id >= 12
     * $query->filterByFdfieldtypeId(array('max' => 12)); // WHERE fdFieldType_id <= 12
     * </code>
     *
     * @see       filterByFdfieldtype()
     *
     * @param     mixed $fdfieldtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByFdfieldtypeId($fdfieldtypeId = null, $comparison = null)
    {
        if (is_array($fdfieldtypeId)) {
            $useMinMax = false;
            if (isset($fdfieldtypeId['min'])) {
                $this->addUsingAlias(FdfieldPeer::FDFIELDTYPE_ID, $fdfieldtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdfieldtypeId['max'])) {
                $this->addUsingAlias(FdfieldPeer::FDFIELDTYPE_ID, $fdfieldtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::FDFIELDTYPE_ID, $fdfieldtypeId, $comparison);
    }

    /**
     * Filter the query on the flatDirectory_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatdirectoryId(1234); // WHERE flatDirectory_id = 1234
     * $query->filterByFlatdirectoryId(array(12, 34)); // WHERE flatDirectory_id IN (12, 34)
     * $query->filterByFlatdirectoryId(array('min' => 12)); // WHERE flatDirectory_id >= 12
     * $query->filterByFlatdirectoryId(array('max' => 12)); // WHERE flatDirectory_id <= 12
     * </code>
     *
     * @see       filterByFlatdirectoryRelatedByFlatdirectoryId()
     *
     * @param     mixed $flatdirectoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByFlatdirectoryId($flatdirectoryId = null, $comparison = null)
    {
        if (is_array($flatdirectoryId)) {
            $useMinMax = false;
            if (isset($flatdirectoryId['min'])) {
                $this->addUsingAlias(FdfieldPeer::FLATDIRECTORY_ID, $flatdirectoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flatdirectoryId['max'])) {
                $this->addUsingAlias(FdfieldPeer::FLATDIRECTORY_ID, $flatdirectoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::FLATDIRECTORY_ID, $flatdirectoryId, $comparison);
    }

    /**
     * Filter the query on the flatDirectory_code column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatdirectoryCode('fooValue');   // WHERE flatDirectory_code = 'fooValue'
     * $query->filterByFlatdirectoryCode('%fooValue%'); // WHERE flatDirectory_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flatdirectoryCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByFlatdirectoryCode($flatdirectoryCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flatdirectoryCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flatdirectoryCode)) {
                $flatdirectoryCode = str_replace('*', '%', $flatdirectoryCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::FLATDIRECTORY_CODE, $flatdirectoryCode, $comparison);
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
     * @return FdfieldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FdfieldPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the mask column
     *
     * Example usage:
     * <code>
     * $query->filterByMask('fooValue');   // WHERE mask = 'fooValue'
     * $query->filterByMask('%fooValue%'); // WHERE mask LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mask The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByMask($mask = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mask)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mask)) {
                $mask = str_replace('*', '%', $mask);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::MASK, $mask, $comparison);
    }

    /**
     * Filter the query on the mandatory column
     *
     * Example usage:
     * <code>
     * $query->filterByMandatory(true); // WHERE mandatory = true
     * $query->filterByMandatory('yes'); // WHERE mandatory = true
     * </code>
     *
     * @param     boolean|string $mandatory The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByMandatory($mandatory = null, $comparison = null)
    {
        if (is_string($mandatory)) {
            $mandatory = in_array(strtolower($mandatory), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(FdfieldPeer::MANDATORY, $mandatory, $comparison);
    }

    /**
     * Filter the query on the order column
     *
     * Example usage:
     * <code>
     * $query->filterByOrder(1234); // WHERE order = 1234
     * $query->filterByOrder(array(12, 34)); // WHERE order IN (12, 34)
     * $query->filterByOrder(array('min' => 12)); // WHERE order >= 12
     * $query->filterByOrder(array('max' => 12)); // WHERE order <= 12
     * </code>
     *
     * @param     mixed $order The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function filterByOrder($order = null, $comparison = null)
    {
        if (is_array($order)) {
            $useMinMax = false;
            if (isset($order['min'])) {
                $this->addUsingAlias(FdfieldPeer::ORDER, $order['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($order['max'])) {
                $this->addUsingAlias(FdfieldPeer::ORDER, $order['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdfieldPeer::ORDER, $order, $comparison);
    }

    /**
     * Filter the query by a related Fdfieldtype object
     *
     * @param   Fdfieldtype|PropelObjectCollection $fdfieldtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdfieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdfieldtype($fdfieldtype, $comparison = null)
    {
        if ($fdfieldtype instanceof Fdfieldtype) {
            return $this
                ->addUsingAlias(FdfieldPeer::FDFIELDTYPE_ID, $fdfieldtype->getId(), $comparison);
        } elseif ($fdfieldtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FdfieldPeer::FDFIELDTYPE_ID, $fdfieldtype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFdfieldtype() only accepts arguments of type Fdfieldtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fdfieldtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function joinFdfieldtype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fdfieldtype');

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
            $this->addJoinObject($join, 'Fdfieldtype');
        }

        return $this;
    }

    /**
     * Use the Fdfieldtype relation Fdfieldtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdfieldtypeQuery A secondary query class using the current class as primary query
     */
    public function useFdfieldtypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFdfieldtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fdfieldtype', '\Webmis\Models\FdfieldtypeQuery');
    }

    /**
     * Filter the query by a related Flatdirectory object
     *
     * @param   Flatdirectory|PropelObjectCollection $flatdirectory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdfieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFlatdirectoryRelatedByFlatdirectoryId($flatdirectory, $comparison = null)
    {
        if ($flatdirectory instanceof Flatdirectory) {
            return $this
                ->addUsingAlias(FdfieldPeer::FLATDIRECTORY_ID, $flatdirectory->getId(), $comparison);
        } elseif ($flatdirectory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FdfieldPeer::FLATDIRECTORY_ID, $flatdirectory->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFlatdirectoryRelatedByFlatdirectoryId() only accepts arguments of type Flatdirectory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function joinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FlatdirectoryRelatedByFlatdirectoryId');

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
            $this->addJoinObject($join, 'FlatdirectoryRelatedByFlatdirectoryId');
        }

        return $this;
    }

    /**
     * Use the FlatdirectoryRelatedByFlatdirectoryId relation Flatdirectory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FlatdirectoryQuery A secondary query class using the current class as primary query
     */
    public function useFlatdirectoryRelatedByFlatdirectoryIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFlatdirectoryRelatedByFlatdirectoryId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FlatdirectoryRelatedByFlatdirectoryId', '\Webmis\Models\FlatdirectoryQuery');
    }

    /**
     * Filter the query by a related Flatdirectory object
     *
     * @param   Flatdirectory|PropelObjectCollection $flatdirectory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdfieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFlatdirectoryRelatedByFlatdirectoryCode($flatdirectory, $comparison = null)
    {
        if ($flatdirectory instanceof Flatdirectory) {
            return $this
                ->addUsingAlias(FdfieldPeer::FLATDIRECTORY_CODE, $flatdirectory->getCode(), $comparison);
        } elseif ($flatdirectory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FdfieldPeer::FLATDIRECTORY_CODE, $flatdirectory->toKeyValue('PrimaryKey', 'Code'), $comparison);
        } else {
            throw new PropelException('filterByFlatdirectoryRelatedByFlatdirectoryCode() only accepts arguments of type Flatdirectory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function joinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FlatdirectoryRelatedByFlatdirectoryCode');

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
            $this->addJoinObject($join, 'FlatdirectoryRelatedByFlatdirectoryCode');
        }

        return $this;
    }

    /**
     * Use the FlatdirectoryRelatedByFlatdirectoryCode relation Flatdirectory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FlatdirectoryQuery A secondary query class using the current class as primary query
     */
    public function useFlatdirectoryRelatedByFlatdirectoryCodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FlatdirectoryRelatedByFlatdirectoryCode', '\Webmis\Models\FlatdirectoryQuery');
    }

    /**
     * Filter the query by a related Fdfieldvalue object
     *
     * @param   Fdfieldvalue|PropelObjectCollection $fdfieldvalue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdfieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdfieldvalue($fdfieldvalue, $comparison = null)
    {
        if ($fdfieldvalue instanceof Fdfieldvalue) {
            return $this
                ->addUsingAlias(FdfieldPeer::ID, $fdfieldvalue->getFdfieldId(), $comparison);
        } elseif ($fdfieldvalue instanceof PropelObjectCollection) {
            return $this
                ->useFdfieldvalueQuery()
                ->filterByPrimaryKeys($fdfieldvalue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFdfieldvalue() only accepts arguments of type Fdfieldvalue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fdfieldvalue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function joinFdfieldvalue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fdfieldvalue');

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
            $this->addJoinObject($join, 'Fdfieldvalue');
        }

        return $this;
    }

    /**
     * Use the Fdfieldvalue relation Fdfieldvalue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdfieldvalueQuery A secondary query class using the current class as primary query
     */
    public function useFdfieldvalueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFdfieldvalue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fdfieldvalue', '\Webmis\Models\FdfieldvalueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Fdfield $fdfield Object to remove from the list of results
     *
     * @return FdfieldQuery The current query, for fluid interface
     */
    public function prune($fdfield = null)
    {
        if ($fdfield) {
            $this->addUsingAlias(FdfieldPeer::ID, $fdfield->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
