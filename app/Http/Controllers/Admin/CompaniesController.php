<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    function getAllCompanies(){
        $companies = Company::all();
        return view('admin.companies')->with('companies', $companies);
    }
    function create(){
        return view('admin.create_new_company');
    }

    function save(Request $request){
        $company_name = $request->input('company_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $website = $request->input('website');
        $address = $request->input('address');
        $city = $request->input('city');

        $company = new Company();

        $company->company_name = $company_name;
        $company->email = $email;
        $company->phone = $phone;
        $company->mobile = $mobile;
        $company->website = $website;
        $company->hq_address = $address;
        $company->hq_city = $city;

        if($company->save()){
            $is_success = true;
        }else{
            $is_success = false;
        }

        if($is_success){
            return view('admin.create_new_company');
        }

        return "An error occured";

    }
}
