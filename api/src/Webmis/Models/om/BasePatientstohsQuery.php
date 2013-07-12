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
use Webmis\Models\Patientstohs;
use Webmis\Models\PatientstohsPeer;
use Webmis\Models\PatientstohsQuery;

/**
 * Base class that represents a query for the 'PatientsToHS' table.
 *
 *
 *
 * @method PatientstohsQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method PatientstohsQuery orderBySendtime($order = Criteria::ASC) Order by the sendTime column
 * @method PatientstohsQuery orderByErrcount($order = Criteria::ASC) Order by the errCount column
 * @method PatientstohsQuery orderByInfo($order = Criteria::ASC) Order by the info column
 *
 * @method PatientstohsQuery groupByClientId() Group by the client_id column
 * @method PatientstohsQuery groupBySendtime() Group by the sendTime column
 * @method PatientstohsQuery groupByErrcount() Group by the errCount column
 * @method PatientstohsQuery groupByInfo() Group by the info column
 *
 * @method PatientstohsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PatientstohsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PatientstohsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PatientstohsQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method PatientstohsQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method PatientstohsQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method Patientstohs findOne(PropelPDO $con = null) Return the first Patientstohs matching the query
 * @method Patientstohs findOneOrCreate(PropelPDO $con = null) Return the first Patientstohs matching the query, or a new Patientstohs object populated from the query conditions when no match is found
 *
 * @method Patientstohs findOneBySendtime(string $sendTime) Return the first Patientstohs filtered by the sendTime column
 * @method Patientstohs findOneByErrcount(int $errCount) Return the first Patientstohs filtered by the errCount column
 * @method Patientstohs findOneByInfo(string $info) Return the first Patientstohs filtered by the info column
 *
 * @method array findByClientId(int $client_id) Return Patientstohs objects filtered by the client_id column
 * @method array findBySendtime(string $sendTime) Return Patientstohs objects filtered by the sendTime column
 * @method array findByErrcount(int $errCount) Return Patientstohs objects filtered by the errCount column
 * @method array findByInfo(string $info) Return Patientstohs objects filtered by the info column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePatientstohsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePatientstohsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Patientstohs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PatientstohsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PatientstohsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PatientstohsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PatientstohsQuery) {
            return $criteria;
        }
        $query = new PatientstohsQuery();
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
     * @return   Patientstohs|Patientstohs[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PatientstohsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PatientstohsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Patientstohs A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByClientId($key, $con = null)
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
     * @return                 Patientstohs A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `client_id`, `sendTime`, `errCount`, `info` FROM `PatientsToHS` WHERE `client_id` = :p0';
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
            $obj = new Patientstohs();
            $obj->hydrate($row);
            PatientstohsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Patientstohs|Patientstohs[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Patientstohs[]|mixed the list of results, formatted by the current formatter
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
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PatientstohsPeer::CLIENT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PatientstohsPeer::CLIENT_ID, $keys, Criteria::IN);
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
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(PatientstohsPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(PatientstohsPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PatientstohsPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the sendTime column
     *
     * Example usage:
     * <code>
     * $query->filterBySendtime('2011-03-14'); // WHERE sendTime = '2011-03-14'
     * $query->filterBySendtime('now'); // WHERE sendTime = '2011-03-14'
     * $query->filterBySendtime(array('max' => 'yesterday')); // WHERE sendTime > '2011-03-13'
     * </code>
     *
     * @param     mixed $sendtime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function filterBySendtime($sendtime = null, $comparison = null)
    {
        if (is_array($sendtime)) {
            $useMinMax = false;
            if (isset($sendtime['min'])) {
                $this->addUsingAlias(PatientstohsPeer::SENDTIME, $sendtime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sendtime['max'])) {
                $this->addUsingAlias(PatientstohsPeer::SENDTIME, $sendtime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PatientstohsPeer::SENDTIME, $sendtime, $comparison);
    }

    /**
     * Filter the query on the errCount column
     *
     * Example usage:
     * <code>
     * $query->filterByErrcount(1234); // WHERE errCount = 1234
     * $query->filterByErrcount(array(12, 34)); // WHERE errCount IN (12, 34)
     * $query->filterByErrcount(array('min' => 12)); // WHERE errCount >= 12
     * $query->filterByErrcount(array('max' => 12)); // WHERE errCount <= 12
     * </code>
     *
     * @param     mixed $errcount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function filterByErrcount($errcount = null, $comparison = null)
    {
        if (is_array($errcount)) {
            $useMinMax = false;
            if (isset($errcount['min'])) {
                $this->addUsingAlias(PatientstohsPeer::ERRCOUNT, $errcount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($errcount['max'])) {
                $this->addUsingAlias(PatientstohsPeer::ERRCOUNT, $errcount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PatientstohsPeer::ERRCOUNT, $errcount, $comparison);
    }

    /**
     * Filter the query on the info column
     *
     * Example usage:
     * <code>
     * $query->filterByInfo('fooValue');   // WHERE info = 'fooValue'
     * $query->filterByInfo('%fooValue%'); // WHERE info LIKE '%fooValue%'
     * </code>
     *
     * @param     string $info The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function filterByInfo($info = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($info)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $info)) {
                $info = str_replace('*', '%', $info);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PatientstohsPeer::INFO, $info, $comparison);
    }

    /**
     * Filter the query by a related Client object
     *
     * @param   Client|PropelObjectCollection $client The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PatientstohsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof Client) {
            return $this
                ->addUsingAlias(PatientstohsPeer::CLIENT_ID, $client->getId(), $comparison);
        } elseif ($client instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PatientstohsPeer::CLIENT_ID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return PatientstohsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Patientstohs $patientstohs Object to remove from the list of results
     *
     * @return PatientstohsQuery The current query, for fluid interface
     */
    public function prune($patientstohs = null)
    {
        if ($patientstohs) {
            $this->addUsingAlias(PatientstohsPeer::CLIENT_ID, $patientstohs->getClientId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
