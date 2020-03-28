@extends('layouts.app')


@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">ALTA DE NUEVO USUARIO</div>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Tenemos algun problema con su entrada.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>NOMBRE:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nombre usuario','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-4 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>NOMBRE DE USUARIO&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
                    <input type="text" name="name" aria-label="name" class="form-control">
                </div>


                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CORREO ELECTRONICO:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Correo Electronico','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>CORREO ELECTRONICO</strong></span>
                    </div>
                    <input type="email" name="email" aria-label="name" class="form-control">
                </div>

                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CLAVE:</strong>
                        {!! Form::password('password', array('placeholder' => 'Clave (4 numeros)','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>CLAVE (numerico de 4)&nbsp;</strong></span>
                    </div>
                    <input type="password" name="password" aria-label="name" class="form-control">
                </div>

                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CONFIRMACION DE CLAVE:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirme la clave','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>CONFIRMACION CLAVE</strong></span>
                    </div>
                    <input type="password" name="confirm-password" aria-label="name" class="form-control">
                </div>


                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>ROL:</strong>
                        {!! Form::select('roles[]',$roles,[], array('class' => 'form-control','FormControlSelect')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><strong>ASIGNACION DE ROL&nbsp;&nbsp;&nbsp;&nbsp;</strong></label>
                    </div>
                    <select class="browser-default custom-select" id="inputGroupSelect01" name="roles">
                        <option selected>Elija...</option>
                        @foreach($roles as $rol)
                        <option value="{{$rol}}">{{$rol}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="form-group col-md-6 col-form-label text-center">
                        <button type="submit" class="btn btn-success">GRABAR</button>
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}


    @endsection