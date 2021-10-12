<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    {{-- <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet"> --}}
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container,
        .select2-container>.selection,
        .select2-container>.selection>.select2-selection {
            display: block;
            height: calc(1.6em + 0.75rem + 2px);
        }

        .select2-selection__rendered {
            margin-top: -5px !important;
        }

        .select2-selection__arrow {
            margin-top: 5px;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- @extends('layouts.navbar') --}}
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href=" {{ url('home') }} " class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"> {{ Auth::user()->nama }} </i>
                        <p> </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        @if (Auth::user()->role === 'Admin')
                        <a href="profile" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        @elseif (Auth::user()->role === 'Pegawai')
                        <a href="profilePegawai" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        @endif 
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off mr-2"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav_item"></li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @extends('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        @extends('layouts.footer')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src=" {{ asset('js/app.js') }}"></script>
    <script src=" {{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src=" {{ asset('plugins/select2/js/select2.min.js') }}"></script>
    <script src=" {{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script> --}}
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    @stack('js')
</body>

</html>
