<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AdminsController extends Controller
{
    var $hello;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function getAllAdmins(){
        $staff = Admin::all();
        return view('admin.staff')->with('staff',$staff);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function create(){
        return view('admin.create_new_staff');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    function save(Request $request){

        //Move Uploaded File
        $destinationPath = public_path() . '/user_avatars';

        $is_password_match = false;

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $staff_address = $request->input('staff_address');
        $staff_city = $request->input('staff_city');
        $password = $request->input('password');
        $repeat_password = $request->input('repeat_password');
        $role = $request->input('role');

        $file = $request->file("file");


        if($password == $repeat_password){
            $is_password_match = true;
        }else{
            $is_password_match = false;
        }

        if($is_password_match){
            $staff = new Admin();

            $staff->first_name = $first_name;
            $staff->last_name = $last_name;
            $staff->username = $username;
            $staff->date_of_birth = $dob;
            $staff->gender = $gender;
            $staff->email = $email;
            $staff->phone = $phone;
            $staff->mobile = $mobile;
            $staff->address = $staff_address;
            $staff->city = $staff_city;
            $staff->password = $password;
            $staff->user_level = $role;

            if($staff->save()){
                if ($file != null) {
                    $image_name = time() . $file->getClientOriginalName();
                    if ($file->move($destinationPath, $image_name)) {
                        $staff->avatar = $image_name;
                        $staff->save();
                    } else {
                        $is_uploaded = false;
                    }
                    flash('Admin added successfully!');
                }

                return redirect('/admin/staff');
            }else{
                flash('Failed to add admin!')->error();
                return redirect('/admin/staff/create');
            }

        }else{
            flash('Password mismatch!')->error();
            return redirect('/admin/staff/create');
        }

    }

    function edit(Request $request, $id){
        $user = Admin::find($id);
        return view('admin.edit_staff_details')->with('user', $user);

    }

    function update(Request $request){

        //Move Uploaded File
        $destinationPath = public_path() . '/user_avatars';

        $is_password_match = false;
        $is_password_change = false;

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $staff_address = $request->input('staff_address');
        $staff_city = $request->input('staff_city');
        $password = $request->input('password');
        $repeat_password = $request->input('repeat_password');
        $role = $request->input('role');
        $id = $request->input('user_id');

        $file = $request->file("file");

        $staff = Admin::find($id);

        $staff->first_name = $first_name;
        $staff->last_name = $last_name;
        $staff->username = $username;
        $staff->date_of_birth = $dob;
        $staff->gender = $gender;
        $staff->email = $email;
        $staff->phone = $phone;
        $staff->mobile = $mobile;
        $staff->address = $staff_address;
        $staff->city = $staff_city;
        $staff->user_level = $role;

        if($password != ''){
            if($password == $repeat_password){
                $is_password_match = true;
            }else{
                $is_password_match = false;
            }

            if($is_password_match){
                $staff->password = $password;
            }
        }

        if ($file != null) {
            $image_name = time() . $file->getClientOriginalName();
            if ($file->move($destinationPath, $image_name)) {
                $staff->avatar = $image_name;
            } else {
                $is_uploaded = false;
            }
        }

        if($staff->save()){
            flash('Admin changes saved successfully!');
            return redirect('/admin/staff/' . $staff->id . '/edit');
        }else{
            flash('Failed saving changes!')->error();
            return redirect('/admin/staff/' . $staff->id . '/edit');
        }
    }

    function delete($id)
    {
        $staff = Admin::find($id);

        $file = public_path().'/user_avatars/'.$staff->avatar;

        try {
            if (!unlink($file)) {
                flash("Error deleting $file")->error();
            }
        } catch (Exception $e) {
            // No image
        }


        $staff->delete();
        flash('Admin deleted!');
        return redirect('/admin/staff');
    }
}
