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
use Webmis\Models\ActiontypeEventtypeCheck;
use Webmis\Models\Eventtype;
use Webmis\Models\EventtypePeer;
use Webmis\Models\EventtypeQuery;
use Webmis\Models\Medicalkindunit;
use Webmis\Models\Rbcounter;
use Webmis\Models\Rbmedicalkind;

/**
 * Base class that represents a query for the 'EventType' table.
 *
 *
 *
 * @method EventtypeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method EventtypeQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method EventtypeQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method EventtypeQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method EventtypeQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method EventtypeQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method EventtypeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method EventtypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method EventtypeQuery orderByPurposeId($order = Criteria::ASC) Order by the purpose_id column
 * @method EventtypeQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method EventtypeQuery orderBySceneId($order = Criteria::ASC) Order by the scene_id column
 * @method EventtypeQuery orderByVisitservicemodifier($order = Criteria::ASC) Order by the visitServiceModifier column
 * @method EventtypeQuery orderByVisitservicefilter($order = Criteria::ASC) Order by the visitServiceFilter column
 * @method EventtypeQuery orderByVisitfinance($order = Criteria::ASC) Order by the visitFinance column
 * @method EventtypeQuery orderByActionfinance($order = Criteria::ASC) Order by the actionFinance column
 * @method EventtypeQuery orderByPeriod($order = Criteria::ASC) Order by the period column
 * @method EventtypeQuery orderBySingleinperiod($order = Criteria::ASC) Order by the singleInPeriod column
 * @method EventtypeQuery orderByIslong($order = Criteria::ASC) Order by the isLong column
 * @method EventtypeQuery orderByDateinput($order = Criteria::ASC) Order by the dateInput column
 * @method EventtypeQuery orderByServiceId($order = Criteria::ASC) Order by the service_id column
 * @method EventtypeQuery orderByContext($order = Criteria::ASC) Order by the context column
 * @method EventtypeQuery orderByForm($order = Criteria::ASC) Order by the form column
 * @method EventtypeQuery orderByMinduration($order = Criteria::ASC) Order by the minDuration column
 * @method EventtypeQuery orderByMaxduration($order = Criteria::ASC) Order by the maxDuration column
 * @method EventtypeQuery orderByShowstatusactionsinplanner($order = Criteria::ASC) Order by the showStatusActionsInPlanner column
 * @method EventtypeQuery orderByShowdiagnosticactionsinplanner($order = Criteria::ASC) Order by the showDiagnosticActionsInPlanner column
 * @method EventtypeQuery orderByShowcureactionsinplanner($order = Criteria::ASC) Order by the showCureActionsInPlanner column
 * @method EventtypeQuery orderByShowmiscactionsinplanner($order = Criteria::ASC) Order by the showMiscActionsInPlanner column
 * @method EventtypeQuery orderByLimitstatusactionsinput($order = Criteria::ASC) Order by the limitStatusActionsInput column
 * @method EventtypeQuery orderByLimitdiagnosticactionsinput($order = Criteria::ASC) Order by the limitDiagnosticActionsInput column
 * @method EventtypeQuery orderByLimitcureactionsinput($order = Criteria::ASC) Order by the limitCureActionsInput column
 * @method EventtypeQuery orderByLimitmiscactionsinput($order = Criteria::ASC) Order by the limitMiscActionsInput column
 * @method EventtypeQuery orderByShowtime($order = Criteria::ASC) Order by the showTime column
 * @method EventtypeQuery orderByMedicalaidtypeId($order = Criteria::ASC) Order by the medicalAidType_id column
 * @method EventtypeQuery orderByEventprofileId($order = Criteria::ASC) Order by the eventProfile_id column
 * @method EventtypeQuery orderByMesrequired($order = Criteria::ASC) Order by the mesRequired column
 * @method EventtypeQuery orderByMescodemask($order = Criteria::ASC) Order by the mesCodeMask column
 * @method EventtypeQuery orderByMesnamemask($order = Criteria::ASC) Order by the mesNameMask column
 * @method EventtypeQuery orderByCounterId($order = Criteria::ASC) Order by the counter_id column
 * @method EventtypeQuery orderByIsexternal($order = Criteria::ASC) Order by the isExternal column
 * @method EventtypeQuery orderByIsassistant($order = Criteria::ASC) Order by the isAssistant column
 * @method EventtypeQuery orderByIscurator($order = Criteria::ASC) Order by the isCurator column
 * @method EventtypeQuery orderByCanhavepayableactions($order = Criteria::ASC) Order by the canHavePayableActions column
 * @method EventtypeQuery orderByIsrequiredcoordination($order = Criteria::ASC) Order by the isRequiredCoordination column
 * @method EventtypeQuery orderByIsorgstructurepriority($order = Criteria::ASC) Order by the isOrgStructurePriority column
 * @method EventtypeQuery orderByIstakentissue($order = Criteria::ASC) Order by the isTakenTissue column
 * @method EventtypeQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method EventtypeQuery orderByAge($order = Criteria::ASC) Order by the age column
 * @method EventtypeQuery orderByRbmedicalkindId($order = Criteria::ASC) Order by the rbMedicalKind_id column
 * @method EventtypeQuery orderByAgeBu($order = Criteria::ASC) Order by the age_bu column
 * @method EventtypeQuery orderByAgeBc($order = Criteria::ASC) Order by the age_bc column
 * @method EventtypeQuery orderByAgeEu($order = Criteria::ASC) Order by the age_eu column
 * @method EventtypeQuery orderByAgeEc($order = Criteria::ASC) Order by the age_ec column
 * @method EventtypeQuery orderByRequesttypeId($order = Criteria::ASC) Order by the requestType_id column
 *
 * @method EventtypeQuery groupById() Group by the id column
 * @method EventtypeQuery groupByCreatedatetime() Group by the createDatetime column
 * @method EventtypeQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method EventtypeQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method EventtypeQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method EventtypeQuery groupByDeleted() Group by the deleted column
 * @method EventtypeQuery groupByCode() Group by the code column
 * @method EventtypeQuery groupByName() Group by the name column
 * @method EventtypeQuery groupByPurposeId() Group by the purpose_id column
 * @method EventtypeQuery groupByFinanceId() Group by the finance_id column
 * @method EventtypeQuery groupBySceneId() Group by the scene_id column
 * @method EventtypeQuery groupByVisitservicemodifier() Group by the visitServiceModifier column
 * @method EventtypeQuery groupByVisitservicefilter() Group by the visitServiceFilter column
 * @method EventtypeQuery groupByVisitfinance() Group by the visitFinance column
 * @method EventtypeQuery groupByActionfinance() Group by the actionFinance column
 * @method EventtypeQuery groupByPeriod() Group by the period column
 * @method EventtypeQuery groupBySingleinperiod() Group by the singleInPeriod column
 * @method EventtypeQuery groupByIslong() Group by the isLong column
 * @method EventtypeQuery groupByDateinput() Group by the dateInput column
 * @method EventtypeQuery groupByServiceId() Group by the service_id column
 * @method EventtypeQuery groupByContext() Group by the context column
 * @method EventtypeQuery groupByForm() Group by the form column
 * @method EventtypeQuery groupByMinduration() Group by the minDuration column
 * @method EventtypeQuery groupByMaxduration() Group by the maxDuration column
 * @method EventtypeQuery groupByShowstatusactionsinplanner() Group by the showStatusActionsInPlanner column
 * @method EventtypeQuery groupByShowdiagnosticactionsinplanner() Group by the showDiagnosticActionsInPlanner column
 * @method EventtypeQuery groupByShowcureactionsinplanner() Group by the showCureActionsInPlanner column
 * @method EventtypeQuery groupByShowmiscactionsinplanner() Group by the showMiscActionsInPlanner column
 * @method EventtypeQuery groupByLimitstatusactionsinput() Group by the limitStatusActionsInput column
 * @method EventtypeQuery groupByLimitdiagnosticactionsinput() Group by the limitDiagnosticActionsInput column
 * @method EventtypeQuery groupByLimitcureactionsinput() Group by the limitCureActionsInput column
 * @method EventtypeQuery groupByLimitmiscactionsinput() Group by the limitMiscActionsInput column
 * @method EventtypeQuery groupByShowtime() Group by the showTime column
 * @method EventtypeQuery groupByMedicalaidtypeId() Group by the medicalAidType_id column
 * @method EventtypeQuery groupByEventprofileId() Group by the eventProfile_id column
 * @method EventtypeQuery groupByMesrequired() Group by the mesRequired column
 * @method EventtypeQuery groupByMescodemask() Group by the mesCodeMask column
 * @method EventtypeQuery groupByMesnamemask() Group by the mesNameMask column
 * @method EventtypeQuery groupByCounterId() Group by the counter_id column
 * @method EventtypeQuery groupByIsexternal() Group by the isExternal column
 * @method EventtypeQuery groupByIsassistant() Group by the isAssistant column
 * @method EventtypeQuery groupByIscurator() Group by the isCurator column
 * @method EventtypeQuery groupByCanhavepayableactions() Group by the canHavePayableActions column
 * @method EventtypeQuery groupByIsrequiredcoordination() Group by the isRequiredCoordination column
 * @method EventtypeQuery groupByIsorgstructurepriority() Group by the isOrgStructurePriority column
 * @method EventtypeQuery groupByIstakentissue() Group by the isTakenTissue column
 * @method EventtypeQuery groupBySex() Group by the sex column
 * @method EventtypeQuery groupByAge() Group by the age column
 * @method EventtypeQuery groupByRbmedicalkindId() Group by the rbMedicalKind_id column
 * @method EventtypeQuery groupByAgeBu() Group by the age_bu column
 * @method EventtypeQuery groupByAgeBc() Group by the age_bc column
 * @method EventtypeQuery groupByAgeEu() Group by the age_eu column
 * @method EventtypeQuery groupByAgeEc() Group by the age_ec column
 * @method EventtypeQuery groupByRequesttypeId() Group by the requestType_id column
 *
 * @method EventtypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method EventtypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method EventtypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method EventtypeQuery leftJoinRbcounter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbcounter relation
 * @method EventtypeQuery rightJoinRbcounter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbcounter relation
 * @method EventtypeQuery innerJoinRbcounter($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbcounter relation
 *
 * @method EventtypeQuery leftJoinRbmedicalkind($relationAlias = null) Adds a LEFT JOIN clause to the query using the Rbmedicalkind relation
 * @method EventtypeQuery rightJoinRbmedicalkind($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Rbmedicalkind relation
 * @method EventtypeQuery innerJoinRbmedicalkind($relationAlias = null) Adds a INNER JOIN clause to the query using the Rbmedicalkind relation
 *
 * @method EventtypeQuery leftJoinActiontypeEventtypeCheck($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActiontypeEventtypeCheck relation
 * @method EventtypeQuery rightJoinActiontypeEventtypeCheck($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActiontypeEventtypeCheck relation
 * @method EventtypeQuery innerJoinActiontypeEventtypeCheck($relationAlias = null) Adds a INNER JOIN clause to the query using the ActiontypeEventtypeCheck relation
 *
 * @method EventtypeQuery leftJoinMedicalkindunit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Medicalkindunit relation
 * @method EventtypeQuery rightJoinMedicalkindunit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Medicalkindunit relation
 * @method EventtypeQuery innerJoinMedicalkindunit($relationAlias = null) Adds a INNER JOIN clause to the query using the Medicalkindunit relation
 *
 * @method Eventtype findOne(PropelPDO $con = null) Return the first Eventtype matching the query
 * @method Eventtype findOneOrCreate(PropelPDO $con = null) Return the first Eventtype matching the query, or a new Eventtype object populated from the query conditions when no match is found
 *
 * @method Eventtype findOneByCreatedatetime(string $createDatetime) Return the first Eventtype filtered by the createDatetime column
 * @method Eventtype findOneByCreatepersonId(int $createPerson_id) Return the first Eventtype filtered by the createPerson_id column
 * @method Eventtype findOneByModifydatetime(string $modifyDatetime) Return the first Eventtype filtered by the modifyDatetime column
 * @method Eventtype findOneByModifypersonId(int $modifyPerson_id) Return the first Eventtype filtered by the modifyPerson_id column
 * @method Eventtype findOneByDeleted(boolean $deleted) Return the first Eventtype filtered by the deleted column
 * @method Eventtype findOneByCode(string $code) Return the first Eventtype filtered by the code column
 * @method Eventtype findOneByName(string $name) Return the first Eventtype filtered by the name column
 * @method Eventtype findOneByPurposeId(int $purpose_id) Return the first Eventtype filtered by the purpose_id column
 * @method Eventtype findOneByFinanceId(int $finance_id) Return the first Eventtype filtered by the finance_id column
 * @method Eventtype findOneBySceneId(int $scene_id) Return the first Eventtype filtered by the scene_id column
 * @method Eventtype findOneByVisitservicemodifier(string $visitServiceModifier) Return the first Eventtype filtered by the visitServiceModifier column
 * @method Eventtype findOneByVisitservicefilter(string $visitServiceFilter) Return the first Eventtype filtered by the visitServiceFilter column
 * @method Eventtype findOneByVisitfinance(boolean $visitFinance) Return the first Eventtype filtered by the visitFinance column
 * @method Eventtype findOneByActionfinance(boolean $actionFinance) Return the first Eventtype filtered by the actionFinance column
 * @method Eventtype findOneByPeriod(int $period) Return the first Eventtype filtered by the period column
 * @method Eventtype findOneBySingleinperiod(int $singleInPeriod) Return the first Eventtype filtered by the singleInPeriod column
 * @method Eventtype findOneByIslong(boolean $isLong) Return the first Eventtype filtered by the isLong column
 * @method Eventtype findOneByDateinput(boolean $dateInput) Return the first Eventtype filtered by the dateInput column
 * @method Eventtype findOneByServiceId(int $service_id) Return the first Eventtype filtered by the service_id column
 * @method Eventtype findOneByContext(string $context) Return the first Eventtype filtered by the context column
 * @method Eventtype findOneByForm(string $form) Return the first Eventtype filtered by the form column
 * @method Eventtype findOneByMinduration(int $minDuration) Return the first Eventtype filtered by the minDuration column
 * @method Eventtype findOneByMaxduration(int $maxDuration) Return the first Eventtype filtered by the maxDuration column
 * @method Eventtype findOneByShowstatusactionsinplanner(boolean $showStatusActionsInPlanner) Return the first Eventtype filtered by the showStatusActionsInPlanner column
 * @method Eventtype findOneByShowdiagnosticactionsinplanner(boolean $showDiagnosticActionsInPlanner) Return the first Eventtype filtered by the showDiagnosticActionsInPlanner column
 * @method Eventtype findOneByShowcureactionsinplanner(boolean $showCureActionsInPlanner) Return the first Eventtype filtered by the showCureActionsInPlanner column
 * @method Eventtype findOneByShowmiscactionsinplanner(boolean $showMiscActionsInPlanner) Return the first Eventtype filtered by the showMiscActionsInPlanner column
 * @method Eventtype findOneByLimitstatusactionsinput(boolean $limitStatusActionsInput) Return the first Eventtype filtered by the limitStatusActionsInput column
 * @method Eventtype findOneByLimitdiagnosticactionsinput(boolean $limitDiagnosticActionsInput) Return the first Eventtype filtered by the limitDiagnosticActionsInput column
 * @method Eventtype findOneByLimitcureactionsinput(boolean $limitCureActionsInput) Return the first Eventtype filtered by the limitCureActionsInput column
 * @method Eventtype findOneByLimitmiscactionsinput(boolean $limitMiscActionsInput) Return the first Eventtype filtered by the limitMiscActionsInput column
 * @method Eventtype findOneByShowtime(boolean $showTime) Return the first Eventtype filtered by the showTime column
 * @method Eventtype findOneByMedicalaidtypeId(int $medicalAidType_id) Return the first Eventtype filtered by the medicalAidType_id column
 * @method Eventtype findOneByEventprofileId(int $eventProfile_id) Return the first Eventtype filtered by the eventProfile_id column
 * @method Eventtype findOneByMesrequired(int $mesRequired) Return the first Eventtype filtered by the mesRequired column
 * @method Eventtype findOneByMescodemask(string $mesCodeMask) Return the first Eventtype filtered by the mesCodeMask column
 * @method Eventtype findOneByMesnamemask(string $mesNameMask) Return the first Eventtype filtered by the mesNameMask column
 * @method Eventtype findOneByCounterId(int $counter_id) Return the first Eventtype filtered by the counter_id column
 * @method Eventtype findOneByIsexternal(boolean $isExternal) Return the first Eventtype filtered by the isExternal column
 * @method Eventtype findOneByIsassistant(boolean $isAssistant) Return the first Eventtype filtered by the isAssistant column
 * @method Eventtype findOneByIscurator(boolean $isCurator) Return the first Eventtype filtered by the isCurator column
 * @method Eventtype findOneByCanhavepayableactions(boolean $canHavePayableActions) Return the first Eventtype filtered by the canHavePayableActions column
 * @method Eventtype findOneByIsrequiredcoordination(boolean $isRequiredCoordination) Return the first Eventtype filtered by the isRequiredCoordination column
 * @method Eventtype findOneByIsorgstructurepriority(boolean $isOrgStructurePriority) Return the first Eventtype filtered by the isOrgStructurePriority column
 * @method Eventtype findOneByIstakentissue(boolean $isTakenTissue) Return the first Eventtype filtered by the isTakenTissue column
 * @method Eventtype findOneBySex(int $sex) Return the first Eventtype filtered by the sex column
 * @method Eventtype findOneByAge(string $age) Return the first Eventtype filtered by the age column
 * @method Eventtype findOneByRbmedicalkindId(int $rbMedicalKind_id) Return the first Eventtype filtered by the rbMedicalKind_id column
 * @method Eventtype findOneByAgeBu(int $age_bu) Return the first Eventtype filtered by the age_bu column
 * @method Eventtype findOneByAgeBc(int $age_bc) Return the first Eventtype filtered by the age_bc column
 * @method Eventtype findOneByAgeEu(int $age_eu) Return the first Eventtype filtered by the age_eu column
 * @method Eventtype findOneByAgeEc(int $age_ec) Return the first Eventtype filtered by the age_ec column
 * @method Eventtype findOneByRequesttypeId(int $requestType_id) Return the first Eventtype filtered by the requestType_id column
 *
 * @method array findById(int $id) Return Eventtype objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Eventtype objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Eventtype objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Eventtype objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Eventtype objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Eventtype objects filtered by the deleted column
 * @method array findByCode(string $code) Return Eventtype objects filtered by the code column
 * @method array findByName(string $name) Return Eventtype objects filtered by the name column
 * @method array findByPurposeId(int $purpose_id) Return Eventtype objects filtered by the purpose_id column
 * @method array findByFinanceId(int $finance_id) Return Eventtype objects filtered by the finance_id column
 * @method array findBySceneId(int $scene_id) Return Eventtype objects filtered by the scene_id column
 * @method array findByVisitservicemodifier(string $visitServiceModifier) Return Eventtype objects filtered by the visitServiceModifier column
 * @method array findByVisitservicefilter(string $visitServiceFilter) Return Eventtype objects filtered by the visitServiceFilter column
 * @method array findByVisitfinance(boolean $visitFinance) Return Eventtype objects filtered by the visitFinance column
 * @method array findByActionfinance(boolean $actionFinance) Return Eventtype objects filtered by the actionFinance column
 * @method array findByPeriod(int $period) Return Eventtype objects filtered by the period column
 * @method array findBySingleinperiod(int $singleInPeriod) Return Eventtype objects filtered by the singleInPeriod column
 * @method array findByIslong(boolean $isLong) Return Eventtype objects filtered by the isLong column
 * @method array findByDateinput(boolean $dateInput) Return Eventtype objects filtered by the dateInput column
 * @method array findByServiceId(int $service_id) Return Eventtype objects filtered by the service_id column
 * @method array findByContext(string $context) Return Eventtype objects filtered by the context column
 * @method array findByForm(string $form) Return Eventtype objects filtered by the form column
 * @method array findByMinduration(int $minDuration) Return Eventtype objects filtered by the minDuration column
 * @method array findByMaxduration(int $maxDuration) Return Eventtype objects filtered by the maxDuration column
 * @method array findByShowstatusactionsinplanner(boolean $showStatusActionsInPlanner) Return Eventtype objects filtered by the showStatusActionsInPlanner column
 * @method array findByShowdiagnosticactionsinplanner(boolean $showDiagnosticActionsInPlanner) Return Eventtype objects filtered by the showDiagnosticActionsInPlanner column
 * @method array findByShowcureactionsinplanner(boolean $showCureActionsInPlanner) Return Eventtype objects filtered by the showCureActionsInPlanner column
 * @method array findByShowmiscactionsinplanner(boolean $showMiscActionsInPlanner) Return Eventtype objects filtered by the showMiscActionsInPlanner column
 * @method array findByLimitstatusactionsinput(boolean $limitStatusActionsInput) Return Eventtype objects filtered by the limitStatusActionsInput column
 * @method array findByLimitdiagnosticactionsinput(boolean $limitDiagnosticActionsInput) Return Eventtype objects filtered by the limitDiagnosticActionsInput column
 * @method array findByLimitcureactionsinput(boolean $limitCureActionsInput) Return Eventtype objects filtered by the limitCureActionsInput column
 * @method array findByLimitmiscactionsinput(boolean $limitMiscActionsInput) Return Eventtype objects filtered by the limitMiscActionsInput column
 * @method array findByShowtime(boolean $showTime) Return Eventtype objects filtered by the showTime column
 * @method array findByMedicalaidtypeId(int $medicalAidType_id) Return Eventtype objects filtered by the medicalAidType_id column
 * @method array findByEventprofileId(int $eventProfile_id) Return Eventtype objects filtered by the eventProfile_id column
 * @method array findByMesrequired(int $mesRequired) Return Eventtype objects filtered by the mesRequired column
 * @method array findByMescodemask(string $mesCodeMask) Return Eventtype objects filtered by the mesCodeMask column
 * @method array findByMesnamemask(string $mesNameMask) Return Eventtype objects filtered by the mesNameMask column
 * @method array findByCounterId(int $counter_id) Return Eventtype objects filtered by the counter_id column
 * @method array findByIsexternal(boolean $isExternal) Return Eventtype objects filtered by the isExternal column
 * @method array findByIsassistant(boolean $isAssistant) Return Eventtype objects filtered by the isAssistant column
 * @method array findByIscurator(boolean $isCurator) Return Eventtype objects filtered by the isCurator column
 * @method array findByCanhavepayableactions(boolean $canHavePayableActions) Return Eventtype objects filtered by the canHavePayableActions column
 * @method array findByIsrequiredcoordination(boolean $isRequiredCoordination) Return Eventtype objects filtered by the isRequiredCoordination column
 * @method array findByIsorgstructurepriority(boolean $isOrgStructurePriority) Return Eventtype objects filtered by the isOrgStructurePriority column
 * @method array findByIstakentissue(boolean $isTakenTissue) Return Eventtype objects filtered by the isTakenTissue column
 * @method array findBySex(int $sex) Return Eventtype objects filtered by the sex column
 * @method array findByAge(string $age) Return Eventtype objects filtered by the age column
 * @method array findByRbmedicalkindId(int $rbMedicalKind_id) Return Eventtype objects filtered by the rbMedicalKind_id column
 * @method array findByAgeBu(int $age_bu) Return Eventtype objects filtered by the age_bu column
 * @method array findByAgeBc(int $age_bc) Return Eventtype objects filtered by the age_bc column
 * @method array findByAgeEu(int $age_eu) Return Eventtype objects filtered by the age_eu column
 * @method array findByAgeEc(int $age_ec) Return Eventtype objects filtered by the age_ec column
 * @method array findByRequesttypeId(int $requestType_id) Return Eventtype objects filtered by the requestType_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BaseEventtypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseEventtypeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Eventtype', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new EventtypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   EventtypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return EventtypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof EventtypeQuery) {
            return $criteria;
        }
        $query = new EventtypeQuery();
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
     * @return   Eventtype|Eventtype[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = EventtypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(EventtypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Eventtype A model object, or null if the key is not found
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
     * @return                 Eventtype A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `code`, `name`, `purpose_id`, `finance_id`, `scene_id`, `visitServiceModifier`, `visitServiceFilter`, `visitFinance`, `actionFinance`, `period`, `singleInPeriod`, `isLong`, `dateInput`, `service_id`, `context`, `form`, `minDuration`, `maxDuration`, `showStatusActionsInPlanner`, `showDiagnosticActionsInPlanner`, `showCureActionsInPlanner`, `showMiscActionsInPlanner`, `limitStatusActionsInput`, `limitDiagnosticActionsInput`, `limitCureActionsInput`, `limitMiscActionsInput`, `showTime`, `medicalAidType_id`, `eventProfile_id`, `mesRequired`, `mesCodeMask`, `mesNameMask`, `counter_id`, `isExternal`, `isAssistant`, `isCurator`, `canHavePayableActions`, `isRequiredCoordination`, `isOrgStructurePriority`, `isTakenTissue`, `sex`, `age`, `rbMedicalKind_id`, `age_bu`, `age_bc`, `age_eu`, `age_ec`, `requestType_id` FROM `EventType` WHERE `id` = :p0';
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
            $obj = new Eventtype();
            $obj->hydrate($row);
            EventtypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Eventtype|Eventtype[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Eventtype[]|mixed the list of results, formatted by the current formatter
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(EventtypePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(EventtypePeer::ID, $keys, Criteria::IN);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(EventtypePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(EventtypePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::ID, $id, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(EventtypePeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(EventtypePeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(EventtypePeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(EventtypePeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(EventtypePeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(EventtypePeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(EventtypePeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(EventtypePeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::DELETED, $deleted, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypePeer::CODE, $code, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the purpose_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPurposeId(1234); // WHERE purpose_id = 1234
     * $query->filterByPurposeId(array(12, 34)); // WHERE purpose_id IN (12, 34)
     * $query->filterByPurposeId(array('min' => 12)); // WHERE purpose_id >= 12
     * $query->filterByPurposeId(array('max' => 12)); // WHERE purpose_id <= 12
     * </code>
     *
     * @param     mixed $purposeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByPurposeId($purposeId = null, $comparison = null)
    {
        if (is_array($purposeId)) {
            $useMinMax = false;
            if (isset($purposeId['min'])) {
                $this->addUsingAlias(EventtypePeer::PURPOSE_ID, $purposeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($purposeId['max'])) {
                $this->addUsingAlias(EventtypePeer::PURPOSE_ID, $purposeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::PURPOSE_ID, $purposeId, $comparison);
    }

    /**
     * Filter the query on the finance_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFinanceId(1234); // WHERE finance_id = 1234
     * $query->filterByFinanceId(array(12, 34)); // WHERE finance_id IN (12, 34)
     * $query->filterByFinanceId(array('min' => 12)); // WHERE finance_id >= 12
     * $query->filterByFinanceId(array('max' => 12)); // WHERE finance_id <= 12
     * </code>
     *
     * @param     mixed $financeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(EventtypePeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(EventtypePeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the scene_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySceneId(1234); // WHERE scene_id = 1234
     * $query->filterBySceneId(array(12, 34)); // WHERE scene_id IN (12, 34)
     * $query->filterBySceneId(array('min' => 12)); // WHERE scene_id >= 12
     * $query->filterBySceneId(array('max' => 12)); // WHERE scene_id <= 12
     * </code>
     *
     * @param     mixed $sceneId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterBySceneId($sceneId = null, $comparison = null)
    {
        if (is_array($sceneId)) {
            $useMinMax = false;
            if (isset($sceneId['min'])) {
                $this->addUsingAlias(EventtypePeer::SCENE_ID, $sceneId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sceneId['max'])) {
                $this->addUsingAlias(EventtypePeer::SCENE_ID, $sceneId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::SCENE_ID, $sceneId, $comparison);
    }

    /**
     * Filter the query on the visitServiceModifier column
     *
     * Example usage:
     * <code>
     * $query->filterByVisitservicemodifier('fooValue');   // WHERE visitServiceModifier = 'fooValue'
     * $query->filterByVisitservicemodifier('%fooValue%'); // WHERE visitServiceModifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $visitservicemodifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByVisitservicemodifier($visitservicemodifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($visitservicemodifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $visitservicemodifier)) {
                $visitservicemodifier = str_replace('*', '%', $visitservicemodifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypePeer::VISITSERVICEMODIFIER, $visitservicemodifier, $comparison);
    }

    /**
     * Filter the query on the visitServiceFilter column
     *
     * Example usage:
     * <code>
     * $query->filterByVisitservicefilter('fooValue');   // WHERE visitServiceFilter = 'fooValue'
     * $query->filterByVisitservicefilter('%fooValue%'); // WHERE visitServiceFilter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $visitservicefilter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByVisitservicefilter($visitservicefilter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($visitservicefilter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $visitservicefilter)) {
                $visitservicefilter = str_replace('*', '%', $visitservicefilter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypePeer::VISITSERVICEFILTER, $visitservicefilter, $comparison);
    }

    /**
     * Filter the query on the visitFinance column
     *
     * Example usage:
     * <code>
     * $query->filterByVisitfinance(true); // WHERE visitFinance = true
     * $query->filterByVisitfinance('yes'); // WHERE visitFinance = true
     * </code>
     *
     * @param     boolean|string $visitfinance The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByVisitfinance($visitfinance = null, $comparison = null)
    {
        if (is_string($visitfinance)) {
            $visitfinance = in_array(strtolower($visitfinance), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::VISITFINANCE, $visitfinance, $comparison);
    }

    /**
     * Filter the query on the actionFinance column
     *
     * Example usage:
     * <code>
     * $query->filterByActionfinance(true); // WHERE actionFinance = true
     * $query->filterByActionfinance('yes'); // WHERE actionFinance = true
     * </code>
     *
     * @param     boolean|string $actionfinance The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByActionfinance($actionfinance = null, $comparison = null)
    {
        if (is_string($actionfinance)) {
            $actionfinance = in_array(strtolower($actionfinance), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ACTIONFINANCE, $actionfinance, $comparison);
    }

    /**
     * Filter the query on the period column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriod(1234); // WHERE period = 1234
     * $query->filterByPeriod(array(12, 34)); // WHERE period IN (12, 34)
     * $query->filterByPeriod(array('min' => 12)); // WHERE period >= 12
     * $query->filterByPeriod(array('max' => 12)); // WHERE period <= 12
     * </code>
     *
     * @param     mixed $period The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByPeriod($period = null, $comparison = null)
    {
        if (is_array($period)) {
            $useMinMax = false;
            if (isset($period['min'])) {
                $this->addUsingAlias(EventtypePeer::PERIOD, $period['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($period['max'])) {
                $this->addUsingAlias(EventtypePeer::PERIOD, $period['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::PERIOD, $period, $comparison);
    }

    /**
     * Filter the query on the singleInPeriod column
     *
     * Example usage:
     * <code>
     * $query->filterBySingleinperiod(1234); // WHERE singleInPeriod = 1234
     * $query->filterBySingleinperiod(array(12, 34)); // WHERE singleInPeriod IN (12, 34)
     * $query->filterBySingleinperiod(array('min' => 12)); // WHERE singleInPeriod >= 12
     * $query->filterBySingleinperiod(array('max' => 12)); // WHERE singleInPeriod <= 12
     * </code>
     *
     * @param     mixed $singleinperiod The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterBySingleinperiod($singleinperiod = null, $comparison = null)
    {
        if (is_array($singleinperiod)) {
            $useMinMax = false;
            if (isset($singleinperiod['min'])) {
                $this->addUsingAlias(EventtypePeer::SINGLEINPERIOD, $singleinperiod['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($singleinperiod['max'])) {
                $this->addUsingAlias(EventtypePeer::SINGLEINPERIOD, $singleinperiod['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::SINGLEINPERIOD, $singleinperiod, $comparison);
    }

    /**
     * Filter the query on the isLong column
     *
     * Example usage:
     * <code>
     * $query->filterByIslong(true); // WHERE isLong = true
     * $query->filterByIslong('yes'); // WHERE isLong = true
     * </code>
     *
     * @param     boolean|string $islong The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIslong($islong = null, $comparison = null)
    {
        if (is_string($islong)) {
            $islong = in_array(strtolower($islong), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISLONG, $islong, $comparison);
    }

    /**
     * Filter the query on the dateInput column
     *
     * Example usage:
     * <code>
     * $query->filterByDateinput(true); // WHERE dateInput = true
     * $query->filterByDateinput('yes'); // WHERE dateInput = true
     * </code>
     *
     * @param     boolean|string $dateinput The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByDateinput($dateinput = null, $comparison = null)
    {
        if (is_string($dateinput)) {
            $dateinput = in_array(strtolower($dateinput), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::DATEINPUT, $dateinput, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByServiceId($serviceId = null, $comparison = null)
    {
        if (is_array($serviceId)) {
            $useMinMax = false;
            if (isset($serviceId['min'])) {
                $this->addUsingAlias(EventtypePeer::SERVICE_ID, $serviceId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($serviceId['max'])) {
                $this->addUsingAlias(EventtypePeer::SERVICE_ID, $serviceId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::SERVICE_ID, $serviceId, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypePeer::CONTEXT, $context, $comparison);
    }

    /**
     * Filter the query on the form column
     *
     * Example usage:
     * <code>
     * $query->filterByForm('fooValue');   // WHERE form = 'fooValue'
     * $query->filterByForm('%fooValue%'); // WHERE form LIKE '%fooValue%'
     * </code>
     *
     * @param     string $form The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByForm($form = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($form)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $form)) {
                $form = str_replace('*', '%', $form);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypePeer::FORM, $form, $comparison);
    }

    /**
     * Filter the query on the minDuration column
     *
     * Example usage:
     * <code>
     * $query->filterByMinduration(1234); // WHERE minDuration = 1234
     * $query->filterByMinduration(array(12, 34)); // WHERE minDuration IN (12, 34)
     * $query->filterByMinduration(array('min' => 12)); // WHERE minDuration >= 12
     * $query->filterByMinduration(array('max' => 12)); // WHERE minDuration <= 12
     * </code>
     *
     * @param     mixed $minduration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByMinduration($minduration = null, $comparison = null)
    {
        if (is_array($minduration)) {
            $useMinMax = false;
            if (isset($minduration['min'])) {
                $this->addUsingAlias(EventtypePeer::MINDURATION, $minduration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minduration['max'])) {
                $this->addUsingAlias(EventtypePeer::MINDURATION, $minduration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MINDURATION, $minduration, $comparison);
    }

    /**
     * Filter the query on the maxDuration column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxduration(1234); // WHERE maxDuration = 1234
     * $query->filterByMaxduration(array(12, 34)); // WHERE maxDuration IN (12, 34)
     * $query->filterByMaxduration(array('min' => 12)); // WHERE maxDuration >= 12
     * $query->filterByMaxduration(array('max' => 12)); // WHERE maxDuration <= 12
     * </code>
     *
     * @param     mixed $maxduration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByMaxduration($maxduration = null, $comparison = null)
    {
        if (is_array($maxduration)) {
            $useMinMax = false;
            if (isset($maxduration['min'])) {
                $this->addUsingAlias(EventtypePeer::MAXDURATION, $maxduration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxduration['max'])) {
                $this->addUsingAlias(EventtypePeer::MAXDURATION, $maxduration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MAXDURATION, $maxduration, $comparison);
    }

    /**
     * Filter the query on the showStatusActionsInPlanner column
     *
     * Example usage:
     * <code>
     * $query->filterByShowstatusactionsinplanner(true); // WHERE showStatusActionsInPlanner = true
     * $query->filterByShowstatusactionsinplanner('yes'); // WHERE showStatusActionsInPlanner = true
     * </code>
     *
     * @param     boolean|string $showstatusactionsinplanner The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByShowstatusactionsinplanner($showstatusactionsinplanner = null, $comparison = null)
    {
        if (is_string($showstatusactionsinplanner)) {
            $showstatusactionsinplanner = in_array(strtolower($showstatusactionsinplanner), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::SHOWSTATUSACTIONSINPLANNER, $showstatusactionsinplanner, $comparison);
    }

    /**
     * Filter the query on the showDiagnosticActionsInPlanner column
     *
     * Example usage:
     * <code>
     * $query->filterByShowdiagnosticactionsinplanner(true); // WHERE showDiagnosticActionsInPlanner = true
     * $query->filterByShowdiagnosticactionsinplanner('yes'); // WHERE showDiagnosticActionsInPlanner = true
     * </code>
     *
     * @param     boolean|string $showdiagnosticactionsinplanner The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByShowdiagnosticactionsinplanner($showdiagnosticactionsinplanner = null, $comparison = null)
    {
        if (is_string($showdiagnosticactionsinplanner)) {
            $showdiagnosticactionsinplanner = in_array(strtolower($showdiagnosticactionsinplanner), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::SHOWDIAGNOSTICACTIONSINPLANNER, $showdiagnosticactionsinplanner, $comparison);
    }

    /**
     * Filter the query on the showCureActionsInPlanner column
     *
     * Example usage:
     * <code>
     * $query->filterByShowcureactionsinplanner(true); // WHERE showCureActionsInPlanner = true
     * $query->filterByShowcureactionsinplanner('yes'); // WHERE showCureActionsInPlanner = true
     * </code>
     *
     * @param     boolean|string $showcureactionsinplanner The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByShowcureactionsinplanner($showcureactionsinplanner = null, $comparison = null)
    {
        if (is_string($showcureactionsinplanner)) {
            $showcureactionsinplanner = in_array(strtolower($showcureactionsinplanner), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::SHOWCUREACTIONSINPLANNER, $showcureactionsinplanner, $comparison);
    }

    /**
     * Filter the query on the showMiscActionsInPlanner column
     *
     * Example usage:
     * <code>
     * $query->filterByShowmiscactionsinplanner(true); // WHERE showMiscActionsInPlanner = true
     * $query->filterByShowmiscactionsinplanner('yes'); // WHERE showMiscActionsInPlanner = true
     * </code>
     *
     * @param     boolean|string $showmiscactionsinplanner The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByShowmiscactionsinplanner($showmiscactionsinplanner = null, $comparison = null)
    {
        if (is_string($showmiscactionsinplanner)) {
            $showmiscactionsinplanner = in_array(strtolower($showmiscactionsinplanner), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::SHOWMISCACTIONSINPLANNER, $showmiscactionsinplanner, $comparison);
    }

    /**
     * Filter the query on the limitStatusActionsInput column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitstatusactionsinput(true); // WHERE limitStatusActionsInput = true
     * $query->filterByLimitstatusactionsinput('yes'); // WHERE limitStatusActionsInput = true
     * </code>
     *
     * @param     boolean|string $limitstatusactionsinput The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByLimitstatusactionsinput($limitstatusactionsinput = null, $comparison = null)
    {
        if (is_string($limitstatusactionsinput)) {
            $limitstatusactionsinput = in_array(strtolower($limitstatusactionsinput), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::LIMITSTATUSACTIONSINPUT, $limitstatusactionsinput, $comparison);
    }

    /**
     * Filter the query on the limitDiagnosticActionsInput column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitdiagnosticactionsinput(true); // WHERE limitDiagnosticActionsInput = true
     * $query->filterByLimitdiagnosticactionsinput('yes'); // WHERE limitDiagnosticActionsInput = true
     * </code>
     *
     * @param     boolean|string $limitdiagnosticactionsinput The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByLimitdiagnosticactionsinput($limitdiagnosticactionsinput = null, $comparison = null)
    {
        if (is_string($limitdiagnosticactionsinput)) {
            $limitdiagnosticactionsinput = in_array(strtolower($limitdiagnosticactionsinput), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::LIMITDIAGNOSTICACTIONSINPUT, $limitdiagnosticactionsinput, $comparison);
    }

    /**
     * Filter the query on the limitCureActionsInput column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitcureactionsinput(true); // WHERE limitCureActionsInput = true
     * $query->filterByLimitcureactionsinput('yes'); // WHERE limitCureActionsInput = true
     * </code>
     *
     * @param     boolean|string $limitcureactionsinput The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByLimitcureactionsinput($limitcureactionsinput = null, $comparison = null)
    {
        if (is_string($limitcureactionsinput)) {
            $limitcureactionsinput = in_array(strtolower($limitcureactionsinput), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::LIMITCUREACTIONSINPUT, $limitcureactionsinput, $comparison);
    }

    /**
     * Filter the query on the limitMiscActionsInput column
     *
     * Example usage:
     * <code>
     * $query->filterByLimitmiscactionsinput(true); // WHERE limitMiscActionsInput = true
     * $query->filterByLimitmiscactionsinput('yes'); // WHERE limitMiscActionsInput = true
     * </code>
     *
     * @param     boolean|string $limitmiscactionsinput The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByLimitmiscactionsinput($limitmiscactionsinput = null, $comparison = null)
    {
        if (is_string($limitmiscactionsinput)) {
            $limitmiscactionsinput = in_array(strtolower($limitmiscactionsinput), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::LIMITMISCACTIONSINPUT, $limitmiscactionsinput, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByShowtime($showtime = null, $comparison = null)
    {
        if (is_string($showtime)) {
            $showtime = in_array(strtolower($showtime), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::SHOWTIME, $showtime, $comparison);
    }

    /**
     * Filter the query on the medicalAidType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMedicalaidtypeId(1234); // WHERE medicalAidType_id = 1234
     * $query->filterByMedicalaidtypeId(array(12, 34)); // WHERE medicalAidType_id IN (12, 34)
     * $query->filterByMedicalaidtypeId(array('min' => 12)); // WHERE medicalAidType_id >= 12
     * $query->filterByMedicalaidtypeId(array('max' => 12)); // WHERE medicalAidType_id <= 12
     * </code>
     *
     * @param     mixed $medicalaidtypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByMedicalaidtypeId($medicalaidtypeId = null, $comparison = null)
    {
        if (is_array($medicalaidtypeId)) {
            $useMinMax = false;
            if (isset($medicalaidtypeId['min'])) {
                $this->addUsingAlias(EventtypePeer::MEDICALAIDTYPE_ID, $medicalaidtypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($medicalaidtypeId['max'])) {
                $this->addUsingAlias(EventtypePeer::MEDICALAIDTYPE_ID, $medicalaidtypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MEDICALAIDTYPE_ID, $medicalaidtypeId, $comparison);
    }

    /**
     * Filter the query on the eventProfile_id column
     *
     * Example usage:
     * <code>
     * $query->filterByEventprofileId(1234); // WHERE eventProfile_id = 1234
     * $query->filterByEventprofileId(array(12, 34)); // WHERE eventProfile_id IN (12, 34)
     * $query->filterByEventprofileId(array('min' => 12)); // WHERE eventProfile_id >= 12
     * $query->filterByEventprofileId(array('max' => 12)); // WHERE eventProfile_id <= 12
     * </code>
     *
     * @param     mixed $eventprofileId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByEventprofileId($eventprofileId = null, $comparison = null)
    {
        if (is_array($eventprofileId)) {
            $useMinMax = false;
            if (isset($eventprofileId['min'])) {
                $this->addUsingAlias(EventtypePeer::EVENTPROFILE_ID, $eventprofileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventprofileId['max'])) {
                $this->addUsingAlias(EventtypePeer::EVENTPROFILE_ID, $eventprofileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::EVENTPROFILE_ID, $eventprofileId, $comparison);
    }

    /**
     * Filter the query on the mesRequired column
     *
     * Example usage:
     * <code>
     * $query->filterByMesrequired(1234); // WHERE mesRequired = 1234
     * $query->filterByMesrequired(array(12, 34)); // WHERE mesRequired IN (12, 34)
     * $query->filterByMesrequired(array('min' => 12)); // WHERE mesRequired >= 12
     * $query->filterByMesrequired(array('max' => 12)); // WHERE mesRequired <= 12
     * </code>
     *
     * @param     mixed $mesrequired The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByMesrequired($mesrequired = null, $comparison = null)
    {
        if (is_array($mesrequired)) {
            $useMinMax = false;
            if (isset($mesrequired['min'])) {
                $this->addUsingAlias(EventtypePeer::MESREQUIRED, $mesrequired['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mesrequired['max'])) {
                $this->addUsingAlias(EventtypePeer::MESREQUIRED, $mesrequired['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MESREQUIRED, $mesrequired, $comparison);
    }

    /**
     * Filter the query on the mesCodeMask column
     *
     * Example usage:
     * <code>
     * $query->filterByMescodemask('fooValue');   // WHERE mesCodeMask = 'fooValue'
     * $query->filterByMescodemask('%fooValue%'); // WHERE mesCodeMask LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mescodemask The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByMescodemask($mescodemask = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mescodemask)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mescodemask)) {
                $mescodemask = str_replace('*', '%', $mescodemask);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MESCODEMASK, $mescodemask, $comparison);
    }

    /**
     * Filter the query on the mesNameMask column
     *
     * Example usage:
     * <code>
     * $query->filterByMesnamemask('fooValue');   // WHERE mesNameMask = 'fooValue'
     * $query->filterByMesnamemask('%fooValue%'); // WHERE mesNameMask LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mesnamemask The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByMesnamemask($mesnamemask = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mesnamemask)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mesnamemask)) {
                $mesnamemask = str_replace('*', '%', $mesnamemask);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(EventtypePeer::MESNAMEMASK, $mesnamemask, $comparison);
    }

    /**
     * Filter the query on the counter_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCounterId(1234); // WHERE counter_id = 1234
     * $query->filterByCounterId(array(12, 34)); // WHERE counter_id IN (12, 34)
     * $query->filterByCounterId(array('min' => 12)); // WHERE counter_id >= 12
     * $query->filterByCounterId(array('max' => 12)); // WHERE counter_id <= 12
     * </code>
     *
     * @see       filterByRbcounter()
     *
     * @param     mixed $counterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByCounterId($counterId = null, $comparison = null)
    {
        if (is_array($counterId)) {
            $useMinMax = false;
            if (isset($counterId['min'])) {
                $this->addUsingAlias(EventtypePeer::COUNTER_ID, $counterId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($counterId['max'])) {
                $this->addUsingAlias(EventtypePeer::COUNTER_ID, $counterId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::COUNTER_ID, $counterId, $comparison);
    }

    /**
     * Filter the query on the isExternal column
     *
     * Example usage:
     * <code>
     * $query->filterByIsexternal(true); // WHERE isExternal = true
     * $query->filterByIsexternal('yes'); // WHERE isExternal = true
     * </code>
     *
     * @param     boolean|string $isexternal The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIsexternal($isexternal = null, $comparison = null)
    {
        if (is_string($isexternal)) {
            $isexternal = in_array(strtolower($isexternal), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISEXTERNAL, $isexternal, $comparison);
    }

    /**
     * Filter the query on the isAssistant column
     *
     * Example usage:
     * <code>
     * $query->filterByIsassistant(true); // WHERE isAssistant = true
     * $query->filterByIsassistant('yes'); // WHERE isAssistant = true
     * </code>
     *
     * @param     boolean|string $isassistant The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIsassistant($isassistant = null, $comparison = null)
    {
        if (is_string($isassistant)) {
            $isassistant = in_array(strtolower($isassistant), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISASSISTANT, $isassistant, $comparison);
    }

    /**
     * Filter the query on the isCurator column
     *
     * Example usage:
     * <code>
     * $query->filterByIscurator(true); // WHERE isCurator = true
     * $query->filterByIscurator('yes'); // WHERE isCurator = true
     * </code>
     *
     * @param     boolean|string $iscurator The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIscurator($iscurator = null, $comparison = null)
    {
        if (is_string($iscurator)) {
            $iscurator = in_array(strtolower($iscurator), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISCURATOR, $iscurator, $comparison);
    }

    /**
     * Filter the query on the canHavePayableActions column
     *
     * Example usage:
     * <code>
     * $query->filterByCanhavepayableactions(true); // WHERE canHavePayableActions = true
     * $query->filterByCanhavepayableactions('yes'); // WHERE canHavePayableActions = true
     * </code>
     *
     * @param     boolean|string $canhavepayableactions The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByCanhavepayableactions($canhavepayableactions = null, $comparison = null)
    {
        if (is_string($canhavepayableactions)) {
            $canhavepayableactions = in_array(strtolower($canhavepayableactions), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::CANHAVEPAYABLEACTIONS, $canhavepayableactions, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIsrequiredcoordination($isrequiredcoordination = null, $comparison = null)
    {
        if (is_string($isrequiredcoordination)) {
            $isrequiredcoordination = in_array(strtolower($isrequiredcoordination), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISREQUIREDCOORDINATION, $isrequiredcoordination, $comparison);
    }

    /**
     * Filter the query on the isOrgStructurePriority column
     *
     * Example usage:
     * <code>
     * $query->filterByIsorgstructurepriority(true); // WHERE isOrgStructurePriority = true
     * $query->filterByIsorgstructurepriority('yes'); // WHERE isOrgStructurePriority = true
     * </code>
     *
     * @param     boolean|string $isorgstructurepriority The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIsorgstructurepriority($isorgstructurepriority = null, $comparison = null)
    {
        if (is_string($isorgstructurepriority)) {
            $isorgstructurepriority = in_array(strtolower($isorgstructurepriority), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISORGSTRUCTUREPRIORITY, $isorgstructurepriority, $comparison);
    }

    /**
     * Filter the query on the isTakenTissue column
     *
     * Example usage:
     * <code>
     * $query->filterByIstakentissue(true); // WHERE isTakenTissue = true
     * $query->filterByIstakentissue('yes'); // WHERE isTakenTissue = true
     * </code>
     *
     * @param     boolean|string $istakentissue The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByIstakentissue($istakentissue = null, $comparison = null)
    {
        if (is_string($istakentissue)) {
            $istakentissue = in_array(strtolower($istakentissue), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(EventtypePeer::ISTAKENTISSUE, $istakentissue, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(EventtypePeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(EventtypePeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::SEX, $sex, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(EventtypePeer::AGE, $age, $comparison);
    }

    /**
     * Filter the query on the rbMedicalKind_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRbmedicalkindId(1234); // WHERE rbMedicalKind_id = 1234
     * $query->filterByRbmedicalkindId(array(12, 34)); // WHERE rbMedicalKind_id IN (12, 34)
     * $query->filterByRbmedicalkindId(array('min' => 12)); // WHERE rbMedicalKind_id >= 12
     * $query->filterByRbmedicalkindId(array('max' => 12)); // WHERE rbMedicalKind_id <= 12
     * </code>
     *
     * @see       filterByRbmedicalkind()
     *
     * @param     mixed $rbmedicalkindId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByRbmedicalkindId($rbmedicalkindId = null, $comparison = null)
    {
        if (is_array($rbmedicalkindId)) {
            $useMinMax = false;
            if (isset($rbmedicalkindId['min'])) {
                $this->addUsingAlias(EventtypePeer::RBMEDICALKIND_ID, $rbmedicalkindId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rbmedicalkindId['max'])) {
                $this->addUsingAlias(EventtypePeer::RBMEDICALKIND_ID, $rbmedicalkindId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::RBMEDICALKIND_ID, $rbmedicalkindId, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByAgeBu($ageBu = null, $comparison = null)
    {
        if (is_array($ageBu)) {
            $useMinMax = false;
            if (isset($ageBu['min'])) {
                $this->addUsingAlias(EventtypePeer::AGE_BU, $ageBu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBu['max'])) {
                $this->addUsingAlias(EventtypePeer::AGE_BU, $ageBu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::AGE_BU, $ageBu, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByAgeBc($ageBc = null, $comparison = null)
    {
        if (is_array($ageBc)) {
            $useMinMax = false;
            if (isset($ageBc['min'])) {
                $this->addUsingAlias(EventtypePeer::AGE_BC, $ageBc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageBc['max'])) {
                $this->addUsingAlias(EventtypePeer::AGE_BC, $ageBc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::AGE_BC, $ageBc, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByAgeEu($ageEu = null, $comparison = null)
    {
        if (is_array($ageEu)) {
            $useMinMax = false;
            if (isset($ageEu['min'])) {
                $this->addUsingAlias(EventtypePeer::AGE_EU, $ageEu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEu['max'])) {
                $this->addUsingAlias(EventtypePeer::AGE_EU, $ageEu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::AGE_EU, $ageEu, $comparison);
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
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByAgeEc($ageEc = null, $comparison = null)
    {
        if (is_array($ageEc)) {
            $useMinMax = false;
            if (isset($ageEc['min'])) {
                $this->addUsingAlias(EventtypePeer::AGE_EC, $ageEc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ageEc['max'])) {
                $this->addUsingAlias(EventtypePeer::AGE_EC, $ageEc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::AGE_EC, $ageEc, $comparison);
    }

    /**
     * Filter the query on the requestType_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRequesttypeId(1234); // WHERE requestType_id = 1234
     * $query->filterByRequesttypeId(array(12, 34)); // WHERE requestType_id IN (12, 34)
     * $query->filterByRequesttypeId(array('min' => 12)); // WHERE requestType_id >= 12
     * $query->filterByRequesttypeId(array('max' => 12)); // WHERE requestType_id <= 12
     * </code>
     *
     * @param     mixed $requesttypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function filterByRequesttypeId($requesttypeId = null, $comparison = null)
    {
        if (is_array($requesttypeId)) {
            $useMinMax = false;
            if (isset($requesttypeId['min'])) {
                $this->addUsingAlias(EventtypePeer::REQUESTTYPE_ID, $requesttypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requesttypeId['max'])) {
                $this->addUsingAlias(EventtypePeer::REQUESTTYPE_ID, $requesttypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(EventtypePeer::REQUESTTYPE_ID, $requesttypeId, $comparison);
    }

    /**
     * Filter the query by a related Rbcounter object
     *
     * @param   Rbcounter|PropelObjectCollection $rbcounter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbcounter($rbcounter, $comparison = null)
    {
        if ($rbcounter instanceof Rbcounter) {
            return $this
                ->addUsingAlias(EventtypePeer::COUNTER_ID, $rbcounter->getId(), $comparison);
        } elseif ($rbcounter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventtypePeer::COUNTER_ID, $rbcounter->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbcounter() only accepts arguments of type Rbcounter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbcounter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function joinRbcounter($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbcounter');

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
            $this->addJoinObject($join, 'Rbcounter');
        }

        return $this;
    }

    /**
     * Use the Rbcounter relation Rbcounter object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbcounterQuery A secondary query class using the current class as primary query
     */
    public function useRbcounterQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbcounter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbcounter', '\Webmis\Models\RbcounterQuery');
    }

    /**
     * Filter the query by a related Rbmedicalkind object
     *
     * @param   Rbmedicalkind|PropelObjectCollection $rbmedicalkind The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRbmedicalkind($rbmedicalkind, $comparison = null)
    {
        if ($rbmedicalkind instanceof Rbmedicalkind) {
            return $this
                ->addUsingAlias(EventtypePeer::RBMEDICALKIND_ID, $rbmedicalkind->getId(), $comparison);
        } elseif ($rbmedicalkind instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(EventtypePeer::RBMEDICALKIND_ID, $rbmedicalkind->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRbmedicalkind() only accepts arguments of type Rbmedicalkind or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Rbmedicalkind relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function joinRbmedicalkind($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Rbmedicalkind');

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
            $this->addJoinObject($join, 'Rbmedicalkind');
        }

        return $this;
    }

    /**
     * Use the Rbmedicalkind relation Rbmedicalkind object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\RbmedicalkindQuery A secondary query class using the current class as primary query
     */
    public function useRbmedicalkindQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRbmedicalkind($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Rbmedicalkind', '\Webmis\Models\RbmedicalkindQuery');
    }

    /**
     * Filter the query by a related ActiontypeEventtypeCheck object
     *
     * @param   ActiontypeEventtypeCheck|PropelObjectCollection $actiontypeEventtypeCheck  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontypeEventtypeCheck($actiontypeEventtypeCheck, $comparison = null)
    {
        if ($actiontypeEventtypeCheck instanceof ActiontypeEventtypeCheck) {
            return $this
                ->addUsingAlias(EventtypePeer::ID, $actiontypeEventtypeCheck->getEventtypeId(), $comparison);
        } elseif ($actiontypeEventtypeCheck instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeEventtypeCheckQuery()
                ->filterByPrimaryKeys($actiontypeEventtypeCheck->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontypeEventtypeCheck() only accepts arguments of type ActiontypeEventtypeCheck or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActiontypeEventtypeCheck relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function joinActiontypeEventtypeCheck($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActiontypeEventtypeCheck');

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
            $this->addJoinObject($join, 'ActiontypeEventtypeCheck');
        }

        return $this;
    }

    /**
     * Use the ActiontypeEventtypeCheck relation ActiontypeEventtypeCheck object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeEventtypeCheckQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeEventtypeCheckQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActiontypeEventtypeCheck($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActiontypeEventtypeCheck', '\Webmis\Models\ActiontypeEventtypeCheckQuery');
    }

    /**
     * Filter the query by a related Medicalkindunit object
     *
     * @param   Medicalkindunit|PropelObjectCollection $medicalkindunit  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 EventtypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMedicalkindunit($medicalkindunit, $comparison = null)
    {
        if ($medicalkindunit instanceof Medicalkindunit) {
            return $this
                ->addUsingAlias(EventtypePeer::ID, $medicalkindunit->getEventtypeId(), $comparison);
        } elseif ($medicalkindunit instanceof PropelObjectCollection) {
            return $this
                ->useMedicalkindunitQuery()
                ->filterByPrimaryKeys($medicalkindunit->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMedicalkindunit() only accepts arguments of type Medicalkindunit or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Medicalkindunit relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function joinMedicalkindunit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Medicalkindunit');

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
            $this->addJoinObject($join, 'Medicalkindunit');
        }

        return $this;
    }

    /**
     * Use the Medicalkindunit relation Medicalkindunit object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\MedicalkindunitQuery A secondary query class using the current class as primary query
     */
    public function useMedicalkindunitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMedicalkindunit($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Medicalkindunit', '\Webmis\Models\MedicalkindunitQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Eventtype $eventtype Object to remove from the list of results
     *
     * @return EventtypeQuery The current query, for fluid interface
     */
    public function prune($eventtype = null)
    {
        if ($eventtype) {
            $this->addUsingAlias(EventtypePeer::ID, $eventtype->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
