<?php

namespace Armincms\Taxation\Models;
      

class TaxationTax extends Model  
{ 	
	/**
	 * Query the related StoreFeatureValue.
	 * 
	 * @return \Illuminate\Database\Eloqeunt\Builder
	 */
	public function rules()
	{
		return $this->belongsToMany(TaxationRules::class);
	}
}
