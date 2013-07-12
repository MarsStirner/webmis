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
use Webmis\Models\Addressareaitem;
use Webmis\Models\AddressareaitemPeer;
use Webmis\Models\AddressareaitemQuery;

/**
 * Base class that represents a query for the 'AddressAreaItem' table.
 *
 *
 *
 * @method AddressareaitemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AddressareaitemQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method AddressareaitemQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method AddressareaitemQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method AddressareaitemQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method AddressareaitemQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method AddressareaitemQuery orderByLpuId($order = Criteria::ASC) Order by the LPU_id column
 * @method AddressareaitemQuery orderByStructId($order = Criteria::ASC) Order by the struct_id column
 * @method AddressareaitemQuery orderByHouseId($order = Criteria::ASC) Order by the house_id column
 * @method AddressareaitemQuery orderByFlatrange($order = Criteria::ASC) Order by the flatRange column
 * @method AddressareaitemQuery orderByBegflat($order = Criteria::ASC) Order by the begFlat column
 * @method AddressareaitemQuery orderByEndflat($order = Criteria::ASC) Order by the endFlat column
 * @method AddressareaitemQuery orderByBegdate($order = Criteria::ASC) Order by the begDate column
 * @method AddressareaitemQuery orderByEnddate($order = Criteria::ASC) Order by the endDate column
 *
 * @method AddressareaitemQuery groupById() Group by the id column
 * @method AddressareaitemQuery groupByCreatedatetime() Group by the createDatetime column
 * @method AddressareaitemQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method AddressareaitemQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method AddressareaitemQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method AddressareaitemQuery groupByDeleted() Group by the deleted column
 * @method AddressareaitemQuery groupByLpuId() Group by the LPU_id column
 * @method AddressareaitemQuery groupByStructId() Group by the struct_id column
 * @method AddressareaitemQuery groupByHouseId() Group by the house_id column
 * @method AddressareaitemQuery groupByFlatrange() Group by the flatRange column
 * @method AddressareaitemQuery groupByBegflat() Group by the begFlat column
 * @method AddressareaitemQuery groupByEndflat() Group by the endFlat column
 * @method AddressareaitemQuery groupByBegdate() Group by the begDate column
 * @method AddressareaitemQuery groupByEnddate() Group by the endDate column
 *
 * @method AddressareaitemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AddressareaitemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AddressareaitemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Addressareaitem findOne(PropelPDO $con = null) Return the first Addressareaitem matching the query
 * @method Addressareaitem findOneOrCreate(PropelPDO $con = null) Return the first Addressareaitem matching the query, or a new Addressareaitem object populated from the query conditions when no match is found
 *
 * @method Addressareaitem findOneByCreatedatetime(string $createDatetime) Return the first Addressareaitem filtered by the createDatetime column
 * @method Addressareaitem findOneByCreatepersonId(int $createPerson_id) Return the first Addressareaitem filtered by the createPerson_id column
 * @method Addressareaitem findOneByModifydatetime(string $modifyDatetime) Return the first Addressareaitem filtered by the modifyDatetime column
 * @method Addressareaitem findOneByModifypersonId(int $modifyPerson_id) Return the first Addressareaitem filtered by the modifyPerson_id column
 * @method Addressareaitem findOneByDeleted(boolean $deleted) Return the first Addressareaitem filtered by the deleted column
 * @method Addressareaitem findOneByLpuId(int $LPU_id) Return the first Addressareaitem filtered by the LPU_id column
 * @method Addressareaitem findOneByStructId(int $struct_id) Return the first Addressareaitem filtered by the struct_id column
 * @method Addressareaitem findOneByHouseId(int $house_id) Return the first Addressareaitem filtered by the house_id column
 * @method Addressareaitem findOneByFlatrange(int $flatRange) Return the first Addressareaitem filtered by the flatRange column
 * @method Addressareaitem findOneByBegflat(int $begFlat) Return the first Addressareaitem filtered by the begFlat column
 * @method Addressareaitem findOneByEndflat(int $endFlat) Return the first Addressareaitem filtered by the endFlat column
 * @method Addressareaitem findOneByBegdate(string $begDate) Return the first Addressareaitem filtered by the begDate column
 * @method Addressareaitem findOneByEnddate(string $endDate) Return the first Addressareaitem filtered by the endDate column
 *
 * @method array findById(int $id) Return Addressareaitem objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Addressareaitem objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Addressareaitem objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Addressareaitem objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Addressareaitem objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Addressareaitem objects filtered by the deleted column
 * @method array findByLpuId(int $LPU_id) Return Addressareaitem objects filtered by the LPU_id column
 * @method array findByStructId(int $struct_id) Return Addressareaitem objects filtered by the struct_id column
 * @method array findByHouseId(int $house_id) Return Addressareaitem objects filtered by the house_id column
 * @method array findByFlatrange(int $flatRange) Return Addressareaitem objects filtered by the flatRange column
 * @method array findByBegflat(int $begFlat) Return Addressareaitem objects filtered by the begFlat column
 * @method array findByEndflat(int $endFlat) Return Addressareaitem objects filtered by the endFlat column
 * @method array findByBegdate(string $begDate) Return Addressareaitem objects filtered by the begDate column
 * @method array findByEnddate(string $endDate) Return Addressareaitem objects filtered by the endDate column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseAddressareaitemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAddressareaitemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Addressareaitem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AddressareaitemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AddressareaitemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AddressareaitemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AddressareaitemQuery) {
            return $criteria;
        }
        $query = new AddressareaitemQuery();
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
     * @return   Addressareaitem|Addressareaitem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AddressareaitemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AddressareaitemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Addressareaitem A model object, or null if the key is not found
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
     * @return                 Addressareaitem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `LPU_id`, `struct_id`, `house_id`, `flatRange`, `begFlat`, `endFlat`, `begDate`, `endDate` FROM `AddressAreaItem` WHERE `id` = :p0';
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
            $obj = new Addressareaitem();
            $obj->hydrate($row);
            AddressareaitemPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Addressareaitem|Addressareaitem[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Addressareaitem[]|mixed the list of results, formatted by the current formatter
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AddressareaitemPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AddressareaitemPeer::ID, $keys, Criteria::IN);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::ID, $id, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AddressareaitemPeer::DELETED, $deleted, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByLpuId($lpuId = null, $comparison = null)
    {
        if (is_array($lpuId)) {
            $useMinMax = false;
            if (isset($lpuId['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::LPU_ID, $lpuId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lpuId['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::LPU_ID, $lpuId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::LPU_ID, $lpuId, $comparison);
    }

    /**
     * Filter the query on the struct_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStructId(1234); // WHERE struct_id = 1234
     * $query->filterByStructId(array(12, 34)); // WHERE struct_id IN (12, 34)
     * $query->filterByStructId(array('min' => 12)); // WHERE struct_id >= 12
     * $query->filterByStructId(array('max' => 12)); // WHERE struct_id <= 12
     * </code>
     *
     * @param     mixed $structId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByStructId($structId = null, $comparison = null)
    {
        if (is_array($structId)) {
            $useMinMax = false;
            if (isset($structId['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::STRUCT_ID, $structId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($structId['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::STRUCT_ID, $structId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::STRUCT_ID, $structId, $comparison);
    }

    /**
     * Filter the query on the house_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHouseId(1234); // WHERE house_id = 1234
     * $query->filterByHouseId(array(12, 34)); // WHERE house_id IN (12, 34)
     * $query->filterByHouseId(array('min' => 12)); // WHERE house_id >= 12
     * $query->filterByHouseId(array('max' => 12)); // WHERE house_id <= 12
     * </code>
     *
     * @param     mixed $houseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByHouseId($houseId = null, $comparison = null)
    {
        if (is_array($houseId)) {
            $useMinMax = false;
            if (isset($houseId['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::HOUSE_ID, $houseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($houseId['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::HOUSE_ID, $houseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::HOUSE_ID, $houseId, $comparison);
    }

    /**
     * Filter the query on the flatRange column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatrange(1234); // WHERE flatRange = 1234
     * $query->filterByFlatrange(array(12, 34)); // WHERE flatRange IN (12, 34)
     * $query->filterByFlatrange(array('min' => 12)); // WHERE flatRange >= 12
     * $query->filterByFlatrange(array('max' => 12)); // WHERE flatRange <= 12
     * </code>
     *
     * @param     mixed $flatrange The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByFlatrange($flatrange = null, $comparison = null)
    {
        if (is_array($flatrange)) {
            $useMinMax = false;
            if (isset($flatrange['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::FLATRANGE, $flatrange['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flatrange['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::FLATRANGE, $flatrange['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::FLATRANGE, $flatrange, $comparison);
    }

    /**
     * Filter the query on the begFlat column
     *
     * Example usage:
     * <code>
     * $query->filterByBegflat(1234); // WHERE begFlat = 1234
     * $query->filterByBegflat(array(12, 34)); // WHERE begFlat IN (12, 34)
     * $query->filterByBegflat(array('min' => 12)); // WHERE begFlat >= 12
     * $query->filterByBegflat(array('max' => 12)); // WHERE begFlat <= 12
     * </code>
     *
     * @param     mixed $begflat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByBegflat($begflat = null, $comparison = null)
    {
        if (is_array($begflat)) {
            $useMinMax = false;
            if (isset($begflat['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::BEGFLAT, $begflat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begflat['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::BEGFLAT, $begflat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::BEGFLAT, $begflat, $comparison);
    }

    /**
     * Filter the query on the endFlat column
     *
     * Example usage:
     * <code>
     * $query->filterByEndflat(1234); // WHERE endFlat = 1234
     * $query->filterByEndflat(array(12, 34)); // WHERE endFlat IN (12, 34)
     * $query->filterByEndflat(array('min' => 12)); // WHERE endFlat >= 12
     * $query->filterByEndflat(array('max' => 12)); // WHERE endFlat <= 12
     * </code>
     *
     * @param     mixed $endflat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByEndflat($endflat = null, $comparison = null)
    {
        if (is_array($endflat)) {
            $useMinMax = false;
            if (isset($endflat['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::ENDFLAT, $endflat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endflat['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::ENDFLAT, $endflat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::ENDFLAT, $endflat, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByBegdate($begdate = null, $comparison = null)
    {
        if (is_array($begdate)) {
            $useMinMax = false;
            if (isset($begdate['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::BEGDATE, $begdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($begdate['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::BEGDATE, $begdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::BEGDATE, $begdate, $comparison);
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
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function filterByEnddate($enddate = null, $comparison = null)
    {
        if (is_array($enddate)) {
            $useMinMax = false;
            if (isset($enddate['min'])) {
                $this->addUsingAlias(AddressareaitemPeer::ENDDATE, $enddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($enddate['max'])) {
                $this->addUsingAlias(AddressareaitemPeer::ENDDATE, $enddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressareaitemPeer::ENDDATE, $enddate, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Addressareaitem $addressareaitem Object to remove from the list of results
     *
     * @return AddressareaitemQuery The current query, for fluid interface
     */
    public function prune($addressareaitem = null)
    {
        if ($addressareaitem) {
            $this->addUsingAlias(AddressareaitemPeer::ID, $addressareaitem->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
