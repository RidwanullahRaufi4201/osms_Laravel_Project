<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Title Page-->
    <title>Dashboard</title>
   @yield('css')
    <!-- Fontfaces CSS-->
    <link href="{{asset("css/font-face.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/font-awesome-5/css/fontawesome-all.min.css")}}"rel="stylesheet" media="all">
    <link href="{{asset("vendor/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset("vendor/bootstrap-4.1/bootstrap.min.css")}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset("vendor/animsition/animsition.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/wow/animate.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/css-hamburgers/hamburgers.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/slick/slick.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{asset("vendor/perfect-scrollbar/perfect-scrollbar.css")}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset("css/theme.css")}}" rel="stylesheet" media="all">

</head>

<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{route("dashboard")}}">
                            <img
                            class="mx-auto w-48"
                            src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                            alt="logo" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <ul class="list-unstyled navbar__list">
                    <li @if ( $page=="dashboard") class="active"      @else   class=""  @endif >
                        <a href="{{route("dashboard")}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    
                    </li>
                  @can('isAdmin')
                      
                  <li @if ( $page=="profile") class="active"      @else   class=""  @endif >
                    <a href={{route("profile.edit")}}>
                        <i class="fa fa-user"></i>
Profile</a>
                
                  <li @if ( $page=="workorder") class="active "      @else   class=""  @endif >
                    <a href={{route("showworkorderpage")}}>
                        <i class="fa fa-briefcase"></i>
                          Work Order</a>
                </li>
                <li @if ( $page=="requests") class="active "      @else   class=""  @endif >
                    <a href={{route("showrequestspage")}}>
                        <i class="fa fa-wrench"></i>Requests</a>
                </li>
                <li @if ( $page=="technicians") class="active "      @else   class=" "  @endif >
                    <a href={{route("showtechnicianspage")}}>
                        <i class="far fa-check-square"></i>Technicains</a>
                </li>
                <li @if ( $page=="requesters") class="active"      @else   class=""  @endif >
                    <a href={{route("showrequesterspage")}}>
                        <i class="fas fa-calendar-alt"></i>Requestors</a>
                </li>
                <li @if ( $page=="selfreport") class="active"      @else   class=""  @endif >
                    <a href={{route("showselfreportpage")}}>
                        <i class="fa fa-calculator"></i>
                          Self Report</a>
                </li>
                <li @if ( $page=="workreport") class="active"      @else   class=""  @endif >
                    <a  href={{route("showworkreportpage")}}>
                        <i class="fa fa-flag"></i>
                        Work Report</a>
               
                </li>
                <li @if ( $page=="adduserpage") class="active"      @else   class=""  @endif >
                    <a  href={{route("showcreateuser")}}>
                        <i class="fa fa-user"></i>
                        Add User</a>
               
                </li>
                <li @if ( $page=="settings") class="active"      @else   class=""  @endif >
                    <a  href={{route("showsettingspage")}}>
                        <i class="fa fa-cog"></i>
                        Settings</a>
               
                </li>
                    @endcan 
                    
                </ul>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{route("dashboard")}}">
                    <img
                    class="mx-auto w-75"
                    src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    alt="logo" />                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                
                        <li @if ( $page=="dashboard") class="active"      @else   class=""  @endif >
                            <a href="{{route("dashboard")}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        
                        </li>


                @can('isAdmin')
                    
                <li @if ( $page=="profile") class="active"      @else   class=""  @endif >
                    <a href={{route("profile.edit")}}>
                        <i class="fa fa-user"></i>
