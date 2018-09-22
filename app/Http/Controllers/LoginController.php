<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\CommonFunc;
use DB;

class LoginController extends Controller
{

    //用户登录方法
    public function login(Request $request)
    {
        $work_number = $request->get('work_number', '');
        $password = $request->get('password', '');
        if (empty($work_number)) {
            return CommonFunc::_fail('请填写您的用户ID');
        }

        if (empty($password)) {
            return CommonFunc::_fail('请填写您的登录密码');
        }
        $user = DB::table('users')->where('work_number', $work_number)->first();

        if (is_null($user)) {
            return CommonFunc::_fail('此用户不存在');
        }

        if ($user->password != $password) {
            return CommonFunc::_fail('密码不正确');
        }

        $this->saveUserAttributeToSession($request, $user);

        $data = (array)($user);
        $msg='登录成功';
        return response()->json(
            ['code' => 2000, 'msg' => $msg, 'data' => $data]
        );


    }


    public function saveUserAttributeToSession($request, $user)
    {
        $request->session()->put('work_number', $user->work_number);
    }

}
