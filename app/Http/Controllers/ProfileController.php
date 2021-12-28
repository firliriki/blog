<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index(){
        $title = "Profile";

        $user = Auth::user();
        $posts = DB::table('users')
        ->select('*')
        ->where('firstname','=',$user->firstname)
        ->get();
        return view('profile',compact('title','posts'));
    }
}
