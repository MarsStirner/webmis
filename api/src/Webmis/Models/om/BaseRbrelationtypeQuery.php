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
use Webmis\Models\Rbrelationtype;
use Webmis\Models\RbrelationtypePeer;
use Webmis\Models\RbrelationtypeQuery;

/**
 * Base class that represents a query for the 'rbRelationType' table.
 *
 *
 *
 * @method RbrelationtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbrelationtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbrelationtypeQuery orderByLeftname($order = Criteria::ASC) Order by the leftName column
 * @method RbrelationtypeQuery orderByRightname($order = Criteria::ASC) Order by the rightName column
 * @method RbrelationtypeQuery orderByIsdirectgenetic($order = Criteria::ASC) Order by the isDirectGenetic column
 * @method RbrelationtypeQuery orderByIsbackwardgenetic($order = Criteria::ASC) Order by the isBackwardGenetic column
 * @method RbrelationtypeQuery orderByIsdirectrepresentative($order = Criteria::ASC) Order by the isDirectRepresentative column
 * @method RbrelationtypeQuery orderByIsbackwardrepresentative($order = Criteria::ASC) Order by the isBackwardRepresentative column
 * @method RbrelationtypeQuery orderByIsdirectepidemic($order = Criteria::ASC) Order by the isDirectEpidemic column
 * @method RbrelationtypeQuery orderByIsbackwardepidemic($order = Criteria::ASC) Order by the isBackwardEpidemic column
 * @method RbrelationtypeQuery orderByIsdirectdonation($order = Criteria::ASC) Order by the isDirectDonation column
 * @method RbrelationtypeQuery orderByIsbackwarddonation($order = Criteria::ASC) Order by the isBackwardDonation column
 * @method RbrelationtypeQuery orderByLeftsex($order = Criteria::ASC) Order by the leftSex column
 * @method RbrelationtypeQuery orderByRightsex($order = Criteria::ASC) Order by the rightSex column
 * @method RbrelationtypeQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method RbrelationtypeQuery orderByRegionalreversecode($order = Criteria::ASC) Order by the regionalReverseCode column
 *
 * @method RbrelationtypeQuery groupById() Group by the id column
 * @method RbrelationtypeQuery groupByCode() Group by the code column
 * @method RbrelationtypeQuery groupByLeftname() Group by the leftName column
 * @method RbrelationtypeQuery groupByRightname() Group by the rightName column
 * @method RbrelationtypeQuery groupByIsdirectgenetic() Group by the isDirectGenetic column
 * @method RbrelationtypeQuery groupByIsbackwardgenetic() Group by the isBackwardGenetic column
 * @method RbrelationtypeQuery groupByIsdirectrepresentative() Group by the isDirectRepresentative column
 * @method RbrelationtypeQuery groupByIsbackwardrepresentative() Group by the isBackwardRepresentative column
 * @method RbrelationtypeQuery groupByIsdirectepidemic() Group by the isDirectEpidemic column
 * @method RbrelationtypeQuery groupByIsbackwardepidemic() Group by the isBackwardEpidemic column
 * @method RbrelationtypeQuery groupByIsdirectdonation() Group by the isDirectDonation column
 * @method RbrelationtypeQuery groupByIsbackwarddonation() Group by the isBackwardDonation column
 * @method RbrelationtypeQuery groupByLeftsex() Group by the leftSex column
 * @method RbrelationtypeQuery groupByRightsex() Group by the rightSex column
 * @method RbrelationtypeQuery groupByRegionalcode() Group by the regionalCode column
 * @method RbrelationtypeQuery groupByRegionalreversecode() Group by the regionalReverseCode column
 *
 * @method RbrelationtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbrelationtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbrelationtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbrelationtype findOne(PropelPDO $con = null) Return the first Rbrelationtype matching the query
 * @method Rbrelationtype findOneOrCreate(PropelPDO $con = null) Return the first Rbrelationtype matching the query, or a new Rbrelationtype object populated from the query conditions when no match is found
 *
 * @method Rbrelationtype findOneByCode(string $code) Return the first Rbrelationtype filtered by the code column
 * @method Rbrelationtype findOneByLeftname(string $leftName) Return the first Rbrelationtype filtered by the leftName column
 * @method Rbrelationtype findOneByRightname(string $rightName) Return the first Rbrelationtype filtered by the rightName column
 * @method Rbrelationtype findOneByIsdirectgenetic(boolean $isDirectGenetic) Return the first Rbrelationtype filtered by the isDirectGenetic column
 * @method Rbrelationtype findOneByIsbackwardgenetic(boolean $isBackwardGenetic) Return the first Rbrelationtype filtered by the isBackwardGenetic column
 * @method Rbrelationtype findOneByIsdirectrepresentative(boolean $isDirectRepresentative) Return the first Rbrelationtype filtered by the isDirectRepresentative column
 * @method Rbrelationtype findOneByIsbackwardrepresentative(boolean $isBackwardRepresentative) Return the first Rbrelationtype filtered by the isBackwardRepresentative column
 * @method Rbrelationtype findOneByIsdirectepidemic(boolean $isDirectEpidemic) Return the first Rbrelationtype filtered by the isDirectEpidemic column
 * @method Rbrelationtype findOneByIsbackwardepidemic(boolean $isBackwardEpidemic) Return the first Rbrelationtype filtered by the isBackwardEpidemic column
 * @method Rbrelationtype findOneByIsdirectdonation(boolean $isDirectDonation) Return the first Rbrelationtype filtered by the isDirectDonation column
 * @method Rbrelationtype findOneByIsbackwarddonation(boolean $isBackwardDonation) Return the first Rbrelationtype filtered by the isBackwardDonation column
 * @method Rbrelationtype findOneByLeftsex(boolean $leftSex) Return the first Rbrelationtype filtered by the leftSex column
 * @method Rbrelationtype findOneByRightsex(boolean $rightSex) Return the first Rbrelationtype filtered by the rightSex column
 * @method Rbrelationtype findOneByRegionalcode(string $regionalCode) Return the first Rbrelationtype filtered by the regionalCode column
 * @method Rbrelationtype findOneByRegionalreversecode(string $regionalReverseCode) Return the first Rbrelationtype filtered by the regionalReverseCode column
 *
 * @method array findById(int $id) Return Rbrelationtype objects filtered by the id column
 * @method array findByCode(string $code) Return Rbrelationtype objects filtered by the code column
 * @method array findByLeftname(string $leftName) Return Rbrelationtype objects filtered by the leftName column
 * @method array findByRightname(string $rightName) Return Rbrelationtype objects filtered by the rightName column
 * @method array findByIsdirectgenetic(boolean $isDirectGenetic) Return Rbrelationtype objects filtered by the isDirectGenetic column
 * @method array findByIsbackwardgenetic(boolean $isBackwardGenetic) Return Rbrelationtype objects filtered by the isBackwardGenetic column
 * @method array findByIsdirectrepresentative(boolean $isDirectRepresentative) Return Rbrelationtype objects filtered by the isDirectRepresentative column
 * @method array findByIsbackwardrepresentative(boolean $isBackwardRepresentative) Return Rbrelationtype objects filtered by the isBackwardRepresentative column
 * @method array findByIsdirectepidemic(boolean $isDirectEpidemic) Return Rbrelationtype objects filtered by the isDirectEpidemic column
 * @method array findByIsbackwardepidemic(boolean $isBackwardEpidemic) Return Rbrelationtype objects filtered by the isBackwardEpidemic column
 * @method array findByIsdirectdonation(boolean $isDirectDonation) Return Rbrelationtype objects filtered by the isDirectDonation column
 * @method array findByIsbackwarddonation(boolean $isBackwardDonation) Return Rbrelationtype objects filtered by the isBackwardDonation column
 * @method array findByLeftsex(boolean $leftSex) Return Rbrelationtype objects filtered by the leftSex column
 * @method array findByRightsex(boolean $rightSex) Return Rbrelationtype objects filtered by the rightSex column
 * @method array findByRegionalcode(string $regionalCode) Return Rbrelationtype objects filtered by the regionalCode column
 * @method array findByRegionalreversecode(string $regionalReverseCode) Return Rbrelationtype objects filtered by the regionalReverseCode column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbrelationtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbrelationtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbrelationtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbrelationtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbrelationtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbrelationtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbrelationtypeQuery) {
            return $criteria;
        }
        $query = new RbrelationtypeQuery();
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
     * @return   Rbrelationtype|Rbrelationtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbrelationtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbrelationtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbrelationtype A model object, or null if the key is not found
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
     * @return                 Rbrelationtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `leftName`, `rightName`, `isDirectGenetic`, `isBackwardGenetic`, `isDirectRepresentative`, `isBackwardRepresentative`, `isDirectEpidemic`, `isBackwardEpidemic`, `isDirectDonation`, `isBackwardDonation`, `leftSex`, `rightSex`, `regionalCode`, `regionalReverseCode` FROM `rbRelationType` WHERE `id` = :p0';
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
            $obj = new Rbrelationtype();
            $obj->hydrate($row);
            RbrelationtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbrelationtype|Rbrelationtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbrelationtype[]|mixed the list of results, formatted by the current formatter
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
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbrelationtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbrelationtypePeer::ID, $keys, Criteria::IN);
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
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbrelationtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbrelationtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbrelationtypePeer::ID, $id, $comparison);
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
     * @return RbrelationtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbrelationtypePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the leftName column
     *
     * Example usage:
     * <code>
     * $query->filterByLeftname('fooValue');   // WHERE leftName = 'fooValue'
     * $query->filterByLeftname('%fooValue%'); // WHERE leftName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $leftname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByLeftname($leftname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($leftname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $leftname)) {
                $leftname = str_replace('*', '%', $leftname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbrelationtypePeer::LEFTNAME, $leftname, $comparison);
    }

    /**
     * Filter the query on the rightName column
     *
     * Example usage:
     * <code>
     * $query->filterByRightname('fooValue');   // WHERE rightName = 'fooValue'
     * $query->filterByRightname('%fooValue%'); // WHERE rightName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rightname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByRightname($rightname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rightname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rightname)) {
                $rightname = str_replace('*', '%', $rightname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbrelationtypePeer::RIGHTNAME, $rightname, $comparison);
    }

    /**
     * Filter the query on the isDirectGenetic column
     *
     * Example usage:
     * <code>
     * $query->filterByIsdirectgenetic(true); // WHERE isDirectGenetic = true
     * $query->filterByIsdirectgenetic('yes'); // WHERE isDirectGenetic = true
     * </code>
     *
     * @param     boolean|string $isdirectgenetic The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsdirectgenetic($isdirectgenetic = null, $comparison = null)
    {
        if (is_string($isdirectgenetic)) {
            $isdirectgenetic = in_array(strtolower($isdirectgenetic), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISDIRECTGENETIC, $isdirectgenetic, $comparison);
    }

    /**
     * Filter the query on the isBackwardGenetic column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbackwardgenetic(true); // WHERE isBackwardGenetic = true
     * $query->filterByIsbackwardgenetic('yes'); // WHERE isBackwardGenetic = true
     * </code>
     *
     * @param     boolean|string $isbackwardgenetic The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsbackwardgenetic($isbackwardgenetic = null, $comparison = null)
    {
        if (is_string($isbackwardgenetic)) {
            $isbackwardgenetic = in_array(strtolower($isbackwardgenetic), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISBACKWARDGENETIC, $isbackwardgenetic, $comparison);
    }

    /**
     * Filter the query on the isDirectRepresentative column
     *
     * Example usage:
     * <code>
     * $query->filterByIsdirectrepresentative(true); // WHERE isDirectRepresentative = true
     * $query->filterByIsdirectrepresentative('yes'); // WHERE isDirectRepresentative = true
     * </code>
     *
     * @param     boolean|string $isdirectrepresentative The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsdirectrepresentative($isdirectrepresentative = null, $comparison = null)
    {
        if (is_string($isdirectrepresentative)) {
            $isdirectrepresentative = in_array(strtolower($isdirectrepresentative), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISDIRECTREPRESENTATIVE, $isdirectrepresentative, $comparison);
    }

    /**
     * Filter the query on the isBackwardRepresentative column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbackwardrepresentative(true); // WHERE isBackwardRepresentative = true
     * $query->filterByIsbackwardrepresentative('yes'); // WHERE isBackwardRepresentative = true
     * </code>
     *
     * @param     boolean|string $isbackwardrepresentative The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsbackwardrepresentative($isbackwardrepresentative = null, $comparison = null)
    {
        if (is_string($isbackwardrepresentative)) {
            $isbackwardrepresentative = in_array(strtolower($isbackwardrepresentative), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISBACKWARDREPRESENTATIVE, $isbackwardrepresentative, $comparison);
    }

    /**
     * Filter the query on the isDirectEpidemic column
     *
     * Example usage:
     * <code>
     * $query->filterByIsdirectepidemic(true); // WHERE isDirectEpidemic = true
     * $query->filterByIsdirectepidemic('yes'); // WHERE isDirectEpidemic = true
     * </code>
     *
     * @param     boolean|string $isdirectepidemic The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsdirectepidemic($isdirectepidemic = null, $comparison = null)
    {
        if (is_string($isdirectepidemic)) {
            $isdirectepidemic = in_array(strtolower($isdirectepidemic), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISDIRECTEPIDEMIC, $isdirectepidemic, $comparison);
    }

    /**
     * Filter the query on the isBackwardEpidemic column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbackwardepidemic(true); // WHERE isBackwardEpidemic = true
     * $query->filterByIsbackwardepidemic('yes'); // WHERE isBackwardEpidemic = true
     * </code>
     *
     * @param     boolean|string $isbackwardepidemic The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsbackwardepidemic($isbackwardepidemic = null, $comparison = null)
    {
        if (is_string($isbackwardepidemic)) {
            $isbackwardepidemic = in_array(strtolower($isbackwardepidemic), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISBACKWARDEPIDEMIC, $isbackwardepidemic, $comparison);
    }

    /**
     * Filter the query on the isDirectDonation column
     *
     * Example usage:
     * <code>
     * $query->filterByIsdirectdonation(true); // WHERE isDirectDonation = true
     * $query->filterByIsdirectdonation('yes'); // WHERE isDirectDonation = true
     * </code>
     *
     * @param     boolean|string $isdirectdonation The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsdirectdonation($isdirectdonation = null, $comparison = null)
    {
        if (is_string($isdirectdonation)) {
            $isdirectdonation = in_array(strtolower($isdirectdonation), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISDIRECTDONATION, $isdirectdonation, $comparison);
    }

    /**
     * Filter the query on the isBackwardDonation column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbackwarddonation(true); // WHERE isBackwardDonation = true
     * $query->filterByIsbackwarddonation('yes'); // WHERE isBackwardDonation = true
     * </code>
     *
     * @param     boolean|string $isbackwarddonation The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByIsbackwarddonation($isbackwarddonation = null, $comparison = null)
    {
        if (is_string($isbackwarddonation)) {
            $isbackwarddonation = in_array(strtolower($isbackwarddonation), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::ISBACKWARDDONATION, $isbackwarddonation, $comparison);
    }

    /**
     * Filter the query on the leftSex column
     *
     * Example usage:
     * <code>
     * $query->filterByLeftsex(true); // WHERE leftSex = true
     * $query->filterByLeftsex('yes'); // WHERE leftSex = true
     * </code>
     *
     * @param     boolean|string $leftsex The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByLeftsex($leftsex = null, $comparison = null)
    {
        if (is_string($leftsex)) {
            $leftsex = in_array(strtolower($leftsex), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::LEFTSEX, $leftsex, $comparison);
    }

    /**
     * Filter the query on the rightSex column
     *
     * Example usage:
     * <code>
     * $query->filterByRightsex(true); // WHERE rightSex = true
     * $query->filterByRightsex('yes'); // WHERE rightSex = true
     * </code>
     *
     * @param     boolean|string $rightsex The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByRightsex($rightsex = null, $comparison = null)
    {
        if (is_string($rightsex)) {
            $rightsex = in_array(strtolower($rightsex), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbrelationtypePeer::RIGHTSEX, $rightsex, $comparison);
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
     * @return RbrelationtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbrelationtypePeer::REGIONALCODE, $regionalcode, $comparison);
    }

    /**
     * Filter the query on the regionalReverseCode column
     *
     * Example usage:
     * <code>
     * $query->filterByRegionalreversecode('fooValue');   // WHERE regionalReverseCode = 'fooValue'
     * $query->filterByRegionalreversecode('%fooValue%'); // WHERE regionalReverseCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regionalreversecode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function filterByRegionalreversecode($regionalreversecode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regionalreversecode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regionalreversecode)) {
                $regionalreversecode = str_replace('*', '%', $regionalreversecode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbrelationtypePeer::REGIONALREVERSECODE, $regionalreversecode, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbrelationtype $rbrelationtype Object to remove from the list of results
     *
     * @return RbrelationtypeQuery The current query, for fluid interface
     */
    public function prune($rbrelationtype = null)
    {
        if ($rbrelationtype) {
            $this->addUsingAlias(RbrelationtypePeer::ID, $rbrelationtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
