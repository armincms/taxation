<?php

namespace Armincms\Taxation;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider; 
use Laravel\Nova\Nova as LaravelNova; 

class Helper  
{  
    /**
     * Returns array of tax rules behavior.
     *
     * @return array
     */
    public static function taxRuleBehaviors(): array
    {
        return [
            'only' => __('Only This Tax'),
            'combine' => __('Combine Taxes'),
            'all' => __('One After Another'),
        ];
    } 
}
