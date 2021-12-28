<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    //
    function index(){
        $title = 'settings';
        $settings = DB::table('settings')
        ->get();
        return view('admin.settings',compact('title','settings'));
    }
    function save(Request $req){
        try{

            $result = Setting::where('id',1)->update([
                'email'=>$req->input('email')
            ]);
            return redirect('admin/settings')->with(['type'=>'success','message'=>'Data Berhasil Disimpan !']);
        } catch(\Exception $err){
            return redirect('admin/settings')->with(['type'=>'danger','message'=>'Terjadi Kesalahan']);
        }
    }
}
