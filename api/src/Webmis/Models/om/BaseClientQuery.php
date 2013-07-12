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
use Webmis\Models\Client;
use Webmis\Models\ClientPeer;
use Webmis\Models\ClientQuery;
use Webmis\Models\Clientflatdirectory;
use Webmis\Models\Patientstohs;
use Webmis\Models\Takentissuejournal;

/**
 * Base class that represents a query for the 'Client' table.
 *
 *
 *
 * @method ClientQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ClientQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ClientQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ClientQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ClientQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ClientQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ClientQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method ClientQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method ClientQuery orderByPatrname($order = Criteria::ASC) Order by the patrName column
 * @method ClientQuery orderByBirthdate($order = Criteria::ASC) Order by the birthDate column
 * @method ClientQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method ClientQuery orderBySnils($order = Criteria::ASC) Order by the SNILS column
 * @method ClientQuery orderByBloodtypeId($order = Criteria::ASC) Order by the bloodType_id column
 * @method ClientQuery orderByBlooddate($order = Criteria::ASC) Order by the bloodDate column
 * @method ClientQuery orderByBloodnotes($order = Criteria::ASC) Order by the bloodNotes column
 * @method ClientQuery orderByGrowth($order = Criteria::ASC) Order by the growth column
 * @method ClientQuery orderByWeight($order = Criteria::ASC) Order by the weight column
 * @method ClientQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method ClientQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ClientQuery orderByBirthplace($order = Criteria::ASC) Order by the birthPlace column
 * @method ClientQuery orderByUuidId($order = Criteria::ASC) Order by the uuid_id column
 *
 * @method ClientQuery groupById() Group by the id column
 * @method ClientQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ClientQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ClientQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ClientQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ClientQuery groupByDeleted() Group by the deleted column
 * @method ClientQuery groupByLastname() Group by the lastName column
 * @method ClientQuery groupByFirstname() Group by the firstName column
 * @method ClientQuery groupByPatrname() Group by the patrName column
 * @method ClientQuery groupByBirthdate() Group by the birthDate column
 * @method ClientQuery groupBySex() Group by the sex column
 * @method ClientQuery groupBySnils() Group by the SNILS column
 * @method ClientQuery groupByBloodtypeId() Group by the bloodType_id column
 * @method ClientQuery groupByBlooddate() Group by the bloodDate column
 * @method ClientQuery groupByBloodnotes() Group by the bloodNotes column
 * @method ClientQuery groupByGrowth() Group by the growth column
 * @method ClientQuery groupByWeight() Group by the weight column
 * @method ClientQuery groupByNotes() Group by the notes column
 * @method ClientQuery groupByVersion() Group by the version column
 * @method ClientQuery groupByBirthplace() Group by the birthPlace column
 * @method ClientQuery groupByUuidId() Group by the uuid_id column
 *
 * @method ClientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ClientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ClientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ClientQuery leftJoinClientflatdirectory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clientflatdirectory relation
 * @method ClientQuery rightJoinClientflatdirectory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clientflatdirectory relation
 * @method ClientQuery innerJoinClientflatdirectory($relationAlias = null) Adds a INNER JOIN clause to the query using the Clientflatdirectory relation
 *
 * @method ClientQuery leftJoinPatientstohs($relationAlias = null) Adds a LEFT JOIN clause to the query using the Patientstohs relation
 * @method ClientQuery rightJoinPatientstohs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Patientstohs relation
 * @method ClientQuery innerJoinPatientstohs($relationAlias = null) Adds a INNER JOIN clause to the query using the Patientstohs relation
 *
 * @method ClientQuery leftJoinTakentissuejournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Takentissuejournal relation
 * @method ClientQuery rightJoinTakentissuejournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Takentissuejournal relation
 * @method ClientQuery innerJoinTakentissuejournal($relationAlias = null) Adds a INNER JOIN clause to the query using the Takentissuejournal relation
 *
 * @method Client findOne(PropelPDO $con = null) Return the first Client matching the query
 * @method Client findOneOrCreate(PropelPDO $con = null) Return the first Client matching the query, or a new Client object populated from the query conditions when no match is found
 *
 * @method Client findOneByCreatedatetime(string $createDatetime) Return the first Client filtered by the createDatetime column
 * @method Client findOneByCreatepersonId(int $createPerson_id) Return the first Client filtered by the createPerson_id column
 * @method Client findOneByModifydatetime(string $modifyDatetime) Return the first Client filtered by the modifyDatetime column
 * @method Client findOneByModifypersonId(int $modifyPerson_id) Return the first Client filtered by the modifyPerson_id column
 * @method Client findOneByDeleted(boolean $deleted) Return the first Client filtered by the deleted column
 * @method Client findOneByLastname(string $lastName) Return the first Client filtered by the lastName column
 * @method Client findOneByFirstname(string $firstName) Return the first Client filtered by the firstName column
 * @method Client findOneByPatrname(string $patrName) Return the first Client filtered by the patrName column
 * @method Client findOneByBirthdate(string $birthDate) Return the first Client filtered by the birthDate column
 * @method Client findOneBySex(int $sex) Return the first Client filtered by the sex column
 * @method Client findOneBySnils(string $SNILS) Return the first Client filtered by the SNILS column
 * @method Client findOneByBloodtypeId(int $bloodType_id) Return the first Client filtered by the bloodType_id column
 * @method Client findOneByBlooddate(string $bloodDate) Return the first Client filtered by the bloodDate column
 * @method Client findOneByBloodnotes(string $bloodNotes) Return the first Client filtered by the bloodNotes column
 * @method Client findOneByGrowth(string $growth) Return the first Client filtered by the growth column
 * @method Client findOneByWeight(string $weight) Return the first Client filtered by the weight column
 * @method Client findOneByNotes(string $notes) Return the first Client filtered by the notes column
 * @method Client findOneByVersion(int $version) Return the first Client filtered by the version column
 * @method Client findOneByBirthplace(string $birthPlace) Return the first Client filtered by the birthPlace column
 * @method Client findOneByUuidId(int $uuid_id) Return the first Client filtered by the uuid_id column
 *
 * @method array findById(int $id) Return Client objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Client objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Client objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Client objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Client objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Client objects filtered by the deleted column
 * @method array findByLastname(string $lastName) Return Client objects filtered by the lastName column
 * @method array findByFirstname(string $firstName) Return Client objects filtered by the firstName column
 * @method array findByPatrname(string $patrName) Return Client objects filtered by the patrName column
 * @method array findByBirthdate(string $birthDate) Return Client objects filtered by the birthDate column
 * @method array findBySex(int $sex) Return Client objects filtered by the sex column
 * @method array findBySnils(string $SNILS) Return Client objects filtered by the SNILS column
 * @method array findByBloodtypeId(int $bloodType_id) Return Client objects filtered by the bloodType_id column
 * @method array findByBlooddate(string $bloodDate) Return Client objects filtered by the bloodDate column
 * @method array findByBloodnotes(string $bloodNotes) Return Client objects filtered by the bloodNotes column
 * @method array findByGrowth(string $growth) Return Client objects filtered by the growth column
 * @method array findByWeight(string $weight) Return Client objects filtered by the weight column
 * @method array findByNotes(string $notes) Return Client objects filtered by the notes column
 * @method array findByVersion(int $version) Return Client objects filtered by the version column
 * @method array findByBirthplace(string $birthPlace) Return Client objects filtered by the birthPlace column
 * @method array findByUuidId(int $uuid_id) Return Client objects filtered by the uuid_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseClientQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseClientQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Client', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ClientQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ClientQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ClientQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ClientQuery) {
            return $criteria;
        }
        $query = new ClientQuery();
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
     * @return   Client|Client[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ClientPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ClientPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Client A model object, or null if the key is not found
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
     * @return                 Client A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `lastName`, `firstName`, `patrName`, `birthDate`, `sex`, `SNILS`, `bloodType_id`, `bloodDate`, `bloodNotes`, `growth`, `weight`, `notes`, `version`, `birthPlace`, `uuid_id` FROM `Client` WHERE `id` = :p0';
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
            $obj = new Client();
            $obj->hydrate($row);
            ClientPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Client|Client[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Client[]|mixed the list of results, formatted by the current formatter
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientPeer::ID, $keys, Criteria::IN);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::ID, $id, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ClientPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ClientPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ClientPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ClientPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ClientPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ClientPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ClientPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ClientPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ClientPeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the lastName column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastName = 'fooValue'
     * $query->filterByLastname('%fooValue%'); // WHERE lastName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastname)) {
                $lastname = str_replace('*', '%', $lastname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the firstName column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstName = 'fooValue'
     * $query->filterByFirstname('%fooValue%'); // WHERE firstName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstname)) {
                $firstname = str_replace('*', '%', $firstname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the patrName column
     *
     * Example usage:
     * <code>
     * $query->filterByPatrname('fooValue');   // WHERE patrName = 'fooValue'
     * $query->filterByPatrname('%fooValue%'); // WHERE patrName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $patrname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByPatrname($patrname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($patrname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $patrname)) {
                $patrname = str_replace('*', '%', $patrname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::PATRNAME, $patrname, $comparison);
    }

    /**
     * Filter the query on the birthDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthdate('2011-03-14'); // WHERE birthDate = '2011-03-14'
     * $query->filterByBirthdate('now'); // WHERE birthDate = '2011-03-14'
     * $query->filterByBirthdate(array('max' => 'yesterday')); // WHERE birthDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $birthdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByBirthdate($birthdate = null, $comparison = null)
    {
        if (is_array($birthdate)) {
            $useMinMax = false;
            if (isset($birthdate['min'])) {
                $this->addUsingAlias(ClientPeer::BIRTHDATE, $birthdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthdate['max'])) {
                $this->addUsingAlias(ClientPeer::BIRTHDATE, $birthdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::BIRTHDATE, $birthdate, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex(1234); // WHERE sex = 1234
     * $query->filterBySex(array(12, 34)); // WHERE sex IN (12, 34)
     * $query->filterBySex(array('min' => 12)); // WHERE sex >= 12
     * $query->filterBySex(array('max' => 12)); // WHERE sex <= 12
     * </code>
     *
     * @param     mixed $sex The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(ClientPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(ClientPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the SNILS column
     *
     * Example usage:
     * <code>
     * $query->filterBySnils('fooValue');   // WHERE SNILS = 'fooValue'
     * $query->filterBySnils('%fooValue%'); // WHERE SNILS LIKE '%fooValue%'
     * </code>
     *
     * @param     string $snils The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterBySnils($snils = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($snils)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $snils)) {
                $snils = str_replace('*', '%', $snils);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::SNILS, $snils, $comparison);
    }

    /**
     * Filter the query on the bloodType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBloodtypeId(1234); // WHERE bloodType_id = 1234
     * $query->filterByBloodtypeId(array(12, 34)); // WHERE bloodType_id IN (12, 34)
     * $query->filterByBloodtypeId(array('min' => 12)); // WHERE bloodType_id >= 12
     * $query->filterByBloodtypeId(array('max' => 12)); // WHERE bloodType_id <= 12
     * </code>
     *
     * @param     mixed $bloodtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByBloodtypeId($bloodtypeId = null, $comparison = null)
    {
        if (is_array($bloodtypeId)) {
            $useMinMax = false;
            if (isset($bloodtypeId['min'])) {
                $this->addUsingAlias(ClientPeer::BLOODTYPE_ID, $bloodtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bloodtypeId['max'])) {
                $this->addUsingAlias(ClientPeer::BLOODTYPE_ID, $bloodtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::BLOODTYPE_ID, $bloodtypeId, $comparison);
    }

    /**
     * Filter the query on the bloodDate column
     *
     * Example usage:
     * <code>
     * $query->filterByBlooddate('2011-03-14'); // WHERE bloodDate = '2011-03-14'
     * $query->filterByBlooddate('now'); // WHERE bloodDate = '2011-03-14'
     * $query->filterByBlooddate(array('max' => 'yesterday')); // WHERE bloodDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $blooddate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByBlooddate($blooddate = null, $comparison = null)
    {
        if (is_array($blooddate)) {
            $useMinMax = false;
            if (isset($blooddate['min'])) {
                $this->addUsingAlias(ClientPeer::BLOODDATE, $blooddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($blooddate['max'])) {
                $this->addUsingAlias(ClientPeer::BLOODDATE, $blooddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::BLOODDATE, $blooddate, $comparison);
    }

    /**
     * Filter the query on the bloodNotes column
     *
     * Example usage:
     * <code>
     * $query->filterByBloodnotes('fooValue');   // WHERE bloodNotes = 'fooValue'
     * $query->filterByBloodnotes('%fooValue%'); // WHERE bloodNotes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bloodnotes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByBloodnotes($bloodnotes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bloodnotes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bloodnotes)) {
                $bloodnotes = str_replace('*', '%', $bloodnotes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::BLOODNOTES, $bloodnotes, $comparison);
    }

    /**
     * Filter the query on the growth column
     *
     * Example usage:
     * <code>
     * $query->filterByGrowth('fooValue');   // WHERE growth = 'fooValue'
     * $query->filterByGrowth('%fooValue%'); // WHERE growth LIKE '%fooValue%'
     * </code>
     *
     * @param     string $growth The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByGrowth($growth = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($growth)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $growth)) {
                $growth = str_replace('*', '%', $growth);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::GROWTH, $growth, $comparison);
    }

    /**
     * Filter the query on the weight column
     *
     * Example usage:
     * <code>
     * $query->filterByWeight('fooValue');   // WHERE weight = 'fooValue'
     * $query->filterByWeight('%fooValue%'); // WHERE weight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weight The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByWeight($weight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weight)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $weight)) {
                $weight = str_replace('*', '%', $weight);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::WEIGHT, $weight, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ClientPeer::NOTES, $notes, $comparison);
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
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ClientPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ClientPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the birthPlace column
     *
     * Example usage:
     * <code>
     * $query->filterByBirthplace('fooValue');   // WHERE birthPlace = 'fooValue'
     * $query->filterByBirthplace('%fooValue%'); // WHERE birthPlace LIKE '%fooValue%'
     * </code>
     *
     * @param     string $birthplace The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByBirthplace($birthplace = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($birthplace)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $birthplace)) {
                $birthplace = str_replace('*', '%', $birthplace);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ClientPeer::BIRTHPLACE, $birthplace, $comparison);
    }

    /**
     * Filter the query on the uuid_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUuidId(1234); // WHERE uuid_id = 1234
     * $query->filterByUuidId(array(12, 34)); // WHERE uuid_id IN (12, 34)
     * $query->filterByUuidId(array('min' => 12)); // WHERE uuid_id >= 12
     * $query->filterByUuidId(array('max' => 12)); // WHERE uuid_id <= 12
     * </code>
     *
     * @param     mixed $uuidId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function filterByUuidId($uuidId = null, $comparison = null)
    {
        if (is_array($uuidId)) {
            $useMinMax = false;
            if (isset($uuidId['min'])) {
                $this->addUsingAlias(ClientPeer::UUID_ID, $uuidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uuidId['max'])) {
                $this->addUsingAlias(ClientPeer::UUID_ID, $uuidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientPeer::UUID_ID, $uuidId, $comparison);
    }

    /**
     * Filter the query by a related Clientflatdirectory object
     *
     * @param   Clientflatdirectory|PropelObjectCollection $clientflatdirectory  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByClientflatdirectory($clientflatdirectory, $comparison = null)
    {
        if ($clientflatdirectory instanceof Clientflatdirectory) {
            return $this
                ->addUsingAlias(ClientPeer::ID, $clientflatdirectory->getClientId(), $comparison);
        } elseif ($clientflatdirectory instanceof PropelObjectCollection) {
            return $this
                ->useClientflatdirectoryQuery()
                ->filterByPrimaryKeys($clientflatdirectory->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByClientflatdirectory() only accepts arguments of type Clientflatdirectory or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clientflatdirectory relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinClientflatdirectory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clientflatdirectory');

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
            $this->addJoinObject($join, 'Clientflatdirectory');
        }

        return $this;
    }

    /**
     * Use the Clientflatdirectory relation Clientflatdirectory object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ClientflatdirectoryQuery A secondary query class using the current class as primary query
     */
    public function useClientflatdirectoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClientflatdirectory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clientflatdirectory', '\Webmis\Models\ClientflatdirectoryQuery');
    }

    /**
     * Filter the query by a related Patientstohs object
     *
     * @param   Patientstohs|PropelObjectCollection $patientstohs  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPatientstohs($patientstohs, $comparison = null)
    {
        if ($patientstohs instanceof Patientstohs) {
            return $this
                ->addUsingAlias(ClientPeer::ID, $patientstohs->getClientId(), $comparison);
        } elseif ($patientstohs instanceof PropelObjectCollection) {
            return $this
                ->usePatientstohsQuery()
                ->filterByPrimaryKeys($patientstohs->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPatientstohs() only accepts arguments of type Patientstohs or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Patientstohs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinPatientstohs($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Patientstohs');

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
            $this->addJoinObject($join, 'Patientstohs');
        }

        return $this;
    }

    /**
     * Use the Patientstohs relation Patientstohs object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PatientstohsQuery A secondary query class using the current class as primary query
     */
    public function usePatientstohsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPatientstohs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Patientstohs', '\Webmis\Models\PatientstohsQuery');
    }

    /**
     * Filter the query by a related Takentissuejournal object
     *
     * @param   Takentissuejournal|PropelObjectCollection $takentissuejournal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ClientQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTakentissuejournal($takentissuejournal, $comparison = null)
    {
        if ($takentissuejournal instanceof Takentissuejournal) {
            return $this
                ->addUsingAlias(ClientPeer::ID, $takentissuejournal->getClientId(), $comparison);
        } elseif ($takentissuejournal instanceof PropelObjectCollection) {
            return $this
                ->useTakentissuejournalQuery()
                ->filterByPrimaryKeys($takentissuejournal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTakentissuejournal() only accepts arguments of type Takentissuejournal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Takentissuejournal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function joinTakentissuejournal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Takentissuejournal');

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
            $this->addJoinObject($join, 'Takentissuejournal');
        }

        return $this;
    }

    /**
     * Use the Takentissuejournal relation Takentissuejournal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\TakentissuejournalQuery A secondary query class using the current class as primary query
     */
    public function useTakentissuejournalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTakentissuejournal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Takentissuejournal', '\Webmis\Models\TakentissuejournalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Client $client Object to remove from the list of results
     *
     * @return ClientQuery The current query, for fluid interface
     */
    public function prune($client = null)
    {
        if ($client) {
            $this->addUsingAlias(ClientPeer::ID, $client->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
