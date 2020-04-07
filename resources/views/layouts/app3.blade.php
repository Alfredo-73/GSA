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
            min-height: 105vh;
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

                    <div class="inicio">
                        <span>&nbsp;</span>
                        <span class="px-5 ml-1 grey-text" style="font-size:12px"><b>V:1.0</span></b>
                        <span>&nbsp;</span>
                        <a href="/../home" class="px-5 ml-1 grey-text"><i class="fas fa-home"></i></i> <span>INICIO</span></a>
                        <span>&nbsp;</span>
                    </div>

                    <a href="#menu1" class="list-group-item d-inline-block collapsed px-5" data-toggle="collapse" aria-expanded="false"><i class="fas fa-align-justify"></i> <span class="d-none d-md-inline text-uppercase">{{ Auth::user()->name }}</span> </a>
                    <div class="collapse" id="menu1" data-parent="#sidebar">
                        @role('Administrador')
                        <a class="list-group-item px-5" data-parent="#menu1" href="{{ route('users.index') }}"><i class="nav-icon fa fa-user" style="color:ligth-gray"></i>ABM Usuarios</a>
                        <a class="list-group-item px-5" data-parent="#menu1" href="{{ route('permisos.index') }}"><i class="nav-icon fa fa-key" style="color:ligth-gray"></i><span>ABM Permisos</span></a>
                        <a class="list-group-item px-5" data-parent="#menu1" href="{{ route('roles.index') }}"><i class="nav-icon fa fa-users" style="color:ligth-gray"></i><span>ABM Roles</span></a>
                        @endrole
                    </div>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <a href="/../control_quincenal" class="list-group-item d-inline-block collapsed"><i class="fas fa-money-check-alt"></i> <span class="d-none d-md-inline">CONTROL FACTURACION</span></a>

                    <span>&nbsp;</span>

                    <a href="/../cosecha" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-lemon"></i> <span class="d-none d-md-inline">COSECHA</span></a>

                    <span>&nbsp;</span>

                    <a href="/../empleado" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="d-none d-md-inline">EMPLEADOS</span></a>

                    <span>&nbsp;</span>

                    <a href="/../sancion" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-gavel"></i> <span class="d-none d-md-inline">SANCIONES</span></a>

                    <span>&nbsp;</span>

                    <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fa fa-table"></i> <span class="d-none d-md-inline">TABLAS</span></a>
                    <div class="collapse" id="menu3" data-parent="#sidebar">
                        <a href="/../abm_empresa" class="list-group-item" data-parent="#menu3">Empresas</a>
                        <a href="/../abm_cliente" class="list-group-item" data-parent="#menu3">Clientes</a>
                        <a href="/../abm_capataz" class="list-group-item" data-parent="#menu3">Capataces</a>
                        <a href="/../abm_quincena" class="list-group-item" data-parent="#menu3">Quincenas</a>
                    </div>

                    <span>&nbsp;</span>

                    <!--<a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-calendar"></i> <span class="d-none d-md-inline">Buscar por fecha</span></a>
                    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-envelope"></i> <span class="d-none d-md-inline">Correo</span></a>
                    <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-print"></i> <span class="d-none d-md-inline">Imprimir</span></a>-->

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <a class="list-group-item d-inline-block collapsed" data-parent="#sidebar" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" style="color:red">
                        <i class="fas fa-sign-out-alt"></i><span class="d-none d-md-inline"><strong>{{ __('CERRAR SESION') }}</span></strong>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>
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
</body>

</html>