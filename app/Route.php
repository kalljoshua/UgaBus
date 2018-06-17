<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $table = "routes";

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
