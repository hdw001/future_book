<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\CommonFunc;
use DB;

class BookController extends Controller
{

    //获取所有图书分类的方法
    public function getBookCateAll()
    {
        $bookCates = DB::table('data_book_classification')
            ->pluck('book_cate_name', 'id')
            ->toArray();
        return CommonFunc::_success($bookCates);

    }

    //查询图书列表的方法
    public function selectBookList(Request $request)
    {

        $pageSize = $request->get('pageSize', 10);
        $book_cate_id = $request->get('book_cate_id', '');
        $book_name = $request->get('book_name', '');
        $bookCateLists = DB::table('data_book as db')
            ->select('db.id', 'db.book_cate_id', 'db.book_name', 'db.book_author', 'db.book_press', 'db.book_introduction', 'db.book_number', 'db.book_detail', 'db.book_url')
            ->leftJoin('data_book_classification as dbc', 'dbc.id', '=', 'db.book_cate_id')
            ->when($book_cate_id, function ($query) use ($book_cate_id) {
                return $query->where('db.book_cate_id', $book_cate_id);
            })
            ->when($book_name, function ($query) use ($book_name) {
                return $query->where('db.book_name', 'like', "%" . $book_name . "%");
            });
        $bookCateLists = $bookCateLists->orderBy('db.updated_at', 'desc')->paginate($pageSize);

        return CommonFunc::_success($bookCateLists);
    }

