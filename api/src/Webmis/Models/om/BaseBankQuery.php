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
use Webmis\Models\Bank;
use Webmis\Models\BankPeer;
use Webmis\Models\BankQuery;

/**
 * Base class that represents a query for the 'Bank' table.
 *
 *
 *
 * @method BankQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BankQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method BankQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method BankQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method BankQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method BankQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method BankQuery orderByBik($order = Criteria::ASC) Order by the BIK column
 * @method BankQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method BankQuery orderByBranchname($order = Criteria::ASC) Order by the branchName column
 * @method BankQuery orderByCorraccount($order = Criteria::ASC) Order by the corrAccount column
 * @method BankQuery orderBySubaccount($order = Criteria::ASC) Order by the subAccount column
 *
 * @method BankQuery groupById() Group by the id column
 * @method BankQuery groupByCreatedatetime() Group by the createDatetime column
 * @method BankQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method BankQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method BankQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method BankQuery groupByDeleted() Group by the deleted column
 * @method BankQuery groupByBik() Group by the BIK column
 * @method BankQuery groupByName() Group by the name column
 * @method BankQuery groupByBranchname() Group by the branchName column
 * @method BankQuery groupByCorraccount() Group by the corrAccount column
 * @method BankQuery groupBySubaccount() Group by the subAccount column
 *
 * @method BankQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BankQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BankQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Bank findOne(PropelPDO $con = null) Return the first Bank matching the query
 * @method Bank findOneOrCreate(PropelPDO $con = null) Return the first Bank matching the query, or a new Bank object populated from the query conditions when no match is found
 *
 * @method Bank findOneByCreatedatetime(string $createDatetime) Return the first Bank filtered by the createDatetime column
 * @method Bank findOneByCreatepersonId(int $createPerson_id) Return the first Bank filtered by the createPerson_id column
 * @method Bank findOneByModifydatetime(string $modifyDatetime) Return the first Bank filtered by the modifyDatetime column
 * @method Bank findOneByModifypersonId(int $modifyPerson_id) Return the first Bank filtered by the modifyPerson_id column
 * @method Bank findOneByDeleted(boolean $deleted) Return the first Bank filtered by the deleted column
 * @method Bank findOneByBik(string $BIK) Return the first Bank filtered by the BIK column
 * @method Bank findOneByName(string $name) Return the first Bank filtered by the name column
 * @method Bank findOneByBranchname(string $branchName) Return the first Bank filtered by the branchName column
 * @method Bank findOneByCorraccount(string $corrAccount) Return the first Bank filtered by the corrAccount column
 * @method Bank findOneBySubaccount(string $subAccount) Return the first Bank filtered by the subAccount column
 *
 * @method array findById(int $id) Return Bank objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Bank objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Bank objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Bank objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Bank objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Bank objects filtered by the deleted column
 * @method array findByBik(string $BIK) Return Bank objects filtered by the BIK column
 * @method array findByName(string $name) Return Bank objects filtered by the name column
 * @method array findByBranchname(string $branchName) Return Bank objects filtered by the branchName column
 * @method array findByCorraccount(string $corrAccount) Return Bank objects filtered by the corrAccount column
 * @method array findBySubaccount(string $subAccount) Return Bank objects filtered by the subAccount column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseBankQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBankQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Bank', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BankQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BankQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BankQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BankQuery) {
            return $criteria;
        }
        $query = new BankQuery();
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
     * @return   Bank|Bank[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BankPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BankPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Bank A model object, or null if the key is not found
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
     * @return                 Bank A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `BIK`, `name`, `branchName`, `corrAccount`, `subAccount` FROM `Bank` WHERE `id` = :p0';
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
            $obj = new Bank();
            $obj->hydrate($row);
            BankPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bank|Bank[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Bank[]|mixed the list of results, formatted by the current formatter
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BankPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BankPeer::ID, $keys, Criteria::IN);
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BankPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BankPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankPeer::ID, $id, $comparison);
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(BankPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(BankPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(BankPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(BankPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(BankPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(BankPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(BankPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(BankPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BankPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BankPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the BIK column
     *
     * Example usage:
     * <code>
     * $query->filterByBik('fooValue');   // WHERE BIK = 'fooValue'
     * $query->filterByBik('%fooValue%'); // WHERE BIK LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bik The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByBik($bik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bik)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bik)) {
                $bik = str_replace('*', '%', $bik);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankPeer::BIK, $bik, $comparison);
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
     * @return BankQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BankPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the branchName column
     *
     * Example usage:
     * <code>
     * $query->filterByBranchname('fooValue');   // WHERE branchName = 'fooValue'
     * $query->filterByBranchname('%fooValue%'); // WHERE branchName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $branchname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByBranchname($branchname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($branchname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $branchname)) {
                $branchname = str_replace('*', '%', $branchname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankPeer::BRANCHNAME, $branchname, $comparison);
    }

    /**
     * Filter the query on the corrAccount column
     *
     * Example usage:
     * <code>
     * $query->filterByCorraccount('fooValue');   // WHERE corrAccount = 'fooValue'
     * $query->filterByCorraccount('%fooValue%'); // WHERE corrAccount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $corraccount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankQuery The current query, for fluid interface
     */
    public function filterByCorraccount($corraccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($corraccount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $corraccount)) {
                $corraccount = str_replace('*', '%', $corraccount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankPeer::CORRACCOUNT, $corraccount, $comparison);
    }

    /**
     * Filter the query on the subAccount column
     *
     * Example usage:
     * <code>
     * $query->filterBySubaccount('fooValue');   // WHERE subAccount = 'fooValue'
     * $query->filterBySubaccount('%fooValue%'); // WHERE subAccount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subaccount The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BankQuery The current query, for fluid interface
     */
    public function filterBySubaccount($subaccount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subaccount)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subaccount)) {
                $subaccount = str_replace('*', '%', $subaccount);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BankPeer::SUBACCOUNT, $subaccount, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Bank $bank Object to remove from the list of results
     *
     * @return BankQuery The current query, for fluid interface
     */
    public function prune($bank = null)
    {
        if ($bank) {
            $this->addUsingAlias(BankPeer::ID, $bank->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
