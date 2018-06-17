<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Route;
use App\Booking;


class HomeController extends Controller
{
	public function __construct(){
       parent::__construct();
    }
	
    function index(){
    	$routes = Route::orderBy('id','DESC')->take(2)->get();
    	return view('user.index')
    	->with('routes',$routes);
    }
}
