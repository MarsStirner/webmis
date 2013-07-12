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
use Webmis\Models\ActionpropertyPerson;
use Webmis\Models\Actiontype;
use Webmis\Models\BlankactionsMoving;
use Webmis\Models\BlankactionsParty;
use Webmis\Models\Notificationoccurred;
use Webmis\Models\Person;
use Webmis\Models\PersonPeer;
use Webmis\Models\PersonQuery;
use Webmis\Models\PersonTimetemplate;
use Webmis\Models\Stockmotion;
use Webmis\Models\Stockrecipe;
use Webmis\Models\Stockrequisition;
use Webmis\Models\Takentissuejournal;

/**
 * Base class that represents a query for the 'Person' table.
 *
 *
 *
 * @method PersonQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PersonQuery orderByCreatedatetime($order = Criteria::ASC) Order by the createDatetime column
 * @method PersonQuery orderByCreatepersonId($order = Criteria::ASC) Order by the createPerson_id column
 * @method PersonQuery orderByModifydatetime($order = Criteria::ASC) Order by the modifyDatetime column
 * @method PersonQuery orderByModifypersonId($order = Criteria::ASC) Order by the modifyPerson_id column
 * @method PersonQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method PersonQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method PersonQuery orderByFederalcode($order = Criteria::ASC) Order by the federalCode column
 * @method PersonQuery orderByRegionalcode($order = Criteria::ASC) Order by the regionalCode column
 * @method PersonQuery orderByLastname($order = Criteria::ASC) Order by the lastName column
 * @method PersonQuery orderByFirstname($order = Criteria::ASC) Order by the firstName column
 * @method PersonQuery orderByPatrname($order = Criteria::ASC) Order by the patrName column
 * @method PersonQuery orderByPostId($order = Criteria::ASC) Order by the post_id column
 * @method PersonQuery orderBySpecialityId($order = Criteria::ASC) Order by the speciality_id column
 * @method PersonQuery orderByOrgId($order = Criteria::ASC) Order by the org_id column
 * @method PersonQuery orderByOrgstructureId($order = Criteria::ASC) Order by the orgStructure_id column
 * @method PersonQuery orderByOffice($order = Criteria::ASC) Order by the office column
 * @method PersonQuery orderByOffice2($order = Criteria::ASC) Order by the office2 column
 * @method PersonQuery orderByTariffcategoryId($order = Criteria::ASC) Order by the tariffCategory_id column
 * @method PersonQuery orderByFinanceId($order = Criteria::ASC) Order by the finance_id column
 * @method PersonQuery orderByRetiredate($order = Criteria::ASC) Order by the retireDate column
 * @method PersonQuery orderByAmbplan($order = Criteria::ASC) Order by the ambPlan column
 * @method PersonQuery orderByAmbplan2($order = Criteria::ASC) Order by the ambPlan2 column
 * @method PersonQuery orderByAmbnorm($order = Criteria::ASC) Order by the ambNorm column
 * @method PersonQuery orderByHomplan($order = Criteria::ASC) Order by the homPlan column
 * @method PersonQuery orderByHomplan2($order = Criteria::ASC) Order by the homPlan2 column
 * @method PersonQuery orderByHomnorm($order = Criteria::ASC) Order by the homNorm column
 * @method PersonQuery orderByExpplan($order = Criteria::ASC) Order by the expPlan column
 * @method PersonQuery orderByExpnorm($order = Criteria::ASC) Order by the expNorm column
 * @method PersonQuery orderByLogin($order = Criteria::ASC) Order by the login column
 * @method PersonQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method PersonQuery orderByUserprofileId($order = Criteria::ASC) Order by the userProfile_id column
 * @method PersonQuery orderByRetired($order = Criteria::ASC) Order by the retired column
 * @method PersonQuery orderByBirthdate($order = Criteria::ASC) Order by the birthDate column
 * @method PersonQuery orderByBirthplace($order = Criteria::ASC) Order by the birthPlace column
 * @method PersonQuery orderBySex($order = Criteria::ASC) Order by the sex column
 * @method PersonQuery orderBySnils($order = Criteria::ASC) Order by the SNILS column
 * @method PersonQuery orderByInn($order = Criteria::ASC) Order by the INN column
 * @method PersonQuery orderByAvailableforexternal($order = Criteria::ASC) Order by the availableForExternal column
 * @method PersonQuery orderByPrimaryquota($order = Criteria::ASC) Order by the primaryQuota column
 * @method PersonQuery orderByOwnquota($order = Criteria::ASC) Order by the ownQuota column
 * @method PersonQuery orderByConsultancyquota($order = Criteria::ASC) Order by the consultancyQuota column
 * @method PersonQuery orderByExternalquota($order = Criteria::ASC) Order by the externalQuota column
 * @method PersonQuery orderByLastaccessibletimelinedate($order = Criteria::ASC) Order by the lastAccessibleTimelineDate column
 * @method PersonQuery orderByTimelineaccessibledays($order = Criteria::ASC) Order by the timelineAccessibleDays column
 * @method PersonQuery orderByTypetimelineperson($order = Criteria::ASC) Order by the typeTimeLinePerson column
 * @method PersonQuery orderByMaxoverqueue($order = Criteria::ASC) Order by the maxOverQueue column
 * @method PersonQuery orderByMaxcito($order = Criteria::ASC) Order by the maxCito column
 * @method PersonQuery orderByQuotunit($order = Criteria::ASC) Order by the quotUnit column
 * @method PersonQuery orderByAcademicdegreeId($order = Criteria::ASC) Order by the academicdegree_id column
 * @method PersonQuery orderByAcademictitleId($order = Criteria::ASC) Order by the academicTitle_id column
 * @method PersonQuery orderByUuidId($order = Criteria::ASC) Order by the uuid_id column
 *
 * @method PersonQuery groupById() Group by the id column
 * @method PersonQuery groupByCreatedatetime() Group by the createDatetime column
 * @method PersonQuery groupByCreatepersonId() Group by the createPerson_id column
 * @method PersonQuery groupByModifydatetime() Group by the modifyDatetime column
 * @method PersonQuery groupByModifypersonId() Group by the modifyPerson_id column
 * @method PersonQuery groupByDeleted() Group by the deleted column
 * @method PersonQuery groupByCode() Group by the code column
 * @method PersonQuery groupByFederalcode() Group by the federalCode column
 * @method PersonQuery groupByRegionalcode() Group by the regionalCode column
 * @method PersonQuery groupByLastname() Group by the lastName column
 * @method PersonQuery groupByFirstname() Group by the firstName column
 * @method PersonQuery groupByPatrname() Group by the patrName column
 * @method PersonQuery groupByPostId() Group by the post_id column
 * @method PersonQuery groupBySpecialityId() Group by the speciality_id column
 * @method PersonQuery groupByOrgId() Group by the org_id column
 * @method PersonQuery groupByOrgstructureId() Group by the orgStructure_id column
 * @method PersonQuery groupByOffice() Group by the office column
 * @method PersonQuery groupByOffice2() Group by the office2 column
 * @method PersonQuery groupByTariffcategoryId() Group by the tariffCategory_id column
 * @method PersonQuery groupByFinanceId() Group by the finance_id column
 * @method PersonQuery groupByRetiredate() Group by the retireDate column
 * @method PersonQuery groupByAmbplan() Group by the ambPlan column
 * @method PersonQuery groupByAmbplan2() Group by the ambPlan2 column
 * @method PersonQuery groupByAmbnorm() Group by the ambNorm column
 * @method PersonQuery groupByHomplan() Group by the homPlan column
 * @method PersonQuery groupByHomplan2() Group by the homPlan2 column
 * @method PersonQuery groupByHomnorm() Group by the homNorm column
 * @method PersonQuery groupByExpplan() Group by the expPlan column
 * @method PersonQuery groupByExpnorm() Group by the expNorm column
 * @method PersonQuery groupByLogin() Group by the login column
 * @method PersonQuery groupByPassword() Group by the password column
 * @method PersonQuery groupByUserprofileId() Group by the userProfile_id column
 * @method PersonQuery groupByRetired() Group by the retired column
 * @method PersonQuery groupByBirthdate() Group by the birthDate column
 * @method PersonQuery groupByBirthplace() Group by the birthPlace column
 * @method PersonQuery groupBySex() Group by the sex column
 * @method PersonQuery groupBySnils() Group by the SNILS column
 * @method PersonQuery groupByInn() Group by the INN column
 * @method PersonQuery groupByAvailableforexternal() Group by the availableForExternal column
 * @method PersonQuery groupByPrimaryquota() Group by the primaryQuota column
 * @method PersonQuery groupByOwnquota() Group by the ownQuota column
 * @method PersonQuery groupByConsultancyquota() Group by the consultancyQuota column
 * @method PersonQuery groupByExternalquota() Group by the externalQuota column
 * @method PersonQuery groupByLastaccessibletimelinedate() Group by the lastAccessibleTimelineDate column
 * @method PersonQuery groupByTimelineaccessibledays() Group by the timelineAccessibleDays column
 * @method PersonQuery groupByTypetimelineperson() Group by the typeTimeLinePerson column
 * @method PersonQuery groupByMaxoverqueue() Group by the maxOverQueue column
 * @method PersonQuery groupByMaxcito() Group by the maxCito column
 * @method PersonQuery groupByQuotunit() Group by the quotUnit column
 * @method PersonQuery groupByAcademicdegreeId() Group by the academicdegree_id column
 * @method PersonQuery groupByAcademictitleId() Group by the academicTitle_id column
 * @method PersonQuery groupByUuidId() Group by the uuid_id column
 *
 * @method PersonQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PersonQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PersonQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PersonQuery leftJoinActionpropertyPerson($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionpropertyPerson relation
 * @method PersonQuery rightJoinActionpropertyPerson($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionpropertyPerson relation
 * @method PersonQuery innerJoinActionpropertyPerson($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionpropertyPerson relation
 *
 * @method PersonQuery leftJoinActiontype($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actiontype relation
 * @method PersonQuery rightJoinActiontype($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actiontype relation
 * @method PersonQuery innerJoinActiontype($relationAlias = null) Adds a INNER JOIN clause to the query using the Actiontype relation
 *
 * @method PersonQuery leftJoinBlankactionsMovingRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsMovingRelatedByCreatepersonId relation
 * @method PersonQuery rightJoinBlankactionsMovingRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsMovingRelatedByCreatepersonId relation
 * @method PersonQuery innerJoinBlankactionsMovingRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsMovingRelatedByCreatepersonId relation
 *
 * @method PersonQuery leftJoinBlankactionsMovingRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsMovingRelatedByModifypersonId relation
 * @method PersonQuery rightJoinBlankactionsMovingRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsMovingRelatedByModifypersonId relation
 * @method PersonQuery innerJoinBlankactionsMovingRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsMovingRelatedByModifypersonId relation
 *
 * @method PersonQuery leftJoinBlankactionsMovingRelatedByPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsMovingRelatedByPersonId relation
 * @method PersonQuery rightJoinBlankactionsMovingRelatedByPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsMovingRelatedByPersonId relation
 * @method PersonQuery innerJoinBlankactionsMovingRelatedByPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsMovingRelatedByPersonId relation
 *
 * @method PersonQuery leftJoinBlankactionsPartyRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsPartyRelatedByCreatepersonId relation
 * @method PersonQuery rightJoinBlankactionsPartyRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsPartyRelatedByCreatepersonId relation
 * @method PersonQuery innerJoinBlankactionsPartyRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsPartyRelatedByCreatepersonId relation
 *
 * @method PersonQuery leftJoinBlankactionsPartyRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsPartyRelatedByModifypersonId relation
 * @method PersonQuery rightJoinBlankactionsPartyRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsPartyRelatedByModifypersonId relation
 * @method PersonQuery innerJoinBlankactionsPartyRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsPartyRelatedByModifypersonId relation
 *
 * @method PersonQuery leftJoinBlankactionsPartyRelatedByPersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BlankactionsPartyRelatedByPersonId relation
 * @method PersonQuery rightJoinBlankactionsPartyRelatedByPersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BlankactionsPartyRelatedByPersonId relation
 * @method PersonQuery innerJoinBlankactionsPartyRelatedByPersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the BlankactionsPartyRelatedByPersonId relation
 *
 * @method PersonQuery leftJoinNotificationoccurred($relationAlias = null) Adds a LEFT JOIN clause to the query using the Notificationoccurred relation
 * @method PersonQuery rightJoinNotificationoccurred($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Notificationoccurred relation
 * @method PersonQuery innerJoinNotificationoccurred($relationAlias = null) Adds a INNER JOIN clause to the query using the Notificationoccurred relation
 *
 * @method PersonQuery leftJoinPersonTimetemplateRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonTimetemplateRelatedByCreatepersonId relation
 * @method PersonQuery rightJoinPersonTimetemplateRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonTimetemplateRelatedByCreatepersonId relation
 * @method PersonQuery innerJoinPersonTimetemplateRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonTimetemplateRelatedByCreatepersonId relation
 *
 * @method PersonQuery leftJoinPersonTimetemplateRelatedByMasterId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonTimetemplateRelatedByMasterId relation
 * @method PersonQuery rightJoinPersonTimetemplateRelatedByMasterId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonTimetemplateRelatedByMasterId relation
 * @method PersonQuery innerJoinPersonTimetemplateRelatedByMasterId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonTimetemplateRelatedByMasterId relation
 *
 * @method PersonQuery leftJoinPersonTimetemplateRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PersonTimetemplateRelatedByModifypersonId relation
 * @method PersonQuery rightJoinPersonTimetemplateRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PersonTimetemplateRelatedByModifypersonId relation
 * @method PersonQuery innerJoinPersonTimetemplateRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the PersonTimetemplateRelatedByModifypersonId relation
 *
 * @method PersonQuery leftJoinStockmotionRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionRelatedByCreatepersonId relation
 * @method PersonQuery rightJoinStockmotionRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionRelatedByCreatepersonId relation
 * @method PersonQuery innerJoinStockmotionRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionRelatedByCreatepersonId relation
 *
 * @method PersonQuery leftJoinStockmotionRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionRelatedByModifypersonId relation
 * @method PersonQuery rightJoinStockmotionRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionRelatedByModifypersonId relation
 * @method PersonQuery innerJoinStockmotionRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionRelatedByModifypersonId relation
 *
 * @method PersonQuery leftJoinStockmotionRelatedByReceiverpersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionRelatedByReceiverpersonId relation
 * @method PersonQuery rightJoinStockmotionRelatedByReceiverpersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionRelatedByReceiverpersonId relation
 * @method PersonQuery innerJoinStockmotionRelatedByReceiverpersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionRelatedByReceiverpersonId relation
 *
 * @method PersonQuery leftJoinStockmotionRelatedBySupplierpersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockmotionRelatedBySupplierpersonId relation
 * @method PersonQuery rightJoinStockmotionRelatedBySupplierpersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockmotionRelatedBySupplierpersonId relation
 * @method PersonQuery innerJoinStockmotionRelatedBySupplierpersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockmotionRelatedBySupplierpersonId relation
 *
 * @method PersonQuery leftJoinStockrecipeRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrecipeRelatedByCreatepersonId relation
 * @method PersonQuery rightJoinStockrecipeRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrecipeRelatedByCreatepersonId relation
 * @method PersonQuery innerJoinStockrecipeRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrecipeRelatedByCreatepersonId relation
 *
 * @method PersonQuery leftJoinStockrecipeRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrecipeRelatedByModifypersonId relation
 * @method PersonQuery rightJoinStockrecipeRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrecipeRelatedByModifypersonId relation
 * @method PersonQuery innerJoinStockrecipeRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrecipeRelatedByModifypersonId relation
 *
 * @method PersonQuery leftJoinStockrequisitionRelatedByCreatepersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionRelatedByCreatepersonId relation
 * @method PersonQuery rightJoinStockrequisitionRelatedByCreatepersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionRelatedByCreatepersonId relation
 * @method PersonQuery innerJoinStockrequisitionRelatedByCreatepersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionRelatedByCreatepersonId relation
 *
 * @method PersonQuery leftJoinStockrequisitionRelatedByModifypersonId($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockrequisitionRelatedByModifypersonId relation
 * @method PersonQuery rightJoinStockrequisitionRelatedByModifypersonId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockrequisitionRelatedByModifypersonId relation
 * @method PersonQuery innerJoinStockrequisitionRelatedByModifypersonId($relationAlias = null) Adds a INNER JOIN clause to the query using the StockrequisitionRelatedByModifypersonId relation
 *
 * @method PersonQuery leftJoinTakentissuejournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Takentissuejournal relation
 * @method PersonQuery rightJoinTakentissuejournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Takentissuejournal relation
 * @method PersonQuery innerJoinTakentissuejournal($relationAlias = null) Adds a INNER JOIN clause to the query using the Takentissuejournal relation
 *
 * @method Person findOne(PropelPDO $con = null) Return the first Person matching the query
 * @method Person findOneOrCreate(PropelPDO $con = null) Return the first Person matching the query, or a new Person object populated from the query conditions when no match is found
 *
 * @method Person findOneByCreatedatetime(string $createDatetime) Return the first Person filtered by the createDatetime column
 * @method Person findOneByCreatepersonId(int $createPerson_id) Return the first Person filtered by the createPerson_id column
 * @method Person findOneByModifydatetime(string $modifyDatetime) Return the first Person filtered by the modifyDatetime column
 * @method Person findOneByModifypersonId(int $modifyPerson_id) Return the first Person filtered by the modifyPerson_id column
 * @method Person findOneByDeleted(boolean $deleted) Return the first Person filtered by the deleted column
 * @method Person findOneByCode(string $code) Return the first Person filtered by the code column
 * @method Person findOneByFederalcode(string $federalCode) Return the first Person filtered by the federalCode column
 * @method Person findOneByRegionalcode(string $regionalCode) Return the first Person filtered by the regionalCode column
 * @method Person findOneByLastname(string $lastName) Return the first Person filtered by the lastName column
 * @method Person findOneByFirstname(string $firstName) Return the first Person filtered by the firstName column
 * @method Person findOneByPatrname(string $patrName) Return the first Person filtered by the patrName column
 * @method Person findOneByPostId(int $post_id) Return the first Person filtered by the post_id column
 * @method Person findOneBySpecialityId(int $speciality_id) Return the first Person filtered by the speciality_id column
 * @method Person findOneByOrgId(int $org_id) Return the first Person filtered by the org_id column
 * @method Person findOneByOrgstructureId(int $orgStructure_id) Return the first Person filtered by the orgStructure_id column
 * @method Person findOneByOffice(string $office) Return the first Person filtered by the office column
 * @method Person findOneByOffice2(string $office2) Return the first Person filtered by the office2 column
 * @method Person findOneByTariffcategoryId(int $tariffCategory_id) Return the first Person filtered by the tariffCategory_id column
 * @method Person findOneByFinanceId(int $finance_id) Return the first Person filtered by the finance_id column
 * @method Person findOneByRetiredate(string $retireDate) Return the first Person filtered by the retireDate column
 * @method Person findOneByAmbplan(int $ambPlan) Return the first Person filtered by the ambPlan column
 * @method Person findOneByAmbplan2(int $ambPlan2) Return the first Person filtered by the ambPlan2 column
 * @method Person findOneByAmbnorm(int $ambNorm) Return the first Person filtered by the ambNorm column
 * @method Person findOneByHomplan(int $homPlan) Return the first Person filtered by the homPlan column
 * @method Person findOneByHomplan2(int $homPlan2) Return the first Person filtered by the homPlan2 column
 * @method Person findOneByHomnorm(int $homNorm) Return the first Person filtered by the homNorm column
 * @method Person findOneByExpplan(int $expPlan) Return the first Person filtered by the expPlan column
 * @method Person findOneByExpnorm(int $expNorm) Return the first Person filtered by the expNorm column
 * @method Person findOneByLogin(string $login) Return the first Person filtered by the login column
 * @method Person findOneByPassword(string $password) Return the first Person filtered by the password column
 * @method Person findOneByUserprofileId(int $userProfile_id) Return the first Person filtered by the userProfile_id column
 * @method Person findOneByRetired(boolean $retired) Return the first Person filtered by the retired column
 * @method Person findOneByBirthdate(string $birthDate) Return the first Person filtered by the birthDate column
 * @method Person findOneByBirthplace(string $birthPlace) Return the first Person filtered by the birthPlace column
 * @method Person findOneBySex(int $sex) Return the first Person filtered by the sex column
 * @method Person findOneBySnils(string $SNILS) Return the first Person filtered by the SNILS column
 * @method Person findOneByInn(string $INN) Return the first Person filtered by the INN column
 * @method Person findOneByAvailableforexternal(int $availableForExternal) Return the first Person filtered by the availableForExternal column
 * @method Person findOneByPrimaryquota(int $primaryQuota) Return the first Person filtered by the primaryQuota column
 * @method Person findOneByOwnquota(int $ownQuota) Return the first Person filtered by the ownQuota column
 * @method Person findOneByConsultancyquota(int $consultancyQuota) Return the first Person filtered by the consultancyQuota column
 * @method Person findOneByExternalquota(int $externalQuota) Return the first Person filtered by the externalQuota column
 * @method Person findOneByLastaccessibletimelinedate(string $lastAccessibleTimelineDate) Return the first Person filtered by the lastAccessibleTimelineDate column
 * @method Person findOneByTimelineaccessibledays(int $timelineAccessibleDays) Return the first Person filtered by the timelineAccessibleDays column
 * @method Person findOneByTypetimelineperson(int $typeTimeLinePerson) Return the first Person filtered by the typeTimeLinePerson column
 * @method Person findOneByMaxoverqueue(int $maxOverQueue) Return the first Person filtered by the maxOverQueue column
 * @method Person findOneByMaxcito(int $maxCito) Return the first Person filtered by the maxCito column
 * @method Person findOneByQuotunit(int $quotUnit) Return the first Person filtered by the quotUnit column
 * @method Person findOneByAcademicdegreeId(int $academicdegree_id) Return the first Person filtered by the academicdegree_id column
 * @method Person findOneByAcademictitleId(int $academicTitle_id) Return the first Person filtered by the academicTitle_id column
 * @method Person findOneByUuidId(int $uuid_id) Return the first Person filtered by the uuid_id column
 *
 * @method array findById(int $id) Return Person objects filtered by the id column
 * @method array findByCreatedatetime(string $createDatetime) Return Person objects filtered by the createDatetime column
 * @method array findByCreatepersonId(int $createPerson_id) Return Person objects filtered by the createPerson_id column
 * @method array findByModifydatetime(string $modifyDatetime) Return Person objects filtered by the modifyDatetime column
 * @method array findByModifypersonId(int $modifyPerson_id) Return Person objects filtered by the modifyPerson_id column
 * @method array findByDeleted(boolean $deleted) Return Person objects filtered by the deleted column
 * @method array findByCode(string $code) Return Person objects filtered by the code column
 * @method array findByFederalcode(string $federalCode) Return Person objects filtered by the federalCode column
 * @method array findByRegionalcode(string $regionalCode) Return Person objects filtered by the regionalCode column
 * @method array findByLastname(string $lastName) Return Person objects filtered by the lastName column
 * @method array findByFirstname(string $firstName) Return Person objects filtered by the firstName column
 * @method array findByPatrname(string $patrName) Return Person objects filtered by the patrName column
 * @method array findByPostId(int $post_id) Return Person objects filtered by the post_id column
 * @method array findBySpecialityId(int $speciality_id) Return Person objects filtered by the speciality_id column
 * @method array findByOrgId(int $org_id) Return Person objects filtered by the org_id column
 * @method array findByOrgstructureId(int $orgStructure_id) Return Person objects filtered by the orgStructure_id column
 * @method array findByOffice(string $office) Return Person objects filtered by the office column
 * @method array findByOffice2(string $office2) Return Person objects filtered by the office2 column
 * @method array findByTariffcategoryId(int $tariffCategory_id) Return Person objects filtered by the tariffCategory_id column
 * @method array findByFinanceId(int $finance_id) Return Person objects filtered by the finance_id column
 * @method array findByRetiredate(string $retireDate) Return Person objects filtered by the retireDate column
 * @method array findByAmbplan(int $ambPlan) Return Person objects filtered by the ambPlan column
 * @method array findByAmbplan2(int $ambPlan2) Return Person objects filtered by the ambPlan2 column
 * @method array findByAmbnorm(int $ambNorm) Return Person objects filtered by the ambNorm column
 * @method array findByHomplan(int $homPlan) Return Person objects filtered by the homPlan column
 * @method array findByHomplan2(int $homPlan2) Return Person objects filtered by the homPlan2 column
 * @method array findByHomnorm(int $homNorm) Return Person objects filtered by the homNorm column
 * @method array findByExpplan(int $expPlan) Return Person objects filtered by the expPlan column
 * @method array findByExpnorm(int $expNorm) Return Person objects filtered by the expNorm column
 * @method array findByLogin(string $login) Return Person objects filtered by the login column
 * @method array findByPassword(string $password) Return Person objects filtered by the password column
 * @method array findByUserprofileId(int $userProfile_id) Return Person objects filtered by the userProfile_id column
 * @method array findByRetired(boolean $retired) Return Person objects filtered by the retired column
 * @method array findByBirthdate(string $birthDate) Return Person objects filtered by the birthDate column
 * @method array findByBirthplace(string $birthPlace) Return Person objects filtered by the birthPlace column
 * @method array findBySex(int $sex) Return Person objects filtered by the sex column
 * @method array findBySnils(string $SNILS) Return Person objects filtered by the SNILS column
 * @method array findByInn(string $INN) Return Person objects filtered by the INN column
 * @method array findByAvailableforexternal(int $availableForExternal) Return Person objects filtered by the availableForExternal column
 * @method array findByPrimaryquota(int $primaryQuota) Return Person objects filtered by the primaryQuota column
 * @method array findByOwnquota(int $ownQuota) Return Person objects filtered by the ownQuota column
 * @method array findByConsultancyquota(int $consultancyQuota) Return Person objects filtered by the consultancyQuota column
 * @method array findByExternalquota(int $externalQuota) Return Person objects filtered by the externalQuota column
 * @method array findByLastaccessibletimelinedate(string $lastAccessibleTimelineDate) Return Person objects filtered by the lastAccessibleTimelineDate column
 * @method array findByTimelineaccessibledays(int $timelineAccessibleDays) Return Person objects filtered by the timelineAccessibleDays column
 * @method array findByTypetimelineperson(int $typeTimeLinePerson) Return Person objects filtered by the typeTimeLinePerson column
 * @method array findByMaxoverqueue(int $maxOverQueue) Return Person objects filtered by the maxOverQueue column
 * @method array findByMaxcito(int $maxCito) Return Person objects filtered by the maxCito column
 * @method array findByQuotunit(int $quotUnit) Return Person objects filtered by the quotUnit column
 * @method array findByAcademicdegreeId(int $academicdegree_id) Return Person objects filtered by the academicdegree_id column
 * @method array findByAcademictitleId(int $academicTitle_id) Return Person objects filtered by the academicTitle_id column
 * @method array findByUuidId(int $uuid_id) Return Person objects filtered by the uuid_id column
 *
 * @package    propel.generator.Webmis.Models.om
 */
