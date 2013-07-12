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
use Webmis\Models\Clientpolicy;
use Webmis\Models\ClientpolicyPeer;
use Webmis\Models\ClientpolicyQuery;

/**
 * Base class that represents a query for the 'ClientPolicy' table.
 *
 *
 *
 * @method ClientpolicyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientpolicyQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientpolicyQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientpolicyQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientpolicyQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientpolicyQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientpolicyQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ClientpolicyQuery orderByInsurerId($order = Criteria::ASC) Order by the insurer_id column
 * @method ClientpolicyQuery orderByPolicytypeId($order = Criteria::ASC) Order by the policyType_id column
 * @method ClientpolicyQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method ClientpolicyQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method ClientpolicyQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ClientpolicyQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method ClientpolicyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ClientpolicyQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method ClientpolicyQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ClientpolicyQuery groupById() Group by the id column
 * @method ClientpolicyQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientpolicyQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientpolicyQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientpolicyQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientpolicyQuery groupByDeleted() Group by the deleted column
 * @method ClientpolicyQuery groupByClientId() Group by the client_id column
 * @method ClientpolicyQuery groupByInsurerId() Group by the insurer_id column
 * @method ClientpolicyQuery groupByPolicytypeId() Group by the policyType_id column
 * @method ClientpolicyQuery groupBySerial() Group by the serial column
 * @method ClientpolicyQuery groupByNumber() Group by the number column
 * @method ClientpolicyQuery groupByBegdate() Group by the begDate column
 * @method ClientpolicyQuery groupByEnddate() Group by the endDate column
 * @method ClientpolicyQuery groupByName() Group by the name column
 * @method ClientpolicyQuery groupByNote() Group by the note column
 * @method ClientpolicyQuery groupByVersion() Group by the version column
 *
 * @method ClientpolicyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientpolicyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientpolicyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Clientpolicy findOne(PropelPDO $con = null) Return the first Clientpolicy matching the query
 * @method Clientpolicy findOneOrCreate(PropelPDO $con = null) Return the first Clientpolicy matching the query, or a new Clientpolicy object populated from the query conditions when no match is found
 *
 * @method Clientpolicy findOneByCreatedatetime(string $createDatetime) Return the first Clientpolicy filtered by the createDatetime column
 * @method Clientpolicy findOneByCreatepersonId(int $createPerson_id) Return the first Clientpolicy filtered by the createPerson_id column
 * @method Clientpolicy findOneByModifydatetime(string $modifyDatetime) Return the first Clientpolicy filtered by the modifyDatetime column
 * @method Clientpolicy findOneByModifypersonId(int $modifyPerson_id) Return the first Clientpolicy filtered by the modifyPerson_id column
 * @method Clientpolicy findOneByDeleted(boolean $deleted) Return the first Clientpolicy filtered by the deleted column
 * @method Clientpolicy findOneByClientId(int $client_id) Return the first Clientpolicy filtered by the client_id column
 * @method Clientpolicy findOneByInsurerId(int $insurer_id) Return the first Clientpolicy filtered by the insurer_id column
 * @method Clientpolicy findOneByPolicytypeId(int $policyType_id) Return the first Clientpolicy filtered by the policyType_id column
 * @method Clientpolicy findOneBySerial(string $serial) Return the first Clientpolicy filtered by the serial column
 * @method Clientpolicy findOneByNumber(string $number) Return the first Clientpolicy filtered by the number column
 * @method Clientpolicy findOneByBegdate(string $begDate) Return the first Clientpolicy filtered by the begDate column
 * @method Clientpolicy findOneByEnddate(string $endDate) Return the first Clientpolicy filtered by the endDate column
 * @method Clientpolicy findOneByName(string $name) Return the first Clientpolicy filtered by the name column
 * @method Clientpolicy findOneByNote(string $note) Return the first Clientpolicy filtered by the note column
 * @method Clientpolicy findOneByVersion(int $version) Return the first Clientpolicy filtered by the version column
 *
 * @method array findById(int $id) Return Clientpolicy objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Clientpolicy objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Clientpolicy objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Clientpolicy objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Clientpolicy objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Clientpolicy objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Clientpolicy objects filtered by the client_id column
 * @method array findByInsurerId(int $insurer_id) Return Clientpolicy objects filtered by the insurer_id column
 * @method array findByPolicytypeId(int $policyType_id) Return Clientpolicy objects filtered by the policyType_id column
 * @method array findBySerial(string $serial) Return Clientpolicy objects filtered by the serial column
 * @method array findByNumber(string $number) Return Clientpolicy objects filtered by the number column
 * @method array findByBegdate(string $begDate) Return Clientpolicy objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Clientpolicy objects filtered by the endDate column
 * @method array findByName(string $name) Return Clientpolicy objects filtered by the name column
 * @method array findByNote(string $note) Return Clientpolicy objects filtered by the note column
 * @method array findByVersion(int $version) Return Clientpolicy objects filtered by the version column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientpolicyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientpolicyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientpolicy', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientpolicyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientpolicyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientpolicyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientpolicyQuery) {
            return $criteria;
        }
        $query = new ClientpolicyQuery();
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
     * @return   Clientpolicy|Clientpolicy[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientpolicyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientpolicyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientpolicy A model object, or null if the key is not found
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
     * @return                 Clientpolicy A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `client_id`, `insurer_id`, `policyType_id`, `serial`, `number`, `begDate`, `endDate`, `name`, `note`, `version` FROM `ClientPolicy` WHERE `id` = :p0';
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
            $obj = new Clientpolicy();
            $obj->hydrate($row);
            ClientpolicyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientpolicy|Clientpolicy[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientpolicy[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientpolicyPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientpolicyPeer::ID, $keys, Criteria::IN);
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
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::ID, $id, $comparison);
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
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @param     mixed $createpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @param     mixed $modifypersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientpolicyPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id >= 12
     * $query->filterByClientId(array('max' => 12)); // WHERE client_id <= 12
     * </code>
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the insurer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInsurerId(1234); // WHERE insurer_id = 1234
     * $query->filterByInsurerId(array(12, 34)); // WHERE insurer_id IN (12, 34)
     * $query->filterByInsurerId(array('min' => 12)); // WHERE insurer_id >= 12
     * $query->filterByInsurerId(array('max' => 12)); // WHERE insurer_id <= 12
     * </code>
     *
     * @param     mixed $insurerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByInsurerId($insurerId = null, $comparison = null)
    {
        if (is_array($insurerId)) {
            $useMinMax = false;
            if (isset($insurerId['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::INSURER_ID, $insurerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($insurerId['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::INSURER_ID, $insurerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::INSURER_ID, $insurerId, $comparison);
    }

    /**
     * Filter the query on the policyType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPolicytypeId(1234); // WHERE policyType_id = 1234
     * $query->filterByPolicytypeId(array(12, 34)); // WHERE policyType_id IN (12, 34)
     * $query->filterByPolicytypeId(array('min' => 12)); // WHERE policyType_id >= 12
     * $query->filterByPolicytypeId(array('max' => 12)); // WHERE policyType_id <= 12
     * </code>
     *
     * @param     mixed $policytypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByPolicytypeId($policytypeId = null, $comparison = null)
    {
        if (is_array($policytypeId)) {
            $useMinMax = false;
            if (isset($policytypeId['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::POLICYTYPE_ID, $policytypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($policytypeId['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::POLICYTYPE_ID, $policytypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::POLICYTYPE_ID, $policytypeId, $comparison);
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
     * @return ClientpolicyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientpolicyPeer::SERIAL, $serial, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber('fooValue');   // WHERE number = 'fooValue'
     * $query->filterByNumber('%fooValue%'); // WHERE number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $number The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($number)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $number)) {
                $number = str_replace('*', '%', $number);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the begDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBegdate('2011-03-14'); // WHERE begDate = '2011-03-14'
     * $query->filterByBegdate('now'); // WHERE begDate = '2011-03-14'
     * $query->filterByBegdate(array('max' => 'yesterday')); // WHERE begDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $begdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::BEGDATE, $begdate, $comparison);
    }

    /**
     * Filter the query on the endDate column
     *
     * Example usage:
     * <code>
     * $query->filterByEnddate('2011-03-14'); // WHERE endDate = '2011-03-14'
     * $query->filterByEnddate('now'); // WHERE endDate = '2011-03-14'
     * $query->filterByEnddate(array('max' => 'yesterday')); // WHERE endDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $enddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::ENDDATE, $enddate, $comparison);
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
     * @return ClientpolicyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientpolicyPeer::NAME, $name, $comparison);
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
     * @return ClientpolicyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientpolicyPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientpolicyPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientpolicyPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientpolicyPeer::VERSION, $version, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Clientpolicy $clientpolicy Object to remove from the list of results
     *
     * @return ClientpolicyQuery The current query, for fluid interface
     */
    public function prune($clientpolicy = null)
    {
        if ($clientpolicy) {
            $this->addUsingAlias(ClientpolicyPeer::ID, $clientpolicy->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
