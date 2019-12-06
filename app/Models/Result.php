<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\UserScope;

class Result extends Model
{
    protected $table = 'results';
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserScope);
    }
}
