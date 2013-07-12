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
use Webmis\Models\Clientattach;
use Webmis\Models\ClientattachPeer;
use Webmis\Models\ClientattachQuery;

/**
 * Base class that represents a query for the 'ClientAttach' table.
 *
 *
 *
 * @method ClientattachQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientattachQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientattachQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientattachQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientattachQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientattachQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientattachQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ClientattachQuery orderByAttachtypeId($order = Criteria::ASC) Order by the attachType_id column
 * @method ClientattachQuery orderByLpuId($order = Criteria::ASC) Order by the LPU_id column
 * @method ClientattachQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method ClientattachQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method ClientattachQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 * @method ClientattachQuery orderByDocumentId($order = Criteria::ASC) Order by the document_id column
 *
 * @method ClientattachQuery groupById() Group by the id column
 * @method ClientattachQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientattachQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientattachQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientattachQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientattachQuery groupByDeleted() Group by the deleted column
 * @method ClientattachQuery groupByClientId() Group by the client_id column
 * @method ClientattachQuery groupByAttachtypeId() Group by the attachType_id column
 * @method ClientattachQuery groupByLpuId() Group by the LPU_id column
 * @method ClientattachQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method ClientattachQuery groupByBegdate() Group by the begDate column
 * @method ClientattachQuery groupByEnddate() Group by the endDate column
 * @method ClientattachQuery groupByDocumentId() Group by the document_id column
 *
 * @method ClientattachQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientattachQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientattachQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Clientattach findOne(PropelPDO $con = null) Return the first Clientattach matching the query
 * @method Clientattach findOneOrCreate(PropelPDO $con = null) Return the first Clientattach matching the query, or a new Clientattach object populated from the query conditions when no match is found
 *
 * @method Clientattach findOneByCreatedatetime(string $createDatetime) Return the first Clientattach filtered by the createDatetime column
 * @method Clientattach findOneByCreatepersonId(int $createPerson_id) Return the first Clientattach filtered by the createPerson_id column
 * @method Clientattach findOneByModifydatetime(string $modifyDatetime) Return the first Clientattach filtered by the modifyDatetime column
 * @method Clientattach findOneByModifypersonId(int $modifyPerson_id) Return the first Clientattach filtered by the modifyPerson_id column
 * @method Clientattach findOneByDeleted(boolean $deleted) Return the first Clientattach filtered by the deleted column
 * @method Clientattach findOneByClientId(int $client_id) Return the first Clientattach filtered by the client_id column
 * @method Clientattach findOneByAttachtypeId(int $attachType_id) Return the first Clientattach filtered by the attachType_id column
 * @method Clientattach findOneByLpuId(int $LPU_id) Return the first Clientattach filtered by the LPU_id column
 * @method Clientattach findOneByOrgstructureId(int $orgStructure_id) Return the first Clientattach filtered by the orgStructure_id column
 * @method Clientattach findOneByBegdate(string $begDate) Return the first Clientattach filtered by the begDate column
 * @method Clientattach findOneByEnddate(string $endDate) Return the first Clientattach filtered by the endDate column
 * @method Clientattach findOneByDocumentId(int $document_id) Return the first Clientattach filtered by the document_id column
 *
 * @method array findById(int $id) Return Clientattach objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Clientattach objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Clientattach objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Clientattach objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Clientattach objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Clientattach objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Clientattach objects filtered by the client_id column
 * @method array findByAttachtypeId(int $attachType_id) Return Clientattach objects filtered by the attachType_id column
 * @method array findByLpuId(int $LPU_id) Return Clientattach objects filtered by the LPU_id column
 * @method array findByOrgstructureId(int $orgStructure_id) Return Clientattach objects filtered by the orgStructure_id column
 * @method array findByBegdate(string $begDate) Return Clientattach objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Clientattach objects filtered by the endDate column
 * @method array findByDocumentId(int $document_id) Return Clientattach objects filtered by the document_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientattachQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientattachQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientattach', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientattachQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientattachQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientattachQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientattachQuery) {
            return $criteria;
        }
        $query = new ClientattachQuery();
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
     * @return   Clientattach|Clientattach[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientattachPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientattachPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientattach A model object, or null if the key is not found
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
     * @return                 Clientattach A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `client_id`, `attachType_id`, `LPU_id`, `orgStructure_id`, `begDate`, `endDate`, `document_id` FROM `ClientAttach` WHERE `id` = :p0';
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
            $obj = new Clientattach();
            $obj->hydrate($row);
            ClientattachPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientattach|Clientattach[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientattach[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientattachPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientattachPeer::ID, $keys, Criteria::IN);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientattachPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientattachPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::ID, $id, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientattachPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientattachPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientattachPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientattachPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientattachPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientattachPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientattachPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientattachPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientattachPeer::DELETED, $deleted, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ClientattachPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ClientattachPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the attachType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAttachtypeId(1234); // WHERE attachType_id = 1234
     * $query->filterByAttachtypeId(array(12, 34)); // WHERE attachType_id IN (12, 34)
     * $query->filterByAttachtypeId(array('min' => 12)); // WHERE attachType_id >= 12
     * $query->filterByAttachtypeId(array('max' => 12)); // WHERE attachType_id <= 12
     * </code>
     *
     * @param     mixed $attachtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByAttachtypeId($attachtypeId = null, $comparison = null)
    {
        if (is_array($attachtypeId)) {
            $useMinMax = false;
            if (isset($attachtypeId['min'])) {
                $this->addUsingAlias(ClientattachPeer::ATTACHTYPE_ID, $attachtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($attachtypeId['max'])) {
                $this->addUsingAlias(ClientattachPeer::ATTACHTYPE_ID, $attachtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::ATTACHTYPE_ID, $attachtypeId, $comparison);
    }

    /**
     * Filter the query on the LPU_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLpuId(1234); // WHERE LPU_id = 1234
     * $query->filterByLpuId(array(12, 34)); // WHERE LPU_id IN (12, 34)
     * $query->filterByLpuId(array('min' => 12)); // WHERE LPU_id >= 12
     * $query->filterByLpuId(array('max' => 12)); // WHERE LPU_id <= 12
     * </code>
     *
     * @param     mixed $lpuId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByLpuId($lpuId = null, $comparison = null)
    {
        if (is_array($lpuId)) {
            $useMinMax = false;
            if (isset($lpuId['min'])) {
                $this->addUsingAlias(ClientattachPeer::LPU_ID, $lpuId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lpuId['max'])) {
                $this->addUsingAlias(ClientattachPeer::LPU_ID, $lpuId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::LPU_ID, $lpuId, $comparison);
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
     * @param     mixed $orgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(ClientattachPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(ClientattachPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(ClientattachPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(ClientattachPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::BEGDATE, $begdate, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(ClientattachPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(ClientattachPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::ENDDATE, $enddate, $comparison);
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
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function filterByDocumentId($documentId = null, $comparison = null)
    {
        if (is_array($documentId)) {
            $useMinMax = false;
            if (isset($documentId['min'])) {
                $this->addUsingAlias(ClientattachPeer::DOCUMENT_ID, $documentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($documentId['max'])) {
                $this->addUsingAlias(ClientattachPeer::DOCUMENT_ID, $documentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientattachPeer::DOCUMENT_ID, $documentId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Clientattach $clientattach Object to remove from the list of results
     *
     * @return ClientattachQuery The current query, for fluid interface
     */
    public function prune($clientattach = null)
    {
        if ($clientattach) {
            $this->addUsingAlias(ClientattachPeer::ID, $clientattach->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
