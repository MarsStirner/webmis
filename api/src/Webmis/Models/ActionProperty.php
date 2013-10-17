<?php

namespace Webmis\Models;

use Webmis\Models\om\BaseActionProperty;


/**
 * Skeleton subclass for representing a row from the 'ActionProperty' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Models
 */
class ActionProperty extends BaseActionProperty
{
	    public function getActionPropertyString(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aActionPropertyString === null && ($this->id !== null) && $doQuery) {
            $this->aActionPropertyString = ActionPropertyStringQuery::create()
                ->filterByActionProperty($this) // here
                ->findOne($con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            //$this->aActionPropertyString->setActionProperty($this);
        }

        return $this->aActionPropertyString;
    }


        public function getActionPropertyDouble(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aActionPropertyDouble === null && ($this->id !== null) && $doQuery) {
            $this->aActionPropertyDouble = ActionPropertyDoubleQuery::create()
                ->filterByActionProperty($this) // here
                ->findOne($con);
            // Because this foreign key represents a one-to-one relationship, we will create a bi-directional association.
            //$this->aActionPropertyDouble->setActionProperty($this);
        }

        return $this->aActionPropertyDouble;
    }
}
