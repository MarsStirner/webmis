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
use Webmis\Models\BlankactionsParty;
use Webmis\Models\BlankactionsPartyPeer;
use Webmis\Models\BlankactionsPartyQuery;
use Webmis\Models\Person;
use Webmis\Models\Rbblankactions;

/**
 * Base class that represents a query for the 'BlankActions_Party' table.
 *
 *
 *
 * @method BlankactionsPartyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BlankactionsPartyQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method BlankactionsPartyQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method BlankactionsPartyQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method BlankactionsPartyQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method BlankactionsPartyQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method BlankactionsPartyQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method BlankactionsPartyQuery orderByDoctypeId($order = Criteria::ASC) Order by the doctype_id column
 * @method BlankactionsPartyQuery orderByPersonId($order = Criteria::ASC) Order by the person_id column
 * @method BlankactionsPartyQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method BlankactionsPartyQuery orderByNumberfrom($order = Criteria::ASC) Order by the numberFrom column
 * @method BlankactionsPartyQuery orderByNumberto($order = Criteria::ASC) Order by the numberTo column
 * @method BlankactionsPartyQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method BlankactionsPartyQuery orderByExtradited($order = Criteria::ASC) Order by the extradited column
 * @method BlankactionsPartyQuery orderByBalance($order = Criteria::ASC) Order by the balance column
 * @method BlankactionsPartyQuery orderByUsed($order = Criteria::ASC) Order by the used column
 * @method BlankactionsPartyQuery orderByWriting($order = Criteria::ASC) Order by the writing column
 *
 * @method BlankactionsPartyQuery groupById() Group by the id column
 * @method BlankactionsPartyQuery groupByCreatedatetime() Group by the createDatetime column
 * @method BlankactionsPartyQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method BlankactionsPartyQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method BlankactionsPartyQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method BlankactionsPartyQuery groupByDeleted() Group by the deleted column
 * @method BlankactionsPartyQuery groupByDate() Group by the date column
 * @method BlankactionsPartyQuery groupByDoctypeId() Group by the doctype_id column
 * @method BlankactionsPartyQuery groupByPersonId() Group by the person_id column
 * @method BlankactionsPartyQuery groupBySerial() Group by the serial column
 * @method BlankactionsPartyQuery groupByNumberfrom() Group by the numberFrom column
 * @method BlankactionsPartyQuery groupByNumberto() Group by the numberTo column
 * @method BlankactionsPartyQuery groupByAmount() Group by the amount column
 * @method BlankactionsPartyQuery groupByExtradited() Group by the extradited column
 * @method BlankactionsPartyQuery groupByBalance() Group by the balance column
 * @method BlankactionsPartyQuery groupByUsed() Group by the used column
 * @method BlankactionsPartyQuery groupByWriting() Group by the writing column
 *
 * @method BlankactionsPartyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BlankactionsPartyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BlankactionsPartyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BlankactionsPartyQuery leftJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method BlankactionsPartyQuery rightJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 * @method BlankactionsPartyQuery innerJoinPersonRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByCreatepersonId relation
 *
 * @method BlankactionsPartyQuery leftJoinRbblankactions($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbblankactions relation
 * @method BlankactionsPartyQuery rightJoinRbblankactions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbblankactions relation
 * @method BlankactionsPartyQuery innerJoinRbblankactions($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbblankactions relation
 *
 * @method BlankactionsPartyQuery leftJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method BlankactionsPartyQuery rightJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByModifypersonId relation
 * @method BlankactionsPartyQuery innerJoinPersonRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByModifypersonId relation
 *
 * @method BlankactionsPartyQuery leftJoinPersonRelatedByPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonRelatedByPersonId relation
 * @method BlankactionsPartyQuery rightJoinPersonRelatedByPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonRelatedByPersonId relation
 * @method BlankactionsPartyQuery innerJoinPersonRelatedByPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonRelatedByPersonId relation
 *
 * @method BlankactionsPartyQuery leftJoinBlankactionsMoving($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsMoving relation
 * @method BlankactionsPartyQuery rightJoinBlankactionsMoving($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsMoving relation
 * @method BlankactionsPartyQuery innerJoinBlankactionsMoving($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsMoving relation
 *
 * @method BlankactionsParty findOne(PropelPDO $con = null) Return the first BlankactionsParty matching the query
 * @method BlankactionsParty findOneOrCreate(PropelPDO $con = null) Return the first BlankactionsParty matching the query, or a new BlankactionsParty object populated from the query conditions when no match is found
 *
 * @method BlankactionsParty findOneByCreatedatetime(string $createDatetime) Return the first BlankactionsParty filtered by the createDatetime column
 * @method BlankactionsParty findOneByCreatepersonId(int $createPerson_id) Return the first BlankactionsParty filtered by the createPerson_id column
 * @method BlankactionsParty findOneByModifydatetime(string $modifyDatetime) Return the first BlankactionsParty filtered by the modifyDatetime column
 * @method BlankactionsParty findOneByModifypersonId(int $modifyPerson_id) Return the first BlankactionsParty filtered by the modifyPerson_id column
 * @method BlankactionsParty findOneByDeleted(boolean $deleted) Return the first BlankactionsParty filtered by the deleted column
 * @method BlankactionsParty findOneByDate(string $date) Return the first BlankactionsParty filtered by the date column
 * @method BlankactionsParty findOneByDoctypeId(int $doctype_id) Return the first BlankactionsParty filtered by the doctype_id column
 * @method BlankactionsParty findOneByPersonId(int $person_id) Return the first BlankactionsParty filtered by the person_id column
 * @method BlankactionsParty findOneBySerial(string $serial) Return the first BlankactionsParty filtered by the serial column
 * @method BlankactionsParty findOneByNumberfrom(string $numberFrom) Return the first BlankactionsParty filtered by the numberFrom column
 * @method BlankactionsParty findOneByNumberto(string $numberTo) Return the first BlankactionsParty filtered by the numberTo column
 * @method BlankactionsParty findOneByAmount(int $amount) Return the first BlankactionsParty filtered by the amount column
 * @method BlankactionsParty findOneByExtradited(int $extradited) Return the first BlankactionsParty filtered by the extradited column
 * @method BlankactionsParty findOneByBalance(int $balance) Return the first BlankactionsParty filtered by the balance column
 * @method BlankactionsParty findOneByUsed(int $used) Return the first BlankactionsParty filtered by the used column
 * @method BlankactionsParty findOneByWriting(int $writing) Return the first BlankactionsParty filtered by the writing column
 *
 * @method array findById(int $id) Return BlankactionsParty objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return BlankactionsParty objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return BlankactionsParty objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return BlankactionsParty objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return BlankactionsParty objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return BlankactionsParty objects filtered by the deleted column
 * @method array findByDate(string $date) Return BlankactionsParty objects filtered by the date column
 * @method array findByDoctypeId(int $doctype_id) Return BlankactionsParty objects filtered by the doctype_id column
 * @method array findByPersonId(int $person_id) Return BlankactionsParty objects filtered by the person_id column
 * @method array findBySerial(string $serial) Return BlankactionsParty objects filtered by the serial column
 * @method array findByNumberfrom(string $numberFrom) Return BlankactionsParty objects filtered by the numberFrom column
 * @method array findByNumberto(string $numberTo) Return BlankactionsParty objects filtered by the numberTo column
 * @method array findByAmount(int $amount) Return BlankactionsParty objects filtered by the amount column
 * @method array findByExtradited(int $extradited) Return BlankactionsParty objects filtered by the extradited column
 * @method array findByBalance(int $balance) Return BlankactionsParty objects filtered by the balance column
 * @method array findByUsed(int $used) Return BlankactionsParty objects filtered by the used column
 * @method array findByWriting(int $writing) Return BlankactionsParty objects filtered by the writing column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBlankactionsPartyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBlankactionsPartyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\BlankactionsParty', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BlankactionsPartyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BlankactionsPartyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BlankactionsPartyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BlankactionsPartyQuery) {
            return $criteria;
        }
        $query = new BlankactionsPartyQuery();
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
     * @return   BlankactionsParty|BlankactionsParty[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BlankactionsPartyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BlankactionsPartyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BlankactionsParty A model object, or null if the key is not found
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
     * @return                 BlankactionsParty A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `date`, `doctype_id`, `person_id`, `serial`, `numberFrom`, `numberTo`, `amount`, `extradited`, `balance`, `used`, `writing` FROM `BlankActions_Party` WHERE `id` = :p0';
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
            $obj = new BlankactionsParty();
            $obj->hydrate($row);
            BlankactionsPartyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BlankactionsParty|BlankactionsParty[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BlankactionsParty[]|mixed the list of results, formatted by the current formatter
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlankactionsPartyPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlankactionsPartyPeer::ID, $keys, Criteria::IN);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::ID, $id, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::DELETED, $deleted, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the doctype_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDoctypeId(1234); // WHERE doctype_id = 1234
     * $query->filterByDoctypeId(array(12, 34)); // WHERE doctype_id IN (12, 34)
     * $query->filterByDoctypeId(array('min' => 12)); // WHERE doctype_id >= 12
     * $query->filterByDoctypeId(array('max' => 12)); // WHERE doctype_id <= 12
     * </code>
     *
     * @see       filterByRbblankactions()
     *
     * @param     mixed $doctypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByDoctypeId($doctypeId = null, $comparison = null)
    {
        if (is_array($doctypeId)) {
            $useMinMax = false;
            if (isset($doctypeId['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::DOCTYPE_ID, $doctypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doctypeId['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::DOCTYPE_ID, $doctypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::DOCTYPE_ID, $doctypeId, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByPersonId($personId = null, $comparison = null)
    {
        if (is_array($personId)) {
            $useMinMax = false;
            if (isset($personId['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::PERSON_ID, $personId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personId['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::PERSON_ID, $personId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::PERSON_ID, $personId, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BlankactionsPartyPeer::SERIAL, $serial, $comparison);
    }

    /**
     * Filter the query on the numberFrom column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberfrom('fooValue');   // WHERE numberFrom = 'fooValue'
     * $query->filterByNumberfrom('%fooValue%'); // WHERE numberFrom LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numberfrom The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByNumberfrom($numberfrom = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numberfrom)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numberfrom)) {
                $numberfrom = str_replace('*', '%', $numberfrom);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::NUMBERFROM, $numberfrom, $comparison);
    }

    /**
     * Filter the query on the numberTo column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberto('fooValue');   // WHERE numberTo = 'fooValue'
     * $query->filterByNumberto('%fooValue%'); // WHERE numberTo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $numberto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByNumberto($numberto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($numberto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $numberto)) {
                $numberto = str_replace('*', '%', $numberto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::NUMBERTO, $numberto, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount >= 12
     * $query->filterByAmount(array('max' => 12)); // WHERE amount <= 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the extradited column
     *
     * Example usage:
     * <code>
     * $query->filterByExtradited(1234); // WHERE extradited = 1234
     * $query->filterByExtradited(array(12, 34)); // WHERE extradited IN (12, 34)
     * $query->filterByExtradited(array('min' => 12)); // WHERE extradited >= 12
     * $query->filterByExtradited(array('max' => 12)); // WHERE extradited <= 12
     * </code>
     *
     * @param     mixed $extradited The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByExtradited($extradited = null, $comparison = null)
    {
        if (is_array($extradited)) {
            $useMinMax = false;
            if (isset($extradited['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::EXTRADITED, $extradited['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($extradited['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::EXTRADITED, $extradited['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::EXTRADITED, $extradited, $comparison);
    }

    /**
     * Filter the query on the balance column
     *
     * Example usage:
     * <code>
     * $query->filterByBalance(1234); // WHERE balance = 1234
     * $query->filterByBalance(array(12, 34)); // WHERE balance IN (12, 34)
     * $query->filterByBalance(array('min' => 12)); // WHERE balance >= 12
     * $query->filterByBalance(array('max' => 12)); // WHERE balance <= 12
     * </code>
     *
     * @param     mixed $balance The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByBalance($balance = null, $comparison = null)
    {
        if (is_array($balance)) {
            $useMinMax = false;
            if (isset($balance['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::BALANCE, $balance['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($balance['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::BALANCE, $balance['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::BALANCE, $balance, $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByUsed($used = null, $comparison = null)
    {
        if (is_array($used)) {
            $useMinMax = false;
            if (isset($used['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::USED, $used['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($used['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::USED, $used['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::USED, $used, $comparison);
    }

    /**
     * Filter the query on the writing column
     *
     * Example usage:
     * <code>
     * $query->filterByWriting(1234); // WHERE writing = 1234
     * $query->filterByWriting(array(12, 34)); // WHERE writing IN (12, 34)
     * $query->filterByWriting(array('min' => 12)); // WHERE writing >= 12
     * $query->filterByWriting(array('max' => 12)); // WHERE writing <= 12
     * </code>
     *
     * @param     mixed $writing The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function filterByWriting($writing = null, $comparison = null)
    {
        if (is_array($writing)) {
            $useMinMax = false;
            if (isset($writing['min'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::WRITING, $writing['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($writing['max'])) {
                $this->addUsingAlias(BlankactionsPartyPeer::WRITING, $writing['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPartyPeer::WRITING, $writing, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsPartyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByCreatepersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(BlankactionsPartyPeer::CREATEPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsPartyPeer::CREATEPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
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
     * Filter the query by a related Rbblankactions object
     *
     * @param   Rbblankactions|PropelObjectCollection $rbblankactions The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsPartyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbblankactions($rbblankactions, $comparison = null)
    {
        if ($rbblankactions instanceof Rbblankactions) {
            return $this
                ->addUsingAlias(BlankactionsPartyPeer::DOCTYPE_ID, $rbblankactions->getId(), $comparison);
        } elseif ($rbblankactions instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsPartyPeer::DOCTYPE_ID, $rbblankactions->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbblankactions() only accepts arguments of type Rbblankactions or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbblankactions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function joinRbblankactions($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbblankactions');

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
            $this->addJoinObject($join, 'Rbblankactions');
        }

        return $this;
    }

    /**
     * Use the Rbblankactions relation Rbblankactions object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbblankactionsQuery A secondary query class using the current class as primary query
     */
    public function useRbblankactionsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbblankactions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbblankactions', '\Webmis\Models\RbblankactionsQuery');
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsPartyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByModifypersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(BlankactionsPartyPeer::MODIFYPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsPartyPeer::MODIFYPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
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
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsPartyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonRelatedByPersonId($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(BlankactionsPartyPeer::PERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsPartyPeer::PERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return BlankactionsPartyQuery The current query, for fluid interface
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
     * Filter the query by a related BlankactionsMoving object
     *
     * @param   BlankactionsMoving|PropelObjectCollection $blankactionsMoving  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsPartyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsMoving($blankactionsMoving, $comparison = null)
    {
        if ($blankactionsMoving instanceof BlankactionsMoving) {
            return $this
                ->addUsingAlias(BlankactionsPartyPeer::ID, $blankactionsMoving->getBlankpartyId(), $comparison);
        } elseif ($blankactionsMoving instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsMovingQuery()
                ->filterByPrimaryKeys($blankactionsMoving->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsMoving() only accepts arguments of type BlankactionsMoving or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsMoving relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function joinBlankactionsMoving($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsMoving');

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
            $this->addJoinObject($join, 'BlankactionsMoving');
        }

        return $this;
    }

    /**
     * Use the BlankactionsMoving relation BlankactionsMoving object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsMovingQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsMovingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBlankactionsMoving($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsMoving', '\Webmis\Models\BlankactionsMovingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BlankactionsParty $blankactionsParty Object to remove from the list of results
     *
     * @return BlankactionsPartyQuery The current query, for fluid interface
     */
    public function prune($blankactionsParty = null)
    {
        if ($blankactionsParty) {
            $this->addUsingAlias(BlankactionsPartyPeer::ID, $blankactionsParty->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
