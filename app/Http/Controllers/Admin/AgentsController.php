<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentsController extends Controller
{
    function getAllAgents(){
        $agents = Agent::all();
        return view('admin.agents')->with('agents',$agents);
    }

    function createAgent(){
        return view('admin.create_new_agent');
    }

    function save(Request $request){
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
        $company = $request->input('company');
        $company_hq_address = $request->input('company_hq_address');
        $company_hq_city = $request->input('company_hq_city');

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
        $agent->company = $company;
        $agent->company_hq_address = $company_hq_address;
        $agent->company_hq_city = $company_hq_city;
        $agent->email = $email;

        if($agent->save()){
            $agents = Agent::all();
            return view('admin.agents')->with('agents',$agents);
        }else{
            return view('admin.create_new_agent');
        }
        //return view('admin.agents');
    }
}
