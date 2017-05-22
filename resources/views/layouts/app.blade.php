<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('site_title') | FTHSS CIREBON</title>
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{url('font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{url('select2-4.0.3/dist/css/select2.min.css')}}">
    <!-- <link rel="stylesheet" href="select2-bootstrap.css"> -->
    <style>
        body {
            font-family: cursive;
            min-height: 100vh;
            position: relative;
        }

        .fa-btn {
            margin-right: 6px;
        }
        .left-figure {
                background: url(guru2.png) snow;
                background-size: contain;
                background-repeat: no-repeat;
                top: -60px;
                background-position-x: 10px;
                background-position-y: 10em;
                /* background-position: right; */
                /* background-color: white; */
                /* background-position-y: 10em; */
                position: fixed;
                left: -140px;
                /* background: #000; */
                right: 0;
                /* height: 100px; */
                bottom: 0;
                width: 100%;
        }
        .right-figure {
                   background: url(guru1.jpg) snow;
                    background-size: contain;
                    background-repeat: no-repeat;
                    top: 0;
                    /* background-position-x: 10px; */
                    background-position-y: 10em;
                    /* background-position: right; */
                    /* background-color: white; */
                    /* background-position-y: 10em; */
                    position: fixed;
                    /* left: 0; */
                    /* background: #000; */
                    right: 0;
                    /* height: 100px; */
                    width: 25%;
                    bottom: 0;
        }
    </style>
</head>
<body id="app-layout">
<div class="left-figure"></div>
<div class="right-figure"></div>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    FTHSS CIREBON
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
                    @if(Auth::user())
                        <li><a href="{{ route('data_guru') }}"><i class="fa fa-book"></i> Data Guru</a></li>
                        <li><a href="{{ route('data_sekolah') }}"><i class="fa fa-book"></i> Data Sekolah</a></li>
                        <li><a href="{{ route('rekap_sekolah') }}"><i class="fa fa-book"></i> Rekap Data Sekolah</a></li>
                        <li><a href="{{ route('data_mutasi') }}"><i class="fa fa-book"></i> Data Mutasi</a></li>
                        <li><a href="{{ route('print') }}"><i class="fa fa-print"></i> Laporan</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Masuk</a></li>
                    <li><a href="{{ url('/register') }}">Daftar</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('select2-4.0.3/dist/js/select2.full.min.js')}}"></script>
    <script src="{{url('js/vue.min.js')}}"></script>

      <!-- InputMask -->
    <script src="{{url('plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{url('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    @yield('bottscript')
    <script>
        $(function () {
            //Datemask dd/mm/yyyy
            $("[data-mask]").inputmask();
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
