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
use Webmis\Models\Eventtype;
use Webmis\Models\Medicalkindunit;
use Webmis\Models\MedicalkindunitPeer;
use Webmis\Models\MedicalkindunitQuery;
use Webmis\Models\Rbmedicalaidunit;
use Webmis\Models\Rbmedicalkind;
use Webmis\Models\Rbpaytype;
use Webmis\Models\Rbtarifftype;

/**
 * Base class that represents a query for the 'MedicalKindUnit' table.
 *
 *
 *
 * @method MedicalkindunitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MedicalkindunitQuery orderByRbmedicalkindId($order = Criteria::ASC) Order by the rbMedicalKind_id column
 * @method MedicalkindunitQuery orderByEventtypeId($order = Criteria::ASC) Order by the eventType_id column
 * @method MedicalkindunitQuery orderByRbmedicalaidunitId($order = Criteria::ASC) Order by the rbMedicalAidUnit_id column
 * @method MedicalkindunitQuery orderByRbpaytypeId($order = Criteria::ASC) Order by the rbPayType_id column
 * @method MedicalkindunitQuery orderByRbtarifftypeId($order = Criteria::ASC) Order by the rbTariffType_id column
 *
 * @method MedicalkindunitQuery groupById() Group by the id column
 * @method MedicalkindunitQuery groupByRbmedicalkindId() Group by the rbMedicalKind_id column
 * @method MedicalkindunitQuery groupByEventtypeId() Group by the eventType_id column
 * @method MedicalkindunitQuery groupByRbmedicalaidunitId() Group by the rbMedicalAidUnit_id column
 * @method MedicalkindunitQuery groupByRbpaytypeId() Group by the rbPayType_id column
 * @method MedicalkindunitQuery groupByRbtarifftypeId() Group by the rbTariffType_id column
 *
 * @method MedicalkindunitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MedicalkindunitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MedicalkindunitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MedicalkindunitQuery leftJoinRbmedicalkind($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmedicalkind relation
 * @method MedicalkindunitQuery rightJoinRbmedicalkind($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmedicalkind relation
 * @method MedicalkindunitQuery innerJoinRbmedicalkind($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmedicalkind relation
 *
 * @method MedicalkindunitQuery leftJoinEventtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Eventtype relation
 * @method MedicalkindunitQuery rightJoinEventtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Eventtype relation
 * @method MedicalkindunitQuery innerJoinEventtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Eventtype relation
 *
 * @method MedicalkindunitQuery leftJoinRbmedicalaidunit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmedicalaidunit relation
 * @method MedicalkindunitQuery rightJoinRbmedicalaidunit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmedicalaidunit relation
 * @method MedicalkindunitQuery innerJoinRbmedicalaidunit($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmedicalaidunit relation
 *
 * @method MedicalkindunitQuery leftJoinRbpaytype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbpaytype relation
 * @method MedicalkindunitQuery rightJoinRbpaytype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbpaytype relation
 * @method MedicalkindunitQuery innerJoinRbpaytype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbpaytype relation
 *
 * @method MedicalkindunitQuery leftJoinRbtarifftype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtarifftype relation
 * @method MedicalkindunitQuery rightJoinRbtarifftype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtarifftype relation
 * @method MedicalkindunitQuery innerJoinRbtarifftype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtarifftype relation
 *
 * @method Medicalkindunit findOne(PropelPDO $con = null) Return the first Medicalkindunit matching the query
 * @method Medicalkindunit findOneOrCreate(PropelPDO $con = null) Return the first Medicalkindunit matching the query, or a new Medicalkindunit object populated from the query conditions when no match is found
 *
 * @method Medicalkindunit findOneByRbmedicalkindId(int $rbMedicalKind_id) Return the first Medicalkindunit filtered by the rbMedicalKind_id column
 * @method Medicalkindunit findOneByEventtypeId(int $eventType_id) Return the first Medicalkindunit filtered by the eventType_id column
 * @method Medicalkindunit findOneByRbmedicalaidunitId(int $rbMedicalAidUnit_id) Return the first Medicalkindunit filtered by the rbMedicalAidUnit_id column
 * @method Medicalkindunit findOneByRbpaytypeId(int $rbPayType_id) Return the first Medicalkindunit filtered by the rbPayType_id column
 * @method Medicalkindunit findOneByRbtarifftypeId(int $rbTariffType_id) Return the first Medicalkindunit filtered by the rbTariffType_id column
 *
 * @method array findById(int $id) Return Medicalkindunit objects filtered by the id column
 * @method array findByRbmedicalkindId(int $rbMedicalKind_id) Return Medicalkindunit objects filtered by the rbMedicalKind_id column
 * @method array findByEventtypeId(int $eventType_id) Return Medicalkindunit objects filtered by the eventType_id column
 * @method array findByRbmedicalaidunitId(int $rbMedicalAidUnit_id) Return Medicalkindunit objects filtered by the rbMedicalAidUnit_id column
 * @method array findByRbpaytypeId(int $rbPayType_id) Return Medicalkindunit objects filtered by the rbPayType_id column
 * @method array findByRbtarifftypeId(int $rbTariffType_id) Return Medicalkindunit objects filtered by the rbTariffType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseMedicalkindunitQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMedicalkindunitQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Medicalkindunit', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MedicalkindunitQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MedicalkindunitQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MedicalkindunitQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MedicalkindunitQuery) {
            return $criteria;
        }
        $query = new MedicalkindunitQuery();
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
     * @return   Medicalkindunit|Medicalkindunit[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MedicalkindunitPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MedicalkindunitPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Medicalkindunit A model object, or null if the key is not found
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
     * @return                 Medicalkindunit A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `rbMedicalKind_id`, `eventType_id`, `rbMedicalAidUnit_id`, `rbPayType_id`, `rbTariffType_id` FROM `MedicalKindUnit` WHERE `id` = :p0';
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
            $obj = new Medicalkindunit();
            $obj->hydrate($row);
            MedicalkindunitPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Medicalkindunit|Medicalkindunit[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Medicalkindunit[]|mixed the list of results, formatted by the current formatter
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
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MedicalkindunitPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MedicalkindunitPeer::ID, $keys, Criteria::IN);
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
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MedicalkindunitPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MedicalkindunitPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalkindunitPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the rbMedicalKind_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbmedicalkindId(1234); // WHERE rbMedicalKind_id = 1234
     * $query->filterByRbmedicalkindId(array(12, 34)); // WHERE rbMedicalKind_id IN (12, 34)
     * $query->filterByRbmedicalkindId(array('min' => 12)); // WHERE rbMedicalKind_id >= 12
     * $query->filterByRbmedicalkindId(array('max' => 12)); // WHERE rbMedicalKind_id <= 12
     * </code>
     *
     * @see       filterByRbmedicalkind()
     *
     * @param     mixed $rbmedicalkindId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByRbmedicalkindId($rbmedicalkindId = null, $comparison = null)
    {
        if (is_array($rbmedicalkindId)) {
            $useMinMax = false;
            if (isset($rbmedicalkindId['min'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBMEDICALKIND_ID, $rbmedicalkindId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbmedicalkindId['max'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBMEDICALKIND_ID, $rbmedicalkindId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalkindunitPeer::RBMEDICALKIND_ID, $rbmedicalkindId, $comparison);
    }

    /**
     * Filter the query on the eventType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventtypeId(1234); // WHERE eventType_id = 1234
     * $query->filterByEventtypeId(array(12, 34)); // WHERE eventType_id IN (12, 34)
     * $query->filterByEventtypeId(array('min' => 12)); // WHERE eventType_id >= 12
     * $query->filterByEventtypeId(array('max' => 12)); // WHERE eventType_id <= 12
     * </code>
     *
     * @see       filterByEventtype()
     *
     * @param     mixed $eventtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByEventtypeId($eventtypeId = null, $comparison = null)
    {
        if (is_array($eventtypeId)) {
            $useMinMax = false;
            if (isset($eventtypeId['min'])) {
                $this->addUsingAlias(MedicalkindunitPeer::EVENTTYPE_ID, $eventtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventtypeId['max'])) {
                $this->addUsingAlias(MedicalkindunitPeer::EVENTTYPE_ID, $eventtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalkindunitPeer::EVENTTYPE_ID, $eventtypeId, $comparison);
    }

    /**
     * Filter the query on the rbMedicalAidUnit_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbmedicalaidunitId(1234); // WHERE rbMedicalAidUnit_id = 1234
     * $query->filterByRbmedicalaidunitId(array(12, 34)); // WHERE rbMedicalAidUnit_id IN (12, 34)
     * $query->filterByRbmedicalaidunitId(array('min' => 12)); // WHERE rbMedicalAidUnit_id >= 12
     * $query->filterByRbmedicalaidunitId(array('max' => 12)); // WHERE rbMedicalAidUnit_id <= 12
     * </code>
     *
     * @see       filterByRbmedicalaidunit()
     *
     * @param     mixed $rbmedicalaidunitId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByRbmedicalaidunitId($rbmedicalaidunitId = null, $comparison = null)
    {
        if (is_array($rbmedicalaidunitId)) {
            $useMinMax = false;
            if (isset($rbmedicalaidunitId['min'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, $rbmedicalaidunitId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbmedicalaidunitId['max'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, $rbmedicalaidunitId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, $rbmedicalaidunitId, $comparison);
    }

    /**
     * Filter the query on the rbPayType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbpaytypeId(1234); // WHERE rbPayType_id = 1234
     * $query->filterByRbpaytypeId(array(12, 34)); // WHERE rbPayType_id IN (12, 34)
     * $query->filterByRbpaytypeId(array('min' => 12)); // WHERE rbPayType_id >= 12
     * $query->filterByRbpaytypeId(array('max' => 12)); // WHERE rbPayType_id <= 12
     * </code>
     *
     * @see       filterByRbpaytype()
     *
     * @param     mixed $rbpaytypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByRbpaytypeId($rbpaytypeId = null, $comparison = null)
    {
        if (is_array($rbpaytypeId)) {
            $useMinMax = false;
            if (isset($rbpaytypeId['min'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBPAYTYPE_ID, $rbpaytypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbpaytypeId['max'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBPAYTYPE_ID, $rbpaytypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalkindunitPeer::RBPAYTYPE_ID, $rbpaytypeId, $comparison);
    }

    /**
     * Filter the query on the rbTariffType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbtarifftypeId(1234); // WHERE rbTariffType_id = 1234
     * $query->filterByRbtarifftypeId(array(12, 34)); // WHERE rbTariffType_id IN (12, 34)
     * $query->filterByRbtarifftypeId(array('min' => 12)); // WHERE rbTariffType_id >= 12
     * $query->filterByRbtarifftypeId(array('max' => 12)); // WHERE rbTariffType_id <= 12
     * </code>
     *
     * @see       filterByRbtarifftype()
     *
     * @param     mixed $rbtarifftypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function filterByRbtarifftypeId($rbtarifftypeId = null, $comparison = null)
    {
        if (is_array($rbtarifftypeId)) {
            $useMinMax = false;
            if (isset($rbtarifftypeId['min'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBTARIFFTYPE_ID, $rbtarifftypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbtarifftypeId['max'])) {
                $this->addUsingAlias(MedicalkindunitPeer::RBTARIFFTYPE_ID, $rbtarifftypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MedicalkindunitPeer::RBTARIFFTYPE_ID, $rbtarifftypeId, $comparison);
    }

    /**
     * Filter the query by a related Rbmedicalkind object
     *
     * @param   Rbmedicalkind|PropelObjectCollection $rbmedicalkind The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MedicalkindunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmedicalkind($rbmedicalkind, $comparison = null)
    {
        if ($rbmedicalkind instanceof Rbmedicalkind) {
            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBMEDICALKIND_ID, $rbmedicalkind->getId(), $comparison);
        } elseif ($rbmedicalkind instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBMEDICALKIND_ID, $rbmedicalkind->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbmedicalkind() only accepts arguments of type Rbmedicalkind or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbmedicalkind relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function joinRbmedicalkind($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbmedicalkind');

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
            $this->addJoinObject($join, 'Rbmedicalkind');
        }

        return $this;
    }

    /**
     * Use the Rbmedicalkind relation Rbmedicalkind object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbmedicalkindQuery A secondary query class using the current class as primary query
     */
    public function useRbmedicalkindQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbmedicalkind($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbmedicalkind', '\Webmis\Models\RbmedicalkindQuery');
    }

    /**
     * Filter the query by a related Eventtype object
     *
     * @param   Eventtype|PropelObjectCollection $eventtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MedicalkindunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByEventtype($eventtype, $comparison = null)
    {
        if ($eventtype instanceof Eventtype) {
            return $this
                ->addUsingAlias(MedicalkindunitPeer::EVENTTYPE_ID, $eventtype->getId(), $comparison);
        } elseif ($eventtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MedicalkindunitPeer::EVENTTYPE_ID, $eventtype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEventtype() only accepts arguments of type Eventtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Eventtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function joinEventtype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Eventtype');

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
            $this->addJoinObject($join, 'Eventtype');
        }

        return $this;
    }

    /**
     * Use the Eventtype relation Eventtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\EventtypeQuery A secondary query class using the current class as primary query
     */
    public function useEventtypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEventtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Eventtype', '\Webmis\Models\EventtypeQuery');
    }

    /**
     * Filter the query by a related Rbmedicalaidunit object
     *
     * @param   Rbmedicalaidunit|PropelObjectCollection $rbmedicalaidunit The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MedicalkindunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmedicalaidunit($rbmedicalaidunit, $comparison = null)
    {
        if ($rbmedicalaidunit instanceof Rbmedicalaidunit) {
            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, $rbmedicalaidunit->getId(), $comparison);
        } elseif ($rbmedicalaidunit instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBMEDICALAIDUNIT_ID, $rbmedicalaidunit->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbmedicalaidunit() only accepts arguments of type Rbmedicalaidunit or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbmedicalaidunit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function joinRbmedicalaidunit($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbmedicalaidunit');

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
            $this->addJoinObject($join, 'Rbmedicalaidunit');
        }

        return $this;
    }

    /**
     * Use the Rbmedicalaidunit relation Rbmedicalaidunit object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbmedicalaidunitQuery A secondary query class using the current class as primary query
     */
    public function useRbmedicalaidunitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbmedicalaidunit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbmedicalaidunit', '\Webmis\Models\RbmedicalaidunitQuery');
    }

    /**
     * Filter the query by a related Rbpaytype object
     *
     * @param   Rbpaytype|PropelObjectCollection $rbpaytype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MedicalkindunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbpaytype($rbpaytype, $comparison = null)
    {
        if ($rbpaytype instanceof Rbpaytype) {
            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBPAYTYPE_ID, $rbpaytype->getId(), $comparison);
        } elseif ($rbpaytype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBPAYTYPE_ID, $rbpaytype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbpaytype() only accepts arguments of type Rbpaytype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbpaytype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function joinRbpaytype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbpaytype');

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
            $this->addJoinObject($join, 'Rbpaytype');
        }

        return $this;
    }

    /**
     * Use the Rbpaytype relation Rbpaytype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbpaytypeQuery A secondary query class using the current class as primary query
     */
    public function useRbpaytypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbpaytype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbpaytype', '\Webmis\Models\RbpaytypeQuery');
    }

    /**
     * Filter the query by a related Rbtarifftype object
     *
     * @param   Rbtarifftype|PropelObjectCollection $rbtarifftype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MedicalkindunitQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtarifftype($rbtarifftype, $comparison = null)
    {
        if ($rbtarifftype instanceof Rbtarifftype) {
            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBTARIFFTYPE_ID, $rbtarifftype->getId(), $comparison);
        } elseif ($rbtarifftype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MedicalkindunitPeer::RBTARIFFTYPE_ID, $rbtarifftype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtarifftype() only accepts arguments of type Rbtarifftype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtarifftype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function joinRbtarifftype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtarifftype');

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
            $this->addJoinObject($join, 'Rbtarifftype');
        }

        return $this;
    }

    /**
     * Use the Rbtarifftype relation Rbtarifftype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtarifftypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtarifftypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbtarifftype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtarifftype', '\Webmis\Models\RbtarifftypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Medicalkindunit $medicalkindunit Object to remove from the list of results
     *
     * @return MedicalkindunitQuery The current query, for fluid interface
     */
    public function prune($medicalkindunit = null)
    {
        if ($medicalkindunit) {
            $this->addUsingAlias(MedicalkindunitPeer::ID, $medicalkindunit->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