    //添加图书的方法
    public function addBook(Request $request)
    {
        $book_cate_id = $request->get('book_cate_id', '');
        $book_name = $request->get('book_name', '');
        if (empty($book_name)) {
            return CommonFunc::_fail('请填写图书的名称');
        }
        $booksname=DB::table('data_book')->where('book_name',$book_name)->first();
        if(!is_null($booksname)){
            return CommonFunc::_fail('图书名字已存在');
        }

        $book_author = $request->get('book_author', '');
        if (empty($book_author)) {
            return CommonFunc::_fail('请填写图书的作者');
        }
        $book_press = $request->get('book_press', '');
        if (empty($book_press)) {
            return CommonFunc::_fail('请填写图书的出版社');
        }
        $book_introduction = $request->get('book_introduction', '');
        if (empty($book_introduction)) {
            return CommonFunc::_fail('请填写图书的简介');
        }
        $book_number = $request->get('book_number', '');
        if (empty($book_number)) {
            return CommonFunc::_fail('请填写图书的数量');
        }
        $book_detail = $request->get('book_detail', '');
        if (empty($book_detail)) {
            return CommonFunc::_fail('请填写图书的详情');
        }
        //check
        if (!$request->hasFile('book_url')) {
            return CommonFunc::_fail('没有上传图书图片文件');
        }

        $file = $request->file('book_url');
//        if (count($file) > 1) {
//            return CommonFunc::_fail('一次只能上传一个图片文件');
//        }

        $fileOriginName = $file->getClientOriginalName();

        //save
        $file->move(base_path() . '/public/bookImg', $fileOriginName);
        $book_url = '/bookImg/'.$fileOriginName;

        $data = [
            'book_cate_id' => $book_cate_id,
            'book_name' => $book_name,
            'book_author' => $book_author,
            'book_press' => $book_press,
            'book_introduction' => $book_introduction,
            'book_number' => $book_number,
            'book_detail' => $book_detail,
            'book_url' => $book_url,
        ];

        try {
            DB::table('data_book')->insert($data, '添加图书成功');
            return CommonFunc::_success([],'添加图书成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('添加图书失败');
        }

    }

    //编辑图书视图界面
    public function editBookView(Request $request)
    {
        $book_id = $request->get('book_id', '');
        if (empty($book_id)) {
            return CommonFunc::_fail('确实必要的图书ID');
        }

        $book = DB::table('data_book')->where('id', $book_id)->first();
        if (is_null($book)) {
            return CommonFunc::_fail('ID为 ' . $book_id . ' 的图书不存在');
        }

        $book = (array)($book);

        return CommonFunc::_success($book);
    }

    //更新图书的方法
    public function updateBook(Request $request)
    {
        $book_id = $request->get('book_id', '');
        if (empty($book_id)) {
            return CommonFunc::_fail('缺失必要的图书ID');
        }

        $book = DB::table('data_book')->where('id', $book_id)->first();
        if (is_null($book)) {
            return CommonFunc::_fail('ID为 ' . $book_id . ' 的图书不存在');
        }

        $book_cate_id = $request->get('book_cate_id', '');
        $book_name = $request->get('book_name', '');
        if (empty($book_name)) {
            return CommonFunc::_fail('请填写图书的名称');
        }

        $book_author = $request->get('book_author', '');
        if (empty($book_author)) {
            return CommonFunc::_fail('请填写图书的作者');
        }
        $book_press = $request->get('book_press', '');
        if (empty($book_press)) {
            return CommonFunc::_fail('请填写图书的出版社');
        }
        $book_introduction = $request->get('book_introduction', '');
        if (empty($book_introduction)) {
            return CommonFunc::_fail('请填写图书的简介');
        }
        $book_number = $request->get('book_number', '');
        if (empty($book_number)) {
            return CommonFunc::_fail('请填写图书的数量');
        }
        $book_detail = $request->get('book_detail', '');
        if (empty($book_detail)) {
            return CommonFunc::_fail('请填写图书的详情');
        }
        //check
//        if (!$request->hasFile('book_url')) {
//            return CommonFunc::_fail('没有上传图书图片文件');
//        }


        $data = [
            'book_cate_id' => $book_cate_id,
            'book_name' => $book_name,
            'book_author' => $book_author,
            'book_press' => $book_press,
            'book_introduction' => $book_introduction,
            'book_number' => $book_number,
            'book_detail' => $book_detail,
        ];
        if ($request->hasFile('book_url')) {
            $file = $request->file('book_url');
//            if (count($file) > 1) {
//                return CommonFunc::_fail('一次只能上传一个图片文件');
//            }
            $fileOriginName = $file->getClientOriginalName();

            //save
            $file->move(base_path() . '/public/bookImg',$fileOriginName);
            $data['book_url'] = '/bookImg/'.$fileOriginName;
        }
        try {
            DB::table('data_book')->where('id', $book_id)->update($data, '更新图书信息成功');
            return CommonFunc::_success('更新图书信息成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('更新图书信息失败');
        }

    }

    //删除图书信息
    public function deleteBook(Request $request)
    {
        $book_id = $request->get('book_id', '');
        if (empty($book_id)) {
            return CommonFunc::_fail('缺失必要的图书ID');
        }

        $book = DB::table('data_book')->where('id', $book_id)->first();
        if (is_null($book)) {
            return CommonFunc::_fail('ID为 ' . $book_id . ' 的图书不存在');
        }

        try {
            DB::table('data_book')->where('id', $book_id)->delete();
            return CommonFunc::_success([], '删除图书信息成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('删除图书信息失败');
        }
    }

    //添加图书评论
    public function addBookEvaluate(Request $request)
    {

        $book_id = $request->get('book_id', '');
        if (empty($book_id)) {
            return CommonFunc::_fail('请传入图书的ID');
        }

        $book_evaluate = $request->get('book_evaluate', '');
        if (empty($book_evaluate)) {
            return CommonFunc::_fail('请传入图书的评论');
        }
        $data = [
            'book_id' => $book_id,
            'book_evaluate' => $book_evaluate,
        ];

        try {
            DB::table('data_book_evaluate')->insert($data);
            return CommonFunc::_success([], '添加图书评论成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('添加图书评论失败');
        }
    }

    //查询图书的所有评论  getBookEvaluateByBookId
    public function getBookEvaluateByBookId(Request $request)
    {
        $book_id = $request->get('book_id');
        $bookEvaluates = DB::table('data_book_evaluate')->where('book_id', $book_id)->get()->toArray();

        return CommonFunc::_success($bookEvaluates);

    }
}