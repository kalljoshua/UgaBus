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

    public $buses = '';

    public function __construct() {
       	
    	$this->buses = Bus::orderBy('id','DESC')->take(7)->get();
    	$route_id = Booking::select('route_id')->groupBy('route_id')
    	->orderByRaw('COUNT(*) DESC')->take(7)->get();


       View::share ( 'buses',$this->buses );
       View::share ( 'route_id',$route_id );
    }  
}
