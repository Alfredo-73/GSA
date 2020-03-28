@extends('layouts.app')


@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">MODIFICACION DE USUARIO</div>

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


                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>NOMBRE USUARIO:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-4 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>NOMBRE DE USUARIO&nbsp;&nbsp;&nbsp;</strong></span>
                    </div>
                    <input type="text" name="name" aria-label="name" class="form-control" value="{{ $user->name}}">
                </div>

                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CORREO ELECTRONICO:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>CORREO ELECTRONICO</strong></span>
                    </div>
                    <input type="email" name="email" aria-label="name" class="form-control" value="{{ $user->email}}">
                </div>

                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CLAVE DE USUARIO:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
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
                        <strong>CONFIRMACION CLAVE DE USUARIO:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
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
                        <strong>ROLES:</strong>
                        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','FormControlSelect')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-2 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><strong>ASIGNACION DE ROL&nbsp;&nbsp;&nbsp;&nbsp;</strong></label>
                    </div>
                    <select class="browser-default custom-select" id="inputGroupSelect01" name="roles">
                        <option selected=>Elija...</option>
                        @foreach($roles as $rol)
                        <option value="{{$rol}}">{{$rol}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                    <button type="submit" class="btn btn-success">GRABAR</button>
                    <a class="btn btn-primary" href="{{ route('users.index') }}">REGRESAR</a>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
        @endsection