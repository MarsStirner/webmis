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
use Webmis\Models\Clientwork;
use Webmis\Models\ClientworkPeer;
use Webmis\Models\ClientworkQuery;

/**
 * Base class that represents a query for the 'ClientWork' table.
 *
 *
 *
 * @method ClientworkQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientworkQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientworkQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientworkQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientworkQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientworkQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientworkQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ClientworkQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method ClientworkQuery orderByFreeinput($order = Criteria::ASC) Order by the freeInput column
 * @method ClientworkQuery orderByPost($order = Criteria::ASC) Order by the post column
 * @method ClientworkQuery orderByStage($order = Criteria::ASC) Order by the stage column
 * @method ClientworkQuery orderByOkved($order = Criteria::ASC) Order by the OKVED column
 * @method ClientworkQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ClientworkQuery orderByRankId($order = Criteria::ASC) Order by the rank_id column
 * @method ClientworkQuery orderByArmId($order = Criteria::ASC) Order by the arm_id column
 *
 * @method ClientworkQuery groupById() Group by the id column
 * @method ClientworkQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientworkQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientworkQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientworkQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientworkQuery groupByDeleted() Group by the deleted column
 * @method ClientworkQuery groupByClientId() Group by the client_id column
 * @method ClientworkQuery groupByOrgId() Group by the org_id column
 * @method ClientworkQuery groupByFreeinput() Group by the freeInput column
 * @method ClientworkQuery groupByPost() Group by the post column
 * @method ClientworkQuery groupByStage() Group by the stage column
 * @method ClientworkQuery groupByOkved() Group by the OKVED column
 * @method ClientworkQuery groupByVersion() Group by the version column
 * @method ClientworkQuery groupByRankId() Group by the rank_id column
 * @method ClientworkQuery groupByArmId() Group by the arm_id column
 *
 * @method ClientworkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientworkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientworkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Clientwork findOne(PropelPDO $con = null) Return the first Clientwork matching the query
 * @method Clientwork findOneOrCreate(PropelPDO $con = null) Return the first Clientwork matching the query, or a new Clientwork object populated from the query conditions when no match is found
 *
 * @method Clientwork findOneByCreatedatetime(string $createDatetime) Return the first Clientwork filtered by the createDatetime column
 * @method Clientwork findOneByCreatepersonId(int $createPerson_id) Return the first Clientwork filtered by the createPerson_id column
 * @method Clientwork findOneByModifydatetime(string $modifyDatetime) Return the first Clientwork filtered by the modifyDatetime column
 * @method Clientwork findOneByModifypersonId(int $modifyPerson_id) Return the first Clientwork filtered by the modifyPerson_id column
 * @method Clientwork findOneByDeleted(boolean $deleted) Return the first Clientwork filtered by the deleted column
 * @method Clientwork findOneByClientId(int $client_id) Return the first Clientwork filtered by the client_id column
 * @method Clientwork findOneByOrgId(int $org_id) Return the first Clientwork filtered by the org_id column
 * @method Clientwork findOneByFreeinput(string $freeInput) Return the first Clientwork filtered by the freeInput column
 * @method Clientwork findOneByPost(string $post) Return the first Clientwork filtered by the post column
 * @method Clientwork findOneByStage(int $stage) Return the first Clientwork filtered by the stage column
 * @method Clientwork findOneByOkved(string $OKVED) Return the first Clientwork filtered by the OKVED column
 * @method Clientwork findOneByVersion(int $version) Return the first Clientwork filtered by the version column
 * @method Clientwork findOneByRankId(int $rank_id) Return the first Clientwork filtered by the rank_id column
 * @method Clientwork findOneByArmId(int $arm_id) Return the first Clientwork filtered by the arm_id column
 *
 * @method array findById(int $id) Return Clientwork objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Clientwork objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Clientwork objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Clientwork objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Clientwork objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Clientwork objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Clientwork objects filtered by the client_id column
 * @method array findByOrgId(int $org_id) Return Clientwork objects filtered by the org_id column
 * @method array findByFreeinput(string $freeInput) Return Clientwork objects filtered by the freeInput column
 * @method array findByPost(string $post) Return Clientwork objects filtered by the post column
 * @method array findByStage(int $stage) Return Clientwork objects filtered by the stage column
 * @method array findByOkved(string $OKVED) Return Clientwork objects filtered by the OKVED column
 * @method array findByVersion(int $version) Return Clientwork objects filtered by the version column
 * @method array findByRankId(int $rank_id) Return Clientwork objects filtered by the rank_id column
 * @method array findByArmId(int $arm_id) Return Clientwork objects filtered by the arm_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientworkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientworkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientwork', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientworkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientworkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientworkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientworkQuery) {
            return $criteria;
        }
        $query = new ClientworkQuery();
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
     * @return   Clientwork|Clientwork[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientworkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientworkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientwork A model object, or null if the key is not found
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
     * @return                 Clientwork A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `client_id`, `org_id`, `freeInput`, `post`, `stage`, `OKVED`, `version`, `rank_id`, `arm_id` FROM `ClientWork` WHERE `id` = :p0';
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
            $obj = new Clientwork();
            $obj->hydrate($row);
            ClientworkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientwork|Clientwork[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientwork[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientworkPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientworkPeer::ID, $keys, Criteria::IN);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientworkPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientworkPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::ID, $id, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientworkPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientworkPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientworkPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientworkPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientworkPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientworkPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientworkPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientworkPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientworkPeer::DELETED, $deleted, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ClientworkPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ClientworkPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the org_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgId(1234); // WHERE org_id = 1234
     * $query->filterByOrgId(array(12, 34)); // WHERE org_id IN (12, 34)
     * $query->filterByOrgId(array('min' => 12)); // WHERE org_id >= 12
     * $query->filterByOrgId(array('max' => 12)); // WHERE org_id <= 12
     * </code>
     *
     * @param     mixed $orgId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByOrgId($orgId = null, $comparison = null)
    {
        if (is_array($orgId)) {
            $useMinMax = false;
            if (isset($orgId['min'])) {
                $this->addUsingAlias(ClientworkPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgId['max'])) {
                $this->addUsingAlias(ClientworkPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::ORG_ID, $orgId, $comparison);
    }

    /**
     * Filter the query on the freeInput column
     *
     * Example usage:
     * <code>
     * $query->filterByFreeinput('fooValue');   // WHERE freeInput = 'fooValue'
     * $query->filterByFreeinput('%fooValue%'); // WHERE freeInput LIKE '%fooValue%'
     * </code>
     *
     * @param     string $freeinput The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByFreeinput($freeinput = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freeinput)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $freeinput)) {
                $freeinput = str_replace('*', '%', $freeinput);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::FREEINPUT, $freeinput, $comparison);
    }

    /**
     * Filter the query on the post column
     *
     * Example usage:
     * <code>
     * $query->filterByPost('fooValue');   // WHERE post = 'fooValue'
     * $query->filterByPost('%fooValue%'); // WHERE post LIKE '%fooValue%'
     * </code>
     *
     * @param     string $post The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByPost($post = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($post)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $post)) {
                $post = str_replace('*', '%', $post);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::POST, $post, $comparison);
    }

    /**
     * Filter the query on the stage column
     *
     * Example usage:
     * <code>
     * $query->filterByStage(1234); // WHERE stage = 1234
     * $query->filterByStage(array(12, 34)); // WHERE stage IN (12, 34)
     * $query->filterByStage(array('min' => 12)); // WHERE stage >= 12
     * $query->filterByStage(array('max' => 12)); // WHERE stage <= 12
     * </code>
     *
     * @param     mixed $stage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByStage($stage = null, $comparison = null)
    {
        if (is_array($stage)) {
            $useMinMax = false;
            if (isset($stage['min'])) {
                $this->addUsingAlias(ClientworkPeer::STAGE, $stage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($stage['max'])) {
                $this->addUsingAlias(ClientworkPeer::STAGE, $stage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::STAGE, $stage, $comparison);
    }

    /**
     * Filter the query on the OKVED column
     *
     * Example usage:
     * <code>
     * $query->filterByOkved('fooValue');   // WHERE OKVED = 'fooValue'
     * $query->filterByOkved('%fooValue%'); // WHERE OKVED LIKE '%fooValue%'
     * </code>
     *
     * @param     string $okved The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByOkved($okved = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($okved)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $okved)) {
                $okved = str_replace('*', '%', $okved);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::OKVED, $okved, $comparison);
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
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientworkPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientworkPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the rank_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRankId(1234); // WHERE rank_id = 1234
     * $query->filterByRankId(array(12, 34)); // WHERE rank_id IN (12, 34)
     * $query->filterByRankId(array('min' => 12)); // WHERE rank_id >= 12
     * $query->filterByRankId(array('max' => 12)); // WHERE rank_id <= 12
     * </code>
     *
     * @param     mixed $rankId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByRankId($rankId = null, $comparison = null)
    {
        if (is_array($rankId)) {
            $useMinMax = false;
            if (isset($rankId['min'])) {
                $this->addUsingAlias(ClientworkPeer::RANK_ID, $rankId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rankId['max'])) {
                $this->addUsingAlias(ClientworkPeer::RANK_ID, $rankId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::RANK_ID, $rankId, $comparison);
    }

    /**
     * Filter the query on the arm_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArmId(1234); // WHERE arm_id = 1234
     * $query->filterByArmId(array(12, 34)); // WHERE arm_id IN (12, 34)
     * $query->filterByArmId(array('min' => 12)); // WHERE arm_id >= 12
     * $query->filterByArmId(array('max' => 12)); // WHERE arm_id <= 12
     * </code>
     *
     * @param     mixed $armId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function filterByArmId($armId = null, $comparison = null)
    {
        if (is_array($armId)) {
            $useMinMax = false;
            if (isset($armId['min'])) {
                $this->addUsingAlias(ClientworkPeer::ARM_ID, $armId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($armId['max'])) {
                $this->addUsingAlias(ClientworkPeer::ARM_ID, $armId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientworkPeer::ARM_ID, $armId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Clientwork $clientwork Object to remove from the list of results
     *
     * @return ClientworkQuery The current query, for fluid interface
     */
    public function prune($clientwork = null)
    {
        if ($clientwork) {
            $this->addUsingAlias(ClientworkPeer::ID, $clientwork->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
