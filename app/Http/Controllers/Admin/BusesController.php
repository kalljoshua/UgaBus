<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Bus;
use App\Park;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusesController extends Controller
{
    function getAllBuses(){
        $buses = Bus::all();
        return view('admin.buses')->with('buses', $buses);
    }

    function createBus(Request $request){
        $agents = Agent::all();
        $parks = Park::all();

        return view('admin.create_new_bus')->with('agents',$agents)
            ->with('parks',$parks);
    }

    function save(Request $request){
        $is_agent = false;
        $is_park = false;
        $is_route = false;

        $make = $request->input('make');
        $model = $request->input('model');
        $license_plate_number = $request->input('license_plate_number');
        $primary_color = $request->input('primary_color');
        $secondary_color = $request->input('secondary_color');
        $agent_id = $request->input('agent_id');
        $company = $request->input('company');
        $park_id = $request->input('park_id');
        $travel_from = $request->input('travel_from');
        $travel_to = $request->input('travel_to');
        $seat_price = $request->input('seat_price');
        $dep_time = $request->input('dep_time');
        $arr_time = $request->input('arr_time');
        $publish = $request->input('publish');

        if($travel_from != ''){
            $is_route = true;
        }


        $agent = Agent::find($agent_id);
        if($agent){
            $is_agent = true;
        }else{
            return "No such agent in the system";
        }

        $park = Park::find($park_id);
        if($park){
            $is_park = true;
        }else{
            return "No such park in the system";
        }

        if($is_agent && $is_park){
            $bus = new Bus();
            $bus->agent_id = $agent_id;
            $bus->park_id = $park_id;
            $bus->license_plate_number = $license_plate_number;
            $bus->primary_color = $primary_color;
            $bus->secondary_color = $secondary_color;
            $bus->model = $model;
            $bus->make = $make;

            if($bus->save()){
                if($is_route){
                    $route = new Route();
                    $route->bus_id = $bus->id;
                    $route->travel_from = $travel_from;
                    $route->travel_to = $travel_to;
                    $route->time_of_departure = $dep_time;
                    $route->estimated_time_of_arrival = $arr_time;
                    $route->unit_seat_price = $seat_price;

                    if($route->save()){
                        //Bus route saved
                    }else{
                        return "Error saving bus route";
                    }
                }
            }
        }else{
            return "No such agent and park in the system";
        }

        $buses = Bus::all();
        return view('admin.buses')->with('buses', $buses);

    }
}
