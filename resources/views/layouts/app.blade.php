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
    <div id="app">
        @include('flash::message')
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/../home">
                    <img src="{{ asset('img/gsagricolas.jpg')}}" alt="" style="width: 150px" title="Ir a Inicio"></img>
                </a>
                <span style="font-size:12px"><b>V:1.0</span></b>
                @if (Auth::user())
                <div style="margin-left:30%" style="margin-right:30%">
                    <a class="fas fa-home fa-2x prefix grey-text" role="button" href="{{ url('/../home') }}" name="home" title="Ir a Inicio"></a>
                    <a class="fas fa-money-check-alt fa-2x prefix grey-text" role="button" href="{{ url('/../control_quincenal') }}" name="home" style="padding:2rem" title="Ir a Facturacion Vs. Pago"></a>
                    <a class="far fa-lemon fa-2x prefix grey-text" role="button" href="{{ url('/../cosecha') }}" style="padding:2rem" name="home" title="Ir a Parte Diario de Cosecha"> </a>
                    <a class="fas fa-users fa-2x prefix grey-text" role="button" href="{{ url('/../empleado') }}" name="home" title="Ir a Empleados"> </a>

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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('INGRESÁ') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRATE') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @role('Administrador')  
                             <li class="nav-item nav-dropdown">
                                <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-group"></i> Autenticacion</a>
                                <ul class="nav-dropdown-items">
                                    <li><a class="nav-item" href="{{ route('users.index') }}"><i class="nav-icon fa fa-user"></i> <span>ABM Usuarios</span></a></li>
                                    <li><a class="nav-item" href="{{ route('permisos.index') }}"><i class="nav-icon fa fa-key"></i><span>ABM Permisos</span></a></li>
                                    <li><a class="nav-item" href="{{ route('roles.index') }}"><i class="nav-icon fa fa-users"></i><span>ABM Roles</span></a></li>
                                </ul>
                            </li>
                        
                            @endrole
                        @endguest
                     
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}"></script>
    <!-- Your custom scripts (optional) -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
<!--
<script>
    // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script> -->

</html>