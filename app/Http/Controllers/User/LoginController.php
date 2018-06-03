<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Input, Redirect;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/user';

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function login(Request $request)
    {

        $email = $request->input('email');

        $password = $request->input('password');


        if ($this->guard()->attempt(['email' => $email, 'password' => $password]))
        {
            // Authentication passed...
            if(Auth::guard('user')->user()->status==1) {
                if (Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget('oldUrl');
                    return redirect()->to($oldUrl);
                } else {
                    flash('User Login successfully')->success();
                    return redirect()->intended(route('user.account',['name'=>Auth::guard('user')->user()->last_name]));
                }

            }else{
                $this->guard()->logout();

                $request->session()->flush();

                $request->session()->regenerate();
                flash('Verify your account first')->error();
                return redirect(route('user.login.register'));
            }
        }else{
            flash('Wrong Email or password. Try again later!')->error();
            return Redirect::back()->withInput(Input::all());
        }

        return $this->sendFailedLoginResponse($request);




    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();
        flash('Logout successful')->success();
        return redirect(route('user.login.register'));

    }
}
