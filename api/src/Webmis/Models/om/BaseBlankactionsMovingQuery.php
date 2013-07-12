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
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\BlankactionsMovingPeer;
use Webmis\Models\BlankactionsMovingQuery;
use Webmis\Models\BlankactionsParty;
use Webmis\Models\Orgstructure;
use Webmis\Models\Person;

/**
 * Base class that represents a query for the 'BlankActions_Moving' table.
 *
 *
 *
 * @method BlankactionsMovingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BlankactionsMovingQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method BlankactionsMovingQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method BlankactionsMovingQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method BlankactionsMovingQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method BlankactionsMovingQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method BlankactionsMovingQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method BlankactionsMovingQuery orderByBlankpartyId($order = Criteria::ASC) Order by the blankParty_id column
 * @method BlankactionsMovingQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method BlankactionsMovingQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method BlankactionsMovingQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method BlankactionsMovingQuery orderByReceived($order = Criteria::ASC) Order by the received column
 * @method BlankactionsMovingQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method BlankactionsMovingQuery orderByReturndate($order = Criteria::ASC) Order by the returnDate column
 * @method BlankactionsMovingQuery orderByReturnamount($order = Criteria::ASC) Order by the returnAmount column
 *
 * @method BlankactionsMovingQuery groupById() Group by the id column
 * @method BlankactionsMovingQuery groupByCreatedatetime() Group by the createDatetime column
 * @method BlankactionsMovingQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method BlankactionsMovingQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method BlankactionsMovingQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method BlankactionsMovingQuery groupByDeleted() Group by the deleted column
 * @method BlankactionsMovingQuery groupByDate() Group by the date column
 * @method BlankactionsMovingQuery groupByBlankpartyId() Group by the blankParty_id column
 * @method BlankactionsMovingQuery groupBySerial() Group by the serial column
 * @method BlankactionsMovingQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method BlankactionsMovingQuery groupByPersonId() Group by the person_id column
 * @method BlankactionsMovingQuery groupByReceived() Group by the received column
 * @method BlankactionsMovingQuery groupByUsed() Group by the used column
 * @method BlankactionsMovingQuery groupByReturndate() Group by the returnDate column
 * @method BlankactionsMovingQuery groupByReturnamount() Group by the returnAmount column
 *
 * @method BlankactionsMovingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BlankactionsMovingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BlankactionsMovingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BlankactionsMovingQuery leftJoinBlankactionsParty($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsParty relation
 * @method BlankactionsMovingQuery rightJoinBlankactionsParty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsParty relation
 * @method BlankactionsMovingQuery innerJoinBlankactionsParty($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsParty relation
 *
 * @method BlankactionsMovingQuery leftJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method BlankactionsMovingQuery rightJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method BlankactionsMovingQuery innerJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 *
 * @method BlankactionsMovingQuery leftJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method BlankactionsMovingQuery rightJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method BlankactionsMovingQuery innerJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByModifypersonId relation
 *
 * @method BlankactionsMovingQuery leftJoinOrgstructure($relationAlias = null) Adds a LEFT JOIN clause to the query using the Orgstructure relation
 * @method BlankactionsMovingQuery rightJoinOrgstructure($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Orgstructure relation
 * @method BlankactionsMovingQuery innerJoinOrgstructure($relationAlias = null) Adds a INNER JOIN clause to the query using the Orgstructure relation
 *
 * @method BlankactionsMovingQuery leftJoinPersonRelatedByPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByPersonId relation
 * @method BlankactionsMovingQuery rightJoinPersonRelatedByPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByPersonId relation
 * @method BlankactionsMovingQuery innerJoinPersonRelatedByPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByPersonId relation
 *
 * @method BlankactionsMoving findOne(PropelPDO $con = null) Return the first BlankactionsMoving matching the query
 * @method BlankactionsMoving findOneOrCreate(PropelPDO $con = null) Return the first BlankactionsMoving matching the query, or a new BlankactionsMoving object populated from the query conditions when no match is found
 *
 * @method BlankactionsMoving findOneByCreatedatetime(string $createDatetime) Return the first BlankactionsMoving filtered by the createDatetime column
 * @method BlankactionsMoving findOneByCreatepersonId(int $createPerson_id) Return the first BlankactionsMoving filtered by the createPerson_id column
 * @method BlankactionsMoving findOneByModifydatetime(string $modifyDatetime) Return the first BlankactionsMoving filtered by the modifyDatetime column
 * @method BlankactionsMoving findOneByModifypersonId(int $modifyPerson_id) Return the first BlankactionsMoving filtered by the modifyPerson_id column
 * @method BlankactionsMoving findOneByDeleted(boolean $deleted) Return the first BlankactionsMoving filtered by the deleted column
 * @method BlankactionsMoving findOneByDate(string $date) Return the first BlankactionsMoving filtered by the date column
 * @method BlankactionsMoving findOneByBlankpartyId(int $blankParty_id) Return the first BlankactionsMoving filtered by the blankParty_id column
 * @method BlankactionsMoving findOneBySerial(string $serial) Return the first BlankactionsMoving filtered by the serial column
 * @method BlankactionsMoving findOneByOrgstructureId(int $orgStructure_id) Return the first BlankactionsMoving filtered by the orgStructure_id column
 * @method BlankactionsMoving findOneByPersonId(int $person_id) Return the first BlankactionsMoving filtered by the person_id column
 * @method BlankactionsMoving findOneByReceived(int $received) Return the first BlankactionsMoving filtered by the received column
 * @method BlankactionsMoving findOneByUsed(int $used) Return the first BlankactionsMoving filtered by the used column
 * @method BlankactionsMoving findOneByReturndate(string $returnDate) Return the first BlankactionsMoving filtered by the returnDate column
 * @method BlankactionsMoving findOneByReturnamount(int $returnAmount) Return the first BlankactionsMoving filtered by the returnAmount column
 *
 * @method array findById(int $id) Return BlankactionsMoving objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return BlankactionsMoving objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return BlankactionsMoving objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return BlankactionsMoving objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return BlankactionsMoving objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return BlankactionsMoving objects filtered by the deleted column
 * @method array findByDate(string $date) Return BlankactionsMoving objects filtered by the date column
 * @method array findByBlankpartyId(int $blankParty_id) Return BlankactionsMoving objects filtered by the blankParty_id column
 * @method array findBySerial(string $serial) Return BlankactionsMoving objects filtered by the serial column
 * @method array findByOrgstructureId(int $orgStructure_id) Return BlankactionsMoving objects filtered by the orgStructure_id column
 * @method array findByPersonId(int $person_id) Return BlankactionsMoving objects filtered by the person_id column
 * @method array findByReceived(int $received) Return BlankactionsMoving objects filtered by the received column
 * @method array findByUsed(int $used) Return BlankactionsMoving objects filtered by the used column
 * @method array findByReturndate(string $returnDate) Return BlankactionsMoving objects filtered by the returnDate column
 * @method array findByReturnamount(int $returnAmount) Return BlankactionsMoving objects filtered by the returnAmount column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBlankactionsMovingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBlankactionsMovingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\BlankactionsMoving', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BlankactionsMovingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BlankactionsMovingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BlankactionsMovingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BlankactionsMovingQuery) {
            return $criteria;
        }
        $query = new BlankactionsMovingQuery();
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
     * @return   BlankactionsMoving|BlankactionsMoving[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BlankactionsMovingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BlankactionsMovingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BlankactionsMoving A model object, or null if the key is not found
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
     * @return                 BlankactionsMoving A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `date`, `blankParty_id`, `serial`, `orgStructure_id`, `person_id`, `received`, `used`, `returnDate`, `returnAmount` FROM `BlankActions_Moving` WHERE `id` = :p0';
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
            $obj = new BlankactionsMoving();
            $obj->hydrate($row);
            BlankactionsMovingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BlankactionsMoving|BlankactionsMoving[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BlankactionsMoving[]|mixed the list of results, formatted by the current formatter
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlankactionsMovingPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlankactionsMovingPeer::ID, $keys, Criteria::IN);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::ID, $id, $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::DELETED, $deleted, $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the blankParty_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBlankpartyId(1234); // WHERE blankParty_id = 1234
     * $query->filterByBlankpartyId(array(12, 34)); // WHERE blankParty_id IN (12, 34)
     * $query->filterByBlankpartyId(array('min' => 12)); // WHERE blankParty_id >= 12
     * $query->filterByBlankpartyId(array('max' => 12)); // WHERE blankParty_id <= 12
     * </code>
     *
     * @see       filterByBlankactionsParty()
     *
     * @param     mixed $blankpartyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByBlankpartyId($blankpartyId = null, $comparison = null)
    {
        if (is_array($blankpartyId)) {
            $useMinMax = false;
            if (isset($blankpartyId['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::BLANKPARTY_ID, $blankpartyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($blankpartyId['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::BLANKPARTY_ID, $blankpartyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::BLANKPARTY_ID, $blankpartyId, $comparison);
    }

    /**
     * Filter the query on the serial column
     *
     * Example usage:
     * <code>
     * $query->filterBySerial('fooValue');   // WHERE serial = 'fooValue'
     * $query->filterBySerial('%fooValue%'); // WHERE serial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterBySerial($serial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serial)) {
                $serial = str_replace('*', '%', $serial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::SERIAL, $serial, $comparison);
    }

    /**
     * Filter the query on the orgStructure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgstructureId(1234); // WHERE orgStructure_id = 1234
     * $query->filterByOrgstructureId(array(12, 34)); // WHERE orgStructure_id IN (12, 34)
     * $query->filterByOrgstructureId(array('min' => 12)); // WHERE orgStructure_id >= 12
     * $query->filterByOrgstructureId(array('max' => 12)); // WHERE orgStructure_id <= 12
     * </code>
     *
     * @see       filterByOrgstructure()
     *
     * @param     mixed $orgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
    }

    /**
     * Filter the query on the person_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonId(1234); // WHERE person_id = 1234
     * $query->filterByPersonId(array(12, 34)); // WHERE person_id IN (12, 34)
     * $query->filterByPersonId(array('min' => 12)); // WHERE person_id >= 12
     * $query->filterByPersonId(array('max' => 12)); // WHERE person_id <= 12
     * </code>
     *
     * @see       filterByPersonRelatedByPersonId()
     *
     * @param     mixed $personId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::PERSON_ID, $personId, $comparison);
    }

    /**
     * Filter the query on the received column
     *
     * Example usage:
     * <code>
     * $query->filterByReceived(1234); // WHERE received = 1234
     * $query->filterByReceived(array(12, 34)); // WHERE received IN (12, 34)
     * $query->filterByReceived(array('min' => 12)); // WHERE received >= 12
     * $query->filterByReceived(array('max' => 12)); // WHERE received <= 12
     * </code>
     *
     * @param     mixed $received The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByReceived($received = null, $comparison = null)
    {
        if (is_array($received)) {
            $useMinMax = false;
            if (isset($received['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::RECEIVED, $received['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($received['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::RECEIVED, $received['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::RECEIVED, $received, $comparison);
    }

    /**
     * Filter the query on the used column
     *
     * Example usage:
     * <code>
     * $query->filterByUsed(1234); // WHERE used = 1234
     * $query->filterByUsed(array(12, 34)); // WHERE used IN (12, 34)
     * $query->filterByUsed(array('min' => 12)); // WHERE used >= 12
     * $query->filterByUsed(array('max' => 12)); // WHERE used <= 12
     * </code>
     *
     * @param     mixed $used The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByUsed($used = null, $comparison = null)
    {
        if (is_array($used)) {
            $useMinMax = false;
            if (isset($used['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::USED, $used['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($used['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::USED, $used['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::USED, $used, $comparison);
    }

    /**
     * Filter the query on the returnDate column
     *
     * Example usage:
     * <code>
     * $query->filterByReturndate('2011-03-14'); // WHERE returnDate = '2011-03-14'
     * $query->filterByReturndate('now'); // WHERE returnDate = '2011-03-14'
     * $query->filterByReturndate(array('max' => 'yesterday')); // WHERE returnDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $returndate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByReturndate($returndate = null, $comparison = null)
    {
        if (is_array($returndate)) {
            $useMinMax = false;
            if (isset($returndate['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::RETURNDATE, $returndate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returndate['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::RETURNDATE, $returndate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::RETURNDATE, $returndate, $comparison);
    }

    /**
     * Filter the query on the returnAmount column
     *
     * Example usage:
     * <code>
     * $query->filterByReturnamount(1234); // WHERE returnAmount = 1234
     * $query->filterByReturnamount(array(12, 34)); // WHERE returnAmount IN (12, 34)
     * $query->filterByReturnamount(array('min' => 12)); // WHERE returnAmount >= 12
     * $query->filterByReturnamount(array('max' => 12)); // WHERE returnAmount <= 12
     * </code>
     *
     * @param     mixed $returnamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function filterByReturnamount($returnamount = null, $comparison = null)
    {
        if (is_array($returnamount)) {
            $useMinMax = false;
            if (isset($returnamount['min'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::RETURNAMOUNT, $returnamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($returnamount['max'])) {
                $this->addUsingAlias(BlankactionsMovingPeer::RETURNAMOUNT, $returnamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsMovingPeer::RETURNAMOUNT, $returnamount, $comparison);
    }

    /**
     * Filter the query by a related BlankactionsParty object
     *
     * @param   BlankactionsParty|PropelObjectCollection $blankactionsParty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsMovingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsParty($blankactionsParty, $comparison = null)
    {
        if ($blankactionsParty instanceof BlankactionsParty) {
            return $this
                ->addUsingAlias(BlankactionsMovingPeer::BLANKPARTY_ID, $blankactionsParty->getId(), $comparison);
        } elseif ($blankactionsParty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsMovingPeer::BLANKPARTY_ID, $blankactionsParty->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByBlankactionsParty() only accepts arguments of type BlankactionsParty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsParty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function joinBlankactionsParty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsParty');

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
            $this->addJoinObject($join, 'BlankactionsParty');
        }

        return $this;
    }

    /**
     * Use the BlankactionsParty relation BlankactionsParty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsPartyQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsPartyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBlankactionsParty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsParty', '\Webmis\Models\BlankactionsPartyQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsMovingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByCreatepersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(BlankactionsMovingPeer::CREATEPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsMovingPeer::CREATEPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
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
     * @return                 BlankactionsMovingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByModifypersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(BlankactionsMovingPeer::MODIFYPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsMovingPeer::MODIFYPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return BlankactionsMovingQuery The current query, for fluid interface
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
     * @return                 BlankactionsMovingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrgstructure($orgstructure, $comparison = null)
    {
        if ($orgstructure instanceof Orgstructure) {
            return $this
                ->addUsingAlias(BlankactionsMovingPeer::ORGSTRUCTURE_ID, $orgstructure->getId(), $comparison);
        } elseif ($orgstructure instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsMovingPeer::ORGSTRUCTURE_ID, $orgstructure->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrgstructure() only accepts arguments of type Orgstructure or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Orgstructure relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function joinOrgstructure($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Orgstructure');

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
            $this->addJoinObject($join, 'Orgstructure');
        }

        return $this;
    }

    /**
     * Use the Orgstructure relation Orgstructure object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrgstructureQuery A secondary query class using the current class as primary query
     */
    public function useOrgstructureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinOrgstructure($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Orgstructure', '\Webmis\Models\OrgstructureQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsMovingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByPersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(BlankactionsMovingPeer::PERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsMovingPeer::PERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPersonRelatedByPersonId() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonRelatedByPersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function joinPersonRelatedByPersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonRelatedByPersonId');

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
            $this->addJoinObject($join, 'PersonRelatedByPersonId');
        }

        return $this;
    }

    /**
     * Use the PersonRelatedByPersonId relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonRelatedByPersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonRelatedByPersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonRelatedByPersonId', '\Webmis\Models\PersonQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BlankactionsMoving $blankactionsMoving Object to remove from the list of results
     *
     * @return BlankactionsMovingQuery The current query, for fluid interface
     */
    public function prune($blankactionsMoving = null)
    {
        if ($blankactionsMoving) {
            $this->addUsingAlias(BlankactionsMovingPeer::ID, $blankactionsMoving->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
