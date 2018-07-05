<?php

namespace App\Http\Controllers\User;

use App\GuestBooking;
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

    function makePayment(){
        if (Session::has('route')) {
            $id = Session::get('route');
        }
        $route = Route::find($id);
        $payment_methods = PaymentMethod::all();
        return view('user.make-payment')
        ->with('payment_methods', $payment_methods)
        ->with('route', $route);
    }

    function processPayment(Request $request){
        if (Session::has('departure_date')) {
            $date = Session::get('departure_date');
            $departure_date = date("Y-m-d", strtotime($date));
        }

        if(Auth::guard('user')->user()){
            $booking =  new Booking();
            $booking->user_id = Auth::guard('user')->user()->id;
            $user =  User::find(2);
            $booking->number_of_seats = $request->input('seats');
            $booking->payment_method_id = $request->input('getway');
            $booking->route_id = $request->input('route_id');
            $booking->departure_date = $departure_date;
        }
        else{
            $booking = new GuestBooking();
            $booking->route_id = $request->input('route_id');
            $booking->payment_method_id = $request->input('getway');
            $booking->number_of_seats = $request->input('seats');
            $booking->first_name = $request->input('firstname');
            $booking->last_name = $request->input('lastname');
            $booking->phone = $request->input('phonenumber');
            $booking->departure_date = $departure_date;
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

        if($booking->save()){
            if($pay_method){
                //process_payment();
                return view('user.payment-directions');
            }
        }else{

        }
    }

    
    function paymentReciept(){
    	return view('user.payment-reciept');
    }
}
