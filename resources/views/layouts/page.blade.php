<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page-title', config('app.name') )</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    @include('layouts.head')

    @yield('custom-header')


    @livewireStyles

    <style>
        @media print {
            @page {
                size: auto !important
            }
        }

    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
{{--    <nav class="main-header navbar navbar-expand navbar-white navbar-light">--}}
{{--        <!-- Left navbar links -->--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item d-none d-sm-inline-block">--}}
{{--                    <a href="index3.html" class="nav-link">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item d-none d-sm-inline-block">--}}
{{--                    <a href="#" class="nav-link">Contact</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

{{--    <!-- SEARCH FORM -->--}}
{{--    --}}{{--        <form class="form-inline ml-3">--}}
{{--    --}}{{--            <div class="input-group input-group-sm">--}}
{{--    --}}{{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--    --}}{{--                <div class="input-group-append">--}}
{{--    --}}{{--                    <button class="btn btn-navbar" type="submit">--}}
{{--    --}}{{--                        <i class="fas fa-search"></i>--}}
{{--    --}}{{--                    </button>--}}
{{--    --}}{{--                </div>--}}
{{--    --}}{{--            </div>--}}
{{--    --}}{{--        </form>--}}

{{--    <!-- Right navbar links -->--}}
{{--        <ul class="navbar-nav ml-auto">--}}
{{--            <!-- Messages Dropdown Menu -->--}}
{{--            <li class="nav-item dropdown">--}}

{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-comments"></i>--}}
{{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <!-- Message Start -->--}}
{{--                        <div class="media">--}}
{{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    Brad Diesel--}}
{{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">Call me whenever you can...</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Message End -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}

{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <!-- Message Start -->--}}
{{--                        <div class="media">--}}
{{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    John Pierce--}}
{{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">I got your message bro</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Message End -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <!-- Message Start -->--}}
{{--                        <div class="media">--}}
{{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                            <div class="media-body">--}}
{{--                                <h3 class="dropdown-item-title">--}}
{{--                                    Nora Silvester--}}
{{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
{{--                                </h3>--}}
{{--                                <p class="text-sm">The subject goes here</p>--}}
{{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Message End -->--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- Notifications Dropdown Menu -->--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                    <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" data-widget="fullscreen" href="#" role="button">--}}
{{--                    <i class="fas fa-expand-arrows-alt"></i>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            --}}{{--            <li class="nav-item">--}}
{{--            --}}{{--                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
{{--            --}}{{--                    <i class="fas fa-th-large"></i>--}}
{{--            --}}{{--                </a>--}}
{{--            --}}{{--            </li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
<!-- /.navbar -->


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="index3.html" class="nav-link">Home</a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="#" class="nav-link">Contact</a>--}}
            {{--            </li>--}}
        </ul>

        <!-- SEARCH FORM -->
    {{--        <form class="form-inline ml-3">--}}
    {{--            <div class="input-group input-group-sm">--}}
    {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-navbar" type="submit">--}}
    {{--                        <i class="fas fa-search"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}

    <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
        {{--            <li class="nav-item dropdown">--}}
        {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--                    <i class="far fa-comments"></i>--}}
        {{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
        {{--                </a>--}}
        {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    Brad Diesel--}}
        {{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">Call me whenever you can...</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}

        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    John Pierce--}}
        {{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">I got your message bro</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item">--}}
        {{--                        <!-- Message Start -->--}}
        {{--                        <div class="media">--}}
        {{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--                            <div class="media-body">--}}
        {{--                                <h3 class="dropdown-item-title">--}}
        {{--                                    Nora Silvester--}}
        {{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
        {{--                                </h3>--}}
        {{--                                <p class="text-sm">The subject goes here</p>--}}
        {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <!-- Message End -->--}}
        {{--                    </a>--}}
        {{--                    <div class="dropdown-divider"></div>--}}
        {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    {{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Profile</span>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button href="{{ route('logout') }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Logout
                        </button>
                    </form>


                    <div class="dropdown-divider"></div>
                    {{--                    <a href="#" class="dropdown-item">--}}
                    {{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
                    {{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
                    {{--                    </a>--}}
                    {{--                    <div class="dropdown-divider"></div>--}}
                    {{--                    <a href="#" class="dropdown-item">--}}
                    {{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
                    {{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
                    {{--                    </a>--}}
                    {{--                    <div class="dropdown-divider"></div>--}}
                    {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            {{--            <li class="nav-item">--}}
            {{--                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
            {{--                    <i class="fas fa-th-large"></i>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    {{--        <a href="index3.html" class="brand-link">--}}
    {{--            <img src="{{url('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
    {{--            <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
    {{--        </a>--}}

    <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
        @include('layouts.left-menu')
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{--                        <h1 class="m-0">Dashboard</h1>--}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">@yield('breadcrumb-item','Title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @include('alert.alert')
            @yield('body-start')


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{date('Y')}} <a href="#">{{config('app.name')}}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('AdminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('AdminLTE/dist/js/pages/dashboard.js')}}"></script>
@yield('custom-footer')

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            "lengthMenu": [10, 25, 50, 100],
            "pageLength": 25,
            buttons: [
                'copy', 'csv', 'excel', 'print', 'pageLength'
            ],
            responsive: true,
        });
    });
</script>
@livewireScripts
</body>
</html>
