<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusController extends Controller
{
    function busDetails()
    {
    	return view('user.bus-details');
    }
}
