<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Bus;
use App\Company;
use App\Park;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusesController extends Controller
{

    function getAllBuses()
    {
        $buses = Bus::all();
        return view('admin.buses')->with('buses', $buses);
    }

    function createBus(Request $request)
    {
        $agents = Agent::all();
        $companies = Company::all();

        return view('admin.create_new_bus')->with('agents', $agents)
            ->with('companies', $companies);
    }

    function save(Request $request)
    {
        //Move Uploaded File
        $destinationPath = public_path() . '/bus_images';

        $make = $request->input('make');
        $model = $request->input('model');
        $license_plate_number = $request->input('license_plate_number');
        $primary_color = $request->input('primary_color');
        $secondary_color = $request->input('secondary_color');
        $agent_id = $request->input('agent_id');
        $company_id = $request->input('company_id');
        $publish = $request->input('publish');

        $agent = Agent::find($agent_id);
        if ($agent) {
            $is_agent = true;
        } else {
            return "No such agent in the system";
        }

        $agent = Company::find($company_id);
        if ($agent) {
            $is_company = true;
        } else {
            return "No such company in the system";
        }


        if ($is_agent && $is_company) {
            $bus = new Bus();
            $bus->agent_id = $agent_id;
            $bus->company_id = $company_id;
            $bus->license_plate_number = $license_plate_number;
            $bus->primary_color = $primary_color;
            $bus->secondary_color = $secondary_color;
            $bus->model = $model;
            $bus->make = $make;

            if ($publish) {
                $bus->active = 1;
            }

            if ($bus->save()) {
                flash('Bus details saved!');
                return redirect('/admin/buses');
            }
        } else {
            return "No such agent and park in the system";
        }

        return "Error saving data to database";

    }

    function edit(Request $request, $id)
    {
        $bus = Bus::find($id);

        $agents = Agent::where('id', '<>', $bus->agent_id)->get();
        $companies = Company::where('id', '<>', $bus->company_id)->get();

        return view('admin.edit_bus_details')->with('agents', $agents)
            ->with('companies', $companies)->with('bus', $bus);
    }

    function update(Request $request)
    {
        //Move Uploaded File
        $destinationPath = public_path() . '/bus_images';

        $id = $request->input('id');

        $make = $request->input('make');
        $model = $request->input('model');
        $license_plate_number = $request->input('license_plate_number');
        $primary_color = $request->input('primary_color');
        $secondary_color = $request->input('secondary_color');
        $agent_id = $request->input('agent_id');
        $company_id = $request->input('company_id');
        $publish = $request->input('publish');

        //$file = $request->file("file");

        $bus = Bus::find($id);

        if ($make != '' && $bus->make != $make)
            $bus->make = $make;

        if ($model != '' && $bus->model != $model)
            $bus->model = $model;

        if ($license_plate_number != '' && $bus->license_plate_number != $license_plate_number)
            $bus->license_plate_number = $license_plate_number;

        if ($primary_color != '' && $bus->primary_color != $primary_color)
            $bus->primary_color = $primary_color;

        if ($secondary_color != '' && $bus->seconday_color != $secondary_color)
            $bus->secondary_color = $secondary_color;

        if ($agent_id != '' && $bus->agent_id != $agent_id)
            $bus->agent_id = $agent_id;

        if ($company_id != '' && $bus->company_id != $company_id)
            $bus->company_id = $company_id;

        if ($publish) {
            $bus->active = 1;
        } else {
            $bus->active = 0;
        }

        /*if ($file != null) {
            $image_name = time() . $file->getClientOriginalName();
            if ($file->move($destinationPath, $image_name)) {
                $bus->image = $image_name;
            } else {
                $is_uploaded = false;
            }
        }*/

        if ($bus->save()) {
            flash('Changes saved!');
            return redirect('/admin/buses/' . $bus->id . '/edit');
        } else {
            flash('Error saving changes!')->error();
            return redirect('/admin/buses/' . $bus->id . '/edit');
        }

    }

    function create_route($id)
    {
        $bus = Bus::find($id);
        return view('admin.create_new_route')->with('selected_bus', true)->with('bus', $bus);
    }

    function uploadImage(Request $request)
    {
        $file = $request->file("file");
        $this->logData($file->getClientOriginalName());
    }

    function logData($text)
    {
        $myfile = fopen(public_path() . "/logfile.txt", "a") or die("Unable to open file!");
        $txt = date('y-m-d h:m:s') . " " . $text . "\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    function delete($id)
    {
        $bus = Bus::find($id);
        $bus->delete();

        flash('Bus deleted!');
        return redirect('/admin/buses');
    }

}
