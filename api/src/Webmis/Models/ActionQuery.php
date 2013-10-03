<?php

namespace Webmis\Models;

use Webmis\Models\om\BaseActionQuery;


/**
 * Skeleton subclass for performing query and update operations on the 'Action' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Models
 */
class ActionQuery extends BaseActionQuery
{
	public function getProperties()
	{
		return $this->useActionPropertyQuery('ActionProperty', 'left join')
						->useActionPropertyTypeQuery('apt', 'join')
							->orderByIdx()
						->endUse()
						->useActionPropertyStringQuery('string', 'left join')
						->endUse()
						->useActionPropertyDoubleQuery('double', 'left join')
						->endUse()
						->useActionPropertyDateQuery('date', 'left join')
						->endUse()
						->useActionPropertyFDRecordQuery('fdir', 'left join')
							// ->useFDFieldValueQuery()
							// ->endUse()
						->endUse()
					->endUse();
					// ->groupBy('id');
	}

	public function filterByPatientId($patientId)
	{
			return $this->_if($patientId)
							->useEventQuery()
								->filterByClientId($patientId)
							->endUse()
						->_endif();
	}

	public function onlyTherapy()
	{
		return $this->useActionTypeQuery()
						->filterByFlatCode('therapy')
					->endUse();
	}


	public function onlyWithTherapyProperties()
	{
		return $this->useActionPropertyQuery()
						->useActionPropertyTypeQuery()
							->filterByCode(array('therapyTitle'))
						->endUse()
					->endUse();
	}


}
