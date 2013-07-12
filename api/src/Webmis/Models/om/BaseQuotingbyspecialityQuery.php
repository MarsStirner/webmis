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
use Webmis\Models\Organisation;
use Webmis\Models\Quotingbyspeciality;
use Webmis\Models\QuotingbyspecialityPeer;
use Webmis\Models\QuotingbyspecialityQuery;
use Webmis\Models\Rbspeciality;

/**
 * Base class that represents a query for the 'QuotingBySpeciality' table.
 *
 *
 *
 * @method QuotingbyspecialityQuery orderById($order = Criteria::ASC) Order by the id column
 * @method QuotingbyspecialityQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method QuotingbyspecialityQuery orderByOrganisationId($order = Criteria::ASC) Order by the organisation_id column
 * @method QuotingbyspecialityQuery orderByCouponsQuote($order = Criteria::ASC) Order by the coupons_quote column
 * @method QuotingbyspecialityQuery orderByCouponsRemaining($order = Criteria::ASC) Order by the coupons_remaining column
 *
 * @method QuotingbyspecialityQuery groupById() Group by the id column
 * @method QuotingbyspecialityQuery groupBySpecialityId() Group by the speciality_id column
 * @method QuotingbyspecialityQuery groupByOrganisationId() Group by the organisation_id column
 * @method QuotingbyspecialityQuery groupByCouponsQuote() Group by the coupons_quote column
 * @method QuotingbyspecialityQuery groupByCouponsRemaining() Group by the coupons_remaining column
 *
 * @method QuotingbyspecialityQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method QuotingbyspecialityQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method QuotingbyspecialityQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method QuotingbyspecialityQuery leftJoinRbspeciality($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbspeciality relation
 * @method QuotingbyspecialityQuery rightJoinRbspeciality($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbspeciality relation
 * @method QuotingbyspecialityQuery innerJoinRbspeciality($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbspeciality relation
 *
 * @method QuotingbyspecialityQuery leftJoinOrganisation($relationAlias = null) Adds a LEFT JOIN clause to the query using the Organisation relation
 * @method QuotingbyspecialityQuery rightJoinOrganisation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Organisation relation
 * @method QuotingbyspecialityQuery innerJoinOrganisation($relationAlias = null) Adds a INNER JOIN clause to the query using the Organisation relation
 *
 * @method Quotingbyspeciality findOne(PropelPDO $con = null) Return the first Quotingbyspeciality matching the query
 * @method Quotingbyspeciality findOneOrCreate(PropelPDO $con = null) Return the first Quotingbyspeciality matching the query, or a new Quotingbyspeciality object populated from the query conditions when no match is found
 *
 * @method Quotingbyspeciality findOneBySpecialityId(int $speciality_id) Return the first Quotingbyspeciality filtered by the speciality_id column
 * @method Quotingbyspeciality findOneByOrganisationId(int $organisation_id) Return the first Quotingbyspeciality filtered by the organisation_id column
 * @method Quotingbyspeciality findOneByCouponsQuote(int $coupons_quote) Return the first Quotingbyspeciality filtered by the coupons_quote column
 * @method Quotingbyspeciality findOneByCouponsRemaining(int $coupons_remaining) Return the first Quotingbyspeciality filtered by the coupons_remaining column
 *
 * @method array findById(int $id) Return Quotingbyspeciality objects filtered by the id column
 * @method array findBySpecialityId(int $speciality_id) Return Quotingbyspeciality objects filtered by the speciality_id column
 * @method array findByOrganisationId(int $organisation_id) Return Quotingbyspeciality objects filtered by the organisation_id column
 * @method array findByCouponsQuote(int $coupons_quote) Return Quotingbyspeciality objects filtered by the coupons_quote column
 * @method array findByCouponsRemaining(int $coupons_remaining) Return Quotingbyspeciality objects filtered by the coupons_remaining column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseQuotingbyspecialityQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseQuotingbyspecialityQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Quotingbyspeciality', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new QuotingbyspecialityQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   QuotingbyspecialityQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return QuotingbyspecialityQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof QuotingbyspecialityQuery) {
            return $criteria;
        }
        $query = new QuotingbyspecialityQuery();
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
     * @return   Quotingbyspeciality|Quotingbyspeciality[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = QuotingbyspecialityPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(QuotingbyspecialityPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Quotingbyspeciality A model object, or null if the key is not found
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
     * @return                 Quotingbyspeciality A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `speciality_id`, `organisation_id`, `coupons_quote`, `coupons_remaining` FROM `QuotingBySpeciality` WHERE `id` = :p0';
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
            $obj = new Quotingbyspeciality();
            $obj->hydrate($row);
            QuotingbyspecialityPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Quotingbyspeciality|Quotingbyspeciality[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Quotingbyspeciality[]|mixed the list of results, formatted by the current formatter
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
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(QuotingbyspecialityPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(QuotingbyspecialityPeer::ID, $keys, Criteria::IN);
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
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbyspecialityPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the speciality_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecialityId(1234); // WHERE speciality_id = 1234
     * $query->filterBySpecialityId(array(12, 34)); // WHERE speciality_id IN (12, 34)
     * $query->filterBySpecialityId(array('min' => 12)); // WHERE speciality_id >= 12
     * $query->filterBySpecialityId(array('max' => 12)); // WHERE speciality_id <= 12
     * </code>
     *
     * @see       filterByRbspeciality()
     *
     * @param     mixed $specialityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbyspecialityPeer::SPECIALITY_ID, $specialityId, $comparison);
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
     * @see       filterByOrganisation()
     *
     * @param     mixed $organisationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterByOrganisationId($organisationId = null, $comparison = null)
    {
        if (is_array($organisationId)) {
            $useMinMax = false;
            if (isset($organisationId['min'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::ORGANISATION_ID, $organisationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organisationId['max'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::ORGANISATION_ID, $organisationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbyspecialityPeer::ORGANISATION_ID, $organisationId, $comparison);
    }

    /**
     * Filter the query on the coupons_quote column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponsQuote(1234); // WHERE coupons_quote = 1234
     * $query->filterByCouponsQuote(array(12, 34)); // WHERE coupons_quote IN (12, 34)
     * $query->filterByCouponsQuote(array('min' => 12)); // WHERE coupons_quote >= 12
     * $query->filterByCouponsQuote(array('max' => 12)); // WHERE coupons_quote <= 12
     * </code>
     *
     * @param     mixed $couponsQuote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterByCouponsQuote($couponsQuote = null, $comparison = null)
    {
        if (is_array($couponsQuote)) {
            $useMinMax = false;
            if (isset($couponsQuote['min'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::COUPONS_QUOTE, $couponsQuote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponsQuote['max'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::COUPONS_QUOTE, $couponsQuote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbyspecialityPeer::COUPONS_QUOTE, $couponsQuote, $comparison);
    }

    /**
     * Filter the query on the coupons_remaining column
     *
     * Example usage:
     * <code>
     * $query->filterByCouponsRemaining(1234); // WHERE coupons_remaining = 1234
     * $query->filterByCouponsRemaining(array(12, 34)); // WHERE coupons_remaining IN (12, 34)
     * $query->filterByCouponsRemaining(array('min' => 12)); // WHERE coupons_remaining >= 12
     * $query->filterByCouponsRemaining(array('max' => 12)); // WHERE coupons_remaining <= 12
     * </code>
     *
     * @param     mixed $couponsRemaining The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function filterByCouponsRemaining($couponsRemaining = null, $comparison = null)
    {
        if (is_array($couponsRemaining)) {
            $useMinMax = false;
            if (isset($couponsRemaining['min'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::COUPONS_REMAINING, $couponsRemaining['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($couponsRemaining['max'])) {
                $this->addUsingAlias(QuotingbyspecialityPeer::COUPONS_REMAINING, $couponsRemaining['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuotingbyspecialityPeer::COUPONS_REMAINING, $couponsRemaining, $comparison);
    }

    /**
     * Filter the query by a related Rbspeciality object
     *
     * @param   Rbspeciality|PropelObjectCollection $rbspeciality The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuotingbyspecialityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbspeciality($rbspeciality, $comparison = null)
    {
        if ($rbspeciality instanceof Rbspeciality) {
            return $this
                ->addUsingAlias(QuotingbyspecialityPeer::SPECIALITY_ID, $rbspeciality->getId(), $comparison);
        } elseif ($rbspeciality instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuotingbyspecialityPeer::SPECIALITY_ID, $rbspeciality->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbspeciality() only accepts arguments of type Rbspeciality or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbspeciality relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function joinRbspeciality($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbspeciality');

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
            $this->addJoinObject($join, 'Rbspeciality');
        }

        return $this;
    }

    /**
     * Use the Rbspeciality relation Rbspeciality object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbspecialityQuery A secondary query class using the current class as primary query
     */
    public function useRbspecialityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbspeciality($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbspeciality', '\Webmis\Models\RbspecialityQuery');
    }

    /**
     * Filter the query by a related Organisation object
     *
     * @param   Organisation|PropelObjectCollection $organisation The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 QuotingbyspecialityQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOrganisation($organisation, $comparison = null)
    {
        if ($organisation instanceof Organisation) {
            return $this
                ->addUsingAlias(QuotingbyspecialityPeer::ORGANISATION_ID, $organisation->getId(), $comparison);
        } elseif ($organisation instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuotingbyspecialityPeer::ORGANISATION_ID, $organisation->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByOrganisation() only accepts arguments of type Organisation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Organisation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function joinOrganisation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Organisation');

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
            $this->addJoinObject($join, 'Organisation');
        }

        return $this;
    }

    /**
     * Use the Organisation relation Organisation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\OrganisationQuery A secondary query class using the current class as primary query
     */
    public function useOrganisationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrganisation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Organisation', '\Webmis\Models\OrganisationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Quotingbyspeciality $quotingbyspeciality Object to remove from the list of results
     *
     * @return QuotingbyspecialityQuery The current query, for fluid interface
     */
    public function prune($quotingbyspeciality = null)
    {
        if ($quotingbyspeciality) {
            $this->addUsingAlias(QuotingbyspecialityPeer::ID, $quotingbyspeciality->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
