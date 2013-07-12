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
use Webmis\Models\Stockrequisition;
use Webmis\Models\StockrequisitionItem;
use Webmis\Models\StockrequisitionPeer;
use Webmis\Models\StockrequisitionQuery;

/**
 * Base class that represents a query for the 'StockRequisition' table.
 *
 *
 *
 * @method StockrequisitionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method StockrequisitionQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method StockrequisitionQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method StockrequisitionQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method StockrequisitionQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method StockrequisitionQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method StockrequisitionQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method StockrequisitionQuery orderByDeadline($order = Criteria::ASC) Order by the deadline column
 * @method StockrequisitionQuery orderBySupplierId($order = Criteria::ASC) Order by the supplier_id column
 * @method StockrequisitionQuery orderByRecipientId($order = Criteria::ASC) Order by the recipient_id column
 * @method StockrequisitionQuery orderByRevoked($order = Criteria::ASC) Order by the revoked column
 * @method StockrequisitionQuery orderByNote($order = Criteria::ASC) Order by the note column
 *
 * @method StockrequisitionQuery groupById() Group by the id column
 * @method StockrequisitionQuery groupByCreatedatetime() Group by the createDatetime column
 * @method StockrequisitionQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method StockrequisitionQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method StockrequisitionQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method StockrequisitionQuery groupByDeleted() Group by the deleted column
 * @method StockrequisitionQuery groupByDate() Group by the date column
 * @method StockrequisitionQuery groupByDeadline() Group by the deadline column
 * @method StockrequisitionQuery groupBySupplierId() Group by the supplier_id column
 * @method StockrequisitionQuery groupByRecipientId() Group by the recipient_id column
 * @method StockrequisitionQuery groupByRevoked() Group by the revoked column
 * @method StockrequisitionQuery groupByNote() Group by the note column
 *
 * @method StockrequisitionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StockrequisitionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StockrequisitionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StockrequisitionQuery leftJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method StockrequisitionQuery rightJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method StockrequisitionQuery innerJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 *
 * @method StockrequisitionQuery leftJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method StockrequisitionQuery rightJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method StockrequisitionQuery innerJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByModifypersonId relation
 *
 * @method StockrequisitionQuery leftJoinOrgstructureRelatedByRecipientId($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureRelatedByRecipientId relation
 * @method StockrequisitionQuery rightJoinOrgstructureRelatedByRecipientId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureRelatedByRecipientId relation
 * @method StockrequisitionQuery innerJoinOrgstructureRelatedByRecipientId($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureRelatedByRecipientId relation
 *
 * @method StockrequisitionQuery leftJoinOrgstructureRelatedBySupplierId($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
 * @method StockrequisitionQuery rightJoinOrgstructureRelatedBySupplierId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
 * @method StockrequisitionQuery innerJoinOrgstructureRelatedBySupplierId($relationAlias = null) Adds a INNER JOIN clause to the query using the OrgstructureRelatedBySupplierId relation
 *
 * @method StockrequisitionQuery leftJoinStockrequisitionItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionItem relation
 * @method StockrequisitionQuery rightJoinStockrequisitionItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionItem relation
 * @method StockrequisitionQuery innerJoinStockrequisitionItem($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionItem relation
 *
 * @method Stockrequisition findOne(PropelPDO $con = null) Return the first Stockrequisition matching the query
 * @method Stockrequisition findOneOrCreate(PropelPDO $con = null) Return the first Stockrequisition matching the query, or a new Stockrequisition object populated from the query conditions when no match is found
 *
 * @method Stockrequisition findOneByCreatedatetime(string $createDatetime) Return the first Stockrequisition filtered by the createDatetime column
 * @method Stockrequisition findOneByCreatepersonId(int $createPerson_id) Return the first Stockrequisition filtered by the createPerson_id column
 * @method Stockrequisition findOneByModifydatetime(string $modifyDatetime) Return the first Stockrequisition filtered by the modifyDatetime column
 * @method Stockrequisition findOneByModifypersonId(int $modifyPerson_id) Return the first Stockrequisition filtered by the modifyPerson_id column
 * @method Stockrequisition findOneByDeleted(boolean $deleted) Return the first Stockrequisition filtered by the deleted column
 * @method Stockrequisition findOneByDate(string $date) Return the first Stockrequisition filtered by the date column
 * @method Stockrequisition findOneByDeadline(string $deadline) Return the first Stockrequisition filtered by the deadline column
 * @method Stockrequisition findOneBySupplierId(int $supplier_id) Return the first Stockrequisition filtered by the supplier_id column
 * @method Stockrequisition findOneByRecipientId(int $recipient_id) Return the first Stockrequisition filtered by the recipient_id column
 * @method Stockrequisition findOneByRevoked(boolean $revoked) Return the first Stockrequisition filtered by the revoked column
 * @method Stockrequisition findOneByNote(string $note) Return the first Stockrequisition filtered by the note column
 *
 * @method array findById(int $id) Return Stockrequisition objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Stockrequisition objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Stockrequisition objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Stockrequisition objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Stockrequisition objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Stockrequisition objects filtered by the deleted column
 * @method array findByDate(string $date) Return Stockrequisition objects filtered by the date column
 * @method array findByDeadline(string $deadline) Return Stockrequisition objects filtered by the deadline column
 * @method array findBySupplierId(int $supplier_id) Return Stockrequisition objects filtered by the supplier_id column
 * @method array findByRecipientId(int $recipient_id) Return Stockrequisition objects filtered by the recipient_id column
 * @method array findByRevoked(boolean $revoked) Return Stockrequisition objects filtered by the revoked column
 * @method array findByNote(string $note) Return Stockrequisition objects filtered by the note column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseStockrequisitionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStockrequisitionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Stockrequisition', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StockrequisitionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StockrequisitionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StockrequisitionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StockrequisitionQuery) {
            return $criteria;
        }
        $query = new StockrequisitionQuery();
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
     * @return   Stockrequisition|Stockrequisition[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StockrequisitionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StockrequisitionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Stockrequisition A model object, or null if the key is not found
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
     * @return                 Stockrequisition A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `date`, `deadline`, `supplier_id`, `recipient_id`, `revoked`, `note` FROM `StockRequisition` WHERE `id` = :p0';
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
            $obj = new Stockrequisition();
            $obj->hydrate($row);
            StockrequisitionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Stockrequisition|Stockrequisition[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Stockrequisition[]|mixed the list of results, formatted by the current formatter
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StockrequisitionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StockrequisitionPeer::ID, $keys, Criteria::IN);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::ID, $id, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(StockrequisitionPeer::DELETED, $deleted, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the deadline column
     *
     * Example usage:
     * <code>
     * $query->filterByDeadline('2011-03-14'); // WHERE deadline = '2011-03-14'
     * $query->filterByDeadline('now'); // WHERE deadline = '2011-03-14'
     * $query->filterByDeadline(array('max' => 'yesterday')); // WHERE deadline > '2011-03-13'
     * </code>
     *
     * @param     mixed $deadline The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByDeadline($deadline = null, $comparison = null)
    {
        if (is_array($deadline)) {
            $useMinMax = false;
            if (isset($deadline['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::DEADLINE, $deadline['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($deadline['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::DEADLINE, $deadline['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::DEADLINE, $deadline, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterBySupplierId($supplierId = null, $comparison = null)
    {
        if (is_array($supplierId)) {
            $useMinMax = false;
            if (isset($supplierId['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::SUPPLIER_ID, $supplierId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($supplierId['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::SUPPLIER_ID, $supplierId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::SUPPLIER_ID, $supplierId, $comparison);
    }

    /**
     * Filter the query on the recipient_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipientId(1234); // WHERE recipient_id = 1234
     * $query->filterByRecipientId(array(12, 34)); // WHERE recipient_id IN (12, 34)
     * $query->filterByRecipientId(array('min' => 12)); // WHERE recipient_id >= 12
     * $query->filterByRecipientId(array('max' => 12)); // WHERE recipient_id <= 12
     * </code>
     *
     * @see       filterByOrgstructureRelatedByRecipientId()
     *
     * @param     mixed $recipientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByRecipientId($recipientId = null, $comparison = null)
    {
        if (is_array($recipientId)) {
            $useMinMax = false;
            if (isset($recipientId['min'])) {
                $this->addUsingAlias(StockrequisitionPeer::RECIPIENT_ID, $recipientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recipientId['max'])) {
                $this->addUsingAlias(StockrequisitionPeer::RECIPIENT_ID, $recipientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StockrequisitionPeer::RECIPIENT_ID, $recipientId, $comparison);
    }

    /**
     * Filter the query on the revoked column
     *
     * Example usage:
     * <code>
     * $query->filterByRevoked(true); // WHERE revoked = true
     * $query->filterByRevoked('yes'); // WHERE revoked = true
     * </code>
     *
     * @param     boolean|string $revoked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function filterByRevoked($revoked = null, $comparison = null)
    {
        if (is_string($revoked)) {
            $revoked = in_array(strtolower($revoked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(StockrequisitionPeer::REVOKED, $revoked, $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StockrequisitionPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrequisitionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByCreatepersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockrequisitionPeer::CREATEPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionPeer::CREATEPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
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
     * @return                 StockrequisitionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByModifypersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(StockrequisitionPeer::MODIFYPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionPeer::MODIFYPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
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
     * @return                 StockrequisitionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureRelatedByRecipientId($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(StockrequisitionPeer::RECIPIENT_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionPeer::RECIPIENT_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructureRelatedByRecipientId() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrgstructureRelatedByRecipientId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function joinOrgstructureRelatedByRecipientId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrgstructureRelatedByRecipientId');

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
            $this->addJoinObject($join, 'OrgstructureRelatedByRecipientId');
        }

        return $this;
    }

    /**
     * Use the OrgstructureRelatedByRecipientId relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureRelatedByRecipientIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructureRelatedByRecipientId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrgstructureRelatedByRecipientId', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related Orgstructure object
     *
     * @param   Orgstructure|PropelObjectCollection $orgstructure The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrequisitionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructureRelatedBySupplierId($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(StockrequisitionPeer::SUPPLIER_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StockrequisitionPeer::SUPPLIER_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return StockrequisitionQuery The current query, for fluid interface
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
     * Filter the query by a related StockrequisitionItem object
     *
     * @param   StockrequisitionItem|PropelObjectCollection $stockrequisitionItem  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StockrequisitionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionItem($stockrequisitionItem, $comparison = null)
    {
        if ($stockrequisitionItem instanceof StockrequisitionItem) {
            return $this
                ->addUsingAlias(StockrequisitionPeer::ID, $stockrequisitionItem->getMasterId(), $comparison);
        } elseif ($stockrequisitionItem instanceof PropelObjectCollection) {
            return $this
                ->useStockrequisitionItemQuery()
                ->filterByPrimaryKeys($stockrequisitionItem->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrequisitionItem() only accepts arguments of type StockrequisitionItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrequisitionItem relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function joinStockrequisitionItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrequisitionItem');

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
            $this->addJoinObject($join, 'StockrequisitionItem');
        }

        return $this;
    }

    /**
     * Use the StockrequisitionItem relation StockrequisitionItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionItemQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockrequisitionItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrequisitionItem', '\Webmis\Models\StockrequisitionItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Stockrequisition $stockrequisition Object to remove from the list of results
     *
     * @return StockrequisitionQuery The current query, for fluid interface
     */
    public function prune($stockrequisition = null)
    {
        if ($stockrequisition) {
            $this->addUsingAlias(StockrequisitionPeer::ID, $stockrequisition->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
