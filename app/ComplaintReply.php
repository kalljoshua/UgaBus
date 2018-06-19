<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintReply extends Model
{
    protected $table = "complaint_reply";

    public function complaint(){
    	return $this->belongsTo('App\Complaint');
    }
}
