<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{$title}} | Manajemen Surat</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- class="wrapper">
        <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <h5 class="font-weight-bold mb-0 mt-2 d-none d-sm-inline-block">APLIKASI MANAJEMEN SURAT</h5>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{Auth::user()->name}}</span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#lihatprofile">
                        <i class="fas fa-user mr-2"></i> Profil Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Keluar / Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Modal Profile -->
    <div class="modal fade" id="lihatprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="nav-icon fas fa-user my-1 btn-sm-1"></i>
                        &nbsp;Profil Saya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <h6><label for="nama">Nama </label></h6>
                        </div>
                        <div class="col-9">
                            <h6><label for="nama"> : {{auth()->user()->name}}</label></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h6><label for="nama">Email </label></h6>
                        </div>
                        <div class="col-9">
                            <h6><label for="nama"> : {{auth()->user()->email}}</label></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h6><label for="nama">Level User </label></h6>
                        </div>
                        <div class="col-9">
                            <h6><label for="nama"> :
                                    @if(auth()->user()->role == 1)
                                    Admin
                                    @else
                                    Petugas
                                    @endif
                                </label></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="/email.png" alt="Logo" class="brand-image" style="opacity: .8">
            <span class="brand-text font-weight-light">Manajemen Surat</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/avatar/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            @if (auth()->user()->role == 1)
            @include('layouts.sidebar_admin')
            @else
            @include('layouts.sidebar_petugas')
            @endif
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main Content -->
        @yield('content')
        <!-- End Main Content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Theme By <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0
        </div>
    </footer>
    </!-->
    <!-- ./wrapper -->

    @include('sweetalert::alert')


    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <!-- Page Scripts -->
    @yield('scripts')
    <!-- End Page Scripts -->
</body>

</html>