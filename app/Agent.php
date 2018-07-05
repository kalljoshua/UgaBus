<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Authenticatable
{
	use Notifiable;
	//use SoftDeletes;

    //protected $dates = ['deleted_at'];

    protected $guard = 'agent';

    public function buses()
    {
        return $this->hasMany('App\Bus');
    }
}
