<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "PagesController@index");
Route::get('register',"PagesController@register");
Route::get("login",[ 'as' => 'login', 'uses' => "PagesController@login"]);
Route::get("home",'PagesController@home');
Route::post("register","AuthController@register");
Route::post("login","AuthController@login");
Route::post("edit-profile","PagesController@editProfile");
Route::get("logout","AuthController@logout");

Route::middleware('auth', 'throttle:60,1')->group(function () {
    Route::get('post_offer','PagesController@postOffer');
});
