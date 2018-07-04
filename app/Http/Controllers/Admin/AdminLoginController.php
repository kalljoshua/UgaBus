<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Input, Redirect;



class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/agents';

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function login(Request $request)
    {

        $email = $request->input('email');

        $password = $request->input('password');

        if ($this->guard()->attempt(['email' => $email, 'password' => $password]))
        {
            // Authentication passed...
                if (Session::has('oldUrl')) {
                    $oldUrl = Session::get('oldUrl');
                    Session::forget('oldUrl');
                    return redirect()->to($oldUrl);
                } else {
                    flash('Admin Login successfully')->success();
                    return redirect($this->redirectTo);
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
        return redirect(route('admin.login'));

    }

}
