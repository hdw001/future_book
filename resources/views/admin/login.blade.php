<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="img/favicon_1.ico"/>
    <title>未来图书管理系统</title>
    <!-- Google-Fonts -->
    <link href='Css/03a7988f4261455a8379efb98c6852cb.css' rel='stylesheet'/>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('html5/Css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('html5/Css/bootstrap-reset.css')}}" rel="stylesheet"/>

    <!--Animation css-->
    <link href="{{asset('html5/Css/animate.css')}}" rel="stylesheet"/>

    <!--Icon-fonts css-->
    <link href="{{asset('html5/Css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="{{asset('html5/Css/ionicons.min.css')}}" rel="stylesheet"/>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="Css/morris.css"/>


    <!-- Custom styles for this template -->
    <link href="{{asset('html5/Css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('html5/Css/helper.css')}}" rel="stylesheet"/>
    <link href="{{asset('html5/Css/style-responsive.css')}}" />

</head>


<body>

<div class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h3 class="text-center m-t-10"> 登录 <strong>未来图书管理系统</strong> </h3>
        </div>

        <div class="form-horizontal m-t-40" >

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" id="user_id" type="text" placeholder="请输入用户ID">
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" id="user_pass"  type="password" placeholder="密码">
                </div>
            </div>
            <div class="form-group text-right">
                <div class="col-xs-12" style="text-align: center;">
                    <button class="btn btn-purple w-md" id="login">登录</button>
                </div>
            </div>
            <div class="form-group" id="error_mag">
                <div class="col-xs-12 error_mag" style="text-align: center;color:red;">

                </div>
            </div>
        </div>

    </div>
</div>




<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('Scripts/jquery.js')}}"></script>
<script src="{{asset('Scripts/bootstrap.min.js')}}"></script>
<script src="{{asset('Scripts/pace.min.js')}}"></script>
<script src="{{asset('Scripts/wow.min.js')}}"></script>
<script src="{{asset('Scripts/jquery.nicescroll.js')}}" type="text/javascript"></script>

</body>
</html>
<script src="Scripts/jquery.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(function () {
        $("#login").on('click',function(){
            $.post('/userlogin',{
                work_number:$("#user_id").val(),
                password:$("#user_pass").val()
            },function (data) {
                if(data.code==2000){
                    var data=data.data;
                    $("#error_mag").hide();
                    $("#error_mag").find('.error_mag').html('');
                    window.location.href='/home';
                }else{
                    $("#error_mag").show();
                    $("#error_mag").find('.error_mag').html(data.msg);
                }

            })
        })



    })
</script>
