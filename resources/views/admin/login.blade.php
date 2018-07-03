<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="img/favicon_1.ico">

    <title>Velonic - Responsive Admin Dashboard Template</title>

    <!-- Google-Fonts -->
    <link href='Css/03a7988f4261455a8379efb98c6852cb.css' rel='stylesheet'>


    <!-- Bootstrap core CSS -->
    <link href="{{asset('html5/Css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('html5/Css/bootstrap-reset.css')}}" rel="stylesheet">

    <!--Animation css-->
    <link href="{{asset('html5/Css/animate.css')}}" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="{{asset('html5/Css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('html5/Css/ionicons.min.css')}}" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="Css/morris.css">


    <!-- Custom styles for this template -->
    <link href="{{asset('html5/Css/style.css')}}" rel="stylesheet">
    <link href="{{asset('html5/Css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('html5/Css/style-responsive.css" rel="stylesheet" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="Scripts/html5shiv.js"></script>
    <script src="Scripts/respond.min.js"></script>
    <![endif]-->

</head>


<body>

<div class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h3 class="text-center m-t-10"> Sign In to <strong>Velonic</strong> </h3>
        </div>

        <form class="form-horizontal m-t-40" action="index.html">

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" placeholder="Username">
                </div>
            </div>
            <div class="form-group ">

                <div class="col-xs-12">
                    <input class="form-control" type="password" placeholder="Password">
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <label class="cr-styled">
                        <input type="checkbox" checked>
                        <i class="fa"></i>
                        Remember me
                    </label>
                </div>
            </div>

            <div class="form-group text-right">
                <div class="col-xs-12">
                    <button class="btn btn-purple w-md" type="submit">Log In</button>
                </div>
            </div>
            <div class="form-group m-t-30">
                <div class="col-sm-7">
                    <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                </div>
                <div class="col-sm-5 text-right">
                    <a href="register.html">Create an account</a>
                </div>
            </div>
        </form>

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
