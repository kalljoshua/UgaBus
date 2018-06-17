<?php

namespace App\Http\Controllers\Admin;

use App\Park;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParksController extends Controller
{
    function getAllParks(){
        $parks = Park::all();
        return view('admin.parks')->with('parks', $parks);
    }
}
