<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSA</title>
</head>

<body>
    @extends('layouts.app3')
    @section('content')
    <div class="container-fluid logo">
        <div class="view overlay col-10 logo" style="margin-top:0rem; height:50%">
            <img src="{{ asset('img/LOGO-GSA.jpg')}}" class="ml-5 logo" style="width:85%" alt="Sample image with waves effect.">
            <!--<img src="{{ asset('img/logotipo-y-logo.jpg')}}" class="img-fluid mx-auto" alt="Sample image with waves effect.">-->
            <a>
                <!--<div class="mask waves-effect rgba-white-slight"></div>-->
            </a>
        </div>
        @endsection


</body>

</html>