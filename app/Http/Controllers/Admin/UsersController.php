<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    function getAllUsers()
    {
        $users = User::all();
        return view('admin.users')->with('users', $users);
    }

    function suspendUser($id)
    {
        $user = User::find($id);

        if ($user->is_suspended == 0) {
            $user->is_suspended = 1;
            $user->save();
            flash('User account suspended!');
            return redirect('/admin/users');
        } else {
            $user->is_suspended = 0;
            $user->save();
            flash('User account active!')->warning();
            return redirect('/admin/users');
        }
    }
}
