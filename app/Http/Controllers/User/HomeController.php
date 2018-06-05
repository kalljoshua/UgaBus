<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\BusRoute;


class HomeController extends Controller
{
    function index(){
    	$routes = BusRoute::orderBy('id','DESC')->take(3)->get();
    	return view('user.index')
    	->with('routes',$routes);
    }
}
