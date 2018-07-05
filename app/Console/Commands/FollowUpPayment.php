<?php

namespace App\Console\Commands;

use App\GuestPayment;
use App\GuestSms;
use App\TwilioSMS\SMS;
use App\YoPayment\PaymentModule;
use Illuminate\Console\Command;

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
        /*$path = storage_path('app/log.txt');
        $myfile = fopen($path, "a") or die("Unable to open file!");
        $txt = date('Y-d-m H:m:s') . " - Follow up triggered\n";
        fwrite($myfile, $txt);
        fclose($myfile);*/

        $this->followUpPayments();
        $this->info('Followup done successfully!');
    }

    function followUpPayments()
    {
        $resp = array();

        $g_payments = GuestPayment::where('follow_up_status', 0)
            ->get();

        if ($g_payments->count > 0) {
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

        $user_phone_number = '+' . $payment->guestBooking->phone;
        $user_agent_number = '+' . $payment->guestBooking->route->bus->agent->phone;

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
        $user_phone_number = '+' . $payment->guestBooking->phone;
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


}
