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
use Webmis\Models\Orgstructure;
use Webmis\Models\Person;
use Webmis\Models\Stockmotion;
use Webmis\Models\StockmotionItem;
use Webmis\Models\StockmotionPeer;
use Webmis\Models\StockmotionQuery;

/**
 * Base class that represents a query for the 'StockMotion' table.
 *
 *
 *
 * @method StockmotionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StockmotionQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method StockmotionQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method StockmotionQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method StockmotionQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method StockmotionQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method StockmotionQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method StockmotionQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method StockmotionQuery orderBySupplierId($order = Criteria::ASC) Order by the supplier_id column
 * @method StockmotionQuery orderByReceiverId($order = Criteria::ASC) Order by the receiver_id column
 * @method StockmotionQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method StockmotionQuery orderBySupplierpersonId($order = Criteria::ASC) Order by the supplierPerson_id column
 * @method StockmotionQuery orderByReceiverpersonId($order = Criteria::ASC) Order by the receiverPerson_id column
 *
 * @method StockmotionQuery groupById() Group by the id column
 * @method StockmotionQuery groupByCreatedatetime() Group by the createDatetime column
 * @method StockmotionQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method StockmotionQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method StockmotionQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method StockmotionQuery groupByDeleted() Group by the deleted column
 * @method StockmotionQuery groupByType() Group by the type column
 * @method StockmotionQuery groupByDate() Group by the date column
 * @method StockmotionQuery groupBySupplierId() Group by the supplier_id column
 * @method StockmotionQuery groupByReceiverId() Group by the receiver_id column
 * @method StockmotionQuery groupByNote() Group by the note column
 * @method StockmotionQuery groupBySupplierpersonId() Group by the supplierPerson_id column
 * @method StockmotionQuery groupByReceiverpersonId() Group by the receiverPerson_id column
 *
 * @method StockmotionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StockmotionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StockmotionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StockmotionQuery leftJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method StockmotionQuery rightJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method StockmotionQuery innerJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 *
 * @method StockmotionQuery leftJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method StockmotionQuery rightJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method StockmotionQuery innerJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByModifypersonId relation
 *
 * @method StockmotionQuery leftJoinOrgstructureRelatedByReceiverId($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureRelatedByReceiverId relation
 * @method StockmotionQuery rightJoinOrgstructureRelatedByReceiverId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureRelatedByReceiverId relation
 * @method StockmotionQuery innerJoinOrgstructureRelatedByReceiverId($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureRelatedByReceiverId relation
 *
 * @method StockmotionQuery leftJoinPersonRelatedByReceiverpersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByReceiverpersonId relation
 * @method StockmotionQuery rightJoinPersonRelatedByReceiverpersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByReceiverpersonId relation
 * @method StockmotionQuery innerJoinPersonRelatedByReceiverpersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByReceiverpersonId relation
 *
 * @method StockmotionQuery leftJoinOrgstructureRelatedBySupplierId($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
 * @method StockmotionQuery rightJoinOrgstructureRelatedBySupplierId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
 * @method StockmotionQuery innerJoinOrgstructureRelatedBySupplierId($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
 *
 * @method StockmotionQuery leftJoinPersonRelatedBySupplierpersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedBySupplierpersonId relation
 * @method StockmotionQuery rightJoinPersonRelatedBySupplierpersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedBySupplierpersonId relation
 * @method StockmotionQuery innerJoinPersonRelatedBySupplierpersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedBySupplierpersonId relation
 *
 * @method StockmotionQuery leftJoinStockmotionItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionItem relation
 * @method StockmotionQuery rightJoinStockmotionItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionItem relation
 * @method StockmotionQuery innerJoinStockmotionItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionItem relation
 *
 * @method Stockmotion findOne(PropelPDO $con = null) Return the first Stockmotion matching the query
 * @method Stockmotion findOneOrCreate(PropelPDO $con = null) Return the first Stockmotion matching the query, or a new Stockmotion object populated from the query conditions when no match is found
 *
 * @method Stockmotion findOneByCreatedatetime(string $createDatetime) Return the first Stockmotion filtered by the createDatetime column
 * @method Stockmotion findOneByCreatepersonId(int $createPerson_id) Return the first Stockmotion filtered by the createPerson_id column
 * @method Stockmotion findOneByModifydatetime(string $modifyDatetime) Return the first Stockmotion filtered by the modifyDatetime column
 * @method Stockmotion findOneByModifypersonId(int $modifyPerson_id) Return the first Stockmotion filtered by the modifyPerson_id column
 * @method Stockmotion findOneByDeleted(boolean $deleted) Return the first Stockmotion filtered by the deleted column
 * @method Stockmotion findOneByType(int $type) Return the first Stockmotion filtered by the type column
 * @method Stockmotion findOneByDate(string $date) Return the first Stockmotion filtered by the date column
 * @method Stockmotion findOneBySupplierId(int $supplier_id) Return the first Stockmotion filtered by the supplier_id column
 * @method Stockmotion findOneByReceiverId(int $receiver_id) Return the first Stockmotion filtered by the receiver_id column
 * @method Stockmotion findOneByNote(string $note) Return the first Stockmotion filtered by the note column
 * @method Stockmotion findOneBySupplierpersonId(int $supplierPerson_id) Return the first Stockmotion filtered by the supplierPerson_id column
 * @method Stockmotion findOneByReceiverpersonId(int $receiverPerson_id) Return the first Stockmotion filtered by the receiverPerson_id column
 *
 * @method array findById(int $id) Return Stockmotion objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Stockmotion objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Stockmotion objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Stockmotion objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Stockmotion objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Stockmotion objects filtered by the deleted column
 * @method array findByType(int $type) Return Stockmotion objects filtered by the type column
 * @method array findByDate(string $date) Return Stockmotion objects filtered by the date column
 * @method array findBySupplierId(int $supplier_id) Return Stockmotion objects filtered by the supplier_id column
 * @method array findByReceiverId(int $receiver_id) Return Stockmotion objects filtered by the receiver_id column
 * @method array findByNote(string $note) Return Stockmotion objects filtered by the note column
 * @method array findBySupplierpersonId(int $supplierPerson_id) Return Stockmotion objects filtered by the supplierPerson_id column
 * @method array findByReceiverpersonId(int $receiverPerson_id) Return Stockmotion objects filtered by the receiverPerson_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockmotionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStockmotionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Stockmotion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StockmotionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StockmotionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StockmotionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StockmotionQuery) {
            return $criteria;
        }
        $query = new StockmotionQuery();
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
     * @return   Stockmotion|Stockmotion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StockmotionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StockmotionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stockmotion A model object, or null if the key is not found
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
     * @return                 Stockmotion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `type`, `date`, `supplier_id`, `receiver_id`, `note`, `supplierPerson_id`, `receiverPerson_id` FROM `StockMotion` WHERE `id` = :p0';
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
            $obj = new Stockmotion();
            $obj->hydrate($row);
            StockmotionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Stockmotion|Stockmotion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Stockmotion[]|mixed the list of results, formatted by the current formatter
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
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StockmotionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StockmotionPeer::ID, $keys, Criteria::IN);
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
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StockmotionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StockmotionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the createDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedatetime('2011-03-14'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime('now'); // WHERE createDatetime = '2011-03-14'
     * $query->filterByCreatedatetime(array('max' => 'yesterday')); // WHERE createDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(StockmotionPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(StockmotionPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::CREATEDATETIME, $createdatetime, $comparison);
    }

    /**
     * Filter the query on the createPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatepersonId(1234); // WHERE createPerson_id = 1234
     * $query->filterByCreatepersonId(array(12, 34)); // WHERE createPerson_id IN (12, 34)
     * $query->filterByCreatepersonId(array('min' => 12)); // WHERE createPerson_id >= 12
     * $query->filterByCreatepersonId(array('max' => 12)); // WHERE createPerson_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByCreatepersonId()
     *
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(StockmotionPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(StockmotionPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::CREATEPERSON_ID, $createpersonId, $comparison);
    }

    /**
     * Filter the query on the modifyDatetime column
     *
     * Example usage:
     * <code>
     * $query->filterByModifydatetime('2011-03-14'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime('now'); // WHERE modifyDatetime = '2011-03-14'
     * $query->filterByModifydatetime(array('max' => 'yesterday')); // WHERE modifyDatetime > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifydatetime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(StockmotionPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(StockmotionPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::MODIFYDATETIME, $modifydatetime, $comparison);
    }

    /**
     * Filter the query on the modifyPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByModifypersonId(1234); // WHERE modifyPerson_id = 1234
     * $query->filterByModifypersonId(array(12, 34)); // WHERE modifyPerson_id IN (12, 34)
     * $query->filterByModifypersonId(array('min' => 12)); // WHERE modifyPerson_id >= 12
     * $query->filterByModifypersonId(array('max' => 12)); // WHERE modifyPerson_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByModifypersonId()
     *
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(StockmotionPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(StockmotionPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(StockmotionPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type >= 12
     * $query->filterByType(array('max' => 12)); // WHERE type <= 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(StockmotionPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(StockmotionPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(StockmotionPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(StockmotionPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the supplier_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySupplierId(1234); // WHERE supplier_id = 1234
     * $query->filterBySupplierId(array(12, 34)); // WHERE supplier_id IN (12, 34)
     * $query->filterBySupplierId(array('min' => 12)); // WHERE supplier_id >= 12
     * $query->filterBySupplierId(array('max' => 12)); // WHERE supplier_id <= 12
     * </code>
     *
     * @see       filterByOrgstructureRelatedBySupplierId()
     *
     * @param     mixed $supplierId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterBySupplierId($supplierId = null, $comparison = null)
    {
        if (is_array($supplierId)) {
            $useMinMax = false;
            if (isset($supplierId['min'])) {
                $this->addUsingAlias(StockmotionPeer::SUPPLIER_ID, $supplierId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($supplierId['max'])) {
                $this->addUsingAlias(StockmotionPeer::SUPPLIER_ID, $supplierId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::SUPPLIER_ID, $supplierId, $comparison);
    }

    /**
     * Filter the query on the receiver_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiverId(1234); // WHERE receiver_id = 1234
     * $query->filterByReceiverId(array(12, 34)); // WHERE receiver_id IN (12, 34)
     * $query->filterByReceiverId(array('min' => 12)); // WHERE receiver_id >= 12
     * $query->filterByReceiverId(array('max' => 12)); // WHERE receiver_id <= 12
     * </code>
     *
     * @see       filterByOrgstructureRelatedByReceiverId()
     *
     * @param     mixed $receiverId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByReceiverId($receiverId = null, $comparison = null)
    {
        if (is_array($receiverId)) {
            $useMinMax = false;
            if (isset($receiverId['min'])) {
                $this->addUsingAlias(StockmotionPeer::RECEIVER_ID, $receiverId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiverId['max'])) {
                $this->addUsingAlias(StockmotionPeer::RECEIVER_ID, $receiverId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::RECEIVER_ID, $receiverId, $comparison);
    }

    /**
     * Filter the query on the note column
     *
     * Example usage:
     * <code>
     * $query->filterByNote('fooValue');   // WHERE note = 'fooValue'
     * $query->filterByNote('%fooValue%'); // WHERE note LIKE '%fooValue%'
     * </code>
     *
     * @param     string $note The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByNote($note = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($note)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $note)) {
                $note = str_replace('*', '%', $note);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the supplierPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySupplierpersonId(1234); // WHERE supplierPerson_id = 1234
     * $query->filterBySupplierpersonId(array(12, 34)); // WHERE supplierPerson_id IN (12, 34)
     * $query->filterBySupplierpersonId(array('min' => 12)); // WHERE supplierPerson_id >= 12
     * $query->filterBySupplierpersonId(array('max' => 12)); // WHERE supplierPerson_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedBySupplierpersonId()
     *
     * @param     mixed $supplierpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterBySupplierpersonId($supplierpersonId = null, $comparison = null)
    {
        if (is_array($supplierpersonId)) {
            $useMinMax = false;
            if (isset($supplierpersonId['min'])) {
                $this->addUsingAlias(StockmotionPeer::SUPPLIERPERSON_ID, $supplierpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($supplierpersonId['max'])) {
                $this->addUsingAlias(StockmotionPeer::SUPPLIERPERSON_ID, $supplierpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::SUPPLIERPERSON_ID, $supplierpersonId, $comparison);
    }

    /**
     * Filter the query on the receiverPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByReceiverpersonId(1234); // WHERE receiverPerson_id = 1234
     * $query->filterByReceiverpersonId(array(12, 34)); // WHERE receiverPerson_id IN (12, 34)
     * $query->filterByReceiverpersonId(array('min' => 12)); // WHERE receiverPerson_id >= 12
     * $query->filterByReceiverpersonId(array('max' => 12)); // WHERE receiverPerson_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByReceiverpersonId()
     *
     * @param     mixed $receiverpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function filterByReceiverpersonId($receiverpersonId = null, $comparison = null)
    {
        if (is_array($receiverpersonId)) {
            $useMinMax = false;
            if (isset($receiverpersonId['min'])) {
                $this->addUsingAlias(StockmotionPeer::RECEIVERPERSON_ID, $receiverpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($receiverpersonId['max'])) {
                $this->addUsingAlias(StockmotionPeer::RECEIVERPERSON_ID, $receiverpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockmotionPeer::RECEIVERPERSON_ID, $receiverpersonId, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByCreatepersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockmotionPeer::CREATEPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionPeer::CREATEPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByCreatepersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'PersonRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByCreatepersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByCreatepersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByModifypersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockmotionPeer::MODIFYPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionPeer::MODIFYPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByModifypersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'PersonRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByModifypersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByModifypersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureRelatedByReceiverId($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(StockmotionPeer::RECEIVER_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionPeer::RECEIVER_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructureRelatedByReceiverId() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureRelatedByReceiverId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinOrgstructureRelatedByReceiverId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureRelatedByReceiverId');

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
            $this->addJoinObject($join, 'OrgstructureRelatedByReceiverId');
        }

        return $this;
    }

    /**
     * Use the OrgstructureRelatedByReceiverId relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureRelatedByReceiverIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureRelatedByReceiverId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureRelatedByReceiverId', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByReceiverpersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockmotionPeer::RECEIVERPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionPeer::RECEIVERPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByReceiverpersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByReceiverpersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByReceiverpersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByReceiverpersonId');

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
            $this->addJoinObject($join, 'PersonRelatedByReceiverpersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByReceiverpersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByReceiverpersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByReceiverpersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByReceiverpersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureRelatedBySupplierId($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(StockmotionPeer::SUPPLIER_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionPeer::SUPPLIER_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructureRelatedBySupplierId() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinOrgstructureRelatedBySupplierId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureRelatedBySupplierId');

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
            $this->addJoinObject($join, 'OrgstructureRelatedBySupplierId');
        }

        return $this;
    }

    /**
     * Use the OrgstructureRelatedBySupplierId relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureRelatedBySupplierIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureRelatedBySupplierId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureRelatedBySupplierId', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedBySupplierpersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockmotionPeer::SUPPLIERPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockmotionPeer::SUPPLIERPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedBySupplierpersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedBySupplierpersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinPersonRelatedBySupplierpersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedBySupplierpersonId');

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
            $this->addJoinObject($join, 'PersonRelatedBySupplierpersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedBySupplierpersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedBySupplierpersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedBySupplierpersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedBySupplierpersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related StockmotionItem object
     *
     * @param   StockmotionItem|PropelObjectCollection $stockmotionItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockmotionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionItem($stockmotionItem, $comparison = null)
    {
        if ($stockmotionItem instanceof StockmotionItem) {
            return $this
                ->addUsingAlias(StockmotionPeer::ID, $stockmotionItem->getMasterId(), $comparison);
        } elseif ($stockmotionItem instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionItemQuery()
                ->filterByPrimaryKeys($stockmotionItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionItem() only accepts arguments of type StockmotionItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function joinStockmotionItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionItem');

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
            $this->addJoinObject($join, 'StockmotionItem');
        }

        return $this;
    }

    /**
     * Use the StockmotionItem relation StockmotionItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionItemQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockmotionItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionItem', '\Webmis\Models\StockmotionItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Stockmotion $stockmotion Object to remove from the list of results
     *
     * @return StockmotionQuery The current query, for fluid interface
     */
    public function prune($stockmotion = null)
    {
        if ($stockmotion) {
            $this->addUsingAlias(StockmotionPeer::ID, $stockmotion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
