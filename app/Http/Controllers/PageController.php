<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
   function index(){
       $title = "Homepage";
       $posts = DB::table('posts')
       ->join('categories','posts.post_category','=','categories.id')
       ->join('users','posts.post_author','=','users.id')
       ->select('posts.*','categories.category','users.firstname')
       ->where('posts.post_status','=','publish')
       ->limit(5)
       ->orderBy('posts.id','desc')
       ->get();
       return view('homepage',compact('title','posts'));
   }


   function single(Request $req){
       #posts
       $post = DB::table('posts')
       ->join('categories','posts.post_category','=','categories.id')
       ->join('users','posts.post_author','=','users.id')
       ->select('posts.*','categories.category','users.firstname')
       ->where('posts.post_slug','=',$req->slug)
       ->first();

       #comment
       $comment = DB::table('comments')
       ->where('comment_post_id','=',$post->id)
    //    ->where('comment_approved','=',2)
       ->get();

       return view('single',compact('post','comment'));
   }

   function blog(){
       $posts = DB::table('posts')
       ->join('categories','posts.post_category','=','categories.id')
       ->join('users','posts.post_author','=','users.id')
       ->select('posts.*','categories.category','users.firstname')
       ->orderBy('posts.id','desc')
       ->paginate(2);

       return view('blog',compact('posts'));
   }

   function search(Request $req){
    $title = "Search Results of ".$req->input('s');
    $s = $req->input('s');
    
    $posts = DB::table('posts')
    ->join('categories','posts.post_category','=','categories.id')
    ->join('users','posts.post_author','=','users.id')
    ->select('posts.*','categories.category','users.firstname')
    ->where('posts.post_status','=','publish')
    ->where(function($query) use ($req){
        $query->where('posts.post_title','like','%'.$req->input('s').'%')
        ->orWhere('posts.post_content','like','%'.$req->input('s').'%');
    })
    
    ->orderBy('posts.id','desc')
    ->paginate(2);

    return view('search',compact('posts','title','s'));
}
}
