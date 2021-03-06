<?php

namespace App\Http\Controllers\User;

use App\GuestBooking;
use App\GuestPayment;
use App\GuestSms;
use App\Payment;
use App\TwilioSMS\SMS;
use App\UserSms;
use App\YoPayment\PaymentModule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Route;
use App\Booking;
use App\User;
use App\PaymentMethod;
use Illuminate\Support\Facades\Storage;

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

    function makePayment()
    {
        if (Session::has('route')) {
            $id = Session::get('route');
        }
        $route = Route::find($id);
        $payment_methods = PaymentMethod::all();
        return view('user.make-payment')
            ->with('payment_methods', $payment_methods)
            ->with('route', $route);
    }

    function processPayment(Request $request)
    {
        if (Session::has('departure_date')) {
            $date = Session::get('departure_date');
            $departure_date = date("Y-m-d", strtotime($date));
        }

        if (Auth::guard('user')->user()) {
            $is_auth_user = true;
            $booking = new Booking();
            $booking->user_id = Auth::guard('user')->user()->id;
            $user = User::find(2);
            $booking->number_of_seats = $request->input('seats');
            $booking->payment_method_id = $request->input('getway');
            $booking->route_id = $request->input('route_id');
            $booking->departure_date = $departure_date;
        } else {
            $is_auth_user = false;
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
        } else {
            $total = 0;
        }
        $total_price = $total;
        if ($request->input('email')) $email = $request->input('email');
        $pay_method = $request->input('getway');

        if ($booking->save()) {
            if ($pay_method) {
                return $this->process_payment($booking, $is_auth_user);
            } else {
                return "Failed processing payment";
            }
        } else {
            return "Booking failed";
        }

    }

    function process_payment($booking, $auth)
    {
        $yo = new PaymentModule();
        $externalReference = $this->unique_external_reference();

        $route = Route::find($booking->route_id);


        if ($auth) {
            $amount = $route->unit_seat_price * $booking->number_of_seats;
            $phone_number = $booking->user->phone;
            $res = $yo->runDepositFunds($amount, $phone_number, $externalReference);

            if ($res['Status'][0] == 'OK') {
                $payment = new Payment();
                $payment->booking_id = $booking->id;
                $payment->transaction_reference = $res['TransactionReference'][0];
                $payment->transaction_status = $res['TransactionStatus'][0];
                $payment->external_reference = $externalReference;
                $payment->amount = $amount;

                $payment->save();
            }

        } else {
            $amount = $route->unit_seat_price * $booking->number_of_seats;
            $phone_number = $booking->phone;
            $res = $yo->runDepositFunds($amount, $phone_number, $externalReference);

            if ($res['Status'][0] == 'OK') {
                $payment = new GuestPayment();
                $payment->guest_booking_id = $booking->id;
                $payment->transaction_reference = $res['TransactionReference'][0];
                $payment->transaction_status = $res['TransactionStatus'][0];
                $payment->external_reference = $externalReference;
                $payment->amount = $amount;

                $payment->save();
            }
        }

        /*
         * Process is finalized at the App/Console/Commands/FollowUpPayment.php
         *
         * And
         *
         * App/Console/Kernel.php
         *
         * */

        return "Complete payment from your mobile phone. Thanks";
    }

    function unique_external_reference()
    {
        # prevent the first number from being 0
        $output = rand(1, 9);

        for ($i = 0; $i < 10; $i++) {
            $output .= rand(0, 9);
        }

        return $output;
    }


    function paymentReciept()
    {
        return view('user.payment-reciept');
    }
}
