<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function route(){
    	return $this->belongsTo('App\Route');
    }

    public function replies(){
    	return $this->hasMany('App\ComplaintReply');
    }
}
