<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
	protected $table = "buses";
	
    public function routes()
    {
        return $this->hasMany('App\Route');
    }

    public function agent()
    {
    	return $this->belongsTo('App\Agent');
    }

    public function park()
    {
        return $this->belongsTo('App\Park');
    }
}
