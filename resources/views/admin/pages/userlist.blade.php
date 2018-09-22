@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
    <link href="{{asset('js/page/skin/default/style.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="userlist">
            <div class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="username">用户名</label>
                    <input type="email" class="form-control" id="username" placeholder="用户名">
                </div>
                <div class="form-group m-l-10">
                    <label class="sr-only" for="work_number">工号</label>
                    <input type="password" class="form-control" id="work_number" placeholder="工号">
                </div>
                <button type="submit" class="btn btn-success m-l-10" id="seachbtn">搜索</button>
                <a href="/useradd" style="float:right;"><button type="submit" class="btn btn-success m-l-10">新增用户</button></a>
            </div>
            <div class="tablebox">
                <table class="table table-striped" id="tabledata">
                   <thead>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>邮箱</th>
                        <th>手机</th>
                        <th>工号</th>
                        <th>角色</th>
                        <th>操作</th>
                   </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="page_box" style="line-height: 30px;">
                    <span  style="float:left;padding-right:5px;">每页显示</span>
                    <div class="page_limit" style="float:left;width:80px;height:30px">
                        <select id="page_limit" class="input-sm form-control input-s-sm inline">
                            <option value="10">10</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="pagination" style="float:left;margin:0;"></div>
                </div>
                <div style="clear: both"></div>
            </div>
    </div>
@endsection
@section('jsfile')
    <script type="text/javascript" src="{{asset('js/page/page.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/userlist/userlist.js?v=1.2')}}"></script>
@endsection