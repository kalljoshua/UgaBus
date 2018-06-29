<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
	protected $table = "buses";
	
    public function routes()
    {
        return $this->hasMany('App\Route');
    }

    public function agent()
    {
    	return $this->belongsTo('App\Agent');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function park()
    {
        return $this->belongsTo('App\Park');
    }

}
