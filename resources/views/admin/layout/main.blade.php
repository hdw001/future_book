<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="img/favicon_1.ico">

    <title>Velonic - Responsive Admin Dashboard Template</title>

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


</head>


<body>

<!-- Aside Start-->
<aside class="left-panel">

    <!-- brand -->
    <div class="logo">
        <a href="index.html" class="logo-expanded">
            <img src="Picture/single-logo.png" alt="logo">
            <span class="nav-label">Velonic</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            <li class="has-submenu active"><a href="#"><i class="ion-home"></i> <span class="nav-label">Dashboard</span></a>
                <ul class="list-unstyled">
                    <li class="active"><a href="index.html">Dashboard v1</a></li>
                    <li><a href="dashboard2.html">Dashboard v2</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-flask"></i> <span class="nav-label">UI Elements</span></a>
                <ul class="list-unstyled">
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="buttons.html">Buttons</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="panels.html">Panels</a></li>
                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                    <li><a href="modals.html">Modals</a></li>
                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                    <li><a href="progressbars.html">Progress Bars</a></li>
                    <li><a href="notification.html">Notification</a></li>
                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-settings"></i> <span class="nav-label">Components</span></a>
                <ul class="list-unstyled">
                    <li><a href="grid.html">Grid</a></li>
                    <li><a href="portlets.html">Portlets</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="nestable-list.html">Nesteble</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-compose"></i> <span class="nav-label">Forms</span></a>
                <ul class="list-unstyled">
                    <li><a href="form-elements.html">General Elements</a></li>
                    <li><a href="form-validation.html">Form Validation</a></li>
                    <li><a href="form-advanced.html">Advanced Form</a></li>
                    <li><a href="form-wizard.html">Form Wizard</a></li>
                    <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                    <li><a href="code-editor.html">Code Editors</a></li>
                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                    <li><a href="image-crop.html">Image Crop</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-grid"></i> <span class="nav-label">Data Tables</span></a>
                <ul class="list-unstyled">
                    <li><a href="tables.html">Basic Tables</a></li>
                    <li><a href="table-datatable.html">Data Table</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-stats-bars"></i> <span class="nav-label">Charts</span></a>
                <ul class="list-unstyled">
                    <li><a href="morris-chart.html">Morris Chart</a></li>
                    <li><a href="chartjs.html">Chartjs</a></li>
                    <li><a href="flot-chart.html">Flot Chart</a></li>
                    <li><a href="rickshaw-chart.html">Rickshaw Chart</a></li>
                    <li><a href="c3-chart.html">C3 Chart</a></li>
                    <li><a href="other-chart.html">Other Chart</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="ion-email"></i> <span class="nav-label">Mail</span></a>
                <ul class="list-unstyled">
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="email-compose.html">Compose Mail</a></li>
                    <li><a href="email-read.html">View Mail</a></li>
                </ul>
            </li>

            <li class="has-submenu"><a href="#"><i class="ion-location"></i> <span class="nav-label">Maps</span></a>
                <ul class="list-unstyled">
                    <li><a href="gmap.html"> Google Map</a></li>
                    <li><a href="vector-map.html"> Vector Map</a></li>
                </ul>
            </li>
            <li class="has-submenu"><a href="#"><i class="ion-document"></i> <span class="nav-label">Pages</span></a>
                <ul class="list-unstyled">
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="timeline.html">Timeline</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="contact.html">Contact-list</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="recoverpw.html">Recover Password</a></li>
                    <li><a href="lock-screen.html">Lock Screen</a></li>
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="404.html">404 Error</a></li>
                    <li><a href="404_alt.html">404 alt</a></li>
                    <li><a href="500.html">500 Error</a></li>
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

        <!-- Search -->
        <form role="search" class="navbar-left app-search pull-left hidden-xs">
            <input type="text" placeholder="Search..." class="form-control">
        </form>

        <!-- Left navbar -->
        <nav class=" navbar-default hidden-xs" role="navigation">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">English <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#">German</a></li>
                        <li><a href="#">French</a></li>
                        <li><a href="#">Italian</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </li>
                <li><a href="#">Files</a></li>
                <li><a href="../frontend/" target="_blank">Frontend</a></li>
            </ul>
        </nav>

        <!-- Right navbar -->
        <ul class="list-inline navbar-right top-menu top-right-menu">
            <!-- mesages -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o "></i>
                    <span class="badge badge-sm up bg-purple count">4</span>
                </a>
                <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5001">
                    <li>
                        <p>Messages</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><img src="Picture/avatar-2.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                            <span class="block"><strong>John smith</strong></span>
                            <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 seconds ago</small></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><img src="Picture/avatar-3.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                            <span class="block"><strong>John smith</strong></span>
                            <span class="media-body block">New tasks needs to be done<br><small class="text-muted">3 minutes ago</small></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><img src="Picture/avatar-4.jpg" class="img-circle thumb-sm m-r-15" alt="img"></span>
                            <span class="block"><strong>John smith</strong></span>
                            <span class="media-body block">New tasks needs to be done<br><small class="text-muted">10 minutes ago</small></span>
                        </a>
                    </li>
                    <li>
                        <p><a href="inbox.html" class="text-right">See all Messages</a></p>
                    </li>
                </ul>
            </li>
            <!-- /messages -->
            <!-- Notification -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge badge-sm up bg-pink count">3</span>
                </a>
                <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                    <li class="noti-header">
                        <p>Notifications</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><i class="fa fa-user-plus fa-2x text-info"></i></span>
                            <span>New user registered<br><small class="text-muted">5 minutes ago</small></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><i class="fa fa-diamond fa-2x text-primary"></i></span>
                            <span>Use animate.css<br><small class="text-muted">5 minutes ago</small></span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-left"><i class="fa fa-bell-o fa-2x text-danger"></i></span>
                            <span>Send project demo files to client<br><small class="text-muted">1 hour ago</small></span>
                        </a>
                    </li>

                    <li>
                        <p><a href="#" class="text-right">See all notifications</a></p>
                    </li>
                </ul>
            </li>
            <!-- /Notification -->

            <!-- user login dropdown start-->
            <li class="dropdown text-center">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="Picture/avatar-2.jpg" class="img-circle profile-img thumb-sm">
                    <span class="username">John Deo </span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003" style="overflow: hidden; outline: none;">
                    <li><a href="profile.html"><i class="fa fa-briefcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-bell"></i> Friends <span class="label label-info pull-right mail-info">5</span></a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
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
        2015 © Velonic.
    </footer>
    <!-- Footer Ends -->



</section>
<!-- Main Content Ends -->



<!-- js placed at the end of the document so the pages load faster -->
<script src="Scripts/jquery.js"></script>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
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

</script>


</body>
</html>
