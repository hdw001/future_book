<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="img/favicon_1.ico">

    <title>未来教育图书管理系统</title>

    <!-- Google-Fonts -->
    <link href='{{asset(url('css/03a7988f4261455a8379efb98c6852cb.css'))}}' rel='stylesheet'>

    <!-- Bootstrap core CSS -->
    <link href="{{asset(url('css/bootstrap.min.css'))}}" rel="stylesheet">
    <link href="{{asset(url('css/bootstrap-reset.css'))}}" rel="stylesheet">

    <!--Animation css-->
    <link href="{{asset(url('css/animate.css'))}}" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="{{asset(url('css/font-awesome.css'))}}" rel="stylesheet" />
    <link href="{{asset(url('css/ionicons.min.css'))}}" rel="stylesheet" />

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{asset(url('Css/morris.css'))}}">

    <!-- sweet alerts -->
    <link href="{{asset(url('css/sweet-alert.min.css'))}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset(url('css/style.css'))}}" rel="stylesheet">
    <link href="{{asset(url('css/helper.css'))}}" rel="stylesheet">
    <link href="{{asset(url('css/style-responsive.css'))}}" rel="stylesheet" />

    @yield('cssfile')
</head>


<body>

<!-- Aside Start-->
<aside class="left-panel">

    <!-- brand -->
    <div class="logo">
        <a href="index.html" class="logo-expanded">
            <img src="Picture/single-logo.png" alt="logo">
            <span class="nav-label">图书管理</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="has-submenu active" id="roleselect"><a href="#"><i class="ion-home"></i> <span class="nav-label">用户管理</span></a>
                <ul class="list-unstyled">
                    <li class="active"><a href="/userlist">用户列表</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">图书管理</span></a>
                <ul class="list-unstyled">
                    <li><a href="/booklist">图书列表</a></li>
                    <li id="bookclass"><a href="/bookclasslist">图书分类</a></li>
                    <li><a href="/bookreservelist">图书预定</a></li>
                </ul>
            </li>

        </ul>
    </nav>

</aside>
<!-- Aside Ends-->


<!--Main Content Start -->
<section class="content">

    <!-- Header -->
    <header class="top-head container-fluid">
        <button type="button" class="navbar-toggle pull-left">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>


        <!-- Left navbar -->
        <nav class=" navbar-default hidden-xs" role="navigation">
            <ul class="nav navbar-nav">

            </ul>
        </nav>

        <!-- Right navbar -->
        <ul class="list-inline navbar-right top-menu top-right-menu">


            <li class="dropdown text-center">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="Picture/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                    <span class="username" id="username"></span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                    <li><a href="#"><i class="fa fa-sign-out"></i> 退出</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- End right navbar -->

    </header>
    <!-- Header Ends -->


    <!-- Page Content Start -->
    <!-- ================== -->

    <div class="wraper container-fluid">
        @yield('content')
    </div>
    <!-- Page Content Ends -->
    <!-- ================== -->

    <!-- Footer Start -->
    <footer class="footer">
        2015 © 图书.
    </footer>
    <!-- Footer Ends -->



</section>
<!-- Main Content Ends -->



<!-- js placed at the end of the document so the pages load faster -->


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
<script src="Scripts/bootstrap.min.js"></script>
<script src="Scripts/modernizr.min.js"></script>
<script src="Scripts/pace.min.js"></script>
<script src="Scripts/wow.min.js"></script>
<script src="Scripts/jquery.scrollto.min.js"></script>
<script src="Scripts/jquery.nicescroll.js" type="text/javascript"></script>
<script src="Scripts/moment-2.2.1.js"></script>

<!-- Counter-up -->
<script src="Scripts/waypoints.min.js" type="text/javascript"></script>
<script src="Scripts/jquery.counterup.min.js" type="text/javascript"></script>

<!-- EASY PIE CHART JS -->
<script src="Scripts/easypiechart.min.js"></script>
<script src="Scripts/jquery.easypiechart.min.js"></script>
<script src="Scripts/example.js"></script>


<!--C3 Chart-->
<script src="Scripts/d3.v3.min.js"></script>
<script src="Scripts/c3.js"></script>

<!--Morris Chart-->
<script src="Scripts/morris.min.js"></script>
<script src="Scripts/raphael.min.js"></script>

<!-- sparkline -->
<script src="Scripts/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="Scripts/chart-sparkline.js" type="text/javascript"></script>

<!-- sweet alerts -->
<script src="Scripts/sweet-alert.min.js"></script>
<script src="Scripts/sweet-alert.init.js"></script>

<script src="Scripts/jquery.app.js"></script>
<!-- Chat -->
<script src="Scripts/jquery.chat.js"></script>
<!-- Dashboard -->
<script src="Scripts/jquery.dashboard.js"></script>

<!-- Todo -->
<script src="Scripts/jquery.todo.js"></script>


<script type="text/javascript">
    /* ==============================================
         Counter Up
         =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
    var url=window.location.pathname;
    $(".list-unstyled li").removeClass('active');
    $(".list-unstyled li").parents('.has-submenu').removeClass('active');
    $(".list-unstyled li a").each(function () {
        if($(this).attr('href')==url){
            $(this).parents('li').addClass('active');
            $(this).parents('.has-submenu').addClass('active')
        }
    })
    $('#username').html(getCookie('name'))
    if(getCookie('role')==1){
        $('#roleselect').show()
        $("#bookclass").show()
    }else{
        $('#roleselect').hide()
        $("#bookclass").hide()
    }
    if(getCookie('role')==2){
        $("#bookclass").show()
    }else{
        $("#bookclass").hide()
    }
    function setCookie(name,value)
    {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days*24*60*60*1000);
        document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
    }
    function getCookie(name)
    {
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
        if(arr=document.cookie.match(reg))
            return unescape(arr[2]);
        else
            return null;
    }
    function delCookie(name)
    {
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=getCookie(name);
        if(cval!=null)
            document.cookie= name + "="+cval+";expires="+exp.toGMTString();
    }
</script>
@yield('jsfile')
