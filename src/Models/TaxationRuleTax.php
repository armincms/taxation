<?php

namespace Armincms\Taxation\Models; 

use Armincms\Location\Concerns\QueriesCountryRelationship;

class TaxationRuleTax extends Model  
{ 	
	use QueriesCountryRelationship;
	
	/**
	 * Query the related TaxationRule.
	 * 
	 * @return \Illuminate\Database\Eloqeunt\Relations\BelongsTo
	 */
	public function rule()
	{
		return $this->belongsTo(TaxationRule::class);
	}

	/**
	 * Query the related TaxationRule.
	 * 
	 * @return \Illuminate\Database\Eloqeunt\Relations\BelongsTo
	 */
	public function tax()
	{
		return $this->belongsTo(TaxationTax::class);
	}
}
