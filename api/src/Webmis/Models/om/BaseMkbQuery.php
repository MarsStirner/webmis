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
use Webmis\Models\Mkb;
use Webmis\Models\MkbPeer;
use Webmis\Models\MkbQuery;
use Webmis\Models\MkbQuotatypePacientmodel;

/**
 * Base class that represents a query for the 'MKB' table.
 *
 *
 *
 * @method MkbQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MkbQuery orderByClassid($order = Criteria::ASC) Order by the ClassID column
 * @method MkbQuery orderByClassname($order = Criteria::ASC) Order by the ClassName column
 * @method MkbQuery orderByBlockid($order = Criteria::ASC) Order by the BlockID column
 * @method MkbQuery orderByBlockname($order = Criteria::ASC) Order by the BlockName column
 * @method MkbQuery orderByDiagid($order = Criteria::ASC) Order by the DiagID column
 * @method MkbQuery orderByDiagname($order = Criteria::ASC) Order by the DiagName column
 * @method MkbQuery orderByPrim($order = Criteria::ASC) Order by the Prim column
 * @method MkbQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method MkbQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method MkbQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method MkbQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method MkbQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method MkbQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method MkbQuery orderByCharacters($order = Criteria::ASC) Order by the characters column
 * @method MkbQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method MkbQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method MkbQuery orderByMkbsubclassId($order = Criteria::ASC) Order by the MKBSubclass_id column
 *
 * @method MkbQuery groupById() Group by the id column
 * @method MkbQuery groupByClassid() Group by the ClassID column
 * @method MkbQuery groupByClassname() Group by the ClassName column
 * @method MkbQuery groupByBlockid() Group by the BlockID column
 * @method MkbQuery groupByBlockname() Group by the BlockName column
 * @method MkbQuery groupByDiagid() Group by the DiagID column
 * @method MkbQuery groupByDiagname() Group by the DiagName column
 * @method MkbQuery groupByPrim() Group by the Prim column
 * @method MkbQuery groupBySex() Group by the sex column
 * @method MkbQuery groupByAge() Group by the age column
 * @method MkbQuery groupByAgeBu() Group by the age_bu column
 * @method MkbQuery groupByAgeBc() Group by the age_bc column
 * @method MkbQuery groupByAgeEu() Group by the age_eu column
 * @method MkbQuery groupByAgeEc() Group by the age_ec column
 * @method MkbQuery groupByCharacters() Group by the characters column
 * @method MkbQuery groupByDuration() Group by the duration column
 * @method MkbQuery groupByServiceId() Group by the service_id column
 * @method MkbQuery groupByMkbsubclassId() Group by the MKBSubclass_id column
 *
 * @method MkbQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MkbQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MkbQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MkbQuery leftJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a LEFT JOIN clause to the query using the MkbQuotatypePacientmodel relation
 * @method MkbQuery rightJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MkbQuotatypePacientmodel relation
 * @method MkbQuery innerJoinMkbQuotatypePacientmodel($relationAlias = null) Adds a INNER JOIN clause to the query using the MkbQuotatypePacientmodel relation
 *
 * @method Mkb findOne(PropelPDO $con = null) Return the first Mkb matching the query
 * @method Mkb findOneOrCreate(PropelPDO $con = null) Return the first Mkb matching the query, or a new Mkb object populated from the query conditions when no match is found
 *
 * @method Mkb findOneByClassid(string $ClassID) Return the first Mkb filtered by the ClassID column
 * @method Mkb findOneByClassname(string $ClassName) Return the first Mkb filtered by the ClassName column
 * @method Mkb findOneByBlockid(string $BlockID) Return the first Mkb filtered by the BlockID column
 * @method Mkb findOneByBlockname(string $BlockName) Return the first Mkb filtered by the BlockName column
 * @method Mkb findOneByDiagid(string $DiagID) Return the first Mkb filtered by the DiagID column
 * @method Mkb findOneByDiagname(string $DiagName) Return the first Mkb filtered by the DiagName column
 * @method Mkb findOneByPrim(string $Prim) Return the first Mkb filtered by the Prim column
 * @method Mkb findOneBySex(boolean $sex) Return the first Mkb filtered by the sex column
 * @method Mkb findOneByAge(string $age) Return the first Mkb filtered by the age column
 * @method Mkb findOneByAgeBu(int $age_bu) Return the first Mkb filtered by the age_bu column
 * @method Mkb findOneByAgeBc(int $age_bc) Return the first Mkb filtered by the age_bc column
 * @method Mkb findOneByAgeEu(int $age_eu) Return the first Mkb filtered by the age_eu column
 * @method Mkb findOneByAgeEc(int $age_ec) Return the first Mkb filtered by the age_ec column
 * @method Mkb findOneByCharacters(int $characters) Return the first Mkb filtered by the characters column
 * @method Mkb findOneByDuration(int $duration) Return the first Mkb filtered by the duration column
 * @method Mkb findOneByServiceId(int $service_id) Return the first Mkb filtered by the service_id column
 * @method Mkb findOneByMkbsubclassId(int $MKBSubclass_id) Return the first Mkb filtered by the MKBSubclass_id column
 *
 * @method array findById(int $id) Return Mkb objects filtered by the id column
 * @method array findByClassid(string $ClassID) Return Mkb objects filtered by the ClassID column
 * @method array findByClassname(string $ClassName) Return Mkb objects filtered by the ClassName column
 * @method array findByBlockid(string $BlockID) Return Mkb objects filtered by the BlockID column
 * @method array findByBlockname(string $BlockName) Return Mkb objects filtered by the BlockName column
 * @method array findByDiagid(string $DiagID) Return Mkb objects filtered by the DiagID column
 * @method array findByDiagname(string $DiagName) Return Mkb objects filtered by the DiagName column
 * @method array findByPrim(string $Prim) Return Mkb objects filtered by the Prim column
 * @method array findBySex(boolean $sex) Return Mkb objects filtered by the sex column
 * @method array findByAge(string $age) Return Mkb objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return Mkb objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return Mkb objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return Mkb objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return Mkb objects filtered by the age_ec column
 * @method array findByCharacters(int $characters) Return Mkb objects filtered by the characters column
 * @method array findByDuration(int $duration) Return Mkb objects filtered by the duration column
 * @method array findByServiceId(int $service_id) Return Mkb objects filtered by the service_id column
 * @method array findByMkbsubclassId(int $MKBSubclass_id) Return Mkb objects filtered by the MKBSubclass_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseMkbQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMkbQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Mkb', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MkbQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MkbQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MkbQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MkbQuery) {
            return $criteria;
        }
        $query = new MkbQuery();
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
     * @return   Mkb|Mkb[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MkbPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MkbPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Mkb A model object, or null if the key is not found
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
     * @return                 Mkb A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `ClassID`, `ClassName`, `BlockID`, `BlockName`, `DiagID`, `DiagName`, `Prim`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `characters`, `duration`, `service_id`, `MKBSubclass_id` FROM `MKB` WHERE `id` = :p0';
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
            $obj = new Mkb();
            $obj->hydrate($row);
            MkbPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Mkb|Mkb[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Mkb[]|mixed the list of results, formatted by the current formatter
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
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MkbPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MkbPeer::ID, $keys, Criteria::IN);
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
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MkbPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MkbPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the ClassID column
     *
     * Example usage:
     * <code>
     * $query->filterByClassid('fooValue');   // WHERE ClassID = 'fooValue'
     * $query->filterByClassid('%fooValue%'); // WHERE ClassID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByClassid($classid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classid)) {
                $classid = str_replace('*', '%', $classid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::CLASSID, $classid, $comparison);
    }

    /**
     * Filter the query on the ClassName column
     *
     * Example usage:
     * <code>
     * $query->filterByClassname('fooValue');   // WHERE ClassName = 'fooValue'
     * $query->filterByClassname('%fooValue%'); // WHERE ClassName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $classname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByClassname($classname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($classname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $classname)) {
                $classname = str_replace('*', '%', $classname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::CLASSNAME, $classname, $comparison);
    }

    /**
     * Filter the query on the BlockID column
     *
     * Example usage:
     * <code>
     * $query->filterByBlockid('fooValue');   // WHERE BlockID = 'fooValue'
     * $query->filterByBlockid('%fooValue%'); // WHERE BlockID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blockid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByBlockid($blockid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blockid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blockid)) {
                $blockid = str_replace('*', '%', $blockid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::BLOCKID, $blockid, $comparison);
    }

    /**
     * Filter the query on the BlockName column
     *
     * Example usage:
     * <code>
     * $query->filterByBlockname('fooValue');   // WHERE BlockName = 'fooValue'
     * $query->filterByBlockname('%fooValue%'); // WHERE BlockName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blockname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByBlockname($blockname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blockname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blockname)) {
                $blockname = str_replace('*', '%', $blockname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::BLOCKNAME, $blockname, $comparison);
    }

    /**
     * Filter the query on the DiagID column
     *
     * Example usage:
     * <code>
     * $query->filterByDiagid('fooValue');   // WHERE DiagID = 'fooValue'
     * $query->filterByDiagid('%fooValue%'); // WHERE DiagID LIKE '%fooValue%'
     * </code>
     *
     * @param     string $diagid The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByDiagid($diagid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diagid)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $diagid)) {
                $diagid = str_replace('*', '%', $diagid);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::DIAGID, $diagid, $comparison);
    }

    /**
     * Filter the query on the DiagName column
     *
     * Example usage:
     * <code>
     * $query->filterByDiagname('fooValue');   // WHERE DiagName = 'fooValue'
     * $query->filterByDiagname('%fooValue%'); // WHERE DiagName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $diagname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByDiagname($diagname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diagname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $diagname)) {
                $diagname = str_replace('*', '%', $diagname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::DIAGNAME, $diagname, $comparison);
    }

    /**
     * Filter the query on the Prim column
     *
     * Example usage:
     * <code>
     * $query->filterByPrim('fooValue');   // WHERE Prim = 'fooValue'
     * $query->filterByPrim('%fooValue%'); // WHERE Prim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prim The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByPrim($prim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prim)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prim)) {
                $prim = str_replace('*', '%', $prim);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::PRIM, $prim, $comparison);
    }

    /**
     * Filter the query on the sex column
     *
     * Example usage:
     * <code>
     * $query->filterBySex(true); // WHERE sex = true
     * $query->filterBySex('yes'); // WHERE sex = true
     * </code>
     *
     * @param     boolean|string $sex The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_string($sex)) {
            $sex = in_array(strtolower($sex), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(MkbPeer::SEX, $sex, $comparison);
    }

    /**
     * Filter the query on the age column
     *
     * Example usage:
     * <code>
     * $query->filterByAge('fooValue');   // WHERE age = 'fooValue'
     * $query->filterByAge('%fooValue%'); // WHERE age LIKE '%fooValue%'
     * </code>
     *
     * @param     string $age The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByAge($age = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($age)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $age)) {
                $age = str_replace('*', '%', $age);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MkbPeer::AGE, $age, $comparison);
    }

    /**
     * Filter the query on the age_bu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeBu(1234); // WHERE age_bu = 1234
     * $query->filterByAgeBu(array(12, 34)); // WHERE age_bu IN (12, 34)
     * $query->filterByAgeBu(array('min' => 12)); // WHERE age_bu >= 12
     * $query->filterByAgeBu(array('max' => 12)); // WHERE age_bu <= 12
     * </code>
     *
     * @param     mixed $ageBu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(MkbPeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(MkbPeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::AGE_BU, $ageBu, $comparison);
    }

    /**
     * Filter the query on the age_bc column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeBc(1234); // WHERE age_bc = 1234
     * $query->filterByAgeBc(array(12, 34)); // WHERE age_bc IN (12, 34)
     * $query->filterByAgeBc(array('min' => 12)); // WHERE age_bc >= 12
     * $query->filterByAgeBc(array('max' => 12)); // WHERE age_bc <= 12
     * </code>
     *
     * @param     mixed $ageBc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(MkbPeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(MkbPeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::AGE_BC, $ageBc, $comparison);
    }

    /**
     * Filter the query on the age_eu column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEu(1234); // WHERE age_eu = 1234
     * $query->filterByAgeEu(array(12, 34)); // WHERE age_eu IN (12, 34)
     * $query->filterByAgeEu(array('min' => 12)); // WHERE age_eu >= 12
     * $query->filterByAgeEu(array('max' => 12)); // WHERE age_eu <= 12
     * </code>
     *
     * @param     mixed $ageEu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(MkbPeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(MkbPeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::AGE_EU, $ageEu, $comparison);
    }

    /**
     * Filter the query on the age_ec column
     *
     * Example usage:
     * <code>
     * $query->filterByAgeEc(1234); // WHERE age_ec = 1234
     * $query->filterByAgeEc(array(12, 34)); // WHERE age_ec IN (12, 34)
     * $query->filterByAgeEc(array('min' => 12)); // WHERE age_ec >= 12
     * $query->filterByAgeEc(array('max' => 12)); // WHERE age_ec <= 12
     * </code>
     *
     * @param     mixed $ageEc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(MkbPeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(MkbPeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the characters column
     *
     * Example usage:
     * <code>
     * $query->filterByCharacters(1234); // WHERE characters = 1234
     * $query->filterByCharacters(array(12, 34)); // WHERE characters IN (12, 34)
     * $query->filterByCharacters(array('min' => 12)); // WHERE characters >= 12
     * $query->filterByCharacters(array('max' => 12)); // WHERE characters <= 12
     * </code>
     *
     * @param     mixed $characters The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByCharacters($characters = null, $comparison = null)
    {
        if (is_array($characters)) {
            $useMinMax = false;
            if (isset($characters['min'])) {
                $this->addUsingAlias(MkbPeer::CHARACTERS, $characters['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($characters['max'])) {
                $this->addUsingAlias(MkbPeer::CHARACTERS, $characters['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::CHARACTERS, $characters, $comparison);
    }

    /**
     * Filter the query on the duration column
     *
     * Example usage:
     * <code>
     * $query->filterByDuration(1234); // WHERE duration = 1234
     * $query->filterByDuration(array(12, 34)); // WHERE duration IN (12, 34)
     * $query->filterByDuration(array('min' => 12)); // WHERE duration >= 12
     * $query->filterByDuration(array('max' => 12)); // WHERE duration <= 12
     * </code>
     *
     * @param     mixed $duration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByDuration($duration = null, $comparison = null)
    {
        if (is_array($duration)) {
            $useMinMax = false;
            if (isset($duration['min'])) {
                $this->addUsingAlias(MkbPeer::DURATION, $duration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($duration['max'])) {
                $this->addUsingAlias(MkbPeer::DURATION, $duration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::DURATION, $duration, $comparison);
    }

    /**
     * Filter the query on the service_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServiceId(1234); // WHERE service_id = 1234
     * $query->filterByServiceId(array(12, 34)); // WHERE service_id IN (12, 34)
     * $query->filterByServiceId(array('min' => 12)); // WHERE service_id >= 12
     * $query->filterByServiceId(array('max' => 12)); // WHERE service_id <= 12
     * </code>
     *
     * @param     mixed $serviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(MkbPeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(MkbPeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Filter the query on the MKBSubclass_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMkbsubclassId(1234); // WHERE MKBSubclass_id = 1234
     * $query->filterByMkbsubclassId(array(12, 34)); // WHERE MKBSubclass_id IN (12, 34)
     * $query->filterByMkbsubclassId(array('min' => 12)); // WHERE MKBSubclass_id >= 12
     * $query->filterByMkbsubclassId(array('max' => 12)); // WHERE MKBSubclass_id <= 12
     * </code>
     *
     * @param     mixed $mkbsubclassId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function filterByMkbsubclassId($mkbsubclassId = null, $comparison = null)
    {
        if (is_array($mkbsubclassId)) {
            $useMinMax = false;
            if (isset($mkbsubclassId['min'])) {
                $this->addUsingAlias(MkbPeer::MKBSUBCLASS_ID, $mkbsubclassId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mkbsubclassId['max'])) {
                $this->addUsingAlias(MkbPeer::MKBSUBCLASS_ID, $mkbsubclassId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MkbPeer::MKBSUBCLASS_ID, $mkbsubclassId, $comparison);
    }

    /**
     * Filter the query by a related MkbQuotatypePacientmodel object
     *
     * @param   MkbQuotatypePacientmodel|PropelObjectCollection $mkbQuotatypePacientmodel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MkbQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMkbQuotatypePacientmodel($mkbQuotatypePacientmodel, $comparison = null)
    {
        if ($mkbQuotatypePacientmodel instanceof MkbQuotatypePacientmodel) {
            return $this
                ->addUsingAlias(MkbPeer::ID, $mkbQuotatypePacientmodel->getMkbId(), $comparison);
        } elseif ($mkbQuotatypePacientmodel instanceof PropelObjectCollection) {
            return $this
                ->useMkbQuotatypePacientmodelQuery()
                ->filterByPrimaryKeys($mkbQuotatypePacientmodel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMkbQuotatypePacientmodel() only accepts arguments of type MkbQuotatypePacientmodel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MkbQuotatypePacientmodel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function joinMkbQuotatypePacientmodel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MkbQuotatypePacientmodel');

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
            $this->addJoinObject($join, 'MkbQuotatypePacientmodel');
        }

        return $this;
    }

    /**
     * Use the MkbQuotatypePacientmodel relation MkbQuotatypePacientmodel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\MkbQuotatypePacientmodelQuery A secondary query class using the current class as primary query
     */
    public function useMkbQuotatypePacientmodelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMkbQuotatypePacientmodel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MkbQuotatypePacientmodel', '\Webmis\Models\MkbQuotatypePacientmodelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Mkb $mkb Object to remove from the list of results
     *
     * @return MkbQuery The current query, for fluid interface
     */
    public function prune($mkb = null)
    {
        if ($mkb) {
            $this->addUsingAlias(MkbPeer::ID, $mkb->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
