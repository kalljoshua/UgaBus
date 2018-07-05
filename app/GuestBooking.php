<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestBooking extends Model
{
    function route(){
        return $this->belongsTo('App\Route');
    }
}
