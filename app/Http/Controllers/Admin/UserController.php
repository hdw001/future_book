<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\CommonFunc;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //查询用户的方法
    public function selectUserList(Request $request)
    {
        $work_numberId =   $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $work_numberId)->first();
        if ($userAuth->role_id != 1) {
            return CommonFunc::_fail('您没有操作权限');
        }
        $pageSize = $request->get('pageSize', 10);
        $name = $request->get('name', '');
        $work_number = $request->get('work_number', '');
        $userLists = DB::table('users')
            ->when($name, function ($query) use ($name) {
                return $query->where('name', 'like', "%" . $name . "%");
            })
            ->when($work_number, function ($query) use ($work_number) {
                return $query->where('work_number', $work_number);
            });
        $userLists = $userLists->orderBy('updated_at', 'desc')->paginate($pageSize);

        return CommonFunc::_success($userLists);
    }

    //用户添加方法
    public function saveUserInfo(Request $request)
    {
        $work_numberId =   $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $work_numberId)->first();
        if ($userAuth->role_id != 1) {
            return CommonFunc::_fail('您没有操作权限');
        }
        $name = $request->get('name', '');
        $email = $request->get('email', '');
        $password = $request->get('password', '');
        $phone = $request->get('phone', '');
        $work_number = $request->get('work_number', '');
        $role_id = $request->get('role_id', '');
        $sex = $request->get('sex', '');
        $age = $request->get('age', '');

        if (empty($name)) {
            return CommonFunc::_fail('请填写用户名字');
        }

        if (empty($email)) {
            return CommonFunc::_fail('请填写用户邮箱');
        }
        if (!preg_match("/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i", $email)) {
            return CommonFunc::_fail('请填写正确的用户邮箱');
        }

        $userEmail=DB::table('users')->where('email',$email)->first();
        if(!is_null($userEmail)){
            return CommonFunc::_fail('邮箱已经存在,请重新填写！');
        }

        if (empty($password)) {
            return CommonFunc::_fail('请填写用户密码');
        }
        if (strlen($password) < 6 || strlen($password) > 12) {
            return CommonFunc::_fail('请填写长度6-12的密码');
        }

        if (empty($phone)) {
            return CommonFunc::_fail('手机号码不能为空');
        }
        if (!preg_match("/^1[34578]{1}\d{9}$/", $phone)) {
            return CommonFunc::_fail('请填写的正确的手机号');
        }

        if (empty($work_number)) {
            return CommonFunc::_fail('请填写你的工号');
        }
        if ($work_number < 1001) {
            return CommonFunc::_fail('工号不在给定的范围内');
        }

        if (empty($sex)) {
            return CommonFunc::_fail('请选择性别');
        }

        $sexArray = [1, 2];//1男 2女
        if (!in_array($sex, $sexArray)) {
            return CommonFunc::_fail('性别不在给定的范围内');
        }

        if (empty($age)) {
            return CommonFunc::_fail('请填写用户年龄');
        }
        if ($age < 0 || $age > 150) {
            return CommonFunc::_fail('年龄不能小于0或者大于150岁');
        }

        if (empty($role_id)) {
            return CommonFunc::_fail('请选择角色');
        }
        $roleArray = [1, 2, 3];//1是管理员  2是工作人员  3是普通用户
        if (!in_array($role_id, $roleArray)) {
            return CommonFunc::_fail('角色不在给定的范围内');
        }

        $userDataToDb = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'work_number' => $work_number,
            'role_id' => $role_id,
            'sex' => $sex,
            'age' => $age,
        ];

        try {

            DB::table('users')->insert($userDataToDb);
            return CommonFunc::_success([], '添加用户成功');

        } catch (\Exception $e) {
//            return CommonFunc::_fail($e->getMessage().$e->getTraceAsString());
            return CommonFunc::_fail('添加用户失败');
        }
    }

    //编辑用户
    public function editUser(Request $request)
    {
        $work_numberId =   $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $work_numberId)->first();
        if ($userAuth->role_id != 1) {
            return CommonFunc::_fail('您没有操作权限');
        }
        $userId = $request->get('user_id', '');
        if (empty($userId)) {
            return CommonFunc::_fail('缺失用户的ID参数');
        }
        $user = DB::table('users')->where('id', $userId)->first();
        if (is_null($user)) {
            return CommonFunc::_fail('ID为 ' . $userId . ' 不存在');
        }
        $user = (array)($user);

        return CommonFunc::_success($user);

    }

    //更新用户信息
    public function updateUser(Request $request)
    {
        $work_numberId =   $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $work_numberId)->first();
        if ($userAuth->role_id != 1) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $userId = $request->get('user_id', '');
        if (empty($userId)) {
            return CommonFunc::_fail('缺失用户的ID参数');
        }
        $user = DB::table('users')->where('id', $userId)->first();
        if (is_null($user)) {
            return CommonFunc::_fail('ID为 ' . $userId . ' 不存在');
        }

        $name = $request->get('name', '');
        $email = $request->get('email', '');
        $password = $request->get('password', '');
        $phone = $request->get('phone', '');
        $work_number = $request->get('work_number', '');
        $role_id = $request->get('role_id', '');
        $sex = $request->get('sex', '');
        $age = $request->get('age', '');

        if (empty($name)) {
            return CommonFunc::_fail('请填写用户名字');
        }

        if (empty($email)) {
            return CommonFunc::_fail('请填写用户邮箱');
        }
        if (!preg_match("/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i", $email)) {
            return CommonFunc::_fail('请填写正确的用户邮箱');
        }

        if (empty($password)) {
            return CommonFunc::_fail('请填写用户密码');
        }
        if (strlen($password) < 6 || strlen($password) > 12) {
            return CommonFunc::_fail('请填写长度6-12的密码');
        }

        if (empty($phone)) {
            return CommonFunc::_fail('手机号码不能为空');
        }
        if (!preg_match("/^1[34578]{1}\d{9}$/", $phone)) {
            return CommonFunc::_fail('请填写的正确的手机号');
        }

        if (empty($work_number)) {
            return CommonFunc::_fail('请填写你的工号');
        }
        if ($work_number < 1001) {
            return CommonFunc::_fail('工号不在给定的范围内');
        }

        if (empty($sex)) {
            return CommonFunc::_fail('请选择性别');
        }

        $sexArray = [1, 2];//1男 2女
        if (!in_array($sex, $sexArray)) {
            return CommonFunc::_fail('性别不在给定的范围内');
        }

        if (empty($age)) {
            return CommonFunc::_fail('请填写用户年龄');
        }
        if ($age < 0 || $age > 150) {
            return CommonFunc::_fail('年龄不能小于0或者大于150岁');
        }

        if (empty($role_id)) {
            return CommonFunc::_fail('请选择角色');
        }
        $roleArray = [1, 2, 3];//1是管理员  2是工作人员  3是普通用户
        if (!in_array($role_id, $roleArray)) {
            return CommonFunc::_fail('角色不在给定的范围内');
        }
        $userDataToDb = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'work_number' => $work_number,
            'role_id' => $role_id,
            'sex' => $sex,
            'age' => $age,
        ];

        try {

            DB::table('users')->where('id', $userId)->update($userDataToDb);
            return CommonFunc::_success([], '更新用户成功');

        } catch (\Exception $e) {
            return CommonFunc::_fail($e->getmessage());
//            return CommonFunc::_fail('更新用户失败');
        }
    }

    //删除用户
    public function deleteUser(Request $request)
    {
        $work_numberId =   $request->session()->get('work_number');
        $userAuth = DB::table('users')->where('work_number', $work_numberId)->first();
        if ($userAuth->role_id != 1) {
            return CommonFunc::_fail('您没有操作权限');
        }

        $userId = $request->get('user_id', '');
        if (empty($userId)) {
            return CommonFunc::_fail('请选择你要删除的用户');
        }

        try {
            DB::table('users')->where('id', $userId)->delete();
        } catch (\Exception $e) {
            return CommonFunc::_fail('删除用户失败');
        }

    }


    //用户退出方法
    public function logOut(Request $request)
    {
        $request->session()->forget('work_number');
        return CommonFunc::_success([], '退出成功');
    }
}
