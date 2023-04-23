<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- GSA icon -->
    <link rel="icon" href="{{ asset ('img/favicon.ico')}}" type="image/x-icon">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">-->
    <script src="https://kit.fontawesome.com/4c51a94b4c.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5cccd5eea8.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css')}}">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style-app1.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <script type="text/javascript" src="{{ asset('js/abre_cierra.js')}}"></script>
</head>


<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <img src="{{ asset('img/gsagricolas.jpg')}}" alt="" style="width: 150px"></img>
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
    <script type="text/javascript" src="{{ asset('js/abre_cierra.js')}}"></script>
</body>

</html>