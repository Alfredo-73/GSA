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
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">-->
    <script src="https://kit.fontawesome.com/4c51a94b4c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style-app1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <!--css de barra lateral para inicio solamente en app3.blade.php-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="sidebar">
        <div class="container-fluid">
            <div class="row d-flex d-sm-block flex-nowrap wrapper">
                <div class="col-md-2 float-left col-1 pl-0 collapse width show" id="sidebar">
                    <div class="list-group border-0 text-center text-md-left">

                        <div class="inicio mt-3">
                            <span>&nbsp;</span>
                            <span class="px-4 grey-text" style="font-size:12px"><b>Versión:1.0</span></b>
                            <span>&nbsp;</span>
                            <a href="/../home" class="ml-4 grey-text"><i class="fas fa-home"></i> <span>INICIO</span></a>
                            <span>&nbsp;</span>
                        </div>
                        <span>&nbsp;</span>
                        <a href="#menu1" class="list-group-item collapsed" data-toggle="collapse" aria-expanded="false"><i class="fas fa-align-justify"></i> <span class="usuario px-5 text-uppercase">{{ Auth::user()->name }}</span>&nbsp;<i class="fas fa-angle-down rotate-icon"></i></a></a>
                        <div class="collapse mb-1" id="menu1" data-parent="#sidebar">
                            @role('Administrador')
                            <a class="list-group-item" data-parent="#menu1" href="{{ route('users.index') }}"><i class="nav-icon fa fa-user" style="color:ligth-gray"></i>ABM Usuarios</a>
                            <a class="list-group-item" data-parent="#menu1" href="{{ route('permisos.index') }}"><i class="nav-icon fa fa-key" style="color:ligth-gray"></i><span>ABM Permisos</span></a>
                            <a class="list-group-item" data-parent="#menu1" href="{{ route('roles.index') }}"><i class="nav-icon fa fa-users" style="color:ligth-gray"></i><span>ABM Roles</span></a>
                            @endrole
                        </div>

                        <a href="/../resumen_control" class="list-group-item d-inline-block collapsed mt-5"><i class="fas fa-money-check-alt"></i> <span class="d-none d-md-inline" style="font-size:80%">CONTROL DE FACTURACION</span></a>

                        <span>&nbsp;</span>

                        <a href="/../cosecha" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-lemon"></i> <span class="d-none d-md-inline" style="font-size:80%">PARTE DIARIO DE COSECHA</span></a>

                        <span>&nbsp;</span>

                        <a href="/../empleado" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="d-none d-md-inline" style="font-size:80%">LISTADO DE EMPLEADOS</span></a>

                        <span>&nbsp;</span>

                        <a href="/../sancion" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-gavel"></i> <span class="d-none d-md-inline" style="font-size:80%">DETALLE DE SANCIONES</span></a>

                        <span>&nbsp;</span>

                        <a href="#menu3" class="list-group-item d-inline-block collapsed mt-3" data-toggle="collapse" aria-expanded="false"><i class="fa fa-table"></i> <span class="d-none d-md-inline" style="font-size:80%">ADMINISTRACION DE TABLAS</span>&nbsp;<i class="fas fa-angle-down rotate-icon"></i></a>
                        <div class="collapse" id="menu3" data-parent="#sidebar">
                            <a href="/../abm_empresa" class="list-group-item" data-parent="#menu3" style="font-size:75%"><i class="fas fa-industry"></i>ABM Empresas</a>
                            <a href="/../abm_cliente" class="list-group-item" data-parent="#menu3" style="font-size:75%"><i class="far fa-handshake"></i>ABM Clientes</a>
                            <a href="/../abm_capataz" class="list-group-item" data-parent="#menu3" style="font-size:75%"><i class="fas fa-user-friends"></i>ABM Capataces</a>
                            <a href="/../abm_quincena" class="list-group-item" data-parent="#menu3" style="font-size:75%"><i class="far fa-calendar-alt"></i>ABM Quincenas</a>
                        </div>

                        <span>&nbsp;</span>

                        <a class="list-group-item d-inline-block collapsed mt-3" data-parent="#sidebar" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" style="color:red">
                            <i class="fas fa-sign-out-alt"></i><span class="px-5 d-none d-md-inline mt-5"><strong>{{ __('CERRAR SESION') }}</span></strong>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark barra">

        <!-- Navbar brand -->
        <a class="navbar-brand mr-5" href="/../home">
            <img src="{{ asset('img/favicon.ico')}}" alt="" style="width:250%"></img>
        </a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse ml-2" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <!--<li class="nav-item active">
                    <a class="nav-link" href="/../home">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="/../control_quincenal">Facturacion</a>
                </li>
                <li class="nav-item text-truncate">
                    <a class="nav-link" href="/../cosecha">Parte Diario</a>
                </li>

                <!-- Dropdown Empleados-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empleados</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/../empleado">Listado de Empleados</a>
                        <a class="dropdown-item" href="/../sancion">Sanciones</a>
                    </div>
                </li>

                <!-- Dropdown Tablas-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tablas</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/../abm_empresa"><i class="fas fa-industry"></i>ABM Empresas</a>
                        <a class="dropdown-item" href="/../abm_cliente"><i class="far fa-handshake"></i>ABM Clientes</a>
                        <a class="dropdown-item" href="/../abm_capataz"><i class="fas fa-user-friends"></i>ABM Capataces</a>
                        <a class="dropdown-item" href="/../abm_quincena"><i class="far fa-calendar-alt"></i>ABM Quincenas</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <div>
                    <li class="nav-item dropdown ml-5">
                        <a href="#menu2" class="nav-link dropdown-toggle" data-toggle="collapse" aria-expanded="false"><span class="">{{ Auth::user()->name }}</span></a>
                        <div class="dropdown-menu dropdown-primary" id="menu2" aria-labelledby="navbarDropdownMenuLink">
                            @role('Administrador')
                            <a class="dropdown-item" data-parent="#menu2" href="{{ route('users.index') }}"><i class="nav-icon fa fa-user" style="color:ligth-gray"></i>ABM Usuarios</a>
                            <a class="dropdown-item" data-parent="#menu2" href="{{ route('permisos.index') }}"><i class="nav-icon fa fa-key" style="color:ligth-gray"></i><span>ABM Permisos</span></a>
                            <a class="dropdown-item" data-parent="#menu2" href="{{ route('roles.index') }}"><i class="nav-icon fa fa-users" style="color:ligth-gray"></i><span>ABM Roles</span></a>
                            @endrole
                            <a class="dropdown-item" data-parent="menu2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" style="color:red">
                                <i class="fas fa-sign-out-alt"></i><span class="d-none d-sm-inline"><strong>{{ __('CERRAR SESION') }}</span></strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </div>
                    </li>
                </div>
            </ul>

            <!-- Links -->

            <!-- <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
        </form>
    </div>-->
            <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

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