@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">编辑用户</h3></div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <div class="form-group">
                    <label class="col-md-2 control-label">姓名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="user_name" placeholder="请输入姓名" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">年龄</label>
                    <div class="col-md-10">
                        <input type="number" id="user_age"  class="form-control" placeholder="年龄">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">性别</label>
                    <div class="col-md-10">
                        <div class="radio-inline">
                            <label class="cr-styled" for="user_sex_n">
                                <input type="radio" id="user_sex_n" name="user_sex" value="1">
                                <i class="fa"></i>
                                男
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label class="cr-styled" for="user_sex_w">
                                <input type="radio" id="user_sex_w" name="user_sex" value="2">
                                <i class="fa"></i>
                                女
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">邮箱</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="user_email" placeholder="请输入邮箱" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">密码</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="user_pass" placeholder="请输入密码" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">手机号</label>
                    <div class="col-md-10">
                        <input type="tel" class="form-control" id="user_phone" placeholder="请输入手机号" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">工号</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="user_work" placeholder="请输入工号">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">角色</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="user_role">
                            <option value="">请选择角色</option>
                            <option value="1">管理员</option>
                            <option value="2">员工</option>
                            <option value="3">普通用户</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="error_msg" style="display: none;">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10 error_msg"  style="color:red;">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <button  class="btn btn-success m-l-10" id="addyes">确定</button>
                        <a href="/userlist"><button  class="btn btn-default m-l-10" >取消</button></a>
                    </div>
                </div>

            </div>
        </div> <!-- panel-body -->
    </div>
@endsection
@section('jsfile')
    <script src="{{asset('js/userlist/useredit.js')}}"></script>
@endsection