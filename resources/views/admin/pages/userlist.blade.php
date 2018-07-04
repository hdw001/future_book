@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
    <link href="{{asset('js/page/paging.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="userlist">
            <div class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="username">用户名</label>
                    <input type="email" class="form-control" id="username" placeholder="用户名">
                </div>
                <div class="form-group m-l-10">
                    <label class="sr-only" for="useremail">邮箱</label>
                    <input type="password" class="form-control" id="useremail" placeholder="邮箱">
                </div>
                <button type="submit" class="btn btn-success m-l-10">搜索</button>
            </div>
            <div class="tablebox">
                <table class="table table-striped">
                   <thead>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>邮箱</th>
                        <th>手机</th>
                        <th>工号</th>
                        <th>角色</th>
                   </thead>
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
@endsection