<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusBookingController extends Controller
{
    function busBooking()
    {
    	return view('user.bus-booking');
    }

    function busDetails()
    {
    	return view('user.bus-details');
    }


    function paymentReciept(){
    	return view('user.payment-reciept');
    }
}
