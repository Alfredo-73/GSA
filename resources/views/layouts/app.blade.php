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
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <img src="{{ asset('img/gsagricolas.jpg')}}" alt="" style="width: 150px"></img>
            <!-- <img src="{{ asset('img/logotipo-y-logo.jpg')}}" alt="" style="width: 120px"></img>-->
        </div>
    </div>
    <main class="col-lg-12">
        @yield('content')
    </main>

</body>

</html>