<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingsController extends Controller
{
    function getAllBookings(){
        $bookings = Booking::all();
        return view('admin.bookings')->with('bookings', $bookings);
    }
}
