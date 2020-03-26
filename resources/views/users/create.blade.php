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

                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>NOMBRE:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nombre usuario','class' => 'form-control')) !!}
                    </div>
                </div>


                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CORREO ELECTRONICO:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Correo Electronico','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CLAVE:</strong>
                        {!! Form::password('password', array('placeholder' => 'Clave (4 numeros)','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>CONFIRMACION DE CLAVE:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirme la clave','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>ROL:</strong>
                        {!! Form::select('roles[]',$roles,[], array('class' => 'form-control','FormControlSelect')) !!}
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-center">
                        <button type="submit" class="btn btn-danger">GRABAR</button>
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}


    @endsection