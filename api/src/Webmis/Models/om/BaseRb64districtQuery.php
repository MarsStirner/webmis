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
use Webmis\Models\Rb64district;
use Webmis\Models\Rb64districtPeer;
use Webmis\Models\Rb64districtQuery;

/**
 * Base class that represents a query for the 'rb64District' table.
 *
 *
 *
 * @method Rb64districtQuery orderById($order = Criteria::ASC) Order by the id column
 * @method Rb64districtQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method Rb64districtQuery orderByCodeTfoms($order = Criteria::ASC) Order by the code_tfoms column
 * @method Rb64districtQuery orderBySocr($order = Criteria::ASC) Order by the socr column
 * @method Rb64districtQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method Rb64districtQuery orderByIndex($order = Criteria::ASC) Order by the index column
 * @method Rb64districtQuery orderByGninmb($order = Criteria::ASC) Order by the gninmb column
 * @method Rb64districtQuery orderByUno($order = Criteria::ASC) Order by the uno column
 * @method Rb64districtQuery orderByOcatd($order = Criteria::ASC) Order by the ocatd column
 * @method Rb64districtQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method Rb64districtQuery orderByParent($order = Criteria::ASC) Order by the parent column
 * @method Rb64districtQuery orderByInfis($order = Criteria::ASC) Order by the infis column
 * @method Rb64districtQuery orderByPrefix($order = Criteria::ASC) Order by the prefix column
 *
 * @method Rb64districtQuery groupById() Group by the id column
 * @method Rb64districtQuery groupByName() Group by the name column
 * @method Rb64districtQuery groupByCodeTfoms() Group by the code_tfoms column
 * @method Rb64districtQuery groupBySocr() Group by the socr column
 * @method Rb64districtQuery groupByCode() Group by the code column
 * @method Rb64districtQuery groupByIndex() Group by the index column
 * @method Rb64districtQuery groupByGninmb() Group by the gninmb column
 * @method Rb64districtQuery groupByUno() Group by the uno column
 * @method Rb64districtQuery groupByOcatd() Group by the ocatd column
 * @method Rb64districtQuery groupByStatus() Group by the status column
 * @method Rb64districtQuery groupByParent() Group by the parent column
 * @method Rb64districtQuery groupByInfis() Group by the infis column
 * @method Rb64districtQuery groupByPrefix() Group by the prefix column
 *
 * @method Rb64districtQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Rb64districtQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Rb64districtQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rb64district findOne(PropelPDO $con = null) Return the first Rb64district matching the query
 * @method Rb64district findOneOrCreate(PropelPDO $con = null) Return the first Rb64district matching the query, or a new Rb64district object populated from the query conditions when no match is found
 *
 * @method Rb64district findOneByName(string $name) Return the first Rb64district filtered by the name column
 * @method Rb64district findOneByCodeTfoms(int $code_tfoms) Return the first Rb64district filtered by the code_tfoms column
 * @method Rb64district findOneBySocr(string $socr) Return the first Rb64district filtered by the socr column
 * @method Rb64district findOneByCode(string $code) Return the first Rb64district filtered by the code column
 * @method Rb64district findOneByIndex(int $index) Return the first Rb64district filtered by the index column
 * @method Rb64district findOneByGninmb(int $gninmb) Return the first Rb64district filtered by the gninmb column
 * @method Rb64district findOneByUno(int $uno) Return the first Rb64district filtered by the uno column
 * @method Rb64district findOneByOcatd(string $ocatd) Return the first Rb64district filtered by the ocatd column
 * @method Rb64district findOneByStatus(int $status) Return the first Rb64district filtered by the status column
 * @method Rb64district findOneByParent(int $parent) Return the first Rb64district filtered by the parent column
 * @method Rb64district findOneByInfis(string $infis) Return the first Rb64district filtered by the infis column
 * @method Rb64district findOneByPrefix(int $prefix) Return the first Rb64district filtered by the prefix column
 *
 * @method array findById(int $id) Return Rb64district objects filtered by the id column
 * @method array findByName(string $name) Return Rb64district objects filtered by the name column
 * @method array findByCodeTfoms(int $code_tfoms) Return Rb64district objects filtered by the code_tfoms column
 * @method array findBySocr(string $socr) Return Rb64district objects filtered by the socr column
 * @method array findByCode(string $code) Return Rb64district objects filtered by the code column
 * @method array findByIndex(int $index) Return Rb64district objects filtered by the index column
 * @method array findByGninmb(int $gninmb) Return Rb64district objects filtered by the gninmb column
 * @method array findByUno(int $uno) Return Rb64district objects filtered by the uno column
 * @method array findByOcatd(string $ocatd) Return Rb64district objects filtered by the ocatd column
 * @method array findByStatus(int $status) Return Rb64district objects filtered by the status column
 * @method array findByParent(int $parent) Return Rb64district objects filtered by the parent column
 * @method array findByInfis(string $infis) Return Rb64district objects filtered by the infis column
 * @method array findByPrefix(int $prefix) Return Rb64district objects filtered by the prefix column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRb64districtQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRb64districtQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rb64district', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Rb64districtQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Rb64districtQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Rb64districtQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Rb64districtQuery) {
            return $criteria;
        }
        $query = new Rb64districtQuery();
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
     * @return   Rb64district|Rb64district[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Rb64districtPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Rb64districtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rb64district A model object, or null if the key is not found
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
     * @return                 Rb64district A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `code_tfoms`, `socr`, `code`, `index`, `gninmb`, `uno`, `ocatd`, `status`, `parent`, `infis`, `prefix` FROM `rb64District` WHERE `id` = :p0';
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
            $obj = new Rb64district();
            $obj->hydrate($row);
            Rb64districtPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rb64district|Rb64district[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rb64district[]|mixed the list of results, formatted by the current formatter
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
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Rb64districtPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Rb64districtPeer::ID, $keys, Criteria::IN);
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
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(Rb64districtPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(Rb64districtPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::ID, $id, $comparison);
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
     * @return Rb64districtQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Rb64districtPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the code_tfoms column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeTfoms(1234); // WHERE code_tfoms = 1234
     * $query->filterByCodeTfoms(array(12, 34)); // WHERE code_tfoms IN (12, 34)
     * $query->filterByCodeTfoms(array('min' => 12)); // WHERE code_tfoms >= 12
     * $query->filterByCodeTfoms(array('max' => 12)); // WHERE code_tfoms <= 12
     * </code>
     *
     * @param     mixed $codeTfoms The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByCodeTfoms($codeTfoms = null, $comparison = null)
    {
        if (is_array($codeTfoms)) {
            $useMinMax = false;
            if (isset($codeTfoms['min'])) {
                $this->addUsingAlias(Rb64districtPeer::CODE_TFOMS, $codeTfoms['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($codeTfoms['max'])) {
                $this->addUsingAlias(Rb64districtPeer::CODE_TFOMS, $codeTfoms['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::CODE_TFOMS, $codeTfoms, $comparison);
    }

    /**
     * Filter the query on the socr column
     *
     * Example usage:
     * <code>
     * $query->filterBySocr('fooValue');   // WHERE socr = 'fooValue'
     * $query->filterBySocr('%fooValue%'); // WHERE socr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $socr The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterBySocr($socr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($socr)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $socr)) {
                $socr = str_replace('*', '%', $socr);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::SOCR, $socr, $comparison);
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
     * @return Rb64districtQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Rb64districtPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the index column
     *
     * Example usage:
     * <code>
     * $query->filterByIndex(1234); // WHERE index = 1234
     * $query->filterByIndex(array(12, 34)); // WHERE index IN (12, 34)
     * $query->filterByIndex(array('min' => 12)); // WHERE index >= 12
     * $query->filterByIndex(array('max' => 12)); // WHERE index <= 12
     * </code>
     *
     * @param     mixed $index The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByIndex($index = null, $comparison = null)
    {
        if (is_array($index)) {
            $useMinMax = false;
            if (isset($index['min'])) {
                $this->addUsingAlias(Rb64districtPeer::INDEX, $index['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($index['max'])) {
                $this->addUsingAlias(Rb64districtPeer::INDEX, $index['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::INDEX, $index, $comparison);
    }

    /**
     * Filter the query on the gninmb column
     *
     * Example usage:
     * <code>
     * $query->filterByGninmb(1234); // WHERE gninmb = 1234
     * $query->filterByGninmb(array(12, 34)); // WHERE gninmb IN (12, 34)
     * $query->filterByGninmb(array('min' => 12)); // WHERE gninmb >= 12
     * $query->filterByGninmb(array('max' => 12)); // WHERE gninmb <= 12
     * </code>
     *
     * @param     mixed $gninmb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByGninmb($gninmb = null, $comparison = null)
    {
        if (is_array($gninmb)) {
            $useMinMax = false;
            if (isset($gninmb['min'])) {
                $this->addUsingAlias(Rb64districtPeer::GNINMB, $gninmb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gninmb['max'])) {
                $this->addUsingAlias(Rb64districtPeer::GNINMB, $gninmb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::GNINMB, $gninmb, $comparison);
    }

    /**
     * Filter the query on the uno column
     *
     * Example usage:
     * <code>
     * $query->filterByUno(1234); // WHERE uno = 1234
     * $query->filterByUno(array(12, 34)); // WHERE uno IN (12, 34)
     * $query->filterByUno(array('min' => 12)); // WHERE uno >= 12
     * $query->filterByUno(array('max' => 12)); // WHERE uno <= 12
     * </code>
     *
     * @param     mixed $uno The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByUno($uno = null, $comparison = null)
    {
        if (is_array($uno)) {
            $useMinMax = false;
            if (isset($uno['min'])) {
                $this->addUsingAlias(Rb64districtPeer::UNO, $uno['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uno['max'])) {
                $this->addUsingAlias(Rb64districtPeer::UNO, $uno['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::UNO, $uno, $comparison);
    }

    /**
     * Filter the query on the ocatd column
     *
     * Example usage:
     * <code>
     * $query->filterByOcatd('fooValue');   // WHERE ocatd = 'fooValue'
     * $query->filterByOcatd('%fooValue%'); // WHERE ocatd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ocatd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByOcatd($ocatd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ocatd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ocatd)) {
                $ocatd = str_replace('*', '%', $ocatd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::OCATD, $ocatd, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(Rb64districtPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(Rb64districtPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the parent column
     *
     * Example usage:
     * <code>
     * $query->filterByParent(1234); // WHERE parent = 1234
     * $query->filterByParent(array(12, 34)); // WHERE parent IN (12, 34)
     * $query->filterByParent(array('min' => 12)); // WHERE parent >= 12
     * $query->filterByParent(array('max' => 12)); // WHERE parent <= 12
     * </code>
     *
     * @param     mixed $parent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByParent($parent = null, $comparison = null)
    {
        if (is_array($parent)) {
            $useMinMax = false;
            if (isset($parent['min'])) {
                $this->addUsingAlias(Rb64districtPeer::PARENT, $parent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parent['max'])) {
                $this->addUsingAlias(Rb64districtPeer::PARENT, $parent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::PARENT, $parent, $comparison);
    }

    /**
     * Filter the query on the infis column
     *
     * Example usage:
     * <code>
     * $query->filterByInfis('fooValue');   // WHERE infis = 'fooValue'
     * $query->filterByInfis('%fooValue%'); // WHERE infis LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infis The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByInfis($infis = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infis)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infis)) {
                $infis = str_replace('*', '%', $infis);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::INFIS, $infis, $comparison);
    }

    /**
     * Filter the query on the prefix column
     *
     * Example usage:
     * <code>
     * $query->filterByPrefix(1234); // WHERE prefix = 1234
     * $query->filterByPrefix(array(12, 34)); // WHERE prefix IN (12, 34)
     * $query->filterByPrefix(array('min' => 12)); // WHERE prefix >= 12
     * $query->filterByPrefix(array('max' => 12)); // WHERE prefix <= 12
     * </code>
     *
     * @param     mixed $prefix The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function filterByPrefix($prefix = null, $comparison = null)
    {
        if (is_array($prefix)) {
            $useMinMax = false;
            if (isset($prefix['min'])) {
                $this->addUsingAlias(Rb64districtPeer::PREFIX, $prefix['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prefix['max'])) {
                $this->addUsingAlias(Rb64districtPeer::PREFIX, $prefix['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Rb64districtPeer::PREFIX, $prefix, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rb64district $rb64district Object to remove from the list of results
     *
     * @return Rb64districtQuery The current query, for fluid interface
     */
    public function prune($rb64district = null)
    {
        if ($rb64district) {
            $this->addUsingAlias(Rb64districtPeer::ID, $rb64district->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
