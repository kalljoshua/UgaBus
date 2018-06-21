<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Route;
use App\Booking;
use App\UserTravelStory;


class HomeController extends Controller
{
	public function __construct(){
       parent::__construct();
    }
	
    function index(){
    	$routes = Route::orderBy('id','DESC')->take(2)->get();
    	$stories = UserTravelStory::orderBy('created_at','DESC')->take(8)->get();
    	return view('user.index')
    	->with('stories',$stories)
    	->with('routes',$routes);
    }
}
