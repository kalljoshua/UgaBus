<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTravelStory extends Model
{

    protected $table = 'user_travel _stories';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
