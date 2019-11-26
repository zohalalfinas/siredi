<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/vendors/selectFX/css/cs-skin-elastic.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    @yield('styles')

    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="" alt="">{{ config('app.name') }}</a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('template/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if ($title == 'Dashboard')
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a href="{{ url('') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    @if (auth()->user()->peran->peran == "Dokter")
                        
                        @if ($title == 'Pasien')
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{ route('pasien.index')}}" > <i class="menu-icon fa fa-user"></i>Pasien</a>
                        </li>
                    @elseif (auth()->user()->peran->peran == "Administrator")
                        @if ($title == 'active')
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{ route('pasien.index')}}" > <i class="menu-icon fa fa-user"></i>Pasien</a>
                        </li>
                        @if ($title == 'Dokter')
                            <li class="active">
                        @else
                            <li>
                        @endif
                            
                        </li>
                    @elseif (auth()->user()->peran->peran == "Super Admin")
                        @if ($title == 'Pengguna')
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{ route('pengguna.index')}}" > <i class="menu-icon fa fa-users"></i>Pengguna</a>
                        </li>
                        {{ route('pengguna.index')}}
                        
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('template/images/admin.jpg')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>
                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $title }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @yield('breadcrumb')
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <!-- .content -->
        @yield('content')
    </div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{asset('template/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('template/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('template/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('template/assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@include('sweet::alert')

@stack('scripts')
</body>

</html>
