<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    public function bus()
    {
        return $this->belongsTo('App\Bus');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function bookings(){
        return $this->hasMany('App\Booking');
    }
}
