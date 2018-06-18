<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Agent;
use App\Booking;
use Input, Redirect;

class AgentProfileController extends Controller
{
    function agentAccount($name){
    	$user= Agent::where('last_name',$name)
        ->where('id',Auth::guard('agent')->user()->id)->first();
        $user_email = Auth::guard('agent')->user()->email;
        $bookings = Booking::where('user_id',1)->get();
        if($user->email == $user_email)
        return view('agent.agent-account')
        ->with('bookings',$bookings)
        ->with('user',$user);
    	
    }
}
