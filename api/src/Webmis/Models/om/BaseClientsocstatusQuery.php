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
use Webmis\Models\Clientsocstatus;
use Webmis\Models\ClientsocstatusPeer;
use Webmis\Models\ClientsocstatusQuery;

/**
 * Base class that represents a query for the 'ClientSocStatus' table.
 *
 *
 *
 * @method ClientsocstatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientsocstatusQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientsocstatusQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientsocstatusQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientsocstatusQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientsocstatusQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientsocstatusQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ClientsocstatusQuery orderBySocstatusclassId($order = Criteria::ASC) Order by the socStatusClass_id column
 * @method ClientsocstatusQuery orderBySocstatustypeId($order = Criteria::ASC) Order by the socStatusType_id column
 * @method ClientsocstatusQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ClientsocstatusQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method ClientsocstatusQuery orderByDocumentId($order = Criteria::ASC) Order by the document_id column
 * @method ClientsocstatusQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ClientsocstatusQuery orderByNote($order = Criteria::ASC) Order by the note column
 * @method ClientsocstatusQuery orderByBenefitcategoryId($order = Criteria::ASC) Order by the benefitCategory_id column
 *
 * @method ClientsocstatusQuery groupById() Group by the id column
 * @method ClientsocstatusQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientsocstatusQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientsocstatusQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientsocstatusQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientsocstatusQuery groupByDeleted() Group by the deleted column
 * @method ClientsocstatusQuery groupByClientId() Group by the client_id column
 * @method ClientsocstatusQuery groupBySocstatusclassId() Group by the socStatusClass_id column
 * @method ClientsocstatusQuery groupBySocstatustypeId() Group by the socStatusType_id column
 * @method ClientsocstatusQuery groupByBegdate() Group by the begDate column
 * @method ClientsocstatusQuery groupByEnddate() Group by the endDate column
 * @method ClientsocstatusQuery groupByDocumentId() Group by the document_id column
 * @method ClientsocstatusQuery groupByVersion() Group by the version column
 * @method ClientsocstatusQuery groupByNote() Group by the note column
 * @method ClientsocstatusQuery groupByBenefitcategoryId() Group by the benefitCategory_id column
 *
 * @method ClientsocstatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientsocstatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientsocstatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Clientsocstatus findOne(PropelPDO $con = null) Return the first Clientsocstatus matching the query
 * @method Clientsocstatus findOneOrCreate(PropelPDO $con = null) Return the first Clientsocstatus matching the query, or a new Clientsocstatus object populated from the query conditions when no match is found
 *
 * @method Clientsocstatus findOneByCreatedatetime(string $createDatetime) Return the first Clientsocstatus filtered by the createDatetime column
 * @method Clientsocstatus findOneByCreatepersonId(int $createPerson_id) Return the first Clientsocstatus filtered by the createPerson_id column
 * @method Clientsocstatus findOneByModifydatetime(string $modifyDatetime) Return the first Clientsocstatus filtered by the modifyDatetime column
 * @method Clientsocstatus findOneByModifypersonId(int $modifyPerson_id) Return the first Clientsocstatus filtered by the modifyPerson_id column
 * @method Clientsocstatus findOneByDeleted(boolean $deleted) Return the first Clientsocstatus filtered by the deleted column
 * @method Clientsocstatus findOneByClientId(int $client_id) Return the first Clientsocstatus filtered by the client_id column
 * @method Clientsocstatus findOneBySocstatusclassId(int $socStatusClass_id) Return the first Clientsocstatus filtered by the socStatusClass_id column
 * @method Clientsocstatus findOneBySocstatustypeId(int $socStatusType_id) Return the first Clientsocstatus filtered by the socStatusType_id column
 * @method Clientsocstatus findOneByBegdate(string $begDate) Return the first Clientsocstatus filtered by the begDate column
 * @method Clientsocstatus findOneByEnddate(string $endDate) Return the first Clientsocstatus filtered by the endDate column
 * @method Clientsocstatus findOneByDocumentId(int $document_id) Return the first Clientsocstatus filtered by the document_id column
 * @method Clientsocstatus findOneByVersion(int $version) Return the first Clientsocstatus filtered by the version column
 * @method Clientsocstatus findOneByNote(string $note) Return the first Clientsocstatus filtered by the note column
 * @method Clientsocstatus findOneByBenefitcategoryId(int $benefitCategory_id) Return the first Clientsocstatus filtered by the benefitCategory_id column
 *
 * @method array findById(int $id) Return Clientsocstatus objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Clientsocstatus objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Clientsocstatus objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Clientsocstatus objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Clientsocstatus objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Clientsocstatus objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Clientsocstatus objects filtered by the client_id column
 * @method array findBySocstatusclassId(int $socStatusClass_id) Return Clientsocstatus objects filtered by the socStatusClass_id column
 * @method array findBySocstatustypeId(int $socStatusType_id) Return Clientsocstatus objects filtered by the socStatusType_id column
 * @method array findByBegdate(string $begDate) Return Clientsocstatus objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Clientsocstatus objects filtered by the endDate column
 * @method array findByDocumentId(int $document_id) Return Clientsocstatus objects filtered by the document_id column
 * @method array findByVersion(int $version) Return Clientsocstatus objects filtered by the version column
 * @method array findByNote(string $note) Return Clientsocstatus objects filtered by the note column
 * @method array findByBenefitcategoryId(int $benefitCategory_id) Return Clientsocstatus objects filtered by the benefitCategory_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientsocstatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientsocstatusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientsocstatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientsocstatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientsocstatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientsocstatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientsocstatusQuery) {
            return $criteria;
        }
        $query = new ClientsocstatusQuery();
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
     * @return   Clientsocstatus|Clientsocstatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientsocstatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientsocstatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientsocstatus A model object, or null if the key is not found
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
     * @return                 Clientsocstatus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `client_id`, `socStatusClass_id`, `socStatusType_id`, `begDate`, `endDate`, `document_id`, `version`, `note`, `benefitCategory_id` FROM `ClientSocStatus` WHERE `id` = :p0';
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
            $obj = new Clientsocstatus();
            $obj->hydrate($row);
            ClientsocstatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientsocstatus|Clientsocstatus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientsocstatus[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientsocstatusPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientsocstatusPeer::ID, $keys, Criteria::IN);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::ID, $id, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientsocstatusPeer::DELETED, $deleted, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the socStatusClass_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocstatusclassId(1234); // WHERE socStatusClass_id = 1234
     * $query->filterBySocstatusclassId(array(12, 34)); // WHERE socStatusClass_id IN (12, 34)
     * $query->filterBySocstatusclassId(array('min' => 12)); // WHERE socStatusClass_id >= 12
     * $query->filterBySocstatusclassId(array('max' => 12)); // WHERE socStatusClass_id <= 12
     * </code>
     *
     * @param     mixed $socstatusclassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterBySocstatusclassId($socstatusclassId = null, $comparison = null)
    {
        if (is_array($socstatusclassId)) {
            $useMinMax = false;
            if (isset($socstatusclassId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::SOCSTATUSCLASS_ID, $socstatusclassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socstatusclassId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::SOCSTATUSCLASS_ID, $socstatusclassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::SOCSTATUSCLASS_ID, $socstatusclassId, $comparison);
    }

    /**
     * Filter the query on the socStatusType_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySocstatustypeId(1234); // WHERE socStatusType_id = 1234
     * $query->filterBySocstatustypeId(array(12, 34)); // WHERE socStatusType_id IN (12, 34)
     * $query->filterBySocstatustypeId(array('min' => 12)); // WHERE socStatusType_id >= 12
     * $query->filterBySocstatustypeId(array('max' => 12)); // WHERE socStatusType_id <= 12
     * </code>
     *
     * @param     mixed $socstatustypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterBySocstatustypeId($socstatustypeId = null, $comparison = null)
    {
        if (is_array($socstatustypeId)) {
            $useMinMax = false;
            if (isset($socstatustypeId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::SOCSTATUSTYPE_ID, $socstatustypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($socstatustypeId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::SOCSTATUSTYPE_ID, $socstatustypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::SOCSTATUSTYPE_ID, $socstatustypeId, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::BEGDATE, $begdate, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Filter the query on the document_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDocumentId(1234); // WHERE document_id = 1234
     * $query->filterByDocumentId(array(12, 34)); // WHERE document_id IN (12, 34)
     * $query->filterByDocumentId(array('min' => 12)); // WHERE document_id >= 12
     * $query->filterByDocumentId(array('max' => 12)); // WHERE document_id <= 12
     * </code>
     *
     * @param     mixed $documentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByDocumentId($documentId = null, $comparison = null)
    {
        if (is_array($documentId)) {
            $useMinMax = false;
            if (isset($documentId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::DOCUMENT_ID, $documentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documentId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::DOCUMENT_ID, $documentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::DOCUMENT_ID, $documentId, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::VERSION, $version, $comparison);
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
     * @return ClientsocstatusQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientsocstatusPeer::NOTE, $note, $comparison);
    }

    /**
     * Filter the query on the benefitCategory_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBenefitcategoryId(1234); // WHERE benefitCategory_id = 1234
     * $query->filterByBenefitcategoryId(array(12, 34)); // WHERE benefitCategory_id IN (12, 34)
     * $query->filterByBenefitcategoryId(array('min' => 12)); // WHERE benefitCategory_id >= 12
     * $query->filterByBenefitcategoryId(array('max' => 12)); // WHERE benefitCategory_id <= 12
     * </code>
     *
     * @param     mixed $benefitcategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function filterByBenefitcategoryId($benefitcategoryId = null, $comparison = null)
    {
        if (is_array($benefitcategoryId)) {
            $useMinMax = false;
            if (isset($benefitcategoryId['min'])) {
                $this->addUsingAlias(ClientsocstatusPeer::BENEFITCATEGORY_ID, $benefitcategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($benefitcategoryId['max'])) {
                $this->addUsingAlias(ClientsocstatusPeer::BENEFITCATEGORY_ID, $benefitcategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsocstatusPeer::BENEFITCATEGORY_ID, $benefitcategoryId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Clientsocstatus $clientsocstatus Object to remove from the list of results
     *
     * @return ClientsocstatusQuery The current query, for fluid interface
     */
    public function prune($clientsocstatus = null)
    {
        if ($clientsocstatus) {
            $this->addUsingAlias(ClientsocstatusPeer::ID, $clientsocstatus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
