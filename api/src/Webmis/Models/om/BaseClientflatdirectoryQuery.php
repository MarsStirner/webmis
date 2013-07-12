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
use Webmis\Models\Client;
use Webmis\Models\Clientfdproperty;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\ClientflatdirectoryPeer;
use Webmis\Models\ClientflatdirectoryQuery;
use Webmis\Models\Fdrecord;

/**
 * Base class that represents a query for the 'ClientFlatDirectory' table.
 *
 *
 *
 * @method ClientflatdirectoryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientflatdirectoryQuery orderByClientfdpropertyId($order = Criteria::ASC) Order by the clientFDProperty_id column
 * @method ClientflatdirectoryQuery orderByFdrecordId($order = Criteria::ASC) Order by the fdRecord_id column
 * @method ClientflatdirectoryQuery orderByDatestart($order = Criteria::ASC) Order by the dateStart column
 * @method ClientflatdirectoryQuery orderByDateend($order = Criteria::ASC) Order by the dateEnd column
 * @method ClientflatdirectoryQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDateTime column
 * @method ClientflatdirectoryQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientflatdirectoryQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDateTime column
 * @method ClientflatdirectoryQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientflatdirectoryQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientflatdirectoryQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ClientflatdirectoryQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method ClientflatdirectoryQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ClientflatdirectoryQuery groupById() Group by the id column
 * @method ClientflatdirectoryQuery groupByClientfdpropertyId() Group by the clientFDProperty_id column
 * @method ClientflatdirectoryQuery groupByFdrecordId() Group by the fdRecord_id column
 * @method ClientflatdirectoryQuery groupByDatestart() Group by the dateStart column
 * @method ClientflatdirectoryQuery groupByDateend() Group by the dateEnd column
 * @method ClientflatdirectoryQuery groupByCreatedatetime() Group by the createDateTime column
 * @method ClientflatdirectoryQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientflatdirectoryQuery groupByModifydatetime() Group by the modifyDateTime column
 * @method ClientflatdirectoryQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientflatdirectoryQuery groupByDeleted() Group by the deleted column
 * @method ClientflatdirectoryQuery groupByClientId() Group by the client_id column
 * @method ClientflatdirectoryQuery groupByComment() Group by the comment column
 * @method ClientflatdirectoryQuery groupByVersion() Group by the version column
 *
 * @method ClientflatdirectoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientflatdirectoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientflatdirectoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientflatdirectoryQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method ClientflatdirectoryQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method ClientflatdirectoryQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method ClientflatdirectoryQuery leftJoinClientfdproperty($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientfdproperty relation
 * @method ClientflatdirectoryQuery rightJoinClientfdproperty($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientfdproperty relation
 * @method ClientflatdirectoryQuery innerJoinClientfdproperty($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientfdproperty relation
 *
 * @method ClientflatdirectoryQuery leftJoinFdrecord($relationAlias = null) Adds a LEFT JOIN clause to the query using the Fdrecord relation
 * @method ClientflatdirectoryQuery rightJoinFdrecord($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Fdrecord relation
 * @method ClientflatdirectoryQuery innerJoinFdrecord($relationAlias = null) Adds a INNER JOIN clause to the query using the Fdrecord relation
 *
 * @method Clientflatdirectory findOne(PropelPDO $con = null) Return the first Clientflatdirectory matching the query
 * @method Clientflatdirectory findOneOrCreate(PropelPDO $con = null) Return the first Clientflatdirectory matching the query, or a new Clientflatdirectory object populated from the query conditions when no match is found
 *
 * @method Clientflatdirectory findOneByClientfdpropertyId(int $clientFDProperty_id) Return the first Clientflatdirectory filtered by the clientFDProperty_id column
 * @method Clientflatdirectory findOneByFdrecordId(int $fdRecord_id) Return the first Clientflatdirectory filtered by the fdRecord_id column
 * @method Clientflatdirectory findOneByDatestart(string $dateStart) Return the first Clientflatdirectory filtered by the dateStart column
 * @method Clientflatdirectory findOneByDateend(string $dateEnd) Return the first Clientflatdirectory filtered by the dateEnd column
 * @method Clientflatdirectory findOneByCreatedatetime(string $createDateTime) Return the first Clientflatdirectory filtered by the createDateTime column
 * @method Clientflatdirectory findOneByCreatepersonId(int $createPerson_id) Return the first Clientflatdirectory filtered by the createPerson_id column
 * @method Clientflatdirectory findOneByModifydatetime(string $modifyDateTime) Return the first Clientflatdirectory filtered by the modifyDateTime column
 * @method Clientflatdirectory findOneByModifypersonId(int $modifyPerson_id) Return the first Clientflatdirectory filtered by the modifyPerson_id column
 * @method Clientflatdirectory findOneByDeleted(boolean $deleted) Return the first Clientflatdirectory filtered by the deleted column
 * @method Clientflatdirectory findOneByClientId(int $client_id) Return the first Clientflatdirectory filtered by the client_id column
 * @method Clientflatdirectory findOneByComment(string $comment) Return the first Clientflatdirectory filtered by the comment column
 * @method Clientflatdirectory findOneByVersion(int $version) Return the first Clientflatdirectory filtered by the version column
 *
 * @method array findById(int $id) Return Clientflatdirectory objects filtered by the id column
 * @method array findByClientfdpropertyId(int $clientFDProperty_id) Return Clientflatdirectory objects filtered by the clientFDProperty_id column
 * @method array findByFdrecordId(int $fdRecord_id) Return Clientflatdirectory objects filtered by the fdRecord_id column
 * @method array findByDatestart(string $dateStart) Return Clientflatdirectory objects filtered by the dateStart column
 * @method array findByDateend(string $dateEnd) Return Clientflatdirectory objects filtered by the dateEnd column
 * @method array findByCreatedatetime(string $createDateTime) Return Clientflatdirectory objects filtered by the createDateTime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Clientflatdirectory objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDateTime) Return Clientflatdirectory objects filtered by the modifyDateTime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Clientflatdirectory objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Clientflatdirectory objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Clientflatdirectory objects filtered by the client_id column
 * @method array findByComment(string $comment) Return Clientflatdirectory objects filtered by the comment column
 * @method array findByVersion(int $version) Return Clientflatdirectory objects filtered by the version column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientflatdirectoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientflatdirectoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientflatdirectory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientflatdirectoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientflatdirectoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientflatdirectoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientflatdirectoryQuery) {
            return $criteria;
        }
        $query = new ClientflatdirectoryQuery();
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
     * @return   Clientflatdirectory|Clientflatdirectory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientflatdirectoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientflatdirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientflatdirectory A model object, or null if the key is not found
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
     * @return                 Clientflatdirectory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `clientFDProperty_id`, `fdRecord_id`, `dateStart`, `dateEnd`, `createDateTime`, `createPerson_id`, `modifyDateTime`, `modifyPerson_id`, `deleted`, `client_id`, `comment`, `version` FROM `ClientFlatDirectory` WHERE `id` = :p0';
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
            $obj = new Clientflatdirectory();
            $obj->hydrate($row);
            ClientflatdirectoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientflatdirectory|Clientflatdirectory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientflatdirectory[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientflatdirectoryPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientflatdirectoryPeer::ID, $keys, Criteria::IN);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the clientFDProperty_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientfdpropertyId(1234); // WHERE clientFDProperty_id = 1234
     * $query->filterByClientfdpropertyId(array(12, 34)); // WHERE clientFDProperty_id IN (12, 34)
     * $query->filterByClientfdpropertyId(array('min' => 12)); // WHERE clientFDProperty_id >= 12
     * $query->filterByClientfdpropertyId(array('max' => 12)); // WHERE clientFDProperty_id <= 12
     * </code>
     *
     * @see       filterByClientfdproperty()
     *
     * @param     mixed $clientfdpropertyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByClientfdpropertyId($clientfdpropertyId = null, $comparison = null)
    {
        if (is_array($clientfdpropertyId)) {
            $useMinMax = false;
            if (isset($clientfdpropertyId['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, $clientfdpropertyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientfdpropertyId['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, $clientfdpropertyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, $clientfdpropertyId, $comparison);
    }

    /**
     * Filter the query on the fdRecord_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFdrecordId(1234); // WHERE fdRecord_id = 1234
     * $query->filterByFdrecordId(array(12, 34)); // WHERE fdRecord_id IN (12, 34)
     * $query->filterByFdrecordId(array('min' => 12)); // WHERE fdRecord_id >= 12
     * $query->filterByFdrecordId(array('max' => 12)); // WHERE fdRecord_id <= 12
     * </code>
     *
     * @see       filterByFdrecord()
     *
     * @param     mixed $fdrecordId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByFdrecordId($fdrecordId = null, $comparison = null)
    {
        if (is_array($fdrecordId)) {
            $useMinMax = false;
            if (isset($fdrecordId['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::FDRECORD_ID, $fdrecordId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fdrecordId['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::FDRECORD_ID, $fdrecordId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::FDRECORD_ID, $fdrecordId, $comparison);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByDatestart($datestart = null, $comparison = null)
    {
        if (is_array($datestart)) {
            $useMinMax = false;
            if (isset($datestart['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::DATESTART, $datestart['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datestart['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::DATESTART, $datestart['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::DATESTART, $datestart, $comparison);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByDateend($dateend = null, $comparison = null)
    {
        if (is_array($dateend)) {
            $useMinMax = false;
            if (isset($dateend['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::DATEEND, $dateend['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateend['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::DATEEND, $dateend['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::DATEEND, $dateend, $comparison);
    }

    /**
     * Filter the query on the createDateTime column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedatetime('2011-03-14'); // WHERE createDateTime = '2011-03-14'
     * $query->filterByCreatedatetime('now'); // WHERE createDateTime = '2011-03-14'
     * $query->filterByCreatedatetime(array('max' => 'yesterday')); // WHERE createDateTime > '2011-03-13'
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::CREATEPERSON_ID, $createpersonId, $comparison);
    }

    /**
     * Filter the query on the modifyDateTime column
     *
     * Example usage:
     * <code>
     * $query->filterByModifydatetime('2011-03-14'); // WHERE modifyDateTime = '2011-03-14'
     * $query->filterByModifydatetime('now'); // WHERE modifyDateTime = '2011-03-14'
     * $query->filterByModifydatetime(array('max' => 'yesterday')); // WHERE modifyDateTime > '2011-03-13'
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::DELETED, $deleted, $comparison);
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
     * @see       filterByClient()
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::COMMENT, $comment, $comparison);
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
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientflatdirectoryPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientflatdirectoryPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientflatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(ClientflatdirectoryPeer::CLIENT_ID, $client->getId(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientflatdirectoryPeer::CLIENT_ID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', '\Webmis\Models\ClientQuery');
    }

    /**
     * Filter the query by a related Clientfdproperty object
     *
     * @param   Clientfdproperty|PropelObjectCollection $clientfdproperty The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientflatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientfdproperty($clientfdproperty, $comparison = null)
    {
        if ($clientfdproperty instanceof Clientfdproperty) {
            return $this
                ->addUsingAlias(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, $clientfdproperty->getId(), $comparison);
        } elseif ($clientfdproperty instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientflatdirectoryPeer::CLIENTFDPROPERTY_ID, $clientfdproperty->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClientfdproperty() only accepts arguments of type Clientfdproperty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientfdproperty relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function joinClientfdproperty($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientfdproperty');

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
            $this->addJoinObject($join, 'Clientfdproperty');
        }

        return $this;
    }

    /**
     * Use the Clientfdproperty relation Clientfdproperty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientfdpropertyQuery A secondary query class using the current class as primary query
     */
    public function useClientfdpropertyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientfdproperty($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientfdproperty', '\Webmis\Models\ClientfdpropertyQuery');
    }

    /**
     * Filter the query by a related Fdrecord object
     *
     * @param   Fdrecord|PropelObjectCollection $fdrecord The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientflatdirectoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFdrecord($fdrecord, $comparison = null)
    {
        if ($fdrecord instanceof Fdrecord) {
            return $this
                ->addUsingAlias(ClientflatdirectoryPeer::FDRECORD_ID, $fdrecord->getId(), $comparison);
        } elseif ($fdrecord instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ClientflatdirectoryPeer::FDRECORD_ID, $fdrecord->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFdrecord() only accepts arguments of type Fdrecord or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Fdrecord relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function joinFdrecord($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Fdrecord');

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
            $this->addJoinObject($join, 'Fdrecord');
        }

        return $this;
    }

    /**
     * Use the Fdrecord relation Fdrecord object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\FdrecordQuery A secondary query class using the current class as primary query
     */
    public function useFdrecordQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFdrecord($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Fdrecord', '\Webmis\Models\FdrecordQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Clientflatdirectory $clientflatdirectory Object to remove from the list of results
     *
     * @return ClientflatdirectoryQuery The current query, for fluid interface
     */
    public function prune($clientflatdirectory = null)
    {
        if ($clientflatdirectory) {
            $this->addUsingAlias(ClientflatdirectoryPeer::ID, $clientflatdirectory->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
