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
Route::get('/useradd', function () { return view('admin.pages.useradd');});
Route::get('/useredit', function () { return view('admin.pages.useredit');});
Route::get('/booklist', function () { return view('admin.pages.booklist');});
Route::get('/bookadd', function () { return view('admin.pages.bookadd');});
Route::get('/bookinfo', function () { return view('admin.pages.bookinfo');});
//==================================================================
//Route::group(['middleware' => 'checkuserlogin' , 'namespace' => 'Admin'], function () {
Route::group(['middleware' => 'checkuserlogin'], function () {
    Route::post('/userlist', 'Admin\UserController@selectUserList');
    Route::post('/useradd', 'Admin\UserController@saveUserInfo');
    Route::get('/userinfo', 'Admin\UserController@editUser');
    Route::post('/userupdate', 'Admin\UserController@updateUser');

});
Route::post('/userlogin', 'LoginController@login');



