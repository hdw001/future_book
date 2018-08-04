@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
    <link href="{{asset('js/page/skin/default/style.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="userlist">
            <div class="form-inline">
                <div class="form-group">
                    <label  for="bookname">书名：</label>
                    <input type="email" class="form-control" id="bookname" placeholder="书名">
                </div>
                <div class="form-group " style="margin:10px;">
                    <label for="bookclass">用户名：</label>
                    <input type="email" class="form-control" id="user_name" placeholder="用户名">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" id="seachbook" style="margin-left:2px;">搜索</button>
                </div>
            </div>
            <div class="tablebox">
                <table class="table table-striped" id="tabledata">
                   <thead>
                        <th>ID</th>
                        <th>借阅者</th>
                        <th>图书名称</th>
                        <th>预定时间</th>
                        <th>状态</th>
                        <th id="setbook">操作</th>
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
    <script type="text/javascript" src="{{asset('js/bookreserve/bookreservelist.js?v=1.1')}}"></script>
@endsection