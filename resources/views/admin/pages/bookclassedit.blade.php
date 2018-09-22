@extends('admin.layout.main')
@section('cssfile')
    <link rel="stylesheet" href="{{asset('css/userlist.css')}}">
    <link href="{{asset('js/page/skin/default/style.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">编辑图书分类</h3></div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <div class="form-group">
                    <label class="col-md-2 control-label">图书分类</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="book_cate_name" placeholder="请输入图书分类" value="">
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
    <script src="{{asset('js/bookclass/bookclassedit.js')}}"></script>
@endsection