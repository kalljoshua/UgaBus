<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    function getAllUsers(){
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }
}
