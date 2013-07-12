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
use Webmis\Models\RblaboratoryTest;
use Webmis\Models\RblaboratoryTestPeer;
use Webmis\Models\RblaboratoryTestQuery;

/**
 * Base class that represents a query for the 'rbLaboratory_Test' table.
 *
 *
 *
 * @method RblaboratoryTestQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RblaboratoryTestQuery orderByMasterId($order = Criteria::ASC) Order by the master_id column
 * @method RblaboratoryTestQuery orderByTestId($order = Criteria::ASC) Order by the test_id column
 * @method RblaboratoryTestQuery orderByBook($order = Criteria::ASC) Order by the book column
 * @method RblaboratoryTestQuery orderByCode($order = Criteria::ASC) Order by the code column
 *
 * @method RblaboratoryTestQuery groupById() Group by the id column
 * @method RblaboratoryTestQuery groupByMasterId() Group by the master_id column
 * @method RblaboratoryTestQuery groupByTestId() Group by the test_id column
 * @method RblaboratoryTestQuery groupByBook() Group by the book column
 * @method RblaboratoryTestQuery groupByCode() Group by the code column
 *
 * @method RblaboratoryTestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RblaboratoryTestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RblaboratoryTestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RblaboratoryTest findOne(PropelPDO $con = null) Return the first RblaboratoryTest matching the query
 * @method RblaboratoryTest findOneOrCreate(PropelPDO $con = null) Return the first RblaboratoryTest matching the query, or a new RblaboratoryTest object populated from the query conditions when no match is found
 *
 * @method RblaboratoryTest findOneByMasterId(int $master_id) Return the first RblaboratoryTest filtered by the master_id column
 * @method RblaboratoryTest findOneByTestId(int $test_id) Return the first RblaboratoryTest filtered by the test_id column
 * @method RblaboratoryTest findOneByBook(string $book) Return the first RblaboratoryTest filtered by the book column
 * @method RblaboratoryTest findOneByCode(string $code) Return the first RblaboratoryTest filtered by the code column
 *
 * @method array findById(int $id) Return RblaboratoryTest objects filtered by the id column
 * @method array findByMasterId(int $master_id) Return RblaboratoryTest objects filtered by the master_id column
 * @method array findByTestId(int $test_id) Return RblaboratoryTest objects filtered by the test_id column
 * @method array findByBook(string $book) Return RblaboratoryTest objects filtered by the book column
 * @method array findByCode(string $code) Return RblaboratoryTest objects filtered by the code column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRblaboratoryTestQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRblaboratoryTestQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\RblaboratoryTest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RblaboratoryTestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RblaboratoryTestQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RblaboratoryTestQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RblaboratoryTestQuery) {
            return $criteria;
        }
        $query = new RblaboratoryTestQuery();
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
     * @return   RblaboratoryTest|RblaboratoryTest[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RblaboratoryTestPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RblaboratoryTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RblaboratoryTest A model object, or null if the key is not found
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
     * @return                 RblaboratoryTest A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `master_id`, `test_id`, `book`, `code` FROM `rbLaboratory_Test` WHERE `id` = :p0';
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
            $obj = new RblaboratoryTest();
            $obj->hydrate($row);
            RblaboratoryTestPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RblaboratoryTest|RblaboratoryTest[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RblaboratoryTest[]|mixed the list of results, formatted by the current formatter
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
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RblaboratoryTestPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RblaboratoryTestPeer::ID, $keys, Criteria::IN);
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
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RblaboratoryTestPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RblaboratoryTestPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RblaboratoryTestPeer::ID, $id, $comparison);
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
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function filterByMasterId($masterId = null, $comparison = null)
    {
        if (is_array($masterId)) {
            $useMinMax = false;
            if (isset($masterId['min'])) {
                $this->addUsingAlias(RblaboratoryTestPeer::MASTER_ID, $masterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masterId['max'])) {
                $this->addUsingAlias(RblaboratoryTestPeer::MASTER_ID, $masterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RblaboratoryTestPeer::MASTER_ID, $masterId, $comparison);
    }

    /**
     * Filter the query on the test_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTestId(1234); // WHERE test_id = 1234
     * $query->filterByTestId(array(12, 34)); // WHERE test_id IN (12, 34)
     * $query->filterByTestId(array('min' => 12)); // WHERE test_id >= 12
     * $query->filterByTestId(array('max' => 12)); // WHERE test_id <= 12
     * </code>
     *
     * @param     mixed $testId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function filterByTestId($testId = null, $comparison = null)
    {
        if (is_array($testId)) {
            $useMinMax = false;
            if (isset($testId['min'])) {
                $this->addUsingAlias(RblaboratoryTestPeer::TEST_ID, $testId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($testId['max'])) {
                $this->addUsingAlias(RblaboratoryTestPeer::TEST_ID, $testId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RblaboratoryTestPeer::TEST_ID, $testId, $comparison);
    }

    /**
     * Filter the query on the book column
     *
     * Example usage:
     * <code>
     * $query->filterByBook('fooValue');   // WHERE book = 'fooValue'
     * $query->filterByBook('%fooValue%'); // WHERE book LIKE '%fooValue%'
     * </code>
     *
     * @param     string $book The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function filterByBook($book = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($book)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $book)) {
                $book = str_replace('*', '%', $book);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RblaboratoryTestPeer::BOOK, $book, $comparison);
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
     * @return RblaboratoryTestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RblaboratoryTestPeer::CODE, $code, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   RblaboratoryTest $rblaboratoryTest Object to remove from the list of results
     *
     * @return RblaboratoryTestQuery The current query, for fluid interface
     */
    public function prune($rblaboratoryTest = null)
    {
        if ($rblaboratoryTest) {
            $this->addUsingAlias(RblaboratoryTestPeer::ID, $rblaboratoryTest->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
