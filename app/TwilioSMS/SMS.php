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
    var $sid = "ACa1a7da436eac2f78bf625b2d72346e3f"; // Your Account SID from www.twilio.com/console
    var $token = "c4d6b95277defcb1e10702c365f9e2e4"; // Your Auth Token from www.twilio.com/console

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