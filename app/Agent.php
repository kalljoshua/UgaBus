<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public function buses()
    {
        return $this->hasMany('App\Bus');
    }
}
