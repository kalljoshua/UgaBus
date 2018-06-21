<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    function buses(){
        return $this->hasMany('App\Bus');
    }
}
