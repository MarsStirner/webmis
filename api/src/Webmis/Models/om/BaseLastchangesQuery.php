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
use Webmis\Models\Lastchanges;
use Webmis\Models\LastchangesPeer;
use Webmis\Models\LastchangesQuery;

/**
 * Base class that represents a query for the 'LastChanges' table.
 *
 *
 *
 * @method LastchangesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method LastchangesQuery orderByTable($order = Criteria::ASC) Order by the table column
 * @method LastchangesQuery orderByTableKeyId($order = Criteria::ASC) Order by the table_key_id column
 * @method LastchangesQuery orderByFlags($order = Criteria::ASC) Order by the flags column
 *
 * @method LastchangesQuery groupById() Group by the id column
 * @method LastchangesQuery groupByTable() Group by the table column
 * @method LastchangesQuery groupByTableKeyId() Group by the table_key_id column
 * @method LastchangesQuery groupByFlags() Group by the flags column
 *
 * @method LastchangesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LastchangesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LastchangesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Lastchanges findOne(PropelPDO $con = null) Return the first Lastchanges matching the query
 * @method Lastchanges findOneOrCreate(PropelPDO $con = null) Return the first Lastchanges matching the query, or a new Lastchanges object populated from the query conditions when no match is found
 *
 * @method Lastchanges findOneByTable(string $table) Return the first Lastchanges filtered by the table column
 * @method Lastchanges findOneByTableKeyId(int $table_key_id) Return the first Lastchanges filtered by the table_key_id column
 * @method Lastchanges findOneByFlags(string $flags) Return the first Lastchanges filtered by the flags column
 *
 * @method array findById(int $id) Return Lastchanges objects filtered by the id column
 * @method array findByTable(string $table) Return Lastchanges objects filtered by the table column
 * @method array findByTableKeyId(int $table_key_id) Return Lastchanges objects filtered by the table_key_id column
 * @method array findByFlags(string $flags) Return Lastchanges objects filtered by the flags column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseLastchangesQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLastchangesQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Lastchanges', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LastchangesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LastchangesQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LastchangesQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LastchangesQuery) {
            return $criteria;
        }
        $query = new LastchangesQuery();
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
     * @return   Lastchanges|Lastchanges[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LastchangesPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LastchangesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Lastchanges A model object, or null if the key is not found
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
     * @return                 Lastchanges A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `table`, `table_key_id`, `flags` FROM `LastChanges` WHERE `id` = :p0';
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
            $obj = new Lastchanges();
            $obj->hydrate($row);
            LastchangesPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Lastchanges|Lastchanges[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Lastchanges[]|mixed the list of results, formatted by the current formatter
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
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LastchangesPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LastchangesPeer::ID, $keys, Criteria::IN);
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
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(LastchangesPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(LastchangesPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LastchangesPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the table column
     *
     * Example usage:
     * <code>
     * $query->filterByTable('fooValue');   // WHERE table = 'fooValue'
     * $query->filterByTable('%fooValue%'); // WHERE table LIKE '%fooValue%'
     * </code>
     *
     * @param     string $table The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function filterByTable($table = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($table)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $table)) {
                $table = str_replace('*', '%', $table);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LastchangesPeer::TABLE, $table, $comparison);
    }

    /**
     * Filter the query on the table_key_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTableKeyId(1234); // WHERE table_key_id = 1234
     * $query->filterByTableKeyId(array(12, 34)); // WHERE table_key_id IN (12, 34)
     * $query->filterByTableKeyId(array('min' => 12)); // WHERE table_key_id >= 12
     * $query->filterByTableKeyId(array('max' => 12)); // WHERE table_key_id <= 12
     * </code>
     *
     * @param     mixed $tableKeyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function filterByTableKeyId($tableKeyId = null, $comparison = null)
    {
        if (is_array($tableKeyId)) {
            $useMinMax = false;
            if (isset($tableKeyId['min'])) {
                $this->addUsingAlias(LastchangesPeer::TABLE_KEY_ID, $tableKeyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tableKeyId['max'])) {
                $this->addUsingAlias(LastchangesPeer::TABLE_KEY_ID, $tableKeyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LastchangesPeer::TABLE_KEY_ID, $tableKeyId, $comparison);
    }

    /**
     * Filter the query on the flags column
     *
     * Example usage:
     * <code>
     * $query->filterByFlags('fooValue');   // WHERE flags = 'fooValue'
     * $query->filterByFlags('%fooValue%'); // WHERE flags LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flags The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function filterByFlags($flags = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flags)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flags)) {
                $flags = str_replace('*', '%', $flags);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LastchangesPeer::FLAGS, $flags, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Lastchanges $lastchanges Object to remove from the list of results
     *
     * @return LastchangesQuery The current query, for fluid interface
     */
    public function prune($lastchanges = null)
    {
        if ($lastchanges) {
            $this->addUsingAlias(LastchangesPeer::ID, $lastchanges->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
