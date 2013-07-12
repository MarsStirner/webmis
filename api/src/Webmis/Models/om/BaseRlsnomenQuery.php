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
use Webmis\Models\Rlsnomen;
use Webmis\Models\RlsnomenPeer;
use Webmis\Models\RlsnomenQuery;

/**
 * Base class that represents a query for the 'rlsNomen' table.
 *
 *
 *
 * @method RlsnomenQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RlsnomenQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RlsnomenQuery orderByTradenameId($order = Criteria::ASC) Order by the tradeName_id column
 * @method RlsnomenQuery orderByInpnameId($order = Criteria::ASC) Order by the INPName_id column
 * @method RlsnomenQuery orderByFormId($order = Criteria::ASC) Order by the form_id column
 * @method RlsnomenQuery orderByDosageId($order = Criteria::ASC) Order by the dosage_id column
 * @method RlsnomenQuery orderByFillingId($order = Criteria::ASC) Order by the filling_id column
 * @method RlsnomenQuery orderByPackingId($order = Criteria::ASC) Order by the packing_id column
 * @method RlsnomenQuery orderByRegdate($order = Criteria::ASC) Order by the regDate column
 * @method RlsnomenQuery orderByAnndate($order = Criteria::ASC) Order by the annDate column
 * @method RlsnomenQuery orderByDisabledforprescription($order = Criteria::ASC) Order by the disabledForPrescription column
 *
 * @method RlsnomenQuery groupById() Group by the id column
 * @method RlsnomenQuery groupByCode() Group by the code column
 * @method RlsnomenQuery groupByTradenameId() Group by the tradeName_id column
 * @method RlsnomenQuery groupByInpnameId() Group by the INPName_id column
 * @method RlsnomenQuery groupByFormId() Group by the form_id column
 * @method RlsnomenQuery groupByDosageId() Group by the dosage_id column
 * @method RlsnomenQuery groupByFillingId() Group by the filling_id column
 * @method RlsnomenQuery groupByPackingId() Group by the packing_id column
 * @method RlsnomenQuery groupByRegdate() Group by the regDate column
 * @method RlsnomenQuery groupByAnndate() Group by the annDate column
 * @method RlsnomenQuery groupByDisabledforprescription() Group by the disabledForPrescription column
 *
 * @method RlsnomenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RlsnomenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RlsnomenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rlsnomen findOne(PropelPDO $con = null) Return the first Rlsnomen matching the query
 * @method Rlsnomen findOneOrCreate(PropelPDO $con = null) Return the first Rlsnomen matching the query, or a new Rlsnomen object populated from the query conditions when no match is found
 *
 * @method Rlsnomen findOneByCode(int $code) Return the first Rlsnomen filtered by the code column
 * @method Rlsnomen findOneByTradenameId(int $tradeName_id) Return the first Rlsnomen filtered by the tradeName_id column
 * @method Rlsnomen findOneByInpnameId(int $INPName_id) Return the first Rlsnomen filtered by the INPName_id column
 * @method Rlsnomen findOneByFormId(int $form_id) Return the first Rlsnomen filtered by the form_id column
 * @method Rlsnomen findOneByDosageId(int $dosage_id) Return the first Rlsnomen filtered by the dosage_id column
 * @method Rlsnomen findOneByFillingId(int $filling_id) Return the first Rlsnomen filtered by the filling_id column
 * @method Rlsnomen findOneByPackingId(int $packing_id) Return the first Rlsnomen filtered by the packing_id column
 * @method Rlsnomen findOneByRegdate(string $regDate) Return the first Rlsnomen filtered by the regDate column
 * @method Rlsnomen findOneByAnndate(string $annDate) Return the first Rlsnomen filtered by the annDate column
 * @method Rlsnomen findOneByDisabledforprescription(boolean $disabledForPrescription) Return the first Rlsnomen filtered by the disabledForPrescription column
 *
 * @method array findById(int $id) Return Rlsnomen objects filtered by the id column
 * @method array findByCode(int $code) Return Rlsnomen objects filtered by the code column
 * @method array findByTradenameId(int $tradeName_id) Return Rlsnomen objects filtered by the tradeName_id column
 * @method array findByInpnameId(int $INPName_id) Return Rlsnomen objects filtered by the INPName_id column
 * @method array findByFormId(int $form_id) Return Rlsnomen objects filtered by the form_id column
 * @method array findByDosageId(int $dosage_id) Return Rlsnomen objects filtered by the dosage_id column
 * @method array findByFillingId(int $filling_id) Return Rlsnomen objects filtered by the filling_id column
 * @method array findByPackingId(int $packing_id) Return Rlsnomen objects filtered by the packing_id column
 * @method array findByRegdate(string $regDate) Return Rlsnomen objects filtered by the regDate column
 * @method array findByAnndate(string $annDate) Return Rlsnomen objects filtered by the annDate column
 * @method array findByDisabledforprescription(boolean $disabledForPrescription) Return Rlsnomen objects filtered by the disabledForPrescription column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRlsnomenQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRlsnomenQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rlsnomen', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RlsnomenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RlsnomenQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RlsnomenQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RlsnomenQuery) {
            return $criteria;
        }
        $query = new RlsnomenQuery();
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
     * @return   Rlsnomen|Rlsnomen[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RlsnomenPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RlsnomenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rlsnomen A model object, or null if the key is not found
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
     * @return                 Rlsnomen A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `tradeName_id`, `INPName_id`, `form_id`, `dosage_id`, `filling_id`, `packing_id`, `regDate`, `annDate`, `disabledForPrescription` FROM `rlsNomen` WHERE `id` = :p0';
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
            $obj = new Rlsnomen();
            $obj->hydrate($row);
            RlsnomenPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rlsnomen|Rlsnomen[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rlsnomen[]|mixed the list of results, formatted by the current formatter
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
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RlsnomenPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RlsnomenPeer::ID, $keys, Criteria::IN);
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
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RlsnomenPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RlsnomenPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode(1234); // WHERE code = 1234
     * $query->filterByCode(array(12, 34)); // WHERE code IN (12, 34)
     * $query->filterByCode(array('min' => 12)); // WHERE code >= 12
     * $query->filterByCode(array('max' => 12)); // WHERE code <= 12
     * </code>
     *
     * @param     mixed $code The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (is_array($code)) {
            $useMinMax = false;
            if (isset($code['min'])) {
                $this->addUsingAlias(RlsnomenPeer::CODE, $code['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($code['max'])) {
                $this->addUsingAlias(RlsnomenPeer::CODE, $code['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the tradeName_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTradenameId(1234); // WHERE tradeName_id = 1234
     * $query->filterByTradenameId(array(12, 34)); // WHERE tradeName_id IN (12, 34)
     * $query->filterByTradenameId(array('min' => 12)); // WHERE tradeName_id >= 12
     * $query->filterByTradenameId(array('max' => 12)); // WHERE tradeName_id <= 12
     * </code>
     *
     * @param     mixed $tradenameId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByTradenameId($tradenameId = null, $comparison = null)
    {
        if (is_array($tradenameId)) {
            $useMinMax = false;
            if (isset($tradenameId['min'])) {
                $this->addUsingAlias(RlsnomenPeer::TRADENAME_ID, $tradenameId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tradenameId['max'])) {
                $this->addUsingAlias(RlsnomenPeer::TRADENAME_ID, $tradenameId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::TRADENAME_ID, $tradenameId, $comparison);
    }

    /**
     * Filter the query on the INPName_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInpnameId(1234); // WHERE INPName_id = 1234
     * $query->filterByInpnameId(array(12, 34)); // WHERE INPName_id IN (12, 34)
     * $query->filterByInpnameId(array('min' => 12)); // WHERE INPName_id >= 12
     * $query->filterByInpnameId(array('max' => 12)); // WHERE INPName_id <= 12
     * </code>
     *
     * @param     mixed $inpnameId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByInpnameId($inpnameId = null, $comparison = null)
    {
        if (is_array($inpnameId)) {
            $useMinMax = false;
            if (isset($inpnameId['min'])) {
                $this->addUsingAlias(RlsnomenPeer::INPNAME_ID, $inpnameId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($inpnameId['max'])) {
                $this->addUsingAlias(RlsnomenPeer::INPNAME_ID, $inpnameId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::INPNAME_ID, $inpnameId, $comparison);
    }

    /**
     * Filter the query on the form_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFormId(1234); // WHERE form_id = 1234
     * $query->filterByFormId(array(12, 34)); // WHERE form_id IN (12, 34)
     * $query->filterByFormId(array('min' => 12)); // WHERE form_id >= 12
     * $query->filterByFormId(array('max' => 12)); // WHERE form_id <= 12
     * </code>
     *
     * @param     mixed $formId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByFormId($formId = null, $comparison = null)
    {
        if (is_array($formId)) {
            $useMinMax = false;
            if (isset($formId['min'])) {
                $this->addUsingAlias(RlsnomenPeer::FORM_ID, $formId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($formId['max'])) {
                $this->addUsingAlias(RlsnomenPeer::FORM_ID, $formId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::FORM_ID, $formId, $comparison);
    }

    /**
     * Filter the query on the dosage_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDosageId(1234); // WHERE dosage_id = 1234
     * $query->filterByDosageId(array(12, 34)); // WHERE dosage_id IN (12, 34)
     * $query->filterByDosageId(array('min' => 12)); // WHERE dosage_id >= 12
     * $query->filterByDosageId(array('max' => 12)); // WHERE dosage_id <= 12
     * </code>
     *
     * @param     mixed $dosageId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByDosageId($dosageId = null, $comparison = null)
    {
        if (is_array($dosageId)) {
            $useMinMax = false;
            if (isset($dosageId['min'])) {
                $this->addUsingAlias(RlsnomenPeer::DOSAGE_ID, $dosageId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dosageId['max'])) {
                $this->addUsingAlias(RlsnomenPeer::DOSAGE_ID, $dosageId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::DOSAGE_ID, $dosageId, $comparison);
    }

    /**
     * Filter the query on the filling_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFillingId(1234); // WHERE filling_id = 1234
     * $query->filterByFillingId(array(12, 34)); // WHERE filling_id IN (12, 34)
     * $query->filterByFillingId(array('min' => 12)); // WHERE filling_id >= 12
     * $query->filterByFillingId(array('max' => 12)); // WHERE filling_id <= 12
     * </code>
     *
     * @param     mixed $fillingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByFillingId($fillingId = null, $comparison = null)
    {
        if (is_array($fillingId)) {
            $useMinMax = false;
            if (isset($fillingId['min'])) {
                $this->addUsingAlias(RlsnomenPeer::FILLING_ID, $fillingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fillingId['max'])) {
                $this->addUsingAlias(RlsnomenPeer::FILLING_ID, $fillingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::FILLING_ID, $fillingId, $comparison);
    }

    /**
     * Filter the query on the packing_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPackingId(1234); // WHERE packing_id = 1234
     * $query->filterByPackingId(array(12, 34)); // WHERE packing_id IN (12, 34)
     * $query->filterByPackingId(array('min' => 12)); // WHERE packing_id >= 12
     * $query->filterByPackingId(array('max' => 12)); // WHERE packing_id <= 12
     * </code>
     *
     * @param     mixed $packingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByPackingId($packingId = null, $comparison = null)
    {
        if (is_array($packingId)) {
            $useMinMax = false;
            if (isset($packingId['min'])) {
                $this->addUsingAlias(RlsnomenPeer::PACKING_ID, $packingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($packingId['max'])) {
                $this->addUsingAlias(RlsnomenPeer::PACKING_ID, $packingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::PACKING_ID, $packingId, $comparison);
    }

    /**
     * Filter the query on the regDate column
     *
     * Example usage:
     * <code>
     * $query->filterByRegdate('2011-03-14'); // WHERE regDate = '2011-03-14'
     * $query->filterByRegdate('now'); // WHERE regDate = '2011-03-14'
     * $query->filterByRegdate(array('max' => 'yesterday')); // WHERE regDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $regdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByRegdate($regdate = null, $comparison = null)
    {
        if (is_array($regdate)) {
            $useMinMax = false;
            if (isset($regdate['min'])) {
                $this->addUsingAlias(RlsnomenPeer::REGDATE, $regdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($regdate['max'])) {
                $this->addUsingAlias(RlsnomenPeer::REGDATE, $regdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::REGDATE, $regdate, $comparison);
    }

    /**
     * Filter the query on the annDate column
     *
     * Example usage:
     * <code>
     * $query->filterByAnndate('2011-03-14'); // WHERE annDate = '2011-03-14'
     * $query->filterByAnndate('now'); // WHERE annDate = '2011-03-14'
     * $query->filterByAnndate(array('max' => 'yesterday')); // WHERE annDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $anndate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByAnndate($anndate = null, $comparison = null)
    {
        if (is_array($anndate)) {
            $useMinMax = false;
            if (isset($anndate['min'])) {
                $this->addUsingAlias(RlsnomenPeer::ANNDATE, $anndate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anndate['max'])) {
                $this->addUsingAlias(RlsnomenPeer::ANNDATE, $anndate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RlsnomenPeer::ANNDATE, $anndate, $comparison);
    }

    /**
     * Filter the query on the disabledForPrescription column
     *
     * Example usage:
     * <code>
     * $query->filterByDisabledforprescription(true); // WHERE disabledForPrescription = true
     * $query->filterByDisabledforprescription('yes'); // WHERE disabledForPrescription = true
     * </code>
     *
     * @param     boolean|string $disabledforprescription The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function filterByDisabledforprescription($disabledforprescription = null, $comparison = null)
    {
        if (is_string($disabledforprescription)) {
            $disabledforprescription = in_array(strtolower($disabledforprescription), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RlsnomenPeer::DISABLEDFORPRESCRIPTION, $disabledforprescription, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rlsnomen $rlsnomen Object to remove from the list of results
     *
     * @return RlsnomenQuery The current query, for fluid interface
     */
    public function prune($rlsnomen = null)
    {
        if ($rlsnomen) {
            $this->addUsingAlias(RlsnomenPeer::ID, $rlsnomen->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
