<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{
    //

    function index(){
        $title = "Comments";
        $comments = DB::table('comments')
        ->join('posts','comments.comment_post_id','=','posts.id')
        ->select('comments.*','posts.post_title','posts.post_slug')
        ->orderBy('id','DESC')
        ->paginate(10);  
        
        return view('admin/comments',compact('title','comments'));

    }
    function save(Request $req){
        try{

            $result = Comment::create([
                'comment_post_id'=>$req->input('comment_post_id'),
                'comment_author'=>$req->input('comment_author'),
                'comment_content'=>$req->input('comment_content'),
                'comment_approved'=>1
            ]);
            return true;
        } catch(\Exception $err){
            return false;
        }
    }

    function update(Request $req){
        try{
            DB::table('comments')
            ->where('id',$req->id)
            ->update(['comment_approved' => 2]);
        return back()->with(['type'=>'success','message'=>'Comment berhasil di Acc!']);
        }catch(\Exception $err){
            return redirect('admin/comments')->with(['type'=>'success','message'=>'Comment berhasil di',$err]);
        }

    }
    function reject(Request $req){
        try{
            DB::table('comments')
            ->where('id',$req->id)
            ->update(['comment_approved' => 3]);
        return redirect('admin/comments')->with(['type'=>'success','message'=>'Comment berhasil di Reject!']);
        }catch(\Exception $err){
            return redirect('admin/comments')->with(['type'=>'success','message'=>'Comment berhasil di',$err]);
        }

    }
}
