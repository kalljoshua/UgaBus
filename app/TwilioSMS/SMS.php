<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 7/5/18
 * Time: 4:16 PM
 */

namespace App\TwilioSMS;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class SMS
{
    var $sid = '';
    var $token = '';

    function __construct()
    {
        $this->sid = config('twilio.sid'); // Your Account SID from www.twilio.com/console
        $this->token = config('twilio.token'); // Your Auth Token from www.twilio.com/console
    }


    function sendSMS($user_phone_number, $message)
    {
        // Send an SMS using Twilio's REST API and PHP
        try {
            $client = new Client($this->sid, $this->token);
        } catch (ConfigurationException $e) {
        }
        $message = $client->messages->create(
            $user_phone_number, // Text this number
            array(
                'from' => '+12565988191', // From a valid Twilio number
                'body' => $message
            )
        );

        return $message->sid;
    }

    function sendFinalSMS($agent_phone_number, $agent_message, $user_phone_number, $message)
    {
        $sids = array();
        $message1 = null;
        $message2 = null;

        // Send an SMS using Twilio's REST API and PHP
        try {
            $client1 = new Client($this->sid, $this->token);

            $message1 = $client1->messages->create(
                $agent_phone_number, // Text this number
                array(
                    'from' => '+12565988191', // From a valid Twilio number
                    'body' => $agent_message
                )
            );

        } catch (ConfigurationException $e) {

        }


        // Send an SMS using Twilio's REST API and PHP
        try {
            $client2 = new Client($this->sid, $this->token);
            $message2 = $client2->messages->create(
                $user_phone_number, // Text this number
                array(
                    'from' => '+12565988191', // From a valid Twilio number
                    'body' => $message
                )
            );

        } catch (ConfigurationException $e) {

        }

        $sids["user_msg_sid"] = $message1->sid;
        $sids["agent_msg_sid"] = $message2->sid;

        return $sids;
    }


}