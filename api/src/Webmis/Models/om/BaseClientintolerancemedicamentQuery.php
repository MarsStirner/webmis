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
use Webmis\Models\Clientintolerancemedicament;
use Webmis\Models\ClientintolerancemedicamentPeer;
use Webmis\Models\ClientintolerancemedicamentQuery;

/**
 * Base class that represents a query for the 'ClientIntoleranceMedicament' table.
 *
 *
 *
 * @method ClientintolerancemedicamentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientintolerancemedicamentQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientintolerancemedicamentQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientintolerancemedicamentQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientintolerancemedicamentQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientintolerancemedicamentQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientintolerancemedicamentQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method ClientintolerancemedicamentQuery orderByNamemedicament($order = Criteria::ASC) Order by the nameMedicament column
 * @method ClientintolerancemedicamentQuery orderByPower($order = Criteria::ASC) Order by the power column
 * @method ClientintolerancemedicamentQuery orderByCreatedate($order = Criteria::ASC) Order by the createDate column
 * @method ClientintolerancemedicamentQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method ClientintolerancemedicamentQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ClientintolerancemedicamentQuery groupById() Group by the id column
 * @method ClientintolerancemedicamentQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientintolerancemedicamentQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientintolerancemedicamentQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientintolerancemedicamentQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientintolerancemedicamentQuery groupByDeleted() Group by the deleted column
 * @method ClientintolerancemedicamentQuery groupByClientId() Group by the client_id column
 * @method ClientintolerancemedicamentQuery groupByNamemedicament() Group by the nameMedicament column
 * @method ClientintolerancemedicamentQuery groupByPower() Group by the power column
 * @method ClientintolerancemedicamentQuery groupByCreatedate() Group by the createDate column
 * @method ClientintolerancemedicamentQuery groupByNotes() Group by the notes column
 * @method ClientintolerancemedicamentQuery groupByVersion() Group by the version column
 *
 * @method ClientintolerancemedicamentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientintolerancemedicamentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientintolerancemedicamentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Clientintolerancemedicament findOne(PropelPDO $con = null) Return the first Clientintolerancemedicament matching the query
 * @method Clientintolerancemedicament findOneOrCreate(PropelPDO $con = null) Return the first Clientintolerancemedicament matching the query, or a new Clientintolerancemedicament object populated from the query conditions when no match is found
 *
 * @method Clientintolerancemedicament findOneByCreatedatetime(string $createDatetime) Return the first Clientintolerancemedicament filtered by the createDatetime column
 * @method Clientintolerancemedicament findOneByCreatepersonId(int $createPerson_id) Return the first Clientintolerancemedicament filtered by the createPerson_id column
 * @method Clientintolerancemedicament findOneByModifydatetime(string $modifyDatetime) Return the first Clientintolerancemedicament filtered by the modifyDatetime column
 * @method Clientintolerancemedicament findOneByModifypersonId(int $modifyPerson_id) Return the first Clientintolerancemedicament filtered by the modifyPerson_id column
 * @method Clientintolerancemedicament findOneByDeleted(boolean $deleted) Return the first Clientintolerancemedicament filtered by the deleted column
 * @method Clientintolerancemedicament findOneByClientId(int $client_id) Return the first Clientintolerancemedicament filtered by the client_id column
 * @method Clientintolerancemedicament findOneByNamemedicament(string $nameMedicament) Return the first Clientintolerancemedicament filtered by the nameMedicament column
 * @method Clientintolerancemedicament findOneByPower(int $power) Return the first Clientintolerancemedicament filtered by the power column
 * @method Clientintolerancemedicament findOneByCreatedate(string $createDate) Return the first Clientintolerancemedicament filtered by the createDate column
 * @method Clientintolerancemedicament findOneByNotes(string $notes) Return the first Clientintolerancemedicament filtered by the notes column
 * @method Clientintolerancemedicament findOneByVersion(int $version) Return the first Clientintolerancemedicament filtered by the version column
 *
 * @method array findById(int $id) Return Clientintolerancemedicament objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Clientintolerancemedicament objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Clientintolerancemedicament objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Clientintolerancemedicament objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Clientintolerancemedicament objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Clientintolerancemedicament objects filtered by the deleted column
 * @method array findByClientId(int $client_id) Return Clientintolerancemedicament objects filtered by the client_id column
 * @method array findByNamemedicament(string $nameMedicament) Return Clientintolerancemedicament objects filtered by the nameMedicament column
 * @method array findByPower(int $power) Return Clientintolerancemedicament objects filtered by the power column
 * @method array findByCreatedate(string $createDate) Return Clientintolerancemedicament objects filtered by the createDate column
 * @method array findByNotes(string $notes) Return Clientintolerancemedicament objects filtered by the notes column
 * @method array findByVersion(int $version) Return Clientintolerancemedicament objects filtered by the version column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientintolerancemedicamentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientintolerancemedicamentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Clientintolerancemedicament', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientintolerancemedicamentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientintolerancemedicamentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientintolerancemedicamentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientintolerancemedicamentQuery) {
            return $criteria;
        }
        $query = new ClientintolerancemedicamentQuery();
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
     * @return   Clientintolerancemedicament|Clientintolerancemedicament[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientintolerancemedicamentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientintolerancemedicamentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Clientintolerancemedicament A model object, or null if the key is not found
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
     * @return                 Clientintolerancemedicament A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `client_id`, `nameMedicament`, `power`, `createDate`, `notes`, `version` FROM `ClientIntoleranceMedicament` WHERE `id` = :p0';
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
            $obj = new Clientintolerancemedicament();
            $obj->hydrate($row);
            ClientintolerancemedicamentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Clientintolerancemedicament|Clientintolerancemedicament[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Clientintolerancemedicament[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::ID, $keys, Criteria::IN);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::ID, $id, $comparison);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id >= 12
     * $query->filterByClientId(array('max' => 12)); // WHERE client_id <= 12
     * </code>
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the nameMedicament column
     *
     * Example usage:
     * <code>
     * $query->filterByNamemedicament('fooValue');   // WHERE nameMedicament = 'fooValue'
     * $query->filterByNamemedicament('%fooValue%'); // WHERE nameMedicament LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namemedicament The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByNamemedicament($namemedicament = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namemedicament)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namemedicament)) {
                $namemedicament = str_replace('*', '%', $namemedicament);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::NAMEMEDICAMENT, $namemedicament, $comparison);
    }

    /**
     * Filter the query on the power column
     *
     * Example usage:
     * <code>
     * $query->filterByPower(1234); // WHERE power = 1234
     * $query->filterByPower(array(12, 34)); // WHERE power IN (12, 34)
     * $query->filterByPower(array('min' => 12)); // WHERE power >= 12
     * $query->filterByPower(array('max' => 12)); // WHERE power <= 12
     * </code>
     *
     * @param     mixed $power The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByPower($power = null, $comparison = null)
    {
        if (is_array($power)) {
            $useMinMax = false;
            if (isset($power['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::POWER, $power['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($power['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::POWER, $power['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::POWER, $power, $comparison);
    }

    /**
     * Filter the query on the createDate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedate('2011-03-14'); // WHERE createDate = '2011-03-14'
     * $query->filterByCreatedate('now'); // WHERE createDate = '2011-03-14'
     * $query->filterByCreatedate(array('max' => 'yesterday')); // WHERE createDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByCreatedate($createdate = null, $comparison = null)
    {
        if (is_array($createdate)) {
            $useMinMax = false;
            if (isset($createdate['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEDATE, $createdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdate['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEDATE, $createdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::CREATEDATE, $createdate, $comparison);
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
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::NOTES, $notes, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientintolerancemedicamentPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientintolerancemedicamentPeer::VERSION, $version, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Clientintolerancemedicament $clientintolerancemedicament Object to remove from the list of results
     *
     * @return ClientintolerancemedicamentQuery The current query, for fluid interface
     */
    public function prune($clientintolerancemedicament = null)
    {
        if ($clientintolerancemedicament) {
            $this->addUsingAlias(ClientintolerancemedicamentPeer::ID, $clientintolerancemedicament->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
