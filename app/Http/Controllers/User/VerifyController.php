<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class VerifyController extends Controller
{
    
    public function verify($token)
    {
        $user = User::where('email_verification_code',$token)->first();
           if($user)
            {
                $user ->email_verified_status=1;
                $user ->email_verification_code=NULL;
                if($user->save()){
                flash('Account verified successfully')->success();
                return redirect(route('user.login.register'));
                }
            }else{
                return 'failed to update';
            }
    }
}
