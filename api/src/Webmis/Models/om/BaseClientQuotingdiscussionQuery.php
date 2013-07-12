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
use Webmis\Models\ClientQuotingdiscussion;
use Webmis\Models\ClientQuotingdiscussionPeer;
use Webmis\Models\ClientQuotingdiscussionQuery;

/**
 * Base class that represents a query for the 'Client_QuotingDiscussion' table.
 *
 *
 *
 * @method ClientQuotingdiscussionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientQuotingdiscussionQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method ClientQuotingdiscussionQuery orderByDatemessage($order = Criteria::ASC) Order by the dateMessage column
 * @method ClientQuotingdiscussionQuery orderByAgreementtypeId($order = Criteria::ASC) Order by the agreementType_id column
 * @method ClientQuotingdiscussionQuery orderByResponsiblepersonId($order = Criteria::ASC) Order by the responsiblePerson_id column
 * @method ClientQuotingdiscussionQuery orderByCosignatory($order = Criteria::ASC) Order by the cosignatory column
 * @method ClientQuotingdiscussionQuery orderByCosignatorypost($order = Criteria::ASC) Order by the cosignatoryPost column
 * @method ClientQuotingdiscussionQuery orderByCosignatoryname($order = Criteria::ASC) Order by the cosignatoryName column
 * @method ClientQuotingdiscussionQuery orderByRemark($order = Criteria::ASC) Order by the remark column
 *
 * @method ClientQuotingdiscussionQuery groupById() Group by the id column
 * @method ClientQuotingdiscussionQuery groupByMasterId() Group by the master_id column
 * @method ClientQuotingdiscussionQuery groupByDatemessage() Group by the dateMessage column
 * @method ClientQuotingdiscussionQuery groupByAgreementtypeId() Group by the agreementType_id column
 * @method ClientQuotingdiscussionQuery groupByResponsiblepersonId() Group by the responsiblePerson_id column
 * @method ClientQuotingdiscussionQuery groupByCosignatory() Group by the cosignatory column
 * @method ClientQuotingdiscussionQuery groupByCosignatorypost() Group by the cosignatoryPost column
 * @method ClientQuotingdiscussionQuery groupByCosignatoryname() Group by the cosignatoryName column
 * @method ClientQuotingdiscussionQuery groupByRemark() Group by the remark column
 *
 * @method ClientQuotingdiscussionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientQuotingdiscussionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientQuotingdiscussionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientQuotingdiscussion findOne(PropelPDO $con = null) Return the first ClientQuotingdiscussion matching the query
 * @method ClientQuotingdiscussion findOneOrCreate(PropelPDO $con = null) Return the first ClientQuotingdiscussion matching the query, or a new ClientQuotingdiscussion object populated from the query conditions when no match is found
 *
 * @method ClientQuotingdiscussion findOneByMasterId(int $master_id) Return the first ClientQuotingdiscussion filtered by the master_id column
 * @method ClientQuotingdiscussion findOneByDatemessage(string $dateMessage) Return the first ClientQuotingdiscussion filtered by the dateMessage column
 * @method ClientQuotingdiscussion findOneByAgreementtypeId(int $agreementType_id) Return the first ClientQuotingdiscussion filtered by the agreementType_id column
 * @method ClientQuotingdiscussion findOneByResponsiblepersonId(int $responsiblePerson_id) Return the first ClientQuotingdiscussion filtered by the responsiblePerson_id column
 * @method ClientQuotingdiscussion findOneByCosignatory(string $cosignatory) Return the first ClientQuotingdiscussion filtered by the cosignatory column
 * @method ClientQuotingdiscussion findOneByCosignatorypost(string $cosignatoryPost) Return the first ClientQuotingdiscussion filtered by the cosignatoryPost column
 * @method ClientQuotingdiscussion findOneByCosignatoryname(string $cosignatoryName) Return the first ClientQuotingdiscussion filtered by the cosignatoryName column
 * @method ClientQuotingdiscussion findOneByRemark(string $remark) Return the first ClientQuotingdiscussion filtered by the remark column
 *
 * @method array findById(int $id) Return ClientQuotingdiscussion objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return ClientQuotingdiscussion objects filtered by the master_id column
 * @method array findByDatemessage(string $dateMessage) Return ClientQuotingdiscussion objects filtered by the dateMessage column
 * @method array findByAgreementtypeId(int $agreementType_id) Return ClientQuotingdiscussion objects filtered by the agreementType_id column
 * @method array findByResponsiblepersonId(int $responsiblePerson_id) Return ClientQuotingdiscussion objects filtered by the responsiblePerson_id column
 * @method array findByCosignatory(string $cosignatory) Return ClientQuotingdiscussion objects filtered by the cosignatory column
 * @method array findByCosignatorypost(string $cosignatoryPost) Return ClientQuotingdiscussion objects filtered by the cosignatoryPost column
 * @method array findByCosignatoryname(string $cosignatoryName) Return ClientQuotingdiscussion objects filtered by the cosignatoryName column
 * @method array findByRemark(string $remark) Return ClientQuotingdiscussion objects filtered by the remark column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientQuotingdiscussionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientQuotingdiscussionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ClientQuotingdiscussion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientQuotingdiscussionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientQuotingdiscussionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientQuotingdiscussionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientQuotingdiscussionQuery) {
            return $criteria;
        }
        $query = new ClientQuotingdiscussionQuery();
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
     * @return   ClientQuotingdiscussion|ClientQuotingdiscussion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientQuotingdiscussionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientQuotingdiscussionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ClientQuotingdiscussion A model object, or null if the key is not found
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
     * @return                 ClientQuotingdiscussion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `dateMessage`, `agreementType_id`, `responsiblePerson_id`, `cosignatory`, `cosignatoryPost`, `cosignatoryName`, `remark` FROM `Client_QuotingDiscussion` WHERE `id` = :p0';
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
            $obj = new ClientQuotingdiscussion();
            $obj->hydrate($row);
            ClientQuotingdiscussionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ClientQuotingdiscussion|ClientQuotingdiscussion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ClientQuotingdiscussion[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::ID, $keys, Criteria::IN);
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
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the master_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMasterId(1234); // WHERE master_id = 1234
     * $query->filterByMasterId(array(12, 34)); // WHERE master_id IN (12, 34)
     * $query->filterByMasterId(array('min' => 12)); // WHERE master_id >= 12
     * $query->filterByMasterId(array('max' => 12)); // WHERE master_id <= 12
     * </code>
     *
     * @param     mixed $masterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the dateMessage column
     *
     * Example usage:
     * <code>
     * $query->filterByDatemessage('2011-03-14'); // WHERE dateMessage = '2011-03-14'
     * $query->filterByDatemessage('now'); // WHERE dateMessage = '2011-03-14'
     * $query->filterByDatemessage(array('max' => 'yesterday')); // WHERE dateMessage > '2011-03-13'
     * </code>
     *
     * @param     mixed $datemessage The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByDatemessage($datemessage = null, $comparison = null)
    {
        if (is_array($datemessage)) {
            $useMinMax = false;
            if (isset($datemessage['min'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::DATEMESSAGE, $datemessage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datemessage['max'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::DATEMESSAGE, $datemessage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::DATEMESSAGE, $datemessage, $comparison);
    }

    /**
     * Filter the query on the agreementType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAgreementtypeId(1234); // WHERE agreementType_id = 1234
     * $query->filterByAgreementtypeId(array(12, 34)); // WHERE agreementType_id IN (12, 34)
     * $query->filterByAgreementtypeId(array('min' => 12)); // WHERE agreementType_id >= 12
     * $query->filterByAgreementtypeId(array('max' => 12)); // WHERE agreementType_id <= 12
     * </code>
     *
     * @param     mixed $agreementtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByAgreementtypeId($agreementtypeId = null, $comparison = null)
    {
        if (is_array($agreementtypeId)) {
            $useMinMax = false;
            if (isset($agreementtypeId['min'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::AGREEMENTTYPE_ID, $agreementtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($agreementtypeId['max'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::AGREEMENTTYPE_ID, $agreementtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::AGREEMENTTYPE_ID, $agreementtypeId, $comparison);
    }

    /**
     * Filter the query on the responsiblePerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByResponsiblepersonId(1234); // WHERE responsiblePerson_id = 1234
     * $query->filterByResponsiblepersonId(array(12, 34)); // WHERE responsiblePerson_id IN (12, 34)
     * $query->filterByResponsiblepersonId(array('min' => 12)); // WHERE responsiblePerson_id >= 12
     * $query->filterByResponsiblepersonId(array('max' => 12)); // WHERE responsiblePerson_id <= 12
     * </code>
     *
     * @param     mixed $responsiblepersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByResponsiblepersonId($responsiblepersonId = null, $comparison = null)
    {
        if (is_array($responsiblepersonId)) {
            $useMinMax = false;
            if (isset($responsiblepersonId['min'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::RESPONSIBLEPERSON_ID, $responsiblepersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($responsiblepersonId['max'])) {
                $this->addUsingAlias(ClientQuotingdiscussionPeer::RESPONSIBLEPERSON_ID, $responsiblepersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::RESPONSIBLEPERSON_ID, $responsiblepersonId, $comparison);
    }

    /**
     * Filter the query on the cosignatory column
     *
     * Example usage:
     * <code>
     * $query->filterByCosignatory('fooValue');   // WHERE cosignatory = 'fooValue'
     * $query->filterByCosignatory('%fooValue%'); // WHERE cosignatory LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cosignatory The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByCosignatory($cosignatory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cosignatory)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cosignatory)) {
                $cosignatory = str_replace('*', '%', $cosignatory);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::COSIGNATORY, $cosignatory, $comparison);
    }

    /**
     * Filter the query on the cosignatoryPost column
     *
     * Example usage:
     * <code>
     * $query->filterByCosignatorypost('fooValue');   // WHERE cosignatoryPost = 'fooValue'
     * $query->filterByCosignatorypost('%fooValue%'); // WHERE cosignatoryPost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cosignatorypost The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByCosignatorypost($cosignatorypost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cosignatorypost)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cosignatorypost)) {
                $cosignatorypost = str_replace('*', '%', $cosignatorypost);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::COSIGNATORYPOST, $cosignatorypost, $comparison);
    }

    /**
     * Filter the query on the cosignatoryName column
     *
     * Example usage:
     * <code>
     * $query->filterByCosignatoryname('fooValue');   // WHERE cosignatoryName = 'fooValue'
     * $query->filterByCosignatoryname('%fooValue%'); // WHERE cosignatoryName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cosignatoryname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByCosignatoryname($cosignatoryname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cosignatoryname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cosignatoryname)) {
                $cosignatoryname = str_replace('*', '%', $cosignatoryname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::COSIGNATORYNAME, $cosignatoryname, $comparison);
    }

    /**
     * Filter the query on the remark column
     *
     * Example usage:
     * <code>
     * $query->filterByRemark('fooValue');   // WHERE remark = 'fooValue'
     * $query->filterByRemark('%fooValue%'); // WHERE remark LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remark The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function filterByRemark($remark = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remark)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $remark)) {
                $remark = str_replace('*', '%', $remark);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientQuotingdiscussionPeer::REMARK, $remark, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ClientQuotingdiscussion $clientQuotingdiscussion Object to remove from the list of results
     *
     * @return ClientQuotingdiscussionQuery The current query, for fluid interface
     */
    public function prune($clientQuotingdiscussion = null)
    {
        if ($clientQuotingdiscussion) {
            $this->addUsingAlias(ClientQuotingdiscussionPeer::ID, $clientQuotingdiscussion->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
