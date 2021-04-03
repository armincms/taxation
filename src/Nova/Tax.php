<?php

namespace Armincms\Taxation\Nova;

use Illuminate\Http\Request; 
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\{ID, Text, Number, Boolean, HasMany};
use Armincms\Fields\Targomaan;

class Tax extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Armincms\Taxation\Models\TaxationTax::class;  

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
                Text::make(__('Tax name'), 'name')
                    ->help(__('Tax name to display in carts and on invoices'))
                    ->required()
                    ->rules('required'),
            ]), 

            Number::make(__('Tax Rate'), 'rate')
                ->step(0.1)
                ->max(99.99)
                ->required()
                ->rules('required', 'max:99.99')
                ->help(__('Format: XX.XX')),

            Boolean::make(__('Active'), 'active'),

            // HasMany::make(__('Values'), 'values', TaxValue::class),
        ];
    }

    /**
     * Return the location to redirect the user after creation.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return string
     */
    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }

    /**
     * Return the location to redirect the user after update.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Nova\Resource  $resource
     * @return string
     */
    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/'.static::uriKey();
    }
}
