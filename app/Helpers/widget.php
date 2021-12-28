<?php

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;

function widget(){
    $posts = DB::table('posts')
    ->join('categories','posts.post_category','=','categories.id')
    ->join('users','posts.post_author','=','users.id')
    ->select('posts.*','categories.category','users.firstname')
    ->where('posts.post_status','=','publish')
    ->limit(2)
    ->inRandomOrder()
    ->get();

    $comment = DB::table('comments')
    ->join('posts','comments.comment_post_id','=','posts.id')
    ->select('comments.*','posts.post_title','posts.post_slug')
    ->orderBy('updated_at','DESC')
    ->where('comments.comment_approved','=','2')
    ->limit(3)
    ->get();

    return view('sidebar',compact('posts','comment'));
    
}

function scrolltext(){
    $posts = DB::table('posts')
    ->join('categories','posts.post_category','=','categories.id')
    ->join('users','posts.post_author','=','users.id')
    ->select('posts.*','categories.category','users.firstname')
    ->where('posts.post_status','=','publish')
    ->limit(1)
    ->inRandomOrder()
    ->get();

    $comment = DB::table('comments')
    ->join('posts','comments.comment_post_id','=','posts.id')
    ->select('comments.*','posts.post_title','posts.post_slug')
    ->orderBy('updated_at','DESC')
    ->where('comments.comment_approved','=','2')
    ->limit(1)
    ->inRandomOrder()
    ->get();

    return view('layout/scroll',compact('posts','comment'));
}

function notif(){
    $message = DB::table('comments')->get();

    return view('notif',compact('message'));
}
?>