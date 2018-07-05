<?php

namespace App\Http\Controllers\User;

use App\GuestBooking;
use App\GuestPayment;
use App\GuestSms;
use App\Payment;
use App\TwilioSMS\SMS;
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

        return "Complete payment from your mobile phone. Thanks";
    }

    /*Following up payment*/
    function test_follow_up()
    {
        /*$first = DB::table('users')
            ->whereNull('first_name');

        $users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();*/

        $resp = array();

        $g_payments = GuestPayment::where('follow_up_status', 0)
            ->get();

        foreach ($g_payments as $payment) {
            $transactionReference = $payment->transaction_reference;
            $res = $this->follow_up_payment($transactionReference);

            if ($res["Status"][0] == "OK" && $res["TransactionStatus"][0] == "SUCCEEDED") {

                $this->sendSuccessSMS($payment);
                $payment->transaction_status = "SUCCEEDED";

            } elseif ($res["Status"][0] == "ERROR" && $res["TransactionStatus"][0] == "FAILED") {

                $this->sendFailSMS($payment);
                $payment->transaction_status = "FAILED";

            }

            $payment->follow_up_status = 1;
            $payment->save();

            array_push($resp, $res);
        }

        return $resp;

    }

    /**
     *Function for sending sms to the involved parties
     */
    function sendSuccessSMS($payment)
    {
        //Agent message
        /*$message = $getTransid->time_of_departure . ' bus ' . $getTransid->busname .
            ' booked from ' . $getTransid->travelfrom . ' to ' . $getTransid->travelto .
            ' via ugabus. Your ID is ' . $getTransid->pnrno .
            '. For inquiries, call 0704741443';*/


        /*$message = date('Y-m-d H:i:s') . ' Thank you for using UGA BUS,Phone no :' .
            $paytel . ', Your Payment is ' . $TransactionStatus . ', Your ticket Id = ' . $pnrno;*/

        $user_phone_number = '+'.$payment->guestBooking->phone;
        $user_agent_number = '+'.$payment->guestBooking->route->bus->agent->phone;

        $agent_message = 'Customer with number ' . $user_phone_number . ' has booked via UGABUS with ticket ID ' .
            $payment->external_reference . '. Please confirm a seat number for them. For inquiries, call 0704741443.';

        $user_message = date('Y-m-d H:i:s') . ' Thank you for using UGA BUS, Phone no :' .
            $user_phone_number . ', Your Booking is successful, Your ticket Id = ' . $payment->external_reference .
            '. For inquiries, call 0704741443';


        $sms = new SMS();
        $message_sids = $sms->sendFinalSMS($user_agent_number, $agent_message, $user_phone_number, $user_message);

        if ($message_sids != null || $message_sids != '') {
            $guest_sms = new GuestSms();
            $guest_sms->guest_user_phone = $user_phone_number;
            $guest_sms->guest_user_message_text = $user_message;
            $guest_sms->agent_phone = $user_agent_number;
            $guest_sms->agent_message_text = $agent_message;
            $guest_sms->twilio_guest_message_sid = $message_sids["user_msg_sid"];
            $guest_sms->twilio_agent_message_sid = $message_sids["agent_msg_sid"];

            $guest_sms->save();
        }

    }

    function sendFailSMS($payment)
    {
        $user_phone_number = '+'.$payment->guestBooking->phone;
        $first_name = $payment->guestBooking->first_name;
        $message = "Dear " . $first_name . ", UGABUS failed to receive your payment. Please try again later. Thanks!";

        $sms = new SMS();
        $message_sid = $sms->sendSMS($user_phone_number, $message);

        if ($message_sid != null || $message_sid != '') {
            $guest_sms = new GuestSms();
            $guest_sms->guest_user_phone = $user_phone_number;
            $guest_sms->guest_user_message_text = $message;
            $guest_sms->twilio_message_sid = $message_sid;

            $guest_sms->save();
        }

    }


    function follow_up_payment($transactionReference)
    {
        $yo = new PaymentModule();
        $res = $yo->runFollowUpTransaction($transactionReference);

        return $res;
    }
    /*End of following up payment*/

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
