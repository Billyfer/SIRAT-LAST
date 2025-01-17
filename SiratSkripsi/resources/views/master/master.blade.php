<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sirat | Dashboard</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .brand-link {
            background-color: #4e73df;
        }

        .brand-text {
            font-weight: bold;
        }

        .nav-sidebar .nav-item>.nav-link.active {
            background-color: #4e73df;
            color: white;
        }

        .main-footer {
            background-color: #f8f9fc;
            padding: 15px;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left Navbar Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right Navbar Links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('img/direktur.jpg') }}" class="img-circle elevation-2" alt="User Image"
                            style="width: 30px; height: 30px;">
                        <span class="ml-2 d-none d-sm-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        {{-- <div class="dropdown-item">
                            <i class="fas fa-user-circle mr-2"></i> Profile
                        </div> --}}
                        <div class="dropdown-item"></div>

                        <a href={{ route('profile.edit') }}>
                            <button class="dropdown-item" type="submit"><i class="fas fa-user-circle mr-2"></i>
                                Profile</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt mr-2"></i>
                                    Logout</button>
                            </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #123524">
            <a href="#" class="brand-link" style="background-color: #123524">
                <img src="{{ asset('img/logo2.png') }}" alt="Logo" class="brand-image">
                <span class="brand-text font-weight-light">SIRAT</span>
            </a>

            <div class="sidebar">
                <!-- Sidebar User Panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/direktur.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" color="white">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- Add More Menu Items -->
                        <li class="nav-item">
                            <a href="{{ url('/jamaah') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Jamaah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/karyawan') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/pembayaran') }}" class="nav-link">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/paket') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Paket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/fasilitas') }}" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>Fasilitas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/perusahaan') }}" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>Perusahaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/surat') }}" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>Surat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/referral') }}" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Referals</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- /.sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid pt-3">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer text-center">
            <strong>Copyright &copy; 2023-2025 <a href="#">Sirat</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>