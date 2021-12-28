<?php

namespace App\Http\Controllers;


class SMSController extends Controller
{
    public function index(){

            $basic  = new \Vonage\Client\Credentials\Basic('d39dca57','sT1xIYBwf0dduf9Z');
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS('6285728677657', 'FIRLI', 'A text message sent using the Nexmo SMS API')
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                echo "The message was sent successfully\n";
            } else {
                echo "The message failed with status: " . $message->getStatus() . "\n";
            }


    }
}