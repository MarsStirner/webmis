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
use Webmis\Models\Rbsocstatusclasstypeassoc;
use Webmis\Models\RbsocstatusclasstypeassocPeer;
use Webmis\Models\RbsocstatusclasstypeassocQuery;

/**
 * Base class that represents a query for the 'rbSocStatusClassTypeAssoc' table.
 *
 *
 *
 * @method RbsocstatusclasstypeassocQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbsocstatusclasstypeassocQuery orderByClassId($order = Criteria::ASC) Order by the class_id column
 * @method RbsocstatusclasstypeassocQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 *
 * @method RbsocstatusclasstypeassocQuery groupById() Group by the id column
 * @method RbsocstatusclasstypeassocQuery groupByClassId() Group by the class_id column
 * @method RbsocstatusclasstypeassocQuery groupByTypeId() Group by the type_id column
 *
 * @method RbsocstatusclasstypeassocQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbsocstatusclasstypeassocQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbsocstatusclasstypeassocQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbsocstatusclasstypeassoc findOne(PropelPDO $con = null) Return the first Rbsocstatusclasstypeassoc matching the query
 * @method Rbsocstatusclasstypeassoc findOneOrCreate(PropelPDO $con = null) Return the first Rbsocstatusclasstypeassoc matching the query, or a new Rbsocstatusclasstypeassoc object populated from the query conditions when no match is found
 *
 * @method Rbsocstatusclasstypeassoc findOneByClassId(int $class_id) Return the first Rbsocstatusclasstypeassoc filtered by the class_id column
 * @method Rbsocstatusclasstypeassoc findOneByTypeId(int $type_id) Return the first Rbsocstatusclasstypeassoc filtered by the type_id column
 *
 * @method array findById(int $id) Return Rbsocstatusclasstypeassoc objects filtered by the id column
 * @method array findByClassId(int $class_id) Return Rbsocstatusclasstypeassoc objects filtered by the class_id column
 * @method array findByTypeId(int $type_id) Return Rbsocstatusclasstypeassoc objects filtered by the type_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbsocstatusclasstypeassocQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbsocstatusclasstypeassocQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbsocstatusclasstypeassoc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbsocstatusclasstypeassocQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbsocstatusclasstypeassocQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbsocstatusclasstypeassocQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbsocstatusclasstypeassocQuery) {
            return $criteria;
        }
        $query = new RbsocstatusclasstypeassocQuery();
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
     * @return   Rbsocstatusclasstypeassoc|Rbsocstatusclasstypeassoc[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbsocstatusclasstypeassocPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbsocstatusclasstypeassocPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbsocstatusclasstypeassoc A model object, or null if the key is not found
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
     * @return                 Rbsocstatusclasstypeassoc A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `class_id`, `type_id` FROM `rbSocStatusClassTypeAssoc` WHERE `id` = :p0';
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
            $obj = new Rbsocstatusclasstypeassoc();
            $obj->hydrate($row);
            RbsocstatusclasstypeassocPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbsocstatusclasstypeassoc|Rbsocstatusclasstypeassoc[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbsocstatusclasstypeassoc[]|mixed the list of results, formatted by the current formatter
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
     * @return RbsocstatusclasstypeassocQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbsocstatusclasstypeassocPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbsocstatusclasstypeassocQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbsocstatusclasstypeassocPeer::ID, $keys, Criteria::IN);
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
     * @return RbsocstatusclasstypeassocQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbsocstatusclasstypeassocPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbsocstatusclasstypeassocPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbsocstatusclasstypeassocPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the class_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClassId(1234); // WHERE class_id = 1234
     * $query->filterByClassId(array(12, 34)); // WHERE class_id IN (12, 34)
     * $query->filterByClassId(array('min' => 12)); // WHERE class_id >= 12
     * $query->filterByClassId(array('max' => 12)); // WHERE class_id <= 12
     * </code>
     *
     * @param     mixed $classId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbsocstatusclasstypeassocQuery The current query, for fluid interface
     */
    public function filterByClassId($classId = null, $comparison = null)
    {
        if (is_array($classId)) {
            $useMinMax = false;
            if (isset($classId['min'])) {
                $this->addUsingAlias(RbsocstatusclasstypeassocPeer::CLASS_ID, $classId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($classId['max'])) {
                $this->addUsingAlias(RbsocstatusclasstypeassocPeer::CLASS_ID, $classId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbsocstatusclasstypeassocPeer::CLASS_ID, $classId, $comparison);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id >= 12
     * $query->filterByTypeId(array('max' => 12)); // WHERE type_id <= 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbsocstatusclasstypeassocQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(RbsocstatusclasstypeassocPeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(RbsocstatusclasstypeassocPeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbsocstatusclasstypeassocPeer::TYPE_ID, $typeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbsocstatusclasstypeassoc $rbsocstatusclasstypeassoc Object to remove from the list of results
     *
     * @return RbsocstatusclasstypeassocQuery The current query, for fluid interface
     */
    public function prune($rbsocstatusclasstypeassoc = null)
    {
        if ($rbsocstatusclasstypeassoc) {
            $this->addUsingAlias(RbsocstatusclasstypeassocPeer::ID, $rbsocstatusclasstypeassoc->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
