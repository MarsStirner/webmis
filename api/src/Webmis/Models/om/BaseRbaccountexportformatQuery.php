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
use Webmis\Models\Rbaccountexportformat;
use Webmis\Models\RbaccountexportformatPeer;
use Webmis\Models\RbaccountexportformatQuery;

/**
 * Base class that represents a query for the 'rbAccountExportFormat' table.
 *
 *
 *
 * @method RbaccountexportformatQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbaccountexportformatQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbaccountexportformatQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbaccountexportformatQuery orderByProg($order = Criteria::ASC) Order by the prog column
 * @method RbaccountexportformatQuery orderByPreferentarchiver($order = Criteria::ASC) Order by the preferentArchiver column
 * @method RbaccountexportformatQuery orderByEmailrequired($order = Criteria::ASC) Order by the emailRequired column
 * @method RbaccountexportformatQuery orderByEmailto($order = Criteria::ASC) Order by the emailTo column
 * @method RbaccountexportformatQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method RbaccountexportformatQuery orderByMessage($order = Criteria::ASC) Order by the message column
 *
 * @method RbaccountexportformatQuery groupById() Group by the id column
 * @method RbaccountexportformatQuery groupByCode() Group by the code column
 * @method RbaccountexportformatQuery groupByName() Group by the name column
 * @method RbaccountexportformatQuery groupByProg() Group by the prog column
 * @method RbaccountexportformatQuery groupByPreferentarchiver() Group by the preferentArchiver column
 * @method RbaccountexportformatQuery groupByEmailrequired() Group by the emailRequired column
 * @method RbaccountexportformatQuery groupByEmailto() Group by the emailTo column
 * @method RbaccountexportformatQuery groupBySubject() Group by the subject column
 * @method RbaccountexportformatQuery groupByMessage() Group by the message column
 *
 * @method RbaccountexportformatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbaccountexportformatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbaccountexportformatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Rbaccountexportformat findOne(PropelPDO $con = null) Return the first Rbaccountexportformat matching the query
 * @method Rbaccountexportformat findOneOrCreate(PropelPDO $con = null) Return the first Rbaccountexportformat matching the query, or a new Rbaccountexportformat object populated from the query conditions when no match is found
 *
 * @method Rbaccountexportformat findOneByCode(string $code) Return the first Rbaccountexportformat filtered by the code column
 * @method Rbaccountexportformat findOneByName(string $name) Return the first Rbaccountexportformat filtered by the name column
 * @method Rbaccountexportformat findOneByProg(string $prog) Return the first Rbaccountexportformat filtered by the prog column
 * @method Rbaccountexportformat findOneByPreferentarchiver(string $preferentArchiver) Return the first Rbaccountexportformat filtered by the preferentArchiver column
 * @method Rbaccountexportformat findOneByEmailrequired(boolean $emailRequired) Return the first Rbaccountexportformat filtered by the emailRequired column
 * @method Rbaccountexportformat findOneByEmailto(string $emailTo) Return the first Rbaccountexportformat filtered by the emailTo column
 * @method Rbaccountexportformat findOneBySubject(string $subject) Return the first Rbaccountexportformat filtered by the subject column
 * @method Rbaccountexportformat findOneByMessage(string $message) Return the first Rbaccountexportformat filtered by the message column
 *
 * @method array findById(int $id) Return Rbaccountexportformat objects filtered by the id column
 * @method array findByCode(string $code) Return Rbaccountexportformat objects filtered by the code column
 * @method array findByName(string $name) Return Rbaccountexportformat objects filtered by the name column
 * @method array findByProg(string $prog) Return Rbaccountexportformat objects filtered by the prog column
 * @method array findByPreferentarchiver(string $preferentArchiver) Return Rbaccountexportformat objects filtered by the preferentArchiver column
 * @method array findByEmailrequired(boolean $emailRequired) Return Rbaccountexportformat objects filtered by the emailRequired column
 * @method array findByEmailto(string $emailTo) Return Rbaccountexportformat objects filtered by the emailTo column
 * @method array findBySubject(string $subject) Return Rbaccountexportformat objects filtered by the subject column
 * @method array findByMessage(string $message) Return Rbaccountexportformat objects filtered by the message column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbaccountexportformatQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbaccountexportformatQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbaccountexportformat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbaccountexportformatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbaccountexportformatQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbaccountexportformatQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbaccountexportformatQuery) {
            return $criteria;
        }
        $query = new RbaccountexportformatQuery();
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
     * @return   Rbaccountexportformat|Rbaccountexportformat[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbaccountexportformatPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbaccountexportformatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbaccountexportformat A model object, or null if the key is not found
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
     * @return                 Rbaccountexportformat A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `prog`, `preferentArchiver`, `emailRequired`, `emailTo`, `subject`, `message` FROM `rbAccountExportFormat` WHERE `id` = :p0';
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
            $obj = new Rbaccountexportformat();
            $obj->hydrate($row);
            RbaccountexportformatPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbaccountexportformat|Rbaccountexportformat[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbaccountexportformat[]|mixed the list of results, formatted by the current formatter
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
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbaccountexportformatPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbaccountexportformatPeer::ID, $keys, Criteria::IN);
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
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbaccountexportformatPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbaccountexportformatPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::ID, $id, $comparison);
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
     * @return RbaccountexportformatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaccountexportformatPeer::CODE, $code, $comparison);
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
     * @return RbaccountexportformatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbaccountexportformatPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the prog column
     *
     * Example usage:
     * <code>
     * $query->filterByProg('fooValue');   // WHERE prog = 'fooValue'
     * $query->filterByProg('%fooValue%'); // WHERE prog LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prog The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByProg($prog = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prog)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prog)) {
                $prog = str_replace('*', '%', $prog);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::PROG, $prog, $comparison);
    }

    /**
     * Filter the query on the preferentArchiver column
     *
     * Example usage:
     * <code>
     * $query->filterByPreferentarchiver('fooValue');   // WHERE preferentArchiver = 'fooValue'
     * $query->filterByPreferentarchiver('%fooValue%'); // WHERE preferentArchiver LIKE '%fooValue%'
     * </code>
     *
     * @param     string $preferentarchiver The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByPreferentarchiver($preferentarchiver = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($preferentarchiver)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $preferentarchiver)) {
                $preferentarchiver = str_replace('*', '%', $preferentarchiver);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::PREFERENTARCHIVER, $preferentarchiver, $comparison);
    }

    /**
     * Filter the query on the emailRequired column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailrequired(true); // WHERE emailRequired = true
     * $query->filterByEmailrequired('yes'); // WHERE emailRequired = true
     * </code>
     *
     * @param     boolean|string $emailrequired The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByEmailrequired($emailrequired = null, $comparison = null)
    {
        if (is_string($emailrequired)) {
            $emailrequired = in_array(strtolower($emailrequired), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::EMAILREQUIRED, $emailrequired, $comparison);
    }

    /**
     * Filter the query on the emailTo column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailto('fooValue');   // WHERE emailTo = 'fooValue'
     * $query->filterByEmailto('%fooValue%'); // WHERE emailTo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailto The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByEmailto($emailto = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailto)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $emailto)) {
                $emailto = str_replace('*', '%', $emailto);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::EMAILTO, $emailto, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subject)) {
                $subject = str_replace('*', '%', $subject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%'); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $message)) {
                $message = str_replace('*', '%', $message);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbaccountexportformatPeer::MESSAGE, $message, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Rbaccountexportformat $rbaccountexportformat Object to remove from the list of results
     *
     * @return RbaccountexportformatQuery The current query, for fluid interface
     */
    public function prune($rbaccountexportformat = null)
    {
        if ($rbaccountexportformat) {
            $this->addUsingAlias(RbaccountexportformatPeer::ID, $rbaccountexportformat->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
