<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <input class="form-control" type="text" placeholder="用户名">
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="password" placeholder="密码">
                </div>
            </div>
            <div class="form-group text-right">
                <div class="col-xs-12" style="text-align: center;">
                    <button class="btn btn-purple w-md" id="login">登录</button>
                </div>
            </div>
        </div>

    </div>
</div>




<!-- js placed at the end of the document so the pages load faster -->
<script src="Scripts/jquery.js"></script>
<script src="Scripts/bootstrap.min.js"></script>
<script src="Scripts/pace.min.js"></script>
<script src="Scripts/wow.min.js"></script>
<script src="Scripts/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="Scripts/jquery.app.js"></script>
</body>
</html>

<script>
    $(function () {
        $("#login").on('click',function(){
            $.post('/login',{
                work_number:'001',
                password:'123456'
            },function (data) {

            })
        })

    })
</script>
