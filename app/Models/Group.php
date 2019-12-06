<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\UserScope;

class Group extends Model
{
    protected $table = 'groups';
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserScope);
    }
    public function participants(){
        return $this->hasMany('App\Models\Participant');
    }
}
