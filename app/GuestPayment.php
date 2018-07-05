<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestPayment extends Model
{
    function guestBooking(){
        return $this->belongsTo('App\GuestBooking');
    }

}
