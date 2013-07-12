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
use Webmis\Models\OrganisationPolicyserial;
use Webmis\Models\OrganisationPolicyserialPeer;
use Webmis\Models\OrganisationPolicyserialQuery;

/**
 * Base class that represents a query for the 'Organisation_PolicySerial' table.
 *
 *
 *
 * @method OrganisationPolicyserialQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrganisationPolicyserialQuery orderByOrganisationId($order = Criteria::ASC) Order by the organisation_id column
 * @method OrganisationPolicyserialQuery orderBySerial($order = Criteria::ASC) Order by the serial column
 * @method OrganisationPolicyserialQuery orderByPolicytypeId($order = Criteria::ASC) Order by the policyType_id column
 *
 * @method OrganisationPolicyserialQuery groupById() Group by the id column
 * @method OrganisationPolicyserialQuery groupByOrganisationId() Group by the organisation_id column
 * @method OrganisationPolicyserialQuery groupBySerial() Group by the serial column
 * @method OrganisationPolicyserialQuery groupByPolicytypeId() Group by the policyType_id column
 *
 * @method OrganisationPolicyserialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrganisationPolicyserialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrganisationPolicyserialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrganisationPolicyserial findOne(PropelPDO $con = null) Return the first OrganisationPolicyserial matching the query
 * @method OrganisationPolicyserial findOneOrCreate(PropelPDO $con = null) Return the first OrganisationPolicyserial matching the query, or a new OrganisationPolicyserial object populated from the query conditions when no match is found
 *
 * @method OrganisationPolicyserial findOneByOrganisationId(int $organisation_id) Return the first OrganisationPolicyserial filtered by the organisation_id column
 * @method OrganisationPolicyserial findOneBySerial(string $serial) Return the first OrganisationPolicyserial filtered by the serial column
 * @method OrganisationPolicyserial findOneByPolicytypeId(int $policyType_id) Return the first OrganisationPolicyserial filtered by the policyType_id column
 *
 * @method array findById(int $id) Return OrganisationPolicyserial objects filtered by the id column
 * @method array findByOrganisationId(int $organisation_id) Return OrganisationPolicyserial objects filtered by the organisation_id column
 * @method array findBySerial(string $serial) Return OrganisationPolicyserial objects filtered by the serial column
 * @method array findByPolicytypeId(int $policyType_id) Return OrganisationPolicyserial objects filtered by the policyType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrganisationPolicyserialQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrganisationPolicyserialQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrganisationPolicyserial', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrganisationPolicyserialQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrganisationPolicyserialQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrganisationPolicyserialQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrganisationPolicyserialQuery) {
            return $criteria;
        }
        $query = new OrganisationPolicyserialQuery();
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
     * @return   OrganisationPolicyserial|OrganisationPolicyserial[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrganisationPolicyserialPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrganisationPolicyserialPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrganisationPolicyserial A model object, or null if the key is not found
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
     * @return                 OrganisationPolicyserial A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `organisation_id`, `serial`, `policyType_id` FROM `Organisation_PolicySerial` WHERE `id` = :p0';
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
            $obj = new OrganisationPolicyserial();
            $obj->hydrate($row);
            OrganisationPolicyserialPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrganisationPolicyserial|OrganisationPolicyserial[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrganisationPolicyserial[]|mixed the list of results, formatted by the current formatter
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
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrganisationPolicyserialPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrganisationPolicyserialPeer::ID, $keys, Criteria::IN);
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
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrganisationPolicyserialPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrganisationPolicyserialPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPolicyserialPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the organisation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganisationId(1234); // WHERE organisation_id = 1234
     * $query->filterByOrganisationId(array(12, 34)); // WHERE organisation_id IN (12, 34)
     * $query->filterByOrganisationId(array('min' => 12)); // WHERE organisation_id >= 12
     * $query->filterByOrganisationId(array('max' => 12)); // WHERE organisation_id <= 12
     * </code>
     *
     * @param     mixed $organisationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
     */
    public function filterByOrganisationId($organisationId = null, $comparison = null)
    {
        if (is_array($organisationId)) {
            $useMinMax = false;
            if (isset($organisationId['min'])) {
                $this->addUsingAlias(OrganisationPolicyserialPeer::ORGANISATION_ID, $organisationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organisationId['max'])) {
                $this->addUsingAlias(OrganisationPolicyserialPeer::ORGANISATION_ID, $organisationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPolicyserialPeer::ORGANISATION_ID, $organisationId, $comparison);
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
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
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

        return $this->addUsingAlias(OrganisationPolicyserialPeer::SERIAL, $serial, $comparison);
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
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
     */
    public function filterByPolicytypeId($policytypeId = null, $comparison = null)
    {
        if (is_array($policytypeId)) {
            $useMinMax = false;
            if (isset($policytypeId['min'])) {
                $this->addUsingAlias(OrganisationPolicyserialPeer::POLICYTYPE_ID, $policytypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($policytypeId['max'])) {
                $this->addUsingAlias(OrganisationPolicyserialPeer::POLICYTYPE_ID, $policytypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationPolicyserialPeer::POLICYTYPE_ID, $policytypeId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   OrganisationPolicyserial $organisationPolicyserial Object to remove from the list of results
     *
     * @return OrganisationPolicyserialQuery The current query, for fluid interface
     */
    public function prune($organisationPolicyserial = null)
    {
        if ($organisationPolicyserial) {
            $this->addUsingAlias(OrganisationPolicyserialPeer::ID, $organisationPolicyserial->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
