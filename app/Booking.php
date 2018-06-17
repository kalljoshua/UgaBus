<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function route()
    {
        return $this->belongsTo('App\Route');
    }
}
