<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Route;
use App\Booking;

class BusController extends Controller
{
	public function __construct(){
       parent::__construct();
    }

    function busDetails()
    {
    	return view('user.bus-details');
    }
}
