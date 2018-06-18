<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input, Redirect;
use App\Route;

class RoutesController extends Controller
{
    function allRoutes(){
    	$routes = Route::paginate(6);
    	return view('user.all-routes')
    	->with('routes',$routes);
    }
}
