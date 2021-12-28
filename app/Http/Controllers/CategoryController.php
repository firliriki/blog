<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function index(){
        $title = "Category Page";
    
    $data = Category::All();

    return view('admin.categories',compact('title','data'));
    }

    function form(Request $req){
        $title = $req->id =="" ? "Add New Category" : "Edit Category";
        $data = Category::where('id',$req->id)->first();

        return view('admin.frm_categories',compact('title','data'));
    }
    function save(Request $req){
        $req->validate(
            [
                'category' => 'required|unique:categories,category,'.$req->input('id'),
                'slug' => 'required|unique:categories,slug,'.$req->input('id')
            ],
            [
                'category.required' => 'Nama Kategori wajib diisi !',
                'category.unique' => 'Kategori sudah digunakan !',
                'slug.required' => 'Slug Wajib diisi !',
                'slug.unique' => 'Slug sudah digunakan !',
            ]
            );
        
        try{   
            
        if(!$req->input('id')){
        Category::create([
            "category" => $req->input('category'),
            "slug" => $req->input('slug'),
            "description" => $req->input('desc'),
        ]);
        }  else{

            Category::where('id',$req->input('id'))->update([
                "category" => $req->input('category'),
                "slug" => $req->input('slug'),
                "description" => $req->input('desc'),
            ]);
        }
        
         return redirect('admin/categories')->with(['type'=>'success','message'=>'Data Berhasil Disimpan']);
        } catch(\Exception $err){
            return redirect('admin/categories')->with(['type'=>'danger','message'=>'Terjadi Kesalahan']);
        }
        
    }
    function delete(Request $req){
        try{
            Category::where('id',$req->id)->delete();
            return redirect('admin/categories')->with(['type'=>'success','message'=>'Data berhasil dihapus!']);
        } catch (\Exception $err){
            return redirect('admin/categories')->with(['type'=>'danger','message'=>'Terjadi Kesalahan!']);
        }
    }

}
