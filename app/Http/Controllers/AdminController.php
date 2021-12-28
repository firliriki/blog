<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {
        $komen = DB::table('comments')
        ->select(DB::raw('count(*) as komen_s'))
        ->where('comment_approved','=',2)
        ->get();

        return view('admin.dashboard',compact('komen'));

    }
}
