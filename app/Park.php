<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    public function buses()
    {
        return $this->hasMany('App\Bus');
    }
}
