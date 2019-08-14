<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $guarded= [];
    
    public function jobs(){
    	return $this->hasMany('App\job');
    }
    public function getRouteKeyName(){
    	return'slug';
    }
}