abstract class BasePersonQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePersonQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'Webmis-API', $modelName = 'Webmis\\Models\\Person', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PersonQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PersonQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PersonQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PersonQuery) {
            return $criteria;
        }
        $query = new PersonQuery();
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
     * @return   Person|Person[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PersonPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PersonPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Person A model object, or null if the key is not found
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
     * @return                 Person A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `createDatetime`, `createPerson_id`, `modifyDatetime`, `modifyPerson_id`, `deleted`, `code`, `federalCode`, `regionalCode`, `lastName`, `firstName`, `patrName`, `post_id`, `speciality_id`, `org_id`, `orgStructure_id`, `office`, `office2`, `tariffCategory_id`, `finance_id`, `retireDate`, `ambPlan`, `ambPlan2`, `ambNorm`, `homPlan`, `homPlan2`, `homNorm`, `expPlan`, `expNorm`, `login`, `password`, `userProfile_id`, `retired`, `birthDate`, `birthPlace`, `sex`, `SNILS`, `INN`, `availableForExternal`, `primaryQuota`, `ownQuota`, `consultancyQuota`, `externalQuota`, `lastAccessibleTimelineDate`, `timelineAccessibleDays`, `typeTimeLinePerson`, `maxOverQueue`, `maxCito`, `quotUnit`, `academicdegree_id`, `academicTitle_id`, `uuid_id` FROM `Person` WHERE `id` = :p0';
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
            $obj = new Person();
            $obj->hydrate($row);
            PersonPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Person|Person[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Person[]|mixed the list of results, formatted by the current formatter
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PersonPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PersonPeer::ID, $keys, Criteria::IN);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PersonPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PersonPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ID, $id, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByCreatedatetime($createdatetime = null, $comparison = null)
    {
        if (is_array($createdatetime)) {
            $useMinMax = false;
            if (isset($createdatetime['min'])) {
                $this->addUsingAlias(PersonPeer::CREATEDATETIME, $createdatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdatetime['max'])) {
                $this->addUsingAlias(PersonPeer::CREATEDATETIME, $createdatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::CREATEDATETIME, $createdatetime, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByCreatepersonId($createpersonId = null, $comparison = null)
    {
        if (is_array($createpersonId)) {
            $useMinMax = false;
            if (isset($createpersonId['min'])) {
                $this->addUsingAlias(PersonPeer::CREATEPERSON_ID, $createpersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createpersonId['max'])) {
                $this->addUsingAlias(PersonPeer::CREATEPERSON_ID, $createpersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::CREATEPERSON_ID, $createpersonId, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByModifydatetime($modifydatetime = null, $comparison = null)
    {
        if (is_array($modifydatetime)) {
            $useMinMax = false;
            if (isset($modifydatetime['min'])) {
                $this->addUsingAlias(PersonPeer::MODIFYDATETIME, $modifydatetime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifydatetime['max'])) {
                $this->addUsingAlias(PersonPeer::MODIFYDATETIME, $modifydatetime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::MODIFYDATETIME, $modifydatetime, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByModifypersonId($modifypersonId = null, $comparison = null)
    {
        if (is_array($modifypersonId)) {
            $useMinMax = false;
            if (isset($modifypersonId['min'])) {
                $this->addUsingAlias(PersonPeer::MODIFYPERSON_ID, $modifypersonId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($modifypersonId['max'])) {
                $this->addUsingAlias(PersonPeer::MODIFYPERSON_ID, $modifypersonId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::MODIFYPERSON_ID, $modifypersonId, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersonPeer::DELETED, $deleted, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the federalCode column
     *
     * Example usage:
     * <code>
     * $query->filterByFederalcode('fooValue');   // WHERE federalCode = 'fooValue'
     * $query->filterByFederalcode('%fooValue%'); // WHERE federalCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $federalcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByFederalcode($federalcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($federalcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $federalcode)) {
                $federalcode = str_replace('*', '%', $federalcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::FEDERALCODE, $federalcode, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::REGIONALCODE, $regionalcode, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::LASTNAME, $lastname, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::FIRSTNAME, $firstname, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::PATRNAME, $patrname, $comparison);
    }

    /**
     * Filter the query on the post_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPostId(1234); // WHERE post_id = 1234
     * $query->filterByPostId(array(12, 34)); // WHERE post_id IN (12, 34)
     * $query->filterByPostId(array('min' => 12)); // WHERE post_id >= 12
     * $query->filterByPostId(array('max' => 12)); // WHERE post_id <= 12
     * </code>
     *
     * @param     mixed $postId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPostId($postId = null, $comparison = null)
    {
        if (is_array($postId)) {
            $useMinMax = false;
            if (isset($postId['min'])) {
                $this->addUsingAlias(PersonPeer::POST_ID, $postId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postId['max'])) {
                $this->addUsingAlias(PersonPeer::POST_ID, $postId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::POST_ID, $postId, $comparison);
    }

    /**
     * Filter the query on the speciality_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecialityId(1234); // WHERE speciality_id = 1234
     * $query->filterBySpecialityId(array(12, 34)); // WHERE speciality_id IN (12, 34)
     * $query->filterBySpecialityId(array('min' => 12)); // WHERE speciality_id >= 12
     * $query->filterBySpecialityId(array('max' => 12)); // WHERE speciality_id <= 12
     * </code>
     *
     * @param     mixed $specialityId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterBySpecialityId($specialityId = null, $comparison = null)
    {
        if (is_array($specialityId)) {
            $useMinMax = false;
            if (isset($specialityId['min'])) {
                $this->addUsingAlias(PersonPeer::SPECIALITY_ID, $specialityId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($specialityId['max'])) {
                $this->addUsingAlias(PersonPeer::SPECIALITY_ID, $specialityId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::SPECIALITY_ID, $specialityId, $comparison);
    }

    /**
     * Filter the query on the org_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgId(1234); // WHERE org_id = 1234
     * $query->filterByOrgId(array(12, 34)); // WHERE org_id IN (12, 34)
     * $query->filterByOrgId(array('min' => 12)); // WHERE org_id >= 12
     * $query->filterByOrgId(array('max' => 12)); // WHERE org_id <= 12
     * </code>
     *
     * @param     mixed $orgId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByOrgId($orgId = null, $comparison = null)
    {
        if (is_array($orgId)) {
            $useMinMax = false;
            if (isset($orgId['min'])) {
                $this->addUsingAlias(PersonPeer::ORG_ID, $orgId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgId['max'])) {
                $this->addUsingAlias(PersonPeer::ORG_ID, $orgId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ORG_ID, $orgId, $comparison);
    }

    /**
     * Filter the query on the orgStructure_id column
     *
     * Example usage:
     * <code>
     * $query->filterByOrgstructureId(1234); // WHERE orgStructure_id = 1234
     * $query->filterByOrgstructureId(array(12, 34)); // WHERE orgStructure_id IN (12, 34)
     * $query->filterByOrgstructureId(array('min' => 12)); // WHERE orgStructure_id >= 12
     * $query->filterByOrgstructureId(array('max' => 12)); // WHERE orgStructure_id <= 12
     * </code>
     *
     * @param     mixed $orgstructureId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByOrgstructureId($orgstructureId = null, $comparison = null)
    {
        if (is_array($orgstructureId)) {
            $useMinMax = false;
            if (isset($orgstructureId['min'])) {
                $this->addUsingAlias(PersonPeer::ORGSTRUCTURE_ID, $orgstructureId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($orgstructureId['max'])) {
                $this->addUsingAlias(PersonPeer::ORGSTRUCTURE_ID, $orgstructureId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ORGSTRUCTURE_ID, $orgstructureId, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::OFFICE, $office, $comparison);
    }

    /**
     * Filter the query on the office2 column
     *
     * Example usage:
     * <code>
     * $query->filterByOffice2('fooValue');   // WHERE office2 = 'fooValue'
     * $query->filterByOffice2('%fooValue%'); // WHERE office2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $office2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByOffice2($office2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($office2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $office2)) {
                $office2 = str_replace('*', '%', $office2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::OFFICE2, $office2, $comparison);
    }

    /**
     * Filter the query on the tariffCategory_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTariffcategoryId(1234); // WHERE tariffCategory_id = 1234
     * $query->filterByTariffcategoryId(array(12, 34)); // WHERE tariffCategory_id IN (12, 34)
     * $query->filterByTariffcategoryId(array('min' => 12)); // WHERE tariffCategory_id >= 12
     * $query->filterByTariffcategoryId(array('max' => 12)); // WHERE tariffCategory_id <= 12
     * </code>
     *
     * @param     mixed $tariffcategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByTariffcategoryId($tariffcategoryId = null, $comparison = null)
    {
        if (is_array($tariffcategoryId)) {
            $useMinMax = false;
            if (isset($tariffcategoryId['min'])) {
                $this->addUsingAlias(PersonPeer::TARIFFCATEGORY_ID, $tariffcategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tariffcategoryId['max'])) {
                $this->addUsingAlias(PersonPeer::TARIFFCATEGORY_ID, $tariffcategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::TARIFFCATEGORY_ID, $tariffcategoryId, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByFinanceId($financeId = null, $comparison = null)
    {
        if (is_array($financeId)) {
            $useMinMax = false;
            if (isset($financeId['min'])) {
                $this->addUsingAlias(PersonPeer::FINANCE_ID, $financeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($financeId['max'])) {
                $this->addUsingAlias(PersonPeer::FINANCE_ID, $financeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::FINANCE_ID, $financeId, $comparison);
    }

    /**
     * Filter the query on the retireDate column
     *
     * Example usage:
     * <code>
     * $query->filterByRetiredate('2011-03-14'); // WHERE retireDate = '2011-03-14'
     * $query->filterByRetiredate('now'); // WHERE retireDate = '2011-03-14'
     * $query->filterByRetiredate(array('max' => 'yesterday')); // WHERE retireDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $retiredate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByRetiredate($retiredate = null, $comparison = null)
    {
        if (is_array($retiredate)) {
            $useMinMax = false;
            if (isset($retiredate['min'])) {
                $this->addUsingAlias(PersonPeer::RETIREDATE, $retiredate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($retiredate['max'])) {
                $this->addUsingAlias(PersonPeer::RETIREDATE, $retiredate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::RETIREDATE, $retiredate, $comparison);
    }

    /**
     * Filter the query on the ambPlan column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbplan(1234); // WHERE ambPlan = 1234
     * $query->filterByAmbplan(array(12, 34)); // WHERE ambPlan IN (12, 34)
     * $query->filterByAmbplan(array('min' => 12)); // WHERE ambPlan >= 12
     * $query->filterByAmbplan(array('max' => 12)); // WHERE ambPlan <= 12
     * </code>
     *
     * @param     mixed $ambplan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAmbplan($ambplan = null, $comparison = null)
    {
        if (is_array($ambplan)) {
            $useMinMax = false;
            if (isset($ambplan['min'])) {
                $this->addUsingAlias(PersonPeer::AMBPLAN, $ambplan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambplan['max'])) {
                $this->addUsingAlias(PersonPeer::AMBPLAN, $ambplan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::AMBPLAN, $ambplan, $comparison);
    }

    /**
     * Filter the query on the ambPlan2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbplan2(1234); // WHERE ambPlan2 = 1234
     * $query->filterByAmbplan2(array(12, 34)); // WHERE ambPlan2 IN (12, 34)
     * $query->filterByAmbplan2(array('min' => 12)); // WHERE ambPlan2 >= 12
     * $query->filterByAmbplan2(array('max' => 12)); // WHERE ambPlan2 <= 12
     * </code>
     *
     * @param     mixed $ambplan2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAmbplan2($ambplan2 = null, $comparison = null)
    {
        if (is_array($ambplan2)) {
            $useMinMax = false;
            if (isset($ambplan2['min'])) {
                $this->addUsingAlias(PersonPeer::AMBPLAN2, $ambplan2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambplan2['max'])) {
                $this->addUsingAlias(PersonPeer::AMBPLAN2, $ambplan2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::AMBPLAN2, $ambplan2, $comparison);
    }

    /**
     * Filter the query on the ambNorm column
     *
     * Example usage:
     * <code>
     * $query->filterByAmbnorm(1234); // WHERE ambNorm = 1234
     * $query->filterByAmbnorm(array(12, 34)); // WHERE ambNorm IN (12, 34)
     * $query->filterByAmbnorm(array('min' => 12)); // WHERE ambNorm >= 12
     * $query->filterByAmbnorm(array('max' => 12)); // WHERE ambNorm <= 12
     * </code>
     *
     * @param     mixed $ambnorm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAmbnorm($ambnorm = null, $comparison = null)
    {
        if (is_array($ambnorm)) {
            $useMinMax = false;
            if (isset($ambnorm['min'])) {
                $this->addUsingAlias(PersonPeer::AMBNORM, $ambnorm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ambnorm['max'])) {
                $this->addUsingAlias(PersonPeer::AMBNORM, $ambnorm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::AMBNORM, $ambnorm, $comparison);
    }

    /**
     * Filter the query on the homPlan column
     *
     * Example usage:
     * <code>
     * $query->filterByHomplan(1234); // WHERE homPlan = 1234
     * $query->filterByHomplan(array(12, 34)); // WHERE homPlan IN (12, 34)
     * $query->filterByHomplan(array('min' => 12)); // WHERE homPlan >= 12
     * $query->filterByHomplan(array('max' => 12)); // WHERE homPlan <= 12
     * </code>
     *
     * @param     mixed $homplan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByHomplan($homplan = null, $comparison = null)
    {
        if (is_array($homplan)) {
            $useMinMax = false;
            if (isset($homplan['min'])) {
                $this->addUsingAlias(PersonPeer::HOMPLAN, $homplan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homplan['max'])) {
                $this->addUsingAlias(PersonPeer::HOMPLAN, $homplan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::HOMPLAN, $homplan, $comparison);
    }

    /**
     * Filter the query on the homPlan2 column
     *
     * Example usage:
     * <code>
     * $query->filterByHomplan2(1234); // WHERE homPlan2 = 1234
     * $query->filterByHomplan2(array(12, 34)); // WHERE homPlan2 IN (12, 34)
     * $query->filterByHomplan2(array('min' => 12)); // WHERE homPlan2 >= 12
     * $query->filterByHomplan2(array('max' => 12)); // WHERE homPlan2 <= 12
     * </code>
     *
     * @param     mixed $homplan2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByHomplan2($homplan2 = null, $comparison = null)
    {
        if (is_array($homplan2)) {
            $useMinMax = false;
            if (isset($homplan2['min'])) {
                $this->addUsingAlias(PersonPeer::HOMPLAN2, $homplan2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homplan2['max'])) {
                $this->addUsingAlias(PersonPeer::HOMPLAN2, $homplan2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::HOMPLAN2, $homplan2, $comparison);
    }

    /**
     * Filter the query on the homNorm column
     *
     * Example usage:
     * <code>
     * $query->filterByHomnorm(1234); // WHERE homNorm = 1234
     * $query->filterByHomnorm(array(12, 34)); // WHERE homNorm IN (12, 34)
     * $query->filterByHomnorm(array('min' => 12)); // WHERE homNorm >= 12
     * $query->filterByHomnorm(array('max' => 12)); // WHERE homNorm <= 12
     * </code>
     *
     * @param     mixed $homnorm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByHomnorm($homnorm = null, $comparison = null)
    {
        if (is_array($homnorm)) {
            $useMinMax = false;
            if (isset($homnorm['min'])) {
                $this->addUsingAlias(PersonPeer::HOMNORM, $homnorm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($homnorm['max'])) {
                $this->addUsingAlias(PersonPeer::HOMNORM, $homnorm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::HOMNORM, $homnorm, $comparison);
    }

    /**
     * Filter the query on the expPlan column
     *
     * Example usage:
     * <code>
     * $query->filterByExpplan(1234); // WHERE expPlan = 1234
     * $query->filterByExpplan(array(12, 34)); // WHERE expPlan IN (12, 34)
     * $query->filterByExpplan(array('min' => 12)); // WHERE expPlan >= 12
     * $query->filterByExpplan(array('max' => 12)); // WHERE expPlan <= 12
     * </code>
     *
     * @param     mixed $expplan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByExpplan($expplan = null, $comparison = null)
    {
        if (is_array($expplan)) {
            $useMinMax = false;
            if (isset($expplan['min'])) {
                $this->addUsingAlias(PersonPeer::EXPPLAN, $expplan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expplan['max'])) {
                $this->addUsingAlias(PersonPeer::EXPPLAN, $expplan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::EXPPLAN, $expplan, $comparison);
    }

    /**
     * Filter the query on the expNorm column
     *
     * Example usage:
     * <code>
     * $query->filterByExpnorm(1234); // WHERE expNorm = 1234
     * $query->filterByExpnorm(array(12, 34)); // WHERE expNorm IN (12, 34)
     * $query->filterByExpnorm(array('min' => 12)); // WHERE expNorm >= 12
     * $query->filterByExpnorm(array('max' => 12)); // WHERE expNorm <= 12
     * </code>
     *
     * @param     mixed $expnorm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByExpnorm($expnorm = null, $comparison = null)
    {
        if (is_array($expnorm)) {
            $useMinMax = false;
            if (isset($expnorm['min'])) {
                $this->addUsingAlias(PersonPeer::EXPNORM, $expnorm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expnorm['max'])) {
                $this->addUsingAlias(PersonPeer::EXPNORM, $expnorm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::EXPNORM, $expnorm, $comparison);
    }

    /**
     * Filter the query on the login column
     *
     * Example usage:
     * <code>
     * $query->filterByLogin('fooValue');   // WHERE login = 'fooValue'
     * $query->filterByLogin('%fooValue%'); // WHERE login LIKE '%fooValue%'
     * </code>
     *
     * @param     string $login The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByLogin($login = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($login)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $login)) {
                $login = str_replace('*', '%', $login);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::LOGIN, $login, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the userProfile_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserprofileId(1234); // WHERE userProfile_id = 1234
     * $query->filterByUserprofileId(array(12, 34)); // WHERE userProfile_id IN (12, 34)
     * $query->filterByUserprofileId(array('min' => 12)); // WHERE userProfile_id >= 12
     * $query->filterByUserprofileId(array('max' => 12)); // WHERE userProfile_id <= 12
     * </code>
     *
     * @param     mixed $userprofileId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByUserprofileId($userprofileId = null, $comparison = null)
    {
        if (is_array($userprofileId)) {
            $useMinMax = false;
            if (isset($userprofileId['min'])) {
                $this->addUsingAlias(PersonPeer::USERPROFILE_ID, $userprofileId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userprofileId['max'])) {
                $this->addUsingAlias(PersonPeer::USERPROFILE_ID, $userprofileId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::USERPROFILE_ID, $userprofileId, $comparison);
    }

    /**
     * Filter the query on the retired column
     *
     * Example usage:
     * <code>
     * $query->filterByRetired(true); // WHERE retired = true
     * $query->filterByRetired('yes'); // WHERE retired = true
     * </code>
     *
     * @param     boolean|string $retired The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByRetired($retired = null, $comparison = null)
    {
        if (is_string($retired)) {
            $retired = in_array(strtolower($retired), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PersonPeer::RETIRED, $retired, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByBirthdate($birthdate = null, $comparison = null)
    {
        if (is_array($birthdate)) {
            $useMinMax = false;
            if (isset($birthdate['min'])) {
                $this->addUsingAlias(PersonPeer::BIRTHDATE, $birthdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($birthdate['max'])) {
                $this->addUsingAlias(PersonPeer::BIRTHDATE, $birthdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::BIRTHDATE, $birthdate, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::BIRTHPLACE, $birthplace, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterBySex($sex = null, $comparison = null)
    {
        if (is_array($sex)) {
            $useMinMax = false;
            if (isset($sex['min'])) {
                $this->addUsingAlias(PersonPeer::SEX, $sex['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sex['max'])) {
                $this->addUsingAlias(PersonPeer::SEX, $sex['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::SEX, $sex, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PersonPeer::SNILS, $snils, $comparison);
    }

    /**
     * Filter the query on the INN column
     *
     * Example usage:
     * <code>
     * $query->filterByInn('fooValue');   // WHERE INN = 'fooValue'
     * $query->filterByInn('%fooValue%'); // WHERE INN LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByInn($inn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inn)) {
                $inn = str_replace('*', '%', $inn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PersonPeer::INN, $inn, $comparison);
    }

    /**
     * Filter the query on the availableForExternal column
     *
     * Example usage:
     * <code>
     * $query->filterByAvailableforexternal(1234); // WHERE availableForExternal = 1234
     * $query->filterByAvailableforexternal(array(12, 34)); // WHERE availableForExternal IN (12, 34)
     * $query->filterByAvailableforexternal(array('min' => 12)); // WHERE availableForExternal >= 12
     * $query->filterByAvailableforexternal(array('max' => 12)); // WHERE availableForExternal <= 12
     * </code>
     *
     * @param     mixed $availableforexternal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAvailableforexternal($availableforexternal = null, $comparison = null)
    {
        if (is_array($availableforexternal)) {
            $useMinMax = false;
            if (isset($availableforexternal['min'])) {
                $this->addUsingAlias(PersonPeer::AVAILABLEFOREXTERNAL, $availableforexternal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($availableforexternal['max'])) {
                $this->addUsingAlias(PersonPeer::AVAILABLEFOREXTERNAL, $availableforexternal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::AVAILABLEFOREXTERNAL, $availableforexternal, $comparison);
    }

    /**
     * Filter the query on the primaryQuota column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimaryquota(1234); // WHERE primaryQuota = 1234
     * $query->filterByPrimaryquota(array(12, 34)); // WHERE primaryQuota IN (12, 34)
     * $query->filterByPrimaryquota(array('min' => 12)); // WHERE primaryQuota >= 12
     * $query->filterByPrimaryquota(array('max' => 12)); // WHERE primaryQuota <= 12
     * </code>
     *
     * @param     mixed $primaryquota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByPrimaryquota($primaryquota = null, $comparison = null)
    {
        if (is_array($primaryquota)) {
            $useMinMax = false;
            if (isset($primaryquota['min'])) {
                $this->addUsingAlias(PersonPeer::PRIMARYQUOTA, $primaryquota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($primaryquota['max'])) {
                $this->addUsingAlias(PersonPeer::PRIMARYQUOTA, $primaryquota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::PRIMARYQUOTA, $primaryquota, $comparison);
    }

    /**
     * Filter the query on the ownQuota column
     *
     * Example usage:
     * <code>
     * $query->filterByOwnquota(1234); // WHERE ownQuota = 1234
     * $query->filterByOwnquota(array(12, 34)); // WHERE ownQuota IN (12, 34)
     * $query->filterByOwnquota(array('min' => 12)); // WHERE ownQuota >= 12
     * $query->filterByOwnquota(array('max' => 12)); // WHERE ownQuota <= 12
     * </code>
     *
     * @param     mixed $ownquota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByOwnquota($ownquota = null, $comparison = null)
    {
        if (is_array($ownquota)) {
            $useMinMax = false;
            if (isset($ownquota['min'])) {
                $this->addUsingAlias(PersonPeer::OWNQUOTA, $ownquota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ownquota['max'])) {
                $this->addUsingAlias(PersonPeer::OWNQUOTA, $ownquota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::OWNQUOTA, $ownquota, $comparison);
    }

    /**
     * Filter the query on the consultancyQuota column
     *
     * Example usage:
     * <code>
     * $query->filterByConsultancyquota(1234); // WHERE consultancyQuota = 1234
     * $query->filterByConsultancyquota(array(12, 34)); // WHERE consultancyQuota IN (12, 34)
     * $query->filterByConsultancyquota(array('min' => 12)); // WHERE consultancyQuota >= 12
     * $query->filterByConsultancyquota(array('max' => 12)); // WHERE consultancyQuota <= 12
     * </code>
     *
     * @param     mixed $consultancyquota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByConsultancyquota($consultancyquota = null, $comparison = null)
    {
        if (is_array($consultancyquota)) {
            $useMinMax = false;
            if (isset($consultancyquota['min'])) {
                $this->addUsingAlias(PersonPeer::CONSULTANCYQUOTA, $consultancyquota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($consultancyquota['max'])) {
                $this->addUsingAlias(PersonPeer::CONSULTANCYQUOTA, $consultancyquota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::CONSULTANCYQUOTA, $consultancyquota, $comparison);
    }

    /**
     * Filter the query on the externalQuota column
     *
     * Example usage:
     * <code>
     * $query->filterByExternalquota(1234); // WHERE externalQuota = 1234
     * $query->filterByExternalquota(array(12, 34)); // WHERE externalQuota IN (12, 34)
     * $query->filterByExternalquota(array('min' => 12)); // WHERE externalQuota >= 12
     * $query->filterByExternalquota(array('max' => 12)); // WHERE externalQuota <= 12
     * </code>
     *
     * @param     mixed $externalquota The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByExternalquota($externalquota = null, $comparison = null)
    {
        if (is_array($externalquota)) {
            $useMinMax = false;
            if (isset($externalquota['min'])) {
                $this->addUsingAlias(PersonPeer::EXTERNALQUOTA, $externalquota['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($externalquota['max'])) {
                $this->addUsingAlias(PersonPeer::EXTERNALQUOTA, $externalquota['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::EXTERNALQUOTA, $externalquota, $comparison);
    }

    /**
     * Filter the query on the lastAccessibleTimelineDate column
     *
     * Example usage:
     * <code>
     * $query->filterByLastaccessibletimelinedate('2011-03-14'); // WHERE lastAccessibleTimelineDate = '2011-03-14'
     * $query->filterByLastaccessibletimelinedate('now'); // WHERE lastAccessibleTimelineDate = '2011-03-14'
     * $query->filterByLastaccessibletimelinedate(array('max' => 'yesterday')); // WHERE lastAccessibleTimelineDate > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastaccessibletimelinedate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByLastaccessibletimelinedate($lastaccessibletimelinedate = null, $comparison = null)
    {
        if (is_array($lastaccessibletimelinedate)) {
            $useMinMax = false;
            if (isset($lastaccessibletimelinedate['min'])) {
                $this->addUsingAlias(PersonPeer::LASTACCESSIBLETIMELINEDATE, $lastaccessibletimelinedate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastaccessibletimelinedate['max'])) {
                $this->addUsingAlias(PersonPeer::LASTACCESSIBLETIMELINEDATE, $lastaccessibletimelinedate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::LASTACCESSIBLETIMELINEDATE, $lastaccessibletimelinedate, $comparison);
    }

    /**
     * Filter the query on the timelineAccessibleDays column
     *
     * Example usage:
     * <code>
     * $query->filterByTimelineaccessibledays(1234); // WHERE timelineAccessibleDays = 1234
     * $query->filterByTimelineaccessibledays(array(12, 34)); // WHERE timelineAccessibleDays IN (12, 34)
     * $query->filterByTimelineaccessibledays(array('min' => 12)); // WHERE timelineAccessibleDays >= 12
     * $query->filterByTimelineaccessibledays(array('max' => 12)); // WHERE timelineAccessibleDays <= 12
     * </code>
     *
     * @param     mixed $timelineaccessibledays The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByTimelineaccessibledays($timelineaccessibledays = null, $comparison = null)
    {
        if (is_array($timelineaccessibledays)) {
            $useMinMax = false;
            if (isset($timelineaccessibledays['min'])) {
                $this->addUsingAlias(PersonPeer::TIMELINEACCESSIBLEDAYS, $timelineaccessibledays['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($timelineaccessibledays['max'])) {
                $this->addUsingAlias(PersonPeer::TIMELINEACCESSIBLEDAYS, $timelineaccessibledays['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::TIMELINEACCESSIBLEDAYS, $timelineaccessibledays, $comparison);
    }

    /**
     * Filter the query on the typeTimeLinePerson column
     *
     * Example usage:
     * <code>
     * $query->filterByTypetimelineperson(1234); // WHERE typeTimeLinePerson = 1234
     * $query->filterByTypetimelineperson(array(12, 34)); // WHERE typeTimeLinePerson IN (12, 34)
     * $query->filterByTypetimelineperson(array('min' => 12)); // WHERE typeTimeLinePerson >= 12
     * $query->filterByTypetimelineperson(array('max' => 12)); // WHERE typeTimeLinePerson <= 12
     * </code>
     *
     * @param     mixed $typetimelineperson The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByTypetimelineperson($typetimelineperson = null, $comparison = null)
    {
        if (is_array($typetimelineperson)) {
            $useMinMax = false;
            if (isset($typetimelineperson['min'])) {
                $this->addUsingAlias(PersonPeer::TYPETIMELINEPERSON, $typetimelineperson['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typetimelineperson['max'])) {
                $this->addUsingAlias(PersonPeer::TYPETIMELINEPERSON, $typetimelineperson['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::TYPETIMELINEPERSON, $typetimelineperson, $comparison);
    }

    /**
     * Filter the query on the maxOverQueue column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxoverqueue(1234); // WHERE maxOverQueue = 1234
     * $query->filterByMaxoverqueue(array(12, 34)); // WHERE maxOverQueue IN (12, 34)
     * $query->filterByMaxoverqueue(array('min' => 12)); // WHERE maxOverQueue >= 12
     * $query->filterByMaxoverqueue(array('max' => 12)); // WHERE maxOverQueue <= 12
     * </code>
     *
     * @param     mixed $maxoverqueue The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByMaxoverqueue($maxoverqueue = null, $comparison = null)
    {
        if (is_array($maxoverqueue)) {
            $useMinMax = false;
            if (isset($maxoverqueue['min'])) {
                $this->addUsingAlias(PersonPeer::MAXOVERQUEUE, $maxoverqueue['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxoverqueue['max'])) {
                $this->addUsingAlias(PersonPeer::MAXOVERQUEUE, $maxoverqueue['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::MAXOVERQUEUE, $maxoverqueue, $comparison);
    }

    /**
     * Filter the query on the maxCito column
     *
     * Example usage:
     * <code>
     * $query->filterByMaxcito(1234); // WHERE maxCito = 1234
     * $query->filterByMaxcito(array(12, 34)); // WHERE maxCito IN (12, 34)
     * $query->filterByMaxcito(array('min' => 12)); // WHERE maxCito >= 12
     * $query->filterByMaxcito(array('max' => 12)); // WHERE maxCito <= 12
     * </code>
     *
     * @param     mixed $maxcito The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByMaxcito($maxcito = null, $comparison = null)
    {
        if (is_array($maxcito)) {
            $useMinMax = false;
            if (isset($maxcito['min'])) {
                $this->addUsingAlias(PersonPeer::MAXCITO, $maxcito['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maxcito['max'])) {
                $this->addUsingAlias(PersonPeer::MAXCITO, $maxcito['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::MAXCITO, $maxcito, $comparison);
    }

    /**
     * Filter the query on the quotUnit column
     *
     * Example usage:
     * <code>
     * $query->filterByQuotunit(1234); // WHERE quotUnit = 1234
     * $query->filterByQuotunit(array(12, 34)); // WHERE quotUnit IN (12, 34)
     * $query->filterByQuotunit(array('min' => 12)); // WHERE quotUnit >= 12
     * $query->filterByQuotunit(array('max' => 12)); // WHERE quotUnit <= 12
     * </code>
     *
     * @param     mixed $quotunit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByQuotunit($quotunit = null, $comparison = null)
    {
        if (is_array($quotunit)) {
            $useMinMax = false;
            if (isset($quotunit['min'])) {
                $this->addUsingAlias(PersonPeer::QUOTUNIT, $quotunit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quotunit['max'])) {
                $this->addUsingAlias(PersonPeer::QUOTUNIT, $quotunit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::QUOTUNIT, $quotunit, $comparison);
    }

    /**
     * Filter the query on the academicdegree_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAcademicdegreeId(1234); // WHERE academicdegree_id = 1234
     * $query->filterByAcademicdegreeId(array(12, 34)); // WHERE academicdegree_id IN (12, 34)
     * $query->filterByAcademicdegreeId(array('min' => 12)); // WHERE academicdegree_id >= 12
     * $query->filterByAcademicdegreeId(array('max' => 12)); // WHERE academicdegree_id <= 12
     * </code>
     *
     * @param     mixed $academicdegreeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAcademicdegreeId($academicdegreeId = null, $comparison = null)
    {
        if (is_array($academicdegreeId)) {
            $useMinMax = false;
            if (isset($academicdegreeId['min'])) {
                $this->addUsingAlias(PersonPeer::ACADEMICDEGREE_ID, $academicdegreeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($academicdegreeId['max'])) {
                $this->addUsingAlias(PersonPeer::ACADEMICDEGREE_ID, $academicdegreeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ACADEMICDEGREE_ID, $academicdegreeId, $comparison);
    }

    /**
     * Filter the query on the academicTitle_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAcademictitleId(1234); // WHERE academicTitle_id = 1234
     * $query->filterByAcademictitleId(array(12, 34)); // WHERE academicTitle_id IN (12, 34)
     * $query->filterByAcademictitleId(array('min' => 12)); // WHERE academicTitle_id >= 12
     * $query->filterByAcademictitleId(array('max' => 12)); // WHERE academicTitle_id <= 12
     * </code>
     *
     * @param     mixed $academictitleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByAcademictitleId($academictitleId = null, $comparison = null)
    {
        if (is_array($academictitleId)) {
            $useMinMax = false;
            if (isset($academictitleId['min'])) {
                $this->addUsingAlias(PersonPeer::ACADEMICTITLE_ID, $academictitleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($academictitleId['max'])) {
                $this->addUsingAlias(PersonPeer::ACADEMICTITLE_ID, $academictitleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::ACADEMICTITLE_ID, $academictitleId, $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function filterByUuidId($uuidId = null, $comparison = null)
    {
        if (is_array($uuidId)) {
            $useMinMax = false;
            if (isset($uuidId['min'])) {
                $this->addUsingAlias(PersonPeer::UUID_ID, $uuidId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uuidId['max'])) {
                $this->addUsingAlias(PersonPeer::UUID_ID, $uuidId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PersonPeer::UUID_ID, $uuidId, $comparison);
    }

    /**
     * Filter the query by a related ActionpropertyPerson object
     *
     * @param   ActionpropertyPerson|PropelObjectCollection $actionpropertyPerson  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActionpropertyPerson($actionpropertyPerson, $comparison = null)
    {
        if ($actionpropertyPerson instanceof ActionpropertyPerson) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $actionpropertyPerson->getValue(), $comparison);
        } elseif ($actionpropertyPerson instanceof PropelObjectCollection) {
            return $this
                ->useActionpropertyPersonQuery()
                ->filterByPrimaryKeys($actionpropertyPerson->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionpropertyPerson() only accepts arguments of type ActionpropertyPerson or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionpropertyPerson relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinActionpropertyPerson($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionpropertyPerson');

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
            $this->addJoinObject($join, 'ActionpropertyPerson');
        }

        return $this;
    }

    /**
     * Use the ActionpropertyPerson relation ActionpropertyPerson object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActionpropertyPersonQuery A secondary query class using the current class as primary query
     */
    public function useActionpropertyPersonQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActionpropertyPerson($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionpropertyPerson', '\Webmis\Models\ActionpropertyPersonQuery');
    }

    /**
     * Filter the query by a related Actiontype object
     *
     * @param   Actiontype|PropelObjectCollection $actiontype  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByActiontype($actiontype, $comparison = null)
    {
        if ($actiontype instanceof Actiontype) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $actiontype->getDefaultexecpersonId(), $comparison);
        } elseif ($actiontype instanceof PropelObjectCollection) {
            return $this
                ->useActiontypeQuery()
                ->filterByPrimaryKeys($actiontype->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActiontype() only accepts arguments of type Actiontype or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Actiontype relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinActiontype($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Actiontype');

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
            $this->addJoinObject($join, 'Actiontype');
        }

        return $this;
    }

    /**
     * Use the Actiontype relation Actiontype object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\ActiontypeQuery A secondary query class using the current class as primary query
     */
    public function useActiontypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinActiontype($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Actiontype', '\Webmis\Models\ActiontypeQuery');
    }

    /**
     * Filter the query by a related BlankactionsMoving object
     *
     * @param   BlankactionsMoving|PropelObjectCollection $blankactionsMoving  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsMovingRelatedByCreatepersonId($blankactionsMoving, $comparison = null)
    {
        if ($blankactionsMoving instanceof BlankactionsMoving) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $blankactionsMoving->getCreatepersonId(), $comparison);
        } elseif ($blankactionsMoving instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsMovingRelatedByCreatepersonIdQuery()
                ->filterByPrimaryKeys($blankactionsMoving->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsMovingRelatedByCreatepersonId() only accepts arguments of type BlankactionsMoving or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsMovingRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinBlankactionsMovingRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsMovingRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'BlankactionsMovingRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the BlankactionsMovingRelatedByCreatepersonId relation BlankactionsMoving object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsMovingQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsMovingRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsMovingRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsMovingRelatedByCreatepersonId', '\Webmis\Models\BlankactionsMovingQuery');
    }

    /**
     * Filter the query by a related BlankactionsMoving object
     *
     * @param   BlankactionsMoving|PropelObjectCollection $blankactionsMoving  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsMovingRelatedByModifypersonId($blankactionsMoving, $comparison = null)
    {
        if ($blankactionsMoving instanceof BlankactionsMoving) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $blankactionsMoving->getModifypersonId(), $comparison);
        } elseif ($blankactionsMoving instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsMovingRelatedByModifypersonIdQuery()
                ->filterByPrimaryKeys($blankactionsMoving->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsMovingRelatedByModifypersonId() only accepts arguments of type BlankactionsMoving or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsMovingRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinBlankactionsMovingRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsMovingRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'BlankactionsMovingRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the BlankactionsMovingRelatedByModifypersonId relation BlankactionsMoving object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsMovingQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsMovingRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsMovingRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsMovingRelatedByModifypersonId', '\Webmis\Models\BlankactionsMovingQuery');
    }

    /**
     * Filter the query by a related BlankactionsMoving object
     *
     * @param   BlankactionsMoving|PropelObjectCollection $blankactionsMoving  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsMovingRelatedByPersonId($blankactionsMoving, $comparison = null)
    {
        if ($blankactionsMoving instanceof BlankactionsMoving) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $blankactionsMoving->getPersonId(), $comparison);
        } elseif ($blankactionsMoving instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsMovingRelatedByPersonIdQuery()
                ->filterByPrimaryKeys($blankactionsMoving->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsMovingRelatedByPersonId() only accepts arguments of type BlankactionsMoving or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsMovingRelatedByPersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinBlankactionsMovingRelatedByPersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsMovingRelatedByPersonId');

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
            $this->addJoinObject($join, 'BlankactionsMovingRelatedByPersonId');
        }

        return $this;
    }

    /**
     * Use the BlankactionsMovingRelatedByPersonId relation BlankactionsMoving object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsMovingQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsMovingRelatedByPersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsMovingRelatedByPersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsMovingRelatedByPersonId', '\Webmis\Models\BlankactionsMovingQuery');
    }

    /**
     * Filter the query by a related BlankactionsParty object
     *
     * @param   BlankactionsParty|PropelObjectCollection $blankactionsParty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsPartyRelatedByCreatepersonId($blankactionsParty, $comparison = null)
    {
        if ($blankactionsParty instanceof BlankactionsParty) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $blankactionsParty->getCreatepersonId(), $comparison);
        } elseif ($blankactionsParty instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsPartyRelatedByCreatepersonIdQuery()
                ->filterByPrimaryKeys($blankactionsParty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsPartyRelatedByCreatepersonId() only accepts arguments of type BlankactionsParty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsPartyRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinBlankactionsPartyRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsPartyRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'BlankactionsPartyRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the BlankactionsPartyRelatedByCreatepersonId relation BlankactionsParty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsPartyQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsPartyRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsPartyRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsPartyRelatedByCreatepersonId', '\Webmis\Models\BlankactionsPartyQuery');
    }

    /**
     * Filter the query by a related BlankactionsParty object
     *
     * @param   BlankactionsParty|PropelObjectCollection $blankactionsParty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsPartyRelatedByModifypersonId($blankactionsParty, $comparison = null)
    {
        if ($blankactionsParty instanceof BlankactionsParty) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $blankactionsParty->getModifypersonId(), $comparison);
        } elseif ($blankactionsParty instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsPartyRelatedByModifypersonIdQuery()
                ->filterByPrimaryKeys($blankactionsParty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsPartyRelatedByModifypersonId() only accepts arguments of type BlankactionsParty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsPartyRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinBlankactionsPartyRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsPartyRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'BlankactionsPartyRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the BlankactionsPartyRelatedByModifypersonId relation BlankactionsParty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsPartyQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsPartyRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsPartyRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsPartyRelatedByModifypersonId', '\Webmis\Models\BlankactionsPartyQuery');
    }

    /**
     * Filter the query by a related BlankactionsParty object
     *
     * @param   BlankactionsParty|PropelObjectCollection $blankactionsParty  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlankactionsPartyRelatedByPersonId($blankactionsParty, $comparison = null)
    {
        if ($blankactionsParty instanceof BlankactionsParty) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $blankactionsParty->getPersonId(), $comparison);
        } elseif ($blankactionsParty instanceof PropelObjectCollection) {
            return $this
                ->useBlankactionsPartyRelatedByPersonIdQuery()
                ->filterByPrimaryKeys($blankactionsParty->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlankactionsPartyRelatedByPersonId() only accepts arguments of type BlankactionsParty or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BlankactionsPartyRelatedByPersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinBlankactionsPartyRelatedByPersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BlankactionsPartyRelatedByPersonId');

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
            $this->addJoinObject($join, 'BlankactionsPartyRelatedByPersonId');
        }

        return $this;
    }

    /**
     * Use the BlankactionsPartyRelatedByPersonId relation BlankactionsParty object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\BlankactionsPartyQuery A secondary query class using the current class as primary query
     */
    public function useBlankactionsPartyRelatedByPersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBlankactionsPartyRelatedByPersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BlankactionsPartyRelatedByPersonId', '\Webmis\Models\BlankactionsPartyQuery');
    }

    /**
     * Filter the query by a related Notificationoccurred object
     *
     * @param   Notificationoccurred|PropelObjectCollection $notificationoccurred  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNotificationoccurred($notificationoccurred, $comparison = null)
    {
        if ($notificationoccurred instanceof Notificationoccurred) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $notificationoccurred->getUserid(), $comparison);
        } elseif ($notificationoccurred instanceof PropelObjectCollection) {
            return $this
                ->useNotificationoccurredQuery()
                ->filterByPrimaryKeys($notificationoccurred->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNotificationoccurred() only accepts arguments of type Notificationoccurred or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Notificationoccurred relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinNotificationoccurred($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Notificationoccurred');

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
            $this->addJoinObject($join, 'Notificationoccurred');
        }

        return $this;
    }

    /**
     * Use the Notificationoccurred relation Notificationoccurred object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\NotificationoccurredQuery A secondary query class using the current class as primary query
     */
    public function useNotificationoccurredQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNotificationoccurred($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Notificationoccurred', '\Webmis\Models\NotificationoccurredQuery');
    }

    /**
     * Filter the query by a related PersonTimetemplate object
     *
     * @param   PersonTimetemplate|PropelObjectCollection $personTimetemplate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonTimetemplateRelatedByCreatepersonId($personTimetemplate, $comparison = null)
    {
        if ($personTimetemplate instanceof PersonTimetemplate) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $personTimetemplate->getCreatepersonId(), $comparison);
        } elseif ($personTimetemplate instanceof PropelObjectCollection) {
            return $this
                ->usePersonTimetemplateRelatedByCreatepersonIdQuery()
                ->filterByPrimaryKeys($personTimetemplate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonTimetemplateRelatedByCreatepersonId() only accepts arguments of type PersonTimetemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonTimetemplateRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinPersonTimetemplateRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonTimetemplateRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'PersonTimetemplateRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the PersonTimetemplateRelatedByCreatepersonId relation PersonTimetemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonTimetemplateQuery A secondary query class using the current class as primary query
     */
    public function usePersonTimetemplateRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonTimetemplateRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonTimetemplateRelatedByCreatepersonId', '\Webmis\Models\PersonTimetemplateQuery');
    }

    /**
     * Filter the query by a related PersonTimetemplate object
     *
     * @param   PersonTimetemplate|PropelObjectCollection $personTimetemplate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonTimetemplateRelatedByMasterId($personTimetemplate, $comparison = null)
    {
        if ($personTimetemplate instanceof PersonTimetemplate) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $personTimetemplate->getMasterId(), $comparison);
        } elseif ($personTimetemplate instanceof PropelObjectCollection) {
            return $this
                ->usePersonTimetemplateRelatedByMasterIdQuery()
                ->filterByPrimaryKeys($personTimetemplate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonTimetemplateRelatedByMasterId() only accepts arguments of type PersonTimetemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonTimetemplateRelatedByMasterId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinPersonTimetemplateRelatedByMasterId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonTimetemplateRelatedByMasterId');

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
            $this->addJoinObject($join, 'PersonTimetemplateRelatedByMasterId');
        }

        return $this;
    }

    /**
     * Use the PersonTimetemplateRelatedByMasterId relation PersonTimetemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonTimetemplateQuery A secondary query class using the current class as primary query
     */
    public function usePersonTimetemplateRelatedByMasterIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPersonTimetemplateRelatedByMasterId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonTimetemplateRelatedByMasterId', '\Webmis\Models\PersonTimetemplateQuery');
    }

    /**
     * Filter the query by a related PersonTimetemplate object
     *
     * @param   PersonTimetemplate|PropelObjectCollection $personTimetemplate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPersonTimetemplateRelatedByModifypersonId($personTimetemplate, $comparison = null)
    {
        if ($personTimetemplate instanceof PersonTimetemplate) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $personTimetemplate->getModifypersonId(), $comparison);
        } elseif ($personTimetemplate instanceof PropelObjectCollection) {
            return $this
                ->usePersonTimetemplateRelatedByModifypersonIdQuery()
                ->filterByPrimaryKeys($personTimetemplate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPersonTimetemplateRelatedByModifypersonId() only accepts arguments of type PersonTimetemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PersonTimetemplateRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinPersonTimetemplateRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PersonTimetemplateRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'PersonTimetemplateRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the PersonTimetemplateRelatedByModifypersonId relation PersonTimetemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\PersonTimetemplateQuery A secondary query class using the current class as primary query
     */
    public function usePersonTimetemplateRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPersonTimetemplateRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PersonTimetemplateRelatedByModifypersonId', '\Webmis\Models\PersonTimetemplateQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionRelatedByCreatepersonId($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockmotion->getCreatepersonId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionRelatedByCreatepersonIdQuery()
                ->filterByPrimaryKeys($stockmotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionRelatedByCreatepersonId() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockmotionRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'StockmotionRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the StockmotionRelatedByCreatepersonId relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionRelatedByCreatepersonId', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionRelatedByModifypersonId($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockmotion->getModifypersonId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionRelatedByModifypersonIdQuery()
                ->filterByPrimaryKeys($stockmotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionRelatedByModifypersonId() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockmotionRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'StockmotionRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the StockmotionRelatedByModifypersonId relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionRelatedByModifypersonId', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionRelatedByReceiverpersonId($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockmotion->getReceiverpersonId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionRelatedByReceiverpersonIdQuery()
                ->filterByPrimaryKeys($stockmotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionRelatedByReceiverpersonId() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionRelatedByReceiverpersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockmotionRelatedByReceiverpersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionRelatedByReceiverpersonId');

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
            $this->addJoinObject($join, 'StockmotionRelatedByReceiverpersonId');
        }

        return $this;
    }

    /**
     * Use the StockmotionRelatedByReceiverpersonId relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionRelatedByReceiverpersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionRelatedByReceiverpersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionRelatedByReceiverpersonId', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Stockmotion object
     *
     * @param   Stockmotion|PropelObjectCollection $stockmotion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockmotionRelatedBySupplierpersonId($stockmotion, $comparison = null)
    {
        if ($stockmotion instanceof Stockmotion) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockmotion->getSupplierpersonId(), $comparison);
        } elseif ($stockmotion instanceof PropelObjectCollection) {
            return $this
                ->useStockmotionRelatedBySupplierpersonIdQuery()
                ->filterByPrimaryKeys($stockmotion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockmotionRelatedBySupplierpersonId() only accepts arguments of type Stockmotion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockmotionRelatedBySupplierpersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockmotionRelatedBySupplierpersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockmotionRelatedBySupplierpersonId');

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
            $this->addJoinObject($join, 'StockmotionRelatedBySupplierpersonId');
        }

        return $this;
    }

    /**
     * Use the StockmotionRelatedBySupplierpersonId relation Stockmotion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockmotionQuery A secondary query class using the current class as primary query
     */
    public function useStockmotionRelatedBySupplierpersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockmotionRelatedBySupplierpersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockmotionRelatedBySupplierpersonId', '\Webmis\Models\StockmotionQuery');
    }

    /**
     * Filter the query by a related Stockrecipe object
     *
     * @param   Stockrecipe|PropelObjectCollection $stockrecipe  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipeRelatedByCreatepersonId($stockrecipe, $comparison = null)
    {
        if ($stockrecipe instanceof Stockrecipe) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockrecipe->getCreatepersonId(), $comparison);
        } elseif ($stockrecipe instanceof PropelObjectCollection) {
            return $this
                ->useStockrecipeRelatedByCreatepersonIdQuery()
                ->filterByPrimaryKeys($stockrecipe->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrecipeRelatedByCreatepersonId() only accepts arguments of type Stockrecipe or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrecipeRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockrecipeRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrecipeRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'StockrecipeRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the StockrecipeRelatedByCreatepersonId relation Stockrecipe object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrecipeRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrecipeRelatedByCreatepersonId', '\Webmis\Models\StockrecipeQuery');
    }

    /**
     * Filter the query by a related Stockrecipe object
     *
     * @param   Stockrecipe|PropelObjectCollection $stockrecipe  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrecipeRelatedByModifypersonId($stockrecipe, $comparison = null)
    {
        if ($stockrecipe instanceof Stockrecipe) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockrecipe->getModifypersonId(), $comparison);
        } elseif ($stockrecipe instanceof PropelObjectCollection) {
            return $this
                ->useStockrecipeRelatedByModifypersonIdQuery()
                ->filterByPrimaryKeys($stockrecipe->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrecipeRelatedByModifypersonId() only accepts arguments of type Stockrecipe or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrecipeRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockrecipeRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrecipeRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'StockrecipeRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the StockrecipeRelatedByModifypersonId relation Stockrecipe object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrecipeQuery A secondary query class using the current class as primary query
     */
    public function useStockrecipeRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrecipeRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrecipeRelatedByModifypersonId', '\Webmis\Models\StockrecipeQuery');
    }

    /**
     * Filter the query by a related Stockrequisition object
     *
     * @param   Stockrequisition|PropelObjectCollection $stockrequisition  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionRelatedByCreatepersonId($stockrequisition, $comparison = null)
    {
        if ($stockrequisition instanceof Stockrequisition) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockrequisition->getCreatepersonId(), $comparison);
        } elseif ($stockrequisition instanceof PropelObjectCollection) {
            return $this
                ->useStockrequisitionRelatedByCreatepersonIdQuery()
                ->filterByPrimaryKeys($stockrequisition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrequisitionRelatedByCreatepersonId() only accepts arguments of type Stockrequisition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrequisitionRelatedByCreatepersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockrequisitionRelatedByCreatepersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrequisitionRelatedByCreatepersonId');

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
            $this->addJoinObject($join, 'StockrequisitionRelatedByCreatepersonId');
        }

        return $this;
    }

    /**
     * Use the StockrequisitionRelatedByCreatepersonId relation Stockrequisition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionRelatedByCreatepersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrequisitionRelatedByCreatepersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrequisitionRelatedByCreatepersonId', '\Webmis\Models\StockrequisitionQuery');
    }

    /**
     * Filter the query by a related Stockrequisition object
     *
     * @param   Stockrequisition|PropelObjectCollection $stockrequisition  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockrequisitionRelatedByModifypersonId($stockrequisition, $comparison = null)
    {
        if ($stockrequisition instanceof Stockrequisition) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $stockrequisition->getModifypersonId(), $comparison);
        } elseif ($stockrequisition instanceof PropelObjectCollection) {
            return $this
                ->useStockrequisitionRelatedByModifypersonIdQuery()
                ->filterByPrimaryKeys($stockrequisition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockrequisitionRelatedByModifypersonId() only accepts arguments of type Stockrequisition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockrequisitionRelatedByModifypersonId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinStockrequisitionRelatedByModifypersonId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockrequisitionRelatedByModifypersonId');

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
            $this->addJoinObject($join, 'StockrequisitionRelatedByModifypersonId');
        }

        return $this;
    }

    /**
     * Use the StockrequisitionRelatedByModifypersonId relation Stockrequisition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Webmis\Models\StockrequisitionQuery A secondary query class using the current class as primary query
     */
    public function useStockrequisitionRelatedByModifypersonIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStockrequisitionRelatedByModifypersonId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockrequisitionRelatedByModifypersonId', '\Webmis\Models\StockrequisitionQuery');
    }

    /**
     * Filter the query by a related Takentissuejournal object
     *
     * @param   Takentissuejournal|PropelObjectCollection $takentissuejournal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PersonQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTakentissuejournal($takentissuejournal, $comparison = null)
    {
        if ($takentissuejournal instanceof Takentissuejournal) {
            return $this
                ->addUsingAlias(PersonPeer::ID, $takentissuejournal->getExecpersonId(), $comparison);
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
     * @return PersonQuery The current query, for fluid interface
     */
    public function joinTakentissuejournal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTakentissuejournalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTakentissuejournal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Takentissuejournal', '\Webmis\Models\TakentissuejournalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Person $person Object to remove from the list of results
     *
     * @return PersonQuery The current query, for fluid interface
     */
    public function prune($person = null)
    {
        if ($person) {
            $this->addUsingAlias(PersonPeer::ID, $person->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
