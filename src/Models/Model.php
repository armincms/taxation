<?php

namespace Armincms\Taxation\Models;

use Illuminate\Database\Eloquent\{Model as LaravelModel, SoftDeletes};  
use Armincms\Targomaan\Concerns\InteractsWithTargomaan;
use Armincms\Targomaan\Contracts\Translatable;    

class Model extends LaravelModel implements Translatable
{
    use SoftDeletes, InteractsWithTargomaan;  
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'json', 
    ];  
}