Profile</a>
                       
                        <li @if ( $page=="workorder") class="active "      @else   class=""  @endif >
                            <a href={{route("showworkorderpage")}}>
                                <i class="fa fa-briefcase"></i>
                                  Work Order</a>
                        </li>
                        <li @if ( $page=="requests") class="active "      @else   class=""  @endif >
                            <a href={{route("showrequestspage")}}>
                                <i class="fa fa-wrench"></i>Requests</a>
                        </li>
                        <li @if ( $page=="technicians") class="active "      @else   class=" "  @endif >
                            <a href={{route("showtechnicianspage")}}>
                                <i class="far fa-check-square"></i>Technicains</a>
                        </li>
                        <li @if ( $page=="requesters") class="active"      @else   class=""  @endif >
                            <a href={{route("showrequesterspage")}}>
                                <i class="fas fa-calendar-alt"></i>Requestors</a>
                        </li>
                        <li @if ( $page=="selfreport") class="active"      @else   class=""  @endif >
                            <a href={{route("showselfreportpage")}}>
                                <i class="fa fa-calculator"></i>
                                  Self Report</a>
                        </li>
                        <li @if ( $page=="workreport") class="active"      @else   class=""  @endif >
                            <a  href={{route("showworkreportpage")}}>
                                <i class="fa fa-flag"></i>
                                Work Report</a>
                       
                        </li>
                        <li @if ( $page=="adduserpage") class="active"      @else   class=""  @endif >
                            <a  href={{route("showcreateuser")}}>
                                <i class="fa fa-user"></i>
                                Add User</a>
                       
                        </li>
                        <li @if ( $page=="checkreview") class="active"      @else   class=""  @endif >
                            <a  href={{route("checkreview")}}>
                                <i class="fa fa-flag"></i>
                                Reviews</a>
                       
                        </li>
                        <li @if ( $page=="settings") class="active"      @else   class=""  @endif >
                            <a  href={{route("showsettingspage")}}>
                                <i class="fa fa-cog"></i>
                                Settings</a>
                       
                        </li>
                        <li @if ( $page=="workreport") class="active"      @else   class=""  @endif >
                            <form action="{{route("logout")}}" method="post">
                                @csrf
                                <button type="submit" class="text-center btn btn-sm btn-danger w-100" >
                                    <i class="zmdi zmdi-power"></i> &nbsp; Logout</button>
                            </form>
                            
                       
                        </li>
                        @endcan
                        

                        @can('isUser')
                            
                        
                        <li @if ( $page=="profile") class="active"      @else   class=""  @endif >
                            <a href={{route("profile.edit")}}>
                                <i class="fa fa-user"></i>
Profile</a>
                        </li>
                        <li @if ( $page=="submitrequest") class="active"      @else   class=""  @endif >
                            <a href={{route("submitrequestpage")}}>
                                <i class="fa fa-paper-plane"></i>
Submit Request</a>
                        </li>
                        <li @if ( $page=="requeststatus") class="active"      @else   class=""  @endif >
                            <a href={{route("requeststatuspage")}}>
                                <i class="fa fa-exclamation-triangle"></i>

Request Status</a>
                        </li>
                        <li @if ( $page=="allrequests") class="active"      @else   class=""  @endif >
                            <a  href={{route("allrequestspage")}}>
                                <i class="fa fa-folder"></i>All Request</a>
                       
                        </li>
                        <li @if ( $page=="review") class="active"      @else   class=""  @endif >
                            <a  href={{route("reviewourservice")}}>
                                <i class="fa fa-folder"></i>Review to Service</a>
                       
                        </li>
                        <li @if ( $page=="workreport") class="active"      @else   class=""  @endif >
                            <form action="{{route("logout")}}" method="post">
                                @csrf
                                <button type="submit" class="text-center btn btn-sm btn-danger w-100" >
                                    <i class="zmdi zmdi-power"></i> &nbsp; Logout</button>
                            </form>
                           
                        </li>
                        @endcan
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit bg-danger" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{auth()->user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="{{route("profile.edit")}}">{{auth()->user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{auth()->user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{route("profile.edit")}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer text-center">
                                                <form action="{{route("logout")}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="text-center btn btn-sm btn-danger w-100" >
                                                        <i class="zmdi zmdi-power"></i> &nbsp; Logout</button>
                                                </form>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

           @yield('content')
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
   

    <!-- Jquery JS-->
    <script src="{{asset("vendor/jquery-3.2.1.min.js")}}" ></script>
    <!-- Bootstrap JS-->
    <script src="{{asset("vendor/bootstrap-4.1/popper.min.js")}}" ></script>
    <script src="{{asset("vendor/bootstrap-4.1/bootstrap.min.js")}}" ></script>
    <!-- Vendor JS       -->
    <script src="{{asset("vendor/slick/slick.min.js")}}" >
    </script>
    <script src="{{asset("vendor/wow/wow.min.js")}}" ></script>
    <script src="{{asset("vendor/animsition/animsition.min.js")}}" ></script>
    <script src="{{asset("vendor/bootstrap-progressbar/bootstrap-progressbar.min.js")}}" >
    </script>
    <script src="{{asset("vendor/counter-up/jquery.waypoints.min.js")}}" ></script>
    <script src="{{asset("vendor/counter-up/jquery.counterup.min.js")}}" >
    </script>
    <script src="{{asset("vendor/circle-progress/circle-progress.min.js")}}" ></script>
    <script src="{{asset("vendor/perfect-scrollbar/perfect-scrollbar.js")}}" ></script>
    {{-- <script src="{{asset("vendor/chartjs/Chart.bundle.min.js")}}" ></script> --}}
    <script src="{{asset("vendor/select2/select2.min.js")}}" >
    </script>

    <!-- Main JS-->
    <script src="{{asset("js/main.js")}}" ></script>
    @yield('js')
</body>

</html>
<!-- end document-->
