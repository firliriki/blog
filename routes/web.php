<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', 'PageController@index');
Route::get('/search', 'PageController@search');
Route::get('/single/{slug}','PageController@single');
Route::get('/blog','PageController@blog');


Route::group(["middleware"=>"auth"],function(){

Route::get('/dashboard','PageController@index');
Route::get('/profile','ProfileController@index');

Route::group(["middleware"=>"admin"],function() {

Route::get('/admin/comments','CommentController@index');
Route::get('/admin/comments/update/{id}','CommentController@update');
Route::get('/admin/comments/reject/{id}','CommentController@reject'); 
Route::get('/admin/settings','SettingController@index');
});

Route::group(["middleware"=>"author"],function() {
Route::get('/admin/dashboard','DashboardController@index');
Route::get('/admin/posts','PostsController@index');
Route::get('/admin/posts/form/{id?}','PostsController@form');
Route::get('/admin/categories/form/{id?}','CategoryController@form');
Route::get('/admin/posts/delete/{id}','PostsController@delete');
Route::get('/admin/categories','CategoryController@index');


Route::get('/admin/categories/delete/{id}','CategoryController@delete'); 




});


Route::get('/admin/categories','CategoryController@index');


Route::get('/admin/categories/delete/{id}','CategoryController@delete'); 




Route::get('/contact','MailController@index');


});
Route::get('/r', function () {
    return view('auth.reg');
})->name('reg');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/verify', function () {
    return view('auth.verify');
})->name('verify');

Route::post('/regs', 'UpgradeController@create');
Route::post('/verifys', 'UpgradeController@verify');

Route::post('/admin/categories/save','CategoryController@save');
Route::post('/admin/settings/save','SettingController@save');
Route::post('/comment/save','CommentController@save');
Route::post('/admin/posts/save','PostsController@save');
Route::post('/admin/kontakkami','MailController@sendEmail');
require __DIR__.'/auth.php';

Route::get('/logout','AuthenticatedSessionController@destroy');
                // ->middleware('auth')
                // ->name('logout');