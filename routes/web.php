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
Route::group(['middleware' => 'checkuserlogin'], function () {
    Route::get('/home', function () { return view('admin.pages.home');});
    Route::get('/userlist', function () { return view('admin.pages.userlist');});
    Route::get('/useradd', function () { return view('admin.pages.useradd');});
    Route::get('/useredit', function () { return view('admin.pages.useredit');});
    Route::get('/booklist', function () { return view('admin.pages.booklist');});
    Route::get('/bookadd', function () { return view('admin.pages.bookadd');});
    Route::get('/bookedit', function () { return view('admin.pages.bookedit');});
    Route::get('/bookinfo', function () { return view('admin.pages.bookinfo');});
    Route::get('/bookclasslist', function () { return view('admin.pages.bookclasslist');});
    Route::get('/bookclassadd', function () { return view('admin.pages.bookclassadd');});
    Route::get('/bookclassedit', function () { return view('admin.pages.bookclassedit');});
    Route::get('/bookreservelist', function () { return view('admin.pages.bookreservelist');});
});

//==================================================================
//Route::group(['middleware' => 'checkuserlogin' , 'namespace' => 'Admin'], function () {
Route::group(['middleware' => 'checkuserlogin'], function () {

    Route::post('/logout', 'Admin\UserController@logOut');

    Route::post('/userlist', 'Admin\UserController@selectUserList');
    Route::post('/useradd', 'Admin\UserController@saveUserInfo');
    Route::get('/userinfo', 'Admin\UserController@editUser');
    Route::post('/userupdate', 'Admin\UserController@updateUser');


    //获取所有图书分类的方法  selectBookCateList
    Route::post('/selectbookcatelist', 'Admin\BookCateController@selectBookCateList');
    //图书分类添加方法 addBookCate
    Route::post('/addbookcate', 'Admin\BookCateController@addBookCate');
    //图书分类编辑展示页面 addBookCate
    Route::post('/editbookcateview', 'Admin\BookCateController@editBookCateView');
    //图书分类更新方法 updateBookCate
    Route::post('/updatebookcate', 'Admin\BookCateController@updateBookCate');
    //删除图书分类 deleteBookCate
    Route::post('/deletebookcate', 'Admin\BookCateController@deleteBookCate');




    //获取所有图书分类的方法  getBookCateAll
    Route::post('/getbookcateall', 'Admin\BookController@getBookCateAll');
    //查询图书列表的方法  selectBookList
    Route::post('/selectbooklist', 'Admin\BookController@selectBookList');
    //添加图书的方法  addBook
    Route::post('/addbook', 'Admin\BookController@addBook');
    //编辑图书视图界面  editBookView
    Route::post('/editbookview', 'Admin\BookController@editBookView');
    //更新图书的方法  updateBook
    Route::post('/updatebook', 'Admin\BookController@updateBook');
    //删除图书信息  deleteBook
    Route::post('/deletebook', 'Admin\BookController@deleteBook');
    //添加图书评论  addBookEvaluate
    Route::post('/addbookevaluate', 'Admin\BookController@addBookEvaluate');
    //查询图书的所有评论  getBookEvaluateByBookId
    Route::post('/getbookevaluatebybookid', 'Admin\BookController@getBookEvaluateByBookId');




    //查询借书的列表  getBookBorrowList
    Route::post('/getbookborrowlist', 'Admin\BookBorrowController@getBookBorrowList');
    //添加一条借书记录  addBookBorrow
    Route::post('/addbookborrow', 'Admin\BookBorrowController@addBookBorrow');
    //更改图书为已借出的状态  updateBookStatus
    Route::post('/updatebookstatus', 'Admin\BookBorrowController@updateBookStatus');





});
Route::post('/userlogin', 'LoginController@login');



