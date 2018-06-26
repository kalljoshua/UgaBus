<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    function __construct()
    {

    }

    function sendSMS()
    {
        // Send an SMS using Twilio's REST API and PHP

        $sid = "ACa1a7da436eac2f78bf625b2d72346e3f"; // Your Account SID from www.twilio.com/console
        $token = "c4d6b95277defcb1e10702c365f9e2e4"; // Your Auth Token from www.twilio.com/console

        try {
            $client = new Client($sid, $token);
        } catch (ConfigurationException $e) {
        }
        $message = $client->messages->create(
            '+256785570221', // Text this number
            array(
                'from' => '+12565988191', // From a valid Twilio number
                'body' => 'Hello from Twilio!'
            )
        );

        print $message->sid;
    }
}
