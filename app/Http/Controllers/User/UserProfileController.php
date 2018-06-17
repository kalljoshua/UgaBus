<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Booking;
use Input, Redirect;

class UserProfileController extends Controller
{
    public function userAccount($name)
    {
        $user= User::where('last_name',$name)
        ->where('id',Auth::guard('user')->user()->id)->first();
        $user_email = Auth::guard('user')->user()->email;
        $bookings = Booking::where('user_id',$user_email)->get();
        if($user->email == $user_email)
        return view('user.user_account')
        ->with('bookings',$bookings)
        ->with('user',$user);
    }

    function updatePassword (Request $request){
        $id = Auth::guard('user')->id();
        $hashedPassword = Auth::guard('user')->user()->password;
        $agent = User::find($id);


        if (\Hash::check($request->input('oldpass'), $hashedPassword)) {
            // The passwords match...
            if(Input::get('newpass') == Input::get('confirmpass')){

                if(Input::has('newpass')) $agent->password = bcrypt(Input::get('newpass'));
                if($agent->save()){
                    flash('Password update was successfully done.')->success();
                    return Redirect::back();
                }
            }else{
                flash('Unsuccessfull Update, Password miss-match')->error();
                return Redirect::back();
            }
        }else{
            flash('Unsuccessfull Update. Provide correct old password')->error();
            return Redirect::back();
        }

    }

    function profileUpdate(Request $request){

        $user_id = Auth::guard('user')->id();
        $user = User::find($user_id);
        $user->first_name = $request->input('fname');
        $user->last_name = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('contact');
        
        if($user->save()){
            flash('Profile update was successfully done.')->success();
            return Redirect::back();
        }else{
            flash('Profile update failed. Please try again!')->success();
            return Redirect::back();
        }

    }

}
