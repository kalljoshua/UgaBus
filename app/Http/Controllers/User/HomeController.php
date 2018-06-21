<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bus;
use App\Route;
use App\Booking;
use App\Faq;
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

    function faq(){

        $faqs = Faq::all();
        return view('user.faqs')
        ->with('faqs',$faqs);
    }

    function about(){
        return view('user.about-us');
    }

    function privacy(){
        return view('user.privacy-policy');
    }

    function terms(){
        return view('user.terms-of-use');
    }
}
