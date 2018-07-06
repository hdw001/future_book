@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
    <link href="{{asset('js/page/skin/default/style.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">新增图书</h3></div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <div class="form-group">
                    <label class="col-md-2 control-label">书名</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" disabled id="book_name" placeholder="请输入书名" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">作者</label>
                    <div class="col-md-10">
                        <input type="text" id="book_auth" disabled  class="form-control" placeholder="作者">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">出版社</label>
                    <div class="col-md-10">
                        <input type="text" disabled class="form-control" id="book_press" placeholder="请输入出版社名称" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书数量</label>
                    <div class="col-md-10">
                        <input type="number" disabled class="form-control" id="book_number" placeholder="请输入数量" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">图书分类</label>
                    <div class="col-sm-10">
                        <select class="form-control" disabled id="bookclass">
                            <option value="">请选择分类</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书简介</label>
                    <div class="col-md-10">
                        <textarea name="" id="book_introduction" disabled class="form-control">

                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书详情</label>
                    <div class="col-md-10">
                        <textarea name="" id="book_detail" disabled="" rows="20" class="form-control">

                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书封面</label>
                    <div class="col-md-10">
                        <img src="" alt="" id="book_img" style="width:400px;height:auto">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <a href="/booklist"><button  class="btn btn-default m-l-10" >返回</button></a>
                    </div>
                </div>

            </div>
        </div> <!-- panel-body -->
    </div>
@endsection
@section('jsfile')
    <script src="{{asset('js/booklist/bookinfo.js')}}"></script>
@endsection