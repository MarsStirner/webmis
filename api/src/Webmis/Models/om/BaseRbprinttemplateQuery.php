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
use Webmis\Models\ActionDocument;
use Webmis\Models\Rbprinttemplate;
use Webmis\Models\RbprinttemplatePeer;
use Webmis\Models\RbprinttemplateQuery;

/**
 * Base class that represents a query for the 'rbPrintTemplate' table.
 *
 *
 *
 * @method RbprinttemplateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method RbprinttemplateQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method RbprinttemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method RbprinttemplateQuery orderByContext($order = Criteria::ASC) Order by the context column
 * @method RbprinttemplateQuery orderByFilename($order = Criteria::ASC) Order by the fileName column
 * @method RbprinttemplateQuery orderByDefault($order = Criteria::ASC) Order by the default column
 * @method RbprinttemplateQuery orderByDpdagreement($order = Criteria::ASC) Order by the dpdAgreement column
 * @method RbprinttemplateQuery orderByRender($order = Criteria::ASC) Order by the render column
 *
 * @method RbprinttemplateQuery groupById() Group by the id column
 * @method RbprinttemplateQuery groupByCode() Group by the code column
 * @method RbprinttemplateQuery groupByName() Group by the name column
 * @method RbprinttemplateQuery groupByContext() Group by the context column
 * @method RbprinttemplateQuery groupByFilename() Group by the fileName column
 * @method RbprinttemplateQuery groupByDefault() Group by the default column
 * @method RbprinttemplateQuery groupByDpdagreement() Group by the dpdAgreement column
 * @method RbprinttemplateQuery groupByRender() Group by the render column
 *
 * @method RbprinttemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RbprinttemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RbprinttemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RbprinttemplateQuery leftJoinActionDocument($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionDocument relation
 * @method RbprinttemplateQuery rightJoinActionDocument($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionDocument relation
 * @method RbprinttemplateQuery innerJoinActionDocument($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionDocument relation
 *
 * @method Rbprinttemplate findOne(PropelPDO $con = null) Return the first Rbprinttemplate matching the query
 * @method Rbprinttemplate findOneOrCreate(PropelPDO $con = null) Return the first Rbprinttemplate matching the query, or a new Rbprinttemplate object populated from the query conditions when no match is found
 *
 * @method Rbprinttemplate findOneByCode(string $code) Return the first Rbprinttemplate filtered by the code column
 * @method Rbprinttemplate findOneByName(string $name) Return the first Rbprinttemplate filtered by the name column
 * @method Rbprinttemplate findOneByContext(string $context) Return the first Rbprinttemplate filtered by the context column
 * @method Rbprinttemplate findOneByFilename(string $fileName) Return the first Rbprinttemplate filtered by the fileName column
 * @method Rbprinttemplate findOneByDefault(string $default) Return the first Rbprinttemplate filtered by the default column
 * @method Rbprinttemplate findOneByDpdagreement(boolean $dpdAgreement) Return the first Rbprinttemplate filtered by the dpdAgreement column
 * @method Rbprinttemplate findOneByRender(boolean $render) Return the first Rbprinttemplate filtered by the render column
 *
 * @method array findById(int $id) Return Rbprinttemplate objects filtered by the id column
 * @method array findByCode(string $code) Return Rbprinttemplate objects filtered by the code column
 * @method array findByName(string $name) Return Rbprinttemplate objects filtered by the name column
 * @method array findByContext(string $context) Return Rbprinttemplate objects filtered by the context column
 * @method array findByFilename(string $fileName) Return Rbprinttemplate objects filtered by the fileName column
 * @method array findByDefault(string $default) Return Rbprinttemplate objects filtered by the default column
 * @method array findByDpdagreement(boolean $dpdAgreement) Return Rbprinttemplate objects filtered by the dpdAgreement column
 * @method array findByRender(boolean $render) Return Rbprinttemplate objects filtered by the render column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseRbprinttemplateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRbprinttemplateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Rbprinttemplate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RbprinttemplateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RbprinttemplateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RbprinttemplateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RbprinttemplateQuery) {
            return $criteria;
        }
        $query = new RbprinttemplateQuery();
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
     * @return   Rbprinttemplate|Rbprinttemplate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RbprinttemplatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RbprinttemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Rbprinttemplate A model object, or null if the key is not found
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
     * @return                 Rbprinttemplate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `code`, `name`, `context`, `fileName`, `default`, `dpdAgreement`, `render` FROM `rbPrintTemplate` WHERE `id` = :p0';
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
            $obj = new Rbprinttemplate();
            $obj->hydrate($row);
            RbprinttemplatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Rbprinttemplate|Rbprinttemplate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Rbprinttemplate[]|mixed the list of results, formatted by the current formatter
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
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RbprinttemplatePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RbprinttemplatePeer::ID, $keys, Criteria::IN);
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
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(RbprinttemplatePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(RbprinttemplatePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RbprinttemplatePeer::ID, $id, $comparison);
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
     * @return RbprinttemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbprinttemplatePeer::CODE, $code, $comparison);
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
     * @return RbprinttemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RbprinttemplatePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the context column
     *
     * Example usage:
     * <code>
     * $query->filterByContext('fooValue');   // WHERE context = 'fooValue'
     * $query->filterByContext('%fooValue%'); // WHERE context LIKE '%fooValue%'
     * </code>
     *
     * @param     string $context The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByContext($context = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($context)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $context)) {
                $context = str_replace('*', '%', $context);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbprinttemplatePeer::CONTEXT, $context, $comparison);
    }

    /**
     * Filter the query on the fileName column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE fileName = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE fileName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbprinttemplatePeer::FILENAME, $filename, $comparison);
    }

    /**
     * Filter the query on the default column
     *
     * Example usage:
     * <code>
     * $query->filterByDefault('fooValue');   // WHERE default = 'fooValue'
     * $query->filterByDefault('%fooValue%'); // WHERE default LIKE '%fooValue%'
     * </code>
     *
     * @param     string $default The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByDefault($default = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($default)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $default)) {
                $default = str_replace('*', '%', $default);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RbprinttemplatePeer::BYDEFAULT, $default, $comparison);
    }

    /**
     * Filter the query on the dpdAgreement column
     *
     * Example usage:
     * <code>
     * $query->filterByDpdagreement(true); // WHERE dpdAgreement = true
     * $query->filterByDpdagreement('yes'); // WHERE dpdAgreement = true
     * </code>
     *
     * @param     boolean|string $dpdagreement The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByDpdagreement($dpdagreement = null, $comparison = null)
    {
        if (is_string($dpdagreement)) {
            $dpdagreement = in_array(strtolower($dpdagreement), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbprinttemplatePeer::DPDAGREEMENT, $dpdagreement, $comparison);
    }

    /**
     * Filter the query on the render column
     *
     * Example usage:
     * <code>
     * $query->filterByRender(true); // WHERE render = true
     * $query->filterByRender('yes'); // WHERE render = true
     * </code>
     *
     * @param     boolean|string $render The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function filterByRender($render = null, $comparison = null)
    {
        if (is_string($render)) {
            $render = in_array(strtolower($render), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(RbprinttemplatePeer::RENDER, $render, $comparison);
    }

    /**
     * Filter the query by a related ActionDocument object
     *
     * @param   ActionDocument|PropelObjectCollection $actionDocument  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RbprinttemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionDocument($actionDocument, $comparison = null)
    {
        if ($actionDocument instanceof ActionDocument) {
            return $this
                ->addUsingAlias(RbprinttemplatePeer::ID, $actionDocument->getTemplateId(), $comparison);
        } elseif ($actionDocument instanceof PropelObjectCollection) {
            return $this
                ->useActionDocumentQuery()
                ->filterByPrimaryKeys($actionDocument->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionDocument() only accepts arguments of type ActionDocument or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionDocument relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function joinActionDocument($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionDocument');

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
            $this->addJoinObject($join, 'ActionDocument');
        }

        return $this;
    }

    /**
     * Use the ActionDocument relation ActionDocument object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionDocumentQuery A secondary query class using the current class as primary query
     */
    public function useActionDocumentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionDocument($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionDocument', '\Webmis\Models\ActionDocumentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Rbprinttemplate $rbprinttemplate Object to remove from the list of results
     *
     * @return RbprinttemplateQuery The current query, for fluid interface
     */
    public function prune($rbprinttemplate = null)
    {
        if ($rbprinttemplate) {
            $this->addUsingAlias(RbprinttemplatePeer::ID, $rbprinttemplate->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
