<?php

namespace App\Console\Commands;

use App\GuestPayment;
use App\GuestSms;
use App\Helpers\Logger;
use App\Payment;
use App\TwilioSMS\SMS;
use App\UserSms;
use App\YoPayment\PaymentModule;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FollowUpPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:followup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Followup bookings payments wit the the yo payments server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->followUpPayments();
        $this->info('Followup done successfully!');
    }

    function followUpPayments()
    {

        $first = DB::table('guest_payments')
            ->select('id', 'guest_booking_id', 'transaction_reference', 'external_reference', 'transaction_status',
                'amount', 'follow_up_status', 'claimed_booking_type')
            ->where('follow_up_status', 0);

        $all_payments = DB::table('payments')
            ->select('id', 'booking_id as b_id', 'transaction_reference', 'external_reference', 'transaction_status',
                'amount', 'follow_up_status', 'claimed_booking_type')
            ->where('follow_up_status', 0)
            ->unionAll($first)
            ->get();

        if ($all_payments->count() > 0) {
            foreach ($all_payments as $payment) {
                if ($payment->claimed_booking_type == 9998) {

                    $payment = GuestPayment::find($payment->id);

                } elseif ($payment->claimed_booking_type == 9999) {

                    $payment = Payment::find($payment->id);

                }
                $transactionReference = $payment->transaction_reference;
                $res = $this->follow_up_payment($transactionReference);

                if ($res["Status"][0] == "OK" && $res["TransactionStatus"][0] == "SUCCEEDED") {

                    $this->sendSuccessSMS($payment);
                    $payment->transaction_status = "SUCCEEDED";
                    $payment->follow_up_status = 1;
                    $payment->save();
                    Logger::followUpLog('Transaction TID = ' . $res["TransactionReference"] . ' SUCCEEDED ');

                } elseif ($res["Status"][0] == "OK" && $res["TransactionStatus"][0] == "PENDING") {

                    //todo Do something awesome to handle pending transactions
                    $payment->transaction_status = "PENDING";
                    //$payment->follow_up_status = 2; //Handle pending flag from here
                    $payment->save();
                    Logger::followUpLog(json_encode($res));

                } elseif ($res["Status"][0] == "ERROR" && $res["TransactionStatus"][0] == "FAILED") {

                    $this->sendFailSMS($payment);
                    $payment->transaction_status = "FAILED";
                    $payment->follow_up_status = 1;
                    $payment->save();
                    Logger::followUpErrorLog(json_encode($res));

                } else {
                    //Fatal transaction error
                    Logger::followUpErrorLog(json_encode($res));
                }

            }

            return "done";

        } else {

            return "No jobs";

        }


    }

    /**
     *Function for sending sms to the involved parties
     * @param $payment
     */
    function sendSuccessSMS($payment)
    {

        if ($payment->claimed_booking_type == 9998) {
            $user_phone_number = '+' . $payment->guestBooking->phone;
            $user_agent_number = '+' . $payment->guestBooking->route->bus->agent->phone;
        } elseif ($payment->claimed_booking_type == 9999) {
            $user_phone_number = '+' . $payment->booking->user->phone;
            $user_agent_number = '+' . $payment->booking->route->bus->agent->phone;
        }


        $agent_message = 'Customer with number ' . $user_phone_number . ' has booked via UGA BUS with ticket ID ' .
            $payment->external_reference . '. Please confirm a seat number for them. For inquiries, call 0704741443.';

        $user_message = date('Y-m-d H:i:s') . ' Thank you for choosing UGA BUS, Phone no :' .
            $user_phone_number . ', Your Booking is successful, Your ticket Id = ' . $payment->external_reference .
            '. For inquiries, call 0704741443';


        $sms = new SMS();
        $message_sids = $sms->sendFinalSMS($user_agent_number, $agent_message, $user_phone_number, $user_message);

        if ($message_sids != null || $message_sids != '') {
            if ($payment->claimed_booking_type == 9998) {
                $sms = new GuestSms();
            } elseif ($payment->claimed_booking_type == 9999) {
                $sms = new UserSms();
            }
            $sms->user_phone = $user_phone_number;
            $sms->user_message_text = $user_message;
            $sms->agent_phone = $user_agent_number;
            $sms->agent_message_text = $agent_message;
            $sms->twilio_user_message_sid = $message_sids["user_msg_sid"];
            $sms->twilio_agent_message_sid = $message_sids["agent_msg_sid"];

            $sms->save();
            Logger::followUpLog('SMS M_SID = ' . json_encode($message_sids) . ' CUSTOMER ' . $user_phone_number . ', AGENT ' . $user_agent_number . ' SENT OUT ');
        } else {
            Logger::followUpErrorLog('TROUBLE sending CUSTOMER ' . $user_agent_number . ', AGENT ' . $user_phone_number . ' SMS ');
        }

    }

    function sendFailSMS($payment)
    {
        if ($payment->claimed_booking_type == 9998) {
            $user_phone_number = '+' . $payment->guestBooking->phone;
            $first_name = $payment->guestBooking->first_name;
        } elseif ($payment->claimed_booking_type == 9999) {
            $user_phone_number = '+' . $payment->booking->user->phone;
            $first_name = $payment->booking->user->first_name;
        }

        $message = "Dear " . $first_name . ", UGA BUS failed to receive your booking payment. Please try again later. Thanks!";

        $sms = new SMS();
        $message_sid = $sms->sendSMS($user_phone_number, $message);

        if ($message_sid != null || $message_sid != '') {
            if ($payment->claimed_booking_type == 9998) {
                $sms = new GuestSms();
            } elseif ($payment->claimed_booking_type == 9999) {
                $sms = new UserSms();
            }
            $sms->user_phone = $user_phone_number;
            $sms->user_message_text = $message;
            $sms->twilio_user_message_sid = $message_sid;

            $sms->save();
            Logger::followUpLog('SMS M_SID = ' . $message_sid . ' CUSTOMER ' . $user_phone_number . ' SENT OUT ');
        } else {
            Logger::followUpErrorLog('TROUBLE sending CUSTOMER ' . $user_phone_number . ' FAIL SMS');
        }


    }


    function follow_up_payment($transactionReference)
    {
        $yo = new PaymentModule();
        $res = $yo->runFollowUpTransaction($transactionReference);

        return $res;
    }


}
