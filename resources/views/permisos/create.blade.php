@extends('layouts.app1')


@section('content')
<div class="row container-fluid col-10 mt-5" id="contenido">
    <div class="col-8 mx-auto mt-5">
        <div class="card">
            <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">ALTA DE NUEVO PERMISO</div>
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
            <div class="input-group col-10 mt-4 d-flex justify-content-center align-items-center container">
                <div class="input-group-prepend">
                    <span class="input-group-text"><strong>NOMBRE DEL PERMISO</strong></span>
                </div>
                <input type="text" name="name" aria-label="name" class="form-control">
            </div>
            <div class="row justify-content-center mt-3">
                <div class="form-group col-md-6 col-form-label text-center">
                    <button type="submit" class="btn btn-success">GRABAR</button>
                    <a class="btn btn-primary" href="{{ route('permisos.index') }}"> REGRESAR</a>
                </div>
            </div>
        </div>


    </div>
</div>
{!! Form::close() !!}


@endsection