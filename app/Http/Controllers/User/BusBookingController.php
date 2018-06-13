<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\BusRoute;
use App\Booking;

class BusBookingController extends Controller
{
    function busBooking(Request $request)
    {
        $seats = $request->input('seats');
        $id = $request->input('id');
        $route = BusRoute::find($id);

    	return view('user.bus-booking')
        ->with('route', $route)
        ->with('seats', $seats);
    }

    function makePayment($id){
        $route = BusRoute::find($id);
        return view('user.make-payment')
        ->with('route', $route);
    }

    function processPayment(Request $request){
        $booking =  new Booking();
        $booking->seats = $request->input('seats');
        $booking->payment_method = $request->input('getway');
        $booking->bus_route_id = $request->input('route_id');
        $booking->name = $request->input('firstname').' '.$request->input('lastname');
        if (Session::has('total_price')) {
            $total = Session::get('total_price');
            Session::forget('total_price');
        }else{
            $total = 0; 
        }
        $booking->total_price = $total;
        $booking->number = $request->input('phonenumber');
        if($request->input('email')) $booking->email = $request->input('email');
        $pay_method = $request->input('getway');

        if($booking->save()){
            if($pay_method == "mobile_money"){
                return "processing for mobile money";
            }else if($pay_method == "visa"){
                return "processing for visa";

            }else if($pay_method == "terminal"){
                return "processing for terminal";
            }
        }
    }

    
    function paymentReciept(){
    	return view('user.payment-reciept');
    }
}
