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


