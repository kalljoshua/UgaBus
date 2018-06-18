<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
	use Notifiable;

    protected $guard = 'agent';

    public function buses()
    {
        return $this->hasMany('App\Bus');
    }
}
