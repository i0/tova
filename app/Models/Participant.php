<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Scopes\UserScope;

class Participant extends Model
{
    protected $table = 'participants';
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new UserScope);
    }
    public function group(){
      return $this->belongsTo('App\Models\Group');
    }
    public function results(){
      return $this->hasMany('App\Models\Result');
    }
}
