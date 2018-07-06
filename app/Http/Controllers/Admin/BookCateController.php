<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\CommonFunc;
use DB;

class BookCateController extends Controller
{

    //图书分类列表
    public function selectBookCateList(Request $request)
    {
        $worknumberId = $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $worknumberId)->first();
        if ($userAuth->role_id == 3) {
            return CommonFunc::_fail('您没有操作权限');
        }
        $pageSize = $request->get('pageSize', 10);
        $book_cate_name = $request->get('book_cate_name', '');
        $bookCateLists = DB::table('data_book_classification')
            ->when($book_cate_name, function ($query) use ($book_cate_name) {
                return $query->where('book_cate_name', 'like', "%" . $book_cate_name . "%");
            });
        $bookCateLists = $bookCateLists->orderBy('updated_at', 'desc')->paginate($pageSize);

        return CommonFunc::_success($bookCateLists);

    }

    //图书分类添加方法
    public function addBookCate(Request $request)
    {
        $worknumberId = $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $worknumberId)->first();
        if ($userAuth->role_id == 3) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $book_cate_name = $request->get('book_cate_name', '');
        if (empty($book_cate_name)) {
            return CommonFunc::_fail('图书分类名称为必填项');
        }

        try {
            $data = [
                'book_cate_name' => $book_cate_name,
            ];
            DB::table('data_book_classification')->insert($data);
            return CommonFunc::_success('添加图书分类失败');
        } catch (\Exception $e) {
            return CommonFunc::_fail('添加图书分类失败');
        }

    }

    //图书分类编辑展示页面
    public function editBookCateView(Request $request)
    {
        $worknumberId = $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $worknumberId)->first();
        if ($userAuth->role_id == 3) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $book_cate_id = $request->get('book_cate_id', '');
        if (empty($book_cate_id)) {
            return CommonFunc::_fail('缺失必要的图书分类ID');
        }

        $bookCate = DB::table('data_book_classification')->where('id', $book_cate_id)->first();
        $bookCate = (array)($bookCate);

        return CommonFunc::_success($bookCate);
    }

    //图书分类更新方法
    public function updateBookCate(Request $request)
    {
        $worknumberId = $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $worknumberId)->first();
        if ($userAuth->role_id == 3) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $book_cate_id = $request->get('book_cate_id', '');
        if (empty($book_cate_id)) {
            return CommonFunc::_fail('缺失必要的图书分类ID');
        }

        $book_cate_name = $request->get('book_cate_name', '');
        if (empty($book_cate_name)) {
            return CommonFunc::_fail('图书分类名称为必填项');
        }

        try {
            $data = [
                'book_cate_name' => $book_cate_name,
            ];
            DB::table('data_book_classification')->where('id', $book_cate_id)->update($data);
            return CommonFunc::_success('更新图书分类成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('更新图书分类失败');
        }

    }

    //删除图书分类
    public function deleteBookCate(Request $request)
    {
        $worknumberId = $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $worknumberId)->first();
        if ($userAuth->role_id == 3) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $book_cate_id = $request->get('book_cate_id', '');
        if (empty($book_cate_id)) {
            return CommonFunc::_fail('缺失必要的图书分类ID');
        }

        try {
            DB::table('data_book_classification')->where('id', $book_cate_id)->delete();
        } catch (\Exception $e) {
            return CommonFunc::_fail('删除图书分类失败');
        }

    }




}
