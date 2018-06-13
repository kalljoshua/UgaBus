<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function busroute()
    {
        return $this->belongsTo('App\BusRoute','bus_route_id');
    }
}
