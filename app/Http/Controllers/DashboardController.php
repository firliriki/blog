<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    function index(){
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
}
