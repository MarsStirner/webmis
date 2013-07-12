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
use Webmis\Models\ActionpropertyFdrecord;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\Fdfieldvalue;
use Webmis\Models\Fdrecord;
use Webmis\Models\FdrecordPeer;
use Webmis\Models\FdrecordQuery;
use Webmis\Models\Flatdirectory;

/**
 * Base class that represents a query for the 'FDRecord' table.
 *
 *
 *
 * @method FdrecordQuery orderById($order = Criteria::ASC) Order by the id column
 * @method FdrecordQuery orderByFlatdirectoryId($order = Criteria::ASC) Order by the flatDirectory_id column
 * @method FdrecordQuery orderByFlatdirectoryCode($order = Criteria::ASC) Order by the flatDirectory_code column
 * @method FdrecordQuery orderByOrder($order = Criteria::ASC) Order by the order column
 * @method FdrecordQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method FdrecordQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method FdrecordQuery orderByDatestart($order = Criteria::ASC) Order by the dateStart column
 * @method FdrecordQuery orderByDateend($order = Criteria::ASC) Order by the dateEnd column
 *
 * @method FdrecordQuery groupById() Group by the id column
 * @method FdrecordQuery groupByFlatdirectoryId() Group by the flatDirectory_id column
 * @method FdrecordQuery groupByFlatdirectoryCode() Group by the flatDirectory_code column
 * @method FdrecordQuery groupByOrder() Group by the order column
 * @method FdrecordQuery groupByName() Group by the name column
 * @method FdrecordQuery groupByDescription() Group by the description column
 * @method FdrecordQuery groupByDatestart() Group by the dateStart column
 * @method FdrecordQuery groupByDateend() Group by the dateEnd column
 *
 * @method FdrecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FdrecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FdrecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FdrecordQuery leftJoinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
 * @method FdrecordQuery rightJoinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
 * @method FdrecordQuery innerJoinFlatdirectoryRelatedByFlatdirectoryId($relationAlias = null) Adds a INNER JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryId relation
 *
 * @method FdrecordQuery leftJoinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
 * @method FdrecordQuery rightJoinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
 * @method FdrecordQuery innerJoinFlatdirectoryRelatedByFlatdirectoryCode($relationAlias = null) Adds a INNER JOIN clause to the query using the FlatdirectoryRelatedByFlatdirectoryCode relation
 *
 * @method FdrecordQuery leftJoinActionpropertyFdrecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionpropertyFdrecord relation
 * @method FdrecordQuery rightJoinActionpropertyFdrecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionpropertyFdrecord relation
 * @method FdrecordQuery innerJoinActionpropertyFdrecord($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionpropertyFdrecord relation
 *
 * @method FdrecordQuery leftJoinClientflatdirectory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientflatdirectory relation
 * @method FdrecordQuery rightJoinClientflatdirectory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientflatdirectory relation
 * @method FdrecordQuery innerJoinClientflatdirectory($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientflatdirectory relation
 *
 * @method FdrecordQuery leftJoinFdfieldvalue($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fdfieldvalue relation
 * @method FdrecordQuery rightJoinFdfieldvalue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fdfieldvalue relation
 * @method FdrecordQuery innerJoinFdfieldvalue($relationAlias = null) Adds a INNER JOIN clause to the query using the Fdfieldvalue relation
 *
 * @method Fdrecord findOne(PropelPDO $con = null) Return the first Fdrecord matching the query
 * @method Fdrecord findOneOrCreate(PropelPDO $con = null) Return the first Fdrecord matching the query, or a new Fdrecord object populated from the query conditions when no match is found
 *
 * @method Fdrecord findOneByFlatdirectoryId(int $flatDirectory_id) Return the first Fdrecord filtered by the flatDirectory_id column
 * @method Fdrecord findOneByFlatdirectoryCode(string $flatDirectory_code) Return the first Fdrecord filtered by the flatDirectory_code column
 * @method Fdrecord findOneByOrder(int $order) Return the first Fdrecord filtered by the order column
 * @method Fdrecord findOneByName(string $name) Return the first Fdrecord filtered by the name column
 * @method Fdrecord findOneByDescription(string $description) Return the first Fdrecord filtered by the description column
 * @method Fdrecord findOneByDatestart(string $dateStart) Return the first Fdrecord filtered by the dateStart column
 * @method Fdrecord findOneByDateend(string $dateEnd) Return the first Fdrecord filtered by the dateEnd column
 *
 * @method array findById(int $id) Return Fdrecord objects filtered by the id column
 * @method array findByFlatdirectoryId(int $flatDirectory_id) Return Fdrecord objects filtered by the flatDirectory_id column
 * @method array findByFlatdirectoryCode(string $flatDirectory_code) Return Fdrecord objects filtered by the flatDirectory_code column
 * @method array findByOrder(int $order) Return Fdrecord objects filtered by the order column
 * @method array findByName(string $name) Return Fdrecord objects filtered by the name column
 * @method array findByDescription(string $description) Return Fdrecord objects filtered by the description column
 * @method array findByDatestart(string $dateStart) Return Fdrecord objects filtered by the dateStart column
 * @method array findByDateend(string $dateEnd) Return Fdrecord objects filtered by the dateEnd column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseFdrecordQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFdrecordQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Fdrecord', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FdrecordQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FdrecordQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FdrecordQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FdrecordQuery) {
            return $criteria;
        }
        $query = new FdrecordQuery();
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
     * @return   Fdrecord|Fdrecord[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FdrecordPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FdrecordPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Fdrecord A model object, or null if the key is not found
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
     * @return                 Fdrecord A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `flatDirectory_id`, `flatDirectory_code`, `order`, `name`, `description`, `dateStart`, `dateEnd` FROM `FDRecord` WHERE `id` = :p0';
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
            $obj = new Fdrecord();
            $obj->hydrate($row);
            FdrecordPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Fdrecord|Fdrecord[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Fdrecord[]|mixed the list of results, formatted by the current formatter
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
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FdrecordPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FdrecordPeer::ID, $keys, Criteria::IN);
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
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(FdrecordPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(FdrecordPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdrecordPeer::ID, $id, $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterByFlatdirectoryId($flatdirectoryId = null, $comparison = null)
    {
        if (is_array($flatdirectoryId)) {
            $useMinMax = false;
            if (isset($flatdirectoryId['min'])) {
                $this->addUsingAlias(FdrecordPeer::FLATDIRECTORY_ID, $flatdirectoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flatdirectoryId['max'])) {
                $this->addUsingAlias(FdrecordPeer::FLATDIRECTORY_ID, $flatdirectoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdrecordPeer::FLATDIRECTORY_ID, $flatdirectoryId, $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FdrecordPeer::FLATDIRECTORY_CODE, $flatdirectoryCode, $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterByOrder($order = null, $comparison = null)
    {
        if (is_array($order)) {
            $useMinMax = false;
            if (isset($order['min'])) {
                $this->addUsingAlias(FdrecordPeer::ORDER, $order['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($order['max'])) {
                $this->addUsingAlias(FdrecordPeer::ORDER, $order['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdrecordPeer::ORDER, $order, $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FdrecordPeer::NAME, $name, $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
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

        return $this->addUsingAlias(FdrecordPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the dateStart column
     *
     * Example usage:
     * <code>
     * $query->filterByDatestart('2011-03-14'); // WHERE dateStart = '2011-03-14'
     * $query->filterByDatestart('now'); // WHERE dateStart = '2011-03-14'
     * $query->filterByDatestart(array('max' => 'yesterday')); // WHERE dateStart > '2011-03-13'
     * </code>
     *
     * @param     mixed $datestart The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterByDatestart($datestart = null, $comparison = null)
    {
        if (is_array($datestart)) {
            $useMinMax = false;
            if (isset($datestart['min'])) {
                $this->addUsingAlias(FdrecordPeer::DATESTART, $datestart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datestart['max'])) {
                $this->addUsingAlias(FdrecordPeer::DATESTART, $datestart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdrecordPeer::DATESTART, $datestart, $comparison);
    }

    /**
     * Filter the query on the dateEnd column
     *
     * Example usage:
     * <code>
     * $query->filterByDateend('2011-03-14'); // WHERE dateEnd = '2011-03-14'
     * $query->filterByDateend('now'); // WHERE dateEnd = '2011-03-14'
     * $query->filterByDateend(array('max' => 'yesterday')); // WHERE dateEnd > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateend The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function filterByDateend($dateend = null, $comparison = null)
    {
        if (is_array($dateend)) {
            $useMinMax = false;
            if (isset($dateend['min'])) {
                $this->addUsingAlias(FdrecordPeer::DATEEND, $dateend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateend['max'])) {
                $this->addUsingAlias(FdrecordPeer::DATEEND, $dateend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FdrecordPeer::DATEEND, $dateend, $comparison);
    }

    /**
     * Filter the query by a related Flatdirectory object
     *
     * @param   Flatdirectory|PropelObjectCollection $flatdirectory The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFlatdirectoryRelatedByFlatdirectoryId($flatdirectory, $comparison = null)
    {
        if ($flatdirectory instanceof Flatdirectory) {
            return $this
                ->addUsingAlias(FdrecordPeer::FLATDIRECTORY_ID, $flatdirectory->getId(), $comparison);
        } elseif ($flatdirectory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FdrecordPeer::FLATDIRECTORY_ID, $flatdirectory->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
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
     * @return                 FdrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFlatdirectoryRelatedByFlatdirectoryCode($flatdirectory, $comparison = null)
    {
        if ($flatdirectory instanceof Flatdirectory) {
            return $this
                ->addUsingAlias(FdrecordPeer::FLATDIRECTORY_CODE, $flatdirectory->getCode(), $comparison);
        } elseif ($flatdirectory instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(FdrecordPeer::FLATDIRECTORY_CODE, $flatdirectory->toKeyValue('PrimaryKey', 'Code'), $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
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
     * Filter the query by a related ActionpropertyFdrecord object
     *
     * @param   ActionpropertyFdrecord|PropelObjectCollection $actionpropertyFdrecord  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionpropertyFdrecord($actionpropertyFdrecord, $comparison = null)
    {
        if ($actionpropertyFdrecord instanceof ActionpropertyFdrecord) {
            return $this
                ->addUsingAlias(FdrecordPeer::ID, $actionpropertyFdrecord->getValue(), $comparison);
        } elseif ($actionpropertyFdrecord instanceof PropelObjectCollection) {
            return $this
                ->useActionpropertyFdrecordQuery()
                ->filterByPrimaryKeys($actionpropertyFdrecord->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionpropertyFdrecord() only accepts arguments of type ActionpropertyFdrecord or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionpropertyFdrecord relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function joinActionpropertyFdrecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionpropertyFdrecord');

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
            $this->addJoinObject($join, 'ActionpropertyFdrecord');
        }

        return $this;
    }

    /**
     * Use the ActionpropertyFdrecord relation ActionpropertyFdrecord object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionpropertyFdrecordQuery A secondary query class using the current class as primary query
     */
    public function useActionpropertyFdrecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionpropertyFdrecord($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionpropertyFdrecord', '\Webmis\Models\ActionpropertyFdrecordQuery');
    }

    /**
     * Filter the query by a related Clientflatdirectory object
     *
     * @param   Clientflatdirectory|PropelObjectCollection $clientflatdirectory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientflatdirectory($clientflatdirectory, $comparison = null)
    {
        if ($clientflatdirectory instanceof Clientflatdirectory) {
            return $this
                ->addUsingAlias(FdrecordPeer::ID, $clientflatdirectory->getFdrecordId(), $comparison);
        } elseif ($clientflatdirectory instanceof PropelObjectCollection) {
            return $this
                ->useClientflatdirectoryQuery()
                ->filterByPrimaryKeys($clientflatdirectory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientflatdirectory() only accepts arguments of type Clientflatdirectory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientflatdirectory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function joinClientflatdirectory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientflatdirectory');

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
            $this->addJoinObject($join, 'Clientflatdirectory');
        }

        return $this;
    }

    /**
     * Use the Clientflatdirectory relation Clientflatdirectory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientflatdirectoryQuery A secondary query class using the current class as primary query
     */
    public function useClientflatdirectoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientflatdirectory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientflatdirectory', '\Webmis\Models\ClientflatdirectoryQuery');
    }

    /**
     * Filter the query by a related Fdfieldvalue object
     *
     * @param   Fdfieldvalue|PropelObjectCollection $fdfieldvalue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FdrecordQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdfieldvalue($fdfieldvalue, $comparison = null)
    {
        if ($fdfieldvalue instanceof Fdfieldvalue) {
            return $this
                ->addUsingAlias(FdrecordPeer::ID, $fdfieldvalue->getFdrecordId(), $comparison);
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
     * @return FdrecordQuery The current query, for fluid interface
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
     * @param   Fdrecord $fdrecord Object to remove from the list of results
     *
     * @return FdrecordQuery The current query, for fluid interface
     */
    public function prune($fdrecord = null)
    {
        if ($fdrecord) {
            $this->addUsingAlias(FdrecordPeer::ID, $fdrecord->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
