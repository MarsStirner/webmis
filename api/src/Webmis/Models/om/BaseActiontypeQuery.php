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
use Webmis\Models\Actiontype;
use Webmis\Models\ActiontypeEventtypeCheck;
use Webmis\Models\ActiontypePeer;
use Webmis\Models\ActiontypeQuery;
use Webmis\Models\ActiontypeTissuetype;
use Webmis\Models\Blankactions;
use Webmis\Models\Person;
use Webmis\Models\Rbblankactions;
use Webmis\Models\Rbjobtype;
use Webmis\Models\Rbtesttubetype;

/**
 * Base class that represents a query for the 'ActionType' table.
 *
 *
 *
 * @method ActiontypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ActiontypeQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method ActiontypeQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method ActiontypeQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method ActiontypeQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method ActiontypeQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ActiontypeQuery orderByClass($order = Criteria::ASC) Order by the class column
 * @method ActiontypeQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method ActiontypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method ActiontypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ActiontypeQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method ActiontypeQuery orderByFlatcode($order = Criteria::ASC) Order by the flatCode column
 * @method ActiontypeQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method ActiontypeQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method ActiontypeQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method ActiontypeQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method ActiontypeQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method ActiontypeQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method ActiontypeQuery orderByOffice($order = Criteria::ASC) Order by the office column
 * @method ActiontypeQuery orderByShowinform($order = Criteria::ASC) Order by the showInForm column
 * @method ActiontypeQuery orderByGentimetable($order = Criteria::ASC) Order by the genTimetable column
 * @method ActiontypeQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method ActiontypeQuery orderByQuotatypeId($order = Criteria::ASC) Order by the quotaType_id column
 * @method ActiontypeQuery orderByContext($order = Criteria::ASC) Order by the context column
 * @method ActiontypeQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ActiontypeQuery orderByAmountevaluation($order = Criteria::ASC) Order by the amountEvaluation column
 * @method ActiontypeQuery orderByDefaultstatus($order = Criteria::ASC) Order by the defaultStatus column
 * @method ActiontypeQuery orderByDefaultdirectiondate($order = Criteria::ASC) Order by the defaultDirectionDate column
 * @method ActiontypeQuery orderByDefaultplannedenddate($order = Criteria::ASC) Order by the defaultPlannedEndDate column
 * @method ActiontypeQuery orderByDefaultenddate($order = Criteria::ASC) Order by the defaultEndDate column
 * @method ActiontypeQuery orderByDefaultexecpersonId($order = Criteria::ASC) Order by the defaultExecPerson_id column
 * @method ActiontypeQuery orderByDefaultpersoninevent($order = Criteria::ASC) Order by the defaultPersonInEvent column
 * @method ActiontypeQuery orderByDefaultpersonineditor($order = Criteria::ASC) Order by the defaultPersonInEditor column
 * @method ActiontypeQuery orderByMaxoccursinevent($order = Criteria::ASC) Order by the maxOccursInEvent column
 * @method ActiontypeQuery orderByShowtime($order = Criteria::ASC) Order by the showTime column
 * @method ActiontypeQuery orderByIsmes($order = Criteria::ASC) Order by the isMES column
 * @method ActiontypeQuery orderByNomenclativeserviceId($order = Criteria::ASC) Order by the nomenclativeService_id column
 * @method ActiontypeQuery orderByIspreferable($order = Criteria::ASC) Order by the isPreferable column
 * @method ActiontypeQuery orderByPrescribedtypeId($order = Criteria::ASC) Order by the prescribedType_id column
 * @method ActiontypeQuery orderBySheduleId($order = Criteria::ASC) Order by the shedule_id column
 * @method ActiontypeQuery orderByIsrequiredcoordination($order = Criteria::ASC) Order by the isRequiredCoordination column
 * @method ActiontypeQuery orderByIsrequiredtissue($order = Criteria::ASC) Order by the isRequiredTissue column
 * @method ActiontypeQuery orderByTesttubetypeId($order = Criteria::ASC) Order by the testTubeType_id column
 * @method ActiontypeQuery orderByJobtypeId($order = Criteria::ASC) Order by the jobType_id column
 * @method ActiontypeQuery orderByMnem($order = Criteria::ASC) Order by the mnem column
 *
 * @method ActiontypeQuery groupById() Group by the id column
 * @method ActiontypeQuery groupByCreatedatetime() Group by the createDatetime column
 * @method ActiontypeQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method ActiontypeQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method ActiontypeQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method ActiontypeQuery groupByDeleted() Group by the deleted column
 * @method ActiontypeQuery groupByClass() Group by the class column
 * @method ActiontypeQuery groupByGroupId() Group by the group_id column
 * @method ActiontypeQuery groupByCode() Group by the code column
 * @method ActiontypeQuery groupByName() Group by the name column
 * @method ActiontypeQuery groupByTitle() Group by the title column
 * @method ActiontypeQuery groupByFlatcode() Group by the flatCode column
 * @method ActiontypeQuery groupBySex() Group by the sex column
 * @method ActiontypeQuery groupByAge() Group by the age column
 * @method ActiontypeQuery groupByAgeBu() Group by the age_bu column
 * @method ActiontypeQuery groupByAgeBc() Group by the age_bc column
 * @method ActiontypeQuery groupByAgeEu() Group by the age_eu column
 * @method ActiontypeQuery groupByAgeEc() Group by the age_ec column
 * @method ActiontypeQuery groupByOffice() Group by the office column
 * @method ActiontypeQuery groupByShowinform() Group by the showInForm column
 * @method ActiontypeQuery groupByGentimetable() Group by the genTimetable column
 * @method ActiontypeQuery groupByServiceId() Group by the service_id column
 * @method ActiontypeQuery groupByQuotatypeId() Group by the quotaType_id column
 * @method ActiontypeQuery groupByContext() Group by the context column
 * @method ActiontypeQuery groupByAmount() Group by the amount column
 * @method ActiontypeQuery groupByAmountevaluation() Group by the amountEvaluation column
 * @method ActiontypeQuery groupByDefaultstatus() Group by the defaultStatus column
 * @method ActiontypeQuery groupByDefaultdirectiondate() Group by the defaultDirectionDate column
 * @method ActiontypeQuery groupByDefaultplannedenddate() Group by the defaultPlannedEndDate column
 * @method ActiontypeQuery groupByDefaultenddate() Group by the defaultEndDate column
 * @method ActiontypeQuery groupByDefaultexecpersonId() Group by the defaultExecPerson_id column
 * @method ActiontypeQuery groupByDefaultpersoninevent() Group by the defaultPersonInEvent column
 * @method ActiontypeQuery groupByDefaultpersonineditor() Group by the defaultPersonInEditor column
 * @method ActiontypeQuery groupByMaxoccursinevent() Group by the maxOccursInEvent column
 * @method ActiontypeQuery groupByShowtime() Group by the showTime column
 * @method ActiontypeQuery groupByIsmes() Group by the isMES column
 * @method ActiontypeQuery groupByNomenclativeserviceId() Group by the nomenclativeService_id column
 * @method ActiontypeQuery groupByIspreferable() Group by the isPreferable column
 * @method ActiontypeQuery groupByPrescribedtypeId() Group by the prescribedType_id column
 * @method ActiontypeQuery groupBySheduleId() Group by the shedule_id column
 * @method ActiontypeQuery groupByIsrequiredcoordination() Group by the isRequiredCoordination column
 * @method ActiontypeQuery groupByIsrequiredtissue() Group by the isRequiredTissue column
 * @method ActiontypeQuery groupByTesttubetypeId() Group by the testTubeType_id column
 * @method ActiontypeQuery groupByJobtypeId() Group by the jobType_id column
 * @method ActiontypeQuery groupByMnem() Group by the mnem column
 *
 * @method ActiontypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ActiontypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ActiontypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ActiontypeQuery leftJoinPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the Person relation
 * @method ActiontypeQuery rightJoinPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Person relation
 * @method ActiontypeQuery innerJoinPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the Person relation
 *
 * @method ActiontypeQuery leftJoinRbjobtype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbjobtype relation
 * @method ActiontypeQuery rightJoinRbjobtype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbjobtype relation
 * @method ActiontypeQuery innerJoinRbjobtype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbjobtype relation
 *
 * @method ActiontypeQuery leftJoinRbtesttubetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbtesttubetype relation
 * @method ActiontypeQuery rightJoinRbtesttubetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbtesttubetype relation
 * @method ActiontypeQuery innerJoinRbtesttubetype($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbtesttubetype relation
 *
 * @method ActiontypeQuery leftJoinActiontypeEventtypeCheckRelatedByActiontypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByActiontypeId relation
 * @method ActiontypeQuery rightJoinActiontypeEventtypeCheckRelatedByActiontypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByActiontypeId relation
 * @method ActiontypeQuery innerJoinActiontypeEventtypeCheckRelatedByActiontypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByActiontypeId relation
 *
 * @method ActiontypeQuery leftJoinActiontypeEventtypeCheckRelatedByRelatedActiontypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByRelatedActiontypeId relation
 * @method ActiontypeQuery rightJoinActiontypeEventtypeCheckRelatedByRelatedActiontypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByRelatedActiontypeId relation
 * @method ActiontypeQuery innerJoinActiontypeEventtypeCheckRelatedByRelatedActiontypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByRelatedActiontypeId relation
 *
 * @method ActiontypeQuery leftJoinActiontypeTissuetype($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeTissuetype relation
 * @method ActiontypeQuery rightJoinActiontypeTissuetype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeTissuetype relation
 * @method ActiontypeQuery innerJoinActiontypeTissuetype($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeTissuetype relation
 *
 * @method ActiontypeQuery leftJoinBlankactions($relationAlias = null) Adds a LEFT JOIN clause to the query using the Blankactions relation
 * @method ActiontypeQuery rightJoinBlankactions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Blankactions relation
 * @method ActiontypeQuery innerJoinBlankactions($relationAlias = null) Adds a INNER JOIN clause to the query using the Blankactions relation
 *
 * @method ActiontypeQuery leftJoinRbblankactions($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbblankactions relation
 * @method ActiontypeQuery rightJoinRbblankactions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbblankactions relation
 * @method ActiontypeQuery innerJoinRbblankactions($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbblankactions relation
 *
 * @method Actiontype findOne(PropelPDO $con = null) Return the first Actiontype matching the query
 * @method Actiontype findOneOrCreate(PropelPDO $con = null) Return the first Actiontype matching the query, or a new Actiontype object populated from the query conditions when no match is found
 *
 * @method Actiontype findOneByCreatedatetime(string $createDatetime) Return the first Actiontype filtered by the createDatetime column
 * @method Actiontype findOneByCreatepersonId(int $createPerson_id) Return the first Actiontype filtered by the createPerson_id column
 * @method Actiontype findOneByModifydatetime(string $modifyDatetime) Return the first Actiontype filtered by the modifyDatetime column
 * @method Actiontype findOneByModifypersonId(int $modifyPerson_id) Return the first Actiontype filtered by the modifyPerson_id column
 * @method Actiontype findOneByDeleted(boolean $deleted) Return the first Actiontype filtered by the deleted column
 * @method Actiontype findOneByClass(boolean $class) Return the first Actiontype filtered by the class column
 * @method Actiontype findOneByGroupId(int $group_id) Return the first Actiontype filtered by the group_id column
 * @method Actiontype findOneByCode(string $code) Return the first Actiontype filtered by the code column
 * @method Actiontype findOneByName(string $name) Return the first Actiontype filtered by the name column
 * @method Actiontype findOneByTitle(string $title) Return the first Actiontype filtered by the title column
 * @method Actiontype findOneByFlatcode(string $flatCode) Return the first Actiontype filtered by the flatCode column
 * @method Actiontype findOneBySex(int $sex) Return the first Actiontype filtered by the sex column
 * @method Actiontype findOneByAge(string $age) Return the first Actiontype filtered by the age column
 * @method Actiontype findOneByAgeBu(int $age_bu) Return the first Actiontype filtered by the age_bu column
 * @method Actiontype findOneByAgeBc(int $age_bc) Return the first Actiontype filtered by the age_bc column
 * @method Actiontype findOneByAgeEu(int $age_eu) Return the first Actiontype filtered by the age_eu column
 * @method Actiontype findOneByAgeEc(int $age_ec) Return the first Actiontype filtered by the age_ec column
 * @method Actiontype findOneByOffice(string $office) Return the first Actiontype filtered by the office column
 * @method Actiontype findOneByShowinform(boolean $showInForm) Return the first Actiontype filtered by the showInForm column
 * @method Actiontype findOneByGentimetable(boolean $genTimetable) Return the first Actiontype filtered by the genTimetable column
 * @method Actiontype findOneByServiceId(int $service_id) Return the first Actiontype filtered by the service_id column
 * @method Actiontype findOneByQuotatypeId(int $quotaType_id) Return the first Actiontype filtered by the quotaType_id column
 * @method Actiontype findOneByContext(string $context) Return the first Actiontype filtered by the context column
 * @method Actiontype findOneByAmount(double $amount) Return the first Actiontype filtered by the amount column
 * @method Actiontype findOneByAmountevaluation(int $amountEvaluation) Return the first Actiontype filtered by the amountEvaluation column
 * @method Actiontype findOneByDefaultstatus(int $defaultStatus) Return the first Actiontype filtered by the defaultStatus column
 * @method Actiontype findOneByDefaultdirectiondate(int $defaultDirectionDate) Return the first Actiontype filtered by the defaultDirectionDate column
 * @method Actiontype findOneByDefaultplannedenddate(boolean $defaultPlannedEndDate) Return the first Actiontype filtered by the defaultPlannedEndDate column
 * @method Actiontype findOneByDefaultenddate(int $defaultEndDate) Return the first Actiontype filtered by the defaultEndDate column
 * @method Actiontype findOneByDefaultexecpersonId(int $defaultExecPerson_id) Return the first Actiontype filtered by the defaultExecPerson_id column
 * @method Actiontype findOneByDefaultpersoninevent(int $defaultPersonInEvent) Return the first Actiontype filtered by the defaultPersonInEvent column
 * @method Actiontype findOneByDefaultpersonineditor(int $defaultPersonInEditor) Return the first Actiontype filtered by the defaultPersonInEditor column
 * @method Actiontype findOneByMaxoccursinevent(int $maxOccursInEvent) Return the first Actiontype filtered by the maxOccursInEvent column
 * @method Actiontype findOneByShowtime(boolean $showTime) Return the first Actiontype filtered by the showTime column
 * @method Actiontype findOneByIsmes(int $isMES) Return the first Actiontype filtered by the isMES column
 * @method Actiontype findOneByNomenclativeserviceId(int $nomenclativeService_id) Return the first Actiontype filtered by the nomenclativeService_id column
 * @method Actiontype findOneByIspreferable(boolean $isPreferable) Return the first Actiontype filtered by the isPreferable column
 * @method Actiontype findOneByPrescribedtypeId(int $prescribedType_id) Return the first Actiontype filtered by the prescribedType_id column
 * @method Actiontype findOneBySheduleId(int $shedule_id) Return the first Actiontype filtered by the shedule_id column
 * @method Actiontype findOneByIsrequiredcoordination(boolean $isRequiredCoordination) Return the first Actiontype filtered by the isRequiredCoordination column
 * @method Actiontype findOneByIsrequiredtissue(boolean $isRequiredTissue) Return the first Actiontype filtered by the isRequiredTissue column
 * @method Actiontype findOneByTesttubetypeId(int $testTubeType_id) Return the first Actiontype filtered by the testTubeType_id column
 * @method Actiontype findOneByJobtypeId(int $jobType_id) Return the first Actiontype filtered by the jobType_id column
 * @method Actiontype findOneByMnem(string $mnem) Return the first Actiontype filtered by the mnem column
 *
 * @method array findById(int $id) Return Actiontype objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Actiontype objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Actiontype objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Actiontype objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Actiontype objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Actiontype objects filtered by the deleted column
 * @method array findByClass(boolean $class) Return Actiontype objects filtered by the class column
 * @method array findByGroupId(int $group_id) Return Actiontype objects filtered by the group_id column
 * @method array findByCode(string $code) Return Actiontype objects filtered by the code column
 * @method array findByName(string $name) Return Actiontype objects filtered by the name column
 * @method array findByTitle(string $title) Return Actiontype objects filtered by the title column
 * @method array findByFlatcode(string $flatCode) Return Actiontype objects filtered by the flatCode column
 * @method array findBySex(int $sex) Return Actiontype objects filtered by the sex column
 * @method array findByAge(string $age) Return Actiontype objects filtered by the age column
 * @method array findByAgeBu(int $age_bu) Return Actiontype objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return Actiontype objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return Actiontype objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return Actiontype objects filtered by the age_ec column
 * @method array findByOffice(string $office) Return Actiontype objects filtered by the office column
 * @method array findByShowinform(boolean $showInForm) Return Actiontype objects filtered by the showInForm column
 * @method array findByGentimetable(boolean $genTimetable) Return Actiontype objects filtered by the genTimetable column
 * @method array findByServiceId(int $service_id) Return Actiontype objects filtered by the service_id column
 * @method array findByQuotatypeId(int $quotaType_id) Return Actiontype objects filtered by the quotaType_id column
 * @method array findByContext(string $context) Return Actiontype objects filtered by the context column
 * @method array findByAmount(double $amount) Return Actiontype objects filtered by the amount column
 * @method array findByAmountevaluation(int $amountEvaluation) Return Actiontype objects filtered by the amountEvaluation column
 * @method array findByDefaultstatus(int $defaultStatus) Return Actiontype objects filtered by the defaultStatus column
 * @method array findByDefaultdirectiondate(int $defaultDirectionDate) Return Actiontype objects filtered by the defaultDirectionDate column
 * @method array findByDefaultplannedenddate(boolean $defaultPlannedEndDate) Return Actiontype objects filtered by the defaultPlannedEndDate column
 * @method array findByDefaultenddate(int $defaultEndDate) Return Actiontype objects filtered by the defaultEndDate column
 * @method array findByDefaultexecpersonId(int $defaultExecPerson_id) Return Actiontype objects filtered by the defaultExecPerson_id column
 * @method array findByDefaultpersoninevent(int $defaultPersonInEvent) Return Actiontype objects filtered by the defaultPersonInEvent column
 * @method array findByDefaultpersonineditor(int $defaultPersonInEditor) Return Actiontype objects filtered by the defaultPersonInEditor column
 * @method array findByMaxoccursinevent(int $maxOccursInEvent) Return Actiontype objects filtered by the maxOccursInEvent column
 * @method array findByShowtime(boolean $showTime) Return Actiontype objects filtered by the showTime column
 * @method array findByIsmes(int $isMES) Return Actiontype objects filtered by the isMES column
 * @method array findByNomenclativeserviceId(int $nomenclativeService_id) Return Actiontype objects filtered by the nomenclativeService_id column
 * @method array findByIspreferable(boolean $isPreferable) Return Actiontype objects filtered by the isPreferable column
 * @method array findByPrescribedtypeId(int $prescribedType_id) Return Actiontype objects filtered by the prescribedType_id column
 * @method array findBySheduleId(int $shedule_id) Return Actiontype objects filtered by the shedule_id column
 * @method array findByIsrequiredcoordination(boolean $isRequiredCoordination) Return Actiontype objects filtered by the isRequiredCoordination column
 * @method array findByIsrequiredtissue(boolean $isRequiredTissue) Return Actiontype objects filtered by the isRequiredTissue column
 * @method array findByTesttubetypeId(int $testTubeType_id) Return Actiontype objects filtered by the testTubeType_id column
 * @method array findByJobtypeId(int $jobType_id) Return Actiontype objects filtered by the jobType_id column
 * @method array findByMnem(string $mnem) Return Actiontype objects filtered by the mnem column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseActiontypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseActiontypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Actiontype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ActiontypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ActiontypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ActiontypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ActiontypeQuery) {
            return $criteria;
        }
        $query = new ActiontypeQuery();
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
     * @return   Actiontype|Actiontype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ActiontypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ActiontypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Actiontype A model object, or null if the key is not found
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
     * @return                 Actiontype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `class`, `group_id`, `code`, `name`, `title`, `flatCode`, `sex`, `age`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `office`, `showInForm`, `genTimetable`, `service_id`, `quotaType_id`, `context`, `amount`, `amountEvaluation`, `defaultStatus`, `defaultDirectionDate`, `defaultPlannedEndDate`, `defaultEndDate`, `defaultExecPerson_id`, `defaultPersonInEvent`, `defaultPersonInEditor`, `maxOccursInEvent`, `showTime`, `isMES`, `nomenclativeService_id`, `isPreferable`, `prescribedType_id`, `shedule_id`, `isRequiredCoordination`, `isRequiredTissue`, `testTubeType_id`, `jobType_id`, `mnem` FROM `ActionType` WHERE `id` = :p0';
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
            $obj = new Actiontype();
            $obj->hydrate($row);
            ActiontypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Actiontype|Actiontype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Actiontype[]|mixed the list of results, formatted by the current formatter
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActiontypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActiontypePeer::ID, $keys, Criteria::IN);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActiontypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActiontypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::ID, $id, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(ActiontypePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(ActiontypePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(ActiontypePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(ActiontypePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(ActiontypePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(ActiontypePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(ActiontypePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(ActiontypePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query on the class column
     *
     * Example usage:
     * <code>
     * $query->filterByClass(true); // WHERE class = true
     * $query->filterByClass('yes'); // WHERE class = true
     * </code>
     *
     * @param     boolean|string $class The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByClass($class = null, $comparison = null)
    {
        if (is_string($class)) {
            $class = in_array(strtolower($class), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::CLAZZ, $class, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id >= 12
     * $query->filterByGroupId(array('max' => 12)); // WHERE group_id <= 12
     * </code>
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(ActiontypePeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(ActiontypePeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::GROUP_ID, $groupId, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActiontypePeer::CODE, $code, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActiontypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the flatCode column
     *
     * Example usage:
     * <code>
     * $query->filterByFlatcode('fooValue');   // WHERE flatCode = 'fooValue'
     * $query->filterByFlatcode('%fooValue%'); // WHERE flatCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flatcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByFlatcode($flatcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flatcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $flatcode)) {
                $flatcode = str_replace('*', '%', $flatcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::FLATCODE, $flatcode, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(ActiontypePeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(ActiontypePeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::SEX, $sex, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActiontypePeer::AGE, $age, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::AGE_BU, $ageBu, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::AGE_BC, $ageBc, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::AGE_EU, $ageEu, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(ActiontypePeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the office column
     *
     * Example usage:
     * <code>
     * $query->filterByOffice('fooValue');   // WHERE office = 'fooValue'
     * $query->filterByOffice('%fooValue%'); // WHERE office LIKE '%fooValue%'
     * </code>
     *
     * @param     string $office The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByOffice($office = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($office)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $office)) {
                $office = str_replace('*', '%', $office);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::OFFICE, $office, $comparison);
    }

    /**
     * Filter the query on the showInForm column
     *
     * Example usage:
     * <code>
     * $query->filterByShowinform(true); // WHERE showInForm = true
     * $query->filterByShowinform('yes'); // WHERE showInForm = true
     * </code>
     *
     * @param     boolean|string $showinform The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByShowinform($showinform = null, $comparison = null)
    {
        if (is_string($showinform)) {
            $showinform = in_array(strtolower($showinform), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::SHOWINFORM, $showinform, $comparison);
    }

    /**
     * Filter the query on the genTimetable column
     *
     * Example usage:
     * <code>
     * $query->filterByGentimetable(true); // WHERE genTimetable = true
     * $query->filterByGentimetable('yes'); // WHERE genTimetable = true
     * </code>
     *
     * @param     boolean|string $gentimetable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByGentimetable($gentimetable = null, $comparison = null)
    {
        if (is_string($gentimetable)) {
            $gentimetable = in_array(strtolower($gentimetable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::GENTIMETABLE, $gentimetable, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(ActiontypePeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(ActiontypePeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::SERVICE_ID, $serviceId, $comparison);
    }

    /**
     * Filter the query on the quotaType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotatypeId(1234); // WHERE quotaType_id = 1234
     * $query->filterByQuotatypeId(array(12, 34)); // WHERE quotaType_id IN (12, 34)
     * $query->filterByQuotatypeId(array('min' => 12)); // WHERE quotaType_id >= 12
     * $query->filterByQuotatypeId(array('max' => 12)); // WHERE quotaType_id <= 12
     * </code>
     *
     * @param     mixed $quotatypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByQuotatypeId($quotatypeId = null, $comparison = null)
    {
        if (is_array($quotatypeId)) {
            $useMinMax = false;
            if (isset($quotatypeId['min'])) {
                $this->addUsingAlias(ActiontypePeer::QUOTATYPE_ID, $quotatypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotatypeId['max'])) {
                $this->addUsingAlias(ActiontypePeer::QUOTATYPE_ID, $quotatypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::QUOTATYPE_ID, $quotatypeId, $comparison);
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
     * @return ActiontypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ActiontypePeer::CONTEXT, $context, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount >= 12
     * $query->filterByAmount(array('max' => 12)); // WHERE amount <= 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ActiontypePeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ActiontypePeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the amountEvaluation column
     *
     * Example usage:
     * <code>
     * $query->filterByAmountevaluation(1234); // WHERE amountEvaluation = 1234
     * $query->filterByAmountevaluation(array(12, 34)); // WHERE amountEvaluation IN (12, 34)
     * $query->filterByAmountevaluation(array('min' => 12)); // WHERE amountEvaluation >= 12
     * $query->filterByAmountevaluation(array('max' => 12)); // WHERE amountEvaluation <= 12
     * </code>
     *
     * @param     mixed $amountevaluation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByAmountevaluation($amountevaluation = null, $comparison = null)
    {
        if (is_array($amountevaluation)) {
            $useMinMax = false;
            if (isset($amountevaluation['min'])) {
                $this->addUsingAlias(ActiontypePeer::AMOUNTEVALUATION, $amountevaluation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amountevaluation['max'])) {
                $this->addUsingAlias(ActiontypePeer::AMOUNTEVALUATION, $amountevaluation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::AMOUNTEVALUATION, $amountevaluation, $comparison);
    }

    /**
     * Filter the query on the defaultStatus column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultstatus(1234); // WHERE defaultStatus = 1234
     * $query->filterByDefaultstatus(array(12, 34)); // WHERE defaultStatus IN (12, 34)
     * $query->filterByDefaultstatus(array('min' => 12)); // WHERE defaultStatus >= 12
     * $query->filterByDefaultstatus(array('max' => 12)); // WHERE defaultStatus <= 12
     * </code>
     *
     * @param     mixed $defaultstatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultstatus($defaultstatus = null, $comparison = null)
    {
        if (is_array($defaultstatus)) {
            $useMinMax = false;
            if (isset($defaultstatus['min'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTSTATUS, $defaultstatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultstatus['max'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTSTATUS, $defaultstatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTSTATUS, $defaultstatus, $comparison);
    }

    /**
     * Filter the query on the defaultDirectionDate column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultdirectiondate(1234); // WHERE defaultDirectionDate = 1234
     * $query->filterByDefaultdirectiondate(array(12, 34)); // WHERE defaultDirectionDate IN (12, 34)
     * $query->filterByDefaultdirectiondate(array('min' => 12)); // WHERE defaultDirectionDate >= 12
     * $query->filterByDefaultdirectiondate(array('max' => 12)); // WHERE defaultDirectionDate <= 12
     * </code>
     *
     * @param     mixed $defaultdirectiondate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultdirectiondate($defaultdirectiondate = null, $comparison = null)
    {
        if (is_array($defaultdirectiondate)) {
            $useMinMax = false;
            if (isset($defaultdirectiondate['min'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTDIRECTIONDATE, $defaultdirectiondate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultdirectiondate['max'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTDIRECTIONDATE, $defaultdirectiondate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTDIRECTIONDATE, $defaultdirectiondate, $comparison);
    }

    /**
     * Filter the query on the defaultPlannedEndDate column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultplannedenddate(true); // WHERE defaultPlannedEndDate = true
     * $query->filterByDefaultplannedenddate('yes'); // WHERE defaultPlannedEndDate = true
     * </code>
     *
     * @param     boolean|string $defaultplannedenddate The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultplannedenddate($defaultplannedenddate = null, $comparison = null)
    {
        if (is_string($defaultplannedenddate)) {
            $defaultplannedenddate = in_array(strtolower($defaultplannedenddate), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTPLANNEDENDDATE, $defaultplannedenddate, $comparison);
    }

    /**
     * Filter the query on the defaultEndDate column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultenddate(1234); // WHERE defaultEndDate = 1234
     * $query->filterByDefaultenddate(array(12, 34)); // WHERE defaultEndDate IN (12, 34)
     * $query->filterByDefaultenddate(array('min' => 12)); // WHERE defaultEndDate >= 12
     * $query->filterByDefaultenddate(array('max' => 12)); // WHERE defaultEndDate <= 12
     * </code>
     *
     * @param     mixed $defaultenddate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultenddate($defaultenddate = null, $comparison = null)
    {
        if (is_array($defaultenddate)) {
            $useMinMax = false;
            if (isset($defaultenddate['min'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTENDDATE, $defaultenddate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultenddate['max'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTENDDATE, $defaultenddate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTENDDATE, $defaultenddate, $comparison);
    }

    /**
     * Filter the query on the defaultExecPerson_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultexecpersonId(1234); // WHERE defaultExecPerson_id = 1234
     * $query->filterByDefaultexecpersonId(array(12, 34)); // WHERE defaultExecPerson_id IN (12, 34)
     * $query->filterByDefaultexecpersonId(array('min' => 12)); // WHERE defaultExecPerson_id >= 12
     * $query->filterByDefaultexecpersonId(array('max' => 12)); // WHERE defaultExecPerson_id <= 12
     * </code>
     *
     * @see       filterByPerson()
     *
     * @param     mixed $defaultexecpersonId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultexecpersonId($defaultexecpersonId = null, $comparison = null)
    {
        if (is_array($defaultexecpersonId)) {
            $useMinMax = false;
            if (isset($defaultexecpersonId['min'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTEXECPERSON_ID, $defaultexecpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultexecpersonId['max'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTEXECPERSON_ID, $defaultexecpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTEXECPERSON_ID, $defaultexecpersonId, $comparison);
    }

    /**
     * Filter the query on the defaultPersonInEvent column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultpersoninevent(1234); // WHERE defaultPersonInEvent = 1234
     * $query->filterByDefaultpersoninevent(array(12, 34)); // WHERE defaultPersonInEvent IN (12, 34)
     * $query->filterByDefaultpersoninevent(array('min' => 12)); // WHERE defaultPersonInEvent >= 12
     * $query->filterByDefaultpersoninevent(array('max' => 12)); // WHERE defaultPersonInEvent <= 12
     * </code>
     *
     * @param     mixed $defaultpersoninevent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultpersoninevent($defaultpersoninevent = null, $comparison = null)
    {
        if (is_array($defaultpersoninevent)) {
            $useMinMax = false;
            if (isset($defaultpersoninevent['min'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTPERSONINEVENT, $defaultpersoninevent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultpersoninevent['max'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTPERSONINEVENT, $defaultpersoninevent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTPERSONINEVENT, $defaultpersoninevent, $comparison);
    }

    /**
     * Filter the query on the defaultPersonInEditor column
     *
     * Example usage:
     * <code>
     * $query->filterByDefaultpersonineditor(1234); // WHERE defaultPersonInEditor = 1234
     * $query->filterByDefaultpersonineditor(array(12, 34)); // WHERE defaultPersonInEditor IN (12, 34)
     * $query->filterByDefaultpersonineditor(array('min' => 12)); // WHERE defaultPersonInEditor >= 12
     * $query->filterByDefaultpersonineditor(array('max' => 12)); // WHERE defaultPersonInEditor <= 12
     * </code>
     *
     * @param     mixed $defaultpersonineditor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByDefaultpersonineditor($defaultpersonineditor = null, $comparison = null)
    {
        if (is_array($defaultpersonineditor)) {
            $useMinMax = false;
            if (isset($defaultpersonineditor['min'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTPERSONINEDITOR, $defaultpersonineditor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($defaultpersonineditor['max'])) {
                $this->addUsingAlias(ActiontypePeer::DEFAULTPERSONINEDITOR, $defaultpersonineditor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::DEFAULTPERSONINEDITOR, $defaultpersonineditor, $comparison);
    }

    /**
     * Filter the query on the maxOccursInEvent column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxoccursinevent(1234); // WHERE maxOccursInEvent = 1234
     * $query->filterByMaxoccursinevent(array(12, 34)); // WHERE maxOccursInEvent IN (12, 34)
     * $query->filterByMaxoccursinevent(array('min' => 12)); // WHERE maxOccursInEvent >= 12
     * $query->filterByMaxoccursinevent(array('max' => 12)); // WHERE maxOccursInEvent <= 12
     * </code>
     *
     * @param     mixed $maxoccursinevent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByMaxoccursinevent($maxoccursinevent = null, $comparison = null)
    {
        if (is_array($maxoccursinevent)) {
            $useMinMax = false;
            if (isset($maxoccursinevent['min'])) {
                $this->addUsingAlias(ActiontypePeer::MAXOCCURSINEVENT, $maxoccursinevent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxoccursinevent['max'])) {
                $this->addUsingAlias(ActiontypePeer::MAXOCCURSINEVENT, $maxoccursinevent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::MAXOCCURSINEVENT, $maxoccursinevent, $comparison);
    }

    /**
     * Filter the query on the showTime column
     *
     * Example usage:
     * <code>
     * $query->filterByShowtime(true); // WHERE showTime = true
     * $query->filterByShowtime('yes'); // WHERE showTime = true
     * </code>
     *
     * @param     boolean|string $showtime The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByShowtime($showtime = null, $comparison = null)
    {
        if (is_string($showtime)) {
            $showtime = in_array(strtolower($showtime), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::SHOWTIME, $showtime, $comparison);
    }

    /**
     * Filter the query on the isMES column
     *
     * Example usage:
     * <code>
     * $query->filterByIsmes(1234); // WHERE isMES = 1234
     * $query->filterByIsmes(array(12, 34)); // WHERE isMES IN (12, 34)
     * $query->filterByIsmes(array('min' => 12)); // WHERE isMES >= 12
     * $query->filterByIsmes(array('max' => 12)); // WHERE isMES <= 12
     * </code>
     *
     * @param     mixed $ismes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByIsmes($ismes = null, $comparison = null)
    {
        if (is_array($ismes)) {
            $useMinMax = false;
            if (isset($ismes['min'])) {
                $this->addUsingAlias(ActiontypePeer::ISMES, $ismes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ismes['max'])) {
                $this->addUsingAlias(ActiontypePeer::ISMES, $ismes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::ISMES, $ismes, $comparison);
    }

    /**
     * Filter the query on the nomenclativeService_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNomenclativeserviceId(1234); // WHERE nomenclativeService_id = 1234
     * $query->filterByNomenclativeserviceId(array(12, 34)); // WHERE nomenclativeService_id IN (12, 34)
     * $query->filterByNomenclativeserviceId(array('min' => 12)); // WHERE nomenclativeService_id >= 12
     * $query->filterByNomenclativeserviceId(array('max' => 12)); // WHERE nomenclativeService_id <= 12
     * </code>
     *
     * @param     mixed $nomenclativeserviceId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByNomenclativeserviceId($nomenclativeserviceId = null, $comparison = null)
    {
        if (is_array($nomenclativeserviceId)) {
            $useMinMax = false;
            if (isset($nomenclativeserviceId['min'])) {
                $this->addUsingAlias(ActiontypePeer::NOMENCLATIVESERVICE_ID, $nomenclativeserviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nomenclativeserviceId['max'])) {
                $this->addUsingAlias(ActiontypePeer::NOMENCLATIVESERVICE_ID, $nomenclativeserviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::NOMENCLATIVESERVICE_ID, $nomenclativeserviceId, $comparison);
    }

    /**
     * Filter the query on the isPreferable column
     *
     * Example usage:
     * <code>
     * $query->filterByIspreferable(true); // WHERE isPreferable = true
     * $query->filterByIspreferable('yes'); // WHERE isPreferable = true
     * </code>
     *
     * @param     boolean|string $ispreferable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByIspreferable($ispreferable = null, $comparison = null)
    {
        if (is_string($ispreferable)) {
            $ispreferable = in_array(strtolower($ispreferable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::ISPREFERABLE, $ispreferable, $comparison);
    }

    /**
     * Filter the query on the prescribedType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPrescribedtypeId(1234); // WHERE prescribedType_id = 1234
     * $query->filterByPrescribedtypeId(array(12, 34)); // WHERE prescribedType_id IN (12, 34)
     * $query->filterByPrescribedtypeId(array('min' => 12)); // WHERE prescribedType_id >= 12
     * $query->filterByPrescribedtypeId(array('max' => 12)); // WHERE prescribedType_id <= 12
     * </code>
     *
     * @param     mixed $prescribedtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByPrescribedtypeId($prescribedtypeId = null, $comparison = null)
    {
        if (is_array($prescribedtypeId)) {
            $useMinMax = false;
            if (isset($prescribedtypeId['min'])) {
                $this->addUsingAlias(ActiontypePeer::PRESCRIBEDTYPE_ID, $prescribedtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($prescribedtypeId['max'])) {
                $this->addUsingAlias(ActiontypePeer::PRESCRIBEDTYPE_ID, $prescribedtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::PRESCRIBEDTYPE_ID, $prescribedtypeId, $comparison);
    }

    /**
     * Filter the query on the shedule_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySheduleId(1234); // WHERE shedule_id = 1234
     * $query->filterBySheduleId(array(12, 34)); // WHERE shedule_id IN (12, 34)
     * $query->filterBySheduleId(array('min' => 12)); // WHERE shedule_id >= 12
     * $query->filterBySheduleId(array('max' => 12)); // WHERE shedule_id <= 12
     * </code>
     *
     * @param     mixed $sheduleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterBySheduleId($sheduleId = null, $comparison = null)
    {
        if (is_array($sheduleId)) {
            $useMinMax = false;
            if (isset($sheduleId['min'])) {
                $this->addUsingAlias(ActiontypePeer::SHEDULE_ID, $sheduleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sheduleId['max'])) {
                $this->addUsingAlias(ActiontypePeer::SHEDULE_ID, $sheduleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::SHEDULE_ID, $sheduleId, $comparison);
    }

    /**
     * Filter the query on the isRequiredCoordination column
     *
     * Example usage:
     * <code>
     * $query->filterByIsrequiredcoordination(true); // WHERE isRequiredCoordination = true
     * $query->filterByIsrequiredcoordination('yes'); // WHERE isRequiredCoordination = true
     * </code>
     *
     * @param     boolean|string $isrequiredcoordination The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByIsrequiredcoordination($isrequiredcoordination = null, $comparison = null)
    {
        if (is_string($isrequiredcoordination)) {
            $isrequiredcoordination = in_array(strtolower($isrequiredcoordination), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::ISREQUIREDCOORDINATION, $isrequiredcoordination, $comparison);
    }

    /**
     * Filter the query on the isRequiredTissue column
     *
     * Example usage:
     * <code>
     * $query->filterByIsrequiredtissue(true); // WHERE isRequiredTissue = true
     * $query->filterByIsrequiredtissue('yes'); // WHERE isRequiredTissue = true
     * </code>
     *
     * @param     boolean|string $isrequiredtissue The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByIsrequiredtissue($isrequiredtissue = null, $comparison = null)
    {
        if (is_string($isrequiredtissue)) {
            $isrequiredtissue = in_array(strtolower($isrequiredtissue), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ActiontypePeer::ISREQUIREDTISSUE, $isrequiredtissue, $comparison);
    }

    /**
     * Filter the query on the testTubeType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTesttubetypeId(1234); // WHERE testTubeType_id = 1234
     * $query->filterByTesttubetypeId(array(12, 34)); // WHERE testTubeType_id IN (12, 34)
     * $query->filterByTesttubetypeId(array('min' => 12)); // WHERE testTubeType_id >= 12
     * $query->filterByTesttubetypeId(array('max' => 12)); // WHERE testTubeType_id <= 12
     * </code>
     *
     * @see       filterByRbtesttubetype()
     *
     * @param     mixed $testtubetypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByTesttubetypeId($testtubetypeId = null, $comparison = null)
    {
        if (is_array($testtubetypeId)) {
            $useMinMax = false;
            if (isset($testtubetypeId['min'])) {
                $this->addUsingAlias(ActiontypePeer::TESTTUBETYPE_ID, $testtubetypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($testtubetypeId['max'])) {
                $this->addUsingAlias(ActiontypePeer::TESTTUBETYPE_ID, $testtubetypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::TESTTUBETYPE_ID, $testtubetypeId, $comparison);
    }

    /**
     * Filter the query on the jobType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJobtypeId(1234); // WHERE jobType_id = 1234
     * $query->filterByJobtypeId(array(12, 34)); // WHERE jobType_id IN (12, 34)
     * $query->filterByJobtypeId(array('min' => 12)); // WHERE jobType_id >= 12
     * $query->filterByJobtypeId(array('max' => 12)); // WHERE jobType_id <= 12
     * </code>
     *
     * @see       filterByRbjobtype()
     *
     * @param     mixed $jobtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByJobtypeId($jobtypeId = null, $comparison = null)
    {
        if (is_array($jobtypeId)) {
            $useMinMax = false;
            if (isset($jobtypeId['min'])) {
                $this->addUsingAlias(ActiontypePeer::JOBTYPE_ID, $jobtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jobtypeId['max'])) {
                $this->addUsingAlias(ActiontypePeer::JOBTYPE_ID, $jobtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::JOBTYPE_ID, $jobtypeId, $comparison);
    }

    /**
     * Filter the query on the mnem column
     *
     * Example usage:
     * <code>
     * $query->filterByMnem('fooValue');   // WHERE mnem = 'fooValue'
     * $query->filterByMnem('%fooValue%'); // WHERE mnem LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mnem The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function filterByMnem($mnem = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mnem)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mnem)) {
                $mnem = str_replace('*', '%', $mnem);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ActiontypePeer::MNEM, $mnem, $comparison);
    }

    /**
     * Filter the query by a related Person object
     *
     * @param   Person|PropelObjectCollection $person The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPerson($person, $comparison = null)
    {
        if ($person instanceof Person) {
            return $this
                ->addUsingAlias(ActiontypePeer::DEFAULTEXECPERSON_ID, $person->getId(), $comparison);
        } elseif ($person instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypePeer::DEFAULTEXECPERSON_ID, $person->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPerson() only accepts arguments of type Person or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Person relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinPerson($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Person');

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
            $this->addJoinObject($join, 'Person');
        }

        return $this;
    }

    /**
     * Use the Person relation Person object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonQuery A secondary query class using the current class as primary query
     */
    public function usePersonQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Person', '\Webmis\Models\PersonQuery');
    }

    /**
     * Filter the query by a related Rbjobtype object
     *
     * @param   Rbjobtype|PropelObjectCollection $rbjobtype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbjobtype($rbjobtype, $comparison = null)
    {
        if ($rbjobtype instanceof Rbjobtype) {
            return $this
                ->addUsingAlias(ActiontypePeer::JOBTYPE_ID, $rbjobtype->getId(), $comparison);
        } elseif ($rbjobtype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypePeer::JOBTYPE_ID, $rbjobtype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbjobtype() only accepts arguments of type Rbjobtype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbjobtype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinRbjobtype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbjobtype');

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
            $this->addJoinObject($join, 'Rbjobtype');
        }

        return $this;
    }

    /**
     * Use the Rbjobtype relation Rbjobtype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbjobtypeQuery A secondary query class using the current class as primary query
     */
    public function useRbjobtypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbjobtype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbjobtype', '\Webmis\Models\RbjobtypeQuery');
    }

    /**
     * Filter the query by a related Rbtesttubetype object
     *
     * @param   Rbtesttubetype|PropelObjectCollection $rbtesttubetype The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbtesttubetype($rbtesttubetype, $comparison = null)
    {
        if ($rbtesttubetype instanceof Rbtesttubetype) {
            return $this
                ->addUsingAlias(ActiontypePeer::TESTTUBETYPE_ID, $rbtesttubetype->getId(), $comparison);
        } elseif ($rbtesttubetype instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActiontypePeer::TESTTUBETYPE_ID, $rbtesttubetype->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbtesttubetype() only accepts arguments of type Rbtesttubetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbtesttubetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinRbtesttubetype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbtesttubetype');

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
            $this->addJoinObject($join, 'Rbtesttubetype');
        }

        return $this;
    }

    /**
     * Use the Rbtesttubetype relation Rbtesttubetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbtesttubetypeQuery A secondary query class using the current class as primary query
     */
    public function useRbtesttubetypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbtesttubetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbtesttubetype', '\Webmis\Models\RbtesttubetypeQuery');
    }

    /**
     * Filter the query by a related ActiontypeEventtypeCheck object
     *
     * @param   ActiontypeEventtypeCheck|PropelObjectCollection $actiontypeEventtypeCheck  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeEventtypeCheckRelatedByActiontypeId($actiontypeEventtypeCheck, $comparison = null)
    {
        if ($actiontypeEventtypeCheck instanceof ActiontypeEventtypeCheck) {
            return $this
                ->addUsingAlias(ActiontypePeer::ID, $actiontypeEventtypeCheck->getActiontypeId(), $comparison);
        } elseif ($actiontypeEventtypeCheck instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeEventtypeCheckRelatedByActiontypeIdQuery()
                ->filterByPrimaryKeys($actiontypeEventtypeCheck->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontypeEventtypeCheckRelatedByActiontypeId() only accepts arguments of type ActiontypeEventtypeCheck or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByActiontypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinActiontypeEventtypeCheckRelatedByActiontypeId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeEventtypeCheckRelatedByActiontypeId');

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
            $this->addJoinObject($join, 'ActiontypeEventtypeCheckRelatedByActiontypeId');
        }

        return $this;
    }

    /**
     * Use the ActiontypeEventtypeCheckRelatedByActiontypeId relation ActiontypeEventtypeCheck object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeEventtypeCheckQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeEventtypeCheckRelatedByActiontypeIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontypeEventtypeCheckRelatedByActiontypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeEventtypeCheckRelatedByActiontypeId', '\Webmis\Models\ActiontypeEventtypeCheckQuery');
    }

    /**
     * Filter the query by a related ActiontypeEventtypeCheck object
     *
     * @param   ActiontypeEventtypeCheck|PropelObjectCollection $actiontypeEventtypeCheck  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeEventtypeCheckRelatedByRelatedActiontypeId($actiontypeEventtypeCheck, $comparison = null)
    {
        if ($actiontypeEventtypeCheck instanceof ActiontypeEventtypeCheck) {
            return $this
                ->addUsingAlias(ActiontypePeer::ID, $actiontypeEventtypeCheck->getRelatedActiontypeId(), $comparison);
        } elseif ($actiontypeEventtypeCheck instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeEventtypeCheckRelatedByRelatedActiontypeIdQuery()
                ->filterByPrimaryKeys($actiontypeEventtypeCheck->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontypeEventtypeCheckRelatedByRelatedActiontypeId() only accepts arguments of type ActiontypeEventtypeCheck or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeEventtypeCheckRelatedByRelatedActiontypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinActiontypeEventtypeCheckRelatedByRelatedActiontypeId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeEventtypeCheckRelatedByRelatedActiontypeId');

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
            $this->addJoinObject($join, 'ActiontypeEventtypeCheckRelatedByRelatedActiontypeId');
        }

        return $this;
    }

    /**
     * Use the ActiontypeEventtypeCheckRelatedByRelatedActiontypeId relation ActiontypeEventtypeCheck object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeEventtypeCheckQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeEventtypeCheckRelatedByRelatedActiontypeIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActiontypeEventtypeCheckRelatedByRelatedActiontypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeEventtypeCheckRelatedByRelatedActiontypeId', '\Webmis\Models\ActiontypeEventtypeCheckQuery');
    }

    /**
     * Filter the query by a related ActiontypeTissuetype object
     *
     * @param   ActiontypeTissuetype|PropelObjectCollection $actiontypeTissuetype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeTissuetype($actiontypeTissuetype, $comparison = null)
    {
        if ($actiontypeTissuetype instanceof ActiontypeTissuetype) {
            return $this
                ->addUsingAlias(ActiontypePeer::ID, $actiontypeTissuetype->getMasterId(), $comparison);
        } elseif ($actiontypeTissuetype instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeTissuetypeQuery()
                ->filterByPrimaryKeys($actiontypeTissuetype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontypeTissuetype() only accepts arguments of type ActiontypeTissuetype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeTissuetype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinActiontypeTissuetype($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeTissuetype');

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
            $this->addJoinObject($join, 'ActiontypeTissuetype');
        }

        return $this;
    }

    /**
     * Use the ActiontypeTissuetype relation ActiontypeTissuetype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeTissuetypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeTissuetypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontypeTissuetype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeTissuetype', '\Webmis\Models\ActiontypeTissuetypeQuery');
    }

    /**
     * Filter the query by a related Blankactions object
     *
     * @param   Blankactions|PropelObjectCollection $blankactions  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactions($blankactions, $comparison = null)
    {
        if ($blankactions instanceof Blankactions) {
            return $this
                ->addUsingAlias(ActiontypePeer::ID, $blankactions->getDoctypeId(), $comparison);
        } elseif ($blankactions instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsQuery()
                ->filterByPrimaryKeys($blankactions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactions() only accepts arguments of type Blankactions or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Blankactions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinBlankactions($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Blankactions');

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
            $this->addJoinObject($join, 'Blankactions');
        }

        return $this;
    }

    /**
     * Use the Blankactions relation Blankactions object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Blankactions', '\Webmis\Models\BlankactionsQuery');
    }

    /**
     * Filter the query by a related Rbblankactions object
     *
     * @param   Rbblankactions|PropelObjectCollection $rbblankactions  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ActiontypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbblankactions($rbblankactions, $comparison = null)
    {
        if ($rbblankactions instanceof Rbblankactions) {
            return $this
                ->addUsingAlias(ActiontypePeer::ID, $rbblankactions->getDoctypeId(), $comparison);
        } elseif ($rbblankactions instanceof PropelObjectCollection) {
            return $this
                ->useRbblankactionsQuery()
                ->filterByPrimaryKeys($rbblankactions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRbblankactions() only accepts arguments of type Rbblankactions or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbblankactions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function joinRbblankactions($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbblankactions');

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
            $this->addJoinObject($join, 'Rbblankactions');
        }

        return $this;
    }

    /**
     * Use the Rbblankactions relation Rbblankactions object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbblankactionsQuery A secondary query class using the current class as primary query
     */
    public function useRbblankactionsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRbblankactions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbblankactions', '\Webmis\Models\RbblankactionsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Actiontype $actiontype Object to remove from the list of results
     *
     * @return ActiontypeQuery The current query, for fluid interface
     */
    public function prune($actiontype = null)
    {
        if ($actiontype) {
            $this->addUsingAlias(ActiontypePeer::ID, $actiontype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
