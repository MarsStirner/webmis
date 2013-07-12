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
use Webmis\Models\Action;
use Webmis\Models\ActionDocument;
use Webmis\Models\ActionDocumentPeer;
use Webmis\Models\ActionDocumentQuery;
use Webmis\Models\Rbprinttemplate;

/**
 * Base class that represents a query for the 'action_document' table.
 *
 *
 *
 * @method ActionDocumentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActionDocumentQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 * @method ActionDocumentQuery orderByModifyDate($order = Criteria::ASC) Order by the modify_date column
 * @method ActionDocumentQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method ActionDocumentQuery orderByDocument($order = Criteria::ASC) Order by the document column
 *
 * @method ActionDocumentQuery groupById() Group by the id column
 * @method ActionDocumentQuery groupByActionId() Group by the action_id column
 * @method ActionDocumentQuery groupByModifyDate() Group by the modify_date column
 * @method ActionDocumentQuery groupByTemplateId() Group by the template_id column
 * @method ActionDocumentQuery groupByDocument() Group by the document column
 *
 * @method ActionDocumentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActionDocumentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActionDocumentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActionDocumentQuery leftJoinAction($relationAlias = null) Adds a LEFT JOIN clause to the query using the Action relation
 * @method ActionDocumentQuery rightJoinAction($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Action relation
 * @method ActionDocumentQuery innerJoinAction($relationAlias = null) Adds a INNER JOIN clause to the query using the Action relation
 *
 * @method ActionDocumentQuery leftJoinRbprinttemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbprinttemplate relation
 * @method ActionDocumentQuery rightJoinRbprinttemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbprinttemplate relation
 * @method ActionDocumentQuery innerJoinRbprinttemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbprinttemplate relation
 *
 * @method ActionDocument findOne(PropelPDO $con = null) Return the first ActionDocument matching the query
 * @method ActionDocument findOneOrCreate(PropelPDO $con = null) Return the first ActionDocument matching the query, or a new ActionDocument object populated from the query conditions when no match is found
 *
 * @method ActionDocument findOneByActionId(int $action_id) Return the first ActionDocument filtered by the action_id column
 * @method ActionDocument findOneByModifyDate(string $modify_date) Return the first ActionDocument filtered by the modify_date column
 * @method ActionDocument findOneByTemplateId(int $template_id) Return the first ActionDocument filtered by the template_id column
 * @method ActionDocument findOneByDocument(resource $document) Return the first ActionDocument filtered by the document column
 *
 * @method array findById(int $id) Return ActionDocument objects filtered by the id column
 * @method array findByActionId(int $action_id) Return ActionDocument objects filtered by the action_id column
 * @method array findByModifyDate(string $modify_date) Return ActionDocument objects filtered by the modify_date column
 * @method array findByTemplateId(int $template_id) Return ActionDocument objects filtered by the template_id column
 * @method array findByDocument(resource $document) Return ActionDocument objects filtered by the document column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActionDocumentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActionDocumentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\ActionDocument', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActionDocumentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActionDocumentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActionDocumentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActionDocumentQuery) {
            return $criteria;
        }
        $query = new ActionDocumentQuery();
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
     * @return   ActionDocument|ActionDocument[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActionDocumentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActionDocumentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ActionDocument A model object, or null if the key is not found
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
     * @return                 ActionDocument A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `action_id`, `modify_date`, `template_id`, `document` FROM `action_document` WHERE `id` = :p0';
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
            $obj = new ActionDocument();
            $obj->hydrate($row);
            ActionDocumentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ActionDocument|ActionDocument[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ActionDocument[]|mixed the list of results, formatted by the current formatter
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
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionDocumentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionDocumentPeer::ID, $keys, Criteria::IN);
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
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionDocumentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionDocumentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionDocumentPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the action_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionId(1234); // WHERE action_id = 1234
     * $query->filterByActionId(array(12, 34)); // WHERE action_id IN (12, 34)
     * $query->filterByActionId(array('min' => 12)); // WHERE action_id >= 12
     * $query->filterByActionId(array('max' => 12)); // WHERE action_id <= 12
     * </code>
     *
     * @see       filterByAction()
     *
     * @param     mixed $actionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(ActionDocumentPeer::ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(ActionDocumentPeer::ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionDocumentPeer::ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query on the modify_date column
     *
     * Example usage:
     * <code>
     * $query->filterByModifyDate('2011-03-14'); // WHERE modify_date = '2011-03-14'
     * $query->filterByModifyDate('now'); // WHERE modify_date = '2011-03-14'
     * $query->filterByModifyDate(array('max' => 'yesterday')); // WHERE modify_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $modifyDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterByModifyDate($modifyDate = null, $comparison = null)
    {
        if (is_array($modifyDate)) {
            $useMinMax = false;
            if (isset($modifyDate['min'])) {
                $this->addUsingAlias(ActionDocumentPeer::MODIFY_DATE, $modifyDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifyDate['max'])) {
                $this->addUsingAlias(ActionDocumentPeer::MODIFY_DATE, $modifyDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionDocumentPeer::MODIFY_DATE, $modifyDate, $comparison);
    }

    /**
     * Filter the query on the template_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplateId(1234); // WHERE template_id = 1234
     * $query->filterByTemplateId(array(12, 34)); // WHERE template_id IN (12, 34)
     * $query->filterByTemplateId(array('min' => 12)); // WHERE template_id >= 12
     * $query->filterByTemplateId(array('max' => 12)); // WHERE template_id <= 12
     * </code>
     *
     * @see       filterByRbprinttemplate()
     *
     * @param     mixed $templateId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterByTemplateId($templateId = null, $comparison = null)
    {
        if (is_array($templateId)) {
            $useMinMax = false;
            if (isset($templateId['min'])) {
                $this->addUsingAlias(ActionDocumentPeer::TEMPLATE_ID, $templateId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($templateId['max'])) {
                $this->addUsingAlias(ActionDocumentPeer::TEMPLATE_ID, $templateId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionDocumentPeer::TEMPLATE_ID, $templateId, $comparison);
    }

    /**
     * Filter the query on the document column
     *
     * @param     mixed $document The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function filterByDocument($document = null, $comparison = null)
    {

        return $this->addUsingAlias(ActionDocumentPeer::DOCUMENT, $document, $comparison);
    }

    /**
     * Filter the query by a related Action object
     *
     * @param   Action|PropelObjectCollection $action The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAction($action, $comparison = null)
    {
        if ($action instanceof Action) {
            return $this
                ->addUsingAlias(ActionDocumentPeer::ACTION_ID, $action->getId(), $comparison);
        } elseif ($action instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionDocumentPeer::ACTION_ID, $action->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAction() only accepts arguments of type Action or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Action relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function joinAction($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Action');

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
            $this->addJoinObject($join, 'Action');
        }

        return $this;
    }

    /**
     * Use the Action relation Action object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionQuery A secondary query class using the current class as primary query
     */
    public function useActionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAction($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Action', '\Webmis\Models\ActionQuery');
    }

    /**
     * Filter the query by a related Rbprinttemplate object
     *
     * @param   Rbprinttemplate|PropelObjectCollection $rbprinttemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActionDocumentQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbprinttemplate($rbprinttemplate, $comparison = null)
    {
        if ($rbprinttemplate instanceof Rbprinttemplate) {
            return $this
                ->addUsingAlias(ActionDocumentPeer::TEMPLATE_ID, $rbprinttemplate->getId(), $comparison);
        } elseif ($rbprinttemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionDocumentPeer::TEMPLATE_ID, $rbprinttemplate->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbprinttemplate() only accepts arguments of type Rbprinttemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbprinttemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function joinRbprinttemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbprinttemplate');

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
            $this->addJoinObject($join, 'Rbprinttemplate');
        }

        return $this;
    }

    /**
     * Use the Rbprinttemplate relation Rbprinttemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbprinttemplateQuery A secondary query class using the current class as primary query
     */
    public function useRbprinttemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbprinttemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbprinttemplate', '\Webmis\Models\RbprinttemplateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ActionDocument $actionDocument Object to remove from the list of results
     *
     * @return ActionDocumentQuery The current query, for fluid interface
     */
    public function prune($actionDocument = null)
    {
        if ($actionDocument) {
            $this->addUsingAlias(ActionDocumentPeer::ID, $actionDocument->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
