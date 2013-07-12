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
use Webmis\Models\Addresshouse;
use Webmis\Models\AddresshousePeer;
use Webmis\Models\AddresshouseQuery;

/**
 * Base class that represents a query for the 'AddressHouse' table.
 *
 *
 *
 * @method AddresshouseQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AddresshouseQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method AddresshouseQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method AddresshouseQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method AddresshouseQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method AddresshouseQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method AddresshouseQuery orderByKladrcode($order = Criteria::ASC) Order by the KLADRCode column
 * @method AddresshouseQuery orderByKladrstreetcode($order = Criteria::ASC) Order by the KLADRStreetCode column
 * @method AddresshouseQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method AddresshouseQuery orderByCorpus($order = Criteria::ASC) Order by the corpus column
 *
 * @method AddresshouseQuery groupById() Group by the id column
 * @method AddresshouseQuery groupByCreatedatetime() Group by the createDatetime column
 * @method AddresshouseQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method AddresshouseQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method AddresshouseQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method AddresshouseQuery groupByDeleted() Group by the deleted column
 * @method AddresshouseQuery groupByKladrcode() Group by the KLADRCode column
 * @method AddresshouseQuery groupByKladrstreetcode() Group by the KLADRStreetCode column
 * @method AddresshouseQuery groupByNumber() Group by the number column
 * @method AddresshouseQuery groupByCorpus() Group by the corpus column
 *
 * @method AddresshouseQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AddresshouseQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AddresshouseQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Addresshouse findOne(PropelPDO $con = null) Return the first Addresshouse matching the query
 * @method Addresshouse findOneOrCreate(PropelPDO $con = null) Return the first Addresshouse matching the query, or a new Addresshouse object populated from the query conditions when no match is found
 *
 * @method Addresshouse findOneByCreatedatetime(string $createDatetime) Return the first Addresshouse filtered by the createDatetime column
 * @method Addresshouse findOneByCreatepersonId(int $createPerson_id) Return the first Addresshouse filtered by the createPerson_id column
 * @method Addresshouse findOneByModifydatetime(string $modifyDatetime) Return the first Addresshouse filtered by the modifyDatetime column
 * @method Addresshouse findOneByModifypersonId(int $modifyPerson_id) Return the first Addresshouse filtered by the modifyPerson_id column
 * @method Addresshouse findOneByDeleted(boolean $deleted) Return the first Addresshouse filtered by the deleted column
 * @method Addresshouse findOneByKladrcode(string $KLADRCode) Return the first Addresshouse filtered by the KLADRCode column
 * @method Addresshouse findOneByKladrstreetcode(string $KLADRStreetCode) Return the first Addresshouse filtered by the KLADRStreetCode column
 * @method Addresshouse findOneByNumber(string $number) Return the first Addresshouse filtered by the number column
 * @method Addresshouse findOneByCorpus(string $corpus) Return the first Addresshouse filtered by the corpus column
 *
 * @method array findById(int $id) Return Addresshouse objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Addresshouse objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Addresshouse objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Addresshouse objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Addresshouse objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Addresshouse objects filtered by the deleted column
 * @method array findByKladrcode(string $KLADRCode) Return Addresshouse objects filtered by the KLADRCode column
 * @method array findByKladrstreetcode(string $KLADRStreetCode) Return Addresshouse objects filtered by the KLADRStreetCode column
 * @method array findByNumber(string $number) Return Addresshouse objects filtered by the number column
 * @method array findByCorpus(string $corpus) Return Addresshouse objects filtered by the corpus column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseAddresshouseQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAddresshouseQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Addresshouse', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AddresshouseQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AddresshouseQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AddresshouseQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AddresshouseQuery) {
            return $criteria;
        }
        $query = new AddresshouseQuery();
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
     * @return   Addresshouse|Addresshouse[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AddresshousePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AddresshousePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Addresshouse A model object, or null if the key is not found
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
     * @return                 Addresshouse A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `KLADRCode`, `KLADRStreetCode`, `number`, `corpus` FROM `AddressHouse` WHERE `id` = :p0';
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
            $obj = new Addresshouse();
            $obj->hydrate($row);
            AddresshousePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Addresshouse|Addresshouse[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Addresshouse[]|mixed the list of results, formatted by the current formatter
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AddresshousePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AddresshousePeer::ID, $keys, Criteria::IN);
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AddresshousePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AddresshousePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::ID, $id, $comparison);
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(AddresshousePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(AddresshousePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(AddresshousePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(AddresshousePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(AddresshousePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(AddresshousePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(AddresshousePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(AddresshousePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(AddresshousePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the KLADRCode column
     *
     * Example usage:
     * <code>
     * $query->filterByKladrcode('fooValue');   // WHERE KLADRCode = 'fooValue'
     * $query->filterByKladrcode('%fooValue%'); // WHERE KLADRCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kladrcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByKladrcode($kladrcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kladrcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kladrcode)) {
                $kladrcode = str_replace('*', '%', $kladrcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::KLADRCODE, $kladrcode, $comparison);
    }

    /**
     * Filter the query on the KLADRStreetCode column
     *
     * Example usage:
     * <code>
     * $query->filterByKladrstreetcode('fooValue');   // WHERE KLADRStreetCode = 'fooValue'
     * $query->filterByKladrstreetcode('%fooValue%'); // WHERE KLADRStreetCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kladrstreetcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByKladrstreetcode($kladrstreetcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kladrstreetcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kladrstreetcode)) {
                $kladrstreetcode = str_replace('*', '%', $kladrstreetcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::KLADRSTREETCODE, $kladrstreetcode, $comparison);
    }

    /**
     * Filter the query on the number column
     *
     * Example usage:
     * <code>
     * $query->filterByNumber('fooValue');   // WHERE number = 'fooValue'
     * $query->filterByNumber('%fooValue%'); // WHERE number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $number The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByNumber($number = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($number)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $number)) {
                $number = str_replace('*', '%', $number);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::NUMBER, $number, $comparison);
    }

    /**
     * Filter the query on the corpus column
     *
     * Example usage:
     * <code>
     * $query->filterByCorpus('fooValue');   // WHERE corpus = 'fooValue'
     * $query->filterByCorpus('%fooValue%'); // WHERE corpus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $corpus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function filterByCorpus($corpus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($corpus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $corpus)) {
                $corpus = str_replace('*', '%', $corpus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddresshousePeer::CORPUS, $corpus, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Addresshouse $addresshouse Object to remove from the list of results
     *
     * @return AddresshouseQuery The current query, for fluid interface
     */
    public function prune($addresshouse = null)
    {
        if ($addresshouse) {
            $this->addUsingAlias(AddresshousePeer::ID, $addresshouse->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
