<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use Redirect,Mail;
use App\Mail\verifyToken;

class AuthenticationController extends Controller
{
    //

    public function authentication()
    {
        return view('user.authentication');
    }

    function registerUser(Request $request)
    {
        $user = new User();

        if(Input::has('fname')) $user->first_name = Input::get('fname');
        if(Input::has('lname')) $user->last_name = Input::get('lname');
        if(Input::has('phone')) $user->phone_no = Input::get('phone');
        if(Input::has('email')) $user->email = Input::get('email');
        if(Input::has('pass')) $pass = Input::get('pass');
        if(Input::has('password')) $password = Input::get('password');
        $user->email_verification_code = str_random(30);

        $check_agent_email = User::where('email',Input::get('email'))->get();
        if(sizeof($check_agent_email)>0)
        {
            flash('Email Address has already been registered.')->warning();
            return Redirect::back();
        }

        if($pass==$password)
        {
            $user->password = bcrypt($password);
        }else{
            flash('Passwords do not match!')->error();
            return Redirect::back()->withInput(Input::all());
        }

        if($user->save())
        {
            $thisUser = User::findOrFail($user->id);
            $this->sendVerificationEmail($thisUser);
            flash('Your account has successfully been created. 
            Check your email to verify account.')->success();
            return redirect(route('user.login.register'));
        }else{
            flash('Error submitting your details. Try again later!')->error();
            return Redirect::back()->withInput(Input::all());
        }

    }

    function sendVerificationEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyToken($thisUser));
    }
}
