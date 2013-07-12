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
use Webmis\Models\OrganisationAccount;
use Webmis\Models\OrganisationAccountPeer;
use Webmis\Models\OrganisationAccountQuery;

/**
 * Base class that represents a query for the 'Organisation_Account' table.
 *
 *
 *
 * @method OrganisationAccountQuery orderById($order = Criteria::ASC) Order by the id column
 * @method OrganisationAccountQuery orderByOrganisationId($order = Criteria::ASC) Order by the organisation_id column
 * @method OrganisationAccountQuery orderByBankname($order = Criteria::ASC) Order by the bankName column
 * @method OrganisationAccountQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method OrganisationAccountQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method OrganisationAccountQuery orderByBankId($order = Criteria::ASC) Order by the bank_id column
 * @method OrganisationAccountQuery orderByCash($order = Criteria::ASC) Order by the cash column
 *
 * @method OrganisationAccountQuery groupById() Group by the id column
 * @method OrganisationAccountQuery groupByOrganisationId() Group by the organisation_id column
 * @method OrganisationAccountQuery groupByBankname() Group by the bankName column
 * @method OrganisationAccountQuery groupByName() Group by the name column
 * @method OrganisationAccountQuery groupByNotes() Group by the notes column
 * @method OrganisationAccountQuery groupByBankId() Group by the bank_id column
 * @method OrganisationAccountQuery groupByCash() Group by the cash column
 *
 * @method OrganisationAccountQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method OrganisationAccountQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method OrganisationAccountQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method OrganisationAccount findOne(PropelPDO $con = null) Return the first OrganisationAccount matching the query
 * @method OrganisationAccount findOneOrCreate(PropelPDO $con = null) Return the first OrganisationAccount matching the query, or a new OrganisationAccount object populated from the query conditions when no match is found
 *
 * @method OrganisationAccount findOneByOrganisationId(int $organisation_id) Return the first OrganisationAccount filtered by the organisation_id column
 * @method OrganisationAccount findOneByBankname(string $bankName) Return the first OrganisationAccount filtered by the bankName column
 * @method OrganisationAccount findOneByName(string $name) Return the first OrganisationAccount filtered by the name column
 * @method OrganisationAccount findOneByNotes(string $notes) Return the first OrganisationAccount filtered by the notes column
 * @method OrganisationAccount findOneByBankId(int $bank_id) Return the first OrganisationAccount filtered by the bank_id column
 * @method OrganisationAccount findOneByCash(boolean $cash) Return the first OrganisationAccount filtered by the cash column
 *
 * @method array findById(int $id) Return OrganisationAccount objects filtered by the id column
 * @method array findByOrganisationId(int $organisation_id) Return OrganisationAccount objects filtered by the organisation_id column
 * @method array findByBankname(string $bankName) Return OrganisationAccount objects filtered by the bankName column
 * @method array findByName(string $name) Return OrganisationAccount objects filtered by the name column
 * @method array findByNotes(string $notes) Return OrganisationAccount objects filtered by the notes column
 * @method array findByBankId(int $bank_id) Return OrganisationAccount objects filtered by the bank_id column
 * @method array findByCash(boolean $cash) Return OrganisationAccount objects filtered by the cash column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseOrganisationAccountQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseOrganisationAccountQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\OrganisationAccount', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new OrganisationAccountQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   OrganisationAccountQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return OrganisationAccountQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof OrganisationAccountQuery) {
            return $criteria;
        }
        $query = new OrganisationAccountQuery();
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
     * @return   OrganisationAccount|OrganisationAccount[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = OrganisationAccountPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(OrganisationAccountPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 OrganisationAccount A model object, or null if the key is not found
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
     * @return                 OrganisationAccount A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `organisation_id`, `bankName`, `name`, `notes`, `bank_id`, `cash` FROM `Organisation_Account` WHERE `id` = :p0';
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
            $obj = new OrganisationAccount();
            $obj->hydrate($row);
            OrganisationAccountPeer::addInstanceToPool($obj, (string) $key);
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
     * @return OrganisationAccount|OrganisationAccount[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|OrganisationAccount[]|mixed the list of results, formatted by the current formatter
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
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrganisationAccountPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrganisationAccountPeer::ID, $keys, Criteria::IN);
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
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrganisationAccountPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrganisationAccountPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationAccountPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the organisation_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrganisationId(1234); // WHERE organisation_id = 1234
     * $query->filterByOrganisationId(array(12, 34)); // WHERE organisation_id IN (12, 34)
     * $query->filterByOrganisationId(array('min' => 12)); // WHERE organisation_id >= 12
     * $query->filterByOrganisationId(array('max' => 12)); // WHERE organisation_id <= 12
     * </code>
     *
     * @param     mixed $organisationId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByOrganisationId($organisationId = null, $comparison = null)
    {
        if (is_array($organisationId)) {
            $useMinMax = false;
            if (isset($organisationId['min'])) {
                $this->addUsingAlias(OrganisationAccountPeer::ORGANISATION_ID, $organisationId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($organisationId['max'])) {
                $this->addUsingAlias(OrganisationAccountPeer::ORGANISATION_ID, $organisationId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationAccountPeer::ORGANISATION_ID, $organisationId, $comparison);
    }

    /**
     * Filter the query on the bankName column
     *
     * Example usage:
     * <code>
     * $query->filterByBankname('fooValue');   // WHERE bankName = 'fooValue'
     * $query->filterByBankname('%fooValue%'); // WHERE bankName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bankname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByBankname($bankname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bankname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bankname)) {
                $bankname = str_replace('*', '%', $bankname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationAccountPeer::BANKNAME, $bankname, $comparison);
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
     * @return OrganisationAccountQuery The current query, for fluid interface
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

        return $this->addUsingAlias(OrganisationAccountPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the notes column
     *
     * Example usage:
     * <code>
     * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
     * $query->filterByNotes('%fooValue%'); // WHERE notes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $notes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByNotes($notes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($notes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $notes)) {
                $notes = str_replace('*', '%', $notes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(OrganisationAccountPeer::NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the bank_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBankId(1234); // WHERE bank_id = 1234
     * $query->filterByBankId(array(12, 34)); // WHERE bank_id IN (12, 34)
     * $query->filterByBankId(array('min' => 12)); // WHERE bank_id >= 12
     * $query->filterByBankId(array('max' => 12)); // WHERE bank_id <= 12
     * </code>
     *
     * @param     mixed $bankId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByBankId($bankId = null, $comparison = null)
    {
        if (is_array($bankId)) {
            $useMinMax = false;
            if (isset($bankId['min'])) {
                $this->addUsingAlias(OrganisationAccountPeer::BANK_ID, $bankId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bankId['max'])) {
                $this->addUsingAlias(OrganisationAccountPeer::BANK_ID, $bankId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrganisationAccountPeer::BANK_ID, $bankId, $comparison);
    }

    /**
     * Filter the query on the cash column
     *
     * Example usage:
     * <code>
     * $query->filterByCash(true); // WHERE cash = true
     * $query->filterByCash('yes'); // WHERE cash = true
     * </code>
     *
     * @param     boolean|string $cash The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function filterByCash($cash = null, $comparison = null)
    {
        if (is_string($cash)) {
            $cash = in_array(strtolower($cash), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OrganisationAccountPeer::CASH, $cash, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   OrganisationAccount $organisationAccount Object to remove from the list of results
     *
     * @return OrganisationAccountQuery The current query, for fluid interface
     */
    public function prune($organisationAccount = null)
    {
        if ($organisationAccount) {
            $this->addUsingAlias(OrganisationAccountPeer::ID, $organisationAccount->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
