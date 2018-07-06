@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
    <link href="{{asset('js/page/skin/default/style.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="userlist">
            <div class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="bookname">书名</label>
                    <input type="email" class="form-control" id="bookname" placeholder="书名">
                </div>
                <div class="form-group m-l-10">
                    <label class="sr-only" for="bookclass">分类</label>
                    <select name="" id="bookclass" class="form-control" style="width:160px;">
                        <option value="">请选择</option>
                    </select>
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
    <script type="text/javascript" src="{{asset('js/bookreserve/bookreservelist.js')}}"></script>
@endsection