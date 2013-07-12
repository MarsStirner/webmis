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
use Webmis\Models\Variablesforsql;
use Webmis\Models\VariablesforsqlPeer;
use Webmis\Models\VariablesforsqlQuery;

/**
 * Base class that represents a query for the 'VariablesforSQL' table.
 *
 *
 *
 * @method VariablesforsqlQuery orderById($order = Criteria::ASC) Order by the id column
 * @method VariablesforsqlQuery orderBySpecialvarnameId($order = Criteria::ASC) Order by the specialVarName_id column
 * @method VariablesforsqlQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method VariablesforsqlQuery orderByVarType($order = Criteria::ASC) Order by the var_type column
 * @method VariablesforsqlQuery orderByLabel($order = Criteria::ASC) Order by the label column
 *
 * @method VariablesforsqlQuery groupById() Group by the id column
 * @method VariablesforsqlQuery groupBySpecialvarnameId() Group by the specialVarName_id column
 * @method VariablesforsqlQuery groupByName() Group by the name column
 * @method VariablesforsqlQuery groupByVarType() Group by the var_type column
 * @method VariablesforsqlQuery groupByLabel() Group by the label column
 *
 * @method VariablesforsqlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VariablesforsqlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VariablesforsqlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Variablesforsql findOne(PropelPDO $con = null) Return the first Variablesforsql matching the query
 * @method Variablesforsql findOneOrCreate(PropelPDO $con = null) Return the first Variablesforsql matching the query, or a new Variablesforsql object populated from the query conditions when no match is found
 *
 * @method Variablesforsql findOneBySpecialvarnameId(int $specialVarName_id) Return the first Variablesforsql filtered by the specialVarName_id column
 * @method Variablesforsql findOneByName(string $name) Return the first Variablesforsql filtered by the name column
 * @method Variablesforsql findOneByVarType(string $var_type) Return the first Variablesforsql filtered by the var_type column
 * @method Variablesforsql findOneByLabel(string $label) Return the first Variablesforsql filtered by the label column
 *
 * @method array findById(int $id) Return Variablesforsql objects filtered by the id column
 * @method array findBySpecialvarnameId(int $specialVarName_id) Return Variablesforsql objects filtered by the specialVarName_id column
 * @method array findByName(string $name) Return Variablesforsql objects filtered by the name column
 * @method array findByVarType(string $var_type) Return Variablesforsql objects filtered by the var_type column
 * @method array findByLabel(string $label) Return Variablesforsql objects filtered by the label column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseVariablesforsqlQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVariablesforsqlQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Variablesforsql', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VariablesforsqlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VariablesforsqlQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VariablesforsqlQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VariablesforsqlQuery) {
            return $criteria;
        }
        $query = new VariablesforsqlQuery();
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
     * @return   Variablesforsql|Variablesforsql[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VariablesforsqlPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VariablesforsqlPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Variablesforsql A model object, or null if the key is not found
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
     * @return                 Variablesforsql A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `specialVarName_id`, `name`, `var_type`, `label` FROM `VariablesforSQL` WHERE `id` = :p0';
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
            $obj = new Variablesforsql();
            $obj->hydrate($row);
            VariablesforsqlPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Variablesforsql|Variablesforsql[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Variablesforsql[]|mixed the list of results, formatted by the current formatter
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
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(VariablesforsqlPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(VariablesforsqlPeer::ID, $keys, Criteria::IN);
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
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(VariablesforsqlPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(VariablesforsqlPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariablesforsqlPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the specialVarName_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecialvarnameId(1234); // WHERE specialVarName_id = 1234
     * $query->filterBySpecialvarnameId(array(12, 34)); // WHERE specialVarName_id IN (12, 34)
     * $query->filterBySpecialvarnameId(array('min' => 12)); // WHERE specialVarName_id >= 12
     * $query->filterBySpecialvarnameId(array('max' => 12)); // WHERE specialVarName_id <= 12
     * </code>
     *
     * @param     mixed $specialvarnameId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function filterBySpecialvarnameId($specialvarnameId = null, $comparison = null)
    {
        if (is_array($specialvarnameId)) {
            $useMinMax = false;
            if (isset($specialvarnameId['min'])) {
                $this->addUsingAlias(VariablesforsqlPeer::SPECIALVARNAME_ID, $specialvarnameId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialvarnameId['max'])) {
                $this->addUsingAlias(VariablesforsqlPeer::SPECIALVARNAME_ID, $specialvarnameId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariablesforsqlPeer::SPECIALVARNAME_ID, $specialvarnameId, $comparison);
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
     * @return VariablesforsqlQuery The current query, for fluid interface
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

        return $this->addUsingAlias(VariablesforsqlPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the var_type column
     *
     * Example usage:
     * <code>
     * $query->filterByVarType('fooValue');   // WHERE var_type = 'fooValue'
     * $query->filterByVarType('%fooValue%'); // WHERE var_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $varType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function filterByVarType($varType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($varType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $varType)) {
                $varType = str_replace('*', '%', $varType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariablesforsqlPeer::VAR_TYPE, $varType, $comparison);
    }

    /**
     * Filter the query on the label column
     *
     * Example usage:
     * <code>
     * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
     * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $label The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function filterByLabel($label = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($label)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $label)) {
                $label = str_replace('*', '%', $label);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariablesforsqlPeer::LABEL, $label, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Variablesforsql $variablesforsql Object to remove from the list of results
     *
     * @return VariablesforsqlQuery The current query, for fluid interface
     */
    public function prune($variablesforsql = null)
    {
        if ($variablesforsql) {
            $this->addUsingAlias(VariablesforsqlPeer::ID, $variablesforsql->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
