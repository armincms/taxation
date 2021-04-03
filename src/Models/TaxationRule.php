<?php

namespace Armincms\Taxation\Models;


class TaxationRule extends Model  
{ 	
	/**
	 * Query the related StoreFeatureValue.
	 * 
	 * @return \Illuminate\Database\Eloqeunt\Relations\HasOneOrMany
	 */
	public function taxes()
	{
		return $this->hasMany(TaxationRuleTax::class, 'rule_id');
	}
}
