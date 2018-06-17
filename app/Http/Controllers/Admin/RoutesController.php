<?php

namespace App\Http\Controllers\Admin;

use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutesController extends Controller
{
    function getAllRoutes(){
        $routes = Route::all();
        return view('admin.routes')->with('routes', $routes);
    }
}
