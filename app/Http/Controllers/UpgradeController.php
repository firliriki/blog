<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UpgradeController extends Controller
{
    protected function create(Request $request)
    {         
        $data = $request->validate([
           
            'phone_number' => ['required', 'numeric']
            
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($data['phone_number'], "sms");
       
        return redirect()->route('verify')->with(['phone_number' => $data['phone_number']]);
           
    }

    protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);
        /* Get credentials from .env */
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_sid = getenv("TWILIO_SID");
        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
        $twilio = new Client($twilio_sid, $token);
        $verification = $twilio->verify->v2->services($twilio_verify_sid)
            ->verificationChecks
            ->create($data['verification_code'], array('to' => $data['phone_number']));
        if ($verification->valid) {
            DB::table('users')
            ->where('id',Auth::user()->id)
            ->update(['role' => 'author']);

            $komen = DB::table('comments')
            ->select(DB::raw('count(*) as komen_s'))
            ->where('comment_approved','=',2)
            ->get();
    
            $komenp = DB::table('comments')
            ->select(DB::raw('count(*) as komen_s'))
            ->where('comment_approved','=',1)
            ->get();
    
            $komenx = DB::table('comments')
            ->select(DB::raw('count(*) as komen_s'))
            ->where('comment_approved','=',3)
            ->get();
    
            $data = DB::table('posts')
            ->join('categories','posts.post_category','=','categories.id')
            ->join('users','posts.post_author','=','users.id')
            ->select('posts.*','categories.category','users.firstname')
            ->get();
    

            return view('admin.dashboard',compact('komen','komenp','komenx','data'));
        }
        return back()->with(['phone_number' => $data['phone_number'], 'error' => 'Invalid verification code entered!']);
    
      

            
      


            
           


        
        }
       
    }
