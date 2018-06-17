<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Route;
use App\Booking;
use App\User;
use App\PaymentMethod;

class BusBookingController extends Controller
{
    function busBooking(Request $request)
    {
        $seats = $request->input('seats');
        $id = $request->input('id');
        $route = Route::find($id);

    	return view('user.bus-booking')
        ->with('route', $route)
        ->with('seats', $seats);
    }

    function makePayment($id){
        $route = Route::find($id);
        $payment_methods = PaymentMethod::all();
        return view('user.make-payment')
        ->with('payment_methods', $payment_methods)
        ->with('route', $route);
    }

    function processPayment(Request $request){
        $booking =  new Booking();
        $user =  User::find(2);
        $booking->number_of_seats = $request->input('seats');
        $booking->payment_method_id = $request->input('getway');
        $booking->route_id = $request->input('route_id');
        if(Auth::guard('user')->user()){
            $booking->user_id = Auth::guard('user')->user()->id;
        }
        else{
            $booking->user_id = 2;
            $booking->guest_number = $request->input('phonenumber');
            $user->first_name = $request->input('firstname');
            $user->last_name = $request->input('lastname');
            $user->phone = $request->input('phonenumber');
        }
        if (Session::has('total_price')) {
            $total = Session::get('total_price');
            Session::forget('total_price');
        }else{
            $total = 0; 
        }
        $total_price = $total;        
        if($request->input('email')) $email = $request->input('email');
        $pay_method = $request->input('getway');

        if($booking->save() && $user->save()){            
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
