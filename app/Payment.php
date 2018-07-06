<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    function booking(){
        return $this->belongsTo('App\Booking');
    }
}
