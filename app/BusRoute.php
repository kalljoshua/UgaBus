<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{

    protected $table = "bus_routes";

    public function bus()
    {
        return $this->belongsTo('App\Bus','bus_id');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function images(){
        return $this->hasMany('App\ServiceImage');
    }
    public function bookings(){
        return $this->hasMany('App\Booking');
    }
}
