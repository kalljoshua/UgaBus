<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input, Redirect;
use App\BusRoute;

class SearchController extends Controller
{
    function search(Request $request){
    	if(!empty($request)){

    	$departure = $request->input('departure');
        $destination = $request->input('destination');
        $date = $request->input('date');
        $day = date('D', strtotime($date));
        $seats = $request->input('seats');

        //search based on depaature-city
        if ($departure && !$destination && !$date) {
            $routes = BusRoute::where('travelfrom', $departure)
                //->where('active', 1)
                ->paginate(5);
            if ($routes->count() > 0) {
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            } else {
                flash('No results found for this search')->error();
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            }
        }
        
        //search based on destination-city
        if (!$departure && $destination && !$date) {
            $routes = BusRoute::where('travelto', $destination)
                //->where('active', 1)
                ->paginate(5);
            if ($routes->count() > 0) {
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            } else {
                flash('No results found for this search')->error();
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            }
        }

        //search based on date
        if (!$departure && !$destination && $date) {
            $routes = BusRoute::where($day, 'yes')
                //->where('active', 1)
                ->paginate(5);
            if ($routes->count() > 0) {
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            } else {
                flash('No results found for this search')->error();
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            }
        }
        
        if ($departure && $destination && $date) {
            $routes=BusRoute::where('travelfrom', $departure)
                ->where('travelto', $destination)
                ->where($day, 'yes')
                //->where('active', 1)
                ->paginate(5);
                //return $routes;
            if ($routes->count() > 0) {
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            } else {
                flash('No results found for this search')->error();
                return view('user.search-results', ['routes' => $routes, 'seats' => $seats]);
            }
        }
        if (!$departure && !$destination && !$date) {
            flash('Search fields you provided are empty')->warning();
            return redirect()->back();
        }

    	}else{
    		flash('Wrong Email or password. Try again later!')->error();
            return Redirect::back()->withInput(Input::all());
    	}
    	
    }
}