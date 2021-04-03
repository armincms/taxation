<?php

namespace Armincms\Taxation\Nova;

use Illuminate\Http\Request; 
use Laravel\Nova\Fields\{ID, Text, Boolean, hasMany};
use Armincms\Fields\Targomaan;

class Rule extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Armincms\Taxation\Models\TaxationRule::class;  

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    { 
        return [
            ID::make(__('ID'), 'id')->sortable(), 

            Targomaan::make([
                Text::make(__('Tax Rule Name'), 'name')
                    ->required()
                    ->rules('required'),
            ]),

            Boolean::make(__('Activate The Rule'), 'active'), 

            hasMany::make(__('Rule Taxes'), 'taxes', RuleTax::class)
        ];
    }
}
