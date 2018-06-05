<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
	protected $table = "buses";
	
    public function routes()
    {
        return $this->hasMany('App\BusRoute', 'bus_id');
    }
}
