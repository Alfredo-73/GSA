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
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!--css de barra lateral para inicio solamente en app3.blade.php-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!--Navbar-->
<nav class="navbar-light default-color lighten-4 barra">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">GSA</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/../home">Inicio
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/../ersumen_control">Facturacion</a>
            </li>
            <li class="nav-item">
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
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tablas del Sistema</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/../abm_empresa"><i class="fas fa-industry"></i>ABM Empresas</a>
                    <a class="dropdown-item" href="/../abm_cliente"><i class="far fa-handshake"></i>ABM Clientes</a>
                    <a class="dropdown-item" href="/../abm_capataz"><i class="fas fa-user-friends"></i>ABM Capataces</a>
                    <a class="dropdown-item" href="/../abm_quincena"><i class="far fa-calendar-alt"></i>ABM Quincenas</a>
                </div>
            </li>

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