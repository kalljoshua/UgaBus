<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserProfileController extends Controller
{
    public function userAccount($name)
    {
        $user= User::where('last_name',$name)->first();
        $user_email = Auth::guard('user')->user()->email;
        if($user->email == $user_email)
        return view('user.user_account')
        ->with('user',$user);
    }
}
