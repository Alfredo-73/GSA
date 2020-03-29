@extends('layouts.app')


@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">ALTA DE NUEVO PERMISO</div>
                <div class="pull-right">

                </div>


                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Tenemos un problema con su entrada.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                {!! Form::open(array('route' => 'permisos.store','method'=>'POST')) !!}
                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>NOMBRE DEL PERMISO</strong></span>
                    </div>
                    <input type="text" name="name" aria-label="name" class="form-control">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">GRABAR</button>
                    <a class="btn btn-primary" href="{{ route('permisos.index') }}"> REGRESAR</a>
                </div>
            </div>
            {!! Form::close() !!}


            @endsection