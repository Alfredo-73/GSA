<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>GSA</title>
    <!-- GSA icon -->
    <link rel="icon" href="{{ asset ('img/favicon.ico')}}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>Confirmación de envío de formulario</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #nombre::placeholder {
            color: white;
            font-size: 12px;
            text-align: center;
        }

        #apellido::placeholder {
            color: white;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div id="app" class="">
                @include('flash::message')
                <nav class="">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/../home">
                            <img src="{{ asset('img/gsagricolas.jpg')}}" alt="" style="width: 150px" title="Ir a Inicio"></img>
                        </a>
                        <span style="font-size:12px"><b>V:1.0</span></b>
                        @if (Auth::user())
                        
                    </div>
                        @endif
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <!--<li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('INGRESÁ') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRATE') }}</a>
                        </li>-->
                    @endif
                    @else
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuMenu">
                            @role('Administrador')
                            <a class="dropdown-item" href="{{ route('users.index') }}"><i class="nav-icon fa fa-user" style="color:blue"></i> ABM Usuarios</a>
                            <a class="dropdown-item" href="{{ route('permisos.index') }}"><i class="nav-icon fa fa-key" style="color:blue"></i><span> ABM Permisos</span></a>
                            <a class="dropdown-item" href="{{ route('roles.index') }}"><i class="nav-icon fa fa-users" style="color:blue"></i><span> ABM Roles</span></a>
                            @endrole
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style="color:red">
                                <strong>{{ __('CERRAR SESION') }}</strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                        </div>
                    </div>
                    </li>
                </ul>
            </nav>
            </div>
        </div>
        </nav>
    </div>

    <main class="col-lg-12">
        @yield('content')
    </main>
    

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}"></script>
    <!-- Your custom scripts (optional) -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>