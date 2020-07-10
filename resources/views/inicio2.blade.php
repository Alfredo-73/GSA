<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSA</title>
</head>

<body>
    @extends('layouts.barra_menu')
    @section('content')
    <div class=" container-fluid">

        <div class="view overlay col-12" style="margin-top:0rem; height:50rem">
            <img src="{{ asset('img/gsagricolas.jpg')}}" class="img-fluid mx-auto" alt="Sample image with waves effect.">
            <!--<img src="{{ asset('img/logotipo-y-logo.jpg')}}" class="img-fluid mx-auto" alt="Sample image with waves effect.">-->
            <a>
                <!--<div class="mask waves-effect rgba-white-slight"></div>-->
            </a>
        </div>
        @endsection

</body>

</html>