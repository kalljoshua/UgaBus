<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class AgentsController extends Controller
{
    function getAllAgents()
    {
        $agents = Agent::all();
        return view('admin.agents')->with('agents', $agents);
    }

    function createAgent()
    {
        return view('admin.create_new_agent');
    }

    function save(Request $request)
    {
        //Move Uploaded File
        $destinationPath = public_path() . '/user_avatars';

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $agent_address = $request->input('agent_address');
        $agent_city = $request->input('agent_city');

        $file = $request->file("file");

        $agent = new Agent();
        $agent->first_name = $first_name;
        $agent->last_name = $last_name;
        $agent->username = $username;
        $agent->gender = $gender;
        $agent->date_of_birth = $dob;
        $agent->phone = $phone;
        $agent->mobile = $mobile;
        $agent->agent_address = $agent_address;
        $agent->agent_city = $agent_city;
        $agent->email = $email;

        if ($agent->save()) {
            if ($file != null) {
                $image_name = time() . $file->getClientOriginalName();
                if ($file->move($destinationPath, $image_name)) {
                    $agent->avatar = $image_name;
                    $agent->save();
                } else {
                    $is_uploaded = false;
                }
                flash('Agent added successfully!');
            }

            return redirect('/admin/agents');

        } else {
            flash('Process failed!')->error();
            return redirect('/admin/agents/create');
        }
        //return view('admin.agents');
    }

    function edit($id)
    {
        $agent = Agent::find($id);
        return view('admin.edit_agent_details')->with('agent', $agent);
    }

    function update(Request $request)
    {
        //Move Uploaded File
        $destinationPath = public_path() . '/user_avatars';

        $id = $request->input('user_id');

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $agent_address = $request->input('agent_address');
        $agent_city = $request->input('agent_city');
        $file = $request->file("file");

        $agent = Agent::find($id);

        if ($first_name != '' && $agent->first_name != $first_name)
            $agent->first_name = $first_name;

        if ($last_name != '' && $agent->last_name != $last_name)
            $agent->last_name = $last_name;

        if ($username != '' && $agent->username != $username)
            $agent->username = $username;

        if ($gender != '' && $agent->gender != $gender)
            $agent->gender = $gender;

        if ($dob != '' && $agent->date_of_birth != $dob)
            $agent->date_of_birth = $dob;

        if ($email != '' && $agent->email != $email)
            $agent->email = $email;

        if ($mobile != '' && $agent->mobile != $mobile)
            $agent->mobile = $mobile;

        if ($phone != '' && $agent->phone != $phone)
            $agent->phone = $phone;

        if ($agent_address != '' && $agent->agent_address)
            $agent->agent_address = $agent_address;

        if ($agent_city != '' && $agent->agent_city)
            $agent->agent_city = $agent_city;


        if ($file != null) {
            $image_name = time() . $file->getClientOriginalName();
            if ($file->move($destinationPath, $image_name)) {
                $agent->avatar = $image_name;
            } else {
                $is_uploaded = false;
            }
        }
        if ($agent->save()) {
            flash('Agent changes saved!');
            return redirect('/admin/agents/' . $agent->id . '/edit');
        } else {
            flash('Failed saving changes!')->error();
            return redirect('/admin/agents/' . $agent->id . '/edit');
        }

    }

    function delete($id)
    {
        $agent = Agent::find($id);

        $file = public_path().'/user_avatars/'.$agent->avatar;

        try {
            if (!unlink($file)) {
                flash("Error deleting $file")->error();
            }
        } catch (Exception $e) {
            // No image
        }


        $agent->delete();
        flash('Agent deleted!');
        return redirect('/admin/agents');
    }
}
