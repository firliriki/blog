<?php

namespace App\Http\Controllers;

use App\Mail\KirimMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Mail\Mailable;

class MailController extends Controller

{
    public function index(){
        $title = "kontak kami";

        return view('/contact',compact('title'));
    }

    public function sendEmail(Request $req){
        $title = "kontak kami";
        $details = [
            'title' =>$req->input('head'),
            'body' =>$req->input('body'),
        ];
        // $basic  = new \Vonage\Client\Credentials\Basic('d39dca57','sT1xIYBwf0dduf9Z');
        // $client = new \Vonage\Client($basic);
        $settings = DB::table('settings')
        ->select('email')
        ->where('id',1)
        ->get();

        

            $curl = curl_init();
            $payload = json_encode(array(
            'destination' => 62+Auth::user()->NoHP,
            'message' => 'Terimakasih atas masukanya, kami akan segera memprosesnya'
            ));
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://api.nusasms.com/nusasms_api/1.0/whatsapp/message',
                // For testing
                // CURLOPT_URL => $BASE_TEST_URL . '/message',
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => array(
                    "APIKey: AE03CF6E2D45232D16CCF23BC38C32D2",
                    'Content-Type:application/json'
                ),
                CURLOPT_POSTFIELDS => $payload,
                // CURLOPT_SSL_VERIFYPEER => 0,    // Skip SSL Verification
            ));
            

            $resp = curl_exec($curl);
            curl_close($curl);

        // // $response = $client->sms()->send(
        // //     new \Vonage\SMS\Message\SMS('6285728677657', 'FIRLI', 'Terimakasih atas masukanya, kami akan segera memprosesnya')
        // // );

        // $message = $response->current();

        Mail::to($settings)->send(new KirimMail($details));
        // return "email sent";
            

           
            // if ($message->getStatus() == 0) {
            //     $sms = "The message was sent successfully\n";
            // } else {
            //     $sms = "The message failed with status: " . $message->getStatus() . "\n";
            // }
        return view('/contact',compact('title'));
    }
}
