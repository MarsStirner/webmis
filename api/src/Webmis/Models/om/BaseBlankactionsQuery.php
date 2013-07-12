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
use Webmis\Models\Actiontype;
use Webmis\Models\Blankactions;
use Webmis\Models\BlankactionsPeer;
use Webmis\Models\BlankactionsQuery;

/**
 * Base class that represents a query for the 'BlankActions' table.
 *
 *
 *
 * @method BlankactionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BlankactionsQuery orderByDoctypeId($order = Criteria::ASC) Order by the doctype_id column
 * @method BlankactionsQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method BlankactionsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method BlankactionsQuery orderByCheckingserial($order = Criteria::ASC) Order by the checkingSerial column
 * @method BlankactionsQuery orderByCheckingnumber($order = Criteria::ASC) Order by the checkingNumber column
 * @method BlankactionsQuery orderByCheckingamount($order = Criteria::ASC) Order by the checkingAmount column
 *
 * @method BlankactionsQuery groupById() Group by the id column
 * @method BlankactionsQuery groupByDoctypeId() Group by the doctype_id column
 * @method BlankactionsQuery groupByCode() Group by the code column
 * @method BlankactionsQuery groupByName() Group by the name column
 * @method BlankactionsQuery groupByCheckingserial() Group by the checkingSerial column
 * @method BlankactionsQuery groupByCheckingnumber() Group by the checkingNumber column
 * @method BlankactionsQuery groupByCheckingamount() Group by the checkingAmount column
 *
 * @method BlankactionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BlankactionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BlankactionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BlankactionsQuery leftJoinActiontype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontype relation
 * @method BlankactionsQuery rightJoinActiontype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontype relation
 * @method BlankactionsQuery innerJoinActiontype($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontype relation
 *
 * @method Blankactions findOne(PropelPDO $con = null) Return the first Blankactions matching the query
 * @method Blankactions findOneOrCreate(PropelPDO $con = null) Return the first Blankactions matching the query, or a new Blankactions object populated from the query conditions when no match is found
 *
 * @method Blankactions findOneByDoctypeId(int $doctype_id) Return the first Blankactions filtered by the doctype_id column
 * @method Blankactions findOneByCode(string $code) Return the first Blankactions filtered by the code column
 * @method Blankactions findOneByName(string $name) Return the first Blankactions filtered by the name column
 * @method Blankactions findOneByCheckingserial(int $checkingSerial) Return the first Blankactions filtered by the checkingSerial column
 * @method Blankactions findOneByCheckingnumber(int $checkingNumber) Return the first Blankactions filtered by the checkingNumber column
 * @method Blankactions findOneByCheckingamount(int $checkingAmount) Return the first Blankactions filtered by the checkingAmount column
 *
 * @method array findById(int $id) Return Blankactions objects filtered by the id column
 * @method array findByDoctypeId(int $doctype_id) Return Blankactions objects filtered by the doctype_id column
 * @method array findByCode(string $code) Return Blankactions objects filtered by the code column
 * @method array findByName(string $name) Return Blankactions objects filtered by the name column
 * @method array findByCheckingserial(int $checkingSerial) Return Blankactions objects filtered by the checkingSerial column
 * @method array findByCheckingnumber(int $checkingNumber) Return Blankactions objects filtered by the checkingNumber column
 * @method array findByCheckingamount(int $checkingAmount) Return Blankactions objects filtered by the checkingAmount column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBlankactionsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBlankactionsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Blankactions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BlankactionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BlankactionsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BlankactionsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BlankactionsQuery) {
            return $criteria;
        }
        $query = new BlankactionsQuery();
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
     * @return   Blankactions|Blankactions[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BlankactionsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BlankactionsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Blankactions A model object, or null if the key is not found
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
     * @return                 Blankactions A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `doctype_id`, `code`, `name`, `checkingSerial`, `checkingNumber`, `checkingAmount` FROM `BlankActions` WHERE `id` = :p0';
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
            $obj = new Blankactions();
            $obj->hydrate($row);
            BlankactionsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Blankactions|Blankactions[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Blankactions[]|mixed the list of results, formatted by the current formatter
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
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlankactionsPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlankactionsPeer::ID, $keys, Criteria::IN);
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
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BlankactionsPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BlankactionsPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the doctype_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDoctypeId(1234); // WHERE doctype_id = 1234
     * $query->filterByDoctypeId(array(12, 34)); // WHERE doctype_id IN (12, 34)
     * $query->filterByDoctypeId(array('min' => 12)); // WHERE doctype_id >= 12
     * $query->filterByDoctypeId(array('max' => 12)); // WHERE doctype_id <= 12
     * </code>
     *
     * @see       filterByActiontype()
     *
     * @param     mixed $doctypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterByDoctypeId($doctypeId = null, $comparison = null)
    {
        if (is_array($doctypeId)) {
            $useMinMax = false;
            if (isset($doctypeId['min'])) {
                $this->addUsingAlias(BlankactionsPeer::DOCTYPE_ID, $doctypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doctypeId['max'])) {
                $this->addUsingAlias(BlankactionsPeer::DOCTYPE_ID, $doctypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPeer::DOCTYPE_ID, $doctypeId, $comparison);
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
     * @return BlankactionsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BlankactionsPeer::CODE, $code, $comparison);
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
     * @return BlankactionsQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BlankactionsPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the checkingSerial column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckingserial(1234); // WHERE checkingSerial = 1234
     * $query->filterByCheckingserial(array(12, 34)); // WHERE checkingSerial IN (12, 34)
     * $query->filterByCheckingserial(array('min' => 12)); // WHERE checkingSerial >= 12
     * $query->filterByCheckingserial(array('max' => 12)); // WHERE checkingSerial <= 12
     * </code>
     *
     * @param     mixed $checkingserial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterByCheckingserial($checkingserial = null, $comparison = null)
    {
        if (is_array($checkingserial)) {
            $useMinMax = false;
            if (isset($checkingserial['min'])) {
                $this->addUsingAlias(BlankactionsPeer::CHECKINGSERIAL, $checkingserial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkingserial['max'])) {
                $this->addUsingAlias(BlankactionsPeer::CHECKINGSERIAL, $checkingserial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPeer::CHECKINGSERIAL, $checkingserial, $comparison);
    }

    /**
     * Filter the query on the checkingNumber column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckingnumber(1234); // WHERE checkingNumber = 1234
     * $query->filterByCheckingnumber(array(12, 34)); // WHERE checkingNumber IN (12, 34)
     * $query->filterByCheckingnumber(array('min' => 12)); // WHERE checkingNumber >= 12
     * $query->filterByCheckingnumber(array('max' => 12)); // WHERE checkingNumber <= 12
     * </code>
     *
     * @param     mixed $checkingnumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterByCheckingnumber($checkingnumber = null, $comparison = null)
    {
        if (is_array($checkingnumber)) {
            $useMinMax = false;
            if (isset($checkingnumber['min'])) {
                $this->addUsingAlias(BlankactionsPeer::CHECKINGNUMBER, $checkingnumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkingnumber['max'])) {
                $this->addUsingAlias(BlankactionsPeer::CHECKINGNUMBER, $checkingnumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPeer::CHECKINGNUMBER, $checkingnumber, $comparison);
    }

    /**
     * Filter the query on the checkingAmount column
     *
     * Example usage:
     * <code>
     * $query->filterByCheckingamount(1234); // WHERE checkingAmount = 1234
     * $query->filterByCheckingamount(array(12, 34)); // WHERE checkingAmount IN (12, 34)
     * $query->filterByCheckingamount(array('min' => 12)); // WHERE checkingAmount >= 12
     * $query->filterByCheckingamount(array('max' => 12)); // WHERE checkingAmount <= 12
     * </code>
     *
     * @param     mixed $checkingamount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function filterByCheckingamount($checkingamount = null, $comparison = null)
    {
        if (is_array($checkingamount)) {
            $useMinMax = false;
            if (isset($checkingamount['min'])) {
                $this->addUsingAlias(BlankactionsPeer::CHECKINGAMOUNT, $checkingamount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($checkingamount['max'])) {
                $this->addUsingAlias(BlankactionsPeer::CHECKINGAMOUNT, $checkingamount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlankactionsPeer::CHECKINGAMOUNT, $checkingamount, $comparison);
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlankactionsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontype($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(BlankactionsPeer::DOCTYPE_ID, $actiontype->getId(), $comparison);
        } elseif ($actiontype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlankactionsPeer::DOCTYPE_ID, $actiontype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByActiontype() only accepts arguments of type Actiontype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actiontype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function joinActiontype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actiontype');

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
            $this->addJoinObject($join, 'Actiontype');
        }

        return $this;
    }

    /**
     * Use the Actiontype relation Actiontype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActiontype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actiontype', '\Webmis\Models\ActiontypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Blankactions $blankactions Object to remove from the list of results
     *
     * @return BlankactionsQuery The current query, for fluid interface
     */
    public function prune($blankactions = null)
    {
        if ($blankactions) {
            $this->addUsingAlias(BlankactionsPeer::ID, $blankactions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
