<?php

namespace Armincms\Taxation\Nova;

use Illuminate\Http\Request; 
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\{ID, Text, Select, BelongsTo}; 
use Armincms\Location\Nova\Country;
use Armincms\Fields\Targomaan;
use Armincms\Taxation\Helper;

class RuleTax extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Armincms\Taxation\Models\TaxationRuleTax::class;  

    /**
     * Indicates if the resource should be globally searchable.
     *
     * @var bool
     */
    public static $globallySearchable = false; 

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

            BelongsTo::make(__('Rule'), 'rule', Rule::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->required()
                ->rules('required'), 

            BelongsTo::make(__('Country'), 'country', Country::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->required()
                ->rules('required'),

            BelongsTo::make(__('Tax'), 'tax', Tax::class)
                ->showCreateRelationButton()
                ->withoutTrashed()
                ->required()
                ->rules('required'),

            Select::make(__('Tax Behavior'), 'behavior')
                ->options(Helper::taxRuleBehaviors())
                ->displayUsingLabels()
                ->required()
                ->rules('required'),

            Targomaan::make([
                Text::make(__('Description'), 'description'),
            ]), 
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
        return '/resources/'.($request->viaResource ?: static::uriKey()).'/'.($request->viaResourceId);
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
        return '/resources/'.($request->viaResource ?: static::uriKey()).'/'.($request->viaResourceId);
    } 
}
