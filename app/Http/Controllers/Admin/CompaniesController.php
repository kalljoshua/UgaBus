<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

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

        //Move Uploaded File
        $destinationPath = public_path() . '/company_logos';


        $company_name = $request->input('company_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $website = $request->input('website');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $address = $request->input('address');
        $city = $request->input('city');
        $file = $request->file("file");

        $company = new Company();

        $company->company_name = $company_name;
        $company->email = $email;
        $company->phone = $phone;
        $company->mobile = $mobile;
        $company->website = $website;
        $company->facebook = $facebook;
        $company->twitter = $twitter;
        $company->hq_address = $address;
        $company->hq_city = $city;

        if($company->save()){
            if ($file != null) {
                $image_name = time() . $file->getClientOriginalName();
                if ($file->move($destinationPath, $image_name)) {
                    $company->logo = $image_name;
                    $company->save();
                } else {
                    $is_uploaded = false;
                }
                flash('Company add!');
            }
            return redirect('/admin/companies');
        }else{
            flash('Process failed!')->error();
            return redirect('/admin/companies');
        }
    }

    function edit($id)
    {
        $company = Company::find($id);
        return view('admin.edit_company_details')->with('company', $company);
    }

    function update(Request $request){
        //Move Uploaded File
        $destinationPath = public_path() . '/company_logos';


        $id = $request->input('id');
        $company_name = $request->input('company_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $website = $request->input('website');
        $facebook = $request->input('facebook');
        $twitter = $request->input('twitter');
        $address = $request->input('address');
        $city = $request->input('city');
        $file = $request->file("file");

        $company = Company::find($id);

        if($company_name != '' && $company->company_name != $company_name)
            $company->company_name = $company_name;

        if($email != '' && $company->email != $email)
            $company->email = $email;

        if($phone != '' && $company->phone != $phone)
            $company->phone = $phone;

        if($mobile !="" && $company->mobile != $mobile)
            $company->mobile = $mobile;

        if($website != '' && $company->website != $website)
            $company->website = $website;

        if($facebook != '' && $company->facebook != $facebook)
            $company->facebook = $facebook;

        if($twitter != '' && $company->twitter != $twitter)
            $company->twitter = $twitter;

        if($address != '' && $company->hq_address != $address)
            $company->hq_address = $address;

        if($city != '' && $company->hq_city != $city)
            $company->hq_city = $city;


        if ($file != null) {
            $image_name = time() . $file->getClientOriginalName();
            if ($file->move($destinationPath, $image_name)) {
                $company->logo = $image_name;
            } else {
                $is_uploaded = false;
            }
        }

        if ($company->save()) {
            flash('Changes saved!');
            return redirect('/admin/companies/' . $company->id . '/edit');
        } else {
            flash('Error saving changes!')->error();
            return redirect('/admin/companies/' . $company->id . '/edit');
        }

    }

    function delete($id)
    {
        $company = Company::find($id);

        $file = public_path().'/company_logos/'.$company->avatar;

        try {
            if (!unlink($file)) {
                flash("Error deleting $file")->error();
            }
        } catch (Exception $e) {
            // No image
        }


        $company->delete();
        flash('Agent deleted!');
        return redirect('/admin/companies');
    }
}
