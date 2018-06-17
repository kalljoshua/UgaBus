<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    function user(){
        return $this->belongsTo('App\User');
    }

    public function route()
    {
        return $this->belongsTo('App\Route');
    }
}
