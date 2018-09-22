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
                        <input type="text" class="form-control" id="book_name" placeholder="请输入书名" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">作者</label>
                    <div class="col-md-10">
                        <input type="text" id="book_auth"  class="form-control" placeholder="作者">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">出版社</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="book_press" placeholder="请输入出版社名称" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书数量</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="book_number" placeholder="请输入数量" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">图书分类</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="bookclass">
                            <option value="">请选择分类</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书简介</label>
                    <div class="col-md-10">
                        <textarea name="" id="book_introduction"  class="form-control">

                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书详情</label>
                    <div class="col-md-10">
                        <textarea name="" id="book_detail" rows="20" class="form-control">

                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">图书封面</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control" id="book_img">
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
    <script src="{{asset('js/booklist/bookadd.js')}}"></script>
@endsection