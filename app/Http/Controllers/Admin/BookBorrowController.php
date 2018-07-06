<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\CommonFunc;
use DB;

class BookBorrowController extends Controller
{
    //查询借书的列表
    public function getBookBorrowList(Request $request)
    {
        $user_name = $request->get('user_name', '');
        $pageSize = $request->get('pageSize', 10);
        $bookBorrowList = DB::table('data_book_borrow as dbb')
            ->leftJoin('data_book as db', 'db.id', '=', 'dbb.book_id')
            ->leftJoin('users as u', 'u.id', '=', 'dbb.user_id')
            ->select('dbb.id', 'db.book_name', 'u.name', 'dbb.book_borrow_date', 'dbb.book_status')
            ->when($user_name, function ($query) use ($user_name) {
                return $query->where('u.name', $user_name);
            });

        $bookBorrowList = $bookBorrowList->orderBy('db.updated_at', 'desc')->paginate($pageSize);

        return CommonFunc::_success($bookBorrowList);
    }

    //添加一条借书记录
    public function addBookBorrow(Request $request)
    {
        $worknumberId = $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $worknumberId)->first();
        if ($userAuth->role_id == 3) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $book_id = $request->get('book_id', '');
        $user_id = $userAuth->id;
        $book_status = 1;//已预订的图书
        $book_borrow_date = date('Y-m-d', time());

        $data = [
            'book_borrow_date' => $book_borrow_date,
            'book_id' => $book_id,
            'user_id' => $user_id,
            'book_status' => $book_status,
        ];

        try {
            DB::table('data_book_borrow')->insert($data);

            $book = DB::table('data_book')->where('id', $book_id)->first();
            $book_number = $book->book_number - 1;
            DB::table('data_book')->where('id', $book_id)->update(['book_number' => $book_number,]);

            return CommonFunc::_success([], '预定图书成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('预定图书失败');
        }

    }

    //更改图书为已借出的状态
    public function updateBookStatus(Request $request)
    {
        $book_borrow_id = $request->get('book_borrow_id', '');
        $book_status = $request->get('book_status', 2);

        try {
            DB::table('data_book_borrow')
                ->where('id', $book_borrow_id)
                ->update([
                'book_status' => $book_status,
            ]);
            return CommonFunc::_success('更新图书状态成功');
        } catch (\Exception $e) {
            return CommonFunc::_fail('更新图书状态失败');
        }

    }


}
