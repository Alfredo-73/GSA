@extends('layouts.app')


@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color:darkblue; font-size:25px">ALTA DE NUEVO ROL</div>


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


                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <!--<div class="row justify-content-center">
                    <div class="form-group col-md-6 col-form-label text-md-left">
                        <strong>NOMBRE DEL ROL:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                    </div>
                </div>-->

                <div class="input-group col-10 mt-3 mb-4 d-flex justify-content-center align-items-center container">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><strong>NOMBRE DEL NUEVO ROL</strong></span>
                    </div>
                    <input type="text" name="name" aria-label="name" class="form-control">
                </div>

                <div class="card ml-3" style="width:95%">
                    <div class="row justify-content-center mb-3" style="font-size:18px">
                        <strong>PERMISOS DISPONIBLES PARA EL NUEVO ROL</strong>
                    </div>

                    <div class="row justify">
                        @foreach($permission as $value)
                        <div class="col-3 mr-1 justify-content-center align-items-center container">
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3 mb-3">
                    <button type="submit" class="btn btn-success">GRABAR</button>
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> REGRESAR</a>
                </div>
            </div>
            {!! Form::close() !!}


            @endsection