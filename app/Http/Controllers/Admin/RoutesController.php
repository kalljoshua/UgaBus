<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Bus;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutesController extends Controller
{
    function getAllRoutes()
    {
        $routes = Route::all();
        return view('admin.routes')->with('routes', $routes);
    }

    function create()
    {
        $buses = Bus::all();
        return view('admin.create_new_route')->with('buses', $buses)
            ->with('selected_bus', false);
    }

    function save(Request $request)
    {
        $bus = $request->input('bus');
        $driver_name = $request->input('driver_name');
        $start_point = $request->input('start_point');
        $end_point = $request->input('end_point');
        $monday = $request->input('monday');
        $tuesday = $request->input('tuesday');
        $wednesday = $request->input('wednesday');
        $thursday = $request->input('thursday');
        $friday = $request->input('friday');
        $saturday = $request->input('saturday');
        $sunday = $request->input('sunday');
        $travel_period = $request->input('travel_period');
        $departure_time = $request->input('departure_time');
        $arrival_time = $request->input('arrival_time');
        $seat_price = $request->input('seat_price');
        $currency = $request->input('currency');

        $route = new Route();
        $route->bus_id = $bus;
        $route->driver_full_name = $driver_name;
        $route->travel_from = $start_point;
        $route->travel_to = $end_point;
        $route->travel_period = $travel_period;
        $route->time_of_departure = $departure_time;
        $route->estimated_time_of_arrival = $arrival_time;
        $route->unit_seat_price = $seat_price;
        $route->currency = $currency;
        if ($monday) {
            $route->monday = 1;
        }

        if ($tuesday) {
            $route->tuesday = 1;
        }

        if ($wednesday) {
            $route->wednesday = 1;
        }

        if ($thursday) {
            $route->thursday = 1;
        }

        if ($friday) {
            $route->friday = 1;
        }

        if ($saturday) {
            $route->saturday = 1;
        }

        if ($sunday) {
            $route->sunday = 1;
        }

        if ($route->save()) {
            flash('Route details saved successfully!');
            return redirect('/admin/routes');
        } else {
            flash('Failed saving details!')->error();
            return redirect('/admin/routes');
        }

    }

    function edit($id)
    {
        $route = Route::find($id);
        $buses = Bus::where('id', '<>', $route->bus_id)
            ->get();
        return view('admin.edit_route_details')
            ->with('route', $route)
            ->with('buses', $buses);
    }

    function update(Request $request)
    {

        $id = $request->input('id');
        $bus = $request->input('bus');
        $driver_name = $request->input('driver_name');
        $start_point = $request->input('start_point');
        $end_point = $request->input('end_point');
        $monday = $request->input('monday');
        $tuesday = $request->input('tuesday');
        $wednesday = $request->input('wednesday');
        $thursday = $request->input('thursday');
        $friday = $request->input('friday');
        $saturday = $request->input('saturday');
        $sunday = $request->input('sunday');
        $travel_period = $request->input('travel_period');
        $departure_time = $request->input('departure_time');
        $arrival_time = $request->input('arrival_time');
        $seat_price = $request->input('seat_price');
        $currency = $request->input('currency');

        $route = Route::find($id);

        if ($bus != '' && $route->bus_id != $bus)
            $route->bus_id = $bus;

        if ($driver_name != '' && $route->driver_full_name != $driver_name)
            $route->driver_full_name = $driver_name;

        if ($start_point != '' && $route->travel_from != $start_point)
            $route->travel_from = $start_point;

        if ($end_point != '' && $route->travel_to != $end_point)
            $route->travel_to = $end_point;

        if ($travel_period != '' && $route->travel_period != $travel_period)
            $route->travel_period = $travel_period;

        if ($departure_time != '' && $route->time_of_departure != $departure_time)
            $route->time_of_departure = $departure_time;

        if ($arrival_time != '' && $route->estimated_time_of_arrival != $arrival_time)
            $route->estimated_time_of_arrival = $arrival_time;

        if ($seat_price != '' && $route->unit_seat_price != $seat_price)
            $route->unit_seat_price = $seat_price;

        if ($currency != '' && $route->currency != $currency)
            $route->currency = $currency;



        if ($monday) {
            $route->monday = 1;
        }else{
            $route->monday = 0;
        }


        if ($tuesday) {
            $route->tuesday = 1;
        }else{
            $route->tuesday = 0;
        }

        if ($wednesday) {
            $route->wednesday = 1;
        }else{
            $route->wednesday = 0;
        }

        if ($thursday) {
            $route->thursday = 1;
        }else{
            $route->thursday = 0;
        }

        if ($friday) {
            $route->friday = 1;
        }else{
            $route->friday = 0;
        }

        if ($saturday) {
            $route->saturday = 1;
        }else{
            $route->saturday = 0;
        }

        if ($sunday) {
            $route->sunday = 1;
        }else{
            $route->sunday = 0;
        }

        if ($route->save()) {
            flash('Changes saved successfully!');
            return redirect('/admin/routes/' . $route->id . '/edit');
        } else {
            flash('Failed saving changes!')->error();
            return redirect('/admin/routes/' . $route->id . '/edit');
        }
    }

    function delete($id)
    {
        $route = Route::find($id);

        if ($route->delete()) {
            flash('Route deleted!');
            return redirect('/admin/routes');
        } else {
            flash('Error deleting route!')->error();
            return redirect('/admin/routes');
        }

    }

}
