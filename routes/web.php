<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth:api')->get('/user',function(Request $request){
//     return $request->user();
// })

// example.com/api/v1/users
// example.com/api/v2/users

Route::group(["prefix" => "v1", "namespace" => "Api/v1" ], function(){

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client','ClientController@index')->middleware('auth');
Route::get('/test-api',function(){
    return view('test');
});