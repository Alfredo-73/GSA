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

        #sidebar {
            overflow: hidden;
            z-index: 3;
        }

        #sidebar .list-group {
            min-width: 400px;
            background-color: #333;
            min-height: 185vh;
            /*doy altura al menu lateral*/
        }

        #sidebar i {
            margin-right: 6px;
        }

        #sidebar .list-group-item {
            border-radius: 0;
            background-color: #333;
            color: #ccc;
            border-left: 0;
            border-right: 0;
            border-color: #2c2c2c;
            white-space: nowrap;
        }

        /* highlight active menu */
        #sidebar .list-group-item:not(.collapsed) {
            background-color: #222;
        }

        /* closed state */
        #sidebar .list-group .list-group-item[aria-expanded="false"]::after {
            content: " \f0d7";
            font-family: FontAwesome;
            display: inline;
            text-align: right;
            padding-left: 5px;
        }

        /* open state */
        #sidebar .list-group .list-group-item[aria-expanded="true"] {
            background-color: #222;
        }

        #sidebar .list-group .list-group-item[aria-expanded="true"]::after {
            content: " \f0da";
            font-family: FontAwesome;
            display: inline;
            text-align: right;
            padding-left: 5px;
        }

        /* level 1*/
        #sidebar .list-group .collapse .list-group-item,
        #sidebar .list-group .collapsing .list-group-item {
            padding-left: 20px;
        }

        /* level 2*/
        #sidebar .list-group .collapse>.collapse .list-group-item,
        #sidebar .list-group .collapse>.collapsing .list-group-item {
            padding-left: 30px;
        }

        /* level 3*/
        #sidebar .list-group .collapse>.collapse>.collapse .list-group-item {
            padding-left: 40px;
        }

        @media (max-width:768px) {
            #sidebar {
                /*min-width: 35px;
                max-width: 40px;*/
                overflow-y: auto;
                overflow-x: visible;
                transition: all 0.25s ease;
                transform: translateX(-45px);
                position: fixed;
            }

            #sidebar.show {
                transform: translateX(0);
            }

            #sidebar::-webkit-scrollbar {
                width: 0px;
            }

            #sidebar,
            #sidebar .list-group {
                min-width: 1px;
                overflow: visible;
            }

            /* overlay sub levels on small screens */
            #sidebar .list-group .collapse.show,
            #sidebar .list-group .collapsing {
                position: relative;
                z-index: 1;
                width: 195px;
                top: 0;
            }

            #sidebar .list-group>.list-group-item {
                text-align: center;
                padding: .75rem .5rem;
            }

            /* hide caret icons of top level when collapsed */
            #sidebar .list-group>.list-group-item[aria-expanded="true"]::after,
            #sidebar .list-group>.list-group-item[aria-expanded="false"]::after {
                display: none;
            }
        }

        .collapse.show {
            visibility: visible;
        }

        .collapsing {
            visibility: visible;
            height: 0;
            -webkit-transition-property: height, visibility;
            transition-property: height, visibility;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }

        .collapsing.width {
            -webkit-transition-property: width, visibility;
            transition-property: width, visibility;
            width: 0;
            height: 100%;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row d-flex d-sm-block flex-nowrap wrapper">
            <div class="col-md-2 float-left col-1 pl-0 collapse width show" id="sidebar">
                <div class="list-group border-0 text-center text-md-left">
                    <!-- <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-dashboard"></i> <span class="d-none d-md-inline">Dashboard</span> </a>
                    <div class="collapse" id="menu1" data-parent="#sidebar">
                    <a href="#menu1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 1 </a>
                    <div class="collapse" id="menu1sub1" data-parent="#menu1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item">Subitem e.1</a>
                            <a href="#" class="list-group-item">Subitem e.2</a>
                        </div>
                    </div>
                    <a href="#menu1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 2</a>
                    <div class="collapse" id="menu1sub2" data-parent="#menu1">
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 1 a</a>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 2 b</a>
                        <a href="#menu1sub1sub1" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 3 c </a>
                        <div class="collapse" id="menu1sub1sub1">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub1">Subitem 3 c.2</a>
                        </div>
                        <a href="#" class="list-group-item" data-parent="#menu1sub1">Subitem 4 d</a>
                        <a href="#menu1sub1sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">Subitem 5 e </a>
                        <div class="collapse" id="menu1sub1sub2">
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.1</a>
                            <a href="#" class="list-group-item" data-parent="#menu1sub1sub2">Subitem 5 e.2</a>
                        </div>
                    </div>
                    <a href="#" class="list-group-item">Subitem 3</a>
                </div>-->
                    <a href="/../control_quincenal" class="list-group-item d-inline-block collapsed"><i class="fas fa-money-check-alt"></i> <span class="d-none d-md-inline">CONTROL</span></a>
                    <a href="/../cosecha" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-lemon"></i> <span class="d-none d-md-inline">COSECHA</span></a>
                    <a href="/../empleado" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="d-none d-md-inline">EMPLEADOS</span></a>
                    <a href="/../sancion" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-gavel"></i> <span class="d-none d-md-inline">SANCIONES</span></a>
                    <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-table"></i> <span class="d-none d-md-inline">TABLAS </span></a>
                    <div class="collapse" id="menu3" data-parent="#sidebar">
                        <a href="/../abm_empresa" class="list-group-item" data-parent="#menu3">Empresas</a>
                        <!-- <a href="#menu3sub2" class="list-group-item" data-toggle="collapse" aria-expanded="false">3.2 </a>
                    <div class="collapse" id="menu3sub2">
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">Empresas</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">Clientes</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">Capataces</a>
                        <a href="#" class="list-group-item" data-parent="#menu3sub2">Quincenas</a>

                    </div>-->
                        <a href="/../abm_cliente" class="list-group-item" data-parent="#menu3">Clientes</a>
                        <a href="/../abm_capataz" class="list-group-item" data-parent="#menu3">Capataces</a>
                        <a href="/../abm_quincena" class="list-group-item" data-parent="#menu3">Quincenas</a>

                    </div>
                    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-calendar"></i> <span class="d-none d-md-inline">Buscar por fecha</span></a>
                    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-envelope"></i> <span class="d-none d-md-inline">Correo</span></a>
                    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-print"></i> <span class="d-none d-md-inline">Imprimir</span></a>
                </div>
            </div>

            <div class="col-10 float-left pl-md-2 pt-2 main">
                <!--<a href="#" data-target="#sidebar" data-toggle="collapse" id="Menu"><i class="text-dark fa fa-navicon fa-lg py-2 p-1"></i>Menu</a>-->

                <a id="abrir" class="abrir-cerrar" href="javascript:void(0)" onclick="mostrar()">
                    Abrir menu
                </a>
                <a id="cerrar" class="abrir-cerrar" href="javascript:void(0)" onclick="ocultar()">
                    Cerrar menu
                </a>

                <div class="">
                    <nav class="row navbar navbar-expand-lg navbar-light bg-white shadow-sm">

                        <div class="row">
                            <a class="navbar-brand" href="/../home">
                                <img src="{{ asset('img/gsagricolas.jpg')}}" alt="" style="width: 150px" title="Ir a Inicio"></img>
                            </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->

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
                                <div class="dropdown text-center">
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

                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    <main class="py-1">
        @yield('content')
    </main>

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
    
    <script>
        function mostrar() {
            document.getElementById("sidebar").style.width = "300px";
            document.getElementById("contenido").style.marginLeft = "300px";
            document.getElementById("abrir").style.display = "none";
            document.getElementById("cerrar").style.display = "inline";
        }

        function ocultar() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("contenido").style.marginLeft = "0";
            document.getElementById("abrir").style.display = "inline";
            document.getElementById("cerrar").style.display = "none";
        }
    </script>
</body>

</html>