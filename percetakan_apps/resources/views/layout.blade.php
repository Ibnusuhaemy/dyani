<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Dashboard - Dyani Printing</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!--base css styles-->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">

        <!--page specific css styles-->

        <!--flaty css styles-->
        <link rel="stylesheet" href="{{ asset('css/flaty.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flaty-responsive.css') }}">

        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    </head>
    <body>

        <!-- BEGIN Navbar -->
        <div id="navbar" class="navbar">
            <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
                <span class="fa fa-bars"></span>
            </button>
            <a class="navbar-brand" href="#">
                <small>
                    <i class="fa fa-desktop"></i>
                    Dyani Printing
                </small>
            </a>

            <!-- BEGIN Navbar Buttons -->
            <ul class="nav flaty-nav pull-right">

                <!-- BEGIN Button Notifications -->
                <li class="hidden-xs">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-important">2</span>
                    </a>

                    <!-- BEGIN Notifications Dropdown -->
                    <ul class="dropdown-navbar dropdown-menu">
                        <li class="nav-header">
                            <i class="fa fa-warning"></i>
                            2 Notifications
                        </li>

                        <li class="notify">
                            <a href="#">
                                <i class="fa fa-warning orange"></i>
                                <p>Stok Tinta Cair Biru tinggal 5 liter</p>
                            </a>
                        </li>

                        <li class="notify">
                            <a href="#">
                                <i class="fa fa-shopping-cart green"></i>
                                <p>Hari ini ada 4 order baru</p>
                            </a>
                        </li>

                        <li class="more">
                            <a href="#">See all notifications</a>
                        </li>
                    </ul>
                    <!-- END Notifications Dropdown -->
                </li>
                <!-- END Button Notifications -->

                <!-- BEGIN Button User -->
                <li class="user-profile">
                    <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                        <img class="nav-user-photo" src="img/demo/avatar/avatar1.jpg" alt="Penny's Photo" />
                        <span class="hhh" id="user_info">
                            {{ Auth::user()->name }}
                        </span>
                        <i class="fa fa-caret-down"></i>
                    </a>

                    <!-- BEGIN User Dropdown -->
                    <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                        <li class="nav-header">
                            <i class="fa fa-clock-o"></i>
                            Logined From 20:45
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                Account Settings
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                Edit Profile
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-question"></i>
                                Help
                            </a>
                        </li>

                        <li class="divider visible-xs"></li>

                        <li class="visible-xs">
                            <a href="#">
                                <i class="fa fa-tasks"></i>
                                Tasks
                                <span class="badge badge-warning">4</span>
                            </a>
                        </li>
                        <li class="visible-xs">
                            <a href="#">
                                <i class="fa fa-bell"></i>
                                Notifications
                                <span class="badge badge-important">8</span>
                            </a>
                        </li>
                        <li class="visible-xs">
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                Messages
                                <span class="badge badge-success">5</span>
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- BEGIN User Dropdown -->
                </li>
                <!-- END Button User -->
            </ul>
            <!-- END Navbar Buttons -->
        </div>
        <!-- END Navbar -->

        <!-- BEGIN Container -->
        <div class="container" id="main-container">
            <!-- BEGIN Sidebar -->
            <div id="sidebar" class="navbar-collapse collapse">
                <!-- BEGIN Navlist -->
                <ul class="nav nav-list">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="glyphicon glyphicon-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-archive"></i>
                                <span>Master</span>
                                <b class="arrow fa fa-angle-right"></b>
                            </a>
                            <!-- BEGIN Submenu -->
                            <ul class="submenu">
                                        <li>
                                            <a href="{{ url('/tkonsumen') }}">
                                                <i class="glyphicon glyphicon-user"></i>
                                                <span>Konsumen</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/tkaryawan') }}">
                                                <i class="fa fa-users"></i>
                                                <span>Karyawan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/tbahan') }}">
                                                <i class="glyphicon glyphicon-list-alt"></i>
                                                <span>Bahan Baku</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/tkategori') }}">
                                                <i class="glyphicon glyphicon-tasks"></i>
                                                <span>Kategori Bahan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/tukuran') }}">
                                                <i class="fa fa-tags"></i>
                                                <span>Ukuran</span>
                                            </a>
                                        </li>
                                        <li>
                                                <a href="{{ url('/tbank') }}">
                                                    <i class="fa fa-credit-card"></i>
                                                    <span>Bank</span>
                                                </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/tsup') }}">
                                                <i class="fa fa-briefcase"></i>
                                                <span>Supplier</span>
                                            </a>
                                        </li>
                            </ul>
                            <!-- END Submenu -->
                    </li>
                    <li>
                        <a href="{{ url('/tdatapesan') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Pemesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/torder') }}">
                            <i class="fa fa-users"></i>
                            <span>Order Desain</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/tproduksi') }}">
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Produksi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/ttransaksi') }}">
                            <i class="glyphicon glyphicon-tasks"></i>
                            <span>Transaksi Gudang</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/tlaporan') }}">
                            <i class="fa fa-tags"></i>
                            <span>Laporan Data</span>
                        </a>
                    </li>
                </ul>
                <!-- END Navlist -->

                <!-- BEGIN Sidebar Collapse Button -->
                <div id="sidebar-collapse" class="visible-lg">
                    <i class="fa fa-angle-double-left"></i>
                </div>
                <!-- END Sidebar Collapse Button -->
            </div>
            <!-- END Sidebar -->
            
            <!-- BEGIN Content -->
            <div id="main-content">
                @yield('content')
            </div>
            <!-- END Content -->
        </div>
        @yield("modal")
        <!-- END Container -->


        <!--basic scripts-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('assets/jquery/jquery-2.1.4.min.js"><\/script>') }}"><\/script>')</script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/jquery-cookie/jquery.cookie.js') }}"></script>

        <!--page specific plugin scripts-->
        <script src="{{ asset('assets/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('assets/flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('assets/flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('assets/flot/jquery.flot.crosshair.js') }}"></script>
        <script src="{{ asset('assets/flot/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('assets/sparkline/jquery.sparkline.min.js') }}"></script>

        <!--flaty scripts-->
        <script src="{{ asset('js/flaty.js') }}"></script>
        <script src="{{ asset('js/flaty-demo-codes.js') }}"></script>

        @yield("script")

    </body>
</html>
