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
use Webmis\Models\Rbtempinvalidreason;
use Webmis\Models\RbtempinvalidreasonPeer;
use Webmis\Models\RbtempinvalidreasonQuery;

/**
 * Base class that represents a query for the 'rbTempInvalidReason' table.
 *
 *
 *
 * @method RbtempinvalidreasonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbtempinvalidreasonQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method RbtempinvalidreasonQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbtempinvalidreasonQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbtempinvalidreasonQuery orderByRequireddiagnosis($order = Criteria::ASC) Order by the requiredDiagnosis column
 * @method RbtempinvalidreasonQuery orderByGrouping($order = Criteria::ASC) Order by the grouping column
 * @method RbtempinvalidreasonQuery orderByPrimary($order = Criteria::ASC) Order by the primary column
 * @method RbtempinvalidreasonQuery orderByProlongate($order = Criteria::ASC) Order by the prolongate column
 * @method RbtempinvalidreasonQuery orderByRestriction($order = Criteria::ASC) Order by the restriction column
 * @method RbtempinvalidreasonQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 *
 * @method RbtempinvalidreasonQuery groupById() Group by the id column
 * @method RbtempinvalidreasonQuery groupByType() Group by the type column
 * @method RbtempinvalidreasonQuery groupByCode() Group by the code column
 * @method RbtempinvalidreasonQuery groupByName() Group by the name column
 * @method RbtempinvalidreasonQuery groupByRequireddiagnosis() Group by the requiredDiagnosis column
 * @method RbtempinvalidreasonQuery groupByGrouping() Group by the grouping column
 * @method RbtempinvalidreasonQuery groupByPrimary() Group by the primary column
 * @method RbtempinvalidreasonQuery groupByProlongate() Group by the prolongate column
 * @method RbtempinvalidreasonQuery groupByRestriction() Group by the restriction column
 * @method RbtempinvalidreasonQuery groupByRegionalcode() Group by the regionalCode column
 *
 * @method RbtempinvalidreasonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbtempinvalidreasonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbtempinvalidreasonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbtempinvalidreason findOne(PropelPDO $con = null) Return the first Rbtempinvalidreason matching the query
 * @method Rbtempinvalidreason findOneOrCreate(PropelPDO $con = null) Return the first Rbtempinvalidreason matching the query, or a new Rbtempinvalidreason object populated from the query conditions when no match is found
 *
 * @method Rbtempinvalidreason findOneByType(int $type) Return the first Rbtempinvalidreason filtered by the type column
 * @method Rbtempinvalidreason findOneByCode(string $code) Return the first Rbtempinvalidreason filtered by the code column
 * @method Rbtempinvalidreason findOneByName(string $name) Return the first Rbtempinvalidreason filtered by the name column
 * @method Rbtempinvalidreason findOneByRequireddiagnosis(boolean $requiredDiagnosis) Return the first Rbtempinvalidreason filtered by the requiredDiagnosis column
 * @method Rbtempinvalidreason findOneByGrouping(boolean $grouping) Return the first Rbtempinvalidreason filtered by the grouping column
 * @method Rbtempinvalidreason findOneByPrimary(int $primary) Return the first Rbtempinvalidreason filtered by the primary column
 * @method Rbtempinvalidreason findOneByProlongate(int $prolongate) Return the first Rbtempinvalidreason filtered by the prolongate column
 * @method Rbtempinvalidreason findOneByRestriction(int $restriction) Return the first Rbtempinvalidreason filtered by the restriction column
 * @method Rbtempinvalidreason findOneByRegionalcode(string $regionalCode) Return the first Rbtempinvalidreason filtered by the regionalCode column
 *
 * @method array findById(int $id) Return Rbtempinvalidreason objects filtered by the id column
 * @method array findByType(int $type) Return Rbtempinvalidreason objects filtered by the type column
 * @method array findByCode(string $code) Return Rbtempinvalidreason objects filtered by the code column
 * @method array findByName(string $name) Return Rbtempinvalidreason objects filtered by the name column
 * @method array findByRequireddiagnosis(boolean $requiredDiagnosis) Return Rbtempinvalidreason objects filtered by the requiredDiagnosis column
 * @method array findByGrouping(boolean $grouping) Return Rbtempinvalidreason objects filtered by the grouping column
 * @method array findByPrimary(int $primary) Return Rbtempinvalidreason objects filtered by the primary column
 * @method array findByProlongate(int $prolongate) Return Rbtempinvalidreason objects filtered by the prolongate column
 * @method array findByRestriction(int $restriction) Return Rbtempinvalidreason objects filtered by the restriction column
 * @method array findByRegionalcode(string $regionalCode) Return Rbtempinvalidreason objects filtered by the regionalCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbtempinvalidreasonQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbtempinvalidreasonQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbtempinvalidreason', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbtempinvalidreasonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbtempinvalidreasonQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbtempinvalidreasonQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbtempinvalidreasonQuery) {
            return $criteria;
        }
        $query = new RbtempinvalidreasonQuery();
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
     * @return   Rbtempinvalidreason|Rbtempinvalidreason[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbtempinvalidreasonPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbtempinvalidreasonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbtempinvalidreason A model object, or null if the key is not found
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
     * @return                 Rbtempinvalidreason A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `type`, `code`, `name`, `requiredDiagnosis`, `grouping`, `primary`, `prolongate`, `restriction`, `regionalCode` FROM `rbTempInvalidReason` WHERE `id` = :p0';
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
            $obj = new Rbtempinvalidreason();
            $obj->hydrate($row);
            RbtempinvalidreasonPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbtempinvalidreason|Rbtempinvalidreason[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbtempinvalidreason[]|mixed the list of results, formatted by the current formatter
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
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbtempinvalidreasonPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbtempinvalidreasonPeer::ID, $keys, Criteria::IN);
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
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType(1234); // WHERE type = 1234
     * $query->filterByType(array(12, 34)); // WHERE type IN (12, 34)
     * $query->filterByType(array('min' => 12)); // WHERE type >= 12
     * $query->filterByType(array('max' => 12)); // WHERE type <= 12
     * </code>
     *
     * @param     mixed $type The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_array($type)) {
            $useMinMax = false;
            if (isset($type['min'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($type['max'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::CODE, $code, $comparison);
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
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbtempinvalidreasonPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the requiredDiagnosis column
     *
     * Example usage:
     * <code>
     * $query->filterByRequireddiagnosis(true); // WHERE requiredDiagnosis = true
     * $query->filterByRequireddiagnosis('yes'); // WHERE requiredDiagnosis = true
     * </code>
     *
     * @param     boolean|string $requireddiagnosis The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByRequireddiagnosis($requireddiagnosis = null, $comparison = null)
    {
        if (is_string($requireddiagnosis)) {
            $requireddiagnosis = in_array(strtolower($requireddiagnosis), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::REQUIREDDIAGNOSIS, $requireddiagnosis, $comparison);
    }

    /**
     * Filter the query on the grouping column
     *
     * Example usage:
     * <code>
     * $query->filterByGrouping(true); // WHERE grouping = true
     * $query->filterByGrouping('yes'); // WHERE grouping = true
     * </code>
     *
     * @param     boolean|string $grouping The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByGrouping($grouping = null, $comparison = null)
    {
        if (is_string($grouping)) {
            $grouping = in_array(strtolower($grouping), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::GROUPING, $grouping, $comparison);
    }

    /**
     * Filter the query on the primary column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimary(1234); // WHERE primary = 1234
     * $query->filterByPrimary(array(12, 34)); // WHERE primary IN (12, 34)
     * $query->filterByPrimary(array('min' => 12)); // WHERE primary >= 12
     * $query->filterByPrimary(array('max' => 12)); // WHERE primary <= 12
     * </code>
     *
     * @param     mixed $primary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByPrimary($primary = null, $comparison = null)
    {
        if (is_array($primary)) {
            $useMinMax = false;
            if (isset($primary['min'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::PRIMARY, $primary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($primary['max'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::PRIMARY, $primary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::PRIMARY, $primary, $comparison);
    }

    /**
     * Filter the query on the prolongate column
     *
     * Example usage:
     * <code>
     * $query->filterByProlongate(1234); // WHERE prolongate = 1234
     * $query->filterByProlongate(array(12, 34)); // WHERE prolongate IN (12, 34)
     * $query->filterByProlongate(array('min' => 12)); // WHERE prolongate >= 12
     * $query->filterByProlongate(array('max' => 12)); // WHERE prolongate <= 12
     * </code>
     *
     * @param     mixed $prolongate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByProlongate($prolongate = null, $comparison = null)
    {
        if (is_array($prolongate)) {
            $useMinMax = false;
            if (isset($prolongate['min'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::PROLONGATE, $prolongate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prolongate['max'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::PROLONGATE, $prolongate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::PROLONGATE, $prolongate, $comparison);
    }

    /**
     * Filter the query on the restriction column
     *
     * Example usage:
     * <code>
     * $query->filterByRestriction(1234); // WHERE restriction = 1234
     * $query->filterByRestriction(array(12, 34)); // WHERE restriction IN (12, 34)
     * $query->filterByRestriction(array('min' => 12)); // WHERE restriction >= 12
     * $query->filterByRestriction(array('max' => 12)); // WHERE restriction <= 12
     * </code>
     *
     * @param     mixed $restriction The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByRestriction($restriction = null, $comparison = null)
    {
        if (is_array($restriction)) {
            $useMinMax = false;
            if (isset($restriction['min'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::RESTRICTION, $restriction['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restriction['max'])) {
                $this->addUsingAlias(RbtempinvalidreasonPeer::RESTRICTION, $restriction['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::RESTRICTION, $restriction, $comparison);
    }

    /**
     * Filter the query on the regionalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalcode('fooValue');   // WHERE regionalCode = 'fooValue'
     * $query->filterByRegionalcode('%fooValue%'); // WHERE regionalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function filterByRegionalcode($regionalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalcode)) {
                $regionalcode = str_replace('*', '%', $regionalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbtempinvalidreasonPeer::REGIONALCODE, $regionalcode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbtempinvalidreason $rbtempinvalidreason Object to remove from the list of results
     *
     * @return RbtempinvalidreasonQuery The current query, for fluid interface
     */
    public function prune($rbtempinvalidreason = null)
    {
        if ($rbtempinvalidreason) {
            $this->addUsingAlias(RbtempinvalidreasonPeer::ID, $rbtempinvalidreason->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
