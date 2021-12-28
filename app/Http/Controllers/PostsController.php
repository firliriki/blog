<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    function index(){
        $title = "Posts";
        if(Auth::user()->role=="admin"){
        $data = DB::table('posts')
        ->join('categories','posts.post_category','=','categories.id')
        ->join('users','posts.post_author','=','users.id')
        ->select('posts.*','categories.category','users.firstname')
        ->get();
        }
        else{
            $data = DB::table('posts')
            ->join('categories','posts.post_category','=','categories.id')
            ->join('users','posts.post_author','=','users.id')
            ->select('posts.*','categories.category','users.firstname')
            ->where('posts.post_author','=',Auth::user()->id)
            ->get();  
        }
        return view('admin.posts',compact('title','data'));
    }

    function form(Request $req){
        $title = $req->id =="" ? "Add New Post" : "Edit Post";
        $data = Post::where('id',$req->id)->first();
        $cat = Category::All();

        //add new
        if($req->id==""){
            return view('admin.frm_post',compact('title','data','cat'));
            exit;
        }
        if($data["post_author"]==Auth::user()->id || Auth::user()->role=="admin"){
            return view('admin.frm_post',compact('title','data','cat'));
        }
        else{
            $judul = "Acces Denied!";
            $pesan = "Perlu izin khusus untuk mengakses halaman ini!";
            return view('admin.error',compact('judul','pesan'));
        }
        
    }

    function save(Request $req){
        $req->validate(
            [
                'post_title' => 'required|unique:posts,post_title,'.$req->input('id'),
                'post_slug' => 'required|unique:posts,post_slug,'.$req->input('id'),
            ],
            [
                'post_title.required' => 'Judul Tidak Boleh Kosong !',
                'post_title.unique' => 'Judul sudah ada!',
                'post_slug.required' => 'Slug Tidak boleh kosong !',
                'post_slug.unique' => 'Slug sudah ada!'
            ]
        );

        try {
            if(!$req->input('id')){
                Post::create([
                    'post_title' => $req->input('post_title'),
                    'post_author' => Auth::user()->id,
                    'post_content' => str_replace('&nbsp;',' ',$req->input('post_content')),
                    'post_slug' => $req->input('post_slug'),
                    'post_category' => $req->input('post_category'),
                    'post_status' => $req->input('post_status'),

                ]);
            } else {
                Post::where('id',$req->input('id'))->update([
                    'post_title' => $req->input('post_title'),
                    'post_author' => Auth::user()->id,
                    'post_content' => str_replace('&nbsp;',' ',$req->input('post_content')),
                    'post_slug' => $req->input('post_slug'),
                    'post_category' => $req->input('post_category'),
                    'post_status' => $req->input('post_status'),
                ]);
            }
            return redirect('admin/posts')->with(['type'=>'success','message'=>'Data Berhasil Disimpan !']);
        } catch(\Exception $err){
            return redirect('admin/posts')->with(['type'=>'danger','message'=>'Terjadi Kesalahan']);
        }

    }

    function delete(Request $req){
        $data = Post::where('id',$req->id)->first();

        if($data["post_author"]==Auth::user()->id || Auth::user()->role=="admin"){
        try {
            Post::where('id',$req->id)->delete();
            return redirect('admin/posts')->with(['type'=>'success','message'=>'Data Berhasil Dihapus !']);
        } catch(\Exception $err){
            return redirect('admin/posts')->with(['type'=>'danger','message'=>'Terjadi Kesalahan !']);
        }
        } else {
            $judul = "Acces Denied!";
            $pesan = "Perlu izin khusus untuk mengakses halaman ini!";
            return view('admin.error',compact('judul','pesan'));
        }
    }
}
