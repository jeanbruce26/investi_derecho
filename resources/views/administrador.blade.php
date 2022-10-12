<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('titulo', 'Dashboard')</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

        <!-- jquery.vectormap css -->
        <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
            type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>

        <script src="https://use.fontawesome.com/def3009507.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .mostrar {
                display: none;
                transition: all 2s ease-out;
            }
            .nombre {
                cursor: pointer;
            }
            .nombre:hover {
                color: blue;
                -webkit-text-decoration-line: underline; /* Safari */
                text-decoration-line: underline;
                transition: color .3s;
            }
            @media (max-width: 992px) {
                #menu-boton {
                    display: none;
                }
            }
        </style>
        @yield('css')

        @livewireStyles
    </head>

    <body data-layout="detached" data-topbar="colored">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-end">

                            <div class="dropdown d-none d-lg-inline-block ms-1">
                                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen"></i>
                                </button>
                            </div>

                            <div class="dropdown d-inline-block">

                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="{{asset('assets/img/avatar.png')}}"
                                        alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <div class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="{{asset('assets/img/derecho.png')}}" alt="" height="35">
                                    </span>
                                    <span class="logo-lg">
                                        <div class="d-flex justify-content-evenly align-items-center altura">
                                            <img src="{{asset('assets/img/derecho.png')}}" alt="" height="40">
                                            <h6 class="ms-2 mt-2"><strong class="text-white">TERMÓMETRO DEL INVESTIGADOR</strong></h6>
                                        </div>
                                    </span>
                                </div>
                            </div>

                            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" onclick="myFunction()" id="menu-boton">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                            <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                                id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                        </div>

                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu" id="menuDespegable">

                <div class="h-100">

                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="{{asset('assets/img/avatar.png')}}" alt="" class="avatar-md mx-auto rounded-circle">
                        </div>

                        <div class="mt-3">
                            <a class="text-dark fw-medium font-size-16">{{ auth()->user()->name }}</a>
                            <p class="text-body mt-1 mb-0 font-size-13">{{ auth()->user()->cargo }}</p>

                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="/" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard-outline"></i><span class="badge rounded-pill bg-info float-end"></span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('persona.index')}}" class="waves-effect">
                                    <i class="mdi mdi-account"></i><span class="badge rounded-pill bg-info float-end"></span>
                                    <span>Persona</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('proyecto.index')}}" class="waves-effect">
                                    <i class="mdi mdi-file-document-multiple"></i><span class="badge rounded-pill bg-info float-end"></span>
                                    <span>Proyectos</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18">@yield('titulo', 'Dashboard')</h4>

                                @yield('sub-titulo')

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            @yield('content')
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <script>document.write(new Date().getFullYear())</script> © Sistema de Registro de Proyectos de Investigación en la Facultad de Derecho y Ciencias Políticas.
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

    <!-- form advanced init -->
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>

    <script>
        function myFunction() {
            var element = document.getElementById("menuDespegable");
            element.classList.toggle("mostrar");
        }
    </script>

    @stack('js')
    @yield('javascript')
    @livewireScripts
    </body>

</html>
