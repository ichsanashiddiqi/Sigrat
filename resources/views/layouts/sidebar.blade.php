<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=" {{ url('home') }} " class="brand-link">
        <span class="brand-text font-weight-light">SIGRAT</span>
    </a>
         @if (Auth::user()->role === 'Admin')
                    {{-- @if () --}}
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{-- <div class="image">@if (Auth::user()->avatar) --}}
                <img src="{{ asset('storage/images/' . Auth::user()->avatar) }}" class="img-circle elevation-2"
                    alt="User Image">

                {{-- @else
            <img src="images/incognito.png" class="img-circle elevation-2" alt="User Image">
            @endif --}}
                <div class="info">
                    <a href="profile" class="d-block">{{ Auth::user()->nama }}</a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Surat Masuk
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('inbox.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Surat Masuk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Surat Tugas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('outbox.index') }}" class="nav-link">
                                <i class="far fa-inbox"></i>
                                <p>List Surat Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('petugas.index') }}" class="nav-link">
                                <i class="far fa-users"></i>
                                <p>Status Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Kelola User
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('outbox.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-inbox"></i>
                        <p>
                            Surat Tugas
                        </p>
                    </a>
                </li> --}}
                @elseif (Auth::user()->role === 'Pegawai')
                    {{-- @if () --}}
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <img src="{{ asset('storage/images/' . Auth::user()->avatar) }}" class="img-circle elevation-2"
                    alt="User Image">
                <div class="info">
                    <a href="profilePegawai" class="d-block">{{ Auth::user()->nama }}</a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->    
                <li class="nav-item">
                    <a href="{{route('pegawai.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('laporanTabel')}}" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                @endif   
                
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
