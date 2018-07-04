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


Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/home', function () { return view('admin.pages.home');});
Route::get('/userlist', function () { return view('admin.pages.userlist');});


//==================================================================
//Route::group(['middleware' => 'checkuserlogin' , 'namespace' => 'Admin'], function () {
Route::group(['middleware' => 'checkuserlogin'], function () {


});
Route::post('/userlogin', 'LoginController@login');


