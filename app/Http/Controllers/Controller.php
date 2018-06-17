<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Bus;
use App\Booking;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
       	
    	$buses = Bus::orderBy('id','DESC')->take(7)->get();
    	$route_id = Booking::select('route_id')->groupBy('route_id')
    	->orderByRaw('COUNT(*) DESC')->take(7)->get();


       View::share ( 'buses',$buses );
       View::share ( 'route_id',$route_id );
    }  
}
